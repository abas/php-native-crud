<?php
  include 'DB.php';

  $query = $db->prepare("SELECT * FROM tbbiodata");
  $query->execute();
  $data = $query->fetchAll();

  $title = "Daftar Biodata";
  include 'layout/header.php';
?>
<div class="container">
  <div class="row">
    <div class="col">
      <h3>Daftar Biodata</h3>
    </div>
  </div>
  <div class="row">
    <a href="create.php" class="btn btn-success">create</a>
    <table class="table table-hover table-striped">
      <tr>
        <th>#ID</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No hp</th>
        <th> </th>
      </tr>
      <?php
      if($query->rowCount()==0){
        echo "<tr>";
          echo "<td colspan=\"5\">tidak ada data</td>";
        echo "</tr>";
      }
      foreach ($data as $r) {
        echo "<tr>";
        echo "<td>".$r['id']."</td>";
        echo "<td>".$r['nama']."</td>";
        echo "<td>".$r['alamat']."</td>";
        echo "<td>".$r['hp']."</td>";
        ?>
        <td>
          <a href="edit.php?id=<?php echo $r['id'];?>" class="btn btn-warning">Edit</a>
          <a href="delete.php?id=<?php echo $r['id'];?>" class="btn btn-danger">Delete</a>
        </td>
        </tr>
      <?php } ?>
    </table>
  </div>
</div>
<?php include 'layout/footer.php'; ?>
