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

                    
                    
                </div>
            </section>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            window.onload = function(){

                setTimeout(function(){
                    
                    $('#spinner').css('visibility','hidden');
                    $('#spinner').css('opacity', '0');
                    
                }, 2000);
            }
        </script>
    </body>
</html>