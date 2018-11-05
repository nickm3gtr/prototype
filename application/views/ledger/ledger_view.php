<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row form-group">
				<div class="col-lg-9 offset-md-2">
                    <div class="card">
                    	<div class="card-header">
                    		<strong class="card-title"><?php echo $title; ?></strong>
                    	</div>
                    	<form action="<?php echo base_url('index.php/ledgers/ledger_result/' . $this->session->userdata('customerID')); ?>" method="post">
                    	<div class="card-body">
                    		<div class="typo-headers">
				          		<strong>Please select account title and date</strong>
				          	</div><br>
				          	<div class="row form-group">
	                            <div class="col col-md-3">
	                                <label for="select" class=" form-control-label">Account Title</label>
	                            </div>
	                            <div class="form-group">
		                            <div class="col-12">
		                                <select name="account_titles" id="select" class="form-control">
		                                    <option value="0">Please select</option>
		                                    <?php foreach($account_titles as $account_title): ?>
				                            	<option value="<?php echo $account_title['acct_id']; ?>"><?php echo $account_title['acct_name']; ?></option>
				                            <?php endforeach; ?>
		                                </select>
		                            </div>
	                        	</div>
	                        </div>
	                        <div class="row form-group">
	                        	<div class="col col-md-3">
	                        		<label for="select" class=" form-control-label">Year</label>
	                        	</div>
	                        	<div class="form-group">
			                    	<div class="col-12">
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
	                        </div>
	                        <div class="row form-group">
	                        	<div class="col col-md-3">
	                        		<label for="select" class=" form-control-label">Month</label>
	                        	</div>
	                        	<div class="form-group">
			                        <div class="col-12">
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
	                        </div>
                    	</div>
                    	<div class="card-footer">
			                <div class="row form-group">
			                     <div class="col col-md-3 offset-md-5">
			                         <button type="submit" class="btn btn-success">
			                            <i class="fa fa-check"></i> Submit
			                         </button>
			                     </div>   
		                    </div>
			            </div>
			        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>