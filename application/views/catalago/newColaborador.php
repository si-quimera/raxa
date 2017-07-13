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
				                <i class="material-icons">account_box</i> AGREGAR COLABORADOR
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
                            <a class="btn-floating btn-large tooltipped" data-tooltip="Regresar" data-position="top" data-delay="50" href="<?= base_url().'Catalagos/colaborador' ?>">
                                <i class="large material-icons">undo</i>
                            </a>
                            <button class="btn-floating btn-large white tooltipped scrollToTop" data-tooltip="Scroll to top" data-position="top" data-delay="50">
                                <i class="large material-icons">keyboard_arrow_up</i>
                            </button>
                        </div>			
                        <?php
                        echo form_open('Catalagos/newColaborador/'); 
                        ?> 
                            <div class="row">
                                <div class="col s12 m8">
                                    <?php
                                    $msg = $this->session->flashdata('msg');
                                    if ($msg){
                                        echo $msg;
                                    }									
                                    ?>                        
									
									
									
                                    <div class="panel panel-bordered">				
                                        <div class="panel-body">                                           
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="Nombre" id="Nombre" type="text" value="">
                                                    <label for="Nombre">Nombre</label>
													<?php echo form_error('Nombre'); ?>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input name="Ap_Pat" id="Ap_Pat" type="text" value="">
                                                    <label for="Ap_Pat">Ap Paterno</label>
													<?php echo form_error('Ap_Pat'); ?>
                                                </div>	          												
                                            </div>  
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="Ap_Mat" id="Ap_Mat" type="text" value="">
                                                    <label for="Ap_Mat">Ap Materno</label>
													<?php echo form_error('Ap_Mat'); ?>
                                                </div>	
                                                <div class="input-field col s6">
													<label for="Fec_Nac">Fecha Nacimiento</label>
                                                    <input name="Fec_Nac" type="text" class="datepicker" id="Fec_Nac" value="">                                                    
													<?php echo form_error('Fec_Nac'); ?>																																						
                                                </div>												
                                            </div>  
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="Calle" id="Calle" type="text" value="">
                                                    <label for="Calle">Calle</label>
													<?php echo form_error('Calle'); ?>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input name="Colonia" id="Colonia" type="text" value="">
                                                    <label for="Colonia">Colonia</label>
													<?php echo form_error('Colonia'); ?>
                                                </div>	          												
                                            </div>  											
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="Municipio" id="Municipio" type="text" value="">
                                                    <label for="Municipio">Municipio</label>
													<?php echo form_error('Municipio'); ?>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input name="CP" id="CP" type="text" value="">
                                                    <label for="CP">CP</label>
													<?php echo form_error('CP'); ?>
                                                </div>	          												
                                            </div> 
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="Estado" id="Estado" type="text" value="">
                                                    <label for="Estado">Estado</label>
													<?php echo form_error('Estado'); ?>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input name="Pais" id="Pais" type="text" value="">
                                                    <label for="Pais">Pais</label>
													<?php echo form_error('Pais'); ?>
                                                </div>	          												
                                            </div> 
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="Tel" id="Tel" type="text" value="">
                                                    <label for="Tel">Tel</label>
													<?php echo form_error('Tel'); ?>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input name="Cel" id="Cel" type="text" value="">
                                                    <label for="Cel">Cel</label>
													<?php echo form_error('Cel'); ?>
                                                </div>	          												
                                            </div> 	
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="email" id="email" type="text" value="">
                                                    <label for="email">Email</label>
													<?php echo form_error('email'); ?>
                                                </div>	
												<div class="input-field col s6">
                                                    <select name="Id_Grupo" id="Id_Grupo">
                                                        <option value="" disabled selected>Elija su opción</option>
                                                    <?php
                                                        foreach ($grupo as $key => $row) {    
													?>
														<option value="<?= $key ?>"><?= $row ?></option>
													<?php	
                                                        }                                               
                                                    ?>
                                                    </select>
                                                    <label for="Id_Grupo">Grupo</label>
                                                    <?php echo form_error('Id_Grupo'); ?>
                                                </div>											
                                            </div> 
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="User" id="User" type="text" value="">
                                                    <label for="User">Usuario</label>
													<?php echo form_error('User'); ?>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input name="Password" id="Password" type="password" value="">
                                                    <label for="Password">Password</label>
													<?php echo form_error('Password'); ?>
                                                </div>	          												
                                            </div> 												
                                        </div>
                                        <div class="panel-footer">
                                            <div class="right-align">
                                                <button type="reset" class="btn-flat waves-effect">
                                                    BORRAR
                                                </button>
                                                <button type="submit" class="btn-flat waves-effect">
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