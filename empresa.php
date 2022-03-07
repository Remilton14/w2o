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
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Cadastrar empresa
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="exampleModalLabel">Cadastro de nova empresa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="text-start" method="POST" action="class/Class.cadastrar.empresa.php" id="form_cadastrar_empresa">
                                                <div class="mb-4">
                                                    <label for="razao_social" class="form-label text-dark">Razão Social</label>
                                                    <input type="text" class="form-control" name="razao_social" id="razao_social" aria-describedby="emailHelp">
                                                    <span class="d-none" id="msg_error_razao_social" style="position: absolute;font-size: .8rem;font-weight: normal;color: #f44336 !important;">É necessário preencher corretamente.</span>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="cnpj" class="form-label text-dark">CNPJ</label>
                                                    <input type="text" class="form-control" name="cnpj" id="cnpj" aria-describedby="emailHelp">
                                                    <span class="d-none" id="msg_error_cnpj" style="position: absolute;font-size: .8rem;font-weight: normal;color: #f44336 !important;">É necessário preencher corretamente.</span>
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
                                                    <label for="endereco" class="form-label text-dark">Endereço</label>
                                                    <input type="text" class="form-control" name="endereco" id="endereco" aria-describedby="emailHelp">
                                                    <span class="d-none" id="msg_error_endereco" style="position: absolute;font-size: .8rem;font-weight: normal;color: #f44336 !important;">É necessário preencher corretamente.</span>
                                                </div>
                                                <div class="text-center">
                                                    <input type="text" class="btn btn-primary" name="btn_cadastrar_empresa" id="btn_cadastrar_empresa" value="Cadastrar">
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
                                        <th scope="col">CNPJ</th>
                                        <th scope="col">Telefone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $contador = 0;
                                        $empresa = "SELECT * FROM `empresas` ORDER BY `id_empresa`";
                                        $empresa_query = mysqli_query($conn,$empresa);
                                        while($empresa_assoc = mysqli_fetch_assoc($empresa_query)){
                                            $contador++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $empresa_assoc['id_empresa'] ?></th>
                                                <td><?= $empresa_assoc['razao_social'] ?></td>
                                                <td><?= $empresa_assoc['cnpj'] ?></td>
                                                <td><?= $empresa_assoc['telefone'] ?></td>
                                                <td><?= $empresa_assoc['email'] ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <i class="fa fa-pencil text-danger me-5" aria-hidden="true"  data-bs-toggle="modal" data-bs-target="#empresa_edit<?= $contador ?>"></i>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="empresa_edit<?= $contador ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title text-dark" id="exampleModalLabel">Editar empresa: <?= $empresa_assoc['razao_social'] ?></h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="" method="POST" action="class/Class.editar.empresa.php" id="form_editar_empresa_edit<?= $contador ?>">
                                                                            <input type="hidden" name="id" value="<?= $empresa_assoc['id_empresa'] ?>">
                                                                            <div class="mb-4">
                                                                                <label for="razao_social_edit" class="form-label text-dark">Razão Social</label>
                                                                                <input type="text" class="form-control" name="razao_social_edit" id="razao_social_edit<?= $contador ?>" value="<?= $empresa_assoc['razao_social'] ?>">
                                                                                <span class="d-none" id="msg_error_razao_social_edit<?= $contador ?>" style="position: absolute;font-size: .8rem;font-weight: normal;color: #f44336 !important;">É necessário preencher corretamente.</span>
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label for="cnpj_edit" class="form-label text-dark">CNPJ</label>
                                                                                <input type="text" class="form-control" name="cnpj_edit" id="cnpj_edit<?= $contador ?>" value="<?= $empresa_assoc['cnpj'] ?>">
                                                                                <span class="d-none" id="msg_error_cnpj_edit<?= $contador ?>" style="position: absolute;font-size: .8rem;font-weight: normal;color: #f44336 !important;">É necessário preencher corretamente.</span>
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label for="telefone_edit" class="form-label text-dark">Telefone</label>
                                                                                <input type="text" class="form-control" name="telefone_edit" id="telefone_edit<?= $contador ?>" value="<?= $empresa_assoc['telefone'] ?>">
                                                                                <span class="d-none" id="msg_error_telefone_edit<?= $contador ?>" style="position: absolute;font-size: .8rem;font-weight: normal;color: #f44336 !important;">É necessário preencher corretamente.</span>
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label for="email_edit" class="form-label text-dark">E-mail</label>
                                                                                <input type="text" class="form-control" name="email_edit" id="email_edit<?= $contador ?>" value="<?= $empresa_assoc['email'] ?>">
                                                                                <span class="d-none" id="msg_error_email_edit<?= $contador ?>" style="position: absolute;font-size: .8rem;font-weight: normal;color: #f44336 !important;">É necessário preencher corretamente.</span>
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label for="endereco_edit" class="form-label text-dark">Endereço</label>
                                                                                <input type="text" class="form-control" name="endereco_edit" id="endereco_edit<?= $contador ?>" value="<?= $empresa_assoc['endereco'] ?>">
                                                                                <span class="d-none" id="msg_error_endereco_edit<?= $contador ?>" style="position: absolute;font-size: .8rem;font-weight: normal;color: #f44336 !important;">É necessário preencher corretamente.</span>
                                                                            </div>
                                                                            <div class="text-center">
                                                                                <input type="text" class="btn btn-primary" name="btn_editar_empresa" id="btn_editar_empresa<?= $contador ?>" value="Editar">
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                        
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <a href="class/Class.delete.empresa.php?empresa=<?= $empresa_assoc['id_empresa'] ?>"><i class="fa fa-trash text-secondary" aria-hidden="true"></i></a>
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
        <script src="assets/js/valida_cpf_cnpj.js"></script>
        <script>
            window.onload = function(){

                setTimeout(function(){
                    
                    $('#spinner').css('visibility','hidden');
                    $('#spinner').css('opacity', '0');
                    
                }, 2000);
            }

            $(document).ready(function(){
                var contador_tel     = 0;
                var contador_empresa = <?= $contador ?>;
                var arr_contador_empresa = [];

                $('#data_abertura_pj').mask("00/00/0000");
                $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
                $("#cep_pf,#cep_pj").mask("00.000-000");
                $('#cpf_pf').mask('000.000.000-00', {reverse: true});

                $('#telefone').keydown(function() {

                    if($(this).val().length == 15){
                    
                        $('#telefone').mask('(00) 00000-0009');

                    } else {

                        $('#telefone').mask('(00) 0000-0009');

                    }
                    
                });

                $('#btn_cadastrar_empresa').click(function(){

                    var emailFilter=/^.+@.+\..{2,}$/;
		            var illegalChars= /[\(\)\<\>\,\;\:\\\/\"\[\]]/;
                    var razao_social = $('#razao_social').val();
                    var cnpj         = $('#cnpj').val();
                    var telefone     = $('#telefone').val();
                    var email        = $('#email').val();
                    var endereco     = $('#endereco').val();

                    $('#razao_social').blur(function(){
                        if($(this).val() != ''){
                            $('#msg_error_razao_social').addClass('d-none');
                        }
                    });
                    $('#cnpj').blur(function(){
                        if($(this).val() != ''){

                            if(valida_cpf_cnpj( $(this).val() )){

                                $('#msg_error_cnpj').addClass('d-none');
                            }else{
                                $('#msg_error_cnpj').removeClass('d-none');
                                $('#msg_error_cnpj').text('CNPJ inválido');
                                $('#cnpj').focus();
                            }

                        }
                    });
                    $('#telefone').blur(function(){
                        if($(this).val() != ''){
                            $('#msg_error_telefone').addClass('d-none');
                        }
                    });
                    $('#email').blur(function(){
                       
                        if($(this).val() != ''){

                            $('#msg_error_email').addClass('d-none');
                        }
                        
                        
                    });


                    $('#endereco').blur(function(){
                        if($(this).val() != ''){
                            $('#msg_error_endereco').addClass('d-none');
                        }
                    });
                    
                    if(razao_social == ''){
                        $('#msg_error_razao_social').removeClass('d-none');
                        $('#razao_social').focus();
                    }else if(cnpj == ''){
                        $('#msg_error_cnpj').removeClass('d-none');
                        $('#cnpj').focus();
                    }else if(telefone == ''){
                        $('#msg_error_telefone').removeClass('d-none');
                        $('#telefone').focus();
                    }else if(email == ''){
                        $('#msg_error_email').removeClass('d-none');
                        $('#email').focus();
                    }else if(!(emailFilter.test(email))||email.match(illegalChars)){
                        $('#msg_error_email').removeClass('d-none');    
                        $('#email').focus();
                    }else if(endereco == ''){
                        $('#msg_error_endereco').removeClass('d-none');
                        $('#endereco').focus();
                    }else{
                        $('#form_cadastrar_empresa').submit();
                    }

                });

                //Edição
                for(var i = 0; i < contador_empresa;i++){
                    arr_contador_empresa.push(i + 1)
                }

                $.each(arr_contador_empresa,function(index,value){
                    $('#btn_editar_empresa' + value).click(function(){
                        console.log('#btn_editar_empresa' + value);
                        var emailFilter  = /^.+@.+\..{2,}$/;
                        var illegalChars = /[\(\)\<\>\,\;\:\\\/\"\[\]]/;

                        $('#razao_social_edit' + value).blur(function(){
                            if($(this).val()){
                                $('#msg_error_razao_social_edit' + value).addClass('d-none');
                            }
                        });
                        $('#cnpj_edit' + value).blur(function(){
                            if($(this).val()){
                                $('#msg_error_cnpj_edit' + value).addClass('d-none');
                            }
                        });
                        $('#telefone_edit' + value).blur(function(){
                            if($(this).val()){
                                $('#msg_error_telefone_edit' + value).addClass('d-none');
                            }
                        });
                        $('#email_edit' + value).blur(function(){
                        
                            if($(this).val()){

                                $('#msg_error_email_edit' + value).addClass('d-none');
                            }
                            
                            
                        });


                        $('#endereco_edit' + value).blur(function(){
                            if($(this).val()){
                                $('#msg_error_endereco_edit' + value).addClass('d-none');
                            }
                        });

                        if($('#razao_social_edit' + value).val() == ''){
                            $('#msg_error_razao_social_edit' + value).removeClass('d-none');
                            $('#razao_social_edit' + value ).focus();
                        }else if($('#cnpj_edit' + value).val() == ''){
                            $('#msg_error_cnpj_edit' + value).removeClass('d-none');
                            $('#cnpj_edit' + value).focus();
                        }else if($('#telefone_edit' + value).val() == ''){
                            $('#msg_error_telefone_edit' + value).removeClass('d-none');
                            $('#telefone_edit' + value).focus();
                        }else if($('#email_edit' + value).val() == ''){
                            $('#msg_error_email_edit' + value).removeClass('d-none');
                            $('#email_edit' + value).focus();
                        }else if(!(emailFilter.test($('#email_edit' + value).val()))||$('#email_edit' + value).val().match(illegalChars)){
                            $('#msg_error_email_edit' + value).removeClass('d-none');    
                            $('#email_edit' + value).focus();
                        }else if($('#endereco_edit' + value).val() == ''){
                            $('#msg_error_endereco_edit' + value).removeClass('d-none');
                            $('#endereco_edit' + value).focus();
                        }else{
                            $('#form_editar_empresa_edit' + value).submit();
                        }

                    });
                });

            });
        </script>
        <?php unset($_SESSION['msg']); ?>
    </body>
</html>