<?php session_start();
$connect = new mysqli("localhost","root","","bookland");
$query_book = "SELECT * FROM books WHERE books_id = ".$_GET['id']."";

$consulta = mysqli_query($connect,$query_book);
$book = mysqli_fetch_array($consulta);

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
     <meta charset="UTF-8">
    <meta name="description" content="Videograph Template">
    <meta name="keywords" content="Videograph, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Videograph | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <?php if(basename($_SERVER['PHP_SELF']) == 'stream.php'){?>
    <link rel="stylesheet" href="css/style1.css" type="text/css">
    <?php }else{?>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <?php }?>
</head>

<body>
<div class="row py-5 px-4">
    <div class="col-md-12 mx-auto">
        <!-- Profile widget -->
        <div class="bg-white shadow rounded overflow-hidden">

            <div class="col-md-12 text-center">
                <h2>Resumo</h2>
                <br><br>
            <h4>
                <?php print_r($book['books_resumo']);?>
            </h4>

                
            <br><br>
            <a href="stream.php?id=<?php print_r($book['books_id']);?>" target="_blank" class="primary-btn btn-dark"> Inciar Leitura</a>

            
            </div>
            

           
        </div>
    </div>
</div>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>