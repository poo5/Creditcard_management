<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CRUD</title>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
<?php
$mysqli = new mysqli('localhost','root','','CRUD1')or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * from data") or die($mysqli->error);
//pre_r($result
?>
<div class ="row justify-content-center">
<form action ="process.php" method="POST">


<select name="name">
    <?php
        $result = $mysqli->query("SELECT * from data") or die($mysqli->error);
        while($row = $result->fetch_assoc())
        {

            $touser = $row['name'];
            echo "<option value='$name'>$touser</option>";


          }
 ?>
  </select>

  <div class="form-group">
  <label> amount</label>
  <input type ="number" name="amount" class="form-control"
  placeholder="amount">
  </div>
  <div class="buttonHolder">
  <button type="submit" name="submit" value="send">submit</button>
  </div>
</form>

  </body>
</html>
