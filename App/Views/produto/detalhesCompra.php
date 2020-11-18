    <?php //var_dump($viewVar); ?>
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
     
    <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="">Home</a>
                            <a href="">Máquina 3-D</a>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="<?php echo  $viewVar['produtos']['produto'][0]['caminho_img'];?>" alt="">
                                    </div>
                                    
                                    <div class="product-gallery">
                                        <img src="<?php echo  $viewVar['produtos']['produto'][0]['caminho_img_detalhes_um'];?>" alt="">
                                        <img src="<?php echo  $viewVar['produtos']['produto'][0]['caminho_img_detalhes_dois'];?>" alt="">
                                        <img src="<?php echo  $viewVar['produtos']['produto'][0]['caminho_img_detalhes_tres'];?>" alt="">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php echo $viewVar['produtos']['produto'][0]['nome']; ?></h2>
                                    <div class="product-inner-price">
                                        <ins><?php echo "R$ ".$viewVar['produtos']['produto'][0]['valor']; ?></ins>
                                    </div>    
                                    
                                    <form action="<?php echo APP_HOST_ALL ?>produto/addCarrinho/<?php echo $viewVar['produtos']['produto'][0]['id']; ?>" class="cart" method="POST">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                       <button  type="submit">Adicionar no Carrinho<button>
                                       
                                    </form>   
                                    
                                    <div class="product-inner-category">
                                        <p>Category: <a href="">Summer</a>. Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
                                    </div> 
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Descrição</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Avaliação</a></li>
                                            
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Produto Descrição</h2>  
                                                <p><?php echo $viewVar['produtos']['produto'][0]['descricao']; ?></p>

                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Avaliações</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               
                                </div>

                                <!-- teste -->

    <div class="single-sidebar">
                        <h2 class="sidebar-title">Itens de <?php echo $viewVar['cliente']['nome']; ?></h2>


                        <?php 

                        if(isset($viewVar['opcoes']))
                        {

                            for ($i=0; $i <sizeof($viewVar['opcoes']['produtos']) ; $i++)
                            {
                                ?>

            <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="<?php echo APP_HOST_ALL ?>produto/detalhesCompra/<?php echo $viewVar['opcoes']['produtos'][$i]['id'] ?>"><?php echo $viewVar['opcoes']['produtos'][$i]['nome']; ?></a></h2>
                            <div class="product-sidebar-price">
                                <ins><?php echo "R$ ".$viewVar['opcoes']['produtos'][$i]['valor']; ?></ins>
                            </div>                             
                        </div>






                     <?php       }






                        }

                        ?>

                    </div>





  <!-- teste -->   




                           </div>
                        </div>
</div>

