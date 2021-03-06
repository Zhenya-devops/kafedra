<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM uch_posob WHERE id_posob =:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$uch_posob = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['autor']) && isset($_POST['year_izd'])  && isset($_POST['geolog_izd'])  && isset($_POST['id_kafedra'])) {
  $name = $_POST['name'];
  $autor = $_POST['autor'];
  $year_izd = $_POST['year_izd'];
  $geolog_izd = $_POST['geolog_izd'];
  $id_kafedra = $_POST['id_kafedra'];
  $sql = 'UPDATE uch_posob SET name=:name, autor=:autor, year_izd=:year_izd, geolog_izd=:geolog_izd, id_kafedra=:id_kafedra WHERE id_posob =:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':autor' => $autor, ':year_izd' => $year_izd, ':geolog_izd' => $geolog_izd, ':id_kafedra' => $id_kafedra, ':id' => $id])) {
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
          <label for="name">Название уч.пособия</label>
          <input value="<?= $uch_posob->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="autor">Автор</label>
          <input value="<?= $uch_posob->autor; ?>" type="text" name="autor" id="autor" class="form-control">
        </div>
        <div class="form-group">
          <label for="year_izd">Год издания</label>
          <input value="<?= $uch_posob->year_izd; ?>" type="text" name="year_izd" id="year_izd" class="form-control">
        </div>
        <div class="form-group">
          <label for="geolog_izd">Место издания</label>
          <input value="<?= $uch_posob->geolog_izd; ?>" type="text" name="geolog_izd" id="geolog_izd" class="form-control">
        </div>
        <div class="form-group">
          <label for="id_kafedra">Кафедра</label>
          <input value="<?= $uch_posob->id_kafedra; ?>" type="number" name="id_kafedra" id="id_kafedra" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Обновить</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>