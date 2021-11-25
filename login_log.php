<?php

$login = $_POST['login'];
$senha = MD5($_POST['senha']);
$connect = new mysqli("localhost","root","","bookland");
$GLOBALS['global_conexao_mysqli'] = $connect;
$query_select = "SELECT login FROM usuarios WHERE login = '$login'";
$select = mysqli_query($connect,$query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['login'];

  if($login == "" || $login == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('O campo login deve ser preenchido');window.location.href='
    cadastro.html';</script>";

    }else{
      if($logarray == $login){

       $query = "SELECT * FROM usuarios WHERE login = '".$_POST['login']."' AND senha = '".MD5($_POST['senha'])."'";

        $consulta = mysqli_query($connect,$query);
        $array_usuario = mysqli_fetch_array($consulta);
        
        if(mysqli_num_rows($consulta) > 0){

          session_start();
          $_SESSION['nome'] = $array_usuario['nome'];
          $_SESSION['usuario_conectado_id'] = $array_usuario['ID'];;
          $_SESSION['usuario_conectado'] = $login;
          header('Location:http://localhost/Bookland/index.php');
        
        }else{

          echo"<script language='javascript' type='text/javascript'>
          alert('Usuario ou senha incorreta');window.location
          .href='login.php'</script>";

        }

      }else{

          echo"<script language='javascript' type='text/javascript'>
          alert('Usuario inexistente');window.location
          .href='login.php'</script>";


      }
    }

?>