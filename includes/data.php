<?php
class data{
    public function doLoginData(){
        return "SELECT * FROM `user_table` WHERE `email` = ? AND `password` = ?";
    }

    public function doRegisterData(){
        return "INSERT INTO `user_table` (`name`,`email`,`password`,`role`,`status`,`image`,`current_add`,`permanent_add`,`contact_no`,`gender`,`birthday`) VALUES (?,?,?,?, 1,?,?,?,?,?,?)";
    }
    public function doAddUserInfoData(){
        return "UPDATE `user_table` SET  `name` = ?, `email` = ?, `image` = ?, `current_add` = ?, `permanent_add` = ?, `contact_no` = ?, `gender` = ?, `birthday` = ? WHERE `id` = ?";
    }

    public function doAddProductData(){
        return "INSERT INTO `products` (`userID`,`product_image`,`product_name`,`product_qty`,`product_price`,`product_des`) VALUES (?, ?, ?, ?, ?, ?)";
    }

    public function doGetProductData(){
        return "SELECT * FROM `products` WHERE `product_ID` = ?";
    }

    public function getDisplayAllData(){
        return "SELECT pl.product_image, pl.product_name, pl.product_price, pl.product_des, us.name, us.id, rv.review_text,rv.costumer_id FROM `products` pl INNER JOIN `user_table` us INNER JOIN `reviews` rv ON pl.product_ID = us.id AND pl.product_ID = rv.review_text WHERE pl.product_ID = ?";
    }

    public function doUpdateProducData(){
        return "UPDATE `products` SET `product_qty` = ?, `product_price` = ? WHERE `product_ID` = ?";
    }

    public function doDeleteProductData(){
        return "DELETE FROM `products` WHERE `product_ID` = ?";
    }

    public function doGetProductByIdData(){
        return "SELECT * FROM `products` WHERE `product_ID` = ?";
    }

    public function getAllProductFromIndex(){
        return "SELECT * FROM `products`";
    }


    public function getAllProductsQuery(){
        return "SELECT * FROM `products` WHERE `userID` = ? ORDER BY `created_date` desc";
    }

    public function geTAddToCartData(){
        return "INSERT INTO `my_cart` (customer_id,product_id,quantity) SELECT ?,product_ID,1 FROM `products` where product_ID = ?";
    }
    public function getDisplayCartData(){
        return "SELECT c.cart_id, p.product_name,p.product_price,c.quantity, c.quantity * p.product_price as totalPrice FROM `my_cart` AS c inner join products AS p inner join user_table as u on c.customer_id = u.id and c.product_id = p.product_ID WHERE c.customer_id = ?";
    }
    public function getDeleteCartData(){
        return "DELETE FROM my_cart where cart_id = ?";
    }
    public function getAddToWishlistData(){
        return "INSERT INTO `wishlist` (`customer_id`, `product_id`) SELECT ?,product_ID FROM `products` WHERE `product_id` = ?";
    }
    public function getDisplayWishlistData(){
        return "SELECT w.wishlist_id, p.product_image,p.product_name,p.product_price FROM `wishlist` AS w INNER JOIN products as p INNER JOIN user_table AS u on w.customer_id = u.id and w.product_id = p.product_ID WHERE w.customer_id = ?";
    }
    public function doUpdatePrice(){
        return "UPDATE my_cart set quantity = ? WHERE cart_id = ?";
    }
}    
?>