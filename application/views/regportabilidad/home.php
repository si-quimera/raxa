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
				                <i class="material-icons">folder_special</i> REGISTRO PORTABILIDAD
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
                            <button class="btn-floating btn-large white tooltipped scrollToTop" data-tooltip="Scroll to top" data-position="top" data-delay="50">
                                <i class="large material-icons">keyboard_arrow_up</i>
                            </button>
                        </div>			
                        <?php
                        echo form_open_multipart('RegPortabilidad/'); 
                        ?> 
                            <div class="row">
                                <div class="col s8 m8">
                                    <?php
                                    $msg = $this->session->flashdata('msg');
                                    if ($msg){
                                        echo $msg;
                                    }
                                    ?>                             
                                    <div class="panel panel-bordered">				
                                        <div class="panel-body">                                                    
                                            <div class="row no-gutter">
                                                <div class="col s3">
													<label for="Fecha_Registro_Porta">Fecha Registro</label>
                                                    <input type="text" name="Fecha_Registro_Porta" class="datepicker" value="<?= date("Y-m-d H:i:s") ?>">                                                    
													<?php echo form_error('Fecha_Registro_Porta'); ?>
                                                </div>	
												<div class="col s3"></div>	
                                                <div class="col s3">
													<label for="Vigencia_NIP">Vigencia NIP</label>
                                                    <input type="text" name="Vigencia_NIP" class="datepicker" value="<?= $this->input->post('Vigencia_NIP') ?>">                                                    
													<?php echo form_error('Vigencia_NIP'); ?>																										
												</div>	
												<div class="col s3"></div>											
                                            </div>  											
                                            <div class="row no-gutter">												
                                                <div class="input-field  col s6">
													<label for="Nom_Persona_Porta">Nombre del Cliente</label>
                                                    <input type="text" name="Nom_Persona_Porta" value="<?= $this->input->post('Nom_Persona_Porta') ?>">                                                    
													<?php echo form_error('Nom_Persona_Porta'); ?>
                                                </div>					
                                                <div class="input-field col s6">
                                                    <input name="Num_Cliente" id="Num_Cliente" type="text" value="<?= $this->input->post('Num_Cliente') ?>">
                                                    <label for="Num_Cliente">Numero de Cliente</label>
													<?php echo form_error('Num_Cliente'); ?>
                                                </div>													
                                            </div> 											
                                            <div class="row no-gutter">
                                                <div class="input-field col s3">
                                                    <input name="NIP_Portar" id="NIP" type="text" value="<?= $this->input->post('NIP_Portar') ?>">
                                                    <label for="NIP_Portar">NIP</label>
													<?php echo form_error('NIP_Portar'); ?>
                                                </div>						
												<div class="col s3"></div>
													<div class="col s6">
														<label for="Id_Carrier">Carrier</label>
														<select name="Id_Carrier" id="Id_Carrier" class="browser-default">
															<option value="" selected>Elija su opción</option>
														<?php
														   foreach ($carrier as $key => $row) {    
														   if($key == $this->input->post('Id_Carrier')){														   
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
													<?php echo form_error('Id_Carrier'); ?>													
												</div>																							
                                            </div> 	
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="Tel_Fijo_Alterno" id="Tel_Fijo_Alterno" type="text" value="<?= $this->input->post('Tel_Fijo_Alterno') ?>">
                                                    <label for="Tel_Fijo_Alterno">Telefono Fijo Alterno</label>
													<?php echo form_error('Tel_Fijo_Alterno'); ?>
                                                </div>													
                                                <div class="input-field col s6">
                                                    <input name="email" id="email" type="text" value="<?= $this->input->post('email') ?>">
                                                    <label for="email">Correo Electronico</label>
													<?php echo form_error('email'); ?>
                                                </div>																						
                                            </div> 												
                                            <div class="row no-gutter">			                                                
												<div class="file-field input-field col s6">
													<div class="btn">
														<span>Adjuntar IFE</span>
														<input type="file" name="ife[]">
													</div>
													<div class="file-path-wrapper">
														<input class="file-path validate" type="text">
													</div>
													<?php echo form_error('ife'); ?>
												</div>                                                													
                                                <div class="col s6">													
													<label for="ICCDID">ICCDID</label>
                                                    <select name="ICCDID" id="ICCDID" class="browser-default">
                                                        <option value="" selected>Elija su opción</option>
                                                    <?php
                                                       foreach ($ICCDID as $key => $row) {    
														   if($key == $this->input->post('ICCDID')){														   
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
													<?php echo form_error('ICCDID'); ?>	
                                                </div>															
                                            </div> 			
											<div class="row no-gutter">
                                                <div class="col s6">	
													<label for="Id_Cat_Tipo_Producto">Tipo Produdcto</label>
                                                    <select name="Id_Cat_Tipo_Producto" id="Id_Cat_Tipo_Producto" class="browser-default">
                                                        <option value="" selected>Elija su opción</option>
                                                    <?php
                                                       foreach ($tipo as $key => $row) {    
														   if($key == $this->input->post('Id_Cat_Tipo_Producto')){														   
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
                                                    <?php echo form_error('Id_Cat_Tipo_Producto'); ?>															
												</div>		
                                                <div class=" col s6">
                                                    <select name="Id_Cat_Fase_Portabilidad" id="Id_Cat_Fase_Portabilidad" class="browser-default" style="visibility: hidden;">
                                                        <option value="" selected>Elija su opción</option>
                                                    <?php
                                                       foreach ($fase as $key => $row) {    
														   if($row == 'Registrado'){														   
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
