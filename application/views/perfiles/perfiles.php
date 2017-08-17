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
				                <i class="material-icons">account_circle</i> CATALAGO PERFILES
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
							<a class="btn-floating btn-large tooltipped" data-tooltip="Nuevo Perfil" data-position="top" data-delay="50" href="<?= base_url() ?>Perfiles/NewPerfil">
								<i class="large material-icons">add</i>
							</a>
							<a class="btn-floating btn-large tooltipped" data-tooltip="Asignar Menu->Pefil" data-position="top" data-delay="50" href="<?= base_url() ?>Perfiles/MenuPerfil">
								<i class="material-icons large">playlist_add_check</i>
							</a>								
							<a class="btn-floating btn-large tooltipped" data-tooltip="Asignar Colaborador->Pefil" data-position="top" data-delay="50" href="<?= base_url() ?>Perfiles/ColaboradorPerfil">
								<i class="material-icons large">transfer_within_a_station</i>
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
												<a href="<?= base_url() ?>Perfiles/index/?order=Descripcion&amp;by=DESC"><i class="material-icons">arrow_drop_down</i></a>
												Descripcion
												<a href="<?= base_url() ?>Perfiles/index/?order=Descripcion&amp;by=ASC"><i class="material-icons">arrow_drop_up</i></a>																								
											</th>
											<th>Departamento</th>
											<th>Empresa</th>											
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
											<td><?= $row->Descripcion ?></td>
											<td><?= $depto[$row->Id_Cat_Departamento] ?></td>
											<td><?= $empresa[$row->Id_Cat_Empresa] ?></td>											
											<td class="center-align">
												<div class="btn-group">
													<a href="<?= base_url() ?>Perfiles/editPerfil/<?= $row->Id_Perfil ?>" class="btn-flat btn-small waves-effect">
														<i class="material-icons">create</i>
													</a>
													
													<a href="#" onclick="if (confirm(&quot;Estas seguro que quieres borrarlo  <?= $row->Descripcion ?>?&quot;)) { window.location.href = '<?= base_url() . "Perfiles/delPerfil/" . $row->Id_Perfil ?>' } event.returnValue = false; return false;" class="btn-flat btn-small waves-effect btnDelete">
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