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
    <?php require_once 'process.php'; ?>

      <?php
      if (isset($_SESSION['message'])): ?>

      <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
         ?>
      </div>

    <?php endif ?>

      <div class="container">

    <?php
    $mysqli = new mysqli('localhost','root','','CRUD1')or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * from data") or die($mysqli->error);
    //pre_r($result
    ?>
    <div class ="row justify-content-center">
      <table class="table">
        <thead>
          <tr>
            <th>Email_id</th>
            <th>Name</th>
            <th> Credentials</th>

            <th colpan="3"> Action</th>
          </tr>
        </thead>

        <?php
            while($row = $result->fetch_assoc()): ?>
              <tr>
                  <td><?php echo $row['email_id']; ?> </td>
                  <td><?php echo $row['name']; ?> </td>
                  <td><?php echo $row['credentials']; ?> </td>
                  <td>
                    <a href ="index.php?edit=<?php echo $row['id']; ?>"
                      class="btn btn-info">Edit</a>
                      <a href="process.php?delete=<?php echo $row['id']; ?>"
                        class="btn btn-danger">delete</a>
                        <a href="transfer.php?transfer=<?php echo $row['id']; ?>"
                          class="btn btn-info">transfer</a>
                  </td>
                </tr>
              <?php endwhile; ?>
        </table>
    </div>
     <?php

     function pre_r( $array){
       echo '<pre>';
       print_r($array);
       echo '</pre>';
     }
     ?>

    <div class ="row justify-content-center">
    <form action ="process.php" method="POST">

        <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="form-group">
      <label>Email_id</label>
      <input type ="text" name="email_id" class="form-control"
      value="<?php echo $email_id; ?>" placeholder=" email_id">
    </div>

      <div class="form-group">
      <label> Name</label>
      <input type ="text" name="name" class="form-control"
      value="<?php echo $name; ?>" placeholder=" Name">
    </div>

      <div class="form-group">
      <label> Credentials</label>
      <input type="text" name="credentials" class="form-control"
      value="<?php echo $credentials; ?>" placeholder =" credentials">
    </div>

      <div class="form-group">
        <?php
        if ($update == true):
          ?>
          <button type="submit" class="btn btn-info" name="update">Update</button>
        <?php else: ?>
                <button type="submit" class="btn btn-primary" name="save">Save</button>
          <?php endif; ?>
    </div>

    </body>
  </html>
  </form>
</div>
</div>
  </body>
</html>
