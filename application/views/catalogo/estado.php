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
								<i class="material-icons">place</i> CATALOGO ESTADOS
				            </h1>

				            <p>Control de Estados</p>
				        </div>
				    </div>
				</div>
                
                
                <!-- #### -->
                <!-- Body -->
                <!-- #### -->
				<section id="apps_crud">
					<div class="crud-app">
						<div class="fixed-action-btn">
							<a class="btn-floating btn-large tooltipped pulse" data-tooltip="Nuevo Estado" data-position="top" data-delay="50" href="<?= base_url() ?>Catalogos/newEstado">
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
											<th>
												<a href="<?= base_url() ?>Catalogos/estado/?order=Nombre&amp;by=DESC"><i class="material-icons">arrow_drop_down</i></a>
												Estado
												<a href="<?= base_url() ?>Catalogos/estado/?order=Nombre&amp;by=ASC"><i class="material-icons">arrow_drop_up</i></a>
											</th>
											<th>
												<a href="<?= base_url() ?>Catalogos/estado/?order=Id_Zona&amp;by=DESC"><i class="material-icons">arrow_drop_down</i></a>
												Zona
												<a href="<?= base_url() ?>Catalogos/estado/?order=Id_Zona&amp;by=ASC"><i class="material-icons">arrow_drop_up</i></a>
											</th>
											<th class="center-align" data-searchable="false" data-orderable="false">
												Actions
											</th>
										</tr>
									</thead>
									<tbody>									
									<?php      
									foreach ($consulta->result() as $row) {                                         
									?>
										<tr>
											<td><?= $row->Nombre ?></td>
											<td><?= $zona[$row->Id_Zona] ?></td>
											<td class="center-align">
												<div class="btn-group">
													<a href="<?= base_url() ?>Catalogos/editEstado/<?= $row->Id_Estado ?>" class="btn-flat btn-small waves-effect">
														<i class="material-icons">create</i>
													</a>
													
													<a href="#" onclick="if (confirm(&quot;Estas seguro que quieres borrarlo <?= $row->Nombre ?>?&quot;)) { window.location.href = '<?= base_url() . "Catalogos/delEstado/" . $row->Id_Estado ?>' } event.returnValue = false; return false;" class="btn-flat btn-small waves-effect btnDelete">
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
            </div>
        </main>