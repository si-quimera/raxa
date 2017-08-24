<?php
$user = $this->session->userdata('usuario');

function cargaSubMenus($submenu) {
	if (empty($submenu)) return "";

	
	$strSubMenu = "<ul id=\"" . $submenu[0]->String2. "\" class=\"dropdown-content\">" . PHP_EOL;
	foreach ($submenu as $key => $value) {
		if($value->String3 != ""){
			$subsubmenu = 'class="dropdown-button2" data-hover="true" data-activates="'.$value->String3.'"';
		}else{
			$subsubmenu = "";
		}
		$link = $value->String5;
		//if ($value->acceso==1) {
		$strSubMenu .= PHP_EOL .
		"										<li> " . PHP_EOL .
		"											<a href=\"".base_url().$link."\" ".$subsubmenu."> " . PHP_EOL .
		"											" . $value->Nombre . PHP_EOL .
		"											</a> " . cargaSubMenus($value->submenu) . "\n" .														
		"										</li> " . PHP_EOL;
		//}
	}
	$strSubMenu .= "									</ul>" . PHP_EOL;
	return $strSubMenu;
}

?>
		<!-- #### -->
        <!-- Menu -->
        <!-- #### -->
        <div id="nav-content">
            <nav>
                <div class="row">
                    <div class="col s12">
                        <!-- ############ -->
                        <!-- Desktop Menu -->
                        <!-- ############ -->
                        <div class="nav-wrapper">
                            <a href="/" class="brand-logo">
                                <img src="<?= base_url(); ?>webroot/img/logo.png"/>
                                <span class="valign">
                                    <b class="main-text"></b> 
                                </span>
                            </a>
                            <!-- Desktop -->
                            <ul class="right hide-on-med-and-down">																
<?php


