<?php
session_start();
include_once("bd/conexao.php");
if (!empty($_SESSION['id_user'])) {
} else {
   header("Location: login.php");
}

date_default_timezone_set('America/Sao_Paulo');
$data = date('Y-m-d');
$hora = date('H:i:s');
$datahora =  date('Y-m-d h:i:s');



// PEGANDO DADOS DO USUARIO
$iduser = $_SESSION['id_user'];
$sqluser = "SELECT * FROM usuarios WHERE id_user = '$iduser'";
$exeuser = mysqli_query($conn, $sqluser);
$user = mysqli_fetch_array($exeuser);


$cmd = "select * from empresas where empresa_id ='$user[user_empresa]'";
$ar = mysqli_query($conn, $cmd);
$empresa = mysqli_fetch_array($ar);



?>


<!doctype html>
<html lang="pt_br">

<head>



   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>CFC SÊNIOR</title>
   <?php $base = "http://" . $_SERVER['SERVER_NAME'] . '/cfcfacil2023/' ?>

   <base href="<?php echo $base ?>">
   <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&display=swap" rel="stylesheet">

   <!-- inject:css-->

   <link rel="stylesheet" href="assets/vendor_assets/css/bootstrap/bootstrap.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/daterangepicker.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/fontawesome.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/footable.standalone.min.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/fullcalendar@5.2.0.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/jquery-jvectormap-2.0.5.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/jquery.mCustomScrollbar.min.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/leaflet.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/line-awesome.min.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/magnific-popup.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/MarkerCluster.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/MarkerCluster.Default.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/select2.min.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/slick.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/star-rating-svg.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/trumbowyg.min.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/wickedpicker.min.css">

   <link rel="stylesheet" href="style.css">

   <!-- endinject -->

   <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png">

   <!-- Fonts -->
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>

<body class="layout-light side-menu">
   <div class="mobile-search">
      <form action="/" class="search-form">
         <img src="img/svg/search.svg" alt="search" class="svg">
         <input class="form-control me-sm-2 box-shadow-none" type="search" placeholder="Search..." aria-label="Search">
      </form>
   </div>
   <div class="mobile-author-actions"></div>
   <header class="header-top">
      <nav class="navbar navbar-light">
         <div class="navbar-left">
            <div class="logo-area">
               <a class="navbar-brand" href="home">
                  <img class="dark" src="img/logo-dark.png" alt="logo">
                  <img class="light" src="img/logo-white.png" alt="logo">
               </a>
               <a href="#" class="sidebar-toggle">
                  <img class="svg" src="img/svg/align-center-alt.svg" alt="img"></a>
            </div>


         </div>
         </div>
         <!-- ends: navbar-left -->
         <div class="navbar-right">
            <ul class="navbar-right__menu">


             <!--    <li class="nav-search">
                  <a href="#" class="search-toggle">
                     <i class="uil uil-search"></i>
                     <i class="uil uil-times"></i>
                  </a>
                  <form action="/" class="search-form-topMenu">
                     <span class="search-icon uil uil-search"></span>
                     <input class="form-control me-sm-2 box-shadow-none" type="search" placeholder="Search..." aria-label="Search">
                  </form>
               </li>

