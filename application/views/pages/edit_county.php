<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>EDIT COUNTY</h2>
		</div>
	</div>
	<div class="card">
		<div class="body">
			<?php if((int)$success === 1): ?>
				<div class="alert alert-success">
	                <strong>Well done!</strong> County has been updated successfully.
	            </div>
        	<?php elseif($success !== null && (int)$success === 0): ?>
        		<div class="alert alert-error bg-red">
                	<strong>Ooops!</strong> County failed to update.
            	</div>
        	<?php endif; ?>
			<?php echo form_open('county/update_county/' . $county_id);?>
				<div class="row clearfix">
            		<div class="col-md-4">
                        <label for="first_name">County</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="first_name" name="County" class="form-control" value="<?php echo $county->County; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Sub County</label>
                            <select multiple data-max-options="1" class="form-control show-tick sub_county_select" id="sub_county" name="SubCounty" data-live-search="true">
                                <?php foreach($sub_counties as $sub_county): ?>
                                    <option value="<?php echo $sub_county['SubCounty']; ?>"
                                    <?php echo ($sub_county['SubCounty'] === $county->SubCounty) ? 'selected' : ''; ?>
                                    >
                                        <?php echo $sub_county['SubCounty'];?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 pull-right">
                        <div class="form-group">
                            <label>Ward</label>
                            <select multiple data-max-options="1" class="form-control show-tick" name="Ward" id="ward" data-live-search="true">
                                <?php foreach($wards as $ward): ?>
                                    <option
                                    value="<?php echo $ward['Ward']; ?>"
                                     <?php echo ($ward['Ward'] === $county->Ward) ? 'selected' : ''; ?>
                                    >
                                    <?php echo $ward['Ward'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="added_by" value="<?php echo $user->user_id; ?>">
                    <div class="col-md-12">
                    	<button type="submit" class="btn btn-primary m-t-15 waves-effect">Update County</button>
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
                window.solar.counties = [];
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
                window.solar.wards = <?php echo json_encode($wards); ?>;
            }
            if (typeof window.solar.monitors === 'undefined') {
                window.solar.monitors = [];
            }

            if (typeof window.solar.builders === 'undefined') {
                window.solar.builders = [];
            }
    });
</script>