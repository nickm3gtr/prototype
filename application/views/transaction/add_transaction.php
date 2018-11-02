<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 offset-lg-2">
                    <div class="card">
                        <form action="<?php echo base_url('index.php/transactions/insert_transaction/' . $this->session->userdata('customerID')); ?>" method="post">
                        <div class="card-header">
                            <h4><?php echo $title; ?></h4>
                        </div>
                        <div class="card-body">
                        	<?php
                        		$customerID = array('customerID' => $this->session->userdata('customerID'));
  
                        		echo form_hidden($customerID);

                        	?>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                  <label for="date" class="form-control-label">Date</label>
                                </div>
                                <div class="col-12 col-md-9">
                                	<input type="text" id="text-input" name="date" placeholder="yy-mm-dd" class="form-control">
                                	<span class="text-danger"><?php echo form_error('date'); ?></span>
                                </div>
                            </div>
                            <div class="row form-group">
                            	<div class="col col-md-3">
                            		<label for="transdesc" class="form-control-label">Description</label>
                            	</div>
                            	<div class="col-12 col-md-9">
                            		<textarea name="transdesc" id="textarea-input" rows="5" placeholder="Description..." class="form-control"></textarea>
                            		<span class="text-danger"><?php echo form_error('transdesc'); ?></span>
                            	</div>
                            </div>
                            <div class="row form-group">
                            	<div class="col col-md-3">
                            		<label for="amount" class="form-control-label">Amount</label>
                            	</div>
                            	<div class="col-12 col-md-9">
                            		<input type="text" id="text-input" name="amount" placeholder="Enter amount" class="form-control">
                            		<span class="text-danger"><?php echo form_error('amount'); ?></span>
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
