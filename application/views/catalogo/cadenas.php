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
				                <i class="material-icons"><i class="material-icons">link</i></i> CATALOGO CADENAS
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
							<a class="btn-floating btn-large tooltipped" id="new_item" data-tooltip="Nuevo Item" data-position="top" data-delay="50" href="#!" data-target="modal1">
								<i class="large material-icons">add</i>
							</a>							
							<button class="btn-floating btn-large white tooltipped scrollToTop" data-tooltip="Scroll to top" data-position="top" data-delay="50">
								<i class="large material-icons">keyboard_arrow_up</i>
							</button>
						</div>			
						<div class="row">
							<div class="col s12">
								<div class="row no-gutter">								
									<div class=" right-left col s3">   
										<input type="hidden" name="select_order" id="select_order" value="" />
										<label>Nivel 0</label>
										<select id="raiz" name="raiz" class="browser-default">
											<option value="" selected>Elija su opción</option>
											<?php
												foreach ($raiz as $key => $row) {    
													if($row !== ''){
											?>
												<option value="<?= $key ?>"><?= $row ?></option>
											<?php	
													}
												}                                               
											?>											
										</select>																													
									</div>	
									<div class="right-left col s3">    
										<label>Nivel 1</label>
										<select id="sub1" name="sub1" class="browser-default">
										</select>	
										
									</div>	
									<div class="right-left col s3">    
										<label>Nivel 2</label>
										<select id="sub2" name="sub2" class="browser-default">
										</select>	
										
									</div>	
									<div class="right-left col s3">    
										<label>Nivel 3</label>
										<select id="sub3" name="sub3" class="browser-default">
										</select>	
										
									</div>										
								</div>
								<div class="row no-gutter" id="table">
									<div class="col s12">   
										<table class="highlight">
											<thead>
												<tr>
													<th>Nombre</th>
													<th>String 1</th>
													<th>String 2</th>
													<th>String 3</th>
													<th>String 4</th>
													<th>String 5</th>
													<th class="center-align" data-searchable="false" data-orderable="false">
														Actions
													</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td class="center-align">
														<div class="btn-group">

														</div>
													</td>
												</tr>										
											</tbody>
										</table>			
										<br><br><br><br><br>
									</div>										
								</div>
								<!-- Modal Structure Add-->
								<div id="modal1" class="modal">
									<div class="modal-content">
										<h5></h5>										
										<div class="crud-app">																				
											<?php
											$attributes = array('id' => 'myform');
											echo form_open('/', $attributes);											
											?> 
												<div class="row">
													<div class="col s12 m12">
														<?php
														$msg = $this->session->flashdata('msg');
														if ($msg){
															echo $msg;
														}
														?>                             		
														<div class="panel-body">                                           
															<div class="row no-gutter">		
																<div class="input-field col s6 active">
																	<input name="Nombre" id="Nombre" type="text" value="" placeholder=" ">
																	<label for="Nombre">Nombre</label>
																	<input type="hidden" name="update_id" id="update_id" value="" />
																</div>																	
																<div class="input-field col s6">
																	<input name="String1" id="String1" type="text" value="" placeholder=" ">
																	<label for="String1">String 1</label>
																</div>																
															</div>  
															<div class="row no-gutter">
																<div class="input-field col s6">
																	<input name="String2" id="String2" type="text" value=""  placeholder=" ">
																	<label for="String2">String 2</label>
																</div>														
																<div class="input-field col s6">
																	<input name="String3" id="String3" type="text" value="" placeholder=" ">
																	<label for="String3">String 3</label>
																</div>												
															</div>
															<div class="row no-gutter">
																<div class="input-field col s6">
																	<input name="String4" id="String4" type="text" value="" placeholder=" ">
																	<label for="String4">String 4</label>
																</div>													
																<div class="input-field col s6">
																	<input name="String5" id="String5" type="text" value="" placeholder=" ">
																	<label for="String5">String 5</label>
																</div>												
															</div>  											
														</div>
														<div class="panel-footer">
															<div class="right-align">
																<button type="button" class="btn-flat waves-effect modal-close">
																	CERRAR
																</button>																
																<button type="reset" class="btn-flat waves-effect">
																	BORRAR
																</button>
																<button type="button" id="botton-new" class="btn-flat waves-effect">
																	GUARDAR
																</button>
																<button type="button" id="botton-edit" class="btn-flat waves-effect">
																	ACTUALIZAR
																</button>																
															</div>
														</div>
													</div>
												</div>
											<?= form_close() ?>						
										</div>
									</div>																						
								</div>
								<!-- Modal Structure Add-->
							</div>
						</div>
					</div>	
				</section>
            </div>
        </main>