<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row form-group">
				<div class="col-md-9 offset-md-2">
                    <div class="card border border-secondary">
                    	<div class="card-header">
                    		<strong class="card-title"><?php echo $clients['name'] . "'s " . $title; ?></strong><br><br>
                    		<form class="form-inline" action="<?php echo base_url('index.php/transactions/filter_transactions/' . $clients['customerID']); ?>" method="post">
								<div class="form-group">
			                        <div class="col col-md-4">
			                            <select name="months" id="select" class="form-control">
			                                <option value="Month">--Month--</option>
			                            	<?php $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
			                            	 ?>
			                            	 <?php for($i=0; $i<12; $i++) : ?>
			                            	 	<option value="<?php echo $i+1; ?>"><?php echo $months[$i];  ?></option>
			                            	 <?php endfor; ?>
			                            </select>
			                        </div>    
			                    </div>
			                    <div class="form-group">
			                    	<div class="col col-md-2">
			                    		<input type="text" name="year" class="form-control" placeholder="Input year">
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