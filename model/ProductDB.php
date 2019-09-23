<?php

namespace model;
class ProductDB
{
    public $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function create($product){
        $sql = "INSERT INTO product(name,price,product_detail,vendor) VALUES (?,?,?,?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1,$product->name);
        $statement->bindParam(2,$product->price);
        $statement->bindParam(3,$product->product_detail);
        $statement->bindParam(4,$product->vendor);
        return $statement->execute();
    }
    public function getAll(){
        $sql ="SELECT * FROM product";
        $statement= $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $products= [];
        foreach ($result as $row){
            $product = new Product($row['name'],$row['price'],$row['product_detail'],$row['vendor']);
            $product->id= $row['id'];
            $products[]= $product;
        }
        return $products;
    }
    public function get($id){
        $sql = "SELECT * FROM product WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $product = new Product($row['name'], $row['price'], $row['product_detail'],$row['vendor']);
        $product->id = $row['id'];
        return $product;
    }
    public function delete($id){
        $sql = "DELETE FROM product WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }
    public function update($id, $product)
    {
        $sql = "UPDATE product SET name = ?, price = ?, product_detail = ?, vendor=? WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $product->name);
        $statement->bindParam(2, $product->price);
        $statement->bindParam(3, $product->product_detail);
        $statement->bindParam(4,$product->vendor);
        $statement->bindParam(5, $id);
        return $statement->execute();
    }

}