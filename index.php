<?php
include('partials/header.php');
?>
<div class="row box" id="login-box" >
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-login">
			<div class="alert alert-info">
			<h1>Sitema de Facturacion de Servicios de Salud</h1>
			</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-lg-12">
				  <div class="alert alert-danger" role="alert" id="error" style="display: none;">...</div>
				  <img id="logo" src="images/logo.png" alt="logo"> 
				  <form id="login-form" name="login_form" role="form" style="display: block;" method="post">
					  <div class="form-group">
						<input type="text" name="username" id="username" tabindex="1" class="form-control" 
						placeholder="Usuario" value=""  required>
					  </div>
					  <div class="form-group">
						<input type="password" name="password" id="password" tabindex="2" class="form-control" 
						placeholder="Password"> 
					  </div>
					  <div class="col-xs-12 form-group pull-right">     
							<button type="submit" name="login-submit" id="login-submit" tabindex="4" 
							class="form-control btn btn-primary">
							 <span class="spinner"><i class="icon-spin icon-refresh" id="spinner">
							 </i></span> Iniciar Sesion
							</button>
							
					  </div>
					  <br>
						<a href="OlvidoClave.php" class="txt1">Olvido su Clave?</a>
				  </form>
				</div>
			</div>
		</div>
		</div>
	</div>
	<?php 
	if($err==2){
		echo "?>
		<script>
		  Swal.fire({
		  icon: 'error',
		  title: 'Debe Iniciar sesion',
		  showConfirmButton: false,
		  timer: 2000})
		</script>
		";
	}
	?>
</div>
<?php
include('partials/footer.php')
?>