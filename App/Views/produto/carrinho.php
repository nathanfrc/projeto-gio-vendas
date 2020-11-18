<?php //var_dump($viewVar); ?>
<div class="mainmenu-area">
        <div class="container">
            <div class="row">

<div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="#">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Produtos</th>
                                            <th class="product-price">Valor</th>
                                            <th class="product-quantity">Quantidade</th>
                                           <!-- <th class="product-subtotal">Total</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>

                            <?php 
                                if(isset($viewVar['carrinhos']['carrinhos']) && !empty($viewVar['carrinhos']['carrinhos']))
                                { 
                                    
                                    for ($i=0; $i <sizeof($viewVar['carrinhos']['carrinhos']) ; $i++)
                                    {
                                    
                                    ?>


                                            <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="<?php echo APP_HOST_ALL ?>produto/tirarCarrinho/<?php echo  $viewVar['carrinhos']['carrinhos'][$i]['id'];?>?produto=<?php echo  $viewVar['carrinhos']['carrinhos'][$i]['produto_id'];?>">X</a> 
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="<?php echo $viewVar['carrinhos']['carrinhos'][$i]['caminho_img'] ?>"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="single-product.html"><?php echo  $viewVar['carrinhos']['carrinhos'][$i]['nome']?></a> 
                                            </td>

                                            <td class="product-price">
                                                <span class="amount"><?php echo  $viewVar['carrinhos']['carrinhos'][$i]['valor']?></span> 
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <input type="button" class="minus" value="-">
                                                    <input type="number" size="4" class="input-text qty text" title="Qty" value="1" min="0" step="1">
                                                    <input type="button" class="plus" value="+">
                                                </div>
                                            </td>

                                          <!--  <td class="product-subtotal">
                                                <span class="amount">Â£15.00</span> 
                                            </td>-->
                                        </tr>

                                    <?php } ?>


                                        <tr>
                                            <td class="actions" colspan="6">
                                                <div class="coupon">
                                                    <label for="coupon_code">Total:</label>
                                                    <input type="text" placeholder="valor" value="<?php echo $this->somaCarrinho(); ?>" id="coupon_code" class="input-text" name="coupon_code" disabled>
                                                   <!-- <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">-->
                                                </div>
                                             
        <a href="<?php echo APP_HOST_ALL ?>produto/compra"><button type="button" class="btn btn-primary">Checkout</button></a>
                            
                                            </td>
                                        </tr>




                         <?php       }else{ ?>


                                    Carrinho está vazio

                         <?php  }
                      
                    

                                ?>
                                        
                                       



                                    </tbody>
                                </table>



                            </form>

                            <div class="cart-collaterals">

                            <div class="cart_totals ">
                                <h2>Carrinho Total</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Carrinho Subtotal</th>
                                            <td><span class="amount">R$ <?php echo $this->somaCarrinho(); ?></span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Frete</th>
                                            <td>Free Frete</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td><strong><span class="amount">R$ <?php echo $this->somaCarrinho(); ?></span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
 </div>
</div>