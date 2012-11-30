<!-- </div> -->
<!-- FIN CONTENIDO DE LA VISTA-->

</div>
</div>

<!-- sidebar -->
<a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
<div class="sidebar">

    <div class="antiScroll">
        <div class="antiscroll-inner">
            <div class="antiscroll-content">

                <div class="sidebar_inner">
                    <form action="index.php?uid=1&amp;page=search_page" class="input-append" method="post" >
                        <input autocomplete="off" name="query" class="search_query input-medium" size="16" type="text" placeholder="Search..." /><button type="submit" class="btn"><i class="icon-search"></i></button>
                    </form>
                    <div id="side_accordion" class="accordion">

                        <?php
                        $opciones = $this->loaders->get_menu();
                        $count = count($opciones);
                        for ($i = 0; $i < $count; $i++) {
                            // $ico = ($opciones[$i]["active"] != "" ? "toggle-subnav-up-white.png" : "toggle-subnav-down.png");
                            ?>
                            <div class="accordion-group">
                                <div class="accordion-heading <?php echo $opciones[$i]['active']; ?>">
                                    <a href="#<?php echo $i?>" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                        <i class="<?php echo $opciones[$i]["icon"]?>"></i> <?php echo $opciones[$i]["menu"]; ?>
                                    </a>
                                </div>                            
                                <?php
                                $count2 = count($opciones[$i]["datos"]);
                                echo'<div '.$opciones[$i]["body"] .' id="'.$i.'">
                                        <div class="accordion-inner">
                                            <ul class="nav nav-list">';
                                            for ($j = 0; $j < $count2; $j++) {
                                            ?>                              
                                                <li <?php echo $opciones[$i]["datos"][$j]["li"]; ?>>
                                                    <a href="<?php echo $opciones[$i]["datos"][$j]["url"]; ?>"><?php echo $opciones[$i]["datos"][$j]["value"]; ?></a>
                                                </li>
                                            <?php
                                            }
                                      echo '</ul>';
                                  echo '</div>';
                              echo '</div>';
                        echo'</div>';
                            }
                            ?>                        
                </div>

                <div class="push"></div>
            </div>

            <div class="sidebar_info">
                <ul class="unstyled">
                    <li>
                        <span class="act act-warning">65</span>
                        <strong>New comments</strong>
                    </li>
                    <li>
                        <span class="act act-success">10</span>
                        <strong>New articles</strong>
                    </li>
                    <li>
                        <span class="act act-danger">85</span>
                        <strong>New registrations</strong>
                    </li>
                </ul>
            </div> 

        </div>
    </div>
</div>

</div>


</div>
</body>
</html>