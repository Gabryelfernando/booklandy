<?php
session_start();

$array_nome = explode('.',$_FILES['img']['name']);
$ext    = end($array_nome);

if($ext == 'jpg'){

  $caminho_up = $_SERVER['DOCUMENT_ROOT'].'/Bookland/img/work/'.$_FILES['img']['name'];

  if(move_uploaded_file($_FILES['img']['tmp_name'], $caminho_up)){

    $connect = new mysqli("localhost","root","","bookland");
    $query_book = "INSERT INTO books (books_titulo,books_usuario_id,books_nome,books_resumo,books_autor,books_genero,books_lingua) VALUES ('".$_POST['name']."','".$_SESSION['usuario_conectado_id']."','".$_FILES['img']['name']."','".$_POST['resumo']."','".$_POST['autor']."','".$_POST['genero']."','".$_POST['lingua']."')";

    $consulta = mysqli_query($connect,$query_book);

    $query = "SELECT * FROM books WHERE books_titulo = '".$_POST['name']."' AND books_usuario_id = '".$_SESSION['usuario_conectado_id']."' AND books_autor = '".$_POST['autor']."' AND books_genero = '".$_POST['genero']."' AND books_lingua = '".$_POST['lingua']."' AND books_nome = '".$_FILES['img']['name']."'";

    $consulta_2 = mysqli_query($connect,$query);

    $resultado = mysqli_fetch_array($consulta_2);

    $_SESSION['resposta'] = 'Book cadastrado com sucesso!';
    $_SESSION['id_book'] = $resultado['books_id'];
    $_SESSION['em_book'] = 'S';
    header('Location:perfil.php');

  }else{

    $_SESSION['resposta'] = 'Erro ao mover o arquivo';
    header('Location:perfil.php');

  }

}else{

$_SESSION['resposta'] = 'Por favor insira uma imagem em formato jpg';
header('Location:perfil.php');

}
?>