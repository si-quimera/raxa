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
                                <li >
                                    <a class="dropdown-button" href="#!" data-activates="dropdown-pro" data-constrainwidth="false" data-beloworigin="true" data-hover="true">
                                        Producto<i class="material-icons dropdown-icon right">arrow_drop_down</i>
                                    </a>
                                </li>

                                <li >
                                    <a class="dropdown-button" href="#!" data-activates="dropdown-seg" data-constrainwidth="false" data-beloworigin="true" data-hover="true">
                                        Seguimiento<i class="material-icons dropdown-icon right">arrow_drop_down</i>
                                    </a>
                                </li>

                                <li >
                                    <a class="dropdown-button" href="#!" data-activates="dropdown-con" data-constrainwidth="false" data-beloworigin="true" data-hover="true">
                                        Consultas<i class="material-icons dropdown-icon right">arrow_drop_down</i>
                                    </a>
                                </li>

                                <li >
                                    <a class="dropdown-button" href="#!" data-activates="dropdown-adm" data-constrainwidth="false" data-beloworigin="true" data-hover="true">
                                        Administración<i class="material-icons dropdown-icon right">arrow_drop_down</i>
                                    </a>
                                </li>

                                <li class="profile ">
                                    <a class="dropdown-button" href="#!" data-activates="dropdown-profile" data-constrainwidth="false" data-beloworigin="true" data-alignment="right">
                                        <div class="valign-wrapper">
                                            <img src="<?= base_url() ?>/webroot/img/profile.jpg" class="circle responsive-img margin-right-10">
                                            John Doe
                                            <i class="material-icons dropdown-icon right">arrow_drop_down</i>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                            <!-- Dropdowns -->
                            <ul id="dropdown-pro" class="dropdown-content">
                                <li ><a href="css_color.html">Registro Portabilidad</a></li>
                                <li ><a href="css_grid.html">Re-Asignacion de SIMs</a></li>
                            </ul>
                            <ul id="dropdown-seg" class="dropdown-content">
                                <li ><a href="components_badges.html">Validacion de Calidad</a></li>
                                <li ><a href="components_buttons.html">Activacion de SIM</a></li>
                                <li ><a href="components_breadcrumbs.html">Generacion Portabilidad</a></li>
                                <li ><a href="components_cards.html">Recarga Promocion</a></li>
                                <li ><a href="components_chips.html">Validacion de Actividad</a></li>
                            </ul>
                            <ul id="dropdown-con" class="dropdown-content">
                                <li ><a href="js_collapsible.html">Portabilidad</a></li>
                                <li ><a href="">Asignacion de SIM's</a></li>
                            </ul>
                            <ul id="dropdown-adm" class="dropdown-content">
                                <li ><a class="dropdown-button2" data-hover="true" href="#!" data-activates="estaticos">Catalogos Estaticos</a></li>
								<li ><a class="dropdown-button2" data-hover="true" href="#!" data-activates="dinamicos">Catalogos Dinamicos</a></li>
                                <li ><a href="<?= base_url() ?>SalidaInv/">Salida del Inv. Central</a></li>
                                <li ><a href="apps_datatables.html">Cambio de Password</a></li>
                                <li ><a href="apps_maps.html">Asignacion de Roles</a></li>
                            </ul>

                            <ul id="dropdown-profile" class="dropdown-content">
                                <li><a href="<?= base_url() ?>Login/logout/">Cerrar la sesión </a></li>
                            </ul>

							
	
							<ul id='estaticos' class='dropdown-content'>
								<li><a href="<?= base_url() ?>Catalagos/almacen/">Almacen</a></li>
								<li><a href="<?= base_url() ?>Catalagos/carrier/">Carrier</a></li>
								<li><a href="<?= base_url() ?>Catalagos/ciudad/">Ciudad</a></li>
								<li><a href="<?= base_url() ?>Catalagos/colaborador/">Colaboradores</a></li>
								<li><a href="<?= base_url() ?>Catalagos/estado/">Estado</a></li>
								<li><a href="<?= base_url() ?>Catalagos/grupo/">Grupo</a></li>
								<li><a href="<?= base_url() ?>Catalagos/maestro/">Maestro</a></li>
								<li><a href="<?= base_url() ?>Catalagos/sucursal/">Sucursal</a></li>
								<li><a href="<?= base_url() ?>Catalagos/zona/">Zona</a></li>
							</ul>

							<ul id='dinamicos' class='dropdown-content'>
								<li><a href="<?= base_url() ?>Catalagos/cadenas/">Cadenas / Maestro</a></li>
							</ul>							
							
							
							
                            <!-- Mobile -->
                            <a href="#" data-activates="mobile-demo" class="button-collapse">
                                <i class="material-icons">menu</i>
                            </a>
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

