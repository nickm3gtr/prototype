<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row form-group">
				<div class="col-md-9 offset-md-2">
                    <div class="card">
                    	<div class="card-header">
                    		<strong class="card-title"><?php echo $title; ?></strong>
                    	</div>
                    	<div class="card-body">
                    		<div class="table-responsive table--no-card m-b-40">
								<table class="table table-borderless table-striped table-earning">
									<thead>
										<tr>
											<th>Name</th>
											<th>Email</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($clients as $client): ?>
										<tr>
											<td><a href="<?php echo site_url('clients/client_profile/' . $client['customerID']); ?>"><?php echo $client['name']; ?></a></td>
											<td><?php echo $client['cust_email']; ?></td>
										</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
							</div>
				                    	</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>