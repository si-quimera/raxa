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
				                <i class="material-icons">account_circle</i> AGREGAR PERFIL
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
                            <a class="btn-floating btn-large tooltipped" data-tooltip="Regresar" data-position="top" data-delay="50" href="<?= base_url().'Perfiles' ?>">
                                <i class="large material-icons">undo</i>
                            </a>
                            <button class="btn-floating btn-large white tooltipped scrollToTop" data-tooltip="Scroll to top" data-position="top" data-delay="50">
                                <i class="large material-icons">keyboard_arrow_up</i>
                            </button>
                        </div>			
                        <?php
                        echo form_open('Perfiles/newPerfil/'); 
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
                                                    <input name="Descripcion" id="Descripcion" type="text" value="">
                                                    <label for="Descripcion">Descripcion</label>
													<?php echo form_error('Descripcion'); ?>
                                                </div>
                                                <div class="input-field col s6">
													
                                                    <select name="Id_Cat_Empresa" id="Id_Cat_Empresa">
                                                        <option value="" disabled selected>Elija su opción</option>
                                                    <?php
                                                        foreach ($empresa as $key => $row) {    
															if($key == $this->input->post('Id_Cat_Empresa')){
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
                                                    <label for="Id_Cat_Empresa">Empresa</label>
                                                    <?php echo form_error('Id_Cat_Empresa'); ?>
													
                                                </div>												
                                            </div>  
											
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <select name="Id_Cat_Departamento" id="Id_Cat_Departamento">
                                                        <option value="" disabled selected>Elija su opción</option>
                                                    <?php
                                                        foreach ($depto as $key => $row) {    
															if($key == $this->input->post('Id_Cat_Departamento')){
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
                                                    <label for="Id_Cat_Departamento">Departamento</label>
                                                    <?php echo form_error('Id_Cat_Departamento'); ?>
                                                </div>	
                                                <div class="input-field col s6"></div>												
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