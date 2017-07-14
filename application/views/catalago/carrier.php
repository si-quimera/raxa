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
				                <i class="material-icons">settings_input_antenna</i> CATALAGO CARRIER
				            </h1>

				            <p></p>
				        </div>
				    </div>
				</div>
                
                
                <!-- #### -->
                <!-- Body -->
                <!-- #### -->
				<section id="apps_crud">
					<div class="crud-app">
						<div class="fixed-action-btn">
							<a class="btn-floating btn-large tooltipped pulse" data-tooltip="Nuevo Carrier" data-position="top" data-delay="50" href="<?= base_url() ?>Catalagos/newCarrier">
								<i class="large material-icons">add</i>
							</a>
							<button class="btn-floating btn-large white tooltipped scrollToTop" data-tooltip="Scroll to top" data-position="top" data-delay="50">
								<i class="large material-icons">keyboard_arrow_up</i>
							</button>
						</div>			
						<div class="row">
							<div class="col s12">
								<div class="row no-gutter">
									<div class="right-left col s6">    
									
									</div>								
									<div class="right-align col s6">    
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
								<table class="highlight">
									<thead>
										<tr>
											<th data-searchable="false" data-orderable="false">
												ID
											</th>
											<th>Nombre</th>
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
											<td><?= $row->Id_Carrier ?></td>
											<td><?= $row->Nombre ?></td>
											<td class="center-align">
												<div class="btn-group">
													<a href="<?= base_url() ?>catalagos/editCarrier/<?= $row->Id_Carrier ?>" class="btn-flat btn-small waves-effect">
														<i class="material-icons">create</i>
													</a>
													
													<a href="#" onclick="if (confirm(&quot;Estas seguro que quieres borrarlo # <?= $row->Id_Carrier ?>?&quot;)) { window.location.href = '<?= base_url() . "Catalagos/delCarrier/" . $row->Id_Carrier ?>' } event.returnValue = false; return false;" class="btn-flat btn-small waves-effect btnDelete">
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
            </div>
        </main>