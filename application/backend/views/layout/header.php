<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $titulo; ?></title>
        
                <!-- Bootstrap framework -->
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>bootstrap/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>bootstrap/bootstrap-responsive.min.css" />
                <!-- gebo blue theme-->
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>blue.css" id="link_theme" />
                <!-- breadcrumbs-->
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>jBreadcrumbs/css/BreadCrumb.css" />
        <!-- tooltips-->
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>qtip2/jquery.qtip.min.css" />
                <!-- colorbox -->
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>colorbox/colorbox.css" />  
                <!-- code prettify -->
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>google-code-prettify/prettify.css" /> 
                <!-- notifications -->
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>sticky/sticky.css" />   
                <!-- splashy icons -->
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>splashy/splashy.css" />
                <!-- flags -->
        <!-- <link rel="stylesheet" href="<?php echo URL_CSS; ?>flags/flags.css" />	 -->
                <!-- calendar -->
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>fullcalendar/fullcalendar_gebo.css" />
                <!-- main styles -->
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>style.css" />
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
        <!-- Jqgrid -->
        <link rel="stylesheet" href="<?php echo URL_JS; ?>jqgrid/ui.jqgrid.css" />
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo URL_IMG?>favicon.ico" />

        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/ie.css" />
            <script src="js/ie/html5.js"></script>
                        <script src="js/ie/respond.min.js"></script>
                        <script src="lib/flot/excanvas.min.js"></script>
        <![endif]-->

        <script>
            //* hide all elements & show preloader
            document.documentElement.className += 'js';
        </script>
        <!-- Idiomas Jquery -->
        <script type="text/javascript" src='<?php echo URL_JS; ?>jquery-1.8.1.min.js'></script>
        <script type="text/javascript" src="<?php echo URL_JS; ?>jquery-ui-1.8.23.min.js"></script>
        <!-- smart resize event -->
        <script src="<?php echo URL_JS; ?>jquery.debouncedresize.min.js"></script>
        <!-- cleditor -->
        <script src="<?php echo URL_JS?>jquery.cleditor.min.js"></script>
        <!-- hidden elements width/height -->
        <script src="<?php echo URL_JS; ?>jquery.actual.min.js"></script>
        <!-- js cookie plugin -->
        <script src="<?php echo URL_JS; ?>jquery.cookie.min.js"></script>
        <!-- main bootstrap js -->
        <script src="<?php echo URL_JS; ?>bootstrap/bootstrap.min.js"></script>
        <!-- tooltips -->
        <script src="<?php echo URL_JS; ?>qtip2/jquery.qtip.min.js"></script>
        <!-- jBreadcrumbs -->
        <script src="<?php echo URL_JS; ?>jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
        <!-- lightbox -->
        <script src="<?php echo URL_JS; ?>colorbox/jquery.colorbox.min.js"></script>
        <!-- fix for ios orientation change -->
        <script src="<?php echo URL_JS; ?>ios-orientationchange-fix.js"></script>
        <!-- scrollbar -->
        <script src="<?php echo URL_JS; ?>antiscroll/antiscroll.js"></script>
        <script src="<?php echo URL_JS; ?>antiscroll/jquery-mousewheel.js"></script>
        <!-- common functions -->
        <script src="<?php echo URL_JS; ?>gebo_common.js"></script>
        <!-- touch events for jquery ui-->
        <script src="<?php echo URL_JS; ?>forms/jquery.ui.touch-punch.min.js"></script>
        <!-- multi-column layout -->
        <script src="<?php echo URL_JS; ?>jquery.imagesloaded.min.js"></script>
        <script src="<?php echo URL_JS; ?>jquery.wookmark.js"></script>
        <!-- responsive table -->
        <script src="<?php echo URL_JS; ?>jquery.mediaTable.min.js"></script>
        <!-- small charts -->
        <script src="<?php echo URL_JS; ?>jquery.peity.min.js"></script>
        <!-- calendar -->
        <script src="<?php echo URL_JS; ?>fullcalendar/fullcalendar.min.js"></script>
        <!-- sortable/filterable list -->
        <script src="<?php echo URL_JS; ?>list_js/list.min.js"></script>
        <script src="<?php echo URL_JS; ?>list_js/plugins/paging/list.paging.min.js"></script>
        <!-- dashboard functions -->
        <script src="<?php echo URL_JS; ?>gebo_dashboard.js"></script>
        <script src="<?php echo URL_JS; ?>jquery.validate.min.js"></script>
        <!-- Scripts para JQuery Grid -->
        <script src="<?php echo URL_JS; ?>jquery-ui-1.8.23.min.js"></script>
        <script src="<?php echo URL_JS; ?>jqgrid/grid.locale-es.js"></script>
        <script src="<?php echo URL_JS; ?>jqgrid/jquery.jqGrid.min.js"></script>
        <!-- <script src="<?php echo URL_JS; ?>menu.js"></script> -->
        <script src="<?php echo URL_JS; ?>jsGeneral.js"></script>
        <script>
            $(document).ready(function() {
                //* show all elements & remove preloader
                setTimeout('$("html").removeClass("js")',500);
            });
        </script>
        <link rel="stylesheet" href='<?php echo URL_CSS; ?>jquery-ui-1.8.23.custom.css'>
    </head>
    <body>
        <div id="loading_layer" style="display:none"><img src="<?php echo URL_IMG ?>/ajax_loader.gif" alt="" /></div>
        <div class="style_switcher">
            <div class="sepH_c">
                <p>Colores:</p>
                <div class="clearfix">
                    <a href="javascript:void(0)" class="style_item jQclr blue_theme style_active" title="blue">blue</a>
                    <a href="javascript:void(0)" class="style_item jQclr dark_theme" title="dark">dark</a>
                    <a href="javascript:void(0)" class="style_item jQclr green_theme" title="green">green</a>
                    <a href="javascript:void(0)" class="style_item jQclr brown_theme" title="brown">brown</a>
                    <a href="javascript:void(0)" class="style_item jQclr eastern_blue_theme" title="eastern_blue">eastern blue</a>
                    <a href="javascript:void(0)" class="style_item jQclr tamarillo_theme" title="tamarillo">tamarillo</a>
                </div>
            </div>
            <div class="sepH_c">
                <p>Fondos(Texturas):</p>
                <div class="clearfix">
                    <span class="style_item jQptrn style_active ptrn_def" title=""></span>
                    <span class="ssw_ptrn_a style_item jQptrn" title="ptrn_a"></span>
                    <span class="ssw_ptrn_b style_item jQptrn" title="ptrn_b"></span>
                    <span class="ssw_ptrn_c style_item jQptrn" title="ptrn_c"></span>
                    <span class="ssw_ptrn_d style_item jQptrn" title="ptrn_d"></span>
                    <span class="ssw_ptrn_e style_item jQptrn" title="ptrn_e"></span>
                </div>
            </div>
            <div class="sepH_c">
                <p>Distribuci&oacute;:</p>
                <div class="clearfix">
                    <label class="radio inline"><input type="radio" name="ssw_layout" id="ssw_layout_fluid" value="" checked /> Fluido</label>
                    <label class="radio inline"><input type="radio" name="ssw_layout" id="ssw_layout_fixed" value="gebo-fixed" /> Fijo</label>
                </div>
            </div>
            <div class="sepH_c">
                <p>Disposici&oacute;n:(Menu)</p>
                <div class="clearfix">
                    <label class="radio inline"><input type="radio" name="ssw_sidebar" id="ssw_sidebar_left" value="" checked /> Izquierda</label>
                    <label class="radio inline"><input type="radio" name="ssw_sidebar" id="ssw_sidebar_right" value="sidebar_right" /> Derecha</label>
                </div>
            </div>
            <div class="sepH_c">
                <p>Show top menu on:</p>
                <div class="clearfix">
                    <label class="radio inline"><input type="radio" name="ssw_menu" id="ssw_menu_click" value="" checked /> Click</label>
                    <label class="radio inline"><input type="radio" name="ssw_menu" id="ssw_menu_hover" value="menu_hover" /> Hover</label>
                </div>
            </div>

            <div class="gh_button-group">
                <a href="#" id="showCss" class="btn btn-primary btn-mini">Show CSS</a>
                <a href="#" id="resetDefault" class="btn btn-mini">Reset</a>
            </div>
            <div class="hide">
                <ul id="ssw_styles">
                    <li class="small ssw_mbColor sepH_a" style="display:none">body {<span class="ssw_mColor sepH_a" style="display:none"> color: #<span></span>;</span> <span class="ssw_bColor" style="display:none">background-color: #<span></span> </span>}</li>
                    <li class="small ssw_lColor sepH_a" style="display:none">a { color: #<span></span> }</li>
                </ul>
            </div>
        </div>

        <div id="maincontainer" class="clearfix">
            <!-- header -->
            <header>
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <a class="brand" href="dashboard.html"><i class="icon-home icon-white"></i>Panel Administracion</a>
                            <ul class="nav user_menu pull-right">
                                <li class="hidden-phone hidden-tablet">
                                    <div class="nb_boxes clearfix">
                                        <a data-toggle="modal" data-backdrop="static" href="#myMail" class="label ttip_b" title="New messages">25 <i class="splashy-mail_light"></i></a>
                                        <a data-toggle="modal" data-backdrop="static" href="#myTasks" class="label ttip_b" title="New tasks">10 <i class="splashy-calendar_week"></i></a>
                                        <a data-toggle="modal" data-backdrop="static" href="http://localhost/ealiceistas/" class="label ttip_b" title="Ver Sitio"> 
                                            <i class="splashy-application_windows_share"></i>
                                        </a>
                                    </div>
                                </li>
<!--                        <li class="divider-vertical hidden-phone hidden-tablet"></li>
                            <li class="dropdown">
                                    <a href="#" class="dropdown-toggle nav_condensed" data-toggle="dropdown"><i class="flag-gb"></i> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="flag-de"></i> Deutsch</a></li>
                                        <li><a href="javascript:void(0)"><i class="flag-fr"></i> FranÃ§ais</a></li>
                                        <li><a href="javascript:void(0)"><i class="flag-es"></i> EspaÃ±ol</a></li>
                                        <li><a href="javascript:void(0)"><i class="flag-ru"></i> PÑƒÑ�Ñ�ÐºÐ¸Ð¹</a></li>
                                    </ul>
                                </li> -->
                                <li class="divider-vertical hidden-phone hidden-tablet"></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img class="user_avatar" alt="" src="<?php echo URL_IMG?>user_avatar.png">
                                        <?php echo $this->session->userdata('Nombres');?><b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="user_profile.html">My Profile</a></li>
                                        <li><a href="javascrip:void(0)">Another action</a></li>
                                        <li class="divider"></li>
                                        <li><a href="login.html">Log Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <a data-target=".nav-collapse" data-toggle="collapse" class="btn_menu">
                                <span class="icon-align-justify icon-white"></span>
                            </a>
                            <nav>
                                <div class="nav-collapse">
                                    <ul class="nav">
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Forms <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="form_elements.html">Form elements</a></li>
                                                <li><a href="form_extended.html">Extended form elements</a></li>
                                                <li><a href="form_validation.html">Form Validation</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-th icon-white"></i> Components <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="alerts_btns.html">Alerts & Buttons</a></li>
                                                <li><a href="icons.html">Icons</a></li>
                                                <li><a href="notifications.html">Notifications</a></li>
                                                <li><a href="tables.html">Tables</a></li>
                                                <li><a href="tables_more.html">Tables (more examples)</a></li>
                                                <li><a href="tabs_accordion.html">Tabs & Accordion</a></li>
                                                <li><a href="tooltips.html">Tooltips, Popovers</a></li>
                                                <li><a href="typography.html">Typography</a></li>
                                                <li><a href="widgets.html">Widget boxes</a></li>
                                                <li class="dropdown">
                                                    <a href="#">Sub menu <b class="caret-right"></b></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">Sub menu 1.1</a></li>
                                                        <li><a href="#">Sub menu 1.2</a></li>
                                                        <li><a href="#">Sub menu 1.3</a></li>
                                                        <li>
                                                            <a href="#">Sub menu 1.4 <b class="caret-right"></b></a>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="#">Sub menu 1.4.1</a></li>
                                                                <li><a href="#">Sub menu 1.4.2</a></li>
                                                                <li><a href="#">Sub menu 1.4.3</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-wrench icon-white"></i> Plugins <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="charts.html">Charts</a></li>
                                                <li><a href="calendar.html">Calendar</a></li>
                                                <li><a href="datatable.html">Datatable</a></li>
                                                <li><a href="file_manager.html">File Manager</a></li>
                                                <li><a href="floating_header.html">Floating List Header</a></li>
                                                <li><a href="google_maps.html">Google Maps</a></li>
                                                <li><a href="gallery.html">Gallery Grid</a></li>
                                                <li><a href="wizard.html">Wizard</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-file icon-white"></i> Pages <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="chat.html">Chat</a></li>
                                                <li><a href="error_404.html">Error 404</a></li>
                                                <li><a href="mailbox.html">Mailbox</a></li>
                                                <li><a href="search_page.html">Search page</a></li>
                                                <li><a href="user_profile.html">User profile</a></li>
                                                <li><a href="user_static.html">User profile (static)</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                        </li>
                                        <li>
                                            <a href="documentation.html"><i class="icon-book icon-white"></i> Help</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="modal hide fade" id="myMail">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">×</button>
                        <h3>New messages</h3>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info">In this table jquery plugin turns a table row into a clickable link.</div>
                        <table class="table table-condensed table-striped" data-rowlink="a">
                            <thead>
                                <tr>
                                    <th>Sender</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Size</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Declan Pamphlett</td>
                                    <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                                    <td>23/05/2012</td>
                                    <td>25KB</td>
                                </tr>
                                <tr>
                                    <td>Erin Church</td>
                                    <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                                    <td>24/05/2012</td>
                                    <td>15KB</td>
                                </tr>
                                <tr>
                                    <td>Koby Auld</td>
                                    <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                                    <td>25/05/2012</td>
                                    <td>28KB</td>
                                </tr>
                                <tr>
                                    <td>Anthony Pound</td>
                                    <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                                    <td>25/05/2012</td>
                                    <td>33KB</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:void(0)" class="btn">Go to mailbox</a>
                    </div>
                </div>
                <div class="modal hide fade" id="myTasks">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">×</button>
                        <h3>New Tasks</h3>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info">In this table jquery plugin turns a table row into a clickable link.</div>
                        <table class="table table-condensed table-striped" data-rowlink="a">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Summary</th>
                                    <th>Updated</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>P-23</td>
                                    <td><a href="javascript:void(0)">Admin should not break if URL&hellip;</a></td>
                                    <td>23/05/2012</td>
                                    <td class="tac"><span class="label label-important">High</span></td>
                                    <td>Open</td>
                                </tr>
                                <tr>
                                    <td>P-18</td>
                                    <td><a href="javascript:void(0)">Displaying submenus in custom&hellip;</a></td>
                                    <td>22/05/2012</td>
                                    <td class="tac"><span class="label label-warning">Medium</span></td>
                                    <td>Reopen</td>
                                </tr>
                                <tr>
                                    <td>P-25</td>
                                    <td><a href="javascript:void(0)">Featured image on post types&hellip;</a></td>
                                    <td>22/05/2012</td>
                                    <td class="tac"><span class="label label-success">Low</span></td>
                                    <td>Updated</td>
                                </tr>
                                <tr>
                                    <td>P-10</td>
                                    <td><a href="javascript:void(0)">Multiple feed fixes and&hellip;</a></td>
                                    <td>17/05/2012</td>
                                    <td class="tac"><span class="label label-warning">Medium</span></td>
                                    <td>Open</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:void(0)" class="btn">Go to task manager</a>
                    </div>
                </div>
            </header>

            
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">

                    <!-- ACA VA EL CONTENIDO DE LA VISTA -->
                    <!-- <div class="row-fluid"> -->


