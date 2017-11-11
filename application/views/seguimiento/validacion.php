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
                                <i class="material-icons">map</i> VALIDACIÓN DE CALIDAD
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
                                <div class="input-field col s3">
                                    <button type="submit" class="btn waves-effect" id="LoadRecordsVenButton">Buscar ...</button>
                                </div>
                                <div class="input-field col s3 right-align ">
                                    <a href="<?= base_url() ?>Seguimiento/Cuarentena/" class="waves-effect btn yellow accent-4"><i class="material-icons left">lock</i>Cuarentena</a>
                                </div>

                            </div>

                            <div id="PortaValTableContainer" style="width: 100%"></div>
					</div>
				</section>

