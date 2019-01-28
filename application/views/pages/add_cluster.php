<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>ADD CLUSTER</h2>
		</div>
	</div>
	<div class="card">
        <div class="header">
            <div class="row clearfix">
                <h2 class="col-xs-10">
                    Please enter the details below
                </h2>
                <a href="<?php echo base_url('/upload/clusters'); ?>" class="btn btn-primary waves-effect pull-right col-xs-2">
                    <i class="material-icons">file_upload</i>
                    <span>Upload excel file</span>
                </a>
            </div>
        </div>
		<div class="body">
			<?php if((int)$success === 1): ?>
				<div class="alert alert-success">
	                <strong>Well done!</strong> Cluster has been added successfully.
	            </div>
        	<?php elseif($success !== null && (int)$success === 0): ?>
        		<div class="alert alert-error bg-red">
                	<strong>Ooops!</strong> Cluster failed to add.
            	</div>
        	<?php endif; ?>
			<?php echo form_open('cluster/add');?>
				<div class="row clearfix">
            		<div class="col-xs-4">
                        <label for="first_name">Cluster</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="first_name" name="Cluster" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label>County</label>
                            <select multiple data-max-options="1" class="form-control show-tick county-select" id="county" name="County" data-live-search="true">
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
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label>Sub County</label>
                            <select multiple data-max-options="1" class="form-control show-tick sub_county_select" id="sub_county" name="SubCounty" data-live-search="true">
                                <?php foreach($sub_counties as $sub_county): ?>
                                    <option value="<?php echo $sub_county['SubCounty']; ?>"
                                    >
                                        <?php echo $sub_county['SubCounty'];?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="added_by" value="<?php echo $user->user_id; ?>">
                    <div class="col-md-12">
                    	<button type="submit" class="btn btn-primary m-t-15 waves-effect">Add Cluster</button>
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
                window.solar.clusters = [];
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