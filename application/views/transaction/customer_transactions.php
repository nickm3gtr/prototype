<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row form-group">
				<div class="col-lg-9 offset-md-2">
                    <div class="card">
                    	<div class="card-header">
                    		<strong class="card-title"><?php echo $title; ?></strong><br><br>
                    		<form class="form-inline" action="<?php echo base_url('index.php/transactions/customer_filter_transactions/' . $customerID); ?>" method="post">
								<div class="form-group">
			                        <div class="col col-md-4">
			                        	<?php $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

			                        		$month = date('m');
			                        		$current_month = date('m', strtotime('-1 month'));
		                            	 ?>
			                            <select name="months" id="select" class="form-control">
			                                <option value="<?php echo $month; ?>"><?php echo $months[$current_month]; ?></option>
			                            	 <?php for($i=0; $i<12 && $i!=$current_month; $i++) : ?>
			                            	 	<option value="<?php echo $i+1; ?>"><?php echo $months[$i];  ?></option>
			                            	 <?php endfor; ?>
			                            </select>
			                        </div>    
			                    </div>
			                    <div class="form-group">
			                    	<div class="col col-md-4">
			                    		<?php
			                    			$current_year = date('Y');
			                    			$year = date('Y', strtotime('-1 year'));
			                    		?>
			                    		<select name="year" id="select" class="form-control">
			                    			<option value="<?php echo $current_year; ?>" class="value"><?php echo $current_year; ?></option>
			                    			<?php for($y=$year; $y>2005; $y--) : ?>
			                    				<option value="<?php echo $y; ?>"><?php echo $y; ?></option>
			                    			<?php endfor; ?>
			                    		</select>
			                    	</div>
			                    </div>
			                    <div class="btn-group">
					                <button class="btn btn-primary" type="submit">Filter</button>
					            </div>
					            <span class="text-danger"><?php echo form_error('year'); ?></span>
                			</form>
                    	</div>
                    	<div class="card-body">
                    		<div class="table-responsive table--no-card m-b-40">
								<table class="table table-borderless table-striped table-earning">
									<thead>
										<tr>
											<th>Date</th>
											<th>Description</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($transactions as $transaction): ?>
										<tr>
											<td><?php echo $transaction['transDate']; ?></td>
											<td><?php echo $transaction['transDesc']; ?></td>
											<?php
												if($transaction['trans_status'] == 'not journalized') :
											 ?>
											<td class="text-danger"><?php echo 'not journalized'; ?></td>
											<?php endif; ?>
											<?php
												if($transaction['trans_status'] == 'journalized') :
											 ?>
											<td class="text-success"><?php echo $transaction['trans_status']; ?></td>
											<?php endif; ?>
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