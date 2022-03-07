<?php
    session_start();
    include_once ('class/Class.conection.php');
  
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400&display=swap" rel="stylesheet">
        
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/font-awesome-4.7.0/css/font-awesome.css">

        <title>Teste PHP - W2O</title>
    </head>
    <body>
    
        <div class="spinner position-absolute d-flex justify-content-center align-items-center" id="spinner" style="width:100%;height:100%;background-color:#5a5a5a96;">
            <section class="spinner-ico" id="spinner-ico">
                <img width="100" src="assets/img/spinner.gif" alt="spinner">
            </section>
        </div>

        <div class="main" id="main">

            <section class="d-flex main_conteudo" id="main_conteudo">

                <div class="col-2 menu_left p-3" id="menu_left">
                    <a class="" href="index.php">
                        <h1 class="text-center text-w2o ms-2 me-2 mb-5 ">W2O</h1>
                    </a>

                    <h4 class="mb-2">Empresa</h4>
                    <ul class="ps-3 m-0">
                        <li><a href="empresa.php"><i class="fa fa-industry me-3" aria-hidden="true" style="font-size:16px;"></i> Empresas</a></li>
                    </ul>

                    <h4 class="mt-5 mb-2">Colaborador</h4>
                    <ul class="ps-3 m-0">
                        <li><a href="colaborador.php"><i class="fa fa-users me-3" aria-hidden="true" style="font-size:16px;"></i> Colaboradores</a></li>
                    </ul>
                </div>

                <div class="col-10 conteudo" id="conteudo">
                    <div class="text-end background-w2o p-4">
                        <i class="fa fa-user-circle-o" aria-hidden="true" style="font-size:18px;"></i>
                    </div>
                    <div class="p-4">
                        <div class="text-end mb-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#colaborador">
                                Cadastrar colaborador
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="colaborador" tabindex="-1" aria-labelledby="colaboradorLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="colaboradorLabel">Cadastro de nova empresa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="text-start" method="POST" action="class/Class.cadastrar.colaborador.php" id="form_cadastrar_colaborador">
                                                <div class="mb-4">
                                                    <label for="razao_social" class="form-label text-dark">Nome</label>
                                                    <input type="text" class="form-control" name="nome" id="nome" aria-describedby="emailHelp">
                                                    <span class="d-none" id="msg_error_nome" style="position: absolute;font-size: .8rem;font-weight: normal;color: #f44336 !important;">É necessário preencher corretamente.</span>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="telefone" class="form-label text-dark">Telefone</label>
                                                    <input type="text" class="form-control" name="telefone" id="telefone" aria-describedby="emailHelp">
                                                    <span class="d-none" id="msg_error_telefone" style="position: absolute;font-size: .8rem;font-weight: normal;color: #f44336 !important;">É necessário preencher corretamente.</span>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="email" class="form-label text-dark">E-mail</label>
                                                    <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                                                    <span class="d-none" id="msg_error_email" style="position: absolute;font-size: .8rem;font-weight: normal;color: #f44336 !important;">É necessário preencher corretamente.</span>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="empresa" class="form-label text-dark">Empresa</label>
                                                    <select class="form-select" name="empresa" id="empresa">
                                                        <option value="" selected>Escolha uma opção</option>
                                                        <?php
                                                            $empresa = "SELECT `id_empresa`, `razao_social` FROM `empresas` WHERE 1";
                                                            $empresa_query = mysqli_query($conn,$empresa);
                                                            while($colaborador_assoc = mysqli_fetch_assoc($empresa_query)){
                                                                ?>
                                                                    <option value="<?= $colaborador_assoc['id_empresa'] ?>"><?= $colaborador_assoc['razao_social'] ?></option>
                                                                <?php    
                                                            }
                                                        ?>
                                                      
                                                    </select>
                                                    <span class="d-none" id="msg_error_empresa" style="position: absolute;font-size: .8rem;font-weight: normal;color: #f44336 !important;">É necessário preencher corretamente.</span>
                                                </div>
                                                
                                                <div class="text-center">
                                                    <input type="text" class="btn btn-primary" name="btn_cadastrar_colaborador" id="btn_cadastrar_colaborador" value="Cadastrar">
                                                </div>
                                            </form>
                                        </div>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div classs="mt-3">
                            <?php
                                if(isset($_SESSION['msg'])){
                                    echo $_SESSION['msg'];
                                }
                            ?>
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Telefone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Empresa</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $contador = 0;
                                        $colaborador = "SELECT c.*,e.razao_social FROM `colaboradores` c INNER JOIN `empresas` e ON c.empresa_id = e.id_empresa";
                                        $colaborador_query = mysqli_query($conn,$colaborador);
                                        while($colaborador_assoc = mysqli_fetch_assoc($colaborador_query)){
                                            $contador++;
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $colaborador_assoc['id_colaborador'] ?></th>
                                            <td><?= $colaborador_assoc['nome_colaborador'] ?></td>
                                            <td><?= $colaborador_assoc['telefone_colaborador'] ?></td>
                                            <td><?= $colaborador_assoc['email_colaborador'] ?></td>
                                            <td><?= $colaborador_assoc['razao_social'] ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <i class="fa fa-pencil text-danger me-5" aria-hidden="true"  data-bs-toggle="modal" data-bs-target="#colaborador_edit<?= $contador ?>"></i>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="colaborador_edit<?= $contador ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-dark" id="exampleModalLabel">Editar colaborador: <?= $colaborador_assoc['nome'] ?></h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form class="" method="POST" action="class/Class.editar.colaborador.php" id="form_editar_colaborador_edit<?= $contador ?>">
                                                                        <input type="hidden" name="id" value="<?= $colaborador_assoc['id_colaborador'] ?>">
                                                                        <div class="mb-4">
                                                                            <label for="nome_edit" class="form-label text-dark">Nome</label>
                                                                            <input type="text" class="form-control" name="nome_edit" id="nome_edit<?= $contador ?>" value="<?= $colaborador_assoc['nome_colaborador'] ?>">
                                                                            <span class="d-none" id="msg_error_nome_edit<?= $contador ?>" style="position: absolute;font-size: .8rem;font-weight: normal;color: #f44336 !important;">É necessário preencher corretamente.</span>
                                                                        </div>
                                                                        <div class="mb-4">
                                                                            <label for="telefone_edit" class="form-label text-dark">Telefone</label>
                                                                            <input type="text" class="form-control" name="telefone_edit" id="telefone_edit<?= $contador ?>" value="<?= $colaborador_assoc['telefone_colaborador'] ?>">
                                                                            <span class="d-none" id="msg_error_telefone_edit<?= $contador ?>" style="position: absolute;font-size: .8rem;font-weight: normal;color: #f44336 !important;">É necessário preencher corretamente.</span>
                                                                        </div>
                                                                        <div class="mb-4">
                                                                            <label for="email_edit" class="form-label text-dark">Empresa</label>
                                                                            <select class="form-select" name="empresa_edit" name="empresa_edit<?= $contador ?>">
                                                                                
                                                                                <?php
                                                                                    $empresa = "SELECT `id_empresa`, `razao_social` FROM `empresas`";
                                                                                    $empresa_query = mysqli_query($conn,$empresa);
                                                                                    while($empresa_assoc = mysqli_fetch_assoc($empresa_query)){
                                                                                        if($colaborador_assoc['empresa_id'] == $empresa_assoc['id_empresa']){
                                                                                            ?>
                                                                                                <option value="<?= $empresa_assoc['id_empresa'] ?>" selected><?= $empresa_assoc['razao_social'] ?></option>
                                                                                            <?php
                                                                                        }else{

                                                                                            ?>
                                                                                                <option value="<?= $empresa_assoc['id_empresa'] ?>"><?= $empresa_assoc['razao_social'] ?></option>
                                                                                            <?php
                                                                                        }
                                                                                          
                                                                                    }
                                                                                ?>
                                                                              
                                                                            </select>
                                                                            <span class="d-none" id="msg_error_empresa_edit<?= $contador ?>" style="position: absolute;font-size: .8rem;font-weight: normal;color: #f44336 !important;">É necessário preencher corretamente.</span>
                                                                        </div>
                                                                        <div class="mb-4">
                                                                            <label for="email_edit" class="form-label text-dark">E-mail</label>
                                                                            <input type="text" class="form-control" name="email_edit" id="email_edit<?= $contador ?>" value="<?= $colaborador_assoc['email_colaborador'] ?>">
                                                                            <span class="d-none" id="msg_error_email_edit<?= $contador ?>" style="position: absolute;font-size: .8rem;font-weight: normal;color: #f44336 !important;">É necessário preencher corretamente.</span>
                                                                        </div>
                                                                       
                                                                        <div class="text-center">
                                                                            <input type="text" class="btn btn-primary" name="btn_editar_colaborador" id="btn_editar_colaborador<?= $contador ?>" value="Editar">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                    
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a href="class/Class.delete.colaborador.php?colaborador=<?= $colaborador_assoc['id_colaborador'] ?>"><i class="fa fa-trash text-secondary" aria-hidden="true"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </section>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="assets/js/jquery.mask.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script>
            window.onload = function(){

                setTimeout(function(){
                    
                    $('#spinner').css('visibility','hidden');
                    $('#spinner').css('opacity', '0');
                    
                }, 2000);
            }

            $(document).ready(function(){
                var contador_colaborador = <?= $contador ?>;
                var arr_contador_colaborador = [];

                $('#telefone').keydown(function() {

                    if($(this).val().length == 15){

                        $('#telefone').mask('(00) 00000-0009');

                    } else {

                        $('#telefone').mask('(00) 0000-0009');

                    }

                });

                $('#btn_cadastrar_colaborador').click(function(){

                    var emailFilter=/^.+@.+\..{2,}$/;
                    var illegalChars = /[\(\)\<\>\,\;\:\\\/\"\[\]]/;
                    var nome         = $('#nome').val();
                    var telefone     = $('#telefone').val();
                    var email        = $('#email').val();
                    var empresa      = $('#empresa').val();

                    $('#nome').blur(function(){
                        if($(this).val()){
                            $('#msg_error_nome').addClass('d-none');
                        }
                    });

                    $('#telefone').blur(function(){
                        if($(this).val()){
                            $('#msg_error_telefone').addClass('d-none');
                        }
                    });
                    $('#email').blur(function(){
                    
                        if($(this).val()){

                            $('#msg_error_email').addClass('d-none');
                        }
                        
                        
                    });


                    $('#empresa').change(function(){
                        if($(this).val()){
                            $('#msg_error_endereco').addClass('d-none');
                        }
                    });

                    if(nome == ''){
                        $('#msg_error_nome').removeClass('d-none');
                        $('#nome').focus();

                    }else if(telefone == ''){
                        $('#msg_error_telefone').removeClass('d-none');
                        $('#telefone').focus();
                    }else if(email == ''){
                        $('#msg_error_email').removeClass('d-none');
                        $('#email').focus();
                    }else if(!(emailFilter.test(email))||email.match(illegalChars)){
                        $('#msg_error_email').removeClass('d-none');    
                        $('#email').focus();
                    }else if(empresa == ''){
                        $('#msg_error_empresa').removeClass('d-none');
                        $('#empresa').focus();
                    }else{
                        $('#form_cadastrar_colaborador').submit();
                    }

                });

                for(var i = 0; i < contador_colaborador; i++){
                    arr_contador_colaborador.push(i+1);
                }

                $.each(arr_contador_colaborador,function(index,value){
                    $('#btn_editar_colaborador' + value).click(function(){

                        var emailFilter=/^.+@.+\..{2,}$/;
                        var illegalChars = /[\(\)\<\>\,\;\:\\\/\"\[\]]/;

                        $('#nome_edit' + value).blur(function(){
                            if($(this).val()){
                                $('#msg_error_nome_edit' + value).addClass('d-none');
                            }
                        });

                        $('#telefone_edit' + value).blur(function(){
                            if($(this).val()){
                                $('#msg_error_telefone_edit' + value).addClass('d-none');
                            }
                        });

                        $('#emailedit' + value).blur(function(){

                            if($(this).val()){

                                $('#msg_error_email_edit' + value).addClass('d-none');
                            }
                            
                            
                        });


                        if($('#nome_edit' + value).val() == ''){
                            $('#msg_error_nome_edit' + value).removeClass('d-none');
                            $('#nome_edit' + value).focus();
                        }else if($('#telefone_edit' + value).val() == ''){
                            $('#msg_error_telefone_edit' + value).removeClass('d-none');
                            $('#telefone_edit' + value).focus();
                        }else if($('#email_edit' + value).val() == ''){
                            $('#msg_error_email_edit' + value).removeClass('d-none');
                            $('#email_edit' + value).focus();
                        }else if(!(emailFilter.test($('#email_edit' + value).val()))||$('#email_edit' + value).val().match(illegalChars)){
                            $('#msg_error_email_edit' + value).removeClass('d-none');    
                            $('#email_edit' + value).focus();
                        }else if($('#empresa_edit' + value).val() == ''){
                            $('#msg_error_email_edit' + value).removeClass('d-none');
                            $('#empresa_edit' + value).focus();
                        }else{
                            $('#form_editar_colaborador_edit' + value).submit();
                        }

                    });
                });

            });
        </script>    
    </body>
</html>