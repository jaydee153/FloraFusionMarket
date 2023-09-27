<?php 
require('database.php');
require('data.php');
class backend{
    public function doLogin($email,$password){
        return $this->login($email,$password);
    }
    public function doRegister($name,$email,$password,$role){
        return $this->register($name,$email,$password,$role);
    }
    public function doGetAllProducts(){
        return $this->getAllProducts();
    }
    public function doUpdateInfo($image,$current_add,$permanent_add,$contact_no,$birthday,$gender){
        return $this->updateInfo($image,$current_add,$permanent_add,$contact_no,$birthday,$gender);
    }
    public function doAddProduct($product_image,$product_name,$product_price,$product_qty,$product_desc){
        return $this->AddProduct($product_image,$product_name,$product_price,$product_qty,$product_desc);
    }
    public function doGetProduct(){
        return $this->getProduct();
    }
    public function doGetUpdateProduct($product_name,$product_price,$product_qty,$product_desc){
        return $this->getUpdateProduct($product_name,$product_price,$product_qty,$product_desc);
    }
    public function doProductById($product_ID){
        return $this->getProductById($product_ID);
    }
    public function doSearchProduct(){
        return $this->searchProduct();
    }


    private function login($email,$password){
        try{
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $password = md5($password);
                $query = $con->getCon()->prepare($DT->doLoginData());
                $query->execute(array($email,$password));
                $role = null;
                $status = null;
                
                while($row = $query->fetch()){
                    $role = $row['role'];
                    $status = $row['status'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['image'] = $row['image'];
                }

                if($role == '1'){
                    if($status == '1'){
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = $password;
                        $con->closeConnection();
                        return 1;
                    }
                }else if($role == '2'){
                    if($status == '1'){
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = $password;
                        $con->closeConnection();
                        return 2;
                    }
                }else if($role == '0'){
                    if($status == '1'){
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = $password;
                        $con->closeConnection();
                        return 0;
                    }
                }else{
                        return 401;
                }
            }
        } catch(PDOException $th){
            return $th;
        }
    }

    private function register($name,$email,$password,$role){
        try{
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->doRegisterData());
                $query->execute(array($name, $email, md5($password), $role));
                $result = $query->fetch();
                if(!$result){
                    $con->closeConnection();
                    return "Successfully";
                }else{
                    $con->closeConnection();
                    return "Try Again";
                }
            }else{
                $con->closeConnection();
                return "ERROR 404";
            }
        } catch(PDOException $th){
            return $th;
        }
    }

    private function updateInfo($image,$current_add,$permanent_add,$contact_no,$birthday,$gender){
        try{
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->doUpdateInfoData());
                $query->execute(array($image,$current_add,$permanent_add,$contact_no,$birthday,$gender));
                $result = $query->fetch();
                if(!$result){
                    $con->closeConnection();
                    return "Successfully";
                }else{
                    $con->closeConnection();
                    return "Try Again";
                }
            }else{
                $con->closeConnection();
                return "ERROR 404";
            }
        } catch (PDOException $th){
            return $th;
        }
    }

    private function AddProduct($product_image,$product_name,$product_price,$product_qty,$product_desc)
    {
        try{
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->doAddProduct());
                $query->execute(array($product_image,$product_name,$product_price,$product_qty,$product_desc));
                $result = $query->fetch();
                if(!$result){
                    $con->closeConnection();
                    return 200;
                }else{
                    $con->closeConnection();
                    return "Try Again";
                }
            }else{
                $con->closeConnection();
                return "ERROR 404";
            }
        } catch(PDOException $th){
            return $th;
        }
    }

    private function getProduct(){
        try {
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->doGetProduct());
                $query->execute();
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            }else{
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getUpdateProduct($product_name,$product_price,$product_qty,$product_desc){
        try {
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->doUpdateProducData());
                $query->execute(array($product_name,$product_price,$product_qty,$product_desc));
                $result = $query->fetchAll();
                if(!$result){
                    $con->closeConnection();
                    return "SuccessfullyUpdated";
                }else{
                    $con->closeConnection();
                    return "FailedToInsert";
                }
            }else{
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getProductById($product_ID){
        try {
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->doGetProductByIdData());
                $query->execute(array($product_ID));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            }else{
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getAllProducts(){
        try {
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getAllProductsQuery());
                $query->execute();
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            }else{
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function searchProduct(){
        try {
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->doSearchProductData());
                $query->execute();
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            }else{
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
}
?> 