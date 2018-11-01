<div class="main-content">
	<div class="section__content section__content--p30">
	  <div class="container-fluid">
	    <div class="row">
	      <div class="col-lg-9 offset-lg-2">
	        <div class="card">
	        <form action="<?php echo base_url('index.php/transactions/journal_added'); ?>" method="post">
	          <div class="card-header">
	            <h4><?php echo $title; ?></h4>
	          </div>
	          <div class="card-body">
	          	<div class="typo-headers">
	          		<strong>Transaction Details</strong>
	          	</div>
	          	<div class="typo-articles">
	          		<p><?php echo "Date: " . $transactions['transDate']; ?></p>
	          		<p><?php echo "Transaction: " . $transactions['transDesc']; ?></p>
	          		<p><?php echo "Amount: Php " . $transactions['transAmount']; ?></p>
	          		<br>
                        <strong class="text-center">Input Debit</strong>
                        <?php
                        	$debit_data = array(
									        'debit_transID'  => $transactions['transID'],
									        'debit_userID' => $this->session->userdata('user_id'),
									        'debit_date'   => $transactions['transDate']
									);
                        	echo form_hidden($debit_data);
                        ?>
	                    <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Account Title</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="debit_account_titles" id="select" class="form-control">
                                    <option value="0">Please select</option>
                                    <?php foreach($account_titles as $account_title): ?>
		                            	<option value="<?php echo $account_title['acct_id']; ?>"><?php echo $account_title['acct_name']; ?></option>
		                            <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="debit_amount" class=" form-control-label">Amount</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="debit_amount" placeholder="Enter amount" class="form-control">
                            </div>
                        </div>
                        <br>
                        <strong class="text-center">Input Credit</strong>
                       	<?php
                        	$credit_data = array(
									        'credit_transID'  => $transactions['transID'],
									        'credit_userID' => $this->session->userdata('user_id'),
									        'credit_date'   => $transactions['transDate']
									);
                        	echo form_hidden($credit_data);
                        ?>
	                    <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Account Title</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="credit_account_titles" id="select" class="form-control">
                                    <option value="0">Please select</option>
                                    <?php foreach($account_titles as $account_title): ?>
		                            	<option value="<?php echo $account_title['acct_id']; ?>"><?php echo $account_title['acct_name']; ?></option>
		                            <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="credit_amount" class=" form-control-label">Amount</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="credit_amount" placeholder="Enter amount" class="form-control">
                            </div>
                        </div>
                        <div class="span12 text-center">
                        	<span class="text-danger text-align: center"><?php echo $this->session->flashdata('unbalanced'); ?></span>
			          	</div>
	          		</div>
	          	</div>
	          	<div class="card-footer">
	                <button type="submit" class="btn btn-success">
	                    <i class="fa fa-check"></i> Submit
	                </button>
	            </div>
	        </form>
	      	</div>
		  </div>
	  </div>
	</div>
	</div>
</div>
