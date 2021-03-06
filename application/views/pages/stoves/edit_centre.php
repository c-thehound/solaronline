<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>EDIT CENTRE</h2>
		</div>
		<div class="card">
			<div class="header">
				<div class="row clearfix">
	                <h2 class="col-xs-10">
	                    Please enter the details below
	                </h2>
	                <a href="<?php echo base_url('/upload/stove_centres'); ?>" class="btn btn-primary waves-effect pull-right col-xs-2">
	                    <i class="material-icons">file_upload</i>
	                    <span>Upload excel file</span>
	                </a>
	            </div>
            </div>
			<div class="body">
				<?php if((int)$success === 1): ?>
					<div class="alert alert-success">
		                <strong>Well done!</strong> Centre has been updated successfully.
		            </div>
	        	<?php elseif($success !== null && (int)$success === 0): ?>
	        		<div class="alert alert-error bg-red">
	                	<strong>Ooops!</strong> Centre failed to update.
	            	</div>
	        	<?php endif; ?>
				<?php echo form_open('/stoves/edit/centre/'. $centre_id);?>
					<div class="row clearfix">
						<div class="col-md-6">
                        	<div class="form-group">
                        		<label>County</label>
                        		<select multiple data-max-options="1" class="form-control show-tick" id="county" name="County" data-live-search="true">
                                	<?php foreach($counties as $county): ?>
                                		<option
                                            <?php echo $county['County'] === $centre->County ? "selected" : ""; ?>
                                            value="<?php echo $county['County']; ?>"><?php echo $county['County'];?></option>
                                	<?php endforeach; ?>
                            	</select>
                        	</div>
                        </div>
                        <div class="col-md-6">
                        	<div class="form-group">
                        		<label>Cluster</label>
                        		<select multiple data-max-options="1" class="form-control show-tick" name="Cluster" id="cluster" data-live-search="true">
                                	<?php foreach($clusters as $cluster): ?>
                                		<option
                                              <?php echo $cluster['Cluster'] === $centre->Cluster ? "selected" : ""; ?>
                                            value="<?php echo $cluster['Cluster']; ?>"><?php echo $cluster['Cluster'];?></option>
                                	<?php endforeach; ?>
                            	</select>
                        	</div>
                        </div>
                        <div class="col-md-6">
                        	<div class="form-group">
                        		<label>Sub County</label>
                        		<select multiple data-max-options="1" class="form-control show-tick" id="sub_county" name="SubCounty" data-live-search="true">
                                	<?php foreach($sub_counties as $sub_county): ?>
                                		<option
                                              <?php echo $sub_county['SubCounty'] === $centre->SubCounty ? "selected" : ""; ?>
                                            value="<?php echo $sub_county['SubCounty']; ?>"><?php echo $sub_county['SubCounty'];?></option>
                                	<?php endforeach; ?>
                            	</select>
                        	</div>
                        </div>
                        <div class="col-md-6">
                        	<div class="form-group">
                        		<label>Ward</label>
                        		<select multiple data-max-options="1" class="form-control show-tick" id="ward" name="SubCounty" data-live-search="true">
                                	<?php foreach($wards as $ward): ?>
                                		<option
                                            <?php echo $ward['Ward'] === $centre->Ward ? "selected" : ""; ?>
                                            value="<?php echo $ward['Ward']; ?>"><?php echo $ward['Ward'];?></option>
                                	<?php endforeach; ?>
                            	</select>
                        	</div>
                        </div>
                        <div class="col-md-6">
                        	<div class="form-group">
                        		<label>Producer Type</label>
                        		<select multiple data-max-options="1" class="form-control show-tick" id="type" name="ProducerType">
                                	<option
                                          <?php echo 'Enterprise' === $centre->ProducerType ? "selected" : ""; ?>
                                        value="Enterprise">Enterprise</option>
                                	<option
                                          <?php echo 'Group' === $centre->ProducerType ? "selected" : ""; ?>
                                        value="Group">Group</option>
                                	<option
                                          <?php echo 'Individual' === $centre->ProducerType ? "selected" : ""; ?>
                                        value="Individual">Individual</option>
                            	</select>
                        	</div>
                        </div>
                        <div class="col-md-6">
                            <label for="first_name">Enterprise/ Group Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="first_name" name="GroupName" class="form-control" value="<?php echo $centre->GroupName; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="first_name">Contact Person</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="first_name" name="ContactPerson" class="form-control" value="<?php echo $centre->ContactPerson; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="first_name">Phone Number</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="tel"  pattern="[0-9]{9}" id="first_name" name="PhoneNumber" value="<?php echo $centre->PhoneNumber; ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="first_name">Members/Staff</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="first_name" name="Members" class="form-control" value="<?php echo $centre->Members; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="first_name">Males</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="first_name" name="Male" class="form-control" value="<?php echo $centre->Male; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="first_name">Females</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="first_name" name="Female" class="form-control" value="<?php echo $centre->Female; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="first_name">Kilns</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="first_name" name="Kilns" class="form-control" value="<?php echo $centre->Kilns; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="first_name">Mould</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="first_name" name="Mould" class="form-control" value="<?php echo $centre->Mould; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                        	<button type="submit" class="btn btn-primary m-t-15 waves-effect">Update Centre</button>
                        </div>
					</div>
				<?php echo form_close(); ?>
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
				window.solar.coordinators = [];
			}
			if (typeof window.solar.groups === 'undefined') {
				window.solar.groups = [];
			}
			if (typeof window.solar.wards === 'undefined') {
				window.solar.wards = <?php echo json_encode($wards); ?>;
			}
			if (typeof window.solar.monitors === 'undefined') {
				window.solar.monitors = [];
			}
	});
</script>