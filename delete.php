<?php include 'DB.php';
  if (isset($_GET['id'])) {
    $query = $db->prepare("DELETE FROM tbbiodata WHERE id=".$_GET['id']);
    $query->execute();
    header("location:index.php");
  }else {
    echo "delete fail";
  }
?>
