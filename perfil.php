<?php

session_start();


$connect = new mysqli("localhost","root","","bookland");
$query_books = "SELECT * FROM books WHERE books_usuario_id =".$_SESSION['usuario_conectado_id']." order by books_acessos desc LIMIT 4";

$consulta = mysqli_query($connect,$query_books);

$i=0;

while($array_books = mysqli_fetch_array($consulta)) {
    $books_arry[$i] = $array_books['books_nome'];
    $array_id[$i] = $array_books['books_id']; 
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
            <div class="row">    
                <div class="col-md-3">
                    <div class="media align-items-end profile-head">
                        <div class="profile mr-3"><img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" alt="..." width="230" class="rounded mb-2 img-thumbnail">
                        <div class="media-body mb-2 text-center"><h4 class="mt-0 mb-0"><?php print_r($_SESSION['nome']);?></h4></div>
                        <a href="#" class="btn btn-outline-dark btn-sm btn-block">Editar Perfil</a></div>
                    </div>

                    <div class=" bg-light p-4 d-flex text-center">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <h5 class="font-weight-bold mb-0 d-block">12</h5><small class="text-muted"> <i class="fas fa-image mr-1"></i>Books</small>
                            </li>
                            <li class="list-inline-item">
                                <h5 class="font-weight-bold mb-0 d-block">65</h5><small class="text-muted"> <i class="fas fa-user mr-1"></i>Leitores</small>
                            </li>
                            <li class="list-inline-item">
                                <h5 class="font-weight-bold mb-0 d-block">1566</h5><small class="text-muted"> <i class="fas fa-user mr-1"></i>Ranking</small>
                            </li>
                        </ul>
                    </div>
                    <div class="px-4 py-3">
                        <h5 class="mb-0">Sobre mim</h5>
                        <div class="p-4 rounded shadow-sm bg-light">
                            <p class="font-italic mb-0">Sou carismatico, legal e tenho muita vontade de escrever</p>
                            
                        </div>
                    </div>
                </div>
                <?php if(isset($_SESSION['em_book'])){?>
                <div class="col-md-8">
                    <div class="form-group purple-border">
                        <form id="contact-form" method="post" action="salvar_log.php" enctype="multipart/form-data" role="form">
                            <label for="exampleFormControlTextarea1">ESCREVA O BOOK</label>
                            <textarea  name="text_book" class="form-control rounded-0" id="text_book" rows="20"><?php print_r($_SESSION['texto_print'])?></textarea>
                        <div class="row">
                            <div class="col-md-6 mt-3"> <input type="submit" class="btn btn-success btn-send pt-2 btn-block " value="Salvar"></div>
                            <div class="col-md-6 mt-3"> <input type="button" class="btn btn-info btn-send pt-2 btn-block " value="Cancelar"></div>
                        </div>
                        </form>
                    </div>
                </div>
                <?php }else{ ?>
                <div class="col-md-8">
                    <div class="form-group purple-border">
                    
                        <div class="container"><div class=" text-center mt-5 ">
                                <h4>Inicie um novo Book</h4>
                            </div>
                            <div class="row ">
                                <div class="col-lg-10 mx-auto">
                                    <div class="card mt-2 mx-auto p-4 bg-light">
                                        <div class="card-body bg-light">
                                            <div class="container">
                                                <form id="contact-form" method="post" action="perfil_log.php" enctype="multipart/form-data" role="form">
                                                    <div class="controls">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group"> <label for="form_name">Titulo *</label> <input id="form_name" type="text" name="name" class="form-control" placeholder="Titulo do book" required="required" data-error="Nome do book requirido."> </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group"> <label for="form_lastname">Autor *</label> <input id="form_lastname" type="text" name="autor" placeholder="Autor do book" class="form-control"  required="required" data-error="Autor do book requerido"> </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group"> <label for="form_need">Lingua *</label> <select id="form_need" name="lingua" class="form-control" required="required" data-error="Lingua requerida">
                                                                        <option value="" selected disabled>Selecionar</option>
                                                                        <option>Portugues</option>
                                                                        <option>Ingles</option>
                                                                        <option>Espanhol</option>
                                                                        <option>Japones</option>
                                                                    </select> </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group"> <label for="form_need">Gênero *</label> <select id="form_need" name="genero" class="form-control" required="required" data-error="Genero requerido">
                                                                        <option value="" selected disabled>Selecionar</option>
                                                                        <option>Romance</option>
                                                                        <option>Suspense</option>
                                                                        <option>Aventura</option>
                                                                        <option>Reflexisivo</option>
                                                                    </select> </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                             <div class="col-md-6">
                                                                <div class="form-group"> <label for="form_need">Imagem *</label><input type="file" name="img" class="form-control" required="required" data-error="Imagem requerido">  </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group"> <label for="form_message">Resumo *</label> <textarea id="form_message" name="resumo" class="form-control" placeholder="Resumo do book" rows="4" required="required" data-error="Resumo requerido"></textarea> </div>
                                                            </div>
                                                            <div class="col-md-12"> <input type="submit" class="btn btn-success btn-send pt-2 btn-block " value="Criar book"></div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> <!-- /.8 -->
                                </div> <!-- /.row-->
                            </div>
                        </div>
                           
                    </div>
                </div>
            <?php }?>
            </div>
            <div class="py-4 px-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="mb-0">Meus Books</h5><a href="#" class="btn btn-link text-muted">Show all</a>
                </div>
                <div class="row">
                    <div class="col-lg-3 pr-lg-1"><img src="img/work/<?php print_r($books_arry[0])?>" alt="" class="img-fluid rounded shadow-sm">
                        <button type="button" onclick="EditaBook('<?php print_r($array_id[0])?>')" name="btn-edit1" class="primary-btn btn-dark">Editar</button>&nbsp;<button type="button" name="btn-ler1" class="primary-btn btn-dark ml-5">Ler</button></div>
                    <div class="col-lg-3 pl-lg-1"><img src="img/work/<?php print_r($books_arry[1])?>" alt="" class="img-fluid rounded shadow-sm">   
                        <button type="button" onclick="EditaBook('<?php print_r($array_id[1])?>')" name="btn-edit1" class="primary-btn btn-dark">Editar</button>&nbsp;<button type="button" name="btn-ler1" class="primary-btn btn-dark ml-5">Ler</button></div>
                    <div class="col-lg-3 pr-lg-1"><img src="img/work/<?php print_r($books_arry[2])?>" alt="" class="img-fluid rounded shadow-sm">
                        <button type="button" onclick="EditaBook('<?php print_r($array_id[2])?>')" name="btn-edit1" class="primary-btn btn-dark">Editar</button>&nbsp;<button type="button" name="btn-ler1" class="primary-btn btn-dark ml-5">Ler</button></div>
                    <div class="col-lg-3 pl-lg-1"><img src="img/work/<?php print_r($books_arry[3])?>" alt="" class="img-fluid rounded shadow-sm">
                        <button type="button" onclick="EditaBook('<?php print_r($array_id[3])?>')" name="btn-edit1" class="primary-btn btn-dark">Editar</button>&nbsp;<button type="button" name="btn-ler1" class="primary-btn btn-dark ml-5">Ler</button></div>
                </div>
            </div>
           
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