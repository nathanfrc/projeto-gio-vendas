<div class="mainmenu-area">
        <div class="container">
            <div class="row">

    <div class="container">
    <div class="row">

<?php //var_dump($viewVar['error']); ?>


<?php if(isset($viewVar['error']))
{
  ?>

<br>
<div class="alert alert-danger">
      <strong>Error!</strong> <?php echo $viewVar['error'][0]; ?>
</div>

<?php
}?>

   

      <div class="col-sm-9 col-md-7 col-lg-5">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Cadastro</h5>
            <form class="form-signin" action ="<?php echo APP_HOST_ALL ?>login/create" method="POST" >
              <div class="form-label-group">
              <label for="inputEmail">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" value="<?php echo isset($viewVar['cliente']['nome']) ? utf8_decode($viewVar['cliente']['nome']):''; ?>" required autofocus>
                <br>
              </div>

              <div class="form-label-group">
              <label for="inputEmail">Email address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email address" 
                value="<?php echo isset($viewVar['cliente']['email']) ? utf8_decode($viewVar['cliente']['email']):''; ?>" required autofocus>
                <br>
              </div>

              <div class="form-label-group">
              <label for="inputPassword">Password</label>
                <input type="password" id="senha"  name="senha" class="form-control" placeholder="Password" required>
                <br>
              </div>

    
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Cadastrar</button>
              <hr class="my-4">

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    </div>
    </div>
</div>