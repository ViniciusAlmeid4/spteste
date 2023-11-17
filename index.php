<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="content-language" content="pt-br">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SPTEST</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link  href="css/index.css" rel="stylesheet">
	</head>
	<body>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
		
		<container class="text-center">
			<div class="formLogin">
				<div class="row justify-content-center row-cols-10 row-cols-md-3 mb-3 text-center">
				<div class="col">
					<div class="card mb-4 rounded-3 shadow-sm">
					<h4 class="title-login"><b>Bem Vindo</b></h4>
					<div class="card-body">
						<form action="login.php" method="POST">
							<input class='form-control text-center inputs-login' type='text' name='usuario' placeholder="E-mail" required/>
							<br/>
							<input class='form-control text-center inputs-login' type='password' name='senha' placeholder='Senha' required/>
							<br/>
							<input type="submit" class="btn btn-primary button-login" name="entrar" value="ENTRAR"/>
						</form>
					</div>
					</div>
				</div>
				</div>
			</div>
		</container>
	</body>
</html>
<?php
	session_start();
?>