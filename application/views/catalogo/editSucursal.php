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
				                <i class="material-icons">store</i> EDITAR SUCURSAL
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
                            <a class="btn-floating btn-large tooltipped" data-tooltip="Regresar" data-position="top" data-delay="50" href="<?= base_url().'Catalogos/sucursal' ?>">
                                <i class="large material-icons">undo</i>
                            </a>
                            <button class="btn-floating btn-large white tooltipped scrollToTop" data-tooltip="Scroll to top" data-position="top" data-delay="50">
                                <i class="large material-icons">keyboard_arrow_up</i>
                            </button>
                        </div>			
                        <?php
                        $hidden = array('Id_Sucursal' => $edicion->Id_Sucursal);
                        echo form_open('Catalogos/editSucursal/'.$edicion->Id_Sucursal, '', $hidden); 
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
                                                    <input name="Nombre" id="Nombre" type="text" value="<?= $edicion->Nombre ?>">
                                                    <label for="Nombre">Nombre</label>
													<?php echo form_error('Nombre'); ?>
                                                </div>
                                                <div class="input-field col s6">
                                                    <select name="Id_Ciudad" id="Id_Ciudad">
                                                        <option value="" disabled selected>Elija su opción</option>
                                                    <?php
                                                        foreach ($ciudad as $key => $row) {    
															if($key == $edicion->Id_Ciudad){
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
                                                    <label for="Id_Ciudad">Ciudad</label>
                                                    <?php echo form_error('Id_Ciudad'); ?>
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