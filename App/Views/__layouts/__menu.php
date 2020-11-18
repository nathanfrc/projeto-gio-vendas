

<?php if (isset($viewVar['menu'])){ ?>

<div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo APP_HOST_ALL ?>/home/index">Home</a></li>
                        <li><a href="shop.html">Cadastro</a></li>
                        <li><a href="single-product.html">Contato</a></li>
                        <li><a href="cart.html">Produtos</a></li>
                        <li><a href="checkout.html">Sobre nos</a></li>
                        <li><a href="#">Sair</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->

<?php }?>
