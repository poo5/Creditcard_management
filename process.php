<?php

session_start();

$mysqli = new mysqli('localhost','id9412481_transaction','test123','id9412481_crud1') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$email_id = " ";
$name = " ";
$credentials = " ";


if (isset($_POST['save'])){
  $email_id = $_POST['email_id'];
  $name = $_POST['name'];
  $credentials = $_POST['credentials'];

  $mysqli->query("INSERT INTO data(email_id,name,credentials) VALUES ('$email_id','$name','$credentials')") or
    die($mysqli->error);

    $_SESSION['message']= "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location:index.php");
}

//Deleting the record
 if (isset($_GET['delete'])){
   $id = $_GET['delete'];
   $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

   $_SESSION['message']= "Record has been deleted!";
   $_SESSION['msg_type'] = "danger";

   header("location:index.php");
 }


if (isset($_GET['edit'])){
  $id = $_GET['edit'];
  $update =true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
    if(count($result)==1){
    $row = $result->fetch_array();
    $email_id = $row['email_id'];
    $name = $row['name'];
    $credentials = $row['credentials'];

  }

}

if (isset($_POST['update'])){
  $id = $_POST['id'];
  $email_id = $_POST['email_id'];
  $name = $_POST['name'];
  $credentials = $_POST['credentials'];

  $mysqli->query("UPDATE data SET email_id='$email_id', name='$name', credentials='$credentials' WHERE id=$id")or
  die($mysqli->error);


  $_SESSION['message']= "Record has been updated!";
  $_SESSION['msg_type'] = "warning";

  header("location:index.php");

}

if(isset($_POST['submit'])){
  $tid = $_POST["id"];
  $a = $_POST["amount"];

  $credentials = $_POST['credentials'];
  $total = $a + $credentials;
  $result = $mysqli->query("UPDATE data SET credentials='$a' WHERE id='$tid'");
  $_SESSION['message']= "successful";
  $_SESSION['msg_type'] = "warning";

  header("location:index.php");


}
