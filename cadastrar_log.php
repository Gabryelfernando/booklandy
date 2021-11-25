<?php
$connect = new mysqli("localhost","root","","bookland");

$query_usuario = "SELECT * FROM usuarios WHERE login = '".$_POST['login']."'";
$usuario = mysqli_query($connect,$query_usuario);

if(mysqli_num_rows($usuario) < 1){

  if($_POST['senha2'] == $_POST['senha']){

    
    $query_select = "INSERT INTO usuarios (login,senha,nome) VALUES ('".$_POST['login']."','".MD5($_POST['senha'])."','".$_POST['nome']."')";

    $select = mysqli_query($connect,$query_select);

    header('Location:login.php');

  }else{

    echo"<script language='javascript' type='text/javascript'>
            alert('Senhas diferentes');window.location
            .href='cadastrar.php'</script>";

  }

}else{

   echo"<script language='javascript' type='text/javascript'>
            alert('Usuario ja cadastrado');window.location
            .href='cadastrar.php'</script>";
}
?>