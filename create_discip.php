<?php
require 'db.php';
$message = '';
if (isset ($_POST['name_discip'])  && isset($_POST['fakultet']) && isset($_POST['specialty'])  && isset($_POST['id_kafedra'])) {
  $name_discip = $_POST['name_discip'];
  $fakultet = $_POST['fakultet'];
  $specialty = $_POST['specialty'];
  $id_kafedra = $_POST['id_kafedra'];
  $sql = 'INSERT INTO kafedra(name_discip, fakultet, specialty, id_kafedra) VALUES(:name_discip, :fakultet, :specialty, :id_kafedra)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name_discip' => $name_discip, ':fakultet' => $fakultet, ':specialty' => $specialty, ':id_kafedra' => $id_kafedra])) {
    $message = 'data inserted successfully';
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Добавить дисциплину</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name_discip">Название дисциплины</label>
          <input type="text" name="name_discip" id="name_discip" class="form-control">
        </div>
        <div class="form-group">
          <label for="fakultet">Название факультета</label>
          <input type="text" name="fakultet" id="fakultet" class="form-control">
        </div>
        <div class="form-group">
          <label for="specialty">Специальность</label>
          <input type="text" name="specialty" id="specialty" class="form-control">
        </div>
        <div class="form-group">
          <label for="id_kafedra">Кафедра</label>
          <input type="number" name="id_kafedra" id="id_kafedra" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Добавить факультет</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
