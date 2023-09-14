<?php

    $alert = '';
    session_start();
if (!empty($_SESSION['active'])) 
{
    header('location: sistema/');
}else {
    
    if (!empty($_POST)) 
    {
        if(empty($_POST['usuario']) || empty($_POST['clave'])) 
        {
            $alert = 'Ingrese usuario y contraseña';
        }else {

        require_once "conexion.php";

        $user = mysqli_real_escape_string($conection,$_POST['usuario']);
        $pass = md5(mysqli_real_escape_string($conection,$_POST['clave']));

        $query = mysqli_query($conection,"SELECT * FROM usuario WHERE usuario = '$user' and clave = '$pass'");
        $result = mysqli_num_rows($query);

        if ($result > 0) 
        {
            $data = mysqli_fetch_array($query);

            
            $_SESSION['active'] = true;
            $_SESSION['idUser'] = $data['nombre'];
            $_SESSION['user'] = $data['usuario'];
            $_SESSION['email'] = $data['correo'];
            $_SESSION['rol'] = $data['rol'];

            header('location: sistema/');
        }else {
            $alert = 'el usuario o clave son incorrectos';
            session_destroy();
        }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compitable" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login MULTISERVICIOS</title>
    <link rel="stylesheet" href="css/csslog.css">
    <link rel="icon" href="login-img/loginlogo.jpg" type="image/x-icon">
    <link href='https://unpkg.com/boxicon@2.1.4/css/boxicon.min.css' rel="stylesheet" >
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST">
        <center><h3>MULTISERVICIOS K&G</h3></center>
            <div class="input-box">
                <input type="text" name="usuario" placeholder="nombre de usuario" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="clave" placeholder="clave de acceso" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div><?php echo isset($alert) ? $alert: ''; ?></div>           
            <button type="submit" class="btn" value="ingresar">Ingresar</button>
        </form>        
    </div>
</body>
</html>