<style type="text/css" media="screen">
#container {
   width: 600px;
   margin: auto;
   font-family: helvetica, arial;
}

table {
   width: 600px;
   margin-bottom: 10px;
}

td {
   border-right: 1px solid #aaaaaa;
   padding: 1em;
}

td:last-child {
   border-right: none;
}

th {
   text-align: left;
   padding-left: 1em;
   background: #cac9c9;
   border-bottom: 1px solid white;
   border-right: 1px solid #aaaaaa;
}

#pagination a, #pagination strong {
   background: #e3e3e3;
   padding: 4px 7px;
   text-decoration: none;
   border: 1px solid #cac9c9;
   color: #292929;
   font-size: 13px;
}

#pagination strong, #pagination a:hover {
   font-weight: normal;
   background: #cac9c9;
}       
</style>
<div id="posts">
    <!-- staff -->
    <ul class="staff">
        <?php foreach ($registros as $fila) { 

          ?>
        <li>
            <div class="information">
                <div class="header">
                    <div class="name">
                        <!-- <cufon class="cufon cufon-canvas" alt="<?php echo $fila['cEOfTitulo']?>" style="width: 41px; height: 24px;"> -->
                        <!-- <canvas width="58" height="27" style="width: 58px; height: 27px; top: -5px; left: -1px;"></canvas> -->
                        <cufontext><?php echo $fila['cEOfTitulo']?></cufontext>
                        <!-- </cufon> -->
                    </div>
                </div>
                
                <div>
                    <p><?php echo $fila['cEOfSumilla']; ?></p>
                </div>
            </div>
            <a class="link-button right" href="empleosofrecidos/<?php echo $fila['nEOfId']?>/<?php echo str_replace(' ','-',$fila['cEOfTitulo'])?>">
                <span>Ver Mas</span>
            </a>
        </li>
        <?php } ?>
    </ul>
    <?php echo $this->pagination->create_links(); ?>
    <!-- // <?php echo $links;?> -->
    
<!--     <a class="link-button right" href="empleosofrecidos/all">
        <span>Ver Todos</span>
    </a> -->
    <!-- ENDS staff -->
</div>