<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>EDIT LME</h2>
		</div>
	</div>
	<div class="card">
		<div class="body">
			<?php if((int)$success === 1): ?>
				<div class="alert alert-success">
	                <strong>Well done!</strong> LME has been updated successfully.
	            </div>
        	<?php elseif($success !== null && (int)$success === 0): ?>
        		<div class="alert alert-error bg-red">
                	<strong>Ooops!</strong> LME failed to update.
            	</div>
        	<?php endif; ?>
			<?php echo form_open('lme/update_lme/' . $lme_id);?>
				<div class="row clearfix">
            		<div class="col-md-6">
                        <label for="first_name">LME First Name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="first_name" name="LME_FirstName" class="form-control" value="<?php echo $lme->LME_FirstName; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="last_name">LME Last Name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="last_name" name="LME_LastName" class="form-control" value="<?php echo $lme->LME_LastName; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cluster</label>
                            <select multiple data-max-options="1" class="form-control show-tick cluster-select" name="Cluster" id="cluster" data-live-search="true">
                                <?php foreach($clusters as $cluster): ?>
                                    <option
                                        value="<?php echo $cluster['Cluster']; ?>"
                                        <?php echo ($cluster['Cluster'] === $lme->Cluster) ? 'selected' : ''; ?>
                                        >
                                        <?php echo $cluster['Cluster'];?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                    	<div class="form-group">
                    		<label>County</label>
                    		<select multiple data-max-options="1" class="form-control show-tick county-select" id="county" name="County" data-live-search="true">
                            	<?php foreach($counties as $county): ?>
                            		<option
                            			value="<?php echo $county['County']; ?>"
                            			<?php echo ($county['County'] === $lme->County) ? 'selected' : ''; ?>
                            			>
                            			<?php echo $county['County'];?>		
                            		</option>
                            	<?php endforeach; ?>
                        	</select>
                    	</div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Sub County</label>
                            <select multiple data-max-options="1" class="form-control show-tick sub_county_select" id="sub_county" name="SubCounty" data-live-search="true">
                                <?php foreach($sub_counties as $sub_county): ?>
                                    <option value="<?php echo $sub_county['SubCounty']; ?>"
                                    <?php echo ($sub_county['SubCounty'] === $lme->SubCounty) ? 'selected' : ''; ?>
                                    >
                                        <?php echo $sub_county['SubCounty'];?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Coordinator </label>
                            <select multiple data-max-options="1" class="form-control show-tick lme-select" id="d_coordinator" name="coordinator" data-live-search="true">
                                <?php foreach($coordinators as $row): ?>
                                    <option
                                         <?php echo (
                                            ($row['Coordinator_FirstName'] === $lme->Coordinator_FirstName) &&
                                            ($row['Coordinator_LastName'] === $lme->Coordinator_LastName)
                                            ) ? 'selected' : ''; ?>
                                        data-cluster="<?php echo $row['Cluster']; ?>"
                                        data-county="<?php echo $row['County']; ?>"
                                        data-subcounty="<?php echo $row['SubCounty']; ?>"
                                        value="<?php echo $row['Coordinator_FirstName'] . ',' . $row['Coordinator_LastName'] . ',' . $row['id']; ?>"><?php echo $row['Coordinator_FirstName'] . ' ' . $row['Coordinator_LastName'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="phone_number">Phone Number</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="tel" pattern="[0-9]{9}" id="phone_number" name="PhoneNumber" class="form-control" value="<?php echo $lme->PhoneNumber; ?>">
                            </div>
                        </div>
                    </div>
                   <div class="col-md-6">
                    	<div class="form-group">
                    		<label>Category</label>
                    		<select multiple data-max-options="1" class="form-control show-tick category-select" id="category" name="LME_Category" data-live-search="true">
                            	<?php foreach($categories as $category): ?>
                            		<option
                            			value="<?php echo $category['category_name']; ?>"
                            			<?php echo ($category['category_name'] === $lme->LME_Category) ? 'selected' : ''; ?>
                            		>
                            		<?php echo $category['category_name'];?></option>
                            	<?php endforeach; ?>
                        	</select>
                    	</div>
                    </div>
                    <input type="hidden" name="added_by" value="<?php echo $user->user_id; ?>">
                    <div class="col-md-12">
                    	<button type="submit" class="btn btn-primary m-t-15 waves-effect">Update LME</button>
                    </div>
                </div>
			<?php echo form_close(); ?>
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
		// set category
		$('select.category-select').val('<?php echo $lme->LME_Category; ?>');
		$('select.category-select').selectpicker('refresh');
	});
</script>