        <!-- ####### -->
        <!-- Content -->
        <!-- ####### -->
        <main>
            <div class="main-content no-gutter">
                <!-- #### -->
                <!-- Body -->
                <!-- #### -->
				<section id="dashboard">
					<!-- ########### -->
					<!-- Stats panel -->
					<!-- ########### -->
					<div class="row">
						<div class="col s12 m4">
							<div id="boxSalesPerDay" class="panel panel-stats main lighten-1 white-text z-depth-1">
								<div class="panel-header">
									<div class="title">
										Sales
									</div>
									<div class="subtitle">
										<i class="material-icons">schedule</i> Latest 01 Jan, 08:00
									</div>
								</div>

								<div class="panel-body">
									<div id="chartSalesperDay" class="chart-wrapper"></div>
								</div>

								<div class="panel-footer valign-wrapper">
									<div class="col s6 valign center-align bordered">
										<div class="value">1422</div>
										<div class="description">Monthly total</div>
									</div>

									<div class="col s6 valign center-align">
										<div class="value">67</div>
										<div class="description">Today total</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col s12 m4">
							<div id="boxCustomersPerDay" class="panel panel-stats alternative lighten-1 white-text z-depth-1">
								<div class="panel-header">
									<div class="title">
										Customers
									</div>
									<div class="subtitle">
										<i class="material-icons">schedule</i> Latest 01 Jan, 08:00
									</div>
								</div>

								<div class="panel-body">
									<div id="chartCustomersPerDay" class="chart-wrapper"></div>		
								</div>

								<div class="panel-footer valign-wrapper">
									<div class="col s6 valign center-align bordered">
										<div class="value">1356</div>
										<div class="description">Monthly total</div>
									</div>

									<div class="col s6 valign center-align">
										<div class="value">57</div>
										<div class="description">Today total</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col s12 m4">
							<div id="boxNewsletterSignups" class="panel panel-stats blue-grey lighten-1 white-text z-depth-1">
								<div class="panel-header">
									<div class="title">
										Revenue
									</div>
									<div class="subtitle">
										<i class="material-icons">schedule</i> Latest 01 Jan, 08:00
									</div>
								</div>

								<div class="panel-body">
									<div id="chartNewsletterSignups" class="chart-wrapper"></div>
								</div>

								<div class="panel-footer valign-wrapper">
									<div class="col s6 valign center-align bordered">
										<div class="value">1232.23</div>
										<div class="description">Monthly total</div>
									</div>

									<div class="col s6 valign center-align">
										<div class="value">42.65</div>
										<div class="description">Today total</div>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="row">
						<!-- ########### -->
						<!-- Total sales -->
						<!-- ########### -->
						<div class="col s12 m6">
							<div id="boxTotalSales" class="panel panel-bordered panel-dashboard panel-bar-chart z-depth-1">
								<div class="panel-header">
									<div class="title">
										Total sales
									</div>
									<div class="subtitle">
										Last 10 days
									</div>
								</div>

								<div class="panel-body">
									<div id="chartTotalSales" class="chart-wrapper"></div>
								</div>
							</div>
						</div>


						<!-- ############# -->
						<!-- Recent Orders -->
						<!-- ############# -->
						<div class="col s12 m6">
							<div id="boxRecentOrders" class="panel panel-bordered panel-dashboard panel-table z-depth-1">
								<div class="panel-header">
									<div class="title">
										Recent Orders
									</div>
									<div class="subtitle">
										Overview of the last orders 
									</div>

									<div class="actions">
										<a class="dropdown-button btn-flat waves-effect" href="#" data-activates="recentOrdersActions">
									    	<i class="large material-icons">more_vert</i>
									    </a>
										<ul id="recentOrdersActions" class="dropdown-content main-dropdown lighten-2">
											<li><a href="#!">one</a></li>
											<li><a href="#!">two</a></li>
											<li class="divider"></li>
											<li><a href="#!">three</a></li>
										</ul>
									</div>
								</div>

								<div class="panel-body">
									<table class="table highlight">
										<thead>
											<tr>
												<th class="center-align">
													<input type="checkbox" id="checkAllOrders" class="checkToggle" 
														data-target="#boxRecentOrders table tbody [type=checkbox]">
													<label for="checkAllOrders"></label>
												</th>
												<th>Name</th>
												<th class="hide-on-small-only">Item Name</th>
												<th>Price</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="center-align">
													<input type="checkbox" name="chandler" id="chandler">
													<label for="chandler"></label>
												</td>
												<td>Chandler</td>
												<td class="hide-on-small-only">Peanuts</td>
												<td>$3.76</td>
											</tr>
											<tr>
												<td class="center-align">
													<input type="checkbox" name="joey" id="joey">
													<label for="joey"></label>
												</td>
												<td>Joey</td>
												<td class="hide-on-small-only">Beans</td>
												<td>$0.97</td>
											</tr>
											<tr>
												<td class="center-align">
													<input type="checkbox" name="ross" id="ross">
													<label for="ross"></label>
												</td>
												<td>Ross</td>
												<td class="hide-on-small-only">Rice</td>
												<td>$2.13</td>
											</tr>
											<tr>
												<td class="center-align">
													<input type="checkbox" name="rachel" id="rachel">
													<label for="rachel"></label>
												</td>
												<td>Rachel</td>
												<td class="hide-on-small-only">Butter</td>
												<td>$1.54</td>
											</tr>
											<tr>
												<td class="center-align">
													<input type="checkbox" name="monica" id="monica">
													<label for="monica"></label>
												</td>
												<td>Monica</td>
												<td class="hide-on-small-only">Chicken</td>
												<td>$7.00</td>
											</tr>
											<tr>
												<td class="center-align">
													<input type="checkbox" name="phoebe" id="phoebe">
													<label for="phoebe"></label>
												</td>
												<td>Phoebe</td>
												<td class="hide-on-small-only">Pie</td>
												<td>$3.27</td>
											</tr>
											<tr>
												<td class="center-align">
													<input type="checkbox" name="janice" id="janice">
													<label for="janice"></label>
												</td>
												<td>Janice</td>
												<td class="hide-on-small-only">Cornflakes</td>
												<td>$0.87</td>
											</tr>
											<tr>
												<td class="center-align">
													<input type="checkbox" name="richard" id="richard">
													<label for="richard"></label>
												</td>
												<td>Richard</td>
												<td class="hide-on-small-only">Coke</td>
												<td>$2.21</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				</section>
            </div>
        </main>