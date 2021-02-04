<?php
require 'db.php';
$message = '';
if (isset ($_POST['fio'])  && isset($_POST['id_kafedra']) && isset($_POST['position'])  && isset($_POST['rank_n'])) {
  $fio = $_POST['fio'];
  $id_kafedra = $_POST['id_kafedra'];
  $position = $_POST['position'];
  $rank_n = $_POST['rank_n'];
  $sql = 'INSERT INTO shtat_rasp(`fio`, `id_kafedra`, `position`, `rank`) VALUES(:fio, :id_kafedra, :position, :rank_n)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':fio' => $fio, ':id_kafedra' => $id_kafedra, ':position' => $position, ':rank_n' => $rank_n])) {
    $message = 'data inserted successfully';
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Добавить расписание</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">ФИО преподавателя</label>
          <input type="text" name="fio" id="fio" class="form-control">
        </div>
        <div class="form-group">
          <label for="id_kafedra">Кафедра</label>
          <input type="number" name="id_kafedra" id="id_kafedra" class="form-control">
        </div>
        <div class="form-group">
          <label for="position">Номер пары</label>
          <input type="text" name="position" id="position" class="form-control">
        </div>
        <div class="form-group">
          <label for="rank_n">Тип пары</label>
          <input type="text" name="rank_n" id="rank_n" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Добавить расписание</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
