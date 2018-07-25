<?php
session_start();
include "crud.php";


    $userName = $_POST['user_name'];
    $password = $_POST['password'];
    $sql = 'select * from users where email="' . $userName . '"';

    $result = selectData($sql);

    if ($result != "zero" || $result != null) {
        $row = $result->fetch_assoc();
        
        if (password_verify($password, $row["password"])) {
            $_SESSION["id"] = $row["id"];
            $_SESSION["email"] = $row["email"];
            header("location:matches.php");

        } else {
            echo "<script>
        alert('Invalid UserName or Password.');
        window.location.href='login.php';
        </script>";

        }
    } else {
        echo "<script>
        alert('Invalid UserName or Password.');
        window.location.href='login.php';
        </script>";
    }

