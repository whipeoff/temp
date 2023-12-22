package sru.kak_ugodno.model;

public abstract class Food {
    protected int amount; // количество в кг
    protected double price; // цена за единицу
    protected boolean isVegetarian; // вегетарианский ли продукт

    public Food(int amount, double price) {
        this.amount = amount;
        this.price = price;
    }

    public double getPrice() {
        return price;
    }

    public int getAmount() {
        return amount;
    }

    public boolean isVegetarian() {
        return isVegetarian;
    }
}
