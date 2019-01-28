<style type="text/css">
	#js-table {
		width: 1500px;
	}
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
			<h2>PRODUCER DATA</h2>
		</div>
	</div>
	<div class="card">
		<div class="header">
			<div class="row clearfix">
 				<h2 class="col-xs-10"> A list of all producer data <span class="badge bg-red"> <?php echo count($producer_data); ?> </span> </h2>
                <a href="<?php echo base_url('/upload/stove_producers_data'); ?>" class="btn btn-primary waves-effect pull-right col-xs-2">
                    <i class="material-icons">file_upload</i>
                    <span>Upload excel file</span>
                </a>
            </div>
		</div>
		<div class="body" style="overflow: auto;">
			<?php if((int)$success === 1): ?>
				<div class="alert alert-success">
	                <strong>Well done!</strong>Data has been deleted successfully.
	            </div>
        	<?php elseif($success !== null && (int)$success === 0): ?>
        		<div class="alert alert-error bg-red">
                	<strong>Ooops!</strong> Failed to delete data.
            	</div>
        	<?php endif; ?>
			<table class="table table-bordered table-responsive" id="js-table">
				<thead>
					<tr>
					<th>#</th>
    				<th>Period</th>
    				<th>Cluster</th>
    				<th>County</th>
    				<th>SubCounty</th>
    				<th>Ward</th>
    				<th>Producer Type</th>
    				<th>StoveType</th>
    				<th>Group Name</th>
    				<th>Kilns</th>
    				<th>Mould</th>
    				<th>Quantity Green</th>
    				<th>Quantity Fired</th>
    				<th>Quantity Sold</th>
						<?php if((int)$user->user_level !== 2) : ?>
						<th></th>
						<?php endif; ?>
					</tr>
				</thead>
				<tbody>
					<?php foreach($producer_data as $row): ?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['Period']; ?></td>
							<td><?php echo $row['Cluster']; ?></td>
							<td><?php echo $row['County']; ?></td>
							<td><?php echo $row['SubCounty']; ?></td>
							<td><?php echo $row['Ward']; ?></td>
							<td><?php echo $row['ProducerType']; ?></td>
							<td><?php echo $row['StoveType']; ?></td>
							<td><?php echo $row['GroupName']; ?></td>
							<td><?php echo $row['Kilns']; ?></td>
							<td><?php echo $row['Mould']; ?></td>
							<td><?php echo $row['QtyGreen']; ?></td>
							<td><?php echo $row['QtyFired']; ?></td>
							<td><?php echo $row['QtySold']; ?></td>
							<?php if((int)$user->user_level !== 2) : ?>
							<td>
								<div role="group" class="pull-right row m-r-0 m-l-0">
									<a class="btn btn-danger waves-effect pull-left col-xs-6" style="margin-bottom: 0px !important;" href="<?php echo base_url('/stoves/producer_data/delete/'). $row['id']; ?>">
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
	        dom: 'Blfrtip',
	        responsive: true,
	        buttons: [
	            'copy', 'csv', 'excel', 'pdf', 'print'
	        ]
	    });
	});
</script>