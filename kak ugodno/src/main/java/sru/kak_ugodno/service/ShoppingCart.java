package sru.kak_ugodno.service;

import sru.kak_ugodno.model.Discountable;
import sru.kak_ugodno.model.Food;

public class ShoppingCart {
    private Food[] items;

    public ShoppingCart(Food[] items) {
        this.items = items;
    }

    public double getTotalPriceWithoutDiscount() {
        double total = 0;
        for (Food item : items) {
            total += item.getAmount() * item.getPrice();
        }
        return total;
    }

    public double getTotalPriceWithDiscount() {
        double total = 0;
        for (Food item : items) {
            double discount = 0;
            if (item instanceof Discountable) {
                discount = ((Discountable) item).getDiscount();
            }
            total += item.getAmount() * item.getPrice() * (1 - discount / 100);
        }
        return total;
    }

    public double getTotalVegetarianPrice() {
        double total = 0;
        for (Food item : items) {
            if (item.isVegetarian()) {
                total += item.getAmount() * item.getPrice();
            }
        }
        return total;
    }
}
