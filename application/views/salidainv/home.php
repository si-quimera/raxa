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
				                <i class="material-icons">assignment_return</i> SALIDA INVENTARIO CENTRAL
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
							<div class="col s12">
                                <?php
                                $msg = $this->session->flashdata('msg');
                                if ($msg){
                                    echo $msg;
                                }    
                                ?>								
								<div class="row no-gutter">
									<?php
									echo form_open_multipart('SalidaInv'); 
									?> 									
									<div class="input-field right-left col s4">    

										<div class="file-field input-field">
											<div class="btn">
												<span>CSV</span>
												<input type="file" name="userfile[]">
											</div>
											<div class="file-path-wrapper">
												<input class="file-path validate" type="text" required>
											</div>
										</div>																														
									</div>	
									<div class="input-field right-left col s2">
										<br>
										<button class="btn waves-effect waves-light" type="submit" name="action">
											Cargar <i class="material-icons right">send</i>
										</button>										
									</div>	
									<div class="input-field right-align col s6">    									
									</div>
									<?= form_close() ?>
								</div>								
								
								<table class="highlight">
									<thead>
										<tr>
											<th><a href="<?= base_url() ?>SalidaInv/index/?order=ICCDID"><i class="material-icons tiny">get_app</i> ICCDID</a></th>
											<th><a href="<?= base_url() ?>SalidaInv/index/?order=Fecha_Salida_Inv_Central"><i class="material-icons tiny">get_app</i> Fecha Salida Inv Central</a></th>
											<th><a href="<?= base_url() ?>SalidaInv/index/?order=Fecha_Entrada_RAXA_Ctrl"><i class="material-icons tiny">get_app</i>  Fecha Entrada RAXA Ctrl</a></th>
											<th><a href="<?= base_url() ?>SalidaInv/index/?order=Fecha_Salida_RAXA_Ctrl"><i class="material-icons tiny">get_app</i> Fecha Salida RAXA Ctrl</a></th>
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
											<td><?= $row->ICCDID ?></td>
											<td><?= $row->Fecha_Salida_Inv_Central ?></td>
											<td><?= $row->Fecha_Entrada_RAXA_Ctrl ?></td>
											<td><?= $row->Fecha_Salida_RAXA_Ctrl ?></td>
											<td class="center-align">

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