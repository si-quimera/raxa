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
				                <i class="material-icons">map</i> ACTIVACIÓN SIM BENEFICIO
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
							<button class="btn-floating btn-large white tooltipped scrollToTop" data-tooltip="Scroll to top" data-position="top" data-delay="50">
								<i class="large material-icons">keyboard_arrow_up</i>
							</button>
						</div>			
						<div class="row">
							<div class="col">
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
								<table class="striped">
									<thead>
										<tr>
											<th>
												Num Cliente
											</th>
											<th>
												Colaborador
											</th>
											<th>
												Nombre Porta
											</th>
											<th>
												NIP Porta											
											</th>
											<th>
												Vigencia NIP
											</th>
											<th>
												Tel Temporal
											</th>	
											<th>
												Carrier
											</th>	
											<th>
												ICCDID
											</th>	
											<th>
												Fecha Registro
											</th>	
											<th>
												Fase Portabilidad
											</th>	
											<th>
												Tel Fijo
											</th>				
											<th>
												Email
											</th>
											<th>
												Tipo Producto
											</th>
											<th>
												Credencial
											</th>	
											<th>
												Error
											</th>												
										</tr>
									</thead>
									<tbody>									
									<?php      
									foreach ($consulta->result() as $row) {                                         
									?>
										<tr>																						
											<td><?= $row->Num_Cliente ?></td>
											<td><?= $colaborador[$row->Id_Colaborador] ?></td>
											<td><?= $row->Nom_Persona_Porta ?></td>
											<td><?= $row->NIP_Portar ?></td>
											<td><?= $row->Vigencia_NIP ?></td>
											<td><?= $row->Num_Tel_Temporal ?></td>
											<td><?= $carrier[$row->Id_Carrier] ?></td>
											
											<td><?= $row->ICCDID ?></td>
											<td><?= $row->Fecha_Registro_Porta ?></td>
											<td><?= $portabilidad[$row->Id_Cat_Fase_Portabilidad] ?></td>
											<td><?= $row->Tel_Fijo_Alterno ?></td>
											<td><?= $row->email ?></td>
											<td><?= $producto[$row->Id_Cat_Tipo_Producto] ?></td>
											<td class="center-align">
												<?php
												if($row->Foto_Credencial_ICCDID != ''){
												?>
												<a href="<?= base_url() . '/webroot/ife/' . $row->Foto_Credencial_ICCDID ?>" target="_blank"><i class="material-icons">attach_file</i></a>
												<?php	
												}
												?>												
											</td>
											<td><?= $row->Id_Cat_Error_Portabilidad ?></td>
											
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