if(!empty($user['raxa_menu'])){		
	foreach ($user['raxa_menu'] as $item => $value) {
		$link = $value->String5;
?>
								<li>
									<a class="dropdown-button" href="<?=$link?>" data-activates="<?= $value->String2 ?>" data-constrainwidth="false" data-beloworigin="true" data-hover="true">
										<?=$value->Nombre?><i class="material-icons dropdown-icon right">arrow_drop_down</i>										
									</a>
									<?php
										echo cargaSubMenus($value->submenu);
									?>									
								</li>																
<?php
	}
}
?>								
                                <li class="profile ">
                                    <a class="dropdown-button" href="#!" data-activates="dropdown-profile" data-constrainwidth="false" data-beloworigin="true" data-alignment="right" data-hover="true">
                                        <div class="valign-wrapper">
                                            <i class="material-icons blue-text medium">account_circle</i>&nbsp;&nbsp;
											<?php											
											echo $user['Nombre'];
											?>											                                           
                                            <i class="material-icons dropdown-icon right">arrow_drop_down</i>
                                        </div>
                                    </a>									
									<ul id="dropdown-profile" class="dropdown-content">
										<li><a href="#!" data-position="top" data-delay="50" data-target="modal0">Cambio de Password </a></li>
										<li><a href="<?= base_url() ?>Login/logout/">Cerrar la sesión </a></li>
									</ul>									
									
                                </li>
                            </ul>

    
							
							
                            <!-- Mobile -->
                            <a href="#" data-activates="mobile-demo" class="button-collapse">
                                <i class="material-icons">menu</i>
                            </a>
                        </div>
						
						<!-- Modal Structure Add-->
						<div id="modal0" class="modal">
							<div class="modal-content">
								<h5></h5>										
								<div class="crud-app">																				
									<?php
									$attributes = array('id' => 'myform');
									echo form_open('/', $attributes);											
									?> 
										<div class="row">
											<div class="col s12 m12">
												<?php
												$msg = $this->session->flashdata('msg');
												if ($msg){
													echo $msg;
												}
												?>                             		
												<div class="panel-body">                                           
													<div class="row no-gutter">		
														<div class="input-field col s6 active">
															<input name="Nombre" id="Nombre" type="text" value="" placeholder=" " disabled>
															<label for="Nombre">Nombre</label>
															<input type="hidden" name="update_id" id="update_id" value="" />
														</div>																	
														<div class="input-field col s6">
															<input name="String1" id="String1" type="text" value="" placeholder=" ">
															<label for="String1">String 1</label>
														</div>																
													</div>  
													<div class="row no-gutter">
														<div class="input-field col s6">
															<input name="String2" id="String2" type="text" value=""  placeholder=" ">
															<label for="String2">String 2</label>
														</div>														
														<div class="input-field col s6">
															<input name="String3" id="String3" type="text" value="" placeholder=" ">
															<label for="String3">String 3</label>
														</div>												
													</div>
													<div class="row no-gutter">
														<div class="input-field col s6">
															<input name="String4" id="String4" type="text" value="" placeholder=" ">
															<label for="String4">String 4</label>
														</div>													
														<div class="input-field col s6">
															<input name="String5" id="String5" type="text" value="" placeholder=" ">
															<label for="String5">String 5</label>
														</div>												
													</div>  											
												</div>
												<div class="panel-footer">
													<div class="right-align">
														<button type="button" class="btn-flat waves-effect modal-close">
															CERRAR
														</button>																
														<button type="button" id="botton-edit" class="btn-flat waves-effect">
															ACTUALIZAR
														</button>																
													</div>
												</div>
											</div>
										</div>
									<?= form_close() ?>						
								</div>
							</div>																						
						</div>   						

					
                        <!-- ########### -->
                        <!-- Mobile Menu -->
                        <!-- ########### -->
						
	  <!--
                        <ul class="side-nav" id="mobile-demo">
                            <li class="logo">
                                <img src="img/logo.png"/>
                                <p>
                                    <b class="main-text">Aero</b> Admin
                                </p>
                            </li>

                            <li>
                                <a href="index.html" class="waves-effect">Dashboard</a>
                            </li>

                            <li class="padding-0">
                                <ul class="collapsible collapsible-accordion">
                                    <li class="bold">
                                        <a class="collapsible-header waves-effect">CSS</a>
                                        <div class="collapsible-body">
                                            <ul>
                                                <li><a href="css_color.html">Color</a></li>
                                                <li><a href="css_grid.html">Grid</a></li>
                                                <li><a href="css_helpers.html">Helpers</a></li>
                                                <li><a href="css_media.html">Media</a></li>
                                                <li><a href="css_sass.html">Sass</a></li>
                                                <li><a href="css_shadow.html">Shadow</a></li>
                                                <li><a href="css_table.html">Table</a></li>
                                                <li><a href="css_typography.html">Typography</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="bold">
                                        <a class="collapsible-header waves-effect">Components</a>
                                        <div class="collapsible-body">
                                            <ul>
                                                <li><a href="components_badges.html">Badges</a></li>
                                                <li><a href="components_buttons.html">Buttons</a></li>
                                                <li><a href="components_breadcrumbs.html">Breadcrumbs</a></li>
                                                <li><a href="components_cards.html">Cards</a></li>
                                                <li><a href="components_chips.html">Chips</a></li>
                                                <li><a href="components_collections.html">Collections</a></li>
                                                <li><a href="components_footer.html">Footer</a></li>
                                                <li><a href="components_forms.html">Forms</a></li>
                                                <li><a href="components_icons.html">Icons</a></li>
                                                <li><a href="components_navbar.html">Navbar</a></li>
                                                <li><a href="components_pagination.html">Pagination</a></li>
                                                <li><a href="components_preloader.html">Preloader</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="bold">
                                        <a class="collapsible-header waves-effect">JavaScript</a>
                                        <div class="collapsible-body">
                                            <ul>
                                                <li><a href="js_collapsible.html">Collapsible</a></li>
                                                <li><a href="js_dialogs.html">Dialogs</a></li>
                                                <li><a href="js_dropdown.html">Dropdown</a></li>
                                                <li><a href="js_media.html">Media</a></li>
                                                <li><a href="js_modals.html">Modals</a></li>
                                                <li><a href="js_parallax.html">Parallax</a></li>
                                                <li><a href="js_pushpin.html">Pushpin</a></li>
                                                <li><a href="js_scrollfire.html">ScrollFire</a></li>
                                                <li><a href="js_scrollspy.html">Scrollspy</a></li>
                                                <li><a href="js_sidenav.html">SideNav</a></li>
                                                <li><a href="js_tabs.html">Tabs</a></li>
                                                <li><a href="js_transitions.html">Transitions</a></li>
                                                <li><a href="js_waves.html">Waves</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="bold">
                                        <a class="collapsible-header waves-effect">APPs</a>
                                        <div class="collapsible-body">
                                            <ul>
                                                <li><a href="apps_crud.html">CRUD</a></li>
                                                <li><a href="apps_pricing_table.html">Pricing Table</a></li>
                                                <li><a href="app_datatables.html">Datatables</a></li>
                                                <li><a href="app_maps.html">Maps</a></li>
                                                <li><a href="app_charts.html">Charts</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
						-->
                    </div>
                </div>
            </nav>
        </div>

