<?php
$usuario = $this->session->userdata('usuario');
?>
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
				                <i class="material-icons">sd_storage</i> ASIGNACION DE SIM(s) ENTRE ALMACEN
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
                        echo form_open('AsignacionChip/Almacen/'); 
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
													<input type="text" name="ICCDID_del" id="ICCDID_del" value="<?= $this->input->post('ICCDID_del') ?>" data-length="20" class="autocomplete">
													<label for="ICCDID_del">ICCDID Del</label>													                                                  
                                                    <?php echo form_error('ICCDID_del'); ?>	
													<?php echo form_error('listar_simms[]'); ?>
                                                </div>
                                                <div class="input-field col s5">
													<i class="material-icons prefix">sd_storage</i>
													<input type="text" name="ICCDID_al" id="ICCDID_al" value="<?= $this->input->post('ICCDID_al') ?>" data-length="20" class="autocomplete">
													<label for="ICCDID_al">ICCDID Al</label>													                                                  
                                                    <?php echo form_error('ICCDID_al'); ?>																																							
                                                </div>	
												<div class="input-field col s2">																									
													<button class="btn waves-effect waves-light" id="button-almacen" type="button" name="button-almacen">
														Validar
													</button>													
												</div>
                                            </div>  												
											<div class="row no-gutter" id="form-colaborador">
												<div class="col s6 offset-s3">
													<label for="Id_Almacen_From">Almacen Origen</label>
                                                    <select name="Id_Almacen_From" id="Id_Almacen_From" class="browser-default">
                                                        <option value="" selected>Elija su opción</option>
														<option value="0" <?= $this->PerfilesModel->setSelect('0', $this->input->post('Id_Almacen_From')); ?>>Almacen Central</option>
                                                    <?php
                                                       foreach ($almacen as $key => $row) {    
														   if($key == $this->input->post('Id_Almacen_From')){														   
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
                                                    <?php echo form_error('Id_Almacen_From'); ?>																																																					
												</div>	
												<!-- human -->
												<div class="col s12">
													<p class="center-align large blue-text">
														<strong>																												
														<?= $usuario['Nombre'] . ' ' . $usuario['Ap_Pat'] . ' ' . $usuario['Ap_Mat'] ?><br>
														<i class="material-icons large blue-text">accessibility</i>
														</strong>
													</p>
												</div>
												<div class="col s6 offset-s3">
													<label for="Id_Almacen_To">Almacen Destino</label>
                                                    <select name="Id_Almacen_To" id="Id_Almacen_To" class="browser-default">
                                                        <option value="" selected>Elija su opción</option>
                                                    <?php
                                                       foreach ($almacen as $key => $row) {    
														   if($key == $this->input->post('Id_Almacen_To')){														   
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
                                                    <?php echo form_error('Id_Almacen_To'); ?>	
													
													
													<label for="Id_Colaboradores">Colaborador Destino</label>
                                                    <select name="Id_Colaboradores" id="Id_Colaboradores" class="browser-default">
                                                        <option value="" selected>Elija su opción</option>
                                                    <?php
                                                       foreach ($admins as $key => $row) {    
														   if($key == $this->input->post('Id_Colaboradores')){														   
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
                                                    <?php echo form_error('Id_Colaboradores'); ?>														
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
                                    </div>			
									<div class="row no-gutter" id="target">
										<br>
										<div class="col s6">
											<p class="left-align">
											
											<input type="checkbox" class="filled-in " id="checkAll"  />
											<label for="checkAll">Seleccionar Todos</label>
												
											</p>
											<br>
										</div>					
										<div class="col s6">
											<p class="right-align">
											<button class="btn waves-effect waves-light" type="button" id="button-reset"  name="reset">Limpiar Campos
												<i class="material-icons right">send</i>
											</button>												
											<button class="btn waves-effect waves-light red" type="submit" name="action">Asignar
												<i class="material-icons right">send</i>
											</button>												
											</p>	
											<br>
										</div>	
										<div class="col s1"></div>
										<div class="col s10">   
											<div style="overflow: auto; height: 600px;">
											<div id="table"></div>
											</div>
										</div>			
										<div class="col s1"></div>	
									</div>																		
                                </div>																

                            </div>
                        <?= form_close() ?>		
					</div>
					
					
				</section>
            </div>
        </main>
