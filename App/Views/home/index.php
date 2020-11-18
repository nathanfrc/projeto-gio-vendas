<div class="mainmenu-area">
        <div class="container">
            <div class="row">

            <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Ultimos Produtos</h2>
                        <div class="product-carousel">

              <?php if(isset($viewVar['listaProdutos']))
            { ?>
            
            <?php
		
    for ($i=0; $i <sizeof($viewVar['listaProdutos']['produtos']) ; $i++)
    {
   ?>

                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php //echo  PATH_PUBLIC_HTML?><?php echo $viewVar['listaProdutos']['produtos'][$i]['caminho_img'] ?>" alt="">
                                    <div class="product-hover">
                                     <!--   <a href="<?php echo APP_HOST_ALL ?>produto/addCarrinho/<?php echo  $viewVar['listaProdutos']['produtos'][$i]['id'];?>" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Comprar</a>
                                        <a href="<?php echo APP_HOST_ALL ?>produto/detalhesCompra/<?php echo  $viewVar['listaProdutos']['produtos'][$i]['id'];?>" class="view-details-link"><i class="fa fa-link"></i> Detalhes</a> -->

                                        <a href="<?php echo APP_HOST_ALL ?>produto/addCarrinho/<?php echo  $viewVar['listaProdutos']['produtos'][$i]['id'];?>" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Comprar</a>
                                        <a href="<?php echo APP_HOST_ALL ?>produto/detalhesCompra/<?php echo  $viewVar['listaProdutos']['produtos'][$i]['id'];?>" class="view-details-link"><i class="fa fa-link"></i> Detalhes</a>
                                    </div>
                                </div>
                                
                                <h2><a href="single-product.html"><?php echo $viewVar['listaProdutos']['produtos'][$i]['nome'] ?></a></h2>
                                
                                <div class="product-carousel-price">
                                    <ins>R$ <?php echo $viewVar['listaProdutos']['produtos'][$i]['valor'] ?></ins> <del>R$ 0.00</del>
                                </div> 
                            </div>

    <?php }?>

            <?php }else{ ?>

            <br>

            <div class="alert alert-warning">
            <strong>info</strong> Não há buscas.
            </div>


         <?php   }?>
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->

    
           
    </div>
  </div>
</div>