<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <title>Car Hire</title>
<body>
<?php require_once"action.php"; ?>
<?php 
    if(isset($_SESSION['message'])): ?>
    <div class="alert alert-<?=$_SESSION['msg_type'] ?>">
    <?php 
        echo $_SESSION['message'];
        unset($_SESSION['message']);  
    ?>
    </div>
    <?php endif; ?>
<?php 
    $mysqli = mysqli_connect("localhost","root","123456","car_hire") or die($mysqli_error->error());
    $result = $mysqli->query("SELECT * FROM cars"); ?>

        <div class="row justify-control-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>TelNo</th>
                        <th>VehicleNo</th>
                        <th>DateHired</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["tel_no"]; ?></td>
                    <td><?php echo $row["vehicle_no"]; ?></td>
                    <td><?php echo $row["date_hired"]; ?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info" name="edit">Edit</a>
                        <a href="action.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger" name="delete">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        
        </div>
    <div class="container">
    <div class="row justify-control-center">
    <form action="action.php" method="POST">
    <input type="hidden" value="<?php echo $id ?>">
    <div class="form-group">
    <label for="name">Name</label>
    <input type="name" name="name" class="form-control" value="<?php echo $name; ?>">
    </div>
    <div class="form-group">
    <label for="number">Vehicle RegNo</label>
    <input type="text" name="vehicle_no" class="form-control" value="<?php echo $vehicle_no; ?>">
    </div>
    <div class="form-group">
    <label for="date">Date Hired</label>
    <input type="date" name="date_hired" class="form-control" value="<?php echo $date_hired; ?>">
    </div>
    </div>
    <div class="form-group">
    <label for="number">TelNo</label>
    <input type="text" name="tel_no" class="form-control" value="<?php echo $tel_no; ?>">
    </div>
    <div class="form-group">
    <?php if($update==true): ?>
    <button class="btn btn-info" name="update" type="submit">Update</button>
    <?php else: ?>
    <button class="btn btn-success" name="submit" type="submit">Submit</button>
    <?php endif; ?>
    </div>
    </div>
    </form>
</div> 
</body>
</html>