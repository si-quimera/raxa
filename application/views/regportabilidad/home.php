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
				                <i class="material-icons">folder_special</i> REGISTRO PORTABILIDAD
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
                        <?php
                        echo form_open('Catalagos/newMaestro/'); 
                        ?> 
                            <div class="row">
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
                                                <div class="col s12">
													<label for="Id_Cat_Sec">Id Cat Sec</label>
                                                    <select name="Id_Cat_Sec" id="Id_Cat_Sec" class="browser-default">
                                                        <option value="" disabled selected>Elija su opción</option>
														<option value=""></option>
                                                    <?php
                                                        foreach ($master as $key => $row) {    
													?>
														<option value="<?= $key ?>"><?= $row ?></option>
													<?php	
                                                        }                                               
                                                    ?>
                                                    </select>                                                    
                                                    <?php echo form_error('Id_Cat_Sec'); ?>
                                                </div>											
                                            </div>  
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="Nombre" id="Nombre" type="text" value="">
                                                    <label for="Nombre">Nombre</label>
													<?php echo form_error('Nombre'); ?>
                                                </div>													
                                                <div class="input-field col s6">
                                                    <input name="String1" id="String1" type="text" value="">
                                                    <label for="String1">String 1</label>
													<?php echo form_error('String1'); ?>
                                                </div>											
                                            </div>  
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="String2" id="String2" type="text" value="">
                                                    <label for="String2">String 2</label>
													<?php echo form_error('String2'); ?>
                                                </div>														
                                                <div class="input-field col s6">
                                                    <input name="String3" id="String3" type="text" value="">
                                                    <label for="String3">String 3</label>
													<?php echo form_error('String3'); ?>
                                                </div>												
                                            </div>
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="String4" id="String4" type="text" value="">
                                                    <label for="String4">String 4</label>
													<?php echo form_error('String4'); ?>
                                                </div>													
                                                <div class="input-field col s6">
                                                    <input name="String5" id="String5" type="text" value="">
                                                    <label for="String5">String 5</label>
													<?php echo form_error('String5'); ?>
                                                </div>	
                                                <div class="input-field col s6"></div>												
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