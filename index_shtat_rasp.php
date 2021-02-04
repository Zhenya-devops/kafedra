<?php
require 'db.php';
$sql = 'SELECT * FROM shtat_rasp';
$statement = $connection->prepare($sql);
$statement->execute();
$shtat_rasps = $statement->fetchAll(PDO::FETCH_OBJ);
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
          <th>ФИО преподавателя</th>
          <th>Кафедра</th>
          <th>Позиция</th>
          <th>Вид пары</th>
        </tr>
        <?php foreach($shtat_rasps as $shtat_rasp): ?>
          <tr>
            <td><?= $shtat_rasp->id_raspisanie; ?></td>
            <td><?= $shtat_rasp->fio; ?></td>
            <td><?= $shtat_rasp->id_kafedra; ?></td>
            <td><?= $shtat_rasp->position; ?></td>
            <td><?= $shtat_rasp->rank; ?></td>
            <td>
              <a href="edit_shtat_rasp.php?id=<?= $shtat_rasp->id_raspisanie ?>" class="btn btn-info">Ред.</a>
              <a onclick="return confirm('Вы уверены, что хотите удалить?')" href="delete_shtat_rasp.php?id=<?= $shtat_rasp->id_raspisanie ?>" class='btn btn-danger'>Удалить</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
