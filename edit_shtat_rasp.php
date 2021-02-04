<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM shtat_rasp WHERE id_raspisanie =:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$shtat_rasp = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['fio'])  && isset($_POST['id_kafedra'])  && isset($_POST['position'])  && isset($_POST['rank'])) {
  $fio = $_POST['fio'];
  $id_kafedra = $_POST['id_kafedra'];
  $position = $_POST['position'];
  $rank = $_POST['rank'];
  $sql = 'UPDATE shtat_rasp SET fio=:fio, id_kafedra=:id_kafedra, position=:position, rank=:rank WHERE id_raspisanie =:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':fio' => $fio, ':id_kafedra' => $id_kafedra, ':position' => $position, ':rank' => $rank, ':id' => $id])) {
    header("Location: /");
  }
}
?>

<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Изменение данных</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="fio">ФИО преподавателя</label>
          <input value="<?= $shtat_rasp->fio; ?>" type="text" name="fio" id="fio" class="form-control">
        </div>
        <div class="form-group">
          <label for="id_kafedra">Кафедра</label>
          <input value="<?= $shtat_rasp->id_kafedra; ?>" type="text" name="id_kafedra" id="id_kafedra" class="form-control">
        </div>
        <div class="form-group">
          <label for="position">Номер пары</label>
          <input value="<?= $shtat_rasp->position; ?>" type="text" name="position" id="position" class="form-control">
        </div>
        <div class="form-group">
          <label for="rank">Тип пары</label>
          <input value="<?= $shtat_rasp->rank; ?>" type="text" name="rank" id="rank" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Обновить</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
