<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM uch_posob WHERE id_posob=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: /");
}