<style type="text/css">
	#js-table {
		width: 1500px;
	}
</style>
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>BUILDERS</h2>
		</div>
	</div>
	<div class="card">
		<div class="header">
			 <div class="row clearfix">
               <h2 class="col-xs-10"> A list of all stove builders <span class="badge bg-red"> <?php echo count($builders); ?> </span> </h2>
                <a href="<?php echo base_url('/upload/stove_builders'); ?>" class="btn btn-primary waves-effect pull-right col-xs-2">
                    <i class="material-icons">file_upload</i>
                    <span>Upload excel file</span>
                </a>
            </div>
		</div>
		<div class="body" style="overflow: auto;">
			<?php if((int)$success === 1): ?>
				<div class="alert alert-success">
	                <strong>Well done!</strong>Builder has been deleted successfully.
	            </div>
        	<?php elseif($success !== null && (int)$success === 0): ?>
        		<div class="alert alert-error bg-red">
                	<strong>Ooops!</strong> Failed to delete builder.
            	</div>
        	<?php endif; ?>
			<table class="table table-bordered table-responsive" id="js-table">
				<thead>
					<tr>
						<th>#</th>
						<th>Cluster</th>
						<th>County</th>
						<th>Sub County</th>
						<th>Ward</th>
						<th>Group</th>
						<th>Coordinator</th>
						<th>Monitor</th>
						<th>Stove Builder</th>
						<th>Gender</th>
						<th>Phone Number</th>
						<?php if((int)$user->user_level !== 2) : ?>
						<th></th>
						<?php endif; ?>
					</tr>
				</thead>
				<tbody>
					<?php foreach($builders as $row): ?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['Cluster']; ?></td>
							<td><?php echo $row['County']; ?></td>
							<td><?php echo $row['SubCounty']; ?></td>
							<td><?php echo $row['Ward']; ?></td>
							<td><?php echo $row['SGroup']; ?></td>
							<td><?php echo $row['Coordinator']; ?></td>
							<td><?php echo $row['Monitor']; ?></td>
							<td><?php echo $row['StoveBuilder']; ?></td>
							<td><?php echo $row['Gender']; ?></td>
							<td><?php echo $row['PhoneNumber']; ?></td>
							<?php if((int)$user->user_level !== 2) : ?>
							<td>
								<div role="group" class="pull-right row m-r-0 m-l-0">
									<a class="btn btn-primary waves-effect pull-left col-xs-6" style="margin-bottom: 0px !important;" href="<?php echo base_url('/stoves/builders/edit/'). $row['id']; ?>">
										<i class="material-icons">edit</i>
									</a>
									<a class="btn btn-danger waves-effect pull-left col-xs-6" style="margin-bottom: 0px !important;" href="<?php echo base_url('/stoves/builders/delete/'). $row['id']; ?>">
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