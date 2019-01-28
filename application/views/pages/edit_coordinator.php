<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>EDIT COORDINATOR</h2>
		</div>
	</div>
	<div class="card">
		<div class="body">
			<?php if((int)$success === 1): ?>
				<div class="alert alert-success">
	                <strong>Well done!</strong> Coordinator has been updated successfully.
	            </div>
        	<?php elseif($success !== null && (int)$success === 0): ?>
        		<div class="alert alert-error bg-red">
                	<strong>Ooops!</strong> Coordinator failed to update.
            	</div>
        	<?php endif; ?>
			<?php echo form_open('coordinator/update_coordinator/' . $coordinator_id);?>
				<div class="row clearfix">
            		<div class="col-md-6">
                        <label for="first_name">Coordinator First Name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="first_name" name="Coordinator_FirstName" class="form-control" value="<?php echo $coordinator->Coordinator_FirstName; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="last_name">Coordinator Last Name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="last_name" name="Coordinator_LastName" class="form-control" value="<?php echo $coordinator->Coordinator_LastName; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    	<div class="form-group">
                    		<label>County</label>
                    		<select multiple data-max-options="1" class="form-control show-tick county-select" id="county" name="County" data-live-search="true">
                            	<?php foreach($counties as $county): ?>
                            		<option
                            			value="<?php echo $county['County']; ?>"
                            			<?php echo ($county['County'] === $coordinator->County) ? 'selected' : ''; ?>
                            			>
                            			<?php echo $county['County'];?>		
                            		</option>
                            	<?php endforeach; ?>
                        	</select>
                    	</div>
                    </div>
                    <div class="col-md-6">
                    	<div class="form-group">
                    		<label>Cluster</label>
                    		<select multiple data-max-options="1" class="form-control show-tick cluster-select" name="Cluster" id="cluster" data-live-search="true">
                            	<?php foreach($clusters as $cluster): ?>
                            		<option
                            			value="<?php echo $cluster['Cluster']; ?>"
                            			<?php echo ($cluster['Cluster'] === $coordinator->Cluster) ? 'selected' : ''; ?>
                            			>
                            			<?php echo $cluster['Cluster'];?>
                            		</option>
                            	<?php endforeach; ?>
                        	</select>
                    	</div>
                    </div>
                    <div class="col-md-6">
                        <label for="phone_number">Phone Number</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="tel" pattern="[0-9]{9}" id="phone_number" name="PhoneNumber" class="form-control" value="<?php echo $coordinator->PhoneNumber; ?>">
                            </div>
                        </div>
                    </div>
                   <div class="col-md-6">
                    	<div class="form-group">
                    		<label>Sub County</label>
                    		<select multiple data-max-options="1" class="form-control show-tick sub_county_select" id="sub_county" name="SubCounty" data-live-search="true">
                            	<?php foreach($sub_counties as $sub_county): ?>
                            		<option value="<?php echo $sub_county['SubCounty']; ?>"
                            		<?php echo ($sub_county['SubCounty'] === $coordinator->SubCounty) ? 'selected' : ''; ?>
                            		>
                            			<?php echo $sub_county['SubCounty'];?>
                            		</option>
                            	<?php endforeach; ?>
                        	</select>
                    	</div>
                    </div>
                    <input type="hidden" name="added_by" value="<?php echo $user->user_id; ?>">
                    <div class="col-md-12">
                    	<button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                    </div>
                </div>
			<?php echo form_close(); ?>
		</div>
	</div>
</section>
<script type="text/javascript">
	$(function () {
		// set county
		$('select.county-select').val('<?php echo $lme->County; ?>');
		$('select.county-select').selectpicker('refresh');
		// set cluster
		$('select.cluster-select').val('<?php echo $lme->Cluster; ?>');
		$('select.cluster-select').selectpicker('refresh');
		// sub county
		$('select.sub_county_select').val('<?php echo $lme->SubCounty; ?>');
		$('select.sub_county_select').selectpicker('refresh');
	});
</script>