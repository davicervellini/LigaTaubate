<!DOCTYPE html>

<html lang="pt-br">

    <head>
        <meta charset="utf-8" />
        <title>Painel Administrativo | Liga Municipal de Futebol de Taubaté</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="Grupo Vergueiro" name="author" />
        
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE; ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE; ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE; ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE; ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo BASE; ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
                      
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo BASE; ?>assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE; ?>assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />
                      
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo BASE; ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE; ?>ssets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
                       
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo BASE; ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE; ?>assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE; ?>assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE; ?>assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo BASE; ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo BASE; ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo BASE; ?>assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE; ?>assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo BASE; ?>assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
                       
        <!-- BEGIN MASK INPUT -->

        <script src="<?php echo BASE; ?>assets/js/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/js/jquery.mask.min.js" type="text/javascript"></script>
        <!-- END PMASK INPUT -->
		
       <!-- FAVICON -->
        <link rel="shortcut icon" href="https://ligataubate.com.br/assets/images/soccer/favicons/favicon-120.png">
       <link rel="apple-touch-icon" sizes="120x120" href="https://ligataubate.com.br/assets/images/soccer/favicons/favicon-120.png">
       <link rel="apple-touch-icon" sizes="152x152" href="https://ligataubate.com.br/assets/images/soccer/favicons/favicon-120.png"> 
        
        </head>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="<?php echo BASE; ?>painel/">
                        <img src="<?php echo BASE; ?>assets/layouts/layout/img/logo.png" alt="Liga Taubaté" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <span></span>
                    </div>
                </div>
                <!-- END LOGO -->
                
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte 
                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-bell"></i>
                                <span class="badge badge-default"> 7 </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>
                                        <span class="bold">12 pending</span> notifications</h3>
                                    <a href="page_user_profile_1.html">view all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">just now</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-plus"></i>
                                                    </span> New user registered. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">3 mins</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Server #12 overloaded. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">10 mins</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-warning">
                                                        <i class="fa fa-bell-o"></i>
                                                    </span> Server #2 not responding. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">14 hrs</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-info">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </span> Application error. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">2 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Database overloaded 68%. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">3 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> A user IP blocked. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">4 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-warning">
                                                        <i class="fa fa-bell-o"></i>
                                                    </span> Storage Server #4 not responding dfdfdfd. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">5 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-info">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </span> System Error. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">9 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Storage server failed. </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>-->
                        <!-- END NOTIFICATION DROPDOWN -->
                        <!-- BEGIN INBOX DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte 
                        <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-envelope-open"></i>
                                <span class="badge badge-default"> 4 </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>You have
                                        <span class="bold">7 New</span> Messages</h3>
                                    <a href="app_inbox.html">view all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="<?php echo BASE; ?>assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">Just Now </span>
                                                </span>
                                                <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="<?php echo BASE; ?>assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Richard Doe </span>
                                                    <span class="time">16 mins </span>
                                                </span>
                                                <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="<?php echo BASE; ?>assets/layouts/layout3/img/avatar1.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Bob Nilson </span>
                                                    <span class="time">2 hrs </span>
                                                </span>
                                                <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="<?php echo BASE; ?>assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">40 mins </span>
                                                </span>
                                                <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="<?php echo BASE; ?>assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Richard Doe </span>
                                                    <span class="time">46 mins </span>
                                                </span>
                                                <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>-->
                        <!-- END INBOX DROPDOWN -->
                        <!-- BEGIN TODO DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte 
                        <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-calendar"></i>
                                <span class="badge badge-default"> 3 </span>
                            </a>
                            <ul class="dropdown-menu extended tasks">
                                <li class="external">
                                    <h3>You have
                                        <span class="bold">12 pending</span> tasks</h3>
                                    <a href="app_todo.html">view all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">New release v1.2 </span>
                                                    <span class="percent">30%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Application deployment</span>
                                                    <span class="percent">65%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">65% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Mobile app release</span>
                                                    <span class="percent">98%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">98% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Database migration</span>
                                                    <span class="percent">10%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">10% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Web server upgrade</span>
                                                    <span class="percent">58%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">58% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Mobile development</span>
                                                    <span class="percent">85%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">85% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">New UI release</span>
                                                    <span class="percent">38%</span>
                                                </span>
                                                <span class="progress progress-striped">
                                                    <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">38% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>-->
                        <!-- END TODO DROPDOWN -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                               <!-- <img alt="" class="img-circle" src="<?php //echo BASE; ?>assets/layouts/layout/img/avatar3_small.jpg" />-->
                                <span class="username username-hide-on-mobile"> Administrador </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                               
                               <?php /*
                                <li>
                                    <a href="page_user_profile_1.html">
                                        <i class="icon-user"></i> Perfil </a>
                                </li>
                                <li>
                                    <a href="app_calendar.html">
                                        <i class="icon-calendar"></i> Agenda </a>
                                </li>
                                <li>
                                    <a href="app_inbox.html">
                                        <i class="icon-envelope-open"></i> Mensagens
                                        <span class="badge badge-danger"> 3 </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="app_todo.html">
                                        <i class="icon-rocket"></i> Tarefas
                                        <span class="badge badge-success"> 7 </span>
                                    </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="page_user_lock_1.html">
                                        <i class="icon-lock"></i> Bloquear Tela </a>
                                </li>
                                
                                */ ?>
                                <li>
                                    <a href="<?php echo BASE; ?>painel/logout">
                                        <i class="icon-key"></i> Sair do Sistema </a>
                                </li>

                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->

                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->

            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        
        <!-- BEGIN CONTAINER -->        
        <div class="page-container">
           <!-- BEGIN SIDEBAR -->
                <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">

                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <li class="nav-item start active open">
                            <a href="index" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title"><strong>PÁGINA INICIAL</strong></span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                        </li>
                        
                        <li class="heading">
                            <h3 class="uppercase"><strong>Sistema → Liga Taubaté</strong></h3>
                        </li>
                        <?php /*
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-institution"></i>
                                <span class="title"><strong>A Liga DEV </strong></span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="liga-cadastro-historia" class="nav-link ">
                                        <span class="title">História</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="liga-cadastro-presidentes" class="nav-link ">
                                        <span class="title">Presidentes</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="liga-cadastro-diretoria" class="nav-link ">
                                        <span class="title">Diretores</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="liga-cadastro-estatuto" class="nav-link ">
                                        <span class="title">Estatuto</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="liga-cadastro-transparencia" class="nav-link ">
                                        <span class="title">Transparência</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        */ ?>



                        <?php if(is_numeric($_SESSION["lgclube"])){ //menu dos clubes ?>


                        <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-shield"></i>
                                        <span class="title"><strong>Clubes</strong></span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?php echo BASE; ?>painel/clube_add/<?php echo $_SESSION["lgclube"];?>" class="nav-link ">
                                                <span class="title">Menu Clube</span>
                                            </a>
                                        </li>
               
                                    </ul>
                        </li>

                        <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-users"></i>
                                        <span class="title"><strong>Atletas</strong></span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?php echo BASE; ?>painel/atleta_add/<?php echo $_SESSION["lgclube"];?>" class="nav-link ">
                                                <span class="title">Adicionar Atleta</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?php echo BASE; ?>painel/atletas/<?php echo $_SESSION["lgclube"];?>" class="nav-link ">
                                                <span class="title">Atletas Cadastrados</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                        <?php } else { // menu padrão ?> } 

                        
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-shield"></i>
                                        <span class="title"><strong>Clubes</strong></span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?php echo BASE; ?>painel/clube_add" class="nav-link ">
                                                <span class="title">Adicionar Clube</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?php echo BASE; ?>painel/clubes" class="nav-link ">
                                                <span class="title">Clubes Cadastrados</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-users"></i>
                                        <span class="title"><strong>Atletas</strong></span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?php echo BASE; ?>painel/atleta_add" class="nav-link ">
                                                <span class="title">Adicionar Atleta</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?php echo BASE; ?>painel/atletas" class="nav-link ">
                                                <span class="title">Atletas Cadastrados</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                
                                <?php /*
                                 <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-users"></i>
                                        <span class="title"><strong>Comissão Técnica</strong></span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?php echo BASE; ?>painel/comissao_add" class="nav-link ">
                                                <span class="title">Adicionar Integrantes</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?php echo BASE; ?>painel/comissao" class="nav-link ">
                                                <span class="title">Integrantes Cadastrados</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                */
                                ?>
                                
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-flag-checkered"></i>
                                        <span class="title"><strong>Arbitragem </strong></span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item">
                                            <a href="<?php echo BASE; ?>painel/arbitragem_add" class="nav-link ">
                                                <span class="title">Adicionar Árbitro</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?php echo BASE; ?>painel/arbitragem" class="nav-link ">
                                                <span class="title">Árbitros</span>
                                            </a>
                                        </li>
                                        <?php /*
                                        <li class="nav-item  ">
                                            <a href="arbitragem-escala" class="nav-link ">
                                                <span class="title">Escalas</span>
                                            </a>
                                        </li>
                                        */ ?>
                                   
                                    </ul>
                                </li>

                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-trophy"></i>
                                        <span class="title"><strong>Jogos e Campeonatos</strong></span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?php echo BASE; ?>campeonato/add" class="nav-link ">
                                                <span class="title">Adicionar Campeonato</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?php echo BASE; ?>campeonato/" class="nav-link ">
                                                <span class="title">Visualizar Campeonatos</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                           <a href="<?php echo BASE; ?>campeonato/jogo_add" class="nav-link ">
                                                <span class="title">Adicionar Jogo</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?php echo BASE; ?>campeonato/jogos" class="nav-link ">
                                                <span class="title">Visualizar Rodada</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="#" class="nav-link ">
                                                <span class="title">Classificação</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                           <!--
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-list-alt"></i>
                                        <span class="title"><strong>Súmulas DEV</strong></span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="#" class="nav-link ">
                                                <span class="title">Criar Súmula</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="#" class="nav-link ">
                                                <span class="title">Imprimir Súmula</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="#" class="nav-link ">
                                                <span class="title">Anexar Súmula </span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                            -->
                                
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-photo"></i>
                                        <span class="title"><strong>Categorias </strong></span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?php echo BASE; ?>painel/categoria_add " class="nav-link ">
                                                <span class="title">Adicionar Categorias</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?php echo BASE; ?>painel/categorias" class="nav-link ">
                                                <span class="title">Categorias Cadastradas</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>                  

                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-newspaper-o"></i>
                                        <span class="title"><strong>Notícias</strong></span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?php echo BASE; ?>painel/noticia_add" class="nav-link ">
                                                <span class="title">Adicionar Notícias</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?php echo BASE; ?>painel/noticias" class="nav-link ">
                                                <span class="title">Visualizar Notícias</span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                                               
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-file-text-o"></i>
                                        <span class="title"><strong>Informativo</strong></span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?php echo BASE; ?>painel/informativo_add" class="nav-link ">
                                                <span class="title">Adicionar Informativo</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?php echo BASE; ?>painel/informativos" class="nav-link ">
                                                <span class="title">Visualizar Informativo</span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <?php /*                              
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-balance-scale"></i>
                                        <span class="title"><strong>TJD DEV</strong></span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="tjd-o-tribunal" class="nav-link ">
                                                <span class="title">O Tribunal</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="tjd-membros" class="nav-link ">
                                                <span class="title">Membros</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="tjd-citacoes" class="nav-link ">
                                                <span class="title">Citações</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="tjd-atas" class="nav-link ">
                                                <span class="title">Atas</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="tjd-resolucoes" class="nav-link ">
                                                <span class="title">Resoluções</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="tjd-jogadores-suspensos" class="nav-link ">
                                                <span class="title">Jogadores Suspensos</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                */ ?>
                                                                 
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-futbol-o"></i>
                                        <span class="title"><strong>Estádios</strong></span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?php echo BASE; ?>painel/estadio_add" class="nav-link ">
                                                <span class="title">Adicionar Estádio</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?php echo BASE; ?>painel/estadios" class="nav-link ">
                                                <span class="title">Estádios Cadastrados</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-photo"></i>
                                        <span class="title"><strong>Carterinhas </strong></span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?php echo BASE; ?>painel/carteirinhas" class="nav-link ">
                                                <span class="title">Imprimir Carterinha</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="nav-item  ">
                                    <a href="<?php echo BASE; ?>painel/atividades" class="nav-link nav-toggle">
                                        <i class="fa fa-newspaper-o"></i>
                                        <span class="title"><strong>Atividades</strong></span>
                                        
                                        
                                    </a>
                                    
                                    
                                </li>


                      <?php } ?>


                                                         
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            

            

        
           <!-- END SIDEBAR -->
            
            
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->


                		<?php
                        $this->loadViewInTemplate($viewName, $viewData);
                        ?>

                </div>
                    <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            
        </div>
        <!-- END CONTAINER -->
        
        <!-- BEGIN FOOTER -->
        
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2017 | Liga Municipal de Taubaté.
                <a href="#" title="" target="_blank">Grupo Vergueiro</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        
      
        <!-- END FOOTER -->
        
            
        <!--[if lt IE 9]>
<script src="<?php echo BASE; ?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo BASE; ?>assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo BASE; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo BASE; ?>assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/horizontal-timeline/horozontal-timeline.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        
        <?php /* removido para otimização
        <script src="<?php echo BASE; ?>assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        */?>    
        
        <!-- END PAGE LEVEL PLUGINS -->
       
       
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo BASE; ?>assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/autosize/autosize.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo BASE; ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
       
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo BASE; ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo BASE; ?>assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo BASE; ?>assets/global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo BASE; ?>assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo BASE; ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
            
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo BASE; ?>assets/pages/scripts/table-datatables-responsive.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

        <!--funçao ajax-->
        <script src="<?php echo BASE; ?>assets/js/ajax.js" type="text/javascript"></script>
       
    </body>

</html>