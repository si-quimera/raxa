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
				                <i class="material-icons">folder_special</i> EDITAR MAESTRO
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
                            <a class="btn-floating btn-large tooltipped" data-tooltip="Regresar" data-position="top" data-delay="50" href="<?= base_url().'Catalogos/maestro' ?>">
                                <i class="large material-icons">undo</i>
                            </a>
                            <button class="btn-floating btn-large white tooltipped scrollToTop" data-tooltip="Scroll to top" data-position="top" data-delay="50">
                                <i class="large material-icons">keyboard_arrow_up</i>
                            </button>
                        </div>			
                        <?php
                        $hidden = array('Id_Cat_Prim' => $edicion->Id_Cat_Prim);
                        echo form_open('Catalogos/editMaestro/'.$edicion->Id_Cat_Prim, '', $hidden); 
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
                                                    <select name="Id_Cat_Sec" id="Id_Cat_Sec" class="browser-default select2-container">
                                                        <option value="" disabled selected>Elija su opción</option>
														<option value="1">/ [Raiz]</option>
                                                    <?php													
                                                        foreach ($master as $key => $row) {    
															$raiz_nombre = $row;
															if($key == $edicion->Id_Cat_Sec){
													?>
															<option value="<?= $key ?>" selected="selected"><?= $row ?></option>
													<?php	
															}else{
													?>
															<option value="<?= $key ?>"><?= $row ?></option>			
													<?php			
															}
															$nivel1 = $this->CatalogoModel->getMaestros($key);
															foreach ($nivel1->result() as $row1) {
																$row1_nombre = $row1->Nombre;	
																if($row1->Id_Cat_Prim == $edicion->Id_Cat_Sec){
													?>
																<option value="<?= $row1->Id_Cat_Prim ?>" selected="selected"><?= $raiz_nombre ?> &raquo;&raquo; <?= $row1_nombre ?></option>																																
													<?php			
																}else{
													?>				
																<option value="<?= $row1->Id_Cat_Prim ?>"><?= $raiz_nombre ?> &raquo;&raquo; <?= $row1_nombre ?></option>																																		
													<?php																
																}
																$nivel2 = $this->CatalogoModel->getMaestros($row1->Id_Cat_Prim);
																foreach ($nivel2->result() as $row2) {
																	$row2_nombre = $row2->Nombre;	
																	if($row2->Id_Cat_Prim == $edicion->Id_Cat_Sec){																	
													?>			
																	<option value="<?= $row2->Id_Cat_Prim ?>" selected="selected"><?= $raiz_nombre ?> &raquo;&raquo; <?= $row1_nombre ?> &raquo;&raquo; <?= $row2_nombre ?></option>
													<?php
																	}else{
													?>					
																	<option value="<?= $row2->Id_Cat_Prim ?>"><?= $raiz_nombre ?> &raquo;&raquo; <?= $row1_nombre ?> &raquo;&raquo; <?= $row2_nombre ?></option>
													<?php					
																	}
																	$nivel3 = $this->CatalogoModel->getMaestros($row2->Id_Cat_Prim);
																	foreach ($nivel3->result() as $row3) {
																		$row3_nombre = $row3->Nombre;		
																		if($row3->Id_Cat_Prim == $edicion->Id_Cat_Sec){
													?>
																		<option value="<?= $row3->Id_Cat_Prim ?>" selected="selected"><?= $raiz_nombre ?> &raquo;&raquo; <?= $row1_nombre ?> &raquo;&raquo; <?= $row2_nombre ?> &raquo;&raquo; <?= $row3_nombre ?></option>
													<?php																																					
																		}else{
													?>
																		<option value="<?= $row3->Id_Cat_Prim ?>"><?= $raiz_nombre ?> &raquo;&raquo; <?= $row1_nombre ?> &raquo;&raquo; <?= $row2_nombre ?> &raquo;&raquo; <?= $row3_nombre ?></option>
													<?php
																		}
																	}														
																}
															}													
                                                        }                                               
                                                    ?>
                                                    </select>                                 
                                                    <?php echo form_error('Id_Cat_Sec'); ?>
                                                </div>											
                                            </div>  
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="Nombre" id="Nombre" type="text" value="<?= $edicion->Nombre ?>">
                                                    <label for="Nombre">Nombre</label>
													<?php echo form_error('Nombre'); ?>
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