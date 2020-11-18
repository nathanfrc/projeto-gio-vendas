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

<?php
if(isset($viewVar['sucesso']))
    {?>

        <div class="alert alert-success">
        <strong>Success!</strong> <?php echo $viewVar['sucesso']; ?>.
        </div>

 <?php } ?>

      <div class="col-sm-9 col-md-7 col-lg-5">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Cadastro de Produto</h5>
            <form class="form-signin" action ="<?php echo APP_HOST_ALL ?>produto/create" method="POST" enctype="multipart/form-data" >
              <div class="form-label-group">
              <label for="inputEmail">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" 
                value="<?php echo isset($viewVar['produto']['nome']) ? utf8_decode($viewVar['produto']['nome']):''; ?>" required autofocus>
               
                <br>
              </div>

              <div class="form-label-group">
              <label for="inputPassword">Descrição</label>
                <input type="text" id="descricao"  name="descricao" class="form-control" placeholder="Descrição" required
                value="<?php echo isset($viewVar['produto']['descricao']) ? utf8_decode($viewVar['produto']['descricao']):''; ?>">
              
                <br>
              </div>

              <div class="form-label-group">
              <label for="inputPassword">Valor</label>
                <input type="number" id="valor"  name="valor" class="form-control" placeholder="Valor" required
                value="<?php echo isset($viewVar['produto']['valor']) ? utf8_decode($viewVar['produto']['valor']):''; ?>">
               
                <br>
              </div>

              <div class="form-label-group">
              <label for="inputPassword">Imagem Principal</label>
                <input type="text" id="caminho_img"  name="caminho_img" class="form-control" placeholder="imagem" required>
              
                <br>
              </div>

              <div class="form-label-group">
              <label for="inputPassword">Imagem detalhes 1</label>
                <input type="text" id="caminho_img_um"  name="caminho_img_detalhes_um" class="form-control" placeholder="imagem">
                
                <br>
              </div>

              <div class="form-label-group">
              <label for="inputPassword">Imagem detalhes 2</label>
                <input type="text" id="caminho_img_dois"  name="caminho_img_detalhes_dois" class="form-control" placeholder="imagem">
               
                <br>
              </div>

              <div class="form-label-group">
              <label for="inputPassword">Imagem detalhes 3</label>
                <input type="text" id="caminho_img_tres"  name="caminho_img_detalhes_tres" class="form-control" placeholder="imagem">
               
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