<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>CREATE USER</h2>
		</div>
	</div>
	<div class="card">
		<div class="body">
			<div class="row clearfix">
				<div class="col-xs-6">
					<?php if((int)$success === 1): ?>
						<div class="alert alert-success">
			                <strong>Well done!</strong> Account created successfully. An email has been sent the the user!
			            </div>
		        	<?php elseif($success !== null && (int)$success === 0): ?>
		        		<div class="alert alert-error bg-red">
		                	<strong>Ooops!</strong> Failed to add user.
		            	</div>
		        	<?php endif; ?>
		        		<input type="hidden" name="added_by" value="<?php echo $user->user_id; ?>">
						<?php echo form_open('user/create_account_admin');?>
		                <div class="m-b-10 text-center <?php echo $success === 'user_exists' ? 'text-danger' : '' ?>">
		                    <?php echo $success === 'user_exists' ? 'User already exists' : ''; ?>
		                </div>
		                <div class="input-group">
		                    <span class="input-group-addon">
		                        <i class="material-icons">person</i>
		                    </span>
		                    <div class="form-line">
		                        <input type="text" class="form-control" name="user_firstname" placeholder="First Name" required autofocus>
		                    </div>
		                </div>
		                <div class="input-group">
		                    <span class="input-group-addon">
		                        <i class="material-icons">person</i>
		                    </span>
		                    <div class="form-line">
		                        <input type="text" class="form-control" name="user_lastname" placeholder="Last Name" required autofocus>
		                    </div>
		                </div>
		                <div class="input-group">
		                    <span class="input-group-addon">
		                        <i class="material-icons">person</i>
		                    </span>
		                    <div class="form-line">
		                        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
		                    </div>
		                </div>
		                <div class="input-group">
		                    <span class="input-group-addon">
		                        <i class="material-icons">phone</i>
		                    </span>
		                    <div class="form-line">
		                       <input type="tel" pattern="[0-9]{9}" id="phone_number" name="user_phone" class="form-control" placeholder="Phone Number" required>
		                    </div>
		                </div>
		                <div class="row">
		                    <div class="col-xs-1 p-l-0 p-r-0">
		                        <i class="material-icons m-l-10 m-t-25">language</i>
		                    </div>
		                    <div class="col-xs-11">
		                        <label>County </label>
		                        <select multiple data-max-options="1" class="form-control show-tick" id="county" name="County" data-live-search="true">
		                            <?php foreach($counties as $county): ?>
		                                <option value="<?php echo $county['County']; ?>"><?php echo $county['County'];?></option>
		                            <?php endforeach; ?>
		                        </select multiple data-max-options="1">
		                    </div>
		                </div>
		                <div class="row">
		                    <div class="col-xs-1 p-l-0 p-r-0">
		                        <i class="material-icons m-l-10 m-t-25">language</i>
		                    </div>
		                    <div class="col-xs-11">
		                        <label>Sub County</label>
		                        <select multiple data-max-options="1" class="form-control show-tick" id="sub_county" name="SubCounty" data-live-search="true">
		                            <?php foreach($sub_counties as $sub_county): ?>
		                                <option value="<?php echo $sub_county['SubCounty']; ?>"><?php echo $sub_county['SubCounty'];?></option>
		                            <?php endforeach; ?>
		                        </select multiple data-max-options="1">
		                    </div>
		                </div>
		                <div class="row">
		                    <div class="col-xs-1 p-l-0 p-r-0">
		                        <i class="material-icons m-l-10 m-t-25">language</i>
		                    </div>
		                    <div class="col-xs-11">
		                        <label>Cluster</label>
		                        <select multiple data-max-options="1" class="form-control show-tick" id="cluster" name="Cluster" data-live-search="true">
		                            <?php foreach($clusters as $cluster): ?>
		                                <option value="<?php echo $cluster['Cluster']; ?>"><?php echo $cluster['Cluster'];?></option>
		                            <?php endforeach; ?>
		                        </select multiple data-max-options="1">
		                    </div>
		                </div>
		                <div class="row">
		                    <div class="col-xs-1 p-l-0 p-r-0">
		                        <i class="material-icons m-l-10 m-t-25">language</i>
		                    </div>
		                    <div class="col-xs-11">
		                        <label>Access Level </label>
		                        <select multiple data-max-options="1" class="form-control show-tick" id="level" name="user_level" data-live-search="true">
		                            <option value="0">Data Entry</option>
		                            <option value="1">Admin</option>
		                            <option value="2">View Only</option>
		                        </select multiple data-max-options="1">
		                    </div>
		                </div>
		                <div class="input-group">
		                    <span class="input-group-addon">
		                        <i class="material-icons">email</i>
		                    </span>
		                    <div class="form-line">
		                        <input type="email" class="form-control" name="user_email" placeholder="Email Address" required>
		                    </div>
		                </div>
		                <div class="input-group">
		                    <span class="input-group-addon">
		                        <i class="material-icons">lock</i>
		                    </span>
		                    <div class="form-line">
		                        <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
		                    </div>
		                </div>
		                <input type="hidden" name="added_by" value="<?php echo $user->user_id; ?>">
		                <div class="input-group">
			                <button class="btn btn-block btn-lg bg-green waves-effect" type="submit">	CREATE USER</button>
			                </div>
		            	</div>
		            </form>
            	</div>
            </div>
		</div>
	</div>
</section>
<script type="text/javascript">
	$(function() {
			solar = window.solar || {};
			if (typeof window.solar.counties === 'undefined') {
				window.solar.counties = <?php echo json_encode($counties); ?>;
			}
			if (typeof window.solar.lmes === 'undefined') {
				window.solar.lmes = [];
			}
			if (typeof window.solar.sub_counties === 'undefined') {
				window.solar.sub_counties = <?php echo json_encode($sub_counties); ?>;
			}
			if (typeof window.solar.clusters === 'undefined') {
				window.solar.clusters = <?php echo json_encode($clusters); ?>;
			}
			if (typeof window.solar.coordinators === 'undefined') {
				window.solar.coordinators = [];
			}
			if (typeof window.solar.lmes === 'undefined') {
				window.solar.lmes = [];
			}
			if (typeof window.solar.groups === 'undefined') {
				window.solar.groups = [];
			}
			if (typeof window.solar.wards === 'undefined') {
				window.solar.wards = [];
			}
			if (typeof window.solar.monitors === 'undefined') {
				window.solar.monitors = [];
			}

            if (typeof window.solar.builders === 'undefined') {
                window.solar.builders = [];
            }
	});
</script>