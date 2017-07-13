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
				                <i class="material-icons">card_membership</i> EDITAR ALMACEN
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
                            <a class="btn-floating btn-large tooltipped" data-tooltip="Regresar" data-position="top" data-delay="50" href="<?= base_url().'Catalagos/almacen' ?>">
                                <i class="large material-icons">undo</i>
                            </a>
                            <button class="btn-floating btn-large white tooltipped scrollToTop" data-tooltip="Scroll to top" data-position="top" data-delay="50">
                                <i class="large material-icons">keyboard_arrow_up</i>
                            </button>
                        </div>			
                        <?php
                        $hidden = array('Id_Almacen' => $edicion->Id_Almacen);
                        echo form_open('catalagos/editAlmacen/'.$edicion->Id_Almacen, '', $hidden); 
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
                                                    <select name="Id_Sucursal" id="Id_Sucursal">
                                                        <option value="" disabled selected>Elija su opción</option>
                                                    <?php
                                                        foreach ($sucursal as $key => $row) {    
															if($key == $edicion->Id_Sucursal){
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
                                                    <label for="Id_Sucursal">Sucursal</label>
                                                    <?php echo form_error('Id_Sucursal'); ?>
                                                </div>												
                                            </div>  
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="Direccion" id="Direccion" type="text" value="<?= $edicion->Direccion ?>">
                                                    <label for="Direccion">Dirección</label>
													<?php echo form_error('Direccion'); ?>
                                                </div>	
                                                <div class="input-field col s6">
                                                    <input name="Colonia" id="Colonia" type="text" value="<?= $edicion->Colonia ?>">
                                                    <label for="Colonia">Colonia</label>
													<?php echo form_error('Colonia'); ?>
                                                </div>												
                                            </div>  
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="CP" id="CP" type="text" value="<?= $edicion->CP ?>">
                                                    <label for="CP">CP</label>
													<?php echo form_error('CP'); ?>
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