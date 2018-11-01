<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row form-group">
				<div class="col-md-9 offset-md-2">
                    <div class="card">
                    	<div class="card-header">
                    		<strong class="card-title"><?php echo $clients['name'] . "'s " . $title; ?></strong><br><br>
                    		<form class="form-inline" action="<?php echo base_url('index.php/transactions/filter_transactions/' . $clients['customerID']); ?>" method="post">
								<div class="form-group">
			                        <div class="col col-md-4">
			                            <select name="months" id="select" class="form-control">
			                            	<?php $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

			                            			$month = date('m');
			                            			$current_month = date('m', strtotime('-1 month')); 
			                            	 ?>
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
                			</form>
                    	</div>
                    	<div class="card-body">
                    		<p>No result</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>