-->


                  <!--   <li class="nav-message">
                  <div class="dropdown-custom">
                     <a href="javascript:;" class="nav-item-toggle icon-active">
                        <img class="svg" src="img/svg/message.svg" alt="img">
                     </a>
                     <div class="dropdown-parent-wrapper">
                        <div class="dropdown-wrapper">
                           <h2 class="dropdown-wrapper__title">Messages <span class="badge-circle badge-success ms-1">2</span></h2>
                           <ul>
                              <li class="author-online has-new-message">
                                 <div class="user-avater">
                                    <img src="img/team-1.png" alt="">
                                 </div>
                                 <div class="user-message">
                                    <p>
                                       <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                       <span class="time-posted">3 hrs ago</span>
                                    </p>
                                    <p>
                                       <span class="desc text-truncate" style="max-width: 215px;">Lorem
                                          ipsum
                                          dolor amet cosec Lorem ipsum</span>
                                       <span class="msg-count badge-circle badge-success badge-sm">1</span>
                                    </p>
                                 </div>
                              </li>
                              <li class="author-offline has-new-message">
                                 <div class="user-avater">
                                    <img src="img/team-1.png" alt="">
                                 </div>
                                 <div class="user-message">
                                    <p>
                                       <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                       <span class="time-posted">3 hrs ago</span>
                                    </p>
                                    <p>
                                       <span class="desc text-truncate" style="max-width: 215px;">Lorem
                                          ipsum
                                          dolor amet cosec Lorem ipsum</span>
                                       <span class="msg-count badge-circle badge-success badge-sm">1</span>
                                    </p>
                                 </div>
                              </li>
                              <li class="author-online has-new-message">
                                 <div class="user-avater">
                                    <img src="img/team-1.png" alt="">
                                 </div>
                                 <div class="user-message">
                                    <p>
                                       <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                       <span class="time-posted">3 hrs ago</span>
                                    </p>
                                    <p>
                                       <span class="desc text-truncate" style="max-width: 215px;">Lorem
                                          ipsum
                                          dolor amet cosec Lorem ipsum</span>
                                       <span class="msg-count badge-circle badge-success badge-sm">1</span>
                                    </p>
                                 </div>
                              </li>
                              <li class="author-offline">
                                 <div class="user-avater">
                                    <img src="img/team-1.png" alt="">
                                 </div>
                                 <div class="user-message">
                                    <p>
                                       <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                       <span class="time-posted">3 hrs ago</span>
                                    </p>
                                    <p>
                                       <span class="desc text-truncate" style="max-width: 215px;">Lorem
                                          ipsum
                                          dolor amet cosec Lorem ipsum</span>
                                    </p>
                                 </div>
                              </li>
                              <li class="author-offline">
                                 <div class="user-avater">
                                    <img src="img/team-1.png" alt="">
                                 </div>
                                 <div class="user-message">
                                    <p>
                                       <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                       <span class="time-posted">3 hrs ago</span>
                                    </p>
                                    <p>
                                       <span class="desc text-truncate" style="max-width: 215px;">Lorem
                                          ipsum
                                          dolor amet cosec Lorem ipsum</span>
                                    </p>
                                 </div>
                              </li>
                           </ul>
                           <a href="" class="dropdown-wrapper__more">See All Message</a>
                        </div>
                     </div>
                  </div>
               </li>
