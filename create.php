<?php
require 'db.php';
$message = '';
if (isset ($_POST['name'])  && isset($_POST['fakultet']) && isset($_POST['zav_kafedr'])  && isset($_POST['number'])) {
  $name = $_POST['name'];
  $fakultet = $_POST['fakultet'];
  $zav_kafedr = $_POST['zav_kafedr'];
  $number = $_POST['number'];
  $sql = 'INSERT INTO kafedra(name, fakultet, zav_kafedr, number) VALUES(:name, :fakultet, :zav_kafedr, :number)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':fakultet' => $fakultet, ':zav_kafedr' => $zav_kafedr, ':number' => $number])) {
    $message = 'data inserted successfully';
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Добавить кафедру</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Название кафедры</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="fakultet">Название факультета</label>
          <input type="text" name="fakultet" id="fakultet" class="form-control">
        </div>
        <div class="form-group">
          <label for="zav_kafedr">Зав.кафедры</label>
          <input type="text" name="zav_kafedr" id="zav_kafedr" class="form-control">
        </div>
        <div class="form-group">
          <label for="number">Номер телефона</label>
          <input type="text" name="number" id="number" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Добавить факультет</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
