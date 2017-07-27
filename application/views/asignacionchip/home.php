<?php
$usuario = $this->session->userdata('usuario');
$puesto_user = $this->AsignacionChipModel->getPuestoColaborador($usuario['Id_Cat_Puesto']);
if($puesto_user->String2 == 2){
	$disabled = "";
	$bgcolor = "";
}else{
	$disabled = "disabled";
	$bgcolor = "blue-grey lighten-4";
}
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
														Consultar
													</button>													
												</div>
                                            </div>  	
											<div class="row no-gutter" id="form-colaborador">
												<div class="col s6">
													<label for="Id_Almacen">Almacen</label>
                                                    <select name="Id_Almacen" id="Id_Almacen" class="browser-default <?= $bgcolor ?>" <?= $disabled ?>>
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
                                                    <?php echo form_error('Id_Ascendente'); ?>																											
												</div>												
												<div class="col s6">
													<label for="Id_Ascendente">Colaborador Ascendente</label>
                                                    <select name="Id_Ascendente" id="Id_Ascendente" class="browser-default">
                                                        <option value="" selected>Elija su opción</option>
                                                    <?php
                                                       foreach ($ascendente as $key => $row) {    
														   if($key == $this->input->post('Id_Ascendente')){														   
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
                                                    <?php echo form_error('Id_Ascendente'); ?>																											
												</div>	
												<!-- human -->
												<div class="col s6">
													<p class="right-align large blue-text ">
														<strong>																												
														<?= $usuario['Nombre'] . ' ' . $usuario['Ap_Pat'] . ' ' . $usuario['Ap_Mat'] ?><br>
														<i class="material-icons large blue-text">accessibility</i>
														</strong>
													</p>
												</div>
												<!-- human -->
												<div class="col s6 ">													
													<br>
													<label for="Id_Adjuntos">Colaboradores Adjuntos</label>
                                                    <select name="Id_Adjuntos" id="Id_Adjuntos" class="browser-default">
                                                        <option value="" selected>Elija su opción</option>
                                                    <?php												
                                                       foreach ($adjunto as $key => $row) {    
														   if($key == $this->input->post('Id_Adjuntos')){														   
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
                                                    <?php echo form_error('Id_Adjuntos'); ?>																																
												</div>
												<div class="col s6 offset-s3">
													<label for="Id_Desendentes">Colaboradores Desendentes</label>
                                                    <select name="Id_Desendentes" id="Id_Desendentes" class="browser-default">
                                                        <option value="" selected>Elija su opción</option>
                                                    <?php														
														$raiz = $this->AsignacionChipModel->getDataColaborador($usuario['Id_Colaborador']);																															
														foreach ($raiz->result() as $row) {    
															$puesto = $this->AsignacionChipModel->getPuestoColaborador($row->Id_Cat_Puesto);
															$raiz_nombre =  $puesto->Nombre . ' - ' .$row->Nombre. ' ' . $row->Ap_Pat . ' ' . $row->Ap_Mat;
															if($row->Id_Colaborador == $this->input->post('Id_Desendentes')){														   
													?>
														<option value="<?= $row->Id_Colaborador ?>" selected="selected"><?= $raiz_nombre ?></option>
													<?php
														   }else{
													?>														   
														<option value="<?= $row->Id_Colaborador ?>"><?= $raiz_nombre ?></option>
													<?php	
														   }
														   # ------- #
															$nivel1 = $this->AsignacionChipModel->getDataColaborador($row->Id_Colaborador);
															foreach ($nivel1->result() as $row1) {
																$puesto = $this->AsignacionChipModel->getPuestoColaborador($row1->Id_Cat_Puesto);																
																$row1_nombre = $puesto->Nombre . ' - ' . $row1->Nombre. ' ' . $row1->Ap_Pat . ' ' . $row1->Ap_Mat;	
																if($row1->Id_Colaborador == $this->input->post('Id_Desendentes')){
													?>
																<option value="<?= $row1->Id_Colaborador ?>" selected="selected"><?= $row1_nombre ?></option>																																
													<?php			
																}else{
													?>				
																<option value="<?= $row1->Id_Colaborador ?>"><?= $row1_nombre ?></option>																																		
													<?php																
																}																		
																# ------- #
																$nivel2 = $this->AsignacionChipModel->getDataColaborador($row1->Id_Colaborador);
																foreach ($nivel2->result() as $row2) {
																	$puesto = $this->AsignacionChipModel->getPuestoColaborador($row2->Id_Cat_Puesto);	
																	$row2_nombre = $puesto->Nombre . ' - ' . $row2->Nombre. ' ' . $row2->Ap_Pat . ' ' . $row2->Ap_Mat;	
																	if($row2->Id_Colaborador == $this->input->post('Id_Desendentes')){
														?>
																	<option value="<?= $row2->Id_Colaborador ?>" selected="selected"><?= $row2_nombre ?></option>																																
														<?php			
																	}else{
														?>				
																	<option value="<?= $row2->Id_Colaborador ?>"><?= $row2_nombre ?></option>																																		
														<?php																
																	}																		
																	# ------- #
																	$nivel3 = $this->AsignacionChipModel->getDataColaborador($row2->Id_Colaborador);
																	foreach ($nivel3->result() as $row3) {
																		$puesto3 = $this->AsignacionChipModel->getPuestoColaborador($row3->Id_Cat_Puesto);
																		$row3_nombre = $puesto3->Nombre . ' - ' . $row3->Nombre. ' ' . $row3->Ap_Pat . ' ' . $row3->Ap_Mat;	
																		if($row3->Id_Colaborador == $this->input->post('Id_Desendentes')){
															?>
																		<option value="<?= $row3->Id_Colaborador ?>" selected="selected"><?= $row3_nombre ?></option>																																
															<?php			
																		}else{
															?>				
																		<option value="<?= $row3->Id_Colaborador ?>"><?= $row3_nombre ?></option>																																		
															<?php																
																		}																			
																		# ------- #
																		$nivel4 = $this->AsignacionChipModel->getDataColaborador($row3->Id_Colaborador);
																		foreach ($nivel4->result() as $row4) {
																			$puesto4 = $this->AsignacionChipModel->getPuestoColaborador($row4->Id_Cat_Puesto);
																			$row4_nombre = $puesto4->Nombre . ' - ' .$row4->Nombre. ' ' . $row4->Ap_Pat . ' ' . $row4->Ap_Mat;	
																			if($row4->Id_Colaborador == $this->input->post('Id_Desendentes')){
																?>
																			<option value="<?= $row4->Id_Colaborador ?>" selected="selected"><?= $row4_nombre ?></option>																																
																<?php			
																			}else{
																?>				
																			<option value="<?= $row4->Id_Colaborador ?>"><?= $row4_nombre ?></option>																																		
																<?php																
																			}	
																			# ------- #
																			$nivel5 = $this->AsignacionChipModel->getDataColaborador($row4->Id_Colaborador);
																			foreach ($nivel5->result() as $row5) {
																				$puesto5 = $this->AsignacionChipModel->getPuestoColaborador($row5->Id_Cat_Puesto);
																				$row5_nombre = $puesto5->Nombre . ' - ' .$row5->Nombre . ' ' . $row5->Ap_Pat . ' ' . $row5->Ap_Mat;	
																				if($row5->Id_Colaborador == $this->input->post('Id_Desendentes')){
																	?>
																				<option value="<?= $row5->Id_Colaborador ?>" selected="selected"><?= $row5_nombre ?></option>																																
																	<?php			
																				}else{
																	?>				
																				<option value="<?= $row5->Id_Colaborador ?>"><?= $row5_nombre ?></option>																																		
																	<?php																
																				}			
																				# ------- #
																				$nivel6 = $this->AsignacionChipModel->getDataColaborador($row5->Id_Colaborador);
																				foreach ($nivel6->result() as $row6) {
																					$puesto6 = $this->AsignacionChipModel->getPuestoColaborador($row6->Id_Cat_Puesto);
																					$row6_nombre = $puesto6->Nombre . ' - ' .$row6->Nombre . ' ' . $row6->Ap_Pat . ' ' . $row6->Ap_Mat;	
																					if($row6->Id_Colaborador == $this->input->post('Id_Desendentes')){
																		?>
																					<option value="<?= $row6->Id_Colaborador ?>" selected="selected"><?= $$row6_nombre ?></option>																																
																		<?php			
																					}else{
																		?>				
																					<option value="<?= $row6->Id_Colaborador ?>"><?= $row6_nombre ?></option>																																		
																		<?php																
																					}																																									
																				}
																			}
																		}																		
																	}																		
																}																	
															}	
                                                       }                                               
                                                    ?>
                                                    </select>                                                    
                                                    <?php echo form_error('Id_Desendentes'); ?>													
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
