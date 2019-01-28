<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>ADD BUILDER</h2>
		</div>
		<div class="card">
			<div class="header">
                <div class="row clearfix">
                    <h2 class="col-xs-10">
                        Please enter the details below
                    </h2>
                    <a href="<?php echo base_url('/upload/stove_builders'); ?>" class="btn btn-primary waves-effect pull-right col-xs-2">
                        <i class="material-icons">file_upload</i>
                        <span>Upload excel file</span>
                    </a>
                </div>
            </div>
			<div class="body">
				<?php if((int)$success === 1): ?>
					<div class="alert alert-success">
		                <strong>Well done!</strong> Builder has been added successfully.
		            </div>
	        	<?php elseif($success !== null && (int)$success === 0): ?>
	        		<div class="alert alert-error bg-red">
	                	<strong>Ooops!</strong> Builder failed to save.
	            	</div>
	        	<?php endif; ?>
				<?php echo form_open('/stoves/edit/builder/' . $builder_id);?>
					<div class="row clearfix">
						<div class="col-md-6">
                        	<div class="form-group">
                        		<label>County</label>
                        		<select multiple data-max-options="1" class="form-control show-tick" id="county" name="County" data-live-search="true">
                                	<?php foreach($counties as $county): ?>
                                		<option
                                			<?php echo $county['County'] === $builder->County ? 'selected' : ''; ?>
                                			value="<?php echo $county['County']; ?>">
                                			<?php echo $county['County'];?>
                                		</option>
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
                                			<?php echo $cluster['Cluster'] === $builder->Cluster ? 'selected' : ''; ?>
                                			value="<?php echo $cluster['Cluster']; ?>">
                                			<?php echo $cluster['Cluster'];?>
                                			</option>
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
                                			<?php echo $sub_county['SubCounty'] === $builder->SubCounty ? 'selected' : ''; ?>
                                			value="<?php echo $sub_county['SubCounty']; ?>">
                                			<?php echo $sub_county['SubCounty'];?>
                                		</option>
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
                                			<?php echo $ward['Ward'] === $builder->Ward ? 'selected' : ''; ?>
                                			value="<?php echo $ward['Ward']; ?>">
                                			<?php echo $ward['Ward'];?></option>
                                	<?php endforeach; ?>
                            	</select>
                        	</div>
                        </div>
                        <div class="col-md-6">
	                    	<div class="form-group">
	                    		<label> Monitor </label>
	                    		<select multiple data-max-options="1" class="form-control show-tick lme-select" id="monitor" name="Monitor" data-live-search="true">
	                            	<?php foreach($monitors as $lme): ?>
	                            		<option
	                            			<?php echo $lme['StoveBuilder'] === $builder->Monitor ? 'selected' : ''; ?>
	                            			data-cluster="<?php echo $lme['Cluster']; ?>"
	                            			data-group="<?php echo $lme['SGroup']; ?>"
	                            			data-ward="<?php echo $lme['Ward']; ?>"
		                            		data-county="<?php echo $lme['County']; ?>"
		                            		data-subcounty="<?php echo $lme['SubCounty']; ?>"
	                            			value="<?php echo $lme['StoveBuilder']; ?>">
	                            				<?php echo $lme['StoveBuilder']; ?>
	                            			</option>
	                            	<?php endforeach; ?>
	                        	</select>
	                    	</div>
	                    </div>
	                    <div class="col-md-6">
                        	<div class="form-group">
                        		<label>Group</label>
                        		<select multiple data-max-options="1" class="form-control show-tick" id="group" name="SGroup" data-live-search="true">
                                	<?php foreach($groups as $row): ?>
                                		<option
                                			<?php echo $row['SGroup'] === $builder->SGroup ? 'selected' : ''; ?>
                                			data-cluster="<?php echo $row['Cluster']; ?>"
	                            			data-ward="<?php echo $row['Ward']; ?>"
		                            		data-county="<?php echo $row['County']; ?>"
		                            		data-subcounty="<?php echo $row['SubCounty']; ?>"
                                			value="<?php echo $row['SGroup']; ?>"><?php echo $row['SGroup'];?></option>
                                	<?php endforeach; ?>
                            	</select>
                        	</div>
                        </div>
                        <div class="col-md-6">
                            <label for="first_name">Builder</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="first_name" name="StoveBuilder" class="form-control" value="<?php echo $builder->StoveBuilder; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                        	<button type="submit" class="btn btn-primary m-t-15 waves-effect">Update Builder</button>
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
				window.solar.groups = <?php echo json_encode($groups); ?>;
			}
			if (typeof window.solar.wards === 'undefined') {
				window.solar.wards = <?php echo json_encode($wards); ?>;
			}
			if (typeof window.solar.monitors === 'undefined') {
				window.solar.monitors = <?php echo json_encode($monitors); ?>;
			}
	});
</script>