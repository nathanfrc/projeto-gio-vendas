<div class="mainmenu-area">
        <div class="container">
            <div class="row">

    
    <div class="container">
    <div class="row">
    <?php 

   // var_dump($viewVar);

    if(isset($viewVar['sucesso']))
    {?>

        <div class="alert alert-success">
        <strong>Success!</strong> <?php echo $viewVar['sucesso']; ?>.
        </div>

 <?php } ?>

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
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" action ="<?php echo APP_HOST_ALL ?>login/logar" method="POST">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" 
                name="email" required autofocus>
                <label for="inputEmail">Email address</label>
                <br>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control"
                name="senha" placeholder="Password" required>
                <label for="inputPassword">Password</label>
                <br>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
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