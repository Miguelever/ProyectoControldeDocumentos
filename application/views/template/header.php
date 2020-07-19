<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Control Documentos</title>

  <!-- Favicons -->
  <link href="<?= base_url('assets/img/favicon.png')?>" rel="icon">
  <link href="<?= base_url('assets/img/apple-touch-icon.png')?>" rel="apple-touch-icon"> 

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
  <!--external css-->
  <link href="<?= base_url('assets/lib/font-awesome/css/font-awesome.css')?>" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets/css/style.css')?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/style-responsive.css')?>" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="<?= base_url('documentos/mostrar')?>" class="logo"><b>CTRL<span>DOCS</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
              
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">7</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 7 new notifications</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Server Overloaded.
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-warning"><i class="fa fa-bell"></i></span>
                  Memory #2 Not Responding.
                  <span class="small italic">30 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Disk Space Reached 85%.
                  <span class="small italic">2 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-success"><i class="fa fa-plus"></i></span>
                  New User Registered.
                  <span class="small italic">3 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="<?= base_url('login/logout') ?>">Salir</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="<?= base_url('assets/img/ui-raquel.jpg')?>" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?= $this->session->userdata('nombreusuario')?></h5>
          <center><h6 class="centered"><?= $this->session->userdata('cargousuario')?></h6></center>
          <br>
          <li class="sub-menu">
            <a class="<?= $this->uri->segment(1) == 'documentos' ? 'active' : '' ?>" href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Documentos</span>
              </a>
            <ul class="sub">
              <li><a href="<?= base_url('documentos/mostrar')?>">Mostrar</a></li>
              <li><a href="<?= base_url('documentos/ingresar')?>">Ingresar</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a class="<?= $this->uri->segment(1) == 'personas' ? 'active' : '' ?>" href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Personas</span>
              </a>
            <ul class="sub">
              <li><a href="<?= base_url('personas/mostrar')?>">Mostrar</a></li>
              <li><a href="<?= base_url('personas/ingresar')?>">Ingresar</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a class="<?= $this->uri->segment(1) == 'info' ? 'active' : '' ?>" href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Info</span>
              </a>
            <ul class="sub">
              <li><a href="<?= base_url('info/')?>">About</a></li>
            </ul>
          </li>  
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
