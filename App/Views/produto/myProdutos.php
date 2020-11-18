<?php// var_dump($viewVar['listaProdutos']) ;?>
<div class="mainmenu-area">
        <div class="container">
            <div class="row">

          <a href="<?php echo APP_HOST_ALL ?>produto/create"><button type="button" class="btn btn-primary">+Adicionar Produto</button></a>

          <br>

          <?php if(isset($viewVar['listaProdutos']))
		        { ?>

                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
		
        for ($i=0; $i <sizeof($viewVar['listaProdutos']['produtos']) ; $i++)
        {
       ?>
                        <tr>
                        <th scope="row"><?php echo utf8_decode($viewVar['listaProdutos']['produtos'][$i]['id'])?></th>
                        <td><?php echo utf8_decode($viewVar['listaProdutos']['produtos'][$i]['nome'])?></td>
                        <td><?php echo utf8_decode($viewVar['listaProdutos']['produtos'][$i]['descricao'])?></td>
                        <td><?php echo "R$ ".utf8_decode($viewVar['listaProdutos']['produtos'][$i]['valor'])?></td>
                        <td><a href="<?php echo APP_HOST_ALL ?>produto/detalhes/<?php echo  $viewVar['listaProdutos']['produtos'][$i]['id'];?>"><button type="button" class="btn btn-success">Visualizar</button></a></td>
                        </tr>

        <?php } ?>

                    </tbody>
                    </table>

        

        <?php }else{ ?>
            <br>

            <div class="alert alert-warning">
            <strong>info</strong> Não há buscas.
            </div>

      <?php  } ?>

</div>
</div>
</div>
