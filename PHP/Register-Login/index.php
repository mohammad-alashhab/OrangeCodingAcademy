<?php $users = include "./process/show.php" ?>
<?php session_start() ?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <?php include_once "./parts/links.php"?>
</head>
<body>



  <div class="py-3">
    <h1>All Users</h1>
  </div>



  <div class="table-responsive row">
    <div class="col-sm-12 col-lg-6">
      <?php echo @$_SESSION["success"] ?>

      <table class="table">
        <thead class="table-primary">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        
        <tbody class="table-group-divider">
          <?php $count = 0 ?>
          <?php foreach($users as $user):?>
            <tr>
              <th scope="row"><?php echo ++$count ?></th>
              <td><?php echo "$user[first_name] $user[last_name]" ?></td>
              <td><?php echo $user["email"] ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>



  <div class="my-4">
    <a href="./register.php" class="btn btn-primary">Add new user</a>
  </div>



  <?php include_once "./parts/scripts.php"?>
  <?php unset($_SESSION["success"]) ?>
</body>
</html>