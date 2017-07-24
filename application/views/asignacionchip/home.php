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
				                <i class="material-icons">sd_storage</i> ASIGNACION DE CHIP
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
                            <a class="btn-floating btn-large tooltipped" data-tooltip="Regresar" data-position="top" data-delay="50" href="<?= base_url().'Roles/' ?>">
                                <i class="large material-icons">undo</i>
                            </a>
                            <button class="btn-floating btn-large white tooltipped scrollToTop" data-tooltip="Scroll to top" data-position="top" data-delay="50">
                                <i class="large material-icons">keyboard_arrow_up</i>
                            </button>
                        </div>			
                        <?php
                        echo form_open('Roles/newRol'); 
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
                                                <div class="input-field col s6">
													<i class="material-icons prefix">sd_storage</i>
													<input type="text" id="ICCDID-del" class="autocomplete">
													<label for="ICCDID-del">ICCDID Del</label>													
                                                  
                                                    <?php echo form_error('ICCDID-del'); ?>																																							
                                                </div>
                                                <div class="input-field col s6">
													<i class="material-icons prefix">sd_storage</i>
													<input type="text" id="ICCDID-al" class="autocomplete">
													<label for="ICCDID-al">ICCDID Al</label>													
                                                  
                                                    <?php echo form_error('ICCDID-al'); ?>																																							
                                                </div>										
                                            </div>  
                                            <div class="row no-gutter">
                                                <div class=" col s6">
													<label for="Id_Sucursal">Sucursal</label>
                                                    <select name="Id_Sucursal" id="Id_Sucursal" class="browser-default">
                                                        <option value="" disabled selected>Elija su opción</option>
                                                    <?php
                                                       foreach ($sucursal as $key => $row) {    
														   if($key == $this->input->post('Id_Sucursal')){														   
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
                                                    <?php echo form_error('Id_Sucursal'); ?>																																							
                                                </div>
                                                <div class="col s6">
													<label for="Id_Ciudad">Ciudad</label>
                                                    <select name="Id_Ciudad" id="Id_Ciudad" class="browser-default">
                                                        <option value="" disabled selected>Elija su opción</option>
                                                    <?php
                                                       foreach ($ciudad as $key => $row) {    
														   if($key == $this->input->post('Id_Ciudad')){														   
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
                                                    <?php echo form_error('Id_Ciudad'); ?>	
                                                </div>												
                                            </div>  	
                                            <div class="row no-gutter">
                                                <div class=" col s6">
													<label for="Id_Estado">Estado</label>
                                                    <select name="Id_Estado" id="Id_Estado" class="browser-default">
                                                        <option value="" disabled selected>Elija su opción</option>
                                                    <?php
                                                       foreach ($estado as $key => $row) {    
														   if($key == $this->input->post('Id_Estado')){														   
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
                                                    <?php echo form_error('Id_Estado'); ?>																																							
                                                </div>
                                                <div class="col s6">
													<label for="Id_Zona">Zona</label>
                                                    <select name="Id_Zona" id="Id_Zona" class="browser-default">
                                                        <option value="" disabled selected>Elija su opción</option>
                                                    <?php
                                                       foreach ($zona as $key => $row) {    
														   if($key == $this->input->post('Id_Zona')){														   
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
                                                    <?php echo form_error('Id_Zona'); ?>	
                                                </div>												
                                            </div>  	
                                            <div class="row no-gutter">
                                                <div class=" col s6">
													<label for="Activo">Activo</label>
                                                    <select name="Activo" id="Activo" class="browser-default">
                                                        <option value="" disabled selected>Elija su opción</option>
														<option value="1">SI</option>
														<option value="0">NO</option>
                                                    </select>                                                    
                                                    <?php echo form_error('Activo'); ?>																																							
                                                </div>
                                                <div class="col s6"></div>												
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