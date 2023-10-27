<?php 
include('database.php');
include('data.php');
class backend{
    //login users
    public function doLogin($email,$password){
        return $this->login($email,$password);
    }
    //update the price of the quantity
    public function updateCartIdPrice($id,$price){
        return $this->doUpdateCartIdPrice($id,$price);
    }
    //register users
    public function doRegister($name,$email,$password,$role,$image,$current_add,$permanent_add,$contact_no,$gender,$birthday){
        return $this->register($name,$email,$password,$role,$image,$current_add,$permanent_add,$contact_no,$gender,$birthday);
    }
    //getproduct to display seller side
    public function doGetAllProducts($userId){
        return $this->getAllProducts($userId);
    }

    public function getDisplayAll(){
        return $this->doDisplayAll();
    }
    //dispaly product into costumer index
    public function doGetAllProductFromIndex(){
        return $this->displayAllData();
    }
    //add info to the costumer user
    public function doAddUserInfo($name,$email,$image,$current_add,$permanent_add,$contact_no,$gender,$birthday,$id){
        return $this->addUserInfo($name,$email,$image,$current_add,$permanent_add,$contact_no,$gender,$birthday,$id);
    }
    //add product by seller 
    public function doAddProduct($product_image,$product_name,$product_qty,$product_price,$product_desc,$userID){
        return $this->AddProduct($product_image,$product_name,$product_qty,$product_price,$product_desc,$userID);
    }
    public function doGetProduct(){
        return $this->getProduct();
    }
    //delete product by seller
    public function doDeleteProduct($product_ID){
        return $this->deleteProduct($product_ID);
    }
    //update product by seller
    public function doGetUpdateProduct($product_ID,$product_qty,$product_price){
        return $this->getUpdateProduct($product_ID,$product_qty,$product_price);
    }
    public function doGetProductById($product_ID){
        return $this->getProductById($product_ID);
    }
    //add to cart 
    public function doAddToCart($id,$product_ID){
        return $this->getAddToCart($id,$product_ID);
    }
    //display product to cart by costumer
    public function doDisplayCart($id){
        return $this->getDisplayCart($id);
    }
    //delete product from cart by costumer
    public function doDeleteCart($id){
        return $this->getDeleteCart($id);
    }
    //add to wishlist
    public function doAddToWishlist($id,$product_ID){
        return $this->getAddToWishlist($id,$product_ID);
    }
    //display product to wishlist by costumer
    public function doDisplayWishlist($id){
        return $this->getDisplayWishlist($id);
    }
    //not functional delete from wishlist
    public function doDeleteWishlist($id){
        return $this->deleteWishlist($id);
    }
    //not functional display OrderInfo
    public function doDisplayOrder($id){
        return $this->getDisplayOrder($id);
    }
    //not functional
    public function doDisplayCustomerInfo(){
        return $this->getDisplayCustomerInfo();
    }
    //not functional
    public function doDisplaySellerInfo(){
        return $this->getDisplaySellerInfo();
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
                    $_SESSION['current_add'] = $row['current_add']; 
                    $_SESSION['permanent_add'] = $row['permanent_add'];
                    $_SESSION['contact_no'] = $row['contact_no'];
                    $_SESSION['gender'] = $row['gender']; 
                    $_SESSION['birthday'] = $row['birthday'];
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

    private function register($name,$email,$password,$role,$image,$current_add,$permanent_add,$contact_no,$gender,$birthday){
        try{
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->doRegisterData());
                $query->execute(array($name,$email,md5($password),$role,$image,$current_add,$permanent_add,$contact_no,$gender,$birthday));
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

    private function addUserInfo($name,$email,$image,$current_add,$permanent_add,$contact_no,$gender,$birthday,$id){
        try{
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->doAddUserInfoData());
                $query->execute(array($name,$email,$image,$current_add,$permanent_add,$contact_no,$gender,$birthday,$id));
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


    private function AddProduct($product_image,$product_name,$product_qty,$product_price,$product_desc,$userID)
    {
        try{
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->doAddProductData());
                $query->execute(array($userID, $product_image, $product_name, $product_qty, $product_price, $product_desc));
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
                $query = $con->getCon()->prepare($DT->doGetProductData());
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
    private function doDisplayAll(){
        try {
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getDisplayAllData());
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
    private function getUpdateProduct($product_ID,$product_qty,$product_price){
        try {
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->doUpdateProducData());
                $query->execute(array($product_ID,$product_qty,$product_price));
                $result = $query->fetch();
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
    private function doUpdateCartIdPrice($id,$price){
        try {
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->doUpdatePrice());
                $query->execute(array($price, $id));
                $result = $query->fetch();
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
    private function deleteProduct($product_ID){
        try{
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->doDeleteProductData());
                $query->execute(array($product_ID));
                $result = $query->fetch();
                if(!$result){
                    $con->closeConnection();
                    return 200;
                }else{
                    $con->closeConnection();
                    return "Failed To Delete";
                }
            }else{
                return "NOT CONNECTED TO DATEBASE";
            }
        } catch(PDOException $th){
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

    private function getAllProducts($userId){
        try {
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getAllProductsQuery());
                $query->execute(array($userId));
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

    private function displayAllData(){
        try {
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getAllProductFromIndex());
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
    private function getAddToCart($id,$product_ID){
        try {
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->geTAddToCartData());
                $query->execute(array($id,$product_ID));
                $result = $query->fetch();
                $con->closeConnection();
                if(!$result){
                    $con->closeConnection();
                    return 200;
                }else{
                    $con->closeConnection();
                    return 404;
                }
            }else{
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getDisplayCart($id){
        try {
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getDisplayCartData());
                $query->execute(array($id));
                $result = $query->fetchall();
                $con->closeConnection();
                return json_encode($result);
            }else{
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getDeleteCart($id){
        try {
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getDeleteCartData());
                $query->execute(array($id));
                $result = $query->fetch();
                $con->closeConnection();
                if(!$result){
                    return 200;
                }else{
                    return 404;
                }
            }else{
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getAddToWishlist($id,$product_ID){
        try {
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getAddToWishlistData());
                $query->execute(array($id,$product_ID));
                $result = $query->fetch();
                $con->closeConnection();
                if(!$result){
                    $con->closeConnection();
                    return 200;
                }else{
                    $con->closeConnection();
                    return 404;
                }
            }else{
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getDisplayWishlist($id){
        try {
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getDisplayWishlistData());
                $query->execute(array($id));
                $result = $query->fetchall();
                $con->closeConnection();
                return json_encode($result);
            }else{
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    //not functional
    private function deleteWishlist($id){
        try {
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getDeleteWishlistData());
                $query->execute(array($id));
                $result = $query->fetch();
                $con->closeConnection();
                if(!$result){
                    return 200;
                }else{
                    return 404;
                }
            }else{
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getDisplayOrder($id){
        try {
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->displayOrderDetailsData());
                $query->execute(array($id));
                $result = $query->fetchall();
                $con->closeConnection();
                return json_encode($result);
            }else{
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getDisplayCustomerInfo(){
        try{
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getCustomerData());
                $query->execute();
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            }else{
                return "NotConnectedToDatabase";
            }
        }catch(PDOException $th){
            return $th;
        }
    }
    private function getDisplaySellerInfo(){
        try{
            $con = new database();
            if($con->getStatus()){
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getSellerData());
                $query->execute();
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            }else{
                return "NotConnectedToDatabase";
            }
        }catch(PDOException $th){
            return $th;
        }
    }
}
?> 