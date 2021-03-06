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
				                <i class="material-icons">card_membership</i> CATALOGO ALMACEN
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
							<a class="btn-floating btn-large tooltipped pulse" data-tooltip="Nuevo Almacen" data-position="top" data-delay="50" href="<?= base_url() ?>Catalogos/newAlmacen">
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
											<th>
												<a href="<?= base_url() ?>Catalogos/almacen/?order=Nombre&amp;by=DESC"><i class="material-icons">arrow_drop_down</i></a>
												Nombre
												<a href="<?= base_url() ?>Catalogos/almacen/?order=Nombre&amp;by=ASC"><i class="material-icons">arrow_drop_up</i></a>
											</th>
											<th>
												<a href="<?= base_url() ?>Catalogos/almacen/?order=Id_Sucursal&amp;by=DESC"><i class="material-icons">arrow_drop_down</i></a>
												Sucursal
												<a href="<?= base_url() ?>Catalogos/almacen/?order=Id_Sucursal&amp;by=ASC"><i class="material-icons">arrow_drop_up</i></a>
											</th>
											<th>
												<a href="<?= base_url() ?>Catalogos/almacen/?order=Direccion&amp;by=DESC"><i class="material-icons">arrow_drop_down</i></a>
												Direcci&oacute;n
												<a href="<?= base_url() ?>Catalogos/almacen/?order=Direccion&amp;by=ASC"><i class="material-icons">arrow_drop_up</i></a>
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
											<td><?= $sucursal[$row->Id_Sucursal] ?></td>
											<td><?= $row->Direccion ?></td>
											<td class="center-align">
												<div class="btn-group">
													<a href="<?= base_url() ?>Catalogos/editAlmacen/<?= $row->Id_Almacen ?>" class="btn-flat btn-small waves-effect">
														<i class="material-icons">create</i>
													</a>
													
													<a href="#" onclick="if (confirm(&quot;Estas seguro que quieres borrarlo <?= $row->Nombre ?>?&quot;)) { window.location.href = '<?= base_url() . "Catalogos/delAlmacen/" . $row->Id_Almacen ?>' } event.returnValue = false; return false;" class="btn-flat btn-small waves-effect btnDelete">
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