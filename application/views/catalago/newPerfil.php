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
                            <a class="btn-floating btn-large tooltipped" data-tooltip="Regresar" data-position="top" data-delay="50" href="<?= base_url().'Catalagos/Perfiles' ?>">
                                <i class="large material-icons">undo</i>
                            </a>
                            <button class="btn-floating btn-large white tooltipped scrollToTop" data-tooltip="Scroll to top" data-position="top" data-delay="50">
                                <i class="large material-icons">keyboard_arrow_up</i>
                            </button>
                        </div>			
                        <?php
                        echo form_open('Catalagos/newPerfil/'); 
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
                                                    <select name="Id_Sucursal" id="Id_Sucursal">
                                                        <option value="" disabled selected>Elija su opción</option>
                                                    <?php
                                                        foreach ($sucursal as $key => $row) {    
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
                                                    <label for="Id_Sucursal">Sucursal</label>
                                                    <?php echo form_error('Id_Sucursal'); ?>
                                                </div>												
                                            </div>  
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <select name="Id_Ciudad" id="Id_Ciudad">
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
                                                    <label for="Id_Ciudad">Ciudad</label>
                                                    <?php echo form_error('Id_Ciudad'); ?>
                                                </div>	
                                                <div class="input-field col s6">
                                                    <select name="Id_Estado" id="Id_Estado">
                                                        <option value="" disabled selected>Elija su opción</option>
                                                    <?php
                                                        foreach ($estados as $key => $row) {    
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
                                                    <label for="Id_Estado">Estado</label>
                                                    <?php echo form_error('Id_Estado'); ?>
                                                </div>												
                                            </div>  
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <select name="Id_Zona" id="Id_Zona">
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
                                                    <label for="Id_Zona">Zona</label>
                                                    <?php echo form_error('Id_Zona'); ?>
                                                </div>	
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
                                            </div>  
                                            <div class="row no-gutter">
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
                                                <div class="input-field col s6">
                                                    <select name="Perfil_Padre_Id" id="Perfil_Padre_Id">
                                                        <option value="" disabled selected>Elija su opción</option>
                                                    <?php
                                                        foreach ($perfil as $key => $row) {    
															if($key == $this->input->post('Perfil_Padre_Id')){	
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
                                                    <label for="Perfil_Padre_Id">Perfil</label>
                                                    <?php echo form_error('Perfil_Padre_Id'); ?>
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