<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 offset-md-2">
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                        	<strong class="card-title"><?php echo $title; ?></strong><br><br>
                        </div>
	                    <div class="card-body">
	                        <div class="table-responsive table--no-card m-b-40">
								<table class="table table-borderless table-striped table-earning">
									<thead>
										<tr>
											<th>Date</th>
											<th>Account Title</th>
											<th>Debit</th>
											<th>Credit</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?php echo $debits['date']; ?></td>
											<td><?php echo $debits['acct_name']; ?></td>
											<td class="text-right"><?php echo $debits['amount']; ?></td>
											<td></td>
										</tr>
											<tr>
											<td><?php echo $credits['date']; ?></td>
											<td><?php echo $credits['acct_name']; ?></td>
											<td></td>
											<td class="text-right"><?php echo $credits['amount']; ?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<form action="<?php echo base_url() . 'index.php/chart_of_accounts/add_acctitle'; ?>" method="post">
							</form>
	                    </div>
	                </div>
                </div>
            </div>
		</div>
	</div>
</div>