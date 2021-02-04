<?php
require 'db.php';
$sql = 'SELECT * FROM kafedra';
$statement = $connection->prepare($sql);
$statement->execute();
$kafedrs = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Все кафедры</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Название кафедры</th>
          <th>Факультет</th>
          <th>Заведущий Факультета</th>
          <th>Номер телефона</th>
        </tr>
        <?php foreach($kafedrs as $kafedra): ?>
          <tr>
            <td><?= $kafedra->id_kafedra; ?></td>
            <td><?= $kafedra->name; ?></td>
            <td><?= $kafedra->fakultet; ?></td>
            <td><?= $kafedra->zav_kafedr; ?></td>
            <td><?= $kafedra->number; ?></td>
            <td>
              <a href="edit.php?id=<?= $kafedra->id_kafedra ?>" class="btn btn-info">Ред.</a>
              <a onclick="return confirm('Вы уверены, что хотите удалить?')" href="delete.php?id=<?= $kafedra->id_kafedra ?>" class='btn btn-danger'>Удалить</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
