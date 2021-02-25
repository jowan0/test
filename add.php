<!DOCTYPE html>
<html>

<head>

</head

<body>
<a href="index.php">Orders</a>
<br>


<?php
$username = "root";
$password = "";
$database = "orders";
//$username = "alex";
//$password = "Icbr85p7BvRAQfOgwzkEqr6Gi9RDV6YYrGJwjHjbZSg6sPqzjAikojT0dwEfn3Cu";
//$database = "kwork_script";
$mysqli = new mysqli("localhost", $username, $password, $database);


if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $sql = "INSERT INTO products (name,price,description)
	 VALUES ('$name','$price','$description')";
    if (mysqli_query($mysqli, $sql)) {
        echo "New record created successfully !";
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}
?>

<form method="post">
    <label for="name">Name</label>
    <input id="name" type="text" name="name" required>

    <label for="time">Price</label>
    <input id="Price" type="text" name="price" required>

    <label for="time">Description</label>
    <input id="description" type="text" name="description" required>

    <button type="submit" name="add">Add</button>

</form>

</body>

</html>
