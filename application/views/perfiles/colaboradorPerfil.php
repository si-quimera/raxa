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
				                <i class="material-icons large">transfer_within_a_station</i> ASIGNAR COLABORADOR <i class="material-icons blue-text">trending_flat</i> PERFIL
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
							<a class="btn-floating btn-large tooltipped pulse" data-tooltip="Nuevo Colaborador > Perfil" data-position="top" data-delay="50" href="<?= base_url() ?>Perfiles/NewColaboradorPerfil">
								<i class="large material-icons">add</i>
							</a>
							<a class="btn-floating btn-large tooltipped pulse" data-tooltip="Catalago Perfiles" data-position="top" data-delay="50" href="<?= base_url() ?>Perfiles/">
								<i class="material-icons large">account_circle</i>
							</a>								
							<a class="btn-floating btn-large tooltipped pulse" data-tooltip="Asignar Menu->Pefil" data-position="top" data-delay="50" href="<?= base_url() ?>Perfiles/MenuPerfil">
								<i class="material-icons large">playlist_add_check</i>
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
											<th>Colaborador</th>
											<th>Menu > Perfil</th>
											<th>Activo</th>
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
											<td><?= $colaborador[$row->Id_Colaborador] ?></td>
											<td><?= $perfiles[$row->Id_Menu_Perfil] ?></td>
											<td>
												<?php
												if($row->Activo == 1){
													echo "Activo";
												}else{
													echo "Desactivado";
												}
												
												?>
											</td>
											<td class="center-align">
												<div class="btn-group">
													<a href="<?= base_url() ?>Perfiles/editColaboradorPerfil/<?= $row->Id_Colaborador_Perfil ?>" class="btn-flat btn-small waves-effect">
														<i class="material-icons">create</i>
													</a>
													
													<a href="#" onclick="if (confirm(&quot;Estas seguro que quieres borrarlo  <?= $colaborador[$row->Id_Colaborador] ?>?&quot;)) { window.location.href = '<?= base_url() . "Perfiles/delColaboradorPerfil/" . $row->Id_Colaborador_Perfil ?>' } event.returnValue = false; return false;" class="btn-flat btn-small waves-effect btnDelete">
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