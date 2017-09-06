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
				                <i class="material-icons">map</i> ACTIVACIÓN SIM
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
						<div class="row">
							<div class="col">
								<div class="row no-gutter">								
									<div class="input-field right-left col s6"></div>	
									<div class="input-field right-align col s6">    
									<?php
									$this->load->view('templates/menu_cat.php');
									?>										
									</div>
								</div>								

                                <?php
                                $msg = $this->session->flashdata('msg');
                                if ($msg){
                                    echo $msg;
                                }    
                                ?>								
								<table class="striped" id="tabla_seg">
									<thead>
										<tr>
											<th>
												Num Cliente
											</th>
											<th>
												Colaborador
											</th>
											<th>
												Nombre Porta
											</th>
											<th>
												NIP Porta											
											</th>
											<th>
												Vigencia NIP
											</th>
											<th>
												Carrier
											</th>	
											<th>
												ICCDID
											</th>	
											<th>
												Fecha Registro
											</th>	
											<th>
												Fase Portabilidad
											</th>	
											<th>
												Tel Fijo
											</th>				
											<th>
												Email
											</th>
											<th>
												Tipo Producto
											</th>
											<th>
												Credencial
											</th>	
											<th>
												Error
											</th>
											<th>
												Seguimiento
											</th>											
										</tr>
									</thead>
									<tbody>									
									<?php      
									foreach ($consulta->result() as $row) {                                         
									?>
										<tr>																						
											<td id="row0<?= $row->Num_Cliente ?>"><strong><?= $row->Num_Cliente ?></strong></td>
											<td id="row1<?= $row->Num_Cliente ?>"><?= $colaborador[$row->Id_Colaborador] ?></td>
											<td id="row2<?= $row->Num_Cliente ?>"><?= $row->Nom_Persona_Porta ?></td>
											<td id="row3<?= $row->Num_Cliente ?>"><?= $row->NIP_Portar ?></td>
											<td id="row4<?= $row->Num_Cliente ?>"><?= $row->Vigencia_NIP ?></td>
											<td id="row6<?= $row->Num_Cliente ?>"><?= $carrier[$row->Id_Carrier] ?></td>											
											<td id="row7<?= $row->Num_Cliente ?>"><?= $row->ICCDID ?></td>
											<td id="row8<?= $row->Num_Cliente ?>"><?= $row->Fecha_Registro_Porta ?></td>
											<td id="row9<?= $row->Num_Cliente ?>"><?= $portabilidad[$row->Id_Cat_Fase_Portabilidad] ?></td>
											<td id="row10<?= $row->Num_Cliente ?>"><?= $row->Tel_Fijo_Alterno ?></td>
											<td id="row11<?= $row->Num_Cliente ?>"><?= $row->email ?></td>
											<td id="row12<?= $row->Num_Cliente ?>"><?= $producto[$row->Id_Cat_Tipo_Producto] ?></td>
											<td class="center-align">
												<?php
												if($row->Foto_Credencial_ICCDID != ''){
												?>
												<a href="<?= base_url() . '/webroot/ife/' . $row->Foto_Credencial_ICCDID ?>" target="_blank"><i class="material-icons">attach_file</i></a>
												<?php	
												}
												?>												
											</td>
											<td><?= $row->Id_Cat_Error_Portabilidad ?></td>
											<td class="center-align">
												<a href="<?= base_url() . 'Seguimiento/Log/' . $row->Num_Cliente ?>"><i class="material-icons">timeline</i></a>
											</td>
										</tr>										
									<?php
									}
									?>
									</tbody>										
								</table>								
                                <?= $pagination ?> 								
							</div>
						</div>
					</div>
				</section>

								<!-- Modal Structure Add-->
								<div id="modal2" class="modal">
									<div class="modal-content">
										<h5></h5>										
										<div class="crud-app">																				
											<?php
											$attributes = array('id' => 'myform');
											echo form_open('/', $attributes);											
											?> 
												<div class="row">
													<div class="col s12 m12">
														<?php
														$msg = $this->session->flashdata('msg');
														if ($msg){
															echo $msg;
														}
														?>                             		
														<div class="panel-body">                                           
															<div class="row no-gutter">
																<div class="col s3">
																	<label for="Fecha_Registro_Porta">Fecha Registro</label>
																	<input type="text" name="Fecha_Registro_Porta" id="Fecha_Registro_Porta" class="datepicker" placeholder=" " value="">                                                    								
																</div>	
																<div class="col s3"></div>	
																<div class="col s3">
																	<label for="Vigencia_NIP">Vigencia NIP</label>
																	<input type="text" name="Vigencia_NIP" id="Vigencia_NIP" class="datepicker" placeholder=" " value="">                                                    																																											
																</div>	
																<div class="col s3"></div>											
															</div>  											
															<div class="row no-gutter">												
																<div class="input-field  col s6">
																	<label for="Nom_Persona_Porta">Nombre del Cliente</label>
																	<input type="text" name="Nom_Persona_Porta" id="Nom_Persona_Porta" value="">                                                    	
																</div>					
																<div class="input-field col s6">
																	<input name="Num_Cliente" id="Num_Cliente" type="text" placeholder=" " value="">
																	<label for="Num_Cliente">Numero de Cliente</label>
																</div>													
															</div> 											
															<div class="row no-gutter">
																<div class="input-field col s3">
																	<input name="NIP_Portar" id="NIP" type="text" placeholder=" " value="">
																	<label for="NIP_Portar">NIP</label>																
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
															<div class="row no-gutter">
																<div class="input-field col s6">
																	<input name="String4" id="String4" type="text" value="" placeholder=" ">
																	<label for="String4">String 4</label>
																</div>													
																<div class="input-field col s6">
																	<input name="String5" id="String5" type="text" value="" placeholder=" ">
																	<label for="String5">String 5</label>
																</div>												
															</div>  											
														</div>
														<div class="panel-footer">
															<div class="right-align">
																<button type="button" class="btn-flat waves-effect modal-close">
																	CERRAR
																</button>																
																<button type="button" id="botton-edit" class="btn-flat waves-effect">
																	ACTUALIZAR
																</button>																
															</div>
														</div>
													</div>
												</div>
											<?= form_close() ?>						
										</div>
									</div>																						
								</div>
								<!-- Modal Structure Add-->				
				
				
        </main>