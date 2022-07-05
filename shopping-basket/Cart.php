<?php

class Cart{
    private array $items = [];


    public function addProduct(Product $product, int $quantity)
    {
        
        $cartItem = $this->findCartItem($product->getId());
        if ($cartItem === null){
            $cartItem = new CartItem($product, 0);
            $this->items[$product->getId()] = $cartItem;
        }
        $cartItem->increaseQuantity($quantity);
        return $cartItem;
    }

    public function getItems(){
        return $this->items;
    }

    private function findCartItem(int $productId)
    {
        return $this->items[$productId] ?? null;
        // foreach($this->items as $item){
        //     if($item->getProduct()->getId() === $productId){
        //         return $item->getProduct();
        //     }
        // }
        // return null;
    }  

    function getTotalQuantity(){
        $sum = 0;
        foreach($this->items as $item){
            $sum += $item->getQuantity();
        }
        return $sum;

    }

    function getTotalSum(){
        $sum = 0;
        foreach($this->items as $item){
            $sum += $item->getQuantity() * $item->getProduct()->getPrice();
        }
        return $sum;
    }

    public function removeProduct(Product $product){
        unset($this->items[$product->getId()]);
        // foreach ($this->items as $i => $item) {
        //     unset($this->items[$i]);
        //     break;
        // }
    }
    
}