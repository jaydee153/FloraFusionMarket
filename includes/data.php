<?php
class data{
    public function doLoginData(){
        return $this->loginData();
    }

    public function doRegisterData(){
        return $this->registerData();
    }
    public function doAddUserInfoData(){
        return $this->addUserInfoData();
    }

    public function doAddProductData(){
        return $this->addProductData();
    }

    public function doGetProductData(){
        return $this->getProductData();
    }
    public function getDisplayAllData(){
        return $this->displayAllData();
    }
    public function doUpdateProducData(){
        return $this->getUpdateProductData();
    }
    public function doDeleteProductData(){
        return $this->deleteProductData();
    }
    public function doGetProductByIdData(){
        return $this->GetProductByIdData();
    }

    public function getAllProductsQuery(){
        return $this->doGetAllProductsQuery();
    }

    // ALL SELECT DATA
    private function loginData(){
        return "SELECT * FROM `user_table` WHERE `email` = ? AND `password` = ?";
    }

    private function getProductData(){
        return "SELECT * FROM `products` WHERE `product_ID` = ?";
    }
    private function displayAllData(){
        return "SELECT pl.product_image, pl.product_name, pl.product_price, pl.product_des, us.name, us.id, rv.review_text,rv.costumer_id FROM `products` pl INNER JOIN `user_table` us INNER JOIN `reviews` rv ON pl.product_ID = us.id AND pl.product_ID = rv.review_text WHERE pl.product_ID = ?";
    }
    private function doGetAllProductsQuery(){
        return "SELECT * FROM `products`";
    }
    private function GetProductByIdData(){
        return "SELECT * FROM `products` WHERE `product_ID` = ?";
    }

    // ALL INSERT DATA
    private function registerData(){
        return "INSERT INTO `user_table` (`name`,`email`,`password`,`role`,`status`) VALUES (?,?,?,?, 1)";
    }
    private function addProductData(){
        return "INSERT INTO `products` (`product_image`,`product_name`,`product_price`,`product_qty`,`product_des`) VALUES (?,?,?,?,?)";
    }

    // ALL UPDATE DATA
    private function getUpdateProductData(){
        return "UPDATE `products` SET `product_qty` = ?, `product_price` = ? WHERE `product_ID` = ?";
    }
    private function addUserInfoData(){
        return "UPDATE `user_table` SET `image` = ?, `current_add` = ?, `permanent_add` = ?, `contact_no` = ?, `gender` = ?, `birthday` = ? WHERE `id` = ?";
    }

    //DELETE DATA
    private function deleteProductData(){
        return "DELETE FROM `products` WHERE `product_ID` = ?";
    }
}    
?>