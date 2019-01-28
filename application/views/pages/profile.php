<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>User</h2>
		</div>
	</div>
	<div class="card">
		<div class="header">
			<h2> User details </h2>
		</div>
		<div class="body">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<div class="input-group">
	                    <span class="input-group-addon">
	                        <i class="material-icons">person</i>
	                    </span>
	                    <div class="">
	                     	<small>First Name</small>
	                        <input type="text" class="form-control" name="user_firstname" placeholder="First Name" value="<?php echo $user->user_firstname?>" disabled>
	                    </div>
	                </div>
                </div>
                <div class="col-sm-6 col-xs-12">
	                <div class="input-group">
	                    <span class="input-group-addon">
	                        <i class="material-icons">person</i>
	                    </span>
	                    <div class="">
	                    	<small>Last Name</small>
	                        <input type="text" class="form-control" name="user_lastname" placeholder="Last Name" value="<?php echo $user->user_lastname?>" disabled>
	                    </div>
	                </div>
                </div>
                <div class="col-sm-6 col-xs-12">
	                <div class="input-group">
	                    <span class="input-group-addon">
	                        <i class="material-icons">person</i>
	                    </span>
	                    <div class="">
	                    	<small>Username</small>
	                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $user->username?>" disabled>
	                    </div>
	                </div>
                </div>
                <div class="col-sm-6 col-xs-12">
	                <div class="input-group">
	                    <span class="input-group-addon">
	                        <i class="material-icons">phone</i>
	                    </span>
	                    <div class="">
	                   	   <small>Phone Number</small>
	                       <input type="tel" pattern="[0-9]{9}" id="phone_number" name="user_phone" class="form-control" placeholder="Phone Number" value="<?php echo $user->user_phone?>" disabled>
	                    </div>
	                </div>
                </div>
                <div class="col-sm-6 col-xs-12">
	                <div class="input-group">
	                    <span class="input-group-addon">
	                        <i class="material-icons">email</i>
	                    </span>
	                    <div class="">
	                     	<small>E-mail Address</small>
	                        <input type="text" class="form-control" name="email" value="<?php echo $user->user_email?>" disabled>
	                    </div>
	                </div>
                </div>
                <div class="col-sm-6 col-xs-12">
	                <div class="input-group">
	                    <span class="input-group-addon">
	                        <i class="material-icons">language</i>
	                    </span>
	                    <div class="">
	                    	<small>County</small>
	                        <input type="text" class="form-control" name="County" value="<?php echo $user->County?>" disabled>
	                    </div>
	                </div>
                </div>
                <div class="col-sm-6 col-xs-12">
	                <div class="input-group">
	                    <span class="input-group-addon">
	                        <i class="material-icons">language</i>
	                    </span>
	                    <div class="">
	                    	<small>Sub-County</small>
	                        <input type="text" class="form-control" name="SubCounty" value="<?php echo $user->SubCounty?>" disabled>
	                    </div>
	                </div>
                </div>
                <div class="col-sm-6 col-xs-12">
	                <div class="input-group">
	                    <span class="input-group-addon">
	                        <i class="material-icons">language</i>
	                    </span>
	                    <div class="">
	                    	<small>Cluster</small>
	                        <input type="text" class="form-control" name="Cluster" value="<?php echo $user->Cluster?>" disabled>
	                    </div>
	                </div>
                </div>
			</div>
		</div>
	</div>
</section>