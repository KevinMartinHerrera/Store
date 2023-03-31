<?php
    session_start();

    include 'conexion_db.php';

    $username_login = $_POST['Username'];
    $password_login = $_POST['PASSWORD'];
    $password_login = hash('sha512',$password_login);

    $validation_login = mysqli_query($connection,"select * from users where username = '$username_login' and passwords = '$password_login'");

    if(mysqli_num_rows($validation_login)>0){
        $_SESSION['user'] = $username_login;
        header("location: ../../index.php");
        exit;
    }else{
        echo '
        <script>
            alert("username o contraseña incorrecta intentelo de nuevo ");
            window.location = "../../index.php";
        </script>
    ';
    }

?>