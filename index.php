<!DOCTYPE html>
<html>

<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}


</style>
</head

<body>
<a href="add.php">Add to the menu</a>
<br>
<br>

<?php
$username = "ID295201_aa";
$password = "1aaaaaaa";
$database = "ID295201_aa";
//$username = "alex";
//$password = "Icbr85p7BvRAQfOgwzkEqr6Gi9RDV6YYrGJwjHjbZSg6sPqzjAikojT0dwEfn3Cu";
//$database = "kwork_script";
$mysqli = new mysqli("ID295201_aa.db.webhosting.be", $username, $password, $database);
$query = "SELECT * FROM products ORDER BY id ASC";


echo '<table border="0" cellspacing="2" cellpadding="2">
<thead>
      <tr>
          <td>ID</td>
          <td>Name </td>
          <td>Price</td>
          <td>Description</td>

      </tr>
</thead>
<tbody class="table-body">';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["id"];
        $field2name = $row["name"];
        $field3name = $row["price"];
        $field4name = $row["description"];

        echo '<tr data-id="'.$row['id'].'">
                  <td>'.$field1name.'</td>
                  <td>'.$field2name.'</td>
                  <td>'.$field3name.'</td>
                  <td>'.$field4name.'</td>

              </tr>';
    }
    $result->free();
}

echo '</body>
</table>';
?>

<script>
(function(){
  // Проверка, есть ли новые записи
  function check() {
    const id = document.querySelector('.table-body tr:last-child').getAttribute('data-id');
    const x = new XMLHttpRequest();
    x.open('POST', 'check.php');
    x.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    x.send('id='+id);
    x.onreadystatechange = function() {
      if (x.status == 200 && x.readyState == 4) {
        try {
          const res = JSON.parse(x.responseText);
          if (res.status != 'success') return;
          if (!res.result.length) return;
          add(res);
          play();
        } catch (err) {}
      }
    };
  }

  // Вывод новых записей
  function add(d) {
    d.result.forEach(function(item){
      const tr = document.createElement('tr');
      tr.setAttribute('data-id', item.id);
      tr.innerHTML = `<td>${item.id}</td><td>${item.name}</td><td>${item.price}</td><td>${item.description}</td>`;
      document.querySelector('.table-body').appendChild(tr);
    });
  }

  // Проигрывание аудио
  function play() {
    const audio = new Audio('sound.mp3');
    audio.play();
  }

  // Запус проверки каждые 10 мс
  setInterval(check, 5000);
})();
</script>
</body>

</html>