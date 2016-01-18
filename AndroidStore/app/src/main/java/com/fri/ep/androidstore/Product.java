package com.fri.ep.androidstore;

/**
 * Created by erikdrobne on 14/01/16.
 */
public class Product {

    public final int id;
    public final String manufacturer;
    public final String name;
    public final String serialNumber;
    public final double price;

    public Product(int id, String manufacturer, String name, String serialNumber, double price) {
        this.id = id;
        this.manufacturer = manufacturer;
        this.name = name;
        this.serialNumber = serialNumber;
        this.price = price;
    }

    @Override
    public String toString() {
        return String.format(name + " - " + manufacturer + ": " + price + " EUR");
    }


}
