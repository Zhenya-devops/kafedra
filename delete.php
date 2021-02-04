<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM kafedra WHERE id_kafedra=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: /");
}