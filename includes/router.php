<?php
    session_start();
    require("backend.php");

    $method = $_POST['method'];
    if(function_exists($method)){
        call_user_func($method);
    }
    else{
        echo 'Function not exist';
    }

    function Login(){
        $backend = new backend();
        echo $backend->doLogin($_POST['email'],$_POST['password']);
    }

    function Register(){
        $backend = new backend();
        echo $backend->doRegister($_POST['username'],$_POST['email'],$_POST['password'],$_POST['role'],"defaultProfilePicture.jpg");
    }

    function updateInfo(){
        $backend = new backend();
        $location = "../assets/img";
        $filename = "";
        if(isset($_FILES['file']['name'])){
            $filename = $location .$_FILES["file"]['name'];
            if(move_uploaded_file($_FILES['file']['tmp_name'],$filename))
            {
                $filename =$_FILES["file"]['name'];
            }
        }
        echo $backend->doUpdateInfo($_POST['image'],$_POST['current_add'],$_POST['permanent_add'],$_POST['contact_no'],$_POST['birthday'],$_POST['gender']);
    }

    function AddProduct(){
        $backend = new backend();
        $location = "../assets/img/";
        $filename = "";
        if(isset($_FILES['file']['name'])){
            $filename = $location .$_FILES['file']['name'];
            if(move_uploaded_file($_FILES['file']['tmp_name'],$filename))
            {
                $filename = $_FILES['file']['name'];
            }
        }

        echo $backend->doAddProduct($filename, $_POST['name'],$_POST['price'],$_POST['qty'],$_POST['desc']);
    }

    function GetProduct(){
        $backend = new backend();
        echo $backend->doGetProduct();
    }
    function getUpdateProduct(){
        $backend = new backend();
        echo $backend->doGetUpdateProduct($_POST['name'],$_POST['price'],$_POST['qty'],$_POST['desc']);
    }
    function searchProduct(){
        $backend = new backend();
        echo $backend->doSearchProduct();
    }

    function getAllProducts(){
        $backend = new backend();
        echo $backend->doGetAllProducts();
    }
    function getProductById(){
        $backend = new backend();
        echo $backend->doProductById($_POST['product_ID']);
    }

?>