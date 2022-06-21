<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Uncle Sam's Barber Shop</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Khand:wght@600;900&family=Open+Sans&family=Poppins:wght@300;400;600;700&display=swap">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/<?php echo $classe; ?>.css">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>public/favicon.ico">
</head>
<body>
  <div class="wrap">
    <header id="site-header">
      <div id="site-header-inner" class="container">
        <div id="site-logo">
          <div id="site-logo-inner">
            <a href="<?php echo base_url(); ?>" class="custom-logo-link" rel="home">
              <img src="<?php echo base_url(); ?>public/images/logo.png" width="100" height="100" alt="Uncle Sam's Barbe Shop">
            </a>
          </div>
        </div><!-- #site-logo -->
        <div id="site-navigation-wrap">
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
        <div id="site-login">
          <?php if(isset($usuario)) : ?>
            <a href="<?php echo base_url(); ?>login">
              <div class="login-icon"><i class="fa fa-user"></i></div>
              <div class="login-text"><small>Bem vindo(a)</small><?php echo $usuario['nome']; ?></div>
            </a>
          <?php else : ?>
            <a href="<?php echo base_url(); ?>login">
              <div class="login-icon"><i class="fa fa-user"></i></div>
              <div class="login-text"><small>Olá, entre</small>Minha conta</div>
            </a>
          <?php endif; ?>
        </div><!-- #site-login -->
      </div>
    </header>
    <div id="site-content" class="<?php echo $classe; ?>">
      <div class="site-content-inner">