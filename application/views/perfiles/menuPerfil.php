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
				                <i class="material-icons">playlist_add_check</i> ASIGNAR MENU <i class="material-icons blue-text">trending_flat</i> PERFIL
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
							<a class="btn-floating btn-large tooltipped" data-tooltip="Nuevo Menu > Perfil" data-position="top" data-delay="50" href="<?= base_url() ?>Perfiles/NewMenuPerfil">
								<i class="large material-icons">add</i>
							</a>
							<a class="btn-floating btn-large tooltipped" data-tooltip="Catalago Perfiles" data-position="top" data-delay="50" href="<?= base_url() ?>Perfiles/">
								<i class="material-icons large">account_circle</i>
							</a>								
							<a class="btn-floating btn-large tooltipped" data-tooltip="Asignar Colaborador->Pefil" data-position="top" data-delay="50" href="<?= base_url() ?>Perfiles/ColaboradorPerfil">
								<i class="material-icons large">transfer_within_a_station</i>
							</a>																				
							<button class="btn-floating btn-large white tooltipped scrollToTop" data-tooltip="Scroll to top" data-position="top" data-delay="50">
								<i class="large material-icons">keyboard_arrow_up</i>
							</button>
                        </div>			
                        <?php
                        echo form_open('', 'id="frmPerfiles"');  
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
													<label for="Id_Perfil">Perfil</label>  
                                                    <select name="Id_Perfil" id="Id_Perfil" class="browser-default select2-container">
                                                        <option value="" selected>Elija su opción</option>
                                                    <?php
                                                        foreach ($perfiles as $key => $row) {    
															if($key == $this->input->post('Id_Perfil')){
													?>
														<option value="<?= $key ?>" selected="selected"><?= $row ?></option>
													<?php	
															}else{
													?>														
														<option value="<?= $key ?>"><?= $row ?></option>														
													<?php	
															}
                                                        }                                               
                                                    ?>
                                                    </select>                                                    
													<?php echo form_error('Id_Perfil'); ?>
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
                                                <button type="button" id="perfil_save" class="btn-flat waves-effect">
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