<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <title>Expresso API</title>
    <link rel="shortcut icon" href="../assets/images/image-logo.png" />

    <!-- Importação de CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/stylesMenu.css">
    <link rel="stylesheet" href="styles/stylesDashboard.css">
    <link rel="stylesheet" href="styles/stylesSettings.css">
    <link rel="stylesheet" href="styles/stylesContrast.css">

</head>

<!-- Dark mode (criação do objeto) -->
<?php

$theme_config = "";

if ($_COOKIE) {
    $theme_config = $_COOKIE["theme"];
} else {
    $theme_config = "light";
}

$theme = [
    "light" => [
        "background" => "#F5F5F5",
        "color" => "#343A40",

    ],
    "dark" => [
        "background" => "#121212",
        "color" => "#ffffff"
    ],
];

?>

<body>
    <div id="page-menu">

        <!-- Navegação lateral -->
        <nav id="sidebar">
            <ul id="menu-sidebar" class="nav nav-pills flex-column" role="tablist">
                <li class="sidebar-header">
                    <img src="../assets/images/image-logo.png" class="logo">
                    <img src="../assets/images/titulo-white.png" class="app-title">
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#dashboard" role="tab" title="Dashboard">
                        <img src="../assets/icons/dashboard.svg" alt="Dashboard">
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#settings" role="tab" title="Configurações">
                        <img src="../assets/icons/settings.svg" alt="Configurações">
                        <span class="ml-3">Configurações</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#logout" role="tab" title="Sair">
                        <img src="../assets/icons/logout.svg" alt="Sair">
                        <span class="ml-3">Sair</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Conteúdo das páginas -->
        <div class="menu-content">
            <div id="menu-sidebarContent" class="tab-content h-100">
                
               <!-- Dashboard -->
                <div class="h-100 tab-pane active" id="dashboard" role="tabpanel">
                    <header>
                        <button type="button" class="btn text-info collapse-sidebar">
                            <img src="../assets/icons/menu.svg">
                        </button>

                        <h1>Dashboard</h1>

                        <label class="switch">
                            <input type="checkbox" src="contrast.png" id="toggleTheme" 
                            <?php
                                if ($_COOKIE["theme"] == "dark") {
                                echo "checked";
                            }?>>
                            <span class="slider round"></span>
                        </label>
                    </header>

                    <main class="content" style="background-color: <?php echo $theme[$theme_config]["background"]; ?>; color: <?php echo $theme[$theme_config]["color"]; ?>">
                        <!-- conteúdo Dashboard -->
                        <div id="layoutSidenav_content">
                            <main>
                                <!--Filtro-->
                                <div class="filter">
                                    <label>Mês/Ano:
                                        <input id="date" type="date">
                                        <img src="../assets/icons/search.svg" alt="Pesquisar" id="buttonFilter">
                                    </label>
                                </div>

                                <div class="container-fluid">
                                    <div class="row">
                                        <!--Card com gráfico de pizza-->
                                        <div class="col-lg-6">
                                            <div class="card mb-4 doughnut-card">
                                                <div id="first-card" class="card-header" id="card-header-sms">
                                                    SMS

                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSms">
                                                        Detalhes
                                                    </button>
                                                </div>

                                                <!--Gráfico de pizza -->
                                                <div class="card-body" id="card-body-sms">
                                                    <canvas id="myDoughnutChartSms" width="100%" height="50"></canvas>
                                                </div>

                                                <!--Grid-->
                                                <section class="grid grid-template-columns-4">
                                                    <div class="item top first">10000</div>
                                                    <div class="item top second">0</div>
                                                    <div class="item top third">0</div>
                                                    <div class="item down first">CONTRATADO</div>
                                                    <div class="item down second">UTILIZADO</div>
                                                    <div class="item down third">EXTRAS</div>
                                                </section>
                                            </div>

                                            <!--Tabela-->
                                            <table name="tableSms">
                                                <tr>
                                                    <th colspan="2">Resumo do Plano Pacote SMS</th>
                                                </tr>

                                                <tr>
                                                    <td>Nome do plano</td>
                                                    <td>APP20</td>
                                                </tr>
                                                <tr>
                                                    <td>Valor mensal</td>
                                                    <td>R$ 500,00</td>
                                                </tr>
                                                <tr>
                                                    <td>Valor por mensagem</td>
                                                    <td>R$ 0,10</td>
                                                </tr>
                                            </table>

                                            <!--Card com gráfico de barras-->
                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <i class="fas fa-chart-bar mr-1"></i>
                                                    NÚMERO DIÁRIOS DE SMS

                                                    <!--ComboBox -->
                                                    <select name="weeksSms" id="weeksSms" class="weeks">
                                                        <option value="week1">Semana 1</option>
                                                        <option value="week2">Semana 2</option>
                                                        <option value="week3">Semana 3</option>
                                                        <option value="week4">Semana 4</option>
                                                    </select>
                                                </div>
                                                
                                                <!--Gráfico em barras -->
                                                <div class="card-body"><canvas id="myBarChartSms" width="100%" height="50"></canvas></div>
                                                <div class="average-use">USO MÉDIO DE SMS: 8</div>
                                            </div>
                                        </div>

                                        <!--Card com gráfico de pizza-->
                                        <div class="col-lg-6">
                                            <div class="card mb-4 doughnut-card">
                                                <div id="first-card" class="card-header">
                                                    CHAMADAS EXCEDENTES

                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalChamadas">
                                                        Detalhes
                                                    </button>
                                                </div>

                                                <!--Gráfico de pizza -->
                                                <div class="card-body">
                                                    <canvas id="myDoughnutChartCall" width="100%" height="50"></canvas>
                                                </div>

                                                <!--Grid-->
                                                <section class="grid grid-template-columns-4">
                                                    <div class="item top first">10000</div>
                                                    <div class="item top second">0</div>
                                                    <div class="item top third">0</div>
                                                    <div class="item down first">CONTRATADO</div>
                                                    <div class="item down second">UTILIZADO</div>
                                                    <div class="item down third">EXTRAS</div>
                                                </section>

                                            </div>

                                            <!--Tabela-->
                                            <table name="tableCall">
                                                <tr>
                                                    <th colspan="2">Resumo das Chamadas Excedentes</th>
                                                </tr>

                                                <tr>
                                                    <td>Nome do plano</td>
                                                    <td>APP21</td>
                                                </tr>
                                                <tr>
                                                    <td>Valor mensal</td>
                                                    <td>R$ 250,00</td>
                                                </tr>
                                                <tr>
                                                    <td>Valor por mensagem</td>
                                                    <td>R$ 0,10</td>
                                                </tr>
                                            </table>

                                            <!--Card com gráfico em barras-->
                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <i class="fas fa-chart-bar mr-1"></i>
                                                    NÚMERO CHAMADAS DIÁRIAS

                                                    <!--ComboBox-->
                                                    <select name="weeksSms" id="weeksSms" class="weeks">
                                                        <option value="week1">Semana 1</option>
                                                        <option value="week2">Semana 2</option>
                                                        <option value="week3">Semana 3</option>
                                                        <option value="week4">Semana 4</option>
                                                    </select>
                                                </div>

                                                <!--Gráfico em barras -->
                                                <div class="card-body"><canvas id="myBarChartCall" width="100%" height="50"></canvas></div>
                                                <div class="average-use">MÉDIA DE CHAMADAS DIÁRIAS DE SMS: 8</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </main>
                        </div>

                        <!-- Modal de mais detalhes sms-->
                        <div class="modal fade" id="modalSms" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <!-- Cabeçalho do modal -->
                                    <div class="modal-header">
                                        <label for="example-date-input input-sm" class="col-xs-2 col-form-label">Mês/Ano</label>
                                       
                                        <div class="col-xs-2">
                                            <input class="form-control ml-3" type="date" id="example-date-input">
                                        </div>
                                        
                                        <img src="../assets/icons/search.svg" class="align-self-center">
                                        <img src="../assets/icons/cancel.svg" class="close" data-dismiss="modal" aria-label="Close">
                                    </div>

                                    <!-- Conteúdo do modal -->
                                    <div class="modal-body">
                                        <h5 class="font-weight-bolder">Detalhes do Meu Plano SMS em Setembro/2020</h5>
                                        <div class="table-responsive-lg">
                                            <table id="table-datas" class="table table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Nome</th>
                                                        <th scope="col">Valor Mensal</th>
                                                        <th scope="col">Valor Adicional</th>
                                                        <th scope="col">Qtde.Máx Extra</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>APP20</td>
                                                        <td>R$ 500,00</td>
                                                        <td>R$ 0,10</td>
                                                        <td>1000</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <h5 class="font-weight-bolder">Meu uso</h5>
                                            <table id="table-datas" class="table table-striped table-responsive-lg">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Quantidade</th>
                                                        <th scope="col">Usados</th>
                                                        <th scope="col">Disponíveis</th>
                                                        <th scope="col">Extras</th>
                                                        <th scope="col">Valor Mensal</th>
                                                        <th scope="col">Valor Adicional por Extra</th>
                                                        <th scope="col">Valor Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>APP20</td>
                                                        <td>R$ 500,00</td>
                                                        <td>R$ 0,10</td>
                                                        <td>1000</td>
                                                        <td>APP20</td>
                                                        <td>R$ 500,00</td>
                                                        <td>R$ 0,10</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal de mais detalhes das chamadas -->
                        <div class="modal fade" id="modalChamadas" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    
                                    <!-- Cabeçalho do modal -->
                                    <div class="modal-header">
                                        <label for="example-date-input input-sm" class="col-xs-2 col-form-label font-weight-bold">Mês/Ano</label>
                                        <div class="col-xs-2">
                                            <input class="form-control ml-3" type="date" id="example-date-input">
                                        </div>
                                        <img src="../assets/icons/search.svg" class="align-self-center">
                                        <img src="../assets/icons/cancel.svg" class="close" data-dismiss="modal" aria-label="Close">

                                        </button>
                                    </div>

                                    <!-- Conteúdo do modal -->
                                    <div class="modal-body">
                                        <h5 class="font-weight-bolder">Detalhes do Meu Plano Chamadas Excedentes em
                                            Setembro/2020</h5>
                                        <div class="table-responsive-lg">
                                            <table class="table table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Nome</th>
                                                        <th scope="col">Valor Mensal</th>
                                                        <th scope="col">Valor Adicional</th>
                                                        <th scope="col">Qtde.Máx Extra</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>APP20</td>
                                                        <td>R$ 500,00</td>
                                                        <td>R$ 0,10</td>
                                                        <td>1000</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <h5 class="font-weight-bolder">Meu uso</h5>
                                            <table class="table table-striped table-responsive-lg">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Quantidade</th>
                                                        <th scope="col">Usados</th>
                                                        <th scope="col">Disponíveis</th>
                                                        <th scope="col">Extras</th>
                                                        <th scope="col">Valor Mensal</th>
                                                        <th scope="col">Valor Adicional por Extra</th>
                                                        <th scope="col">Valor Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>APP20</td>
                                                        <td>R$ 500,00</td>
                                                        <td>R$ 0,10</td>
                                                        <td>1000</td>
                                                        <td>APP20</td>
                                                        <td>R$ 500,00</td>
                                                        <td>R$ 0,10</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>

                <!-- Configurações -->
                <div class="h-100 tab-pane" id="settings" role="tabpanel">
                    
                    <!-- Cabeçalho configurações -->
                    <header>
                        <button type="button" class="btn text-info collapse-sidebar">
                            <img src="../assets/icons/menu.svg">
                        </button>
                        <h1>Settings</h1>

                        <label class="switch">
                            <input type="checkbox" src="contrast.png" id="toggleTheme" 
                            <?php if ($_COOKIE["theme"] == "dark") {
                                echo "checked";
                            }?>>
                            <span class="slider round"></span>
                        </label>
                    </header>

                    <main class="content">
                        <!-- Conteúdo -->
                        <div class="card">
                            <div id="card-settings" class="card-header">
                                Selecione abaixo os provedores
                            </div>
                            <div class="card-body-a">
                                <div class="card-y1">
                                    <select class="form-control-1">
                                        <option>JAMEF</option>
                                    </select>
                                </div>
                                <div class="card-z"></div>
                                <div class="card-y2">
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalConfirm">Adicionar</a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div id="card-settings" class="card-header">
                                Seus Provedores
                            </div>
                            <div class="card-x">
                                <div class="card-body">
                                    <div class="card-text">
                                        E-mail
                                    </div>
                                    <div id="card-provedor" class="card">
                                        <div class="card-body-b">
                                            JAMEF
                                        </div>
                                    </div>
                                    <a href="#" class="btn" data-toggle="modal" data-target="#modalConfirm"><img src="../assets/icons/delete.svg" alt="Excluir"></a>
                                </div>
                                <div class="card-body">
                                    <div class="card-text">
                                        E-mail
                                    </div>
                                    <div id="card-provedor" class="card">
                                        <div class="card-body-b">
                                            RTE
                                        </div>
                                    </div>
                                    <a href="#" class="btn" data-toggle="modal" data-target="#modalConfirm"><img src="../assets/icons/delete.svg" alt="Excluir"></a>
                                </div>
                            </div>

                            <div class="card-x">
                                <div class="card-body">
                                    <div class="card-text">
                                        E-mail
                                    </div>
                                    <div id="card-provedor" class="card">
                                        <div class="card-body-b">
                                            GBC
                                        </div>
                                    </div>
                                    <a href="#" class="btn" data-toggle="modal" data-target="#modalConfirm"><img src="../assets/icons/delete.svg" alt="Excluir"></a>
                                </div>
                                <div class="card-body">
                                    <div class="card-text">
                                        E-mail
                                    </div>
                                    <div id="card-provedor" class="card">
                                        <div class="card-body-b">
                                            ABC
                                        </div>
                                    </div>
                                    <a href="#" class="btn" data-toggle="modal" data-target="#modalConfirm"><img src="../assets/icons/delete.svg" alt="Excluir"></a>
                                </div>
                            </div>
                        </div>

                        <!-- Modal de Confimação de conta -->
                        <div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div id="modalCorfirm-header" class="modal-header">
                                        <h5 class="modal-title" id="modalLabel">Confirmação de Usuário</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true"><img src="../assets/icons/cancel.svg" alt=""></span>
                                        </button>
                                    </div>
                                    <div id="padding-modalCorfirm" class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">E-mail</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="meuemail@teste.com">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Senha</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="buttonConfirm" class="btn btn-primary bot-a">Confirmar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->

    <!-- Script para Boostrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

    <!--Script para menu-->
    <script>
        // arrow functions
        document.querySelectorAll('.collapse-sidebar')
            .forEach(collapse => {
                collapse.addEventListener('click', () => {
                    document.querySelector('#sidebar').classList.toggle('collapsed')
                })
            })
    </script>

    <!--Script para contraste!-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 
    <script>  
            const card = document.querySelector('.card');
            const grid = document.querySelector('.grid');

            function toggleDarkMode() {
                card.classList.toggle('dark');
                grid.classList.toggle('dark');
            }

            $("#toggleTheme").on('change', function() {
                if ($(this).is(':checked')) {
                    $(this).attr('value', 'true');
                    document.cookie = "theme=dark";
                    toggleDarkMode();
                    location.reload();

                } else {
                    $(this).attr('value', 'false');
                    document.cookie = "theme=light";
                    location.reload();
                }
            });
        </script>

        <!--Scripts para Dashboard-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

        <!--Script para Configuração-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

        <!--Scricpts dos gráficos-->
        <script src="../assets/js/chart-bar-sms.js"></script>
        <script src="../assets/js/chart-bar-call.js"></script>
        <script src="../assets/js/chart-doughnut-sms.js"></script>
        <script src="../assets/js/chart-doughnut-call.js"></script>

</body>

</html>