<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "deneme";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // işlemleri başlat
  $conn->beginTransaction();

  // veritabanına verileri eklemek için
  $conn->exec("INSERT INTO tablo1 (firstname, lastname, email)
  VALUES ('Messi', 'onnumara', 'messi@example.com')");
  $conn->exec("INSERT INTO tablo1 (firstname, lastname, email)
  VALUES ('Ronaldo', 'Cristiano', 'ronaldo@example.com')");
  $conn->exec("INSERT INTO tablo1 (firstname, lastname, email)
  VALUES ('Marcelo', 'Solbek', 'marcelo@example.com')");

  // commit the transaction
  $conn->commit();
  echo "yeni kayıtlar başarıyla oluşturuldu...";
} catch(PDOException $e) {
  // roll back the transaction if something failed
  $conn->rollback();
  echo "Error: " . $e->getMessage();
}

$conn = null;
?>