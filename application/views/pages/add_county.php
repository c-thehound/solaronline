<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>ADD COUNTY</h2>
		</div>
	</div>
	<div class="card">
        <div class="header">
            <div class="row clearfix">
                <h2 class="col-xs-10">
                    Please enter the details below
                </h2>
                <a href="<?php echo base_url('/upload/counties'); ?>" class="btn btn-primary waves-effect pull-right col-xs-2">
                    <i class="material-icons">file_upload</i>
                    <span>Upload excel file</span>
                </a>
            </div>
        </div>
		<div class="body">
			<?php if((int)$success === 1): ?>
				<div class="alert alert-success">
	                <strong>Well done!</strong> County has been added successfully.
	            </div>
        	<?php elseif($success !== null && (int)$success === 0): ?>
        		<div class="alert alert-error bg-red">
                	<strong>Ooops!</strong> Failed to add county.
            	</div>
        	<?php endif; ?>
			<?php echo form_open('county/add');?>
				<div class="row clearfix">
                     <div class="col-md-6">
                        <div class="form-group">
                            <label>Cluster</label>
                            <select multiple data-max-options="1" class="form-control show-tick" name="Cluster" id="cluster" data-live-search="true">
                                <?php foreach($clusters as $cluster): ?>
                                    <option value="<?php echo $cluster['Cluster']; ?>"><?php echo $cluster['Cluster'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
            		<div class="col-md-6">
                        <label for="first_name">County</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="county" name="County" class="form-control">
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SubCounty</label>
                            <select multiple data-max-options="1" class="form-control show-tick" id="sub_county" name="County" data-live-search="true">
                                <?php foreach($sub_counties as $county): ?>
                                    <option value="<?php echo $county['SubCounty']; ?>"><?php echo $county['SubCounty'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 pull-right">
                        <div class="form-group">
                            <label>Ward</label>
                            <select multiple data-max-options="1" class="form-control show-tick" name="Ward" id="ward" data-live-search="true">
                                <?php foreach($wards as $ward): ?>
                                    <option value="<?php echo $ward['Ward']; ?>"><?php echo $ward['Ward'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                    	<button type="submit" class="btn btn-primary m-t-15 waves-effect">Add County</button>
                    </div>
                    <input type="hidden" name="added_by" value="<?php echo $user->user_id; ?>">
                </div>
			<?php echo form_close(); ?>
		</div>
	</div>
</section>
<script type="text/javascript">
    $(function() {
            solar = window.solar || {};
            if (typeof window.solar.sub_counties === 'undefined') {
                window.solar.sub_counties = <?php echo json_encode($sub_counties); ?>;
            }
            if (typeof window.solar.clusters === 'undefined') {
                window.solar.clusters = <?php echo json_encode($clusters); ?>;
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