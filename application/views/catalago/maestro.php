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
							<a class="btn-floating btn-large tooltipped" data-tooltip="Nueva Zona" data-position="top" data-delay="50" href="<?= base_url() ?>Catalagos/newMaestro">
								<i class="large material-icons">add</i>
							</a>
							<button class="btn-floating btn-large white tooltipped scrollToTop" data-tooltip="Scroll to top" data-position="top" data-delay="50">
								<i class="large material-icons">keyboard_arrow_up</i>
							</button>
						</div>			
						<div class="row">
							<div class="col s12">
								<div class="row no-gutter">
									<?php
									echo form_open('catalagos/maestro/search/'); 
									?> 									
									<div class="input-field right-left col s4">    
										<input id="search" name="search" type="text" value="<?= $search ?>" >
										<label for="search">Buscar x Id Cat Sec</label>																															
									</div>	
									<div class="input-field right-left col s2">
										<button class="btn waves-effect waves-light" type="submit" name="action">
											Buscar
											<i class="material-icons right">search</i>
										</button>										
									</div>	
									<div class="input-field right-align col s6">    
									<?php
									$this->load->view('templates/menu_cat.php');
									?>										
									</div>
									<?= form_close() ?>
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
												Id Cat Prim
											</th>
											<th>Id Cat Sec</th>
											<th>Nombre</th>
											<th>String 1</th>
											<th>String 2</th>
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
											<td><?= $row->Id_Cat_Prim ?></td>
											<td><?= $row->Id_Cat_Sec ?></td>
											<td><?= $row->Nombre ?></td>
											<td><?= $row->String1 ?></td>
											<td><?= $row->String2 ?></td>
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