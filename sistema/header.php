<?php
if (empty($_SESSION['active'])) 
{
    header('location: ../');
}
?>

<header>
		<div class="header">
			
			<h1>Sistema Facturación</h1>
			<div class="optionsBar">
				<p> 10 Septiembre de 2023</p>
				<span>|</span>
				<span class="user">Jose Murcia</span>
				<img class="photouser" src="img/user.png" alt="Usuario">
				<a href="salir.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
		<?php include"nav.php"?>
	</header>