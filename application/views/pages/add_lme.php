<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>ADD (Last Mile Enterpreneur) LME</h2>
		</div>
		<div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                    	<div class="row clearfix">
	                        <h2 class="col-xs-10">
	                            Please enter the details below
	                        </h2>
	                        <a href="<?php echo base_url('/upload/lmes'); ?>" class="btn btn-primary waves-effect pull-right col-xs-2">
		                        <i class="material-icons">file_upload</i>
		                        <span>Upload excel file</span>
		                    </a>
	                    </div>
                    </div>
                    <div class="body">
                        	<?php if((int)$success === 1): ?>
								<div class="alert alert-success">
					                <strong>Well done!</strong> LME has been added successfully.
					            </div>
				        	<?php elseif($success !== null && (int)$success === 0): ?>
				        		<div class="alert alert-error bg-red">
				                	<strong>Ooops!</strong> Failed to add LME.
				            	</div>
				        	<?php endif; ?>
							<?php echo form_open('lme/add_lme');?>
                        	<div class="row clearfix">
                        		<div class="col-md-6">
		                            <label for="first_name">LME First Name</label>
		                            <div class="form-group">
		                                <div class="form-line">
		                                    <input type="text" id="first_name" name="LME_FirstName" class="form-control" required>
		                                </div>
		                            </div>
	                            </div>
	                            <div class="col-md-6">
		                            <label for="last_name">LME Last Name</label>
		                            <div class="form-group">
		                                <div class="form-line">
		                                    <input type="text" id="last_name" name="LME_LastName" class="form-control" required>
		                                </div>
		                            </div>
	                            </div>
	                            <div class="col-md-6">
	                            	<div class="form-group">
	                            		<label>Cluster</label>
	                            		<select multiple data-max-options="1" class="form-control show-tick" name="Cluster" id="cluster" data-live-search="true">
	                                    	<?php foreach($clusters as $cluster): ?>
	                                    		<option value="<?php echo $cluster['Cluster']; ?>"><?php echo $cluster['Cluster'];?></option>
	                                    	<?php endforeach; ?>
                                    	</select multiple data-max-options="1">
	                            	</div>
	                            </div>
	                            <div class="col-md-6">
	                            	<div class="form-group">
	                            		<label>County</label>
	                            		<select multiple data-max-options="1" class="form-control show-tick" id="county" name="County" data-live-search="true">
	                                    	<?php foreach($counties as $county): ?>
	                                    		<option value="<?php echo $county['County']; ?>"><?php echo $county['County'];?></option>
	                                    	<?php endforeach; ?>
                                    	</select multiple data-max-options="1">
	                            	</div>
	                            </div>
	                            <div class="col-md-6">
	                            	<div class="form-group">
	                            		<label>Sub County</label>
	                            		<select multiple data-max-options="1" class="form-control show-tick" id="sub_county" name="SubCounty" data-live-search="true">
	                                    	<?php foreach($sub_counties as $sub_county): ?>
	                                    		<option value="<?php echo $sub_county['SubCounty']; ?>"><?php echo $sub_county['SubCounty'];?></option>
	                                    	<?php endforeach; ?>
                                    	</select multiple data-max-options="1">
	                            	</div>
	                            </div>
	                            <div class="col-md-6">
			                    	<div class="form-group">
			                    		<label> Coordinator </label>
			                    		<select multiple data-max-options="1" class="form-control show-tick lme-select multiple data-max-options="1"" id="d_coordinator" name="coordinator" data-live-search="true">
			                            	<?php foreach($coordinators as $lme): ?>
			                            		<option
			                            			data-cluster="<?php echo $lme['Cluster']; ?>"
				                            		data-county="<?php echo $lme['County']; ?>"
				                            		data-subcounty="<?php echo $lme['SubCounty']; ?>"
			                            			value="<?php echo $lme['Coordinator_FirstName'] . ',' . $lme['Coordinator_LastName'] . ',' . $lme['id']; ?>"><?php echo $lme['Coordinator_FirstName'] . ' ' . $lme['Coordinator_LastName'];?></option>
			                            	<?php endforeach; ?>
			                        	</select multiple data-max-options="1">
			                    	</div>
			                    </div>
	                            <div class="col-md-6">
		                            <label for="phone_number">Phone Number</label>
		                            <div class="form-group">
		                                <div class="form-line">
		                                    <input type="tel" pattern="[0-9]{9}" id="phone_number" name="PhoneNumber" class="form-control" required>
		                                </div>
		                            </div>
	                            </div>
	                           
	                           <div class="col-md-6">
	                            	<div class="form-group">
	                            		<label>Category</label>
	                            		<select multiple data-max-options="1" class="form-control show-tick" id="category" name="LME_Category" data-live-search="true">
	                                    	<?php foreach($categories as $category): ?>
	                                    		<option value="<?php echo $category['category_name']; ?>"><?php echo $category['category_name'];?></option>
	                                    	<?php endforeach; ?>
                                    	</select multiple data-max-options="1">
	                            	</div>
	                            </div>
	                            <input type="hidden" name="added_by" value="<?php echo $user->user_id; ?>">
	                            <div class="col-md-12">
	                            	<button type="submit" class="btn btn-primary m-t-15 waves-effect">Post LME</button>
	                            </div>
                            </div>
                        <?php echo form_close();?>
                    </div>
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
			if (typeof window.solar.sub_counties === 'undefined') {
				window.solar.sub_counties = <?php echo json_encode($sub_counties); ?>;
			}
			if (typeof window.solar.clusters === 'undefined') {
				window.solar.clusters = <?php echo json_encode($clusters); ?>;
			}
			if (typeof window.solar.lmes === 'undefined') {
				window.solar.lmes = [];
			}
			if (typeof window.solar.coordinators === 'undefined') {
				window.solar.coordinators = <?php echo json_encode($coordinators); ?>;
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