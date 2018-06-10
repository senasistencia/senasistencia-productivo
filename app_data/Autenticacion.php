 <?php
      require('conexion.php');
      session_start();
      
      echo "<script>alert('llego al alert')</scrpt>";
      $usuario=$_POST['username'];
      $password=$_POST['password'];
      echo "llego aca";
      $sql = "CALL validarusuario(?,?)";
      $con = $PDO->prepare($sql);
      $con->execute(array($usuario,$password));
      $resultado=$con->fetchall();
      print_r($resultado);

      if ($resultado == true)
      {
        
        $rol = $resultado[0]['Tipo_Rol'];
        switch($rol)
        {
          case 'ADMINISTRADOR':
          $_SESSION['id_user'] = $resultado;
          header('Location: ../vistas/admin/index.php');
          
          break;
          case 'INSTRUCTOR':
          
          header('Location: ../vistas/usuario/index.php');
          break;
          case 'Usuario':
          header('Location: ../vistas/usuario/index.php');
          break;
        }
      }
  else{
    
    header('Location: ../login.php?errorcode=1');
    
  }
?>