<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-3">Account Titles</h2>
						<br /><br>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<form action="<?php echo base_url('index.php/pages/acctitle_check'); ?>" method="post">
						<div class="form-group">
		                        <div class="col-lg-7">
		                            <select name="category" id="select" class="form-control">
		                                <option value="Categories">All Categories</option>
		                            <?php foreach($categories as $category): ?>
		                            	<option value="<?php echo $category['categoryID']; ?>"><?php echo $category['category_name']; ?></option>
		                            <?php endforeach; ?>
		                            </select>
		                        </div>     
	                    </div>
	                    <div class="form-group">
			                <button class="btn btn-primary" type="submit">filter</button>
			            </div>
                	</form>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-9 offset-md-2">
					<div class="table-responsive table--no-card m-b-40">
						<table class="table table-borderless table-striped table-earning">
							<thead>
								<tr>
									<th>Account Title</th>
									<th>Category</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($account_titles as $account_title): ?>
								<tr>
									<td><?php echo $account_title['acct_name']; ?></td>
									<td><?php echo $account_title['category_name']; ?></td>
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