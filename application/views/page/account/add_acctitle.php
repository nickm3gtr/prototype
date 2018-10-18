<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="card">
				        <div class="card-header">
				            <strong>Add</strong> Account Title
				        </div>
				        <form action="<?php echo base_url() . 'index.php/pages/acctitle_insert'; ?>" method="post">
					        <div class="card-body card-block">
					                <div class="form-group">
					                    	<label class=" form-control-label">Category</label>
				                            <select name="category" id="select" class="form-control">
				                            <?php foreach($categories as $category): ?>
				                            	<option value="<?php echo $category['categoryID']; ?>"><?php echo $category['category_name']; ?></option>
				                            <?php endforeach; ?>
				                            </select>   
					                </div>
					                <div class="form-group">
					                    <label class=" form-control-label">Account Code</label>
					                    <input type="text" id="nf-email" name="account_code" placeholder="Enter account code" class="form-control">
					                </div>
					                <div class="form-group">
					                    <label class=" form-control-label">Account title</label>
					                    <input type="text" id="nf-email" name="account_title" placeholder="Enter new account title" class="form-control">
					                </div>   
					        </div>
					        <div class="card-footer">
					            <button type="submit" class="btn btn-success btn-sm">
					                <i class="fa fa-dot-circle-o"></i> Submit
					            </button>
					        </div>
				        </form>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>