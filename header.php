<?php session_start();?>
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
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header pl-3">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="header__nav__option">
                        <nav class="header__nav__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="./index.php">Inicio</a></li>
                                <?php if(!empty($_SESSION['usuario_conectado'])){?>
                                <li class="active"><a href="./perfil.php">Escrever</a></li>
                                <?php }?>
                                <li class="active"><a href="./explorar.php">Explorar</a></li>
                            </ul>
                        </nav>
                        
                    </div>
                </div>
                 <div class="col-lg-3">
                    <div class="header__nav__option">
                        <nav class="header__nav__menu mobile-menu">
                            <ul>
                                <li class="active "><a href="./perfil.php"><?php if(!empty($_SESSION['usuario_conectado'])){
                                    print_r($_SESSION['nome']);?>
                                    <li class="active"><a href="./sair.php">Sair</a></li>
                                <?php }else{?>
                                     <li class="active"><a href="./login.php">Entrar</a></li>
                              <?php  }?></a></li>
                                 
                               
                            </ul>
                        </nav>
                        
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
    </header>
    <!-- Header End -->