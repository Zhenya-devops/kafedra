<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM shtat_rasp WHERE id_raspisanie=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: /");
}