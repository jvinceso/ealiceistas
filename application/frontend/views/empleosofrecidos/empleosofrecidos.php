<?php if(!isset($more)){ ?>
<div id="posts">
  <ul class="staff">
    <?php foreach ($registros as $fila) { 

      ?>
      <li>
        <div class="information">
          <div class="header">
            <div class="name">
              <cufontext><?php echo $fila['cEOfTitulo']?></cufontext>
            </div>
          </div>

          <div>
            <p><?php echo $fila['cEOfSumilla']; ?></p>
          </div>
        </div>
        <a class="link-button right" href="empleosofrecidos/anuncio/<?php echo $fila['nEOfId']?>/<?php echo str_replace(' ','-',$fila['cEOfTitulo'])?>">
          <span>Ver Mas</span>
        </a>
      </li>
      <?php } ?>
    </ul>
    <div>
      <?php echo $links;?>
    </div>
  </div>
  <?php }else{
    ?>
    <div id="posts">
      <!-- post -->
      <div class="post">
        <!-- post-header -->
        <div class="post-header single">
          <div class="post-title">
            <a href="single.html" ><?php echo $fila->cEOfTitulo?></a>
          </div>
          <div class="post-meta">
            PUBLICADO POR <a href="#">ADMINISTRADOR</a>
          </div>
        </div>
        <!-- ENDS post-header -->
        
        <!-- post-content -->               
        <div>
          <p><?php echo $fila->cEOfDescripcion?></p>
          <p>
            <?php echo $fila->cEOfDescripcion?>
            <a id="download" class="link-button right" target="_BLANK" href="<?php echo URL_DOWN_FILES.$fila->cEOfBases ?>">
              <span>Descargar Perfil</span>
            </a>
          </p>
        </div>
        <!-- ENDS post-content -->
      </div>
      <!-- ENDS post -->
    </div>      
    <?php
  } ?>