-->

               <!-- ends: nav-message
               <li class="nav-notification">
                  <div class="dropdown-custom">
                     <a href="javascript:;" class="nav-item-toggle icon-active">
                        <img class="svg" src="img/svg/alarm.svg" alt="img">
                     </a>
                     <div class="dropdown-parent-wrapper">
                        <div class="dropdown-wrapper">
                           <h2 class="dropdown-wrapper__title">Notifications <span class="badge-circle badge-warning ms-1">4</span></h2>
                           <ul>
                              <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                 <div class="nav-notification__type nav-notification__type--primary">
                                    <img class="svg" src="img/svg/inbox.svg" alt="inbox">
                                 </div>
                                 <div class="nav-notification__details">
                                    <p>
                                       <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                       <span>sent you a message</span>
                                    </p>
                                    <p>
                                       <span class="time-posted">5 hours ago</span>
                                    </p>
                                 </div>
                              </li>
                              <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                 <div class="nav-notification__type nav-notification__type--secondary">
                                    <img class="svg" src="img/svg/upload.svg" alt="upload">
                                 </div>
                                 <div class="nav-notification__details">
                                    <p>
                                       <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                       <span>sent you a message</span>
                                    </p>
                                    <p>
                                       <span class="time-posted">5 hours ago</span>
                                    </p>
                                 </div>
                              </li>
                              <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                 <div class="nav-notification__type nav-notification__type--success">
                                    <img class="svg" src="img/svg/log-in.svg" alt="log-in">
                                 </div>
                                 <div class="nav-notification__details">
                                    <p>
                                       <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                       <span>sent you a message</span>
                                    </p>
                                    <p>
                                       <span class="time-posted">5 hours ago</span>
                                    </p>
                                 </div>
                              </li>
                              <li class="nav-notification__single nav-notification__single d-flex flex-wrap">
                                 <div class="nav-notification__type nav-notification__type--info">
                                    <img class="svg" src="img/svg/at-sign.svg" alt="at-sign">
                                 </div>
                                 <div class="nav-notification__details">
                                    <p>
                                       <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                       <span>sent you a message</span>
                                    </p>
                                    <p>
                                       <span class="time-posted">5 hours ago</span>
                                    </p>
                                 </div>
                              </li>
                              <li class="nav-notification__single nav-notification__single d-flex flex-wrap">
                                 <div class="nav-notification__type nav-notification__type--danger">
                                    <img src="img/svg/heart.svg" alt="heart" class="svg">
                                 </div>
                                 <div class="nav-notification__details">
                                    <p>
                                       <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                       <span>sent you a message</span>
                                    </p>
                                    <p>
                                       <span class="time-posted">5 hours ago</span>
                                    </p>
                                 </div>
                              </li>
                           </ul>
                           <a href="" class="dropdown-wrapper__more">See all incoming activity</a>
                        </div>
                     </div>
                  </div>
               </li>
 -->

               <!-- ends: .nav-notification 
               <li class="nav-settings">
                  <div class="dropdown-custom">
                     <a href="javascript:;" class="nav-item-toggle">
                        <img src="img/setting.png" alt="setting">
                     </a>
                     <div class="dropdown-parent-wrapper">
                        <div class="dropdown-wrapper dropdown-wrapper--large">
                           <ul class="list-settings">
                              <li class="d-flex">
                                 <div class="me-3"><img src="img/mail.png" alt=""></div>
                                 <div class="flex-grow-1">
                                    <h6>
                                       <a href="" class="stretched-link">All Features</a>
                                    </h6>
                                    <p>Introducing Increment subscriptions </p>
                                 </div>
                              </li>
                              <li class="d-flex">
                                 <div class="me-3"><img src="img/color-palette.png" alt=""></div>
                                 <div class="flex-grow-1">
                                    <h6>
                                       <a href="" class="stretched-link">Themes</a>
                                    </h6>
                                    <p>Third party themes that are compatible</p>
                                 </div>
                              </li>
                              <li class="d-flex">
                                 <div class="me-3"><img src="img/home.png" alt=""></div>
                                 <div class="flex-grow-1">
                                    <h6>
                                       <a href="" class="stretched-link">Payments</a>
                                    </h6>
                                    <p>We handle billions of dollars</p>
                                 </div>
                              </li>
                              <li class="d-flex">
                                 <div class="me-3"><img src="img/video-camera.png" alt=""></div>
                                 <div class="flex-grow-1">
                                    <h6>
                                       <a href="" class="stretched-link">Design Mockups</a>
                                    </h6>
                                    <p>Share planning visuals with clients</p>
                                 </div>
                              </li>
                              <li class="d-flex">
                                 <div class="me-3"><img src="img/document.png" alt=""></div>
                                 <div class="flex-grow-1">
                                    <h6>
                                       <a href="" class="stretched-link">Content Planner</a>
                                    </h6>
                                    <p>Centralize content gethering and editing</p>
                                 </div>
                              </li>
                              <li class="d-flex">
                                 <div class="me-3"><img src="img/microphone.png" alt=""></div>
                                 <div class="flex-grow-1">
                                    <h6>
                                       <a href="" class="stretched-link">Diagram Maker</a>
                                    </h6>
                                    <p>Plan user flows & test scenarios</p>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </li>
            ends: .nav-support -->
               
               <!-- ends: .nav-flag-select -->
               <li class="nav-author">
                  <div class="dropdown-custom">
                     <!-- <a href="javascript:;" class="nav-item-toggle"><img src="img/author-nav.jpg" alt="" class="rounded-circle"> -->
                        <span class="nav-itesm__title"><?php echo $user[user_nome] ?><i class="las la-angle-down nav-item__arrow"></i></span>
                     </a>
                    <!-- <div class="dropdown-parent-wrapper">
                        <div class="dropdown-wrapper">
                           <div class="nav-author__info">
                              <div class="author-img">
                                 <img src="img/author-nav.jpg" alt="" class="rounded-circle">
                              </div>
                              <div>
                                 <h6>Rabbi Islam Rony</h6>
                                 <span>UI Designer</span>
                              </div>
                           </div>
                           <div class="nav-author__options">
                              <ul>
                                 <li>
                                    <a href="">
                                       <i class="uil uil-user"></i> Profile</a>
                                 </li>
                                 <li>
                                    <a href="">
                                       <i class="uil uil-setting"></i>
                                       Settings</a>
                                 </li>
                                 <li>
                                    <a href="">
                                       <i class="uil uil-key-skeleton"></i> Billing</a>
                                 </li>
                                 <li>
                                    <a href="">
                                       <i class="uil uil-users-alt"></i> Activity</a>
                                 </li>
                                 <li>
                                    <a href="">
                                       <i class="uil uil-bell"></i> Help</a>
                                 </li>
                              </ul>
                              <a href="" class="nav-author__signout">
                                 <i class="uil uil-sign-out-alt"></i> Sign Out</a>
                           </div>
                        </div>
                        ends: .dropdown-wrapper -->
                     </div>
                  </div>
               </li>
               <!-- ends: .nav-author -->
            </ul>
            <!-- ends: .navbar-right__menu -->
            <div class="navbar-right__mobileAction d-md-none">
               <a href="#" class="btn-search">
                  <img src="img/svg/search.svg" alt="search" class="svg feather-search">
                  <img src="img/svg/x.svg" alt="x" class="svg feather-x"></a>
               <a href="#" class="btn-author-action">
                  <img class="svg" src="img/svg/more-vertical.svg" alt="more-vertical"></a>
            </div>
         </div>
         <!-- ends: .navbar-right -->
      </nav>
   </header>
   <main class="main-content">

      <div class="sidebar-wrapper">
         <div class="sidebar sidebar-collapse" id="sidebar">
            <div class="sidebar__menu-group">
               <ul class="sidebar_nav">


               

                  <li class="">
                     <a href="cad_aluno">
                     <span class="nav-icon uil uil-user"></span>
                        <span class="menu-text">Cadastrar Aluno</span>

                     </a>
                  </li>


                  <li class="">
                     <a href="alunos">
                        <span class="nav-icon uil uil-search"></span>
                        <span class="menu-text">Localizar Aluno</span>

                     </a>
                  </li>


                  <li class="has-child">
                     <a href="#">
                        <span class="nav-icon uil uil-create-dashboard"></span>
                        <span class="menu-text">Cadastros</span>
                        <span class="toggle-icon"></span>
                     </a>
                     <ul>
                        <li>
                           <a href="cadastrar_receitas">Receitas e Despesas</a>
                        </li>
                        <li>
                           <a href="cadastrar_pacotes">Pacotes</a>
                        </li>
                     </ul>
                  </li>

                  <li class="has-child">
                     <a href="#">
                        <span class="nav-icon uil uil-create-dashboard"></span>
                        <span class="menu-text">Colaboradores</span>
                        <span class="toggle-icon"></span>
                     </a>
                     <ul>
                        <li>
                           <a href="cadastrar_colaboradores">Cadastrar</a>
                        </li>
                        <li>
                           <a href="listar_colaboradores">Listar</a>
                        </li>
                     </ul>
                  </li>

                  <li class="has-child">
                     <a href="#">
                        <span class="nav-icon uil uil-create-dashboard"></span>
                        <span class="menu-text">Financeiro</span>
                        <span class="toggle-icon"></span>
                     </a>
                     <ul>
                        <li>
                           <a href="fluxo">Fluxo de Caixa</a>
                        </li>
                     </ul>
                  </li>

                  <li class="has-child">
                     <a href="#">
                        <span class="nav-icon uil uil-create-dashboard"></span>
                        <span class="menu-text">Fornecedores</span>
                        <span class="toggle-icon"></span>
                     </a>
                     <ul>
                        <li>
                           <a href="cadastrar_fornecedores">Cadastrar</a>
                        </li>
                        <li>
                           <a href="listar_fornecedores">Listar</a>
                        </li>
                     </ul>
                  </li>

                  <li class="has-child">
                     <a href="#">
                        <span class="nav-icon uil uil-create-dashboard"></span>
                        <span class="menu-text">Veículos</span>
                        <span class="toggle-icon"></span>
                     </a>
                     <ul>
                        <li>
                           <a href="cadastrar_veiculo">Cadastrar</a>
                        </li>
                        <li>
                           <a href="listar_veiculo">Listar</a>
                        </li>
                        <li>
                           <a href="escala_veiculos">Escalas</a>
                        </li>
                     </ul>
                  </li>

                  <li class="has-child">
                     <a href="#">
                        <span class="nav-icon uil uil-list-ul"></span>
                        <span class="menu-text">Relatorios</span>
                        <span class="toggle-icon"></span>
                     </a>
                     <ul>
                        <li>
                           <a href="vendas_dia">Movimentação do Dia</a>
                        </li>
                        <li>
                           <a href="vendas_geral">Movimentação Geral</a>
                        </li>
                        
                     </ul>
                  </li>


                 
               </ul>
               <BR>
               <div align="center">  
                  <a href="agendas" > <button class="btn btn-primary btn-default btn-rounded "><i class="fas fa-calendar-alt"></i>
                                       AGENDA
                                    </button> 
