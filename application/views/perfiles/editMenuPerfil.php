        <!-- ####### -->
        <!-- Content -->
        <!-- ####### -->
        <main>
            <div class="main-content">
                <!-- ###### -->
                <!-- Header -->
                <!-- ###### -->
				<div class="row">
				    <div class="col s12">
				        <div class="page-header">
				            <h1>
				                <i class="material-icons large">playlist_add_check</i> EDITAR MENU <i class="material-icons blue-text">trending_flat</i> PERFIL
				            </h1>
				        </div>
				    </div>
				</div>
                
                
                <!-- #### -->
                <!-- Body -->
                <!-- #### -->
				<section id="apps_crud">
					<div class="crud-app">																		
                        <div class="fixed-action-btn">
                            <a class="btn-floating btn-large tooltipped" data-tooltip="Regresar" data-position="top" data-delay="50" href="<?= base_url().'Perfiles/MenuPerfil' ?>">
                                <i class="large material-icons">undo</i>
                            </a>
                            <button class="btn-floating btn-large white tooltipped scrollToTop" data-tooltip="Scroll to top" data-position="top" data-delay="50">
                                <i class="large material-icons">keyboard_arrow_up</i>
                            </button>
                        </div>			
                        <?php
                        $hidden = array('Id_Menu_Perfil' => $edicion->Id_Menu_Perfil);
                        echo form_open('Perfiles/editMenuPerfil/'.$edicion->Id_Menu_Perfil, '', $hidden); 						
                        ?>							
                            <div class="row">
                                <div class="col s12 m8">
                                    <?php
                                    $msg = $this->session->flashdata('msg');
                                    if ($msg){
                                        echo $msg;
                                    }
                                    ?>                             
                                    <div class="panel panel-bordered">				
                                        <div class="panel-body">                                           
                                            <div class="row no-gutter">
                                                <div class="col s6">
													<label for="Id_Perfil">Perfil</label>  
                                                    <select name="Id_Perfil" id="Id_Perfil" class="browser-default select2-container">
                                                        <option value="" disabled selected>Elija su opción</option>
                                                    <?php
                                                        foreach ($perfiles as $key => $row) {    
															if($key == $edicion->Id_Perfil){
													?>
														<option value="<?= $key ?>" selected="selected"><?= $row ?></option>
													<?php	
															}else{
													?>														
														<option value="<?= $key ?>"><?= $row ?></option>														
													<?php	
															}
                                                        }                                               
                                                    ?>
                                                    </select>
                                                    
													<?php echo form_error('Id_Perfil'); ?>
                                                </div>
                                                <div class="col s6">
													<label for="Id_Cat_Menu">Menu</label>
                                                    <select name="Id_Cat_Menu" id="Id_Cat_Menu" class="browser-default select2-container">
                                                        <option value="" disabled selected>Elija su opción</option>
                                                    <?php
                                                        foreach ($menus as $key => $row) {    
															if($key == $edicion->Id_Cat_Menu){
													?>
														<option value="<?= $key ?>" selected="selected"><?= $row ?></option>
													<?php	
															}else{
													?>														
														<option value="<?= $key ?>"><?= $row ?></option>														
													<?php	
															}
                                                        }                                               
                                                    ?>
                                                    </select>                                                   
                                                    <?php echo form_error('Id_Cat_Menu'); ?>
                                                </div>												
                                            </div>  
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <select name="Acceso" id="Acceso">
                                                        <option value="" disabled selected>Elija su opción</option>														
                                                    </select>
                                                    <label for="Acceso">Acceso</label>
                                                    <?php echo form_error('Acceso'); ?>
                                                </div>	
                                                <div class="input-field col s6">
                                                    <input name="Descripcion" id="Descripcion" type="text" value="<?= $edicion->Descripcion ?>">
                                                    <label for="Descripcion">Descripcion</label>
													<?php echo form_error('Descripcion'); ?>													
												</div>												
                                            </div>  											
                                        </div>
                                        <div class="panel-footer">
                                            <div class="right-align">
                                                <button type="reset" class="btn-flat waves-effect">
                                                    BORRAR
                                                </button>
                                                <button type="submit" class="btn-flat waves-effect">
                                                    GUARDAR
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m4">
                                    <div class="helper">&nbsp;</div>
                                </div>
                            </div>
                        <?= form_close() ?>						
						
						
						
					</div>
				</section>
            </div>
        </main>