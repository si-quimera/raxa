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
				                <i class="material-icons">account_box</i> AGREGAR COLABORADOR
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
                            <a class="btn-floating btn-large tooltipped" data-tooltip="Regresar" data-position="top" data-delay="50" href="<?= base_url().'Catalogos/colaborador' ?>">
                                <i class="large material-icons">undo</i>
                            </a>
                            <button class="btn-floating btn-large white tooltipped scrollToTop" data-tooltip="Scroll to top" data-position="top" data-delay="50">
                                <i class="large material-icons">keyboard_arrow_up</i>
                            </button>
                        </div>			
                        <?php
                        echo form_open('Catalogos/newColaborador/'); 
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
                                                    <input name="Nombre" id="Nombre" type="text" value="<?= $this->input->post('Nombre') ?>">
                                                    <label for="Nombre">Nombre</label>
													<?php echo form_error('Nombre'); ?>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input name="Ap_Pat" id="Ap_Pat" type="text" value="<?= $this->input->post('Ap_Pat') ?>">
                                                    <label for="Ap_Pat">Ap Paterno</label>
													<?php echo form_error('Ap_Pat'); ?>
                                                </div>	          												
                                            </div>  
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="Ap_Mat" id="Ap_Mat" type="text" value="<?= $this->input->post('Ap_Mat') ?>">
                                                    <label for="Ap_Mat">Ap Materno</label>
													<?php echo form_error('Ap_Mat'); ?>
                                                </div>	
                                                <div class="col s6">
													<label for="Fec_Nac">Fecha Nacimiento</label>
                                                    <input name="Fec_Nac" type="text" class="datepicker" id="Fec_Nac" value="<?= $this->input->post('Fec_Nac') ?>">                                                    
													<?php echo form_error('Fec_Nac'); ?>																																						
                                                </div>												
                                            </div>  
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="Calle" id="Calle" type="text" value="<?= $this->input->post('Calle') ?>">
                                                    <label for="Calle">Calle</label>
													<?php echo form_error('Calle'); ?>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input name="Colonia" id="Colonia" type="text" value="<?= $this->input->post('Colonia') ?>">
                                                    <label for="Colonia">Colonia</label>
													<?php echo form_error('Colonia'); ?>
                                                </div>	          												
                                            </div>  											
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="Municipio" id="Municipio" type="text" value="<?= $this->input->post('Municipio') ?>">
                                                    <label for="Municipio">Municipio</label>
													<?php echo form_error('Municipio'); ?>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input name="CP" id="CP" type="text" value="<?= $this->input->post('CP') ?>">
                                                    <label for="CP">CP</label>
													<?php echo form_error('CP'); ?>
                                                </div>	          												
                                            </div> 
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="Estado" id="Estado" type="text" value="<?= $this->input->post('Estado') ?>">
                                                    <label for="Estado">Estado</label>
													<?php echo form_error('Estado'); ?>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input name="Pais" id="Pais" type="text" value="<?= $this->input->post('Pais') ?>">
                                                    <label for="Pais">Pais</label>
													<?php echo form_error('Pais'); ?>
                                                </div>	          												
                                            </div> 
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="Tel" id="Tel" type="text" value="<?= $this->input->post('Tel') ?>">
                                                    <label for="Tel">Tel</label>
													<?php echo form_error('Tel'); ?>
                                                </div>
                                                <div class="input-field col s6">
                                                </div>	          												
                                            </div> 	
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="Cel" id="Cel" type="text" value="<?= $this->input->post('Cel') ?>">
                                                    <label for="Cel">Cel</label>
													<?php echo form_error('Cel'); ?>
                                                </div>												
                                                <div class="input-field col s6">
                                                    <input name="IMEI" id="IMEI" type="text" value="<?= $this->input->post('IMEI') ?>">
                                                    <label for="IMEI">IMEI</label>
													<?php echo form_error('IMEI'); ?>
                                                </div>          												
                                            </div> 		
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="Cel2" id="Cel2" type="text" value="<?= $this->input->post('Cel2') ?>">
                                                    <label for="Cel2">Cel 2</label>
													<?php echo form_error('Cel2'); ?>
                                                </div>													
                                                <div class="input-field col s6">
                                                    <input name="IMEI2" id="IMEI2" type="text" value="<?= $this->input->post('IMEI2') ?>">
                                                    <label for="IMEI2">IMEI 2</label>
													<?php echo form_error('IMEI2'); ?>
                                                </div>										
                                            </div> 											

                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="email" id="email" type="text" value="<?= $this->input->post('email') ?>">
                                                    <label for="email">Email</label>
													<?php echo form_error('email'); ?>
                                                </div>	
												<div class="input-field col s6">
                                                    <select name="Id_Grupo" id="Id_Grupo">														
                                                        <option value="" disabled selected>Elija su opción</option>
														<option value=""></option>
                                                    <?php
                                                        foreach ($grupo as $key => $row) {    
															if($key == $this->input->post('Id_Grupo')){
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
                                                    <label for="Id_Grupo">Grupo</label>
                                                    <?php echo form_error('Id_Grupo'); ?>
                                                </div>											
                                            </div> 
                                            <div class="row no-gutter">
                                                <div class="col s6">
													<label for="Jefe_Inmediato">Jefe Inmediato</label>
                                                    <select name="Jefe_Inmediato" id="Jefe_Inmediato" class="browser-default select2-container">
                                                        <option value="" disabled selected>Elija su opción</option>
                                                    <?php
                                                        foreach ($jefes as $key => $row) {    
															if($key == $this->input->post('Jefe_Inmediato')){
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
                                                    <?php echo form_error('Jefe_Inmediato'); ?>
                                                </div>
                                                <div class="col s6">
													 <label for="Id_Cat_Puesto">Puesto</label>
                                                    <select name="Id_Cat_Puesto" id="Id_Cat_Puesto" class="browser-default select2-container">
                                                        <option value="" disabled selected>Elija su opción</option>
                                                    <?php
														$raiz = $this->CatalogoModel->getAreas();																															
														$nombre_raiz = $raiz->Nombre;
														$Id_Cat_Prim = $raiz->Id_Cat_Prim;
														$level1 = $this->CatalogoModel->getSubAreas($Id_Cat_Prim);																					
														foreach ($level1->result() as $row1) {   
															$nombre_level1 = $row1->Nombre;
															if($row1->Id_Cat_Prim == $this->input->post('Id_Cat_Puesto')){
													?>	
															<option value="<?= $row1->Id_Cat_Prim ?>" selected="selected"><?= $nombre_raiz ?> &raquo;&raquo; <?= $nombre_level1 ?></option>
													<?php	
															}else{
													?>	
															<option value="<?= $row1->Id_Cat_Prim ?>"><?= $nombre_raiz ?> &raquo;&raquo; <?= $nombre_level1 ?></option>
													<?php																	
															}
															$level2 = $this->CatalogoModel->getSubAreas($row1->Id_Cat_Prim);	
															foreach ($level2->result() as $row2) { 
																$nombre_level2 = $row2->Nombre;
																if($row2->Id_Cat_Prim == $this->input->post('Id_Cat_Puesto')){																
													?>	
																<option value="<?= $row2->Id_Cat_Prim ?>" selected="selected"><?= $nombre_raiz ?> &raquo;&raquo; <?= $nombre_level1 ?> &raquo;&raquo; <?= $nombre_level2 ?></option>
													<?php	
																}else{
													?>	
																<option value="<?= $row2->Id_Cat_Prim ?>"><?= $nombre_raiz ?> &raquo;&raquo; <?= $nombre_level1 ?>&raquo;&raquo; <?= $nombre_level2 ?></option>
													<?php	
																}
															}
														}                                              
                                                    ?>
                                                    </select>                                                   
                                                    <?php echo form_error('Id_Cat_Puesto'); ?>														
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
                                            <div class="row no-gutter">
                                                <div class="input-field col s5">
                                                    <input name="User" id="User" type="text" value="<?= $this->input->post('User') ?>" placeholder=" ">
                                                    <label for="User" class="active">Usuario</label>													       
													<?php echo form_error('User'); ?>
                                                </div>
												<div class="input-field col s1">
													<a class="btn-floating waves-effect waves-light tooltipped" id="btn-usuario" data-position="bottom" data-delay="50" data-tooltip="Generar Usuario"><i class="material-icons">build</i></a>
												</div>
                                                <div class="input-field col s5">
                                                    <input name="Password" id="Password" type="text" value="<?= $this->input->post('Password') ?>" placeholder=" ">
                                                    <label for="Password">Password</label>
													<?php echo form_error('Password'); ?>
                                                </div>	
												<div class="input-field col s1">
													<a class="btn-floating waves-effect waves-light tooltipped" id="btn-password" data-position="bottom" data-delay="50" data-tooltip="Generar Password"><i class="material-icons">build</i></a>
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