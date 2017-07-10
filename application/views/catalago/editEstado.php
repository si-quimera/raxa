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
				                <i class="material-icons">place</i> EDITAR ESTADO
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
                            <a class="btn-floating btn-large tooltipped" data-tooltip="Regresar" data-position="top" data-delay="50" href="<?= base_url().'Catalagos/estado' ?>">
                                <i class="large material-icons">undo</i>
                            </a>
                            <button class="btn-floating btn-large white tooltipped scrollToTop" data-tooltip="Scroll to top" data-position="top" data-delay="50">
                                <i class="large material-icons">keyboard_arrow_up</i>
                            </button>
                        </div>			
                        <?php
                        $hidden = array('zona_id' => $edicion->estado_id);
                        echo form_open('catalagos/editEstado/'.$edicion->estado_id, '', $hidden); 
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
                                                    <input name="nombre" id="nombre" type="text" value="<?= $edicion->nombre ?>">
                                                    <label for="nombre">Nombre</label>
													<?php echo form_error('nombre'); ?>
                                                </div>
                                                <div class="input-field col s6">
                                                    <select name="zona_id" id="zona_id">
                                                        <option value="" disabled selected>Elija su opción</option>
                                                    <?php
                                                        foreach ($zona as $key => $row) {    
															if($key == $edicion->zona_id){
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
                                                    <label for="zona_id">Zona</label>
                                                    <?php echo form_error('zona_id'); ?>
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