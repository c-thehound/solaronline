<style type="text/css">
	input[type='file'] {
		position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;
	}
	.upload {
		width: 130px;
	}
</style>
<?php $missing_columns = 0; ?>
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>IMPORT</h2>
		</div>
	</div>
	<div class="card">
		<div class="header">
			<h2> Import <?php echo $type; ?> <?php if(!empty($file)): ?>
				<span class="badge bg-red"><?php echo count(array_filter($file_results['data'])); ?></span> 
			<?php endif; ?></h2>
		</div>
		<div class="body">
			<?php if((int)$success === 1): ?>
				<div class="alert alert-success">
	                <strong>Well done!</strong> We have successfully uploaded the data for <strong><?php echo $type; ?></strong>
	            </div>
        	<?php elseif($success !== null && (int)$success === 0): ?>
        		<div class="alert alert-error bg-red">
                	<strong>Ooops!</strong> Failed to upload data.
            	</div>
        	<?php endif; ?>
			<?php if(empty($file)) : ?>
				<?php echo form_open_multipart(current_url()); ?>
					<div class="row clearfix">
		        		<div class="col-xs-6">
		                    <div style="position:relative;">
						        <a class='btn btn-primary' href='javascript:;'>
						            Choose File...
						            <input type="file" name="files" size="40" onchange='$("#upload-file-info").html($(this).val());'>
						        </a>
						        &nbsp;
						        <span class='label label-info' id="upload-file-info"></span>
							</div>
							<button class="btn btn-block bg-green waves-effect upload m-t-10" type="submit"> UPLOAD</button>
		                </div>
		                <div class="col-xs-6" style="overflow: auto; height: 400px;">
		                	<div class="alert alert-info">
		                		Please only choose an excel or csv file with the fields below.
		                	</div>
		            		<table class="table table-bordered">
		            			<thead>
		            				<th> Required fields </th>
		            			</thead>
		            			<tbody>
		            				<?php foreach($required_headers as $header) : ?>
		            					<tr>
		            						<td><?php echo $header; ?></td>
		            					</tr>
		            				<?php endforeach; ?>
		            			</tbody>
		            		</table>
			            </div>
	                </div>
	            <?php echo form_close(); ?>
        	<?php endif; ?>
        	<?php if(!empty($file)) : ?>
	            <div class="row clearfix">
	            	<div class="col-xs-6">
	        			<?php if(!in_array($file['files']['type'], $supported_types)) : ?>
	        				<div class="text-center text-danger"> Only excel file types are currently supported (xls, xlsx). <a href="<?php echo base_url('/upload/' . $type); ?>" class="alert-link"> Click here to reupload</a> </div>
	        			<?php endif; ?>
	        			<?php if($no_zip) : ?>
	        				<div class="text-center text-danger"> PHP ZIP extension is not loaded!</div>
	        			<?php endif; ?>
	        			<ul class="list-group m-t-10">
	                        <li class="list-group-item">
	                        	<strong>Filename</strong>: <i><?php echo $file['files']['name']; ?></i>
	                        </li>
	                        <li class="list-group-item">
	                        	<strong>Temporary location</strong>: <i><?php echo $file['files']['tmp_name']; ?></i>
	                        </li>
	                        <li class="list-group-item">
	                        	<strong>Size:</strong> <i><?php echo $file['files']['size']; ?> bytes</i>
	                        </li>
	                        <li
	                        	class="list-group-item
	                        	<?php echo !in_array($file['files']['type'], $supported_types) ? 'bg-red' : '';?>"
	                        	>
	                        	<strong>Type:</strong> <i><?php echo $file['files']['type']; ?></i>
	                        </li>
	                    </ul>
	                    <div class="alert alert-info">
	                        <p>
	                        	Please make sure that all the column headers in your document match with the
	                         	column headers on the right.
	                         </p>
	                         <p>All of them should be present and contain data.</p>
	                         <p>The data will be imported to the database exactly as it is below!</p>
	                    </div>
	            	</div>
	            	<div class="col-xs-6" style="overflow: auto; height: 400px;">
	            		<table class="table table-bordered">
	            			<thead>
	            				<th> Field </th>
	            				<th> Present </th>
	            			</thead>
	            			<tbody>
	            				<?php foreach($required_headers as $header) : ?>
	            					<tr>
	            						<td><?php echo $header; ?></td>
	            						<td>
	            							<?php if(in_array($header, $file_results['headers'])) : ?>
	            								<i class="material-icons col-green">check_circle</i>
	            							<?php else : ?>
	            								<?php $missing_columns += 1; ?>
	            								<i class="material-icons col-red">cancel</i>
	            							<?php endif; ?>
	            						</td>
	            					</tr>
	            				<?php endforeach; ?>
	            			</tbody>
	            		</table>
	            	</div>
	            	<div class="alert alert-info col-xs-12">
                        <strong>Heads up!</strong> Please review the data below. If it's what you uploaded, click finish and we'll save to the database.
                    </div>
	            	<div class="col-xs-12" style="overflow: auto; height: 400px;">
	            		<table class="table table-bordered">
	            			<thead>
	            				<?php foreach($file_results['headers'] as $header) : ?>
	            					<th><?php echo $header; ?></th>
	            				<?php endforeach; ?>
	            			</thead>
	            			<tbody>
	            				<?php foreach($file_results['data'] as $key => $val) : ?>
	            					<tr>
	            						<?php foreach($val as $one) : ?>
	            							<td><?php echo $one; ?></td>
	            						<?php endforeach; ?>
	            					</tr>
	            				<?php endforeach; ?>
	            			</tbody>
	            		</table>
	            	</div>
	            </div>
	        <div class="row clearfix">
		        <?php echo form_open('/upload/finish/' . $type); ?>
		        	<textarea name="data" style="display: none;">
		        		<?php echo json_encode($file_results); ?>
		        	</textarea>
		        	<?php if($missing_columns < 1): ?>
		        		<button class="btn btn-block btn-lg bg-red waves-effect upload m-l-15 m-t-10" type="submit"> Finish</button>
		        	<?php else: ?>
		        		<span class="alert alert-danger col-xs-12"> Some columns are missing from the rows. You won't be allowed to upload if not corrected. Check the data again.<a href="<?php echo base_url('/upload/' . $type); ?>" class="alert-link"> Click here to reupload</a></span>
		        	<?php endif; ?>
		        <?php form_close(); ?>
	        </div>
            <?php endif; ?>
		</div>
	</div>
</section>
