<?php
  include 'DB.php';

  if (!isset($_GET['id'])) {
    die('error: ID tidak ditemukan');
  }

  $query = $db->prepare("SELECT * FROM tbbiodata WHERE id=:id");
  $query->bindParam(':id',$_GET['id']);

  $query->execute();

  if ($query->rowCount()==0) {
    die("data kosong");
  }else{
    $data = $query->fetch();
  }

  if(isset($_POST['submit'])){
    $nama  = htmlentities($_POST['nama']);
    $alamat  = htmlentities($_POST['alamat']);
    $hp  = htmlentities($_POST['hp']);

    $query = $db->prepare("UPDATE tbbiodata SET
    nama=:nama,alamat=:alamat,hp=:hp WHERE id=:id");

    $query->bindParam(":nama",$nama);
    $query->bindParam(":alamat",$alamat);
    $query->bindParam(":hp",$hp);
    $query->bindParam(":id",$_GET['id']);

    $query->execute();
    header("location:index.php");
  }
$title = "Edit";
include 'layout/header.php';
 ?>
 <div class="container">
   <div class="row">
     <div class="col">
       <h1>Tambah data</h1>
     </div>
   </div>
   <div class="row">
     <form method="post">
       <div class="form-group">
         <label for="nama">Nama</label>
         <input required value="<?php echo $data['nama'];?>" type="text" name="nama" placeholder="type your name" id="nama" class="form-control">
       </div>
       <div class="form-group">
         <label for="alamat">Alamat</label>
         <input required value="<?php echo $data['alamat'];?>" type="text" name="alamat" placeholder="type your address" id="alamat" class="form-control">
       </div>
       <div class="form-group">
         <label for="hp">HandPhone</label>
         <input required value="<?php echo $data['hp'];?>" type="text" name="hp" placeholder="type your number" id="hp" class="form-control">
       </div>
       <input type="submit" name="submit" value="add" class="btn btn-success">
     </form>
   </div>
 </div>
<?php include 'layout/header.php'; ?>
