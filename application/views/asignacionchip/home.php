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
                        echo form_open('AsignacionChip/'); 
                        ?> 
                            <div class="row">
                                <div class="col s12 m12">
                                    <?php
                                    $msg = $this->session->flashdata('msg');
                                    if ($msg){
                                        echo $msg;
                                    }
                                    ?>                             
                                    <div class="panel panel-bordered">				
                                        <div class="panel-body">    											
                                            <div class="row no-gutter">
                                                <div class="input-field col s5">
													<i class="material-icons prefix">sd_storage</i>
													<input type="text" name="ICCDID_del" id="ICCDID_del" value="<?= $this->input->post('ICCDID_del') ?>" data-length="20">
													<label for="ICCDID_del">ICCDID Del</label>													                                                  
                                                    <?php echo form_error('ICCDID_del'); ?>																																							
                                                </div>
                                                <div class="input-field col s5">
													<i class="material-icons prefix">sd_storage</i>
													<input type="text" name="ICCDID_al" id="ICCDID_al" value="<?= $this->input->post('ICCDID_al') ?>" data-length="20">
													<label for="ICCDID_al">ICCDID Al</label>													                                                  
                                                    <?php echo form_error('ICCDID_al'); ?>																																							
                                                </div>	
												<div class="input-field col s2">
													<button class="btn waves-effect waves-light" id="button-validar" type="button" name="button-validar">
														Validar
													</button>													
												</div>
                                            </div>  																						
                                            <div class="row no-gutter">
                                                <div class=" col s6">
													<label for="Id_Colaborador">Colaborador</label>
                                                    <select name="Id_Colaborador" id="Id_Colaborador" class="browser-default">
                                                        <option value="" selected>Elija su opción</option>
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
                                                <div class=" col s6">
													<label for="Id_Almacen">Almacen</label>
                                                    <select name="Id_Almacen" id="Id_Almacen" class="browser-default">
                                                        <option value="" selected>Elija su opción</option>
                                                    <?php
                                                       foreach ($almacen as $key => $row) {    
														   if($key == $this->input->post('Id_Almacen')){														   
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
                                                    <?php echo form_error('Id_Almacen'); ?>																																							
                                                </div>											
                                            </div>  	
                                            <div class="row no-gutter">
                                                <div class=" col s6">
													<label for="Id_Cat_Sts_Asig_Chip">Estatus de Asignacion Chip</label>
                                                    <select name="Id_Cat_Sts_Asig_Chip" id="Id_Cat_Sts_Asig_Chip" class="browser-default">
                                                        <option value="" disabled selected>Elija su opción</option>
                                                    <?php
                                                       foreach ($estatus as $key => $row) {    
														   if($key == $this->input->post('Id_Cat_Sts_Asig_Chip')){														   
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
                                                    <?php echo form_error('Id_Cat_Sts_Asig_Chip'); ?>																																								
                                                </div>
                                                <div class="col s6">	
													<label for="Id_Cat_Tipo_Producto">Tipo Produdcto</label>
                                                    <select name="Id_Cat_Tipo_Producto" id="Id_Cat_Tipo_Producto" class="browser-default">
                                                        <option value="" disabled selected>Elija su opción</option>
                                                    <?php
                                                       foreach ($producto as $key => $row) {    
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
                                            </div> 											
                                        </div>
                                        <div class="panel-footer">
                                            <div class="right-align">
                                                <button type="reset" id="button-reset" class="btn-flat waves-effect">
                                                    LIMPIAR CAMPOS
                                                </button>
                                                <button type="submit" class="btn-flat waves-effect">
                                                    ASIGNAR
                                                </button>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row no-gutter">
										<div class="col s12" id="table">   

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
