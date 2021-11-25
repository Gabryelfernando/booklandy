<?php
session_start();

$connect = new mysqli("localhost","root","","bookland");
$query_book = "SELECT * FROM books WHERE books_id = ".$_POST['a']."";

$consulta = mysqli_query($connect,$query_book);
$book = mysqli_fetch_array($consulta);

$_SESSION['em_book'] = 'S';
$_SESSION['id_book'] = $_POST['a'];
$_SESSION['texto_print'] = $book['books_texto'];

$retorno_dados_json = array();

$retorno_dados_json['erro'] 	= 'N';
$retorno_dados_json['alerta'] 	= '';
$retorno_dados_json['dados'] 	= '';

echo json_encode($retorno_dados_json);

?>