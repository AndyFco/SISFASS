<!DOCTYPE html>
<html>
<head>
<title>Recuperar Clave</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-image: url('images/black.jpg');
  
}
h1,h2 {
	color: #fff;
	text-align: center;
  }

/* Add padding to containers */
.formulario {
  padding: 20px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 50%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: rgb(248, 248, 248);
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

</style>
</head>
<body>
<div  align ="center" >
	<header>
        <h1>Sistema de Facturacion de Servicios de Salud </h1>
        <a href="login.php">
         <img src="images/logo.png" alt="Logo">
        </a>
	</header>
    <form action="login.php" method="POST">
        <div class="formulario" >
            <h1>Recuperacion de clave</h1>
        
            <input type="text" placeholder="Usuario " name="nombre" required>
            <input type="text" placeholder="Email " name="email" required>
            <button type="submit" class="registerbtn" formaction="login.php">Solicitar</button>
        </div>
        
    </form>
</div>
</body>
</html>
