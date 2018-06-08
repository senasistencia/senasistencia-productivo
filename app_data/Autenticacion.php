 <?php
 /*class Autenticacion
 {
    public $PDO;
    public function __construct()
      {*/
       require('conexion.php');
      /*}
 public function Validarusuario($usuario)
    {*/
      echo "<script>alert('llego al alert')";
      $usuario=$_POST['username'];
      $password=$_POST['password'];
      echo "llego aca";
      $sql = "CALL validarUsuario(?,?)";
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
/*
  if ($resultado==1)
     {
       header('Location: vista/admin/index.php');    
      }
   elseif ($resultado==2)
   {
    header('Location: vista/usuario/index.php');
   }
   else
   {
     header('Location: ../login.php');
   }
   */

?>