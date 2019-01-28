<style type="text/css">
	.bootstrap-select.btn-group.form-control.input-sm {
	    margin-top: -27px;
	}
	.input-sm button.btn.dropdown-toggle.btn-default {
	    border: 1px #d1d1d1 solid;
	}
	#js-table_length label {
	    color: white;
	}
	select.form-control.input-sm {
	    border: 1px #d1d1d1 solid;
	    height: auto;
	}
</style>
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>LME</h2>
		</div>
	</div>
	<div class="card">
		<div class="header">
			<div class="row clearfix">
                <h2 class="col-xs-10">
                    A list of all lmes
                </h2>
                <a href="<?php echo base_url('/upload/lmes'); ?>" class="btn btn-primary waves-effect pull-right col-xs-2">
                    <i class="material-icons">file_upload</i>
                    <span>Upload excel file</span>
                </a>
            </div>
		</div>
		<div class="body table-responsive">
			<?php if((int)$success === 1): ?>
				<div class="alert alert-success">
	                <strong>Well done!</strong> LME has been deleted successfully.
	            </div>
        	<?php elseif($success !== null && (int)$success === 0): ?>
        		<div class="alert alert-error bg-red">
                	<strong>Ooops!</strong> Failed to delete LME.
            	</div>
        	<?php endif; ?>
			<table class="table table-bordered" id="js-table">
				<thead>
					<tr>
						<th>#</th>
						<th>LME</th>
						<th>Cluster</th>
						<th>County</th>
						<th>Sub County</th>
						<th>Phone Number</th>
						<th>Category</th>
						<?php if((int)$user->user_level !== 2) : ?>
						<th></th>
						<?php endif; ?>
					</tr>
				</thead>
				<tbody>
					<?php foreach($lmes as $lme): ?>
						<tr>
							<td><?php echo $lme['id']; ?></td>
							<td><?php echo $lme['LME_FirstName'] .' ' . $lme['LME_LastName']; ?></td>
							<td><?php echo $lme['Cluster']; ?></td>
							<td><?php echo $lme['County']; ?></td>
							<td><?php echo $lme['SubCounty']; ?></td>
							<td><?php echo $lme['PhoneNumber']; ?></td>
							<td><?php echo $lme['LME_Category']; ?></td>
							<?php if((int)$user->user_level !== 2) : ?>
							<td>
								<div role="group" class="btn-group-sm row m-r-0 m-l-0">
									<a class="btn btn-primary waves-effect pull-left col-xs-6" style="margin-bottom: 0px !important;" href="<?php echo base_url('/lme/edit/'). $lme['id']; ?>">
										<i class="material-icons">edit</i>
									</a>
									<a class="btn btn-danger waves-effect pull-left col-xs-6" style="margin-bottom: 0px !important;" href="<?php echo base_url('/lme/delete/'). $lme['id']; ?>">
										<i class="material-icons">delete</i>
									</a>
								</div>
							</td>
							<?php endif; ?>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<!-- <div>
				<?php //echo $links; ?>
			</div> -->
		</div>
	</div>
</section>
<script type="text/javascript">
	$(function () {
		//Exportable table
	    $('#js-table').DataTable({
	    	pageLength: 20,
	        dom: 'Blfrtip',
	        responsive: true,
	        buttons: [
	            'copy', 'csv', 'excel', 'pdf', 'print'
	        ]
	    });
	});
</script>