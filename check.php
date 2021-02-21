<?php

if (empty($_POST['id'])) {
  exit;
}

$username = "root";
$password = "";
$database = "orders";
//$username = "alex";
//$password = "Icbr85p7BvRAQfOgwzkEqr6Gi9RDV6YYrGJwjHjbZSg6sPqzjAikojT0dwEfn3Cu";
//$database = "kwork_script";
$mysqli = new mysqli("localhost", $username, $password, $database);

// Проверка появились ли новые записи
$query = "SELECT count(*) FROM products WHERE id>{$_POST['id']}";
if ($result = $mysqli->query($query)) {
  if ($result->num_rows > 0) {
    // Получаем новые записи
    $query = "SELECT * FROM products WHERE id>{$_POST['id']} ORDER BY id ASC";
    if ($result = $mysqli->query($query)) {
      $arr = [];
      while ($row = $result->fetch_assoc()) {
        $arr[] = $row;
      }

      echo json_encode([
        'status' => 'success',
        'result' => $arr,
      ]);
      exit;
    }
  }
}

echo json_encode([
  'status' => 'success',
  'result' => [],
]);
