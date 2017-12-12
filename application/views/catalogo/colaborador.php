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
				                <i class="material-icons">account_box</i> CATALOGO COLABORADORES
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
							<a class="btn-floating btn-large tooltipped pulse" data-tooltip="Nuevo Colaborador" data-position="top" data-delay="50" href="<?= base_url() ?>Catalogos/newColaborador">
								<i class="large material-icons">add</i>
							</a>
							<button class="btn-floating btn-large white tooltipped scrollToTop" data-tooltip="Scroll to top" data-position="top" data-delay="50">
								<i class="large material-icons">keyboard_arrow_up</i>
							</button>
						</div>
						<div class="row">
							<div class="col s3"></div>
							<div class="col s3">
								<label style="color: black;">Nombre a Buscar:</label>
								<input type="text" name="nombre" id="nombre">
							</div>
							<div class="col s3">
								<br>
								<button class="btn" id="buscar_colaborador"><i class="material-icons">search</i>Buscar</button>
							</div>
							<div class="col s3">
								<div class="preloader-wrapper">
								    <div class="spinner-layer spinner-red-only">
								      <div class="circle-clipper left">
								        <div class="circle"></div>
								      </div><div class="gap-patch">
								        <div class="circle"></div>
								      </div><div class="circle-clipper right">
								        <div class="circle"></div>
								      </div>
								    </div>
								  </div>
							</div>
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
                                <div id="contenido_colaborador">			
								<table class="highlight">
									<thead>
										<tr>
											<th>
												<a href="<?= base_url() ?>Catalogos/colaborador/?order=Nombre&amp;by=DESC"><i class="material-icons">arrow_drop_down</i></a>
												Nombre
												<a href="<?= base_url() ?>Catalogos/colaborador/?order=Nombre&amp;by=ASC"><i class="material-icons">arrow_drop_up</i></a>
											</th>
											<th>
												<a href="<?= base_url() ?>Catalogos/colaborador/?order=Ap_Pat&amp;by=DESC"><i class="material-icons">arrow_drop_down</i></a>
												Ap Paterno
												<a href="<?= base_url() ?>Catalogos/colaborador/?order=Ap_Pat&amp;by=ASC"><i class="material-icons">arrow_drop_up</i></a>
											</th>
											<th>
												<a href="<?= base_url() ?>Catalogos/colaborador/?order=Ap_Mat&amp;by=DESC"><i class="material-icons">arrow_drop_down</i></a>
												Ap Materno
												<a href="<?= base_url() ?>Catalogos/colaborador/?order=Ap_Mat&amp;by=ASC"><i class="material-icons">arrow_drop_up</i></a>
											</th>
											<th>
												<a href="<?= base_url() ?>Catalogos/colaborador/?order=Estado&amp;by=DESC"><i class="material-icons">arrow_drop_down</i></a>
												Estado
												<a href="<?= base_url() ?>Catalogos/colaborador/?order=Estado&amp;by=ASC"><i class="material-icons">arrow_drop_up</i></a>
											</th>
											<th>
												<a href="<?= base_url() ?>Catalogos/colaborador/?order=Id_Grupo&amp;by=DESC"><i class="material-icons">arrow_drop_down</i></a>
												Grupo
												<a href="<?= base_url() ?>Catalogos/colaborador/?order=Id_Grupo&amp;by=ASC"><i class="material-icons">arrow_drop_up</i></a>
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
											<td><?= $row->Ap_Pat ?></td>
											<td><?= $row->Ap_Mat ?></td>
											<td><?= $row->Estado ?></td>
											<?php
												if (isset($grupo[$row->Id_Grupo])) {
											?>
												<td><?= $grupo[$row->Id_Grupo] ?></td>
											<?php
												} else {
											?>
												<td></td>
											<?php
												}
												
											?>
											<td class="center-align">
												<div class="btn-group">
													<a href="<?= base_url() ?>Catalogos/editColaborador/<?= $row->Id_Colaborador ?>" class="btn-flat btn-small waves-effect">
														<i class="material-icons">create</i>
													</a>
													
													<a href="#" onclick="if (confirm(&quot;Estas seguro que quieres borrarlo <?= $row->Nombre ?>?&quot;)) { window.location.href = '<?= base_url() . "Catalogos/delColaborador/" . $row->Id_Colaborador ?>' } event.returnValue = false; return false;" class="btn-flat btn-small waves-effect btnDelete">
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
					</div>
				</section>

        </main>