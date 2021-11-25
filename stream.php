<?php 

if(!empty($_GET['id'])){

$connect = new mysqli("localhost","root","","bookland");
$query_book = "SELECT * FROM books WHERE books_id = ".$_GET['id']."";

$consulta = mysqli_query($connect,$query_book);
$book = mysqli_fetch_array($consulta);

$array_texto = str_split($book['books_texto'], 1600);
$explode = explode(' ', $book['books_texto']);
$quantidade = ceil(count($explode) / count($array_texto));
$array_texto2 = array_chunk($explode, $quantidade);

foreach($array_texto2 as $item)
{
    $array_retorno[] = implode(' ', $item);
}

$i=0;
$html = '';
$html2 = '';

while($i < count($array_texto)){
    if($i!=0){
        $html2 .= '<li class="page-item"><button value="'.$i.'" type="button" class="page-link" onclick="mudarpagina(this.value);">'.$i.'</button></li>';
    }

    if($i==0){
        $html .= '<div class="page p-4" id="pagina-'.$i.'"><p>'.$array_retorno[$i].'</p></div>';
    $i++;
    }else{
        $html .= '<div class="page p-4" id="pagina-'.$i.'" style="display:none;"><p>'.$array_retorno[$i].'</p></div>';
    $i++;

    }

    
    

}

require_once 'header.php';?>

    <div class="hero__slider owl-carousel">
           
        <div class="hero__item_header set-bg" data-setbg="img/hero/hero-3.jpg">
            
        </div>
    </div>



    <div class="row py-5 px-4">
        <div class="col-md-12 mx-auto">
             <div class="row">    
                <div class="col-md-3">
                    <div class="media align-items-end profile-head">
                        <div class="profile mr-3"><img src="img/work/<?php print_r($book['books_nome'])?>" alt="..." width="230" class="rounded mb-2 img-thumbnail">
                        </div>
                    </div>

                     <div class="media align-items-end profile-head">
                        <div class="profile mr-3"><img src="img/cam.jpg" alt="..." width="230" class="rounded mb-2 img-thumbnail">
                        </div>
                    </div>

                    <h4><?php print_r($book['books_titulo'])?></h4>

                    

                </div>



                <div id="livro" class="border border-dark"> <!-- Criando um novo quadrinho -->
                    <div class="row">
                        <div class="col-md-7">
                            <?php echo $html;?>
                        </div>

                        <div class="col-md-5">
                            <div class="d-flex flex-row p-3"> <img src="https://img.icons8.com/color/48/000000/circled-user-female-skin-type-7.png" width="30" height="30">
                                <div class="chat ml-2 p-3">Boa tarde galerinha</div>
                            </div>
                            <div class="d-flex flex-row p-3">
                                <div class="bg-white ml-5 mr-2 p-3"><span class="text-muted">Eles mataram o assasino e depois descobriram que o assasino não era desse planeta.</span></div> <img src="https://img.icons8.com/color/48/000000/circled-user-male-skin-type-7.png" width="30" height="30">
                            </div>
                            <div class="d-flex flex-row p-3"> <img src="https://img.icons8.com/color/48/000000/circled-user-female-skin-type-7.png" width="30" height="30">
                                <div class="chat ml-2 p-3">Não acredito</div>
                            </div>
                            <div class="d-flex flex-row p-3">
                                <div class="col-md-4"></div><div class="bg-white mr-2 p-3"><span class="text-muted">Logo vão descobrir quem é</span></div> <img src="https://img.icons8.com/color/48/000000/circled-user-male-skin-type-7.png" width="30" height="30">
                            </div>
                            <div class="d-flex flex-row p-3"> <img src="https://img.icons8.com/color/48/000000/circled-user-female-skin-type-7.png" width="30" height="30">
                                <div class="chat ml-2 p-3"><span class="text-muted dot">. . .</span></div>
                            </div>

                            <div class="form-group mt-5"> <textarea class="form-control"  placeholder="Digite sua mensagem"></textarea> </div>
                            <p>I will display &#65; &#66; &#67;</p>
                        </div>
                    </div>
                </div>

                

            </div>   
        </div>
                <div class="col-md-3"></div>

                <div class="col-md-3 mt-4">
                    <button class="primary-btn btn-dark">Doar dinheiro</button>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    <i class="fa fa-heart fa-2x"style="color:red" aria-hidden="true"></i>
                </div>

                <div class="col-md-3 mt-4">
                
                    <nav aria-label="Navegação de página exemplo">
                      <ul class="pagination">
                        <li class="page-item"><button value="0" type="button" class="page-link" onclick="mudarpagina(this.value);">Anterior</button></li>
                        <?php print_r($html2)?>
                        <li class="page-item"><button value="9999" type="button" class="page-link" onclick="mudarpagina(this.value);">Próximo</button></li>
                      </ul>
                    </nav>
                </div>

                <div class="col-md-3 mt-4">
                    <button class="primary-btn btn-dark">Se inscrever</button>

                </div>
    </div>

<script type="text/javascript">
    
    function mudarpagina(info) {


        var id;
        var id_prox;
        var id_test;

        $('.page').each(function() {

            if($(this).is(':visible')){
              id = $(this).attr("id");
            }
        });

        array = id.split('-');
        id = parseInt(array[1]);

        if(info == 0){
            
            if(id > 1){
                id_prox = id-1;
            }else{
                id_prox = 0;
            }
        
        }else if(info == 9999){
                
            id_test = id+1;

            if($('#pagina-'+id_test).length){
                id_prox = id_test;
            
            }else{
                id_prox = id;
            }
            
        
        }else{

            id_prox = info;

        }

        $('#pagina-'+id).css('display','none');
        $('#pagina-'+id_prox).css('display','block');
        
    }

</script>

<?php 
    require_once 'footer.php';
}else{
     header('Location:http://localhost/Bookland/index.php');
}
    
 ?>