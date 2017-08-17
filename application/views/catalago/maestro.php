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
				                <i class="material-icons">folder_special</i> CATALAGO MAESTRO
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
							<a class="btn-floating btn-large tooltipped pulse" data-tooltip="Nuevo Maestro" data-position="top" data-delay="50" href="<?= base_url() ?>Catalagos/newMaestro">
								<i class="large material-icons">add</i>
							</a>
							<button class="btn-floating btn-large white tooltipped scrollToTop" data-tooltip="Scroll to top" data-position="top" data-delay="50">
								<i class="large material-icons">keyboard_arrow_up</i>
							</button>
						</div>			
						<div class="row">
							<div class="col s12">
                                <?php
                                $msg = $this->session->flashdata('msg');
                                if ($msg){
                                    echo $msg;
                                }    
                                ?>								
								<div class="row no-gutter">

								</div>								
							
								<table class="highlight">
									<thead>
										<tr>
											<th>Ruta</th>
											<th class="center-align" data-searchable="false" data-orderable="false">
												Actions
											</th>
										</tr>
									</thead>
									<tbody>									
									<?php      
									foreach ($consulta->result() as $row) {     																					
										if (is_null($row->Id_Cat_Sec)){
											$raiz_nombre = $row->Nombre;
											?>
												<tr>
													<td>
														<?= $raiz_nombre ?>
													</td>											
													<td class="center-align">
														<div class="btn-group">
															<a href="<?= base_url() ?>catalagos/editMaestro/<?= $row->Id_Cat_Prim ?>" class="btn-flat btn-small waves-effect">
																<i class="material-icons">create</i>
															</a>

															<a href="#" onclick="if (confirm(&quot;Estas seguro que quieres borrarlo # <?= $row->Nombre ?>?&quot;)) { window.location.href = '<?= base_url() . "Catalagos/delMaestro/" . $row->Id_Cat_Prim ?>' } event.returnValue = false; return false;" class="btn-flat btn-small waves-effect btnDelete">
																<i class="material-icons">delete</i>
															</a>
														</div>
													</td>
												</tr>										
											<?php											
											$nivel1 = $this->CatalagoModel->getMaestros($row->Id_Cat_Prim);
											foreach ($nivel1->result() as $row1) {
												$row1_nombre = $row1->Nombre;
											?>
												<tr>
													<td>
														<?= $raiz_nombre ?> <i class="material-icons tiny red-text">fast_forward</i> <?= $row1_nombre ?>
													</td>											
													<td class="center-align">
														<div class="btn-group">
															<a href="<?= base_url() ?>catalagos/editMaestro/<?= $row1->Id_Cat_Prim ?>" class="btn-flat btn-small waves-effect">
																<i class="material-icons">create</i>
															</a>

															<a href="#" onclick="if (confirm(&quot;Estas seguro que quieres borrarlo # <?= $row1->Nombre ?>?&quot;)) { window.location.href = '<?= base_url() . "Catalagos/delMaestro/" . $row1->Id_Cat_Prim ?>' } event.returnValue = false; return false;" class="btn-flat btn-small waves-effect btnDelete">
																<i class="material-icons">delete</i>
															</a>
														</div>
													</td>
												</tr>										
												<?php		
												$nivel2 = $this->CatalagoModel->getMaestros($row1->Id_Cat_Prim);
												foreach ($nivel2->result() as $row2) {
													$row2_nombre = $row2->Nombre;
												?>
												<tr>
													<td>
														<?= $raiz_nombre ?> <i class="material-icons tiny red-text">fast_forward</i> <?= $row1_nombre ?> <i class="material-icons tiny red-text">fast_forward</i> <?= $row2_nombre ?>
													</td>											
													<td class="center-align">
														<div class="btn-group">
															<a href="<?= base_url() ?>catalagos/editMaestro/<?= $row2->Id_Cat_Prim ?>" class="btn-flat btn-small waves-effect">
																<i class="material-icons">create</i>
															</a>

															<a href="#" onclick="if (confirm(&quot;Estas seguro que quieres borrarlo # <?= $row2->Nombre ?>?&quot;)) { window.location.href = '<?= base_url() . "Catalagos/delMaestro/" . $row2->Id_Cat_Prim ?>' } event.returnValue = false; return false;" class="btn-flat btn-small waves-effect btnDelete">
																<i class="material-icons">delete</i>
															</a>
														</div>
													</td>
												</tr>										
												<?php	
													$nivel3 = $this->CatalagoModel->getMaestros($row2->Id_Cat_Prim);
													foreach ($nivel3->result() as $row3) {
														$row3_nombre = $row3->Nombre;
												?>
												<tr>
													<td>
														<?= $raiz_nombre ?> <i class="material-icons tiny red-text">fast_forward</i> <?= $row1_nombre ?> <i class="material-icons tiny red-text">fast_forward</i> <?= $row2_nombre ?><i class="material-icons tiny red-text">fast_forward</i> <?= $row3_nombre ?>
													</td>											
													<td class="center-align">
														<div class="btn-group">
															<a href="<?= base_url() ?>catalagos/editMaestro/<?= $row3->Id_Cat_Prim ?>" class="btn-flat btn-small waves-effect">
																<i class="material-icons">create</i>
															</a>

															<a href="#" onclick="if (confirm(&quot;Estas seguro que quieres borrarlo # <?= $row3->Nombre ?>?&quot;)) { window.location.href = '<?= base_url() . "Catalagos/delMaestro/" . $row3->Id_Cat_Prim ?>' } event.returnValue = false; return false;" class="btn-flat btn-small waves-effect btnDelete">
																<i class="material-icons">delete</i>
															</a>
														</div>
													</td>
												</tr>		
												<?php	
														$nivel4 = $this->CatalagoModel->getMaestros($row3->Id_Cat_Prim);
														foreach ($nivel4->result() as $row4) {
															$row4_nombre = $row4->Nombre;
												?>
												<tr>
													<td>
														<?= $raiz_nombre ?> <i class="material-icons tiny red-text">fast_forward</i> <?= $row1_nombre ?> <i class="material-icons tiny red-text">fast_forward</i> <?= $row2_nombre ?><i class="material-icons tiny red-text">fast_forward</i> <?= $row3_nombre ?><i class="material-icons tiny red-text">fast_forward</i> <?= $row4_nombre ?>
													</td>											
													<td class="center-align">
														<div class="btn-group">
															<a href="<?= base_url() ?>catalagos/editMaestro/<?= $row4->Id_Cat_Prim ?>" class="btn-flat btn-small waves-effect">
																<i class="material-icons">create</i>
															</a>

															<a href="#" onclick="if (confirm(&quot;Estas seguro que quieres borrarlo # <?= $row4->Nombre ?>?&quot;)) { window.location.href = '<?= base_url() . "Catalagos/delMaestro/" . $row4->Id_Cat_Prim ?>' } event.returnValue = false; return false;" class="btn-flat btn-small waves-effect btnDelete">
																<i class="material-icons">delete</i>
															</a>
														</div>
													</td>
												</tr>										
									<?php
														}												
													}																																																
												}																																												
											}																																	
										}																								
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