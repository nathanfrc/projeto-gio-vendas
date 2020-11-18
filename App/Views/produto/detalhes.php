<div class="mainmenu-area">
        <div class="container">
            <div class="row">

    <div class="container">
    <div class="row">

<?php //var_dump($viewVar); ?>


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
            <h5 class="card-title text-center">Alterar de Produto</h5>
            <form class="form-signin" action ="<?php echo APP_HOST_ALL ?>produto/update/<?php echo $viewVar['produtos']['produto'][0]['id'] ?>" method="POST" enctype="multipart/form-data" >

              <div class="form-label-group">

             
            
              <select class="form-control" id="exampleFormControlSelect1">
                <option  <?php if($viewVar['produtos']['produto'][0]['ativo'] === '1'){echo "selected"; } ?>>Ativado</option>
                <option <?php if($viewVar['produtos']['produto'][0]['ativo'] === '0'){echo "selected"; } ?>>Desativado</option>
              </select>
              <label for="exampleFormControlSelect1">Status</label>
            </div>

              <div class="form-label-group">
              <label for="inputEmail">Nome:</label>

                <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" 
                value="<?php echo isset($viewVar['produtos']['produto'][0]['nome']) ? utf8_decode($viewVar['produtos']['produto'][0]['nome']):''; ?>" required autofocus>
                <br>
              </div>

              <div class="form-label-group">
              <label for="inputPassword">Descrição</label>
                <input type="text" id="descricao"  name="descricao" class="form-control" placeholder="Descrição" required
                value="<?php echo isset($viewVar['produtos']['produto'][0]['descricao']) ? utf8_decode($viewVar['produtos']['produto'][0]['descricao']):''; ?>">
                
                <br>
              </div>

              <div class="form-label-group">
              <label for="inputPassword">Valor</label>
                <input type="number" id="valor"  name="valor" class="form-control" placeholder="Valor" required
                value="<?php echo isset($viewVar['produtos']['produto'][0]['valor']) ? utf8_decode($viewVar['produtos']['produto'][0]['valor']):''; ?>">
                
                <br>
              </div>

              <div class="form-label-group">
              <label for="inputPassword">Imagem Principal</label>
                <input type="text" id="caminho_img"  name="caminho_img" class="form-control" placeholder="imagem" 
                value="<?php echo isset($viewVar['produtos']['produto'][0]['caminho_img']) ? utf8_decode($viewVar['produtos']['produto'][0]['caminho_img']):'';?>"  required>
              
                <br>
              </div>

              <div class="form-label-group">
              <label for="inputPassword">Imagem detalhes 1</label>
                <input type="text" id="caminho_img_um"  name="caminho_img_detalhes_um" class="form-control" placeholder="imagem" 
                value="<?php echo isset($viewVar['produtos']['produto'][0]['caminho_img_detalhes_um']) ? utf8_decode($viewVar['produtos']['produto'][0]['caminho_img_detalhes_um']):'';?>">
                
                <br>
              </div>

              <div class="form-label-group">
              <label for="inputPassword">Imagem detalhes 2</label>
                <input type="text" id="caminho_img_dois"  name="caminho_img_detalhes_dois" class="form-control" placeholder="imagem" 
                value="<?php echo isset($viewVar['produtos']['produto'][0]['caminho_img_detalhes_dois']) ? utf8_decode($viewVar['produtos']['produto'][0]['caminho_img_detalhes_dois']):'';?>" >
               
                <br>
              </div>

              <div class="form-label-group">
              <label for="inputPassword">Imagem detalhes 3</label>
                <input type="text" id="caminho_img_tres"  name="caminho_img_detalhes_tres" class="form-control" placeholder="imagem" 
                value="<?php echo isset($viewVar['produtos']['produto'][0]['caminho_img_detalhes_tres']) ? utf8_decode($viewVar['produtos']['produto'][0]['caminho_img_detalhes_tres']):'';?>">
               
                <br>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Alterar</button>
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