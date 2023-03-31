<?php

    include 'conexion_db.php';

    $fullname = $_POST ['fullname'];
    $username = $_POST ['username'];
    $email = $_POST ['email'];
    $password = $_POST ['password'];
    $encrypted_password = hash('sha512',$password);


    $query = "insert into users (fullname,username,email,passwords) 
    values ('$fullname', '$username', '$email', '$encrypted_password')";

    $check= mysqli_query($connection,"select * from users where email = '$email' or username = '$username';");

    if(mysqli_num_rows($check)>0){
        echo '
        <script>
            alert("el nombre de usuario o email ya estan registrados ");
            window.location = "../index.php";
        </script>
        ';
        exit();
    }


    $execute = mysqli_query($connection, $query);
    if ($execute){
        echo '
            <script>
                alert("el usuario a sido registrado exitosamente");
                window.location = "../index.php";
            </script>
        ';
        }else{
            echo '
            <script>
                alert("el usuario no se pudo registrar
                intentalo nuevamente ");
                window.location = "../index.php";
            </script>
        ';
        }
    
    mysqli_close($connection);

    

?>