</a>
                                 </div>
            </div>
         </div>
      </div>
      </div>
      <div class="contents">

         <div class="crm mb-25">
            <div class="container-fluid">
               <div class="row ">
                  <div class="col-lg-12">

                     <br>
                  </div>
                  <div class="col-xxl-12">
                     <div class="row">
                        <div class="col-xxl-12 col-sm-12 mb-25">
                           <!-- Card 1  -->
                           <div id="div-content" class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">





                              <?php //
                              include "url.php"
                              ?>

                           </div>
                           <!-- Card 1 End  -->
                        </div>

                     </div>
                  </div>

               </div>
               <footer class="footer-wrapper">
                  <div class="footer-wrapper__inside">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="footer-copyright">
                                 <p><span>© 2023</span><a href="home">TAGS CRIATIVA</a>
                                 </p>
                              </div>
                           </div>
                           <div class="col-md-6">
                             <!--  <div class="footer-menu text-end">
                                 <ul>
                                    <li>
                                       <a href="#">About</a>
                                    </li>
                                    <li>
                                       <a href="#">Team</a>
                                    </li>
                                    <li>
                                       <a href="#">Contact</a>
                                    </li>
                                 </ul>
                              </div>
                             ends: .Footer Menu -->
                           </div>
                        </div>
                     </div>
                  </div>
               </footer>
   </main>
   <div id="overlayer">
      <div class="loader-overlay">
         <div class="dm-spin-dots spin-lg">
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
         </div>
      </div>
   </div>
   <div class="overlay-dark-sidebar"></div>
   <div class="customizer-overlay"></div>
   <!-- inject:js-->
   <script src="assets/vendor_assets/js/jquery/jquery-3.5.1.min.js"></script>
   <script src="assets/vendor_assets/js/jquery/jquery-ui.js"></script>
   <script src="assets/vendor_assets/js/bootstrap/popper.js"></script>
   <script src="assets/vendor_assets/js/bootstrap/bootstrap.min.js"></script>
   <script src="assets/vendor_assets/js/moment/moment.min.js"></script>
   <script src="assets/vendor_assets/js/accordion.js"></script>
   <script src="assets/vendor_assets/js/apexcharts.min.js"></script>
   <script src="assets/vendor_assets/js/autoComplete.js"></script>
   <script src="assets/vendor_assets/js/Chart.min.js"></script>
   <script src="assets/vendor_assets/js/daterangepicker.js"></script>
   <script src="assets/vendor_assets/js/drawer.js"></script>
   <script src="assets/vendor_assets/js/dynamicBadge.js"></script>
   <script src="assets/vendor_assets/js/dynamicCheckbox.js"></script>
   <script src="assets/vendor_assets/js/footable.min.js"></script>
   <script src="assets/vendor_assets/js/fullcalendar@5.2.0.js"></script>
   <script src="assets/vendor_assets/js/google-chart.js"></script>
   <script src="assets/vendor_assets/js/jquery-jvectormap-2.0.5.min.js"></script>
   <script src="assets/vendor_assets/js/jquery-jvectormap-world-mill-en.js"></script>
   <script src="assets/vendor_assets/js/jquery.countdown.min.js"></script>
   <script src="assets/vendor_assets/js/jquery.filterizr.min.js"></script>
   <script src="assets/vendor_assets/js/jquery.magnific-popup.min.js"></script>
   <script src="assets/vendor_assets/js/jquery.peity.min.js"></script>
   <script src="assets/vendor_assets/js/jquery.star-rating-svg.min.js"></script>
   <script src="assets/vendor_assets/js/leaflet.js"></script>
   <script src="assets/vendor_assets/js/leaflet.markercluster.js"></script>
   <script src="assets/vendor_assets/js/loader.js"></script>
   <script src="assets/vendor_assets/js/message.js"></script>
   <script src="assets/vendor_assets/js/moment.js"></script>
   <script src="assets/vendor_assets/js/muuri.min.js"></script>
   <script src="assets/vendor_assets/js/notification.js"></script>
   <script src="assets/vendor_assets/js/popover.js"></script>
   <script src="assets/vendor_assets/js/select2.full.min.js"></script>
   <script src="assets/vendor_assets/js/slick.min.js"></script>
   <script src="assets/vendor_assets/js/trumbowyg.min.js"></script>
   <script src="assets/vendor_assets/js/wickedpicker.min.js"></script>
   <script src="assets/theme_assets/js/apexmain.js"></script>
   <script src="assets/theme_assets/js/charts.js"></script>
   <script src="assets/theme_assets/js/drag-drop.js"></script>
   <script src="assets/theme_assets/js/footable.js"></script>
   <script src="assets/theme_assets/js/full-calendar.js"></script>
   <script src="assets/theme_assets/js/googlemap-init.js"></script>
   <script src="assets/theme_assets/js/icon-loader.js"></script>
   <script src="assets/theme_assets/js/jvectormap-init.js"></script>
   <script src="assets/theme_assets/js/leaflet-init.js"></script>
   <script src="assets/theme_assets/js/main.js"></script>
   <!-- endinject-->
</body>

</html>