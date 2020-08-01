<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "juguetes";
$conn = mysqli_connect($servername, $username, $password, $database);

if (empty($_REQUEST["usuario"]))
 {$_SESSION['Usuario']= "usuario es requerido";}

if (empty($_REQUEST["correo"]))
 {$_SESSION['Correo']= "correo es requerido";}

if (empty($_REQUEST["genero"]))
 {$_SESSION['Genero']= "el genero es requerido";}

if(!isset($_REQUEST["usuario"]) || trim($_REQUEST["usuario"]) == ''){
  header("Location: Juguetes.php");
}else if(!isset($_REQUEST["correo"]) || trim($_REQUEST["correo"]) == ''){
  header("Location: Juguetes.php");
}else if(!isset($_REQUEST["genero"]) || trim($_REQUEST["genero"]) == ''){
  header("Location: Juguetes.php");  
} 

if(isset($_REQUEST["usuario"])){
  $_SESSION["usuario"] = $_REQUEST["usuario"];
}
if(isset($_REQUEST["correo"])){
  $_SESSION["correo"] = $_REQUEST["correo"];
}
if(isset($_REQUEST["genero"])){
  $_SESSION["genero"] = $_REQUEST["genero"];
}

if(strcmp($_SESSION["genero"], "hombre") !== 0 && strcmp($_SESSION["genero"], "mujer") !== 0){
  $_SESSION['Genero']= "el genero solamente puede ser hombre o mujer";
  header("Location: Juguetes.php");  
}


$usuario = $_SESSION["usuario"];
$correo = $_SESSION["correo"];
$genero = $_SESSION["genero"];
unset($_SESSION['Usuario']);
unset($_SESSION['Correo']);
unset($_SESSION['Genero']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Necesitamos tus datos</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
</br></br></br></br></br></br></br>
<div class="container">
  <div class="panel panel-default">
  	<div class="panel-heading text-center"><?php echo "Hola " . $usuario . " estos son los juguetes que te recomendamos:<br>"; ?></div>
    <div class="panel-body">
      <form action="" method"POST">
        <div class="row">
          <?php 
          $result = mysqli_query($conn, "CALL proc_get_gen('$genero')");

          if (mysqli_num_rows($result) > 0) {
           while($row = mysqli_fetch_assoc($result)) {
            $String = " <div class='col-sm-5 col-md-6' style='border:solid; text-align: center;'></br><div style='border: solid;background: blue;border-color: blue;height: 150px;'></div>".$row['Nombre_del_producto']."</br>$".$row['Precio']." <button type='submit' name='Submit".$row['Id']."' class='btn btn-primary btn-lg btn-block'>Enviar</button></br></div>";
            echo sprintf($String);
            if (isset($_REQUEST['Submit'.$row['Id']])) {
              $mail = new PHPMailer();
              try {
                $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
                $mail->isSMTP();
                $mail->Host  = 'smtp.gmail.com';
                $mail->SMTPAuth   = true; 
                $mail->Username   = 'albertomarg22@gmail.com';                   
                $mail->Password   = 'gigabowser_26';  
                $mail->SMTPOptions = array(
                  'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                  )
                );
                $mail->Port       = 587; 

                $mail->setFrom('albertomg_94@gmail.com', 'Alberto');
                $mail->addAddress($correo);

                $mail->isHTML(true);                                 
                $mail->Subject = 'Hola "'.$usuario.'"';
                $mail->Body    = 'Nombre del producto"'.$row['Nombre_del_producto'].'"</br> Precio: "'.$row['Precio'].'" </br> Descripción: "'.$row['Descripcion'].'"';

                $mail->send();
                echo 'Message has been sent';
              }catch (Exception $e) {
               echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
             }
           }
         }
       } else {
        echo "0 resultados";
      }
      $conn->close();
      ?>
    </div>
  </form>
</div>
</div>
</div>	
</body>
</html>