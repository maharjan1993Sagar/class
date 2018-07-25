<?php
include "crud.php";
$oldPassword = $_POST['old_password'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm_password'];
$id=$_POST["id"];

if ($password != $confirmPassword) {
    $errMsg = "Password and Confirm Password not matched.";

    header("changePassword.php");
   // die("Password and Confirm Password not matched.");
}
$sql = 'select * from users where id='.$id;
$selectResult = selectData($sql);

    if ($selectResult != "zero" || $selectResult != null ) {
        $row=$selectResult->fetch_assoc();

            if (password_verify($password,$row["password"]) ) {
                $updateResult = updateUser($row["first_name"], $row["last_name"], $row["email"], $password, $row["permission"], $id);
                if ($updateResult === true) {
                   // echo 'success';
                    $_SESSION["email"] = $email;
                    header("location:home.php");

                } else {
                    echo $updateResult;
                }
            }


    }






