        <!-- ####### -->
        <!-- Content -->
        <!-- ####### -->
        <main>
            <style>
                .select-reset {
                    background-color: rgba(255, 255, 255, 0.9);
                    width: inherit;
                    padding: inherit;
                    border: inherit;
                    border-radius: inherit;
                    height:inherit;
                }


                .input-reset{
                    background-color: inherit !important;;
                    border: none !important;;
                    outline: inherit !important;;
                    height: inherit !important;
                    width: inherit !important;;
                    font-size: inherit !important;;
                    margin: inherit !important;;
                    padding: inherit !important;;


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
						<div class="row">

                            <div class="filtering">
                                <form>
                                    Name: <input type="text" name="name" id="name" class="input-reset " />
                                    City:
                                    <select id="cityId" name="cityId" class="browser-default">
                                        <option selected="selected" value="0">All cities</option>
                                        <option value="1">Adana</option>
                                        <option value="2">Ankara</option>
                                        <option value="3">Athens</option>
                                        <option value="4">Beijing</option>
                                        <option value="5">Berlin</option>
                                        <option value="6">Bursa</option>
                                        <option value="7">İstanbul</option>
                                        <option value="8">London</option>
                                        <option value="9">Madrid</option>
                                        <option value="10">Mekke</option>
                                        <option value="11">New York</option>
                                        <option value="12">Paris</option>
                                        <option value="13">Samsun</option>
                                        <option value="14">Trabzon</option>
                                        <option value="15">Volos</option>
                                    </select>
                                    <button type="submit" id="LoadRecordsButton">Load records</button>
                                </form>
                            </div>

                            <div id="PeopleTableContainer" style="width: 100%"></div>
						</div>
					</div>
				</section>

