<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>ADD PRODUCT</h2>
		</div>
		<div class="card">
        	<div class="header">
                <div class="row clearfix">
                    <h2 class="col-xs-10">
	                    Please enter the details below
	                </h2>
                    <a href="<?php echo base_url('/upload/products'); ?>" class="btn btn-primary waves-effect pull-right col-xs-2">
                        <i class="material-icons">file_upload</i>
                        <span>Upload excel file</span>
                    </a>
                </div>
            </div>
            <div class="body">
            	<?php if((int)$success === 1): ?>
					<div class="alert alert-success">
		                <strong>Well done!</strong> Product has been added successfully.
		            </div>
	        	<?php elseif($success !== null && (int)$success === 0): ?>
	        		<div class="alert alert-error bg-red">
	                	<strong>Ooops!</strong> Failed to add Product.
	            	</div>
	        	<?php endif; ?>
	            <?php echo form_open('product/add');?>
	            	<div class="row clearfix">
	            		<div class="col-md-12">
	                        <label for="first_name">Product Name</label>
	                        <div class="form-group">
	                            <div class="form-line">
	                                <input type="text" id="product_name" name="ProductName" class="form-control">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-12">
	                    	<div class="form-group">
	                    		<label>Category</label>
	                    		<select multiple data-max-options="1" class="form-control show-tick" id="ProductCategory" name="ProductCategory" data-live-search="true">
	                            	<?php foreach($categories as $category): ?>
	                            		<option value="<?php echo $category['ProductCategory']; ?>"><?php echo $category['ProductCategory'];?></option>
	                            	<?php endforeach; ?>
	                        	</select multiple data-max-options="1">
	                    	</div>
	                    </div>

	                    <div class="col-md-12">
	                    	<div class="form-group">
	                    		<label>Certification </label>
	                    		<select multiple data-max-options="1" class="form-control show-tick" id="Certification" name="Certification" data-live-search="true">
	                            	<?php foreach($certifications as $certification): ?>
	                            		<option value="<?php echo $certification['Certification']; ?>"><?php echo $certification['Certification'];?></option>
	                            	<?php endforeach; ?>
	                        	</select multiple data-max-options="1">
	                    	</div>
	                    </div>

	                    <div class="col-md-12">
	                    	<div class="form-group">
	                    		<label>Certification Status </label>
	                    		<select multiple data-max-options="1" class="form-control show-tick" id="cert_status" name="Certification_Status" data-live-search="true">
	                            	<?php foreach($certification_status as $status): ?>
	                            		<option value="<?php echo $status['Status']; ?>"><?php echo $status['Status'];?></option>
	                            	<?php endforeach; ?>
	                        	</select multiple data-max-options="1">
	                    	</div>
	                    </div>

	                      <div class="col-md-12">
	                    	<div class="form-group">
	                    		<label> PAYG </label>
	                    		<select multiple data-max-options="1" class="form-control show-tick" id="payg" name="PAYG">
	                            	<option value="Y"> Yes </option>
	                            	<option value="N"> No </option>
	                        	</select multiple data-max-options="1">
	                    	</div>
	                    </div>

	                    <div class="col-md-12">
	                        <label for="first_name">(Real Retail Price (RRP) EUR</label>
	                        <div class="form-group">
	                            <div class="form-line">
	                                <input type="number" id="rrp" name="rrp" class="form-control">
	                            </div>
	                        </div>
	                    </div>
	                    <input type="hidden" name="added_by" value="<?php echo $user->user_id; ?>">
	                    <div class="col-md-12">
	                    	<button type="submit" class="btn btn-primary m-t-15 waves-effect">Add Product</button>
	                    </div>
	                </div>
	            </form>
	        </div>
        </div>
	</div>
</section>