<?php
require 'db.php';
$sql = 'SELECT * FROM discip';
$statement = $connection->prepare($sql);
$statement->execute();
$discips = $statement->fetchAll(PDO::FETCH_OBJ);
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
        <?php foreach($discips as $discip): ?>
          <tr>
            <td><?= $discip->id_discip; ?></td>
            <td><?= $discip->name_discip; ?></td>
            <td><?= $discip->fakultet; ?></td>
            <td><?= $discip->specialty; ?></td>
            <td><?= $discip->id_kafedra; ?></td>
            <td>
              <a href="edit_discip.php?id=<?= $discip->id_discip ?>" class="btn btn-info">Ред.</a>
              <a onclick="return confirm('Вы уверены, что хотите удалить?')" href="delete_discip.php?id=<?= $discip->id_discip ?>" class='btn btn-danger'>Удалить</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
