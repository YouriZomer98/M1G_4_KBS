<?php
include 'Cart.php';
$cart = new Cart;

include 'connect.php';
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['StockItemID'])){
        $productID = $_REQUEST['StockItemID'];
        $query = $connect->query("SELECT * FROM stockitems WHERE StockItemID = ".$productID);
        $row = $query->fetch_assoc();
        $itemData = array(
            'StockItemID' => $row['StockItemID'],
            'name' => $row['StockItemName'],
            'price' => $row['RecommendedRetailPrice'],
            'korting' =>$row['korting'],
            'qty' => 1
        );
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'index3.php':'index3.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['StockItemID'])){
        $itemData = array(
            'rowid' => $_REQUEST['StockItemID'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['StockItemID'])){
        $deleteItem = $cart->remove($_REQUEST['StockItemID']);
        header("Location: viewCart.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])){

        if($insertOrder){
            $orderID = $db->insert_id;
            $sql = '';
            if($insertOrderItems){
                $cart->destroy();
            }else{
            }
        }else{
        }
    }else{
    }
}else{
}