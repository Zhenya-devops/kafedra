<?php
require 'db.php';
$sql = 'SELECT * FROM uch_posob';
$statement = $connection->prepare($sql);
$statement->execute();
$uch_posobs = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Все уч.пособия</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Название уч.псобия</th>
          <th>Автор</th>
          <th>Год издания</th>
          <th>Место издания</th>
          <th>Кафедра</th>
        </tr>
        <?php foreach($uch_posobs as $uch_posob): ?>
          <tr>
            <td><?= $uch_posob->id_posob; ?></td>
            <td><?= $uch_posob->name; ?></td>
            <td><?= $uch_posob->autor; ?></td>
            <td><?= $uch_posob->year_izd; ?></td>
            <td><?= $uch_posob->geolog_izd; ?></td>
            <td><?= $uch_posob->id_kafedra; ?></td>
            <td>
              <a href="edit_uch_posob.php?id=<?= $uch_posob->id_posob ?>" class="btn btn-info">Ред.</a>
              <a onclick="return confirm('Вы уверены, что хотите удалить?')" href="delete_uch_posob.php?id=<?= $uch_posob->id_posob ?>" class='btn btn-danger'>Удалить</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
