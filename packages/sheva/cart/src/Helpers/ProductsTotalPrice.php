<?php

namespace Sheva\Cart\Helpers;

use Brick\Money\Money;
use Sheva\Cart\Models\Cart;
use Sheva\PackagesContracts\Contracts\CartProduct;

class ProductsTotalPrice
{
    public function handle(Cart $cart, string $currency): Money
    {
        $sum = $cart->cartProducts->sum(function (CartProduct $product) {
            return $product->getQuantity() * $product->getMinorSiteTotalPrice();
        });

        return Money::ofMinor($sum, $currency);
    }
}
