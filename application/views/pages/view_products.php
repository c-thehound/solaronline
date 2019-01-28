<style type="text/css">

</style>
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>PRODUCTS</h2>
		</div>
	</div>
	<div class="card">
		<div class="header">
			<div class="row clearfix">
                <h2 class="col-xs-10">
                    A list of products
                </h2>
                <a href="<?php echo base_url('/upload/products'); ?>" class="btn btn-primary waves-effect pull-right col-xs-2">
                    <i class="material-icons">file_upload</i>
                    <span>Upload excel file</span>
                </a>
            </div>
		</div>
		<div class="body table-responsive">
			<?php if((int)$success === 1): ?>
				<div class="alert alert-success">
	                <strong>Well done!</strong> Product has been deleted successfully.
	            </div>
        	<?php elseif($success !== null && (int)$success === 0): ?>
        		<div class="alert alert-error bg-red">
                	<strong>Ooops!</strong> Failed to delete product.
            	</div>
        	<?php endif; ?>
			<table class="table table-bordered" id="js-table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Category</th>
						<th>RRP</th>
						<th>PAYG</th>
						<!-- <th>Certification</th>
						<th>Certification Status</th> -->
						<?php if((int)$user->user_level !== 2) : ?>
						<th></th>
						<?php endif; ?>
					</tr>
				</thead>
				<tbody>
					<?php foreach($products as $row): ?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['ProductName']; ?></td>
							<td><?php echo $row['ProductCategory']; ?></td>
							<td><?php echo $row['RRP']; ?></td>
							<td><?php echo $row['PAYG']; ?></td>
							<!-- <td><?php //echo $row['Certification']; ?></td> -->
							<!-- <td><?php //echo $row['Certification_Status']; ?></td> -->
							<?php if((int)$user->user_level !== 2) : ?>
							<td>
								<div role="group" class="btn-group-sm row m-r-0 m-l-0">
									<a class="btn btn-primary waves-effect pull-left col-xs-6" style="margin-bottom: 0px !important;" href="<?php echo base_url('/product/edit/'). $row['id']; ?>">
										<i class="material-icons">edit</i>
									</a>
									<a class="btn btn-danger waves-effect pull-left col-xs-6" style="margin-bottom: 0px !important;" href="<?php echo base_url('/product/delete/'). $row['id']; ?>">
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