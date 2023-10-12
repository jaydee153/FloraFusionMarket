<?php
session_start();
require("backend.php");

$method = $_POST['method'];
if (function_exists($method)) {
    call_user_func($method);
} else {
    echo 'Function not exist';
}

function Login()
{
    $backend = new backend();
    echo $backend->doLogin($_POST['email'], $_POST['password']);
}

function Register()
{
    $backend = new backend();
    echo $backend->doRegister($_POST['username'], $_POST['email'], $_POST['password'], $_POST['role']);
}

function addUserInfo()
{
    $backend = new backend();
    $location = "../assets/img/";
    $filename = "";
    if (isset($_FILES['file']['name'])) {
        $filename = $location . $_FILES["file"]['name'];
        if (move_uploaded_file($_FILES['file']['tmp_name'], $filename)) {
            $filename = $_FILES["file"]['name'];
        }
    }
    echo $backend->doAddUserInfo($filename, $_POST['currentAddress'], $_POST['permanentAddress'], $_POST['contactNo'], $_POST['gender'], $_POST['birthday'], $_SESSION['id']);
}

function AddProduct()
{
    $backend = new backend();
    $location = "../assets/img/";
    $filename = '';
    if (isset($_FILES['file']['name'])) {

        $finalfile = $location . $_FILES["file"]['name'];
        if (move_uploaded_file($_FILES['file']['tmp_name'], $finalfile)) {
            $filename = $_FILES["file"]['name'];
        }

    }

    echo $backend->doAddProduct($filename, $_POST['name'], $_POST['price'], $_POST['qty'], $_POST['desc'], $_SESSION['id']);
}

function GetProduct()
{
    $backend = new backend();
    echo $backend->doGetProduct();
}
function getThisUpdateProduct()
{
    $backend = new backend();
    echo $backend->doGetUpdateProduct($_POST['qty'], $_POST['price'], $_POST['product_ID']);
}
function getProductById()
{
    $backend = new backend();
    echo $backend->doGetProductById($_POST['product_ID']);
}
function deleteProduct()
{
    $backend = new backend();
    echo $backend->doDeleteProduct($_POST['product_ID']);
}
function getAllProducts()
{
    $backend = new backend();
    echo $backend->doGetAllProducts($_SESSION['id']);
}
function getAllProductFromIndex()
{
    $backend = new backend();
    echo $backend->doGetAllProductFromIndex();
}
function displayAll(){
    $backend = new backend();
    echo $backend->getDisplayAll();
}
function addToCart(){
    $backend = new backend();
    echo $backend->doAddToCart($_SESSION['id'],$_POST['product_ID']);
}
function DisplayCart(){
    $backend = new backend();
    echo $backend->doDisplayCart($_SESSION['id']);
}
function DeleteCart(){
    $backend = new backend();
    echo $backend->doDeleteCart($_POST['id']);
}
function addToWishlist(){
    $backend = new backend();
    echo $backend->doAddToWishlist($_SESSION['id'],$_POST['product_ID']);
}
function updateCartIdPrice(){
    $backend = new backend();
    echo $backend->updateCartIdPrice($_POST['id'],$_POST['price']);
}
function dipslayWishlist(){
    $backend = new backend();
    echo $backend->doDisplayWishlist($_SESSION['id']);
}

?>