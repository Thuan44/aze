<?php 
session_start();
require_once 'pdo.php';

// $connection = new PDO("mysql:host=localhost;dbname=nwdr0168_dev_tuan", "nwdr0168_tuan", "LT6NoRu9Z7");
$received_data = json_decode(file_get_contents("php://input"));
$data = array();

@$userId = $_SESSION['user_id'];

# CHECK IF USER IS LOGGED IN ======================
if($received_data->action == 'checkuser')
{
    global $userId;

    $query = "SELECT * FROM users WHERE user_id = $userId";
    $result = $connection->prepare($query);
    $result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }
    echo json_encode($data);
}



# FETCH TABLES ====================================
// Get all products joined with categories and images
if($received_data->action == 'fetchallproducts')
{
    $query = "SELECT * FROM products
            INNER JOIN categories ON products.category_id = categories.category_id
            INNER JOIN images ON products.product_id = images.product_id
            ORDER BY product_name ASC";
    $result = $connection->prepare($query);
    $result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }
    echo json_encode($data);
}

// Get all categories
if($received_data->action == 'fetchallcategories')
{
    $query = "SELECT * FROM categories";
    $result = $connection->prepare($query);
    $result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }
    echo json_encode($data);
}


# PRODUCT SHEET ==============================
// Display product with no image
if($received_data->action == 'fetchselectedproduct')
{

    $data = (object) '';

    $query = "SELECT * FROM products
            WHERE product_id = ?";
    $result = $connection->prepare($query);
    $result->execute([$received_data->productId]);
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $data = $row;
    }
    echo json_encode($data);
}

// Display img
if($received_data->action == 'fetchrelatedimg')
{
    $query = "SELECT * FROM images WHERE product_id = ?";
    $result = $connection->prepare($query);
    $result->execute([$received_data->productId]);
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $data = $row;
    }
    echo json_encode($data);
}



# REVIEWS ====================================
if($received_data->action == 'addreview')
{
    global $userId;

    $query = "INSERT INTO reviews (product_id, user_id, review_content) VALUES (?, $userId, ?)";
    $result = $connection->prepare($query);
    $result->execute([$received_data->productId, $received_data->reviewContent]);

    $output = array(
        'message' => 'Review posted !'
    );

    echo json_encode($output);
}

// Get reviews by product id
if($received_data->action == 'fetchallreviews')
{
    $query = "SELECT * FROM reviews
            INNER JOIN users ON reviews.user_id = users.user_id
            WHERE product_id = ? AND is_valid = 1";
    $result = $connection->prepare($query);
    $result->execute([$received_data->productId]);
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }
    echo json_encode($data);
}



# ADD TO CART FROM PRODUCT SHEET ====================================
// Select cart id
if($received_data->action == 'selectcartid')
{
    global $userId;

    $query = "SELECT * FROM cart WHERE product_id = ? AND user_id = $userId";
    $result = $connection->prepare($query);
    $result->execute([$received_data->productId]);
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }
    echo json_encode($data);
}

// Add single product
if($received_data->action == 'addsingleproducttocart')
{
    global $userId;

    $query = "INSERT INTO cart (product_id, user_id, product_quantity) VALUES (?, $userId, 1)";
    $result = $connection->prepare($query);
    $result->execute([$received_data->productId]);
}

// Increment quantity of product
if($received_data->action == 'incrementproductquantity')
{
    global $userId;

    $query = "UPDATE cart
            SET product_quantity = product_quantity + 1
            WHERE product_id = ? AND user_id = $userId";
    $result = $connection->prepare($query);
    $result->execute([$received_data->productId]);

    $output = array(
        'message' => 'Quantity updated !'
    );

    echo json_encode($output);
}


# CART =================================
// Display all products in cart
if($received_data->action == 'fetchallproductsincart')
{
    global $userId;

    $query = "SELECT * FROM cart
            INNER JOIN products ON cart.product_id = products.product_id
            INNER JOIN images ON cart.product_id = images.product_id
            WHERE cart.user_id = $userId";
    $result = $connection->prepare($query);
    $result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }
    echo json_encode($data);
}

// Change quantity
if($received_data->action == 'updatequantity')
{
    $query = "UPDATE cart
            SET product_quantity = ?
            WHERE cart_id = ?";
    $result = $connection->prepare($query);
    $result->execute([$received_data->productQuantity, $received_data->cartId]);
}

// Delete product from cart
if($received_data->action == 'deleteproduct')
{
    $query = "DELETE FROM cart WHERE cart_id = ?";
    $result = $connection->prepare($query);
    $result->execute([$received_data->cartId]);
}

// Confirm total to pay
if($received_data->action == 'confirm-total-to-pay') 
{   
    var_dump($received_data->totalToPay);
    $query = "INSERT INTO payment (total_to_pay) VALUES (?)";
    $result = $connection->prepare($query);
    $result->execute([$received_data->totalToPay]);
}

?>


