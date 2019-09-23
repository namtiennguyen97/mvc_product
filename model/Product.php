<?php

namespace model;
class Product
{
    public $id;
public $name;
public $price;
public $product_detail;
public $vendor;
public function __construct($name,$price,$product_detail,$vendor)
{
    $this->name= $name;
    $this->price= $price;
    $this->product_detail= $product_detail;
    $this->vendor= $vendor;
}

}