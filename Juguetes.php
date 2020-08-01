<?php session_start(); error_reporting(0);?>
<!DOCTYPE html>
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
<div class="container" style="width:450px;">
 <div class="panel panel-default">
  <div class="panel-heading text-center">Necesitamos tus datos</div>
  <div class="panel-body">
   <div class="form-group">
    <form action="Resultado.php" method"post">
     <input type="text" class="form-control" name="usuario" placeholder="Usuario"></br>
     <span class="label label-default"><?php echo $_SESSION['Usuario'];?></span>
     <input type="email" class="form-control" name="correo" placeholder="Correo"></br>
     <span class="label label-default"><?php echo $_SESSION['Correo'];?></span>
     <input type="text" class="form-control" name="genero" placeholder="Género"></br>
     <span class="label label-default"><?php echo $_SESSION['Genero'];?></span>
     <button type="submit" name="Submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
   </form>
 </div>
</div>
</div>	
</div>
</body>
</html>
<?php 
unset($_SESSION['Usuario']);
unset($_SESSION['Correo']);
unset($_SESSION['Genero']);
?>