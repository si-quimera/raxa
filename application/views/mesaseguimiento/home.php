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
				                <i class="material-icons">playlist_add_check</i> MESA SEGUIMIENTO 
				            </h1>
				        </div>
				    </div>
				</div>
                
                
                <!-- #### -->
                <!-- Body -->
                <!-- #### -->
				<section id="apps_crud">
					<div class="crud-app">																		
                        			
                        <?php
                        echo form_open('', 'id="frmMesaSeguimiento"');  
                        ?> 
                            <div class="row">
								<div style="height: 20px;">
									<div class="progress" id="preload" style="display: none;">
										<div class="indeterminate"></div>
									</div>
								</div>									
                                <div class="col s12 m12">
                                    <?php
                                    $msg = $this->session->flashdata('msg');
                                    if ($msg){
                                        echo $msg;
                                    }
                                    ?>  
                                    <div class="panel panel-bordered">				
                                        <div class="panel-body">                                           
                                            <div class="row no-gutter">
                                                <div class="col s6">
													<label for="Id_MesaSeguimiento">Colaborador</label>  
                                                    <select name="Id_MesaSeguimiento" id="Id_MesaSeguimiento" class="browser-default select2-container">
                                                        <option value="" selected>Elija su opción</option>
                                                    <?php
                                                        foreach ($colaboradores->result() as $key) {    
													?>
														<option value="<?= $key->Id_Colaborador ?>"> <?= $key->Nombre ?> <?= $key->Ap_Pat ?> <?= $key->Ap_Mat ?> </option>
													<?php
                                                        }                                               
                                                    ?>
                                                    </select>                                                    
													<?php echo form_error('Id_MesaSeguimiento'); ?>
                                                </div>
                                                <div class=" col s6"></div>												
                                            </div>  
                                            <div class="row no-gutter">
                                                <div class="col s12">																										                                       
													<div class="col s3 l5 center-align">
														<h6 class="blue-text">&nbsp;</h6>
														<select name="from[]" id="search" class="browser-default select-height"  multiple="multiple">													
														</select>                                                                                             
													</div>  
													<div class=" col s2 l2 center-align">  
														<br><br>
														<a class="btn-floating btn-small waves-effect waves-light" id="search_rightAll"><i class="material-icons">last_page</i></a>
														<br>
														<a class="btn-floating btn-small waves-effect waves-light" id="search_rightSelected"><i class="material-icons">chevron_right</i></a>
														<br>
														<a class="btn-floating btn-small waves-effect waves-light" id="search_leftSelected"><i class="material-icons">chevron_left</i></a>
														<br>
														<a class="btn-floating btn-small waves-effect waves-light" id="search_leftAll"><i class="material-icons">first_page</i></a>                                             
													</div>
													<div class=" col s3 l5 center-align">    
														<h6 class="blue-text"><strong>Asignados</strong></h6>
														<select name="to[]" id="search_to" class="browser-default select-height" multiple="multiple">
														</select>                                                
													</div>  
                                                </div>																		
                                            </div>  											
                                        </div>
                                        <div class="panel-footer">
                                            <div class="right-align">
                                                <button type="button" id="mesaseguimiento_save" class="btn-flat waves-effect">
                                                    GUARDAR
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m4">
                                    <div class="helper">&nbsp;</div>
                                </div>
                            </div>
                        <?= form_close() ?>																								
					</div>
				</section>
            </div>
        </main>		