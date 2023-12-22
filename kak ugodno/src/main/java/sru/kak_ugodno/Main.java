package sru.kak_ugodno;

import sru.kak_ugodno.model.Apple;
import sru.kak_ugodno.model.Food;
import sru.kak_ugodno.model.Meat;
import sru.kak_ugodno.model.constants.Colour;
import sru.kak_ugodno.service.ShoppingCart;

public class Main {
    public static void main(String[] args) {
        Meat meat = new Meat(5, 100);
        Apple redApples = new Apple(10, 50, Colour.RED);
        Apple greenApples = new Apple(8, 60, Colour.GREEN);

        Food[] foods = {meat, redApples, greenApples};
        ShoppingCart cart = new ShoppingCart(foods);

        System.out.println("Total price without discount: " + cart.getTotalPriceWithoutDiscount());
        System.out.println("Total price with discount: " + cart.getTotalPriceWithDiscount());
        System.out.println("Total vegetarian price: " + cart.getTotalVegetarianPrice());
    }
}