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
					<form action="<?php echo base_url('index.php/users/acctitle_check'); ?>" method="post">
						<div class="form-group">
		                        <div class="col-lg-7">
		                            <select name="gender" id="select" class="form-control">
		                                <option value="Categories">All Categories</option>
		                            </select>
		                        </div>     
	                    </div>
	                    <div class="form-group">
			                <button class="btn btn-primary" type="submit">view</button>
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
									<th>Category</th>
									<th>Account Title</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Assets</td>
									<td>Office Equipment</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>