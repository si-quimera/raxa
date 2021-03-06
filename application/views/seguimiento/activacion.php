        <!-- ####### -->
        <!-- Content -->
        <!-- ####### -->
        <main>
            <style type="text/css">
                .select-reset {
                    background-color: rgba(255, 255, 255, 0.9);
                    width: inherit !important;
                    padding: inherit !important;
                    border: inherit !important;
                    border-radius: inherit !important;
                    height:inherit !important;
                }


                .input-reset{
                    background-color: inherit !important;
                    outline: inherit !important;
                    height: inherit !important;
                    width: inherit !important;
                    font-size: inherit !important;
                    margin: inherit !important;
                    padding: inherit !important;


                }

                .jtable-main-container{
                    font-size: 13px !important;
                }

                .jtable-main-container > table.jtable > thead th {
                    font-size: 12px !important;
                }
            </style>
            <div class="main-content">
                <!-- ###### -->
                <!-- Header -->
                <!-- ###### -->
                <div class="row">
                    <div class="col s12">
                        <div class="page-header">
                            <h1>
                                <i class="material-icons">map</i> ACTIVACIÓN SIM
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
                                //Inicio validacion para que se muestre solo a los que pertenescan al grupo CDMX1
                                $usuario = $this->session->userdata('usuario');
                                $id_colaborador = $usuario["Id_Colaborador"];
                                $this->load->model('RestAPIModel');
                                $bandera = false;
                                $datos_colaborador = $this->RestAPIModel->GetColaboradorId($id_colaborador);
                                foreach ($datos_colaborador->result() as $key) {
                                    if ($key->Id_Grupo == 1) {
                                        $bandera = true;
                                        break;
                                    }
                                }
                                $perfil_ahora = strtolower($usuario['perfil']->Descripcion);
                                if($bandera || ($perfil_ahora == 'administrador') ){
                            ?>
                            <div class="row">
                                <div class="input-field col s3">
                                    <input type="text" name="buscar" id="buscar" />
                                    <label for="CP">Buscar</label>
                                </div>
                                <div class="input-field col s3">
                                    <select id="en" name="en" >
                                        <option selected="selected" value="">Seleccionar opción</option>
                                        <option value="Num_Cliente"># Cliente</option>
                                        <option value="Fecha_Registro_Porta">Fecha Registro</option>
                                        <option value="Nom_Persona_Porta">Nombre Porta</option>
                                        <option value="NIP_Portar">NIP Porta</option>
                                        <option value="ICCDID">ICCDID</option>
                                    </select>
                                    <label for="CP">Buscar</label>
                                </div>
                                <div class="input-field col s6">
                                    <button type="submit" class="btn waves-effect" id="LoadRecordsButton">Buscar ...</button>
                                </div>
                            </div>

                            <div id="PortaTableContainer" style="width: 100%"></div>
                            <?php
                                }
                            ?>
					</div>
				</section>

