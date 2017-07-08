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
				                <i class="material-icons">map</i> EDITAR ZONA
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
                            <a class="btn-floating btn-large tooltipped" data-tooltip="Regresar" data-position="top" data-delay="50" href="<?= base_url().'noticia' ?>">
                                <i class="large material-icons">undo</i>
                            </a>
                            <button class="btn-floating btn-large white tooltipped scrollToTop" data-tooltip="Scroll to top" data-position="top" data-delay="50">
                                <i class="large material-icons">keyboard_arrow_up</i>
                            </button>
                        </div>			
                        <?php
                        $hidden = array('noticias_id' => $edicion->noticias_id);
                        echo form_open_multipart('noticia/edit/'.$edicion->noticias_id, '', $hidden); 
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
                                                <div class="input-field col s10">
                                                    <div class="file-field input-field">
                                                        <div class="btn">
                                                            <span>Noticia</span>
                                                            <input type="file" name="userfile[]" multiple>
                                                        </div>
                                                        <div class="file-path-wrapper">
                                                            <input class="file-path validate" type="text">
                                                             <small>Noticia: 1900 ancho x 1267 alto en pixeles / Miniatura: 900 ancho x 675 alto en pixeles</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-field col s2">
                                                </div>                                              
                                            </div>                                              
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <input name="titulo" id="titulo" type="text" value="<?= $edicion->titulo ?>">
                                                    <label for="titulo">Titulo</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input name="intro" id="intro" type="text" value="<?= $edicion->intro ?>">
                                                    <label for="intro">Intro</label>
                                                </div>
                                            </div>                                                                                                                                                                                
                                            <div class="row no-gutter">
                                                <div class="input-field col s6">
                                                    <select name="status" id="status">
                                                        <option value="1" <?= $this->general->setSelect('1', $edicion->status); ?>>ACTIVADO</option>
                                                        <option value="0" <?= $this->general->setSelect('0', $edicion->status); ?>>DESACTIVADO</option>
                                                    </select>
                                                    <label>Status</label>                   
                                                </div>
                                                <div class="input-field col s6">                 
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