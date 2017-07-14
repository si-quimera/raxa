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
				                <i class="material-icons">account_box</i> CATALAGO COLABORADORES
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
							<a class="btn-floating btn-large tooltipped pulse" data-tooltip="Nuevo Colaborador" data-position="top" data-delay="50" href="<?= base_url() ?>Catalagos/newColaborador">
								<i class="large material-icons">add</i>
							</a>
							<button class="btn-floating btn-large white tooltipped scrollToTop" data-tooltip="Scroll to top" data-position="top" data-delay="50">
								<i class="large material-icons">keyboard_arrow_up</i>
							</button>
						</div>			
						<div class="row">
							<div class="col s12">
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
								<table class="highlight">
									<thead>
										<tr>
											<th data-searchable="false" data-orderable="false">
												ID
											</th>
											<th>Nombre</th>
											<th>Ap Paterno</th>
											<th>Ap Materno</th>
											<th>Grupo</th>
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
											<td><?= $row->Id_Colaborador ?></td>
											<td><?= $row->Nombre ?></td>
											<td><?= $row->Ap_Pat ?></td>
											<td><?= $row->Ap_Mat ?></td>
											<td>
											<?php
											if(is_null($row->Id_Grupo)){
												echo "-";
											}else{
												echo $grupo[$row->Id_Grupo];
											}											 
											?></td>
											<td class="center-align">
												<div class="btn-group">
													<a href="<?= base_url() ?>catalagos/editColaborador/<?= $row->Id_Colaborador ?>" class="btn-flat btn-small waves-effect">
														<i class="material-icons">create</i>
													</a>
													
													<a href="#" onclick="if (confirm(&quot;Estas seguro que quieres borrarlo # <?= $row->Id_Colaborador ?>?&quot;)) { window.location.href = '<?= base_url() . "Catalagos/delColaborador/" . $row->Id_Colaborador ?>' } event.returnValue = false; return false;" class="btn-flat btn-small waves-effect btnDelete">
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