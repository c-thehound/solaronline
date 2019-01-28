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
			<h2>SALES</h2>
		</div>
	</div>
	<div class="card">
		<div class="header">
			<div class="row clearfix">
                <h2 class="col-xs-10">
                    A list of sales
                </h2>
                <a href="<?php echo base_url('/upload/sales'); ?>" class="btn btn-primary waves-effect pull-right col-xs-2">
                    <i class="material-icons">file_upload</i>
                    <span>Upload excel file</span>
                </a>
            </div>
		</div>
		<div class="body table-responsive">
			<?php if((int)$success === 1): ?>
				<div class="alert alert-success">
	                <strong>Well done!</strong>Sale has been deleted successfully.
	            </div>
        	<?php elseif($success !== null && (int)$success === 0): ?>
        		<div class="alert alert-error bg-red">
                	<strong>Ooops!</strong> Failed to delete Sale.
            	</div>
        	<?php endif; ?>
			<table class="table table-bordered" id="js-table">
				<thead>
					<tr>
						<th>#</th>
						<th>Period</th>
						<th>Cluster</th>
						<th>County</th>
						<th>LME</th>
						<th>Product</th>
						<th>Quantity</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($sales as $row): ?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td>
								<?php
									$date = date_create($row['Period']);
									$formatted = date_format($date,"d-M-y");
									echo $formatted;
								?>		
							</td>
							<td><?php echo $row['Cluster']; ?></td>
							<td><?php echo $row['County']; ?></td>
							<td><?php echo $row['LME_FirstName'] . ' ' . $row['LME_LastName']; ?></td>
							<td><?php echo $row['ProductName']; ?></td>
							<td><?php echo $row['Quantity']; ?></td>
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