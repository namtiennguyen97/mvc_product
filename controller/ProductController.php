<?php
namespace controller;
use function Couchbase\defaultDecoder;
use model\Product;
use model\ProductDB;
use model\DBConnection;

class ProductController
{
    public $productDB;
    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=db_mvc2", "root", "tienNam@97");
        $this->productDB = new ProductDB($connection->connect());
    }
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/add.php';
        } else {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $product_detail = $_POST['product_detail'];
            $vendor= $_POST['vendor'];
            $product = new Product($name,$price,$product_detail,$vendor);
            $this->productDB->create($product);
            $message = 'Product created';
            include 'view/add.php';
        }
    }
    public function index()
    {
        $product = $this->productDB->getAll();
        include 'view/list.php';
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $product = $this->productDB->get($id);
            include 'view/delete.php';
        } else {
            $id = $_POST['id'];
            $this->productDB->delete($id);
            header('Location: index.php');
        }
    }
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $product = $this->productDB->get($id);
            include 'view/edit.php';
        } else {
            $id = $_POST['id'];
            $product = new Product($_POST['name'], $_POST['price'], $_POST['product_detail'],$_POST['vendor']);
            $this->productDB->update($id, $product);
            header('Location: index.php');
        }
    }
}