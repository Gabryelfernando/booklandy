<?php
session_start();



$connect = new mysqli("localhost","root","","bookland");
$query = "UPDATE books SET books_texto = '".$_POST['text_book']."' WHERE books_id = '".$_SESSION['id_book']."'";

$consulta = mysqli_query($connect,$query);

$_SESSION['resposta'] = 'Book salvo com sucesso';
unset($_SESSION['em_book']);
unset($_SESSION['id_book']);
unset($_SESSION['texto_print']);
header('Location:perfil.php');

?>