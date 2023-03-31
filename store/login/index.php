<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylee/main.css" type="text/css">
    <title>LOGIN</title>
</head>
<body>
    <main>
        <div class="container-all">
            <div class="registration-below">
                <!--parte de saber que accion desea hacer part de atras-->
                <div class="registration-below-login">
                    <h2>¿ya cuentas con una cuenta?</h2>
                    <p>inicia sesion para entrar </p>
                    <button id="javascript-1-idk">Iniciar Sesion</button>
                </div>
                <div class="registration-below-register">
                    <h2>¿NO TIENES CUENTA?</h2>
                    <p>  Registrate para poder entrar </p>
                    <button id="javascript-2-idk">Registrarse</button>
                    
                </div>
            </div>
            <!--parte de  adelante, formulario de registro, ingresar y crear-->
            <div  class="container__login-register">
                <form action = "php/login_users.php" method ="POST" class="form__login">
                    <h2>Iniciar Sesion</h2>
                    <input type="text" placeholder="User name" name="Username" required= "">
                    <input type="password" placeholder="password" name="PASSWORD" required= "">
                    <button>Iniciar Sesion</button required= "">

                </form>
                
                <form action="php/users.php" method = "POST" class="form__register" >
                    <h2>Crear Usuario</h2>
                    <input type="text", placeholder="Full Name" name= "fullname" required= "">
                    <input type="text", placeholder="UserName" name= "username" required= "">
                    <input type="email" placeholder="email" name= "email" required= "">
                    <input type="password" placeholder="password" name= "password" required= "">
                    <button>Crear</button required= "">
                    <button id="l2-idk">iniciar sesion</button >
                </form>
            </div>
        </div>
    </main>
    <script src="scripts/script.js"></script>
</body>
</html>