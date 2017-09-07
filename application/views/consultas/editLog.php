        <!-- ####### -->
        <!-- Content -->
        <!-- ####### -->
        <main>
            <div class="main-content hg1">
                <!-- ###### -->
                <!-- Header -->
                <!-- ###### -->
				<div class="row">
				    <div class="col s12">
				        <div class="page-header">
				            <h1>
				                <i class="material-icons">timeline</i> EDITAR SIGUIMIENTO
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
                            <a class="btn-floating btn-large tooltipped" data-tooltip="Regresar" data-position="top" data-delay="50" href="<?= base_url().'Seguimiento/Log/' . $edicion->Num_Cliente ?>">
                                <i class="large material-icons">undo</i>
                            </a>
                            <button class="btn-floating btn-large white tooltipped scrollToTop" data-tooltip="Scroll to top" data-position="top" data-delay="50">
                                <i class="large material-icons">keyboard_arrow_up</i>
                            </button>
                        </div>			
                        <?php
                        $hidden = array('Num_Cliente' => $edicion->Num_Cliente);
                        echo form_open('Seguimiento/EditLog/'.$edicion->Num_Cliente, '', $hidden); 
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
													<label for="Id_Cat_Status">Status Portabilidad</label>
													<select name="Id_Cat_Status" id="Id_Cat_Status" class="browser-default">
														<option value="" selected>Elija su opción</option>
													<?php
													foreach ($status as $key => $row) {    
													   if($key == $edicion->Id_Cat_Status){														   
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
													<?php echo form_error('Id_Cat_Status'); ?>	
                                                </div>
                                                <div class="col s6">
													<label for="Id_Cat_Error_Portabilidad">Error Portabilidad</label>
													<select name="Id_Cat_Error_Portabilidad" id="Id_Cat_Status" class="browser-default">
														<option value="" selected>Elija su opción</option>
													<?php
													foreach ($error as $key => $row) {    
													   if($key == $edicion->Id_Cat_Error_Portabilidad){														   
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
													<?php echo form_error('Id_Cat_Error_Portabilidad'); ?>														
                                                </div>
                                            </div>   
                                            <div class="row no-gutter">											
                                                <div class="input-field col s3">
                                                    <input name="Num_Llamadas_Entrantes" id="Num_Llamadas_Entrantes" type="text" value="<?= $edicion->Num_Llamadas_Entrantes ?>">
                                                    <label for="Num_Llamadas_Entrantes">Num Llamadas Entrantes</label>
													<?php echo form_error('Num_Llamadas_Entrantes'); ?>
                                                </div>	
												<div class="input-field col s3"></div>
                                                <div class="input-field col s3">
                                                    <input name="Num_Llamadas_Salientes" id="Num_Llamadas_Salientes" type="text" value="<?= $edicion->Num_Llamadas_Salientes ?>">
                                                    <label for="Num_Llamadas_Salientes">Num Llamadas Salientes</label>
													<?php echo form_error('Num_Llamadas_Salientes'); ?>
                                                </div>	
												<div class="input-field col s3"></div>												
											</div>	
                                            <div class="row no-gutter">											
                                                <div class="input-field col s3">
                                                    <input name="Num_SMS" id="Num_SMS" type="text" value="<?= $edicion->Num_SMS ?>">
                                                    <label for="Num_SMS">Num SMS</label>
													<?php echo form_error('Num_SMS'); ?>
                                                </div>	
												<div class="input-field col s3"></div>
                                                <div class="input-field col s3">
                                                    <input name="Num_Datos" id="Num_Datos" type="text" value="<?= $edicion->Num_Datos ?>">
                                                    <label for="Num_Datos">Num Datos</label>
													<?php echo form_error('Num_Datos'); ?>
                                                </div>	
												<div class="input-field col s3"></div>												
											</div>	
                                            <div class="row no-gutter">											
                                                <div class="input-field col s3">
                                                    <input name="Num_Actv_Total" id="Num_Actv_Total" type="text" value="<?= $edicion->Num_Actv_Total ?>">
                                                    <label for="Num_Actv_Total">Num Actv Total</label>
													<?php echo form_error('Num_Actv_Total'); ?>
                                                </div>	
												<div class="input-field col s3"></div>
                                                <div class="input-field col s3">
													
                                                    <input name="Fecha_Recarga" id="Fecha_Recarga" type="text" class="datepicker" value="<?= $edicion->Fecha_Recarga ?>">
                                                    <label for="Fecha_Recarga">Fecha de Recarga</label>
													<?php echo form_error('Fecha_Recarga'); ?>
                                                </div>	
												<div class="input-field col s3"></div>												
											</div>
                                            <div class="row no-gutter">											
                                                <div class="input-field col s3">
                                                    <input name="Monto_Recarga" id="Monto_Recarga" type="text" value="<?= $edicion->Monto_Recarga ?>">
                                                    <label for="Monto_Recarga">Monto Recarga / $</label>
													<?php echo form_error('Monto_Recarga'); ?>
                                                </div>	
												<div class="input-field col s3"></div>
                                                <div class="input-field col s3">
													
                                                    <input name="Fecha_Val_Actividad" id="Fecha_Val_Actividad" type="text" class="datepicker" value="<?= $edicion->Fecha_Val_Actividad ?>">                                                    
													<label for="Fecha_Val_Actividad">Fecha Val Actividad</label> 
													<?php echo form_error('Fecha_Val_Actividad'); ?>
                                                </div>	
												<div class="input-field col s3"></div>												
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