<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM discip WHERE id_discip=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: /");
}