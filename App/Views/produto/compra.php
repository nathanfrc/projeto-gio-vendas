<div class="mainmenu-area">
        <div class="container">
            <div class="row">


<form enctype="multipart/form-data" action="#" class="checkout" method="post" name="checkout">

<div id="customer_details" class="col2-set">
    <div class="col-1">
        <div class="woocommerce-billing-fields">
            <h3>Endereço de Entrega</h3>
            <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                <label class="" for="billing_address_1">Endereço<abbr title="required" class="required">*</abbr>
                </label>
                <input type="text" value="" placeholder="endereço" id="billing_address_1" name="billing_address_1" class="input-text ">
            </p>

            <p id="billing_address_2_field" class="form-row form-row-wide address-field">
                <input type="text" value="" placeholder="Apartamento, suíte, unidade etc. (opcional)" id="billing_address_2" name="billing_address_2" class="input-text ">
            </p>

            <p id="billing_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
                <label class="" for="billing_city">Cidade<abbr title="required" class="required">*</abbr>
                </label>
                <input type="text" value="" placeholder="Cidade" id="billing_city" name="billing_city" class="input-text ">
            </p>

            <p id="billing_postcode_field" class="form-row form-row-last address-field validate-required validate-postcode" data-o_class="form-row form-row-last address-field validate-required validate-postcode">
                <label class="" for="billing_postcode">CEP <abbr title="required" class="required">*</abbr>
                </label>
                <input type="text" value="" placeholder="CEP" id="billing_postcode" name="billing_postcode" class="input-text ">
            </p>

            <div class="clear"></div>


            <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                <label class="" for="billing_phone">Telefone<abbr title="required" class="required">*</abbr>
                </label>
                <input type="text" value="" placeholder="" id="Telefone" name="billing_phone" class="input-text ">
            </p>
            <div class="clear"></div>



        </div>
    </div>

   

</div>

<h3 id="order_review_heading">Pedido</h3>

<div id="order_review" style="position: relative;">
    <table class="shop_table">
        <thead>
            <tr>
                <th class="product-name">Produto</th>
                <th class="product-total">Total</th>
            </tr>
        </thead>
        <tbody>
        
        </tbody>
        <tfoot>

            <tr class="cart-subtotal">
                <th>Cart Subtotal</th>
                <td><span class="amount"><?php echo $this->somaCarrinho(); ?></span>
                </td>
            </tr>

            <tr class="shipping">
                <th>Shipping and Handling</th>
                <td>

                    Frete free
                    <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                </td>
            </tr>


            <tr class="order-total">
                <th>Order Total</th>
                <td><strong><span class="amount"><?php echo $this->somaCarrinho(); ?></span></strong> </td>
            </tr>

        </tfoot>
    </table>


    <div id="payment">
        <ul class="payment_methods methods">
            <li class="payment_method_bacs">
                <input type="radio" data-order_button_text="" checked="checked" value="bacs" name="payment_method" class="input-radio" id="payment_method_bacs">
                <label for="payment_method_bacs">
Transferência bancária direta</label>
                <div class="payment_box payment_method_bacs">
                    <p>Faça seu pagamento diretamente em nossa conta bancária. Use o seu ID do pedido como referência de pagamento. Seu pedido não será enviado até que os fundos sejam liberados em nossa conta.</p>
                </div>
            </li>
            <li class="payment_method_cheque">
                <input type="radio" data-order_button_text="" value="cheque" name="payment_method" class="input-radio" id="payment_method_cheque">
                <label for="payment_method_cheque">
pagamento por cheque </label>
                <div style="display:none;" class="payment_box payment_method_cheque">
                    <p>
Envie seu cheque para Nome da Loja, Rua da Loja, Cidade da Loja, Estado / Condado da Loja, Código Postal da Loja.</p>
                </div>
            </li>
            <li class="payment_method_paypal">
                <input type="radio" data-order_button_text="Proceed to PayPal" value="paypal" name="payment_method" class="input-radio" id="payment_method_paypal">
                <label for="payment_method_paypal">PayPal <img alt="PayPal Acceptance Mark" src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png"><a title="What is PayPal?" onclick="javascript:window.open('https://www.paypal.com/gb/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;" class="about_paypal" href="https://www.paypal.com/gb/webapps/mpp/paypal-popup">What is PayPal?</a>
                </label>
                <div style="display:none;" class="payment_box payment_method_paypal">
                    <p>Pague via PayPal; você pode pagar com cartão de crédito se não tiver uma conta do PayPal.</p>
                </div>
            </li>
        </ul>

        <div class="form-row place-order">

        <a href="<?php echo APP_HOST_ALL ?>produto/finalizar ">  <button type="button" class="btn btn-primary">Finalizar</button></a>


        </div>

        <div class="clear"></div>

    </div>
</div>
</form>


</div>
 </div>
</div>