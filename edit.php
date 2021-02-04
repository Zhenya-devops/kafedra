<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM kafedra WHERE id_kafedra =:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$kafedra = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['fakultet'])  && isset($_POST['zav_kafedr'])  && isset($_POST['number'])) {
  $name = $_POST['name'];
  $fakultet = $_POST['fakultet'];
  $zav_kafedr = $_POST['zav_kafedr'];
  $number = $_POST['number'];
  $sql = 'UPDATE kafedra SET name=:name, fakultet=:fakultet, zav_kafedr=:zav_kafedr, number=:number WHERE id_kafedra =:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':fakultet' => $fakultet, ':zav_kafedr' => $zav_kafedr, ':number' => $number, ':id' => $id])) {
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
          <label for="name">Название кафедры</label>
          <input value="<?= $kafedra->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="fakultet">Название факультета</label>
          <input value="<?= $kafedra->fakultet; ?>" type="text" name="fakultet" id="fakultet" class="form-control">
        </div>
        <div class="form-group">
          <label for="zav_kafedr">Зав.Факультета</label>
          <input value="<?= $kafedra->zav_kafedr; ?>" type="text" name="zav_kafedr" id="zav_kafedr" class="form-control">
        </div>
        <div class="form-group">
          <label for="number">Номер телефона</label>
          <input value="<?= $kafedra->number; ?>" type="text" name="number" id="number" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Обновить</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
