package com.fri.ep.androidstore;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

import java.util.ArrayList;

public class ProductsAdapter extends ArrayAdapter<Product> {

    public ProductsAdapter(Context context, ArrayList<Product> products) {
        super(context, 0, products);
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {

        Product product = getItem(position);

        if (convertView == null) {
            convertView = LayoutInflater.from(getContext()).inflate(R.layout.activity_product_list_item, parent, false);
        }

        TextView productId = (TextView) convertView.findViewById(R.id.productId);
        TextView productName = (TextView) convertView.findViewById(R.id.productName);
        TextView productManufacturer = (TextView) convertView.findViewById(R.id.productManufacturer);
        TextView productPrice = (TextView) convertView.findViewById(R.id.productPrice);

        productId.setText(Integer.toString(product.id));
        productName.setText(product.name);
        productManufacturer.setText(product.manufacturer);
        productPrice.setText(Double.toString(product.price) + " EUR");

        return convertView;
    }
}
