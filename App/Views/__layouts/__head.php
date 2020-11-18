<?php
    header("Content-type: text/html; charset=iso-8859-1");
    
    //var_dump($this->getLogado());
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $titulo; ?></title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo  PATH_PUBLIC_HTML?>css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo  PATH_PUBLIC_HTML?>css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo  PATH_PUBLIC_HTML?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo  PATH_PUBLIC_HTML?>style.css">
    <link rel="stylesheet" href="<?php echo  PATH_PUBLIC_HTML?>css/responsive.css">


  </head>
  <body>
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="<?php echo APP_HOST_ALL ?>home/index"><i class="fa fa-user"></i> Home</a></li>
                            <?php if(!$this->getLogado()){ ?>     <li><a href="<?php echo APP_HOST_ALL ?>login/create"><i class="fa fa-user"></i> Cadastro</a></li><?php } ?>
                            <?php if(!$this->getLogado()){ ?>   <?php if(!isset($_COOKIE['nome'])){ echo '<li><a href='.APP_HOST_ALL.'login><i class="fa fa-user"></i> Login</a></li>'; } ?><?php } ?>
                            <?php if($this->getLogado()){ ?> <li><a href="<?php echo APP_HOST_ALL ?>login/logout"><i class="fa fa-user"></i> Logout</a></li><?php } ?>
                            <?php if($this->getLogado()){ ?>  <li><a href="<?php echo APP_HOST_ALL ?>produto/myProdutos"><i class="fa fa-user"></i> Meus produtos</a></li> <?php } ?>
                           <!-- <?php if($this->getLogado()){ ?>  <li><a href="<?php echo APP_HOST_ALL ?>produto/myProdutos"><i class="fa fa-user"></i> Meus pedidos</a></li> <?php } ?> -->
                            <li> <h5> <?php if(isset($_SESSION['nome'])){ echo "!Seja Bem-vindo ".strtoupper($_SESSION['nome']); }?></h5></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">moeda :</span><span class="value">BRL </span><b class="caret"></b></a>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">linguagem :</span><span class="value">Portugu s </span><b class="caret"></b></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="<?php echo  PATH_PUBLIC_HTML?>img/gio-logo-2.jpeg"></a></h1>
                       
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="<?php echo APP_HOST_ALL ?>produto/carrinho">Cart - <span class="cart-amunt"><?php echo $this->somaCarrinho(); ?></span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php echo $this->somaQuantidade(); ?></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->