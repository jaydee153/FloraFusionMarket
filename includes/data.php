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
        return "INSERT INTO `my_cart` (customer_id,product_id,product_price,quantity) SELECT ?,product_ID,product_price,1 FROM `products` where product_ID = ?";
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
    // not functional
    public function getDeleteWishlistData(){
        return "DELETE FROM `wishlist` WHERE `wishlist_id` = ?";
    }
    // not functional
    public function doCheckOut(){
        return "INSERT INTO `orders`(`seller_id`, `customer_id`, `product_id`, `order_date`, `total_amount`) SELECT ?,?,product_id,now(),price*quantity FROM `my_cart` WHERE customer_id = ?";
    }
    // for order details not functional
    public function displayOrderDetailsData(){
        return "SELECT o.order_id, o.order_date, u.name, u.email, u.permanent_add, u.contact_no, p.product_name, m.quantity, p.product_price, p.product_price * m.quantity AS totalPrice FROM orders AS o INNER JOIN user_table AS u INNER JOIN products AS p INNER JOIN my_cart AS m on o.customer_id = u.id AND o.product_id = p.product_ID AND m.product_id = p.product_ID AND m.customer_id = o.customer_id WHERE o.customer_id = ?";
    }

    public function getCustomerData(){
        return "SELECT * FROM `user_table` WHERE `role` = 1 ORDER BY `created_date`";
    }
    public function getSellerData(){
        return "SELECT * FROM `user_table` WHERE `role` = 2 ORDER BY `created_date`";
    }

    public function countCustomer(){
        return "SELECT COUNT(*) FROM `user_table` WHERE `role` = 1";
    }
    public function countSeller(){
        return "SELECT COUNT(*) FROM `user_table` WHERE `role` = 2";
    }
}    
?>