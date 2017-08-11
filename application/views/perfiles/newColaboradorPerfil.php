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
				                <i class="material-icons large">transfer_within_a_station</i> EDITAR COLABORADOR <i class="material-icons blue-text">trending_flat</i> PERFIL
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
                            <a class="btn-floating btn-large tooltipped" data-tooltip="Regresar" data-position="top" data-delay="50" href="<?= base_url().'Perfiles/ColaboradorPerfil' ?>">
                                <i class="large material-icons">undo</i>
                            </a>
                            <button class="btn-floating btn-large white tooltipped scrollToTop" data-tooltip="Scroll to top" data-position="top" data-delay="50">
                                <i class="large material-icons">keyboard_arrow_up</i>
                            </button>
                        </div>			
                        <?php
                        echo form_open('Perfiles/NewColaboradorPerfil/'); 
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
													<label for="Id_Colaborador">Colaborador</label>
                                                    <select name="Id_Colaborador" id="Id_Colaborador" class="browser-default select2-container">
                                                        <option value="" disabled selected>Elija su opción</option>
                                                    <?php
                                                        foreach ($colaborador as $key => $row) {    
															if($key == $this->input->post('Id_Colaborador')){
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
                                                    <?php echo form_error('Id_Colaborador'); ?>
                                                </div>													
                                                <div class="col s6">
													<label for="Id_Menu_Perfil">Menu > Pefil</label> 
                                                    <select name="Id_Menu_Perfil" id="Id_Perfil" class="browser-default select2-container">
                                                        <option value="" disabled selected>Elija su opción</option>
                                                    <?php
                                                        foreach ($perfiles as $key => $row) {    
															if($key == $this->input->post('Id_Menu_Perfil')){
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
													<?php echo form_error('Id_Menu_Perfil'); ?>
                                                </div>											
                                            </div>  
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">													
                                                    <select name="Activo" id="Activo">
                                                        <option value="" disabled selected>Elija su opción</option>	
														<option value="1" <?= $this->PerfilesModel->setSelect('1', $this->input->post('Activo')); ?>>Si</option>
														<option value="0" <?= $this->PerfilesModel->setSelect('0', $this->input->post('Activo')); ?>>No</option>
                                                    </select>            
													<label for="Activo">Activo</label>
                                                    <?php echo form_error('Activo'); ?>
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