<?php
   require_once 'Product.php';
   require_once 'Cart.php';
   require_once 'CartItem.php';

   $product1 = new Product(1, 'Iphone', 2500, 10);
   $product2 = new Product(2, 'Nokia', 500, 10);
   $product1 = new Product(3, 'Samsung ', 3200, 10);

   $cart = new Cart();

   $cartitem1 = $cart->addProduct($product1, 1);
   $cartitem1 = $cart->addProduct($product1, 2);
   $cartitem1 = $cart->addProduct($product1, 1);
   $cartitem2 = $product2->addToCart($cart, 1);
   $cartitem2->increaseQuantity();
   $cartitem2->increaseQuantity();
   $cartitem2->increaseQuantity();
   $cartitem2->increaseQuantity();
   $cartitem2->decreaseQuantity();

   echo 'Number of items in cart: ';
   echo $cart->getTotalQuantity();
   
   echo '<br>';

   echo "Total price of items in cart: ";
   echo $cart->getTotalSum();

    $cart->removeProduct($product2);
    echo '<br>';
    
   echo 'Number of items in cart: ';
   echo $cart->getTotalQuantity();
   
   echo '<br>';

   echo "Total price of items in cart: ";
   echo $cart->getTotalSum();

//    echo '<pre>';
//    var_dump($product1);

//    echo '<pre>';
//    var_dump($cartitem1);

   echo '<pre>';
   var_dump($cart->getItems());

?>
