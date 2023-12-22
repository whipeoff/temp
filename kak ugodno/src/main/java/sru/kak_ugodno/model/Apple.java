package sru.kak_ugodno.model;

import static sru.kak_ugodno.model.constants.Discount.NO_DISCOUNT;
import static sru.kak_ugodno.model.constants.Discount.RED_APPLE_DISCOUNT;

public class Apple extends Food implements Discountable {
    private String colour;

    public Apple(int amount, double price, String colour) {
        super(amount, price);
        this.colour = colour;
        this.isVegetarian = true;
    }

    @Override
    public double getDiscount() {
        if ("red".equals(this.colour)) {
            return RED_APPLE_DISCOUNT;
        }
        return NO_DISCOUNT;
    }
}
