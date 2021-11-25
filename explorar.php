<?php

session_start();


$connect = new mysqli("localhost","root","","bookland");
$query_books = "SELECT * FROM books order by books_acessos";

$consulta = mysqli_query($connect,$query_books);

$i=0;

while($array_books = mysqli_fetch_array($consulta)) {
    $books_arry[$i] = $array_books['books_nome'];
    $array_id[$i] = $array_books['books_id']; 
    $array_titulo[$i] = $array_books['books_titulo'];
    $i++;
}

require_once 'header.php';

if(!empty($_SESSION['usuario_conectado'])){

?>

 <div class="hero__slider owl-carousel">
           
    <div class="hero__item_header set-bg" data-setbg="img/hero/hero-3.jpg">
        
    </div>
</div>

<div class="row py-5 px-4">
    <div class="col-md-12 mx-auto">
        <!-- Profile widget -->
        <div class="bg-white shadow rounded overflow-hidden">
                    
                <section class="work">
        <div class="work__gallery">
            <div class="grid-sizer"></div>
            
            <?php $j= 0; while($j < $i){?>
            
                <div class="work__item small__item set-bg" data-setbg="img/work/<?php print_r($books_arry[$j])?>">
                    <a href="resumo.php?id=<?php print_r($array_id[$j])?>" class="play-btn video-popup"><i
                            class="fa fa-play"></i></a>
                    <div class="work__item__hover">
                        <h6 style="color:white;"><?php print_r($array_titulo[$j])?></h6>
                        
                    </div>

                </div>
            <?php $j++;}?>
        </div>
    </section>
           
        </div>
    </div>
</div>

<script type="text/javascript">

    <?php if(isset($_SESSION['resposta'])){ ?>

        alert('<?php print_r($_SESSION['resposta']); ?>');

    <?php } 

        unset($_SESSION['resposta']);

    ?>

    function EditaBook(info){

        $.ajax({
                type: 'POST',
                url: 'http://localhost/Bookland/editar_log.php',
                data: {'a' : info},
                dataType: 'json',
                success: function(json){
                    if(json.erro == "N"){
                        window.location.reload();
                    }
                },
                error: function() {         
                }
            });
    }
    
    
</script>

<?php
}else{
    header('Location:http://localhost/Bookland/index.php');
}
require_once 'footer.php';
?>