package com.fri.ep.androidstore;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

import org.json.JSONArray;
import org.json.JSONObject;

public class ProductDetails extends AppCompatActivity {

    public static final String PRODUCTS_ENDPOINT = "http://192.168.1.8:8000/api/v1/products";
    private ProgressDialog pDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_product_details);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        new getProduct().execute();
    }

    private void setProductContent(Product product) {

        TextView productName = (TextView) findViewById(R.id.productName);
        productName.setText(product.name);
        TextView productManufacturer = (TextView) findViewById(R.id.productManufacturer);
        productManufacturer.setText(product.manufacturer);
        TextView productPrice = (TextView) findViewById(R.id.productPrice);
        productPrice.setText(Double.toString(product.price) + " EUR");
    }

    private class getProduct extends AsyncTask<Void, Void, Product> {

        Intent intent = getIntent();
        Bundle extras = intent.getExtras();
        int productId = extras.getInt("productId");
        final String PRODUCT_ENDPOINT = PRODUCTS_ENDPOINT + "/" + productId;

        protected void onPreExecute() {
            super.onPreExecute();
            pDialog = new ProgressDialog(ProductDetails.this);
            pDialog.setMessage("Loading.");
            pDialog.setIndeterminate(false);
            pDialog.setCancelable(false);
            pDialog.show();
        }

        @Override
        protected Product doInBackground(Void... params) {

            HttpURLConnection connection = null;
            BufferedReader reader = null;

            try {

                URL url = new URL(PRODUCT_ENDPOINT);
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

                    JSONObject product = (JSONObject) json.get("item");
                    return  new Product(product.getInt("id"), product.getString("manufacturer"), product.getString("name"), product.getString("serial_num"), product.getDouble("price"));
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
        protected void onPostExecute(Product product) {
            if (product != null) {
                pDialog.dismiss();
                setProductContent(product);
            }
        }
    }

}
