<?php
require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id,name, price FROM product Where active=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>


<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <link rel="shortcut icon" href="icons/gratis.png">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://kit.fontawesome.com/d08db43edc.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <!--Barra de navegación-->
    <header class="header">
        <div class="menu margen-interno"> 
            <div class="logo">
                <a href="index.php">MiBerriozábal</a>
            </div>
            <nav class="nav">
                <a href="#"><i class="fas fa-home"></i><span class="off">Inicio</span></a>
                <a href="#"><i class="fa-solid fa-bag-shopping"></i><span class="off">Productos</span></a>
                <a href="#"><i class="fa-sharp fa-solid fa-comments"></i><span class="off">Servicio al Cliente</span></a>
                <a href="#"><i class="fa-solid fa-user"></i><span class="off">Nosotros</span></a>
                <a href="#"><i class="fa-solid fa-phone"></i><span class="off">Contacto</span></a>
            </nav>
            <div class="log-in">
               
               <?php
	                session_start();

	                if(isset($_SESSION['user'])){
		                echo '<a href="index.php">Salir</a>';
                        session_destroy();

                    }else{
                        echo '<a href="login/index.php" id="login-button"><i class="fa-sharp fa-regular fa-circle-user"></i></a>';
                        
                    }
		            
                ?>
                    <script>
                        // Detecta el clic en el botón de inicio de sesión y cambia la URL del botón
                        document.getElementById("login-button").addEventListener("click", function() {
                        this.href = "login/index.php";
                    }   );
                    </script>
            
               <a href="#"><i class="fa-solid fa-cart-plus"></i></a>

            </div>
        </div>
    </header>

    <!--Contenido-->



    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($resultado as $row) { ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <?php
                            $id = $row['id'];
                            $imagen = "images/products/" . $id . "/principal.jpg";
                            if (!file_exists($imagen)) {
                                $imagen = "images/nophoto.jpg";
                            }
                            ?>
                            <img src="<?php echo $imagen; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                <p class="card-text"><?php echo number_format($row['price'], 2, '.', ','); ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="details.php?id=<?php echo $row['id']; ?>&token=<?php echo
                                                                                                hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>" class="btn 
                                        btn-primary">Detalles</a>
                                    </div>
                                    <?php
	                                    if(isset($_SESSION['user'])){
		                                    echo '<a href="#" class="btn btn-success">Agregar</a>';
                                        }else{
                                            echo '<a href="login/index.php" class="btn btn-success">Agregar</a>';
                        
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>
    <footer>
        <div class="container__footer">
            <div class="box__footer">
                <div class="logo">
                    <img src="icons/Logo.png" alt="">
                </div>
                <div class="terms">
                    <p>En MiBerriozabal somos una pequeña empresa local que se dedica a ofrecer una amplia variedad de productos de diferentes categorías. Nos enorgullece ser una empresa local, arraigada en nuestra ciudad y comprometida con la comunidad.</p>
                </div>
            </div>
            <div class="box__footer">
                <h2>Categorias</h2>
                <a href="#">Cristalería</a>
                <a href="#">Electrónica</a>
                <a href="#">Jugueteria</a>
                <a href="#">Cosméticos</a>
            </div>

            <div class="box__footer">
                <h2>Compañia</h2>
                <a href="#">Acerca de</a>
                <a href="#">Trabajos</a>
                <a href="#">Procesos</a>
                <a href="#">Servicios</a>              
            </div>

            <div class="box__footer">
                <h2>Redes Sociales</h2>
                <a href="#"> <i class="fab fa-facebook-square"></i> Facebook</a>
                <a href="#"><i class="fab fa-twitter-square"></i> Twitter</a>
                <a href="#"><i class="fab fa-linkedin"></i> Linkedin</a>
                <a href="#"><i class="fab fa-instagram-square"></i> Instagram</a>
            </div>

        </div>
        <div class="box__copyright">
            <hr>
            <p>Todos los derechos reservados © 2023 <b>MiBerriozabal</b></p>
        </div>
    </footer>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>

