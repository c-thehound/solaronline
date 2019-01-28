<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>COORDINATOR</h2>
		</div>
	</div>
	<div class="card">
		<div class="header">
			<div class="row clearfix">
                <h2 class="col-xs-10">
                    A list of coordinators
                </h2>
                <a href="<?php echo base_url('/upload/coordinators'); ?>" class="btn btn-primary waves-effect pull-right col-xs-2">
                    <i class="material-icons">file_upload</i>
                    <span>Upload excel file</span>
                </a>
            </div>
		</div>
		<div class="body table-responsive">
			<?php if((int)$success === 1): ?>
				<div class="alert alert-success">
	                <strong>Well done!</strong>Coordinator has been deleted successfully.
	            </div>
        	<?php elseif($success !== null && (int)$success === 0): ?>
        		<div class="alert alert-error bg-red">
                	<strong>Ooops!</strong> Failed to delete Coordinator.
            	</div>
        	<?php endif; ?>
			<table class="table table-bordered" id="js-table">
				<thead>
					<tr>
						<th>#</th>
						<th>Coordinator</th>
						<th>Cluster</th>
						<th>County</th>
						<th>Sub County</th>
						<th>Phone Number</th>
						<?php if((int)$user->user_level !== 2) : ?>
						<th></th>
						<?php endif; ?>
					</tr>
				</thead>
				<tbody>
					<?php foreach($coordinators as $row): ?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['Coordinator_FirstName'] . ' ' . $row['Coordinator_LastName']; ?></td>
							<td><?php echo $row['Cluster']; ?></td>
							<td><?php echo $row['County']; ?></td>
							
							<td><?php echo $row['SubCounty']; ?></td>
							<td><?php echo $row['PhoneNumber']; ?></td>
							<?php if((int)$user->user_level !== 2) : ?>
							<td>
								<div role="group" class="pull-right row m-r-0 m-l-0">
									<a class="btn btn-primary waves-effect pull-left col-xs-6" style="margin-bottom: 0px !important;" href="<?php echo base_url('/coordinator/edit/'). $row['id']; ?>">
										<i class="material-icons">edit</i>
									</a>
									<a class="btn btn-danger waves-effect pull-left col-xs-6" style="margin-bottom: 0px !important;" href="<?php echo base_url('/coordinator/delete/'). $row['id']; ?>">
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
	        dom: 'Bfrtip',
	        responsive: true,
	        buttons: [
	            'copy', 'csv', 'excel', 'pdf', 'print'
	        ]
	    });
	});
</script>