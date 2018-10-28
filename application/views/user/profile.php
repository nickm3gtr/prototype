<div class="main-content">
	<div class="col-md-4 offset-md-3">
        <div class="card">
        	<div class="card-header">
                <strong class="card-title mb-3"><?php echo $title; ?></strong>
            </div>
            <div class="card-body">
                <div class="mx-auto d-block">
                    <img class="rounded-circle mx-auto d-block" src="<?php echo base_url(); ?>assets/images/icon/<?php echo strtolower($this->session->userdata('gender')) . '-unknown-avatar.jpg'; ?>" alt="Card image cap">
                        <h5 class="text-sm-center mt-2 mb-1"><?php echo $user_info['firstname'] . ' ' . $user_info['lastname']; ?></h5>
                        <div class="location text-sm-center">                    
                            <i class="fa fa-envelope"></i> <?php echo $user_info['email']; ?></div>                    
                        </div>
                        <div class="location text-sm-center">                    
                            <i class="fa fa-<?php echo strtolower($user_info['gender']); ?>"></i> <?php echo $user_info['gender']; ?></div><br>
                            <form action="<?php echo base_url() . 'index.php/users/profile_edit'; ?>" method="post">
                                <button type="submit" class="btn btn-success btn-sm col-sm-6 offset-sm-3">
                                    <i class="fa fa-dot-circle-o"></i> Edit Profile
                           </form>
                        </div>                
                        <hr>
                </div>
            </div>
		</div>
	</div>
