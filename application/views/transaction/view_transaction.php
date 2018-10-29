<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row form-group">
				<div class="col-md-9 offset-md-2">
                    <div class="card border border-secondary">
                    	<div class="card-header">
                    		<strong class="card-title"><?php echo $clients['name'] . "'s " . $title; ?></strong>
                    	</div>
                    	<div class="card-body">
                    		<div class="table-responsive table--no-card m-b-40">
								<table class="table table-borderless table-striped table-earning">
									<thead>
										<tr>
											<th>Transaction</th>
											<th>Date</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($transactions as $transaction): ?>
										<tr>
											<td><?php echo $transaction['transDesc']; ?></td>
											<td><?php echo $transaction['transDate']; ?></td>
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