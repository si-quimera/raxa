        <!-- ####### -->
        <!-- Content -->
        <!-- ####### -->
        <main>
            <style>
                .select-reset {
                    background-color: rgba(255, 255, 255, 0.9);
                    width: inherit;
                    padding: inherit;
                    border: inherit;
                    border-radius: inherit;
                    height:inherit;
                }


                .input-reset{
                    background-color: inherit !important;;
                    border: none !important;;
                    outline: inherit !important;;
                    height: inherit !important;
                    width: inherit !important;;
                    font-size: inherit !important;;
                    margin: inherit !important;;
                    padding: inherit !important;;


                }
            </style>
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






                <div id="PeopleTableContainer" style="width: 600px;"></div>




























                
                
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
											<th class="center-align">
												Status
											</th>	
											<th>
												Opciones
											</th>												
										</tr>
									</thead>
									<tbody>									
									<?php      
									foreach ($consulta->result() as $row) {                                         
									?>
										<tr>																						
											<td id="row0<?= $row->Num_Cliente ?>"><strong><?= $row->Num_Cliente ?></a></td>
											<td><?= $colaborador[$row->Id_Colaborador] ?></td>
											<td><?= $row->Nom_Persona_Porta ?></td>
											<td><?= $row->NIP_Portar ?></td>
											<td><?= $row->Vigencia_NIP ?></td>
											<td><?= $carrier[$row->Id_Carrier] ?></td>											
											<td><?= $row->ICCDID ?></td>
											<td><?= $row->Fecha_Registro_Porta ?></td>
											<td class="green-text" id="porta-<?= $row->Num_Cliente ?>">
												<?= $portabilidad[$row->Id_Cat_Fase_Portabilidad] ?>
											</td>
											<td><?= $row->Tel_Fijo_Alterno ?></td>
											<td><a href="mailto:<?= $row->email ?>"><?= $row->email ?></a></td>
											<td><?= $producto[$row->Id_Cat_Tipo_Producto] ?></td>
											<td class="center-align">
												<?php
												if($row->Foto_Credencial_ICCDID != ''){
												?>
												<a href="<?= base_url() . 'webroot/ife/' . $row->Foto_Credencial_ICCDID ?>" target="_blank"><i class="material-icons">attach_file</i></a>
												<?php	
												}
												?>												
											</td>
											<td class="red-text" id="error-<?= $row->Num_Cliente ?>">
												<?php
												if(!is_null($row->Id_Cat_Error_Portabilidad)){
													echo $errores[$row->Id_Cat_Error_Portabilidad]; 
												}			
												?>
											</td>
											<td class="center-align" id="status-<?= $row->Num_Cliente ?>">
												<?php
												if($row->bloqueo == 0){
												?>
												<div class="led-green"></div>
												<?php
												}else{
												?>
												<div class="led-red"></div>
												<?php
												}
												?>
											</td>
											<td class="center-align">
												<a href="#!" class="edit_status" id="<?= $row->Num_Cliente ?>" data-iccdid="<?= $row->ICCDID ?>" data-fase="<?= $row->Id_Cat_Fase_Portabilidad ?>" data-error="<?= $row->Id_Cat_Error_Portabilidad ?>"><i class="material-icons">mode_edit</i></a>
												
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
														<div class="panel-body">                                           
															<div class="row no-gutter">	
																<div class=" col s6">
																	<label for="Id_Cat_Fase_Portabilidad">Fase Portabilidad</label>
																	<select name="Id_Cat_Fase_Portabilidad" id="Id_Cat_Fase_Portabilidad" class="browser-default">
																		<option value="" selected>Elija su opción</option>
																	<?php
																	   foreach ($portabilidad as $key => $row) {    												   
																	?>														   
																		<option value="<?= $key ?>"><?= $row ?></option>
																	<?php	
																	   }                                               
																	?>														
																	</select>	
																	<?php echo form_error('Id_Cat_Fase_Portabilidad'); ?>
																</div>												
																<div class="col s6">	
																	<label for="Id_Cat_Error_Portabilidad">Error Portabilidad</label>
																	<select name="Id_Cat_Error_Portabilidad" id="Id_Cat_Error_Portabilidad" class="browser-default">
																		<option value="" selected>Elija su opción</option>
																	<?php
																	   foreach ($errores as $key => $row) {    												  
																	?>														   
																		<option value="<?= $key ?>"><?= $row ?></option>
																	<?php	
																	   }                                               
																	?>	
																	</select>                                                    
																	<?php echo form_error('Id_Cat_Error_Portabilidad'); ?>															
																</div>																	
															</div>
																
														</div>
														<div class="panel-footer">
															<div class="right-align">
																<input type="hidden" name="Num_Cliente_item" id="Num_Cliente_item" value="" />
																<input type="hidden" name="ICCDID_item" id="ICCDID_item" value="" />
																<button type="button" class="btn-flat waves-effect modal-close">
																	CERRAR
																</button>																
																<button type="button" id="activacion-sim" class="btn-flat waves-effect">
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