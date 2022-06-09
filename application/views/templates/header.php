<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="dsadhttps://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Khand:wght@600;900&family=Open+Sans&family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Uncle Sam's Barber Shop</title>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>public/favicon.ico">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="wrap">
    <header id="site-header">
      <div id="site-header-inner" class="clr container">
        <div id="site-logo" class="clr">
          <div id="site-logo-inner" class="clr">
            <a href="https://seuelias.com/" class="custom-logo-link" rel="home">
              <img src="<?php echo base_url(); ?>public/images/logo.png" width="100" height="100" alt="Uncle Sam's Barbe Shop">
            </a>
          </div><!-- #site-logo-inner -->
        </div><!-- #site-logo -->
        <div class="site-menu-social clr">
          <div class="site-menu-social-inner clr">
            <ul>
              <li>
                <a href="" aria-label="Twitter" target="_blank">
                  <span class="fa fa-twitter" aria-hidden="true"></span>
                </a>
              </li>
              <li>
                <a href="" aria-label="Facebook" target="_blank">
                  <span class="fa fa-facebook" aria-hidden="true"></span>
                </a>
              </li>
              <li>
                <a href="" aria-label="Instagram" target="_blank">
                  <span class="fa fa-instagram" aria-hidden="true"></span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div id="site-navigation-wrap" class="clr">
          <nav id="site-navigation" class="clr">
            <ul id="site-menu-principal">
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>sobre" class="menu-link"><span class="text-wrap">Sobre</span></a>
              </li>
              <li class="menu-item">
                <a href="" class="menu-link"><span class="text-wrap">Serviços</span></a>
              </li>
              <li class="menu-item">
                <a href="#" class="menu-link"><span class="text-wrap">Unidades</span></a>
              </li>
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>cursos" class="menu-link"><span class="text-wrap">Cursos</span></a>
              </li>
              <li class="menu-item">
                <a href="" class="menu-link"><span class="text-wrap">Loja</span></a>
              </li>
              <li class="menu-item menu-item-highlighted">
                <a href="<?php echo base_url(); ?>agendamento" class="menu-link"><span class="text-wrap">Agendar</span></a>
              </li>
            </ul>
          </nav><!-- #site-navigation -->
        </div><!-- #site-navigation-wrap -->
      </div>
    </header>
    <div id="site-content">
      <div class="site-content-inner">