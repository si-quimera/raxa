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
				                <i class="material-icons">timeline</i> SEGUIMIENTO LINEA <?= $this->uri->segment(3) ?>
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
							<a class="btn-floating btn-large tooltipped pulse" data-tooltip="Nuevo Estado" data-position="top" data-delay="50" href="<?= base_url() ?>Seguimiento/NewLog/<?= $this->uri->segment(3) ?>">
								<i class="large material-icons">add</i>
							</a>							
                            <a class="btn-floating btn-large tooltipped" data-tooltip="Regresar" data-position="top" data-delay="50" href="<?= base_url().'Seguimiento/ActSIM' ?>">
                                <i class="large material-icons">undo</i>
                            </a>							
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
											<th>Fecha</th>
											<th>Colaborador</th>
											<th>Status</th>
											<th>Error Portabilidad</th>	
											<th>Descripcion</th>
											<th class="center-align">Llamadas Entrantes</th>
											<th class="center-align">Llamadas Salientes</th>
											<th class="center-align">SMS</th>
											<th class="center-align">Datos</th>	
											<th class="center-align">Actv Total</th>
											<th>Fecha Recarga</th>
											<th>Monto Recarga</th>
											<th>Fecha Val Actividad</th>											
											<th class="center-align">
												Opciones
											</th>											
										</tr>
									</thead>
									<tbody>									
									<?php      
									foreach ($consulta->result() as $row) {                                         
									?>
										<tr>																						
											<td><?= $row->Fecha_Actividad ?></td>
											<td><?= $colaborador[$row->Id_Colaborador] ?></td>
											<td>
												<?php
												if(!is_null($row->Id_Cat_Status)){				
													echo $status[$row->Id_Cat_Status];
												}else{
													echo '-';
												}												
												?>
											</td>
											<td>
												<?php
												if(!is_null($row->Id_Cat_Error_Portabilidad)){				
													echo $error[$row->Id_Cat_Error_Portabilidad];
												}else{
													echo "-";
												}												
												?>											
											</td>
											<td><?= $row->Descripcion ?></td>
											<td class="center-align">
												<?php
												if(!is_null($row->Num_Llamadas_Entrantes)){				
													echo $row->Num_Llamadas_Entrantes;
												}else{
													echo "0";
												}												
												?>												
											</td>
											<td class="center-align">
												<?php
												if(!is_null($row->Num_Llamadas_Salientes)){				
													echo $row->Num_Llamadas_Salientes;
												}else{
													echo "0";
												}												
												?>													
											</td>											
											<td class="center-align">
												<?php
												if(!is_null($row->Num_SMS)){				
													echo $row->Num_SMS;
												}else{
													echo "0";
												}												
												?>													
											</td>
											<td class="center-align">
												<?php
												if(!is_null($row->Num_Datos)){				
													echo $row->Num_Datos;
												}else{
													echo "0";
												}												
												?>													
											</td>
											<td class="center-align">
												<?php
												if(!is_null($row->Num_Actv_Total)){				
													echo $row->Num_Actv_Total;
												}else{
													echo "0";
												}												
												?>													
											</td>
											<td><?= $row->Fecha_Recarga ?></td>
											<td>$ <?= $row->Monto_Recarga ?></td>
											<td><?= $row->Fecha_Val_Actividad ?></td>
											<td class="center-align">
												<div class="btn-group">
													<a href="<?= base_url() ?>Seguimiento/EditLog/<?= $row->Num_Cliente ?>" class="btn-flat btn-small waves-effect">
														<i class="material-icons">create</i>
													</a>													
													<a href="#" onclick="if (confirm(&quot;Estas seguro que quieres borrarlo <?= $row->Num_Cliente ?>?&quot;)) { window.location.href = '<?= base_url() . "Catalogos/delCarrier/" . $row->Num_Cliente ?>' } event.returnValue = false; return false;" class="btn-flat btn-small waves-effect btnDelete">
														<i class="material-icons">delete</i>
													</a>
												</div>
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
        </main>