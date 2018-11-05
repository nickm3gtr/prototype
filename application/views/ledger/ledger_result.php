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
											<th>Debit Date</th>
											<th>Debit</th>
											<th>Credit date</th>
											<th>Credit</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<?php foreach($debits as $debit) : ?>
											<td><?php echo $debit['date'];?></td>
										<?php endforeach; ?>
										</tr>
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
