<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9 offset-md-2">
					<div class="overview-wrap">
						<h2 class="title-3"><?php echo $title; ?></h2>
						<br /><br>
					</div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-9 offset-md-2">
                    <div class="card border border-secondary">
                        <div class="card-header">
                            <form action="<?php echo base_url('index.php/pages/acctitle_check'); ?>" method="post">
								<div class="form-group">
			                        <div class="col-lg-4">
			                            <select name="category" id="select" class="form-control">
			                                <option value="Categories">All Categories</option>
			                            <?php foreach($categories as $category): ?>
			                            	<option value="<?php echo $category['categoryID']; ?>"><?php echo $category['category_name']; ?></option>
			                            <?php endforeach; ?>
			                            </select>
			                        </div>    
			                    </div>
			                    <div class="btn-group">
					                <button class="btn btn-primary" type="submit">Filter</button>
					            </div>
                			</form>
                        </div>
	                    <div class="card-body">
	                        <div class="table-responsive table--no-card m-b-40">
								<table class="table table-borderless table-striped table-earning">
									<thead>
										<tr>
											<th>Account Title</th>
											<th>Category</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($filter as $filters): ?>
											<tr>
												<td><?php echo $filters['acct_name'];; ?></td>
												<td><?php echo $filters['category_name']; ?></td>
											</tr>
								<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<form action="<?php echo base_url() . 'index.php/pages/add_acctitle'; ?>" method="post">
								<div class="form-group">
									<div class="btn-group">
										<button class="btn btn-success" type="submit">Add</button>
									</div>
								</div>
							</form>
	                    </div>
                </div>
            </div>

		</div>
	</div>
</div>