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
                                <div class="col s8 m8">
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
													<label for="Fec_Asignacion">Fecha de Operación</label>
                                                    <input type="text" name="Fec_Asignacion" class="datepicker">                                                    
													<?php echo form_error('Fec_Asignacion'); ?>
                                                </div>													
                                                <div class="input-field col s6">
                                                    <input name="String1" id="String1" type="text" value="">
                                                    <label for="String1">Numero de Cliente</label>
													<?php echo form_error('String1'); ?>
                                                </div>											
                                            </div>  
                                            <div class="row no-gutter">
                                                <div class="input-field  col s6">
													<label for="Fec_Asignacion">Nombre del Cliente</label>
                                                    <input type="text" name="Fec_Asignacion">                                                    
													<?php echo form_error('Fec_Asignacion'); ?>
                                                </div>													
                                                <div class="input-field col s6">
                                                    <input name="NIP" id="NIP" type="text" value="">
                                                    <label for="NIP">NIP</label>
													<?php echo form_error('String1'); ?>
                                                </div>											
                                            </div> 
                                            <div class="row no-gutter">
                                                <div class="col s6">
													<label for="Fec_Asignacion">Vigencia NIP</label>
                                                    <input type="text" name="Fec_Asignacion" class="datepicker">                                                    
													<?php echo form_error('Fec_Asignacion'); ?>
                                                </div>													
                                                <div class="col s6">
													<label for="Id_Almacen">Carrier</label>
                                                    <select name="Id_Almacen" id="Id_Almacen" class="browser-default">
                                                        <option value="" selected>Elija su opción</option>
													</select>	
													<?php echo form_error('Id_Almacen'); ?>
                                                </div>											
                                            </div> 	
                                            <div class="row no-gutter">												
                                                <div class="col s6">
													<label for="Id_Almacen">ICCDID</label>
                                                    <select name="Id_Almacen" id="Id_Almacen" class="browser-default">
                                                        <option value="" selected>Elija su opción</option>
													</select>	
													<?php echo form_error('Id_Almacen'); ?>
                                                </div>			
                                                <div class="col s6"></div>													
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
