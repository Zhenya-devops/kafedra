<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM discip WHERE id_discip =:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$discip = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name_discip'])  && isset($_POST['fakultet'])  && isset($_POST['specialty'])  && isset($_POST['id_kafedra'])) {
  $name_discip = $_POST['name_discip'];
  $fakultet = $_POST['fakultet'];
  $specialty = $_POST['specialty'];
  $id_kafedra = $_POST['id_kafedra'];
  $sql = 'UPDATE discip SET name_discip=:name_discip, fakultet=:fakultet, specialty=:specialty, id_kafedra=:id_kafedra WHERE id_discip =:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name_discip' => $name_discip, ':fakultet' => $fakultet, ':specialty' => $specialty, ':id_kafedra' => $id_kafedra, ':id' => $id])) {
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
          <label for="name_discip">Название дисциплины</label>
          <input value="<?= $discip->name_discip; ?>" type="text" name="name_discip" id="name_discip" class="form-control">
        </div>
        <div class="form-group">
          <label for="fakultet">Название факультета</label>
          <input value="<?= $discip->fakultet; ?>" type="text" name="fakultet" id="fakultet" class="form-control">
        </div>
        <div class="form-group">
          <label for="specialty">Название специальности</label>
          <input value="<?= $discip->specialty; ?>" type="text" name="specialty" id="specialty" class="form-control">
        </div>
        <div class="form-group">
          <label for="id_kafedra">Кафедра</label>
          <input value="<?= $discip->id_kafedra; ?>" type="number" name="id_kafedra" id="id_kafedra" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Обновить</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
