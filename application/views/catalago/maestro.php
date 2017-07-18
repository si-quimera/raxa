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
							<a class="btn-floating btn-large tooltipped pulse" data-tooltip="Nueva Zona" data-position="top" data-delay="50" href="<?= base_url() ?>Catalagos/newMaestro">
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
									<?php      
									foreach ($consulta->result() as $row) {                                         
									?>
									<tbody>
										<tr>
											<td>
												<?php
												if (is_null($row->Id_Cat_Sec)){
													echo $master[$row->Id_Cat_Prim] = ' <i class="material-icons tiny">arrow_forward</i> <span class="orange-text text-darken-4"><strong>' . $nombres[$row->Id_Cat_Prim] .'</strong></span>'; 
												}else{				   
													echo $master[$row->Id_Cat_Prim] = ' <i class="material-icons tiny">arrow_forward</i> ' . $nombres[$row->Id_Cat_Sec] . ' <i class="material-icons tiny">arrow_forward</i> <span class="orange-text text-darken-4"><strong>' . $nombres[$row->Id_Cat_Prim] . '</strong></span>';    
												}
												?>																								
											</td>											
											<td class="center-align">
												<div class="btn-group">
													<a href="<?= base_url() ?>catalagos/editMaestro/<?= $row->Id_Cat_Prim ?>" class="btn-flat btn-small waves-effect">
														<i class="material-icons">create</i>
													</a>
													
													<a href="#" onclick="if (confirm(&quot;Estas seguro que quieres borrarlo # <?= $row->Id_Cat_Prim ?>?&quot;)) { window.location.href = '<?= base_url() . "Catalagos/delMaestro/" . $row->Id_Cat_Prim ?>' } event.returnValue = false; return false;" class="btn-flat btn-small waves-effect btnDelete">
														<i class="material-icons">delete</i>
													</a>
												</div>
											</td>
										</tr>										
									</tbody>
									<?php
									}
									?>
								</table>								
                                <?= $pagination ?> 								
							</div>
						</div>
					</div>
				</section>

        </main>