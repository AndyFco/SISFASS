<?php 
$err = isset($_GET['error']) ? $_GET['error'] : null ;
session_start();
$user = isset($_SESSION['user_session']) ? $_SESSION['user_session'] : null ;

if($user == ''){
	header('Location: http://localhost/SISFASS/index.php?error=2');
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Menu</title>
		<meta name="description" content="Circular Navigation Styles - Building a Circular Navigation with CSS Transforms | Codrops " />
		<meta name="keywords" content="css transforms, circular navigation, round navigation, circular menu, tutorial" />
		<meta name="author" content="Sara Soueidan for Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component2.css" />
		<link href="hfonts/lobster/Lobster-Regular.ttf" rel="stylesheet">
		<script src="js/modernizr-2.6.2.min.js"></script>
		<script src="js/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="css/sweetalert2.min.css">

<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-7243260-2']);
_gaq.push(['_trackPageview']);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
<style>
  h1,h2, section{
	color: #fff;
	text-align: center;
  }
  p{
	color: #fff;
	font-weight: bold;
	font-family:  Tahoma, sans-serif;
  }
  img{
  position: fixed;
  left: 100px;
  top: 200px;
  }
  body{
	background-image: url('images/black.jpg') ;
	overflow-y: hidden;
	
  }
  .salir{
  position: absolute;
  bottom: 30px;
  right: 10px;
  
  }	
  .salir a{
	text-decoration: none;
	background-color: gray;
    padding: 10px 10px;
	margin:10px;
	border: none;
	cursor: pointer;
	color: #fff;
	font-weight: bold;
	font-family:  Tahoma, sans-serif;
	
  }
  .salir a:hover {
  opacity: 0.8;
}

  </style>

	</head>
	<body>
	
		<div class="container" >
			<header>
				<h1 >Sistema de Facturacion de Servicios de Salud </h1>
			</header>
			<div class="component">
				<h2>SISFASS</h2>
				<a href="main.php">
						<img src="images/logo.png" alt="Logo">
					   </a>
				<!-- Start Nav Structure -->
				<button class="cn-button" id="cn-button" >Menu</button>
				<div class="cn-wrapper" id="cn-wrapper">
					<ul>
						<li><a href="reportes.php"><span>Reportes</span></a></li>
						<li><a href="admin.php"><span>Admin</span></a></li>
						<li><a href="registrarPaciente.php"><span>Registrar</span></a></li>
						<li><a href="Consulta.php"><span>Consultas</span></a></li>
						<li><a href="Analisis.php"><span>Analisis</span></a></li>
						<li><a href="Resultado.php"><span>Resultados</span></a></li>
						<li><a href="archivo.php"><span>Archivos</span></a></li>
					 </ul>
				</div>
				<!-- End of Nav Structure -->
			</div>
			<section>
				
				 <q >No hay medicina que cure lo que no cura la felicidad.</q> <br />Gabriel García Márquez 
				 <br /><br>
				<q>Claro que el café es un veneno lento; hace cuarenta años que lo bebo.</q><br /> VOLTAIRE
			
			</section>
			<div class="salir">
			<p> Usuario: <?php echo $_SESSION['user_session']?></p><br>
			<a href="response.php?action=logout"> Cerrar Sesion </a>
			</div>
			<?php 
	        if($err==3){
				echo "?>
				<script>
				Swal.fire({
				icon: 'error',
				title: 'No tiene Autorizacion para esa seccion',
				showConfirmButton: false,
				timer: 2000})
				</script>";
			}?>
		</div><!-- /container -->
		<script src="js/polyfills.js"></script>
		<script src="js/demo2.js"></script>
		<!-- For the demo ad only -->   
<script src="http://tympanus.net/codrops/adpacks/demoad.js"></script>
	</body>
</html>