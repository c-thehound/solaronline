<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>USERS</h2>
		</div>
	</div>
	<div class="card">
		<div class="header">
			<h2> A list of all users </h2>
		</div>
		<div class="body table-responsive">
			<?php if((int)$success === 1): ?>
				<div class="alert alert-success">
	                <strong>Well done!</strong> User has been deleted successfully.
	            </div>
        	<?php elseif($success !== null && (int)$success === 0): ?>
        		<div class="alert alert-error bg-red">
                	<strong>Ooops!</strong> Failed to delete User.
            	</div>
        	<?php endif; ?>
			<table class="table table-bordered" id="js-table">
				<thead>
					<tr>
						<th>#</th>
						<th>Username</th>
						<th>Full name</th>
						<th>Cluster</th>
						<th>County</th>
						<th>Sub County</th>
						<th>Phone Number</th>
						<th>Level</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($users as $user): ?>
						<tr>
							<td><?php echo $user['user_id']; ?></td>
							<td><?php echo $user['username']; ?></td>
							<td><?php echo $user['user_firstname'] . ' ' . $user['user_lastname']; ?></td>
							<td><?php echo $user['Cluster']; ?></td>
							<td><?php echo $user['County']; ?></td>
							<td><?php echo $user['SubCounty']; ?></td>
							<td><?php echo $user['user_phone']; ?></td>
							<td><?php echo $levels[$user['user_level']]; ?></td>
							<td>
								<div role="group" class="btn-group-sm row m-r-0 m-l-0">
									<a class="btn btn-primary waves-effect pull-left col-xs-6" style="margin-bottom: 0px !important;" href="<?php echo base_url('/user/edit/'). $user['user_id']; ?>">
										<i class="material-icons">edit</i>
									</a>
									<a class="btn btn-danger waves-effect pull-left col-xs-6" style="margin-bottom: 0px !important;" href="<?php echo base_url('/user/delete/'). $user['user_id']; ?>">
										<i class="material-icons">delete</i>
									</a>
								</div>
							</td>
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