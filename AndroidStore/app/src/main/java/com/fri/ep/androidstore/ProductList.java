package com.fri.ep.androidstore;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.Reader;
import java.io.UnsupportedEncodingException;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLConnection;
import java.util.ArrayList;

import javax.net.ssl.HttpsURLConnection;

public class ProductList extends AppCompatActivity  {

    public static final String PRODUCTS_ENDPOINT = "http://192.168.1.8:8000/api/v1/products";
    private ProgressDialog pDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_product_list);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        new getProducts().execute();
    }

    private void setProductListContent(Product[] products) {

        ArrayList<Product> arrayOfProducts = new ArrayList<Product>();
        ProductsAdapter adapter = new ProductsAdapter(this, arrayOfProducts);
        final ListView listview = (ListView) findViewById(R.id.productList);
        listview.setAdapter(adapter);
        adapter.addAll(products);

        listview.setOnItemClickListener(new AdapterView.OnItemClickListener() {

            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

                int itemPosition = position;
                Product product = (Product) listview.getItemAtPosition(position);
                goProductDetails(product.id);
            }
        });
    }

    private void goProductDetails(Integer productId) {
        Intent intent = new Intent(this, ProductDetails.class);
        intent.putExtra("productId", productId);
        startActivity(intent);
    }

    public String readIt(InputStream stream, int len) throws IOException, UnsupportedEncodingException {
        Reader reader = null;
        reader = new InputStreamReader(stream, "UTF-8");
        char[] buffer = new char[len];
        reader.read(buffer);
        return new String(buffer);
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_product_list, menu);
        return true;
    }

    private class getProducts extends AsyncTask<Void, Void, Product[]>  {

        protected void onPreExecute() {
            super.onPreExecute();
            pDialog = new ProgressDialog(ProductList.this);
            pDialog.setMessage("Loading.");
            pDialog.setIndeterminate(false);
            pDialog.setCancelable(false);
            pDialog.show();
        }

        @Override
        protected Product[] doInBackground(Void... params) {

            HttpURLConnection connection = null;
            BufferedReader reader = null;

            try {

                URL url = new URL(PRODUCTS_ENDPOINT);
                connection = (HttpURLConnection) url.openConnection();
                connection.connect();

                InputStream stream = connection.getInputStream();

                reader = new BufferedReader(new InputStreamReader((stream)));

                StringBuffer buffer = new StringBuffer();

                String line = "";
                while((line = reader.readLine()) != null) {
                    buffer.append(line);
                }

                JSONObject json = new JSONObject(buffer.toString());

                if (json.getString("status").equals("success")) {
                    JSONArray items = json.getJSONArray("items");
                    Product[] products = new Product[items.length()];

                    for (int i = 0; i < items.length(); i++) {
                        JSONObject product = items.getJSONObject(i);
                        products[i] = new Product(product.getInt("id"), product.getString("manufacturer"), product.getString("name"), product.getString("serial_num"), product.getDouble("price"));
                    }

                    return products;
                }


            } catch (Exception e) {
                e.printStackTrace();
            } finally {
                if(connection != null) {
                    connection.disconnect();
                }
                try {
                    if(reader != null) {
                        reader.close();
                    }
                } catch (IOException e) {
                    e.printStackTrace();
                }
            }

            return null;
        }

        @Override
        protected void onPostExecute(Product[] products) {
            if (products != null) {
                pDialog.dismiss();
                setProductListContent(products);
            }
        }
    }
}
