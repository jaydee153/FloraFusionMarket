<?php
class data{
    public function doLoginData(){
        return $this->loginData();
    }

    public function doRegisterData(){
        return $this->registerData();
    }
    public function doUpdateInfoData(){
        return $this->updateInfoData();
    }

    public function doAddProduct(){
        return $this->addProduct();
    }

    public function doGetProduct(){
        return $this->getProduct();
    }
    public function doUpdateProducData(){
        return $this->getUpdateProductData();
    }
    public function doGetProductByIdData(){
        return $this->GetProductByIdData();
    }
    public function doSearchProductData(){
        return $this->searchProductData();
    }

    public function getAllProductsQuery(){
        return $this->doGetAllProductsQuery();
    }

    // ALL SELECT DATA
    private function loginData(){
        return "SELECT * FROM `user_table` WHERE `email` = ? AND `password` = ?";
    }

    private function getProduct(){
        return "SELECT * FROM `products` WHERE `product_ID` = ?";
    }

    private function searchProductData(){
        return "SELECT * FROM `products`";
    }
    private function doGetAllProductsQuery(){
        return "SELECT * FROM `products`";
    }
    private function GetProductByIdData(){
        return "SELECT * FROM `products` WHERE `product_ID` = ?";
    }

    // ALL INSERT DATA
    private function registerData(){
        return "INSERT INTO `user_table` (`name`,`email`,`password`,`role`,`status`,`image`) VALUES (?,?,?,?, 1,'defaultProfilePicture.jpg' )";
    }
    private function addProduct(){
        return "INSERT INTO `products` (`product_image`,`product_name`,`product_price`,`product_qty`,`product_des`) VALUES (?,?,?,?,?)";
    }
    private function updateInfoData(){
        return "INSERT INTO `user_table` (`name`,`email`,`password`,`role`,`status`,`image`,`current_add`,`permanent_add`,`contact_no`,`birthday`,`gender`) VALUE (?,?,?,?,?,?,?,?,?,?)";
    }

    // ALL UPDATE DATA
    private function getUpdateProductData(){
        return "UPDATE `products` SET `product_name`= ?,`product_price`= ?,`product_qty`= ?,`product_des`= ? WHERE `product_ID` = ?";
    }
}    
?>