<?php

    session_start();

    $mysqli = mysqli_connect("localhost","root","123456","car_hire") or die($mysqli_error->error());

    $update = false;
    $id = 0;
    $name = "";
    $tel_no = "";
    $vehicle_no = "";
    $date_hired = "";

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $tel_no = $_POST['tel_no'];
        $vehicle_no = $_POST['vehicle_no'];
        $date_hired = $_POST['date_hired'];

        $mysqli->query("INSERT INTO cars (name,tel_no,vehicle_no,date_hired) VALUES('$name','$tel_no','$vehicle_no','$date_hired')") or die($mysqli_error->error());

        $_SESSION['message'] = "Record was successfully added";
        $_SESSION['msg_type'] = "success";

        header("location: index.php");

    }

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM cars where id=$id") or die($mysqli->error);

        $_SESSION['message'] = "Record was successfully deleted";
        $_SESSION['msg_type'] = "danger";

        
        header("location: index.php");
    }
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $result = $mysqli->query("SELECT * FROM cars WHERE id=$id") or die($mysqli->error);
            $row = $result->fetch_array();
            $name = $row["name"];
            $tel_no = $row["tel_no"];
            $vehicle_no = $row["vehicle_no"];
            $date_hired = $row["date_hired"];

    }

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $tel_no = $_POST['tel_no'];
        $vehicle_no = $_POST['vehicle_no'];
        $date_hired = $_POST['date_hired'];

        $mysqli->query("UPDATE cars SET name='$name',tel_no='$tel_no',vehicle_no='$vehicle_no',date_hired='$date_hired' WHERE id=$id");

        $_SESSION['message'] = "Record was successfully updated";
        $_SESSION['msg_type'] = "info";

        
        header("location: index.php");
    }