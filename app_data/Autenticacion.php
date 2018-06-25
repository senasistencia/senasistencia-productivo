 <?php
      require('conexion.php');
      session_start();
      
      $usuario=$_POST['username'];
      $password=$_POST['password'];
      $sql = "CALL sp_validarUsuario(?,?)";
      $con = $PDO->prepare($sql);
      $con->execute(array($usuario,$password));
      $resultado=$con->fetchall(PDO::FETCH_OBJ);
      //print_r($resultado);

      if ($resultado)
      {        
        
        $rol = $resultado[0]->Tipo_Rol;  
        $_SESSION['id_user'] = $resultado;      
        switch($rol)
        {
          case 'Administrador':
          header('Location: ../vistas/admin/index.php');          
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