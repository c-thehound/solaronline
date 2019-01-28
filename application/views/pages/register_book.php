<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>RECEIPT BOOKS</h2>
		</div>
		<div class="card">
			<div class="body">
				<?php if((int)$success === 1): ?>
					<div class="alert alert-success">
		                <strong>Well done!</strong> Book added successfully.
		            </div>
	        	<?php elseif($success !== null && (int)$success === 0): ?>
	        		<div class="alert alert-error bg-red">
	                	<strong>Ooops!</strong> Failed to add book.
	            	</div>
	        	<?php endif; ?>
				<?php echo form_open('books/add_book');?>
					<div class="row clearfix">
						<div class="col-md-6">
	                        <label for="first_name">Book Number</label>
	                        <div class="form-group">
	                            <div class="form-line">
	                                <input type="number" id="first_name" name="BookNumber" class="form-control" required>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-6">
	                    	<div class="form-group">
	                    		<label>Cluster</label>
	                    		<select multiple data-max-options="1" class="form-control show-tick cluster-select" name="Cluster" id="d_cluster" data-live-search="true">
	                            	<?php foreach($clusters as $cluster): ?>
	                            		<option
	                            			value="<?php echo $cluster['Cluster']; ?>"
	                            			>
	                            			<?php echo $cluster['Cluster'];?>
	                            		</option>
	                            	<?php endforeach; ?>
	                        	</select>
	                    	</div>
	                    </div>
	                    
	                   <div class="col-md-6 pull-right">
	                    	<div class="form-group">
	                    		<label>Sub County</label>
	                    		<select multiple data-max-options="1" class="form-control show-tick sub_county_select" id="d_sub_county" name="SubCounty" data-live-search="true">
	                            	<?php foreach($sub_counties as $sub_county): ?>
	                            		<option value="<?php echo $sub_county['SubCounty']; ?>"
	                            		>
	                            			<?php echo $sub_county['SubCounty'];?>
	                            		</option>
	                            	<?php endforeach; ?>
	                        	</select>
	                    	</div>
	                    </div>
	                    <div class="col-md-6 pull-right">
	                    	<div class="form-group">
	                    		<label>County</label>
	                    		<select multiple data-max-options="1" class="form-control show-tick county-select" id="d_county" name="County" data-live-search="true">
	                            	<?php foreach($counties as $county): ?>
	                            		<option
	                            			value="<?php echo $county['County']; ?>"
	                            			>
	                            			<?php echo $county['County'];?>		
	                            		</option>
	                            	<?php endforeach; ?>
	                        	</select>
	                    	</div>
	                    </div>
	                <?php if($portal === 'solar') : ?>
	                    <div class="col-md-6">
	                    	<div class="form-group">
	                    		<label>LME </label>
	                    		<select multiple data-max-options="1" class="form-control show-tick lme-select" id="d_lme" name="lme" data-live-search="true">
	                            	<?php foreach($lmes as $lme): ?>
	                            		<option
	                            			data-cluster="<?php echo $lme['Cluster']; ?>"
		                            		data-county="<?php echo $lme['County']; ?>"
		                            		data-subcounty="<?php echo $lme['SubCounty']; ?>"
	                            			value="<?php echo $lme['LME_FirstName'] . ',' . $lme['LME_LastName'] . ',' . $lme['id']; ?>"><?php echo $lme['LME_FirstName'] . ' ' . $lme['LME_LastName'];?></option>
	                            	<?php endforeach; ?>
	                        	</select>
	                    	</div>
	                    </div>
	                <?php else: ?>
	                	<div class="col-md-6">
	                    	<div class="form-group">
	                    		<label>Builder </label>
	                    		<select multiple data-max-options="1" class="form-control show-tick lme-select" id="builder" name="StoveBuilder" data-live-search="true">
	                            	<?php foreach($builders as $row): ?>
	                            		<option
	                            			data-cluster="<?php echo $row['Cluster']; ?>"
		                            		data-county="<?php echo $row['County']; ?>"
		                            		data-subcounty="<?php echo $row['SubCounty']; ?>"
	                            			value="<?php echo $row['StoveBuilder']; ?>">
	                            			<?php echo  $row['StoveBuilder']; ?></option>
	                            	<?php endforeach; ?>
	                        	</select>
	                    	</div>
	                    </div>
	                <?php endif; ?>
	                    <input type="hidden" name="added_by" value="<?php echo $user->user_id; ?>">
	                    <div class="col-md-12">
	                    	<button type="submit" class="btn btn-primary m-t-15 waves-effect">Add Book</button>
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
			if (typeof window.solar.lmes === 'undefined') {
				window.solar.lmes = <?php echo isset($lmes) ? json_encode($lmes) : json_encode(array()); ?>;
			}
			if (typeof window.solar.builders === 'undefined') {
				window.solar.builders = <?php echo isset($builders) ? json_encode($builders) : json_encode(array()); ?>;
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
	});
</script>