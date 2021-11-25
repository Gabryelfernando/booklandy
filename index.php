<?php 
$connect = new mysqli("localhost","root","","bookland");
$query_books = "SELECT * FROM books order by books_acessos desc LIMIT 12";

$consulta = mysqli_query($connect,$query_books);

$i=0;
while($array_books = mysqli_fetch_array($consulta)) {
    $array_nome[$i] = $array_books['books_nome'];
    $array_id[$i] = $array_books['books_id']; 
    $i++;
}

require_once 'header.php';

?>



    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__item set-bg" data-setbg="img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <span>Booklandy</span>
                                <h2>Leia onde quiser</h2>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__item set-bg" data-setbg="img/hero/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <span>Booklandy</span>
                                <h2>Publique suas obras</h2>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__item set-bg" data-setbg="img/hero/hero-3.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <span>Booklandy</span>
                                <h2>Ganhe dinheiro publicando</h2>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Services Section Begin -->
    <section class="services spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div>
                        <div class="section-title">
                            <span>Nossos serviços</span>
                            <h2>O que fazemos?</h2>
                        </div>
                        <p>Se você é ou sonha em ser um escritor aqui a publicação tão sonhada é possível. Você pode escrever e publicar ou ler e se divertir usando nosso site</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="services__item">
                                <div class="services__item__icon">
                                    <img src="img/icons/si-1.png" alt="">
                                </div>
                                <h4>AMBIENTE</h4>
                                <p>Contamos com ambiente intuitivo e moderno, e com nosso sistema de desafios e recompensas você sempre terá o que fazer em nossa plataforma.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="services__item">
                                <div class="services__item__icon">
                                    <img src="img/icons/si-2.png" alt="">
                                </div>
                                <h4>STREAMING</h4>
                                <p>Em nossa plataforma você também poderá assistir e participar do streaming de leituras das mais variadas obras e autores.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="services__item">
                                <div class="services__item__icon">
                                    <img src="img/icons/si-3.png" alt="">
                                </div>
                                <h4>PUBLICAÇOES</h4>
                                <p>Aqui na Book Land quando publicadas suas obras você também tem a possibilidade de solicitar um certificado digital sobre seus textos, que posteriormente pode ser usado para dá continuidade ao processo de publicação de um livro por meio de editora.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="services__item">
                                <div class="services__item__icon">
                                    <img src="img/icons/si-4.png" alt="">
                                </div>
                                <h4>ESCREVER</h4>
                                <p>Em nossa plataforma você contara com uma ferramenta moderna e de fácil uso para começar a escrever suas histórias.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Work Section Begin -->
    <section class="work">
        <div class="work__gallery">
            <div class="grid-sizer"></div>
            <div class="work__item small__item set-bg" data-setbg="img/work/<?php print_r($array_nome['0'])?>">
                <a href="resumo.php?id=<?php print_r($array_id['0'])?>" class="play-btn video-popup"><i
                        class="fa fa-play"></i></a>
                <div class="work__item__hover">
                    <h6 style="color:white;">Viagem ao Centro da Terra.</h6>
                    
                </div>

            </div>
            <div class="work__item small__item set-bg" data-setbg="img/work/<?php print_r($array_nome['1'])?>">
                <a href="resumo.php?id=<?php print_r($array_id['1'])?>" class="play-btn video-popup"><i
                        class="fa fa-play"></i></a>
                        <div class="work__item__hover">
                    <h6 style="color:white;">Horizontes d' Versos</h6>
                    
                </div>

            </div>
            <div class="work__item small__item set-bg" data-setbg="img/work/<?php print_r($array_nome['2'])?>">
                <a href="resumo.php?id=<?php print_r($array_id['2'])?>" class="play-btn video-popup"><i
                        class="fa fa-play"></i></a>
                        <div class="work__item__hover">
                    <h6 style="color:white;">Brontes</h6>
                    
                </div>

            </div>
            <div class="work__item small__item set-bg" data-setbg="img/work/<?php print_r($array_nome['3'])?>">
                <a href="resumo.php?id=<?php print_r($array_id['3'])?>" class="play-btn video-popup"><i
                        class="fa fa-play"></i></a>
               <div class="work__item__hover">
                    <h6 style="color:white;">O Morro dos Ventos Uivantes</h6>
                    
                </div>

            </div>
            <div class="work__item small__item set-bg" data-setbg="img/work/<?php print_r($array_nome['4'])?>">
                <a href="resumo.php?id=<?php print_r($array_id['4'])?>" class="play-btn video-popup"><i
                        class="fa fa-play"></i></a>
                        <div class="work__item__hover">
                    <h6 style="color:white;">Caroline</h6>
                    
                </div>

            </div>
            <div class="work__item small__item set-bg" data-setbg="img/work/<?php print_r($array_nome['5'])?>">
                <a href="resumo.php?id=<?php print_r($array_id['5'])?>" class="play-btn video-popup"><i
                        class="fa fa-play"></i></a>
                        <div class="work__item__hover">
                    <h6 style="color:white;">A Menina que Roubava Livros</h6>
                    
                </div>

            </div>
            <div class="work__item small__item set-bg" data-setbg="img/work/<?php print_r($array_nome['6'])?>">
                <a href="resumo.php?id=<?php print_r($array_id['6'])?>" class="play-btn video-popup"><i
                        class="fa fa-play"></i></a>
                <div class="work__item__hover">
                    <h6 style="color:white;">The Wolf Wilder</h6>
                    
                </div>
            </div>
             <div class="work__item small__item set-bg" data-setbg="img/work/<?php print_r($array_nome['7'])?>">
                <a href="resumo.php?id=<?php print_r($array_id['7'])?>" class="play-btn video-popup"><i
                        class="fa fa-play"></i></a>
                <div class="work__item__hover">
                    <h6 style="color:white;">Seis Flores</h6>
                    
                </div>
            </div>
             <div class="work__item small__item set-bg" data-setbg="img/work/<?php print_r($array_nome['8'])?>">
                <a href="resumo.php?id=<?php print_r($array_id['8'])?>" class="play-btn video-popup"><i
                        class="fa fa-play"></i></a>
                        <div class="work__item__hover">
                    <h6 style="color:white;">O Perfume</h6>
                    
                </div>

            </div>
             <div class="work__item small__item set-bg" data-setbg="img/work/<?php print_r($array_nome['9'])?>">
                <a href="resumo.php?id=<?php print_r($array_id['9'])?>" class="play-btn video-popup"><i
                        class="fa fa-play"></i></a>
                        <div class="work__item__hover">
                    <h6 style="color:white;">Ella</h6>
                    
                </div>

            </div>
             <div class="work__item small__item set-bg" data-setbg="img/work/<?php print_r($array_nome['10'])?>">
                <a href="resumo.php?id=<?php print_r($array_id['10'])?>" class="play-btn video-popup"><i
                        class="fa fa-play"></i></a>
                        <div class="work__item__hover">
                    <h6 style="color:white;">The Carrow Haunt</h6>
                    
                </div>

            </div>
             <div class="work__item small__item set-bg" data-setbg="img/work/<?php print_r($array_nome['11'])?>">
                <a href="resumo.php?id=<?php print_r($array_id['11'])?>" class="play-btn video-popup"><i
                        class="fa fa-play"></i></a>
                        <div class="work__item__hover">
                    <h6 style="color:white;">Prometida ao Misterio</h6>
                    
                </div>

            </div>
        </div>
    </section>
    <!-- Work Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title center-title">
                        <span>Participe da</span>
                        <h2>GAMIFICAÇÃO</h2>
                    </div>
                </div>
            </div>
           
        </div>
    </section>
    <!-- Latest Blog Section End -->

    <!-- Call To Action Section Begin -->
    <section class="callto spad set-bg" data-setbg="img/game.jpg">
       
    </section>
    <!-- Call To Action Section End -->

<?php 
    require_once 'footer.php';
 ?>