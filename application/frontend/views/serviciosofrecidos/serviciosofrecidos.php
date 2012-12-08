<div id="posts">
    <!-- staff -->
    <ul class="staff">
        <?php
        // print_r($registros);exit();
        foreach ($registros as $fila) {
            ?>
            <li>
                <img width="130" height="155" alt="Pic" src="<?php echo URL_IMG; ?>guy.png">
                <div class="information">
                    <div class="header">
                        <div class="name">
                            <cufontext><?php echo $fila['cProNombre']?></cufontext>
                        </div>
                        <div class="name">
                            <!-- <cufon class="cufon cufon-canvas" alt="INGENIERO DE SISTEMAS " style="width: 41px; height: 24px;"> -->
                            <!-- <canvas width="58" height="27" style="width: 58px; height: 27px; top: -5px; left: -1px;"></canvas> -->
                            <cufontext><?php echo $fila['cProCarrera']?></cufontext>
                            <!-- </cufon> -->
                        </div>
                        <div class="contact"><a id="downloade" target="_BLANK" href="<?php echo URL_DOWN_CV.$fila['cProCurriculum']?>">Curriculum</a>  / <a href="<?php echo $fila['cProWeb']?>">Website</a> / <?php echo $fila['cProEmail']?></div>
                    </div>
                    <div>
                        <p>
                            <?php echo $fila['cProDescripcion']?>
                        </p>
                    </div>
                </div>
            </li>            
            <?php
        }
        ?>
    </ul>
    <!-- ENDS staff -->
    <div>
      <?php echo $links;?>
    </div>    
</div>
