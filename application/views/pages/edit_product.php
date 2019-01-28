<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>EDIT PRODUCT</h2>
		</div>
		<div class="card">
            <div class="body">
            	<?php if((int)$success === 1): ?>
					<div class="alert alert-success">
		                <strong>Well done!</strong> Product has been updated successfully.
		            </div>
	        	<?php elseif($success !== null && (int)$success === 0): ?>
	        		<div class="alert alert-error bg-red">
	                	<strong>Ooops!</strong> Failed to update product.
	            	</div>
	        	<?php endif; ?>
	            <?php echo form_open('product/update_product/' . $product_id);?>
	            	<div class="row clearfix">
	            		<div class="col-md-12">
	                        <label for="first_name">Product Name</label>
	                        <div class="form-group">
	                            <div class="form-line">
	                                <input type="text" id="product_name" name="ProductName" class="form-control" value="<?php echo $product->ProductName; ?>">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-12">
	                    	<div class="form-group">
	                    		<label>Category</label>
	                    		<select multiple data-max-options="1" class="form-control show-tick" id="ProductCategory" name="ProductCategory" data-live-search="true">
	                            	<?php foreach($categories as $category): ?>
	                            		<option
	                            			value="<?php echo $category['ProductCategory']; ?>"
	                            			<?php echo ($category['ProductCategory'] === $product->ProductCategory) ? 'selected' : ''; ?>
	                            			>
	                            			<?php echo $category['ProductCategory'];?>
	                            				
	                            			</option>
	                            	<?php endforeach; ?>
	                        	</select>
	                    	</div>
	                    </div>

	                    <div class="col-md-12">
	                    	<div class="form-group">
	                    		<label>Certification </label>
	                    		<select multiple data-max-options="1" class="form-control show-tick" id="Certification" name="Certification" data-live-search="true">
	                            	<?php foreach($certifications as $certification): ?>
	                            		<option
	                            			value="<?php echo $certification['Certification']; ?>"
	                            			<?php echo ($certification['Certification'] === $product->Certification) ? 'selected' : ''; ?>
	                            			><?php echo $certification['Certification'];?></option>
	                            	<?php endforeach; ?>
	                        	</select>
	                    	</div>
	                    </div>

	                    <div class="col-md-12">
	                    	<div class="form-group">
	                    		<label>Certification Status </label>
	                    		<select multiple data-max-options="1" class="form-control show-tick" id="cert_status" name="Certification_Status" data-live-search="true">
	                            	<?php foreach($certification_status as $status): ?>
	                            		<option
	                            			value="<?php echo $status['Status']; ?>"
	                            			<?php echo ($status['Status'] === $product->Certification_Status) ? 'selected' : ''; ?>
	                            			><?php echo $status['Status'];?></option>
	                            	<?php endforeach; ?>
	                        	</select>
	                    	</div>
	                    </div>

	                    <div class="col-md-12">
	                    	<div class="form-group">
	                    		<label> PAYG </label>
	                    		<select multiple data-max-options="1" class="form-control show-tick" id="payg" name="PAYG">
	                            	<option
	                            		value="Y"
	                            		<?php echo ('Y' === $product->PAYG) ? 'selected' : ''; ?>
	                            		> Yes </option>
	                            	<option
	                            		value="N"
	                            		<?php echo ('N' === $product->PAYG) ? 'selected' : ''; ?>
	                            		> No </option>
	                        	</select>
	                    	</div>
	                    </div>

	                    <div class="col-md-12">
	                        <label for="first_name">RRP</label>
	                        <div class="form-group">
	                            <div class="form-line">
	                                <input type="number" id="rrp" name="rrp" class="form-control" value="<?php echo $product->RRP; ?>">
	                            </div>
	                        </div>
	                    </div>
	                    <input type="hidden" name="added_by" value="<?php echo $user->user_id; ?>">
	                    <div class="col-md-12">
	                    	<button type="submit" class="btn btn-primary m-t-15 waves-effect">Update Product</button>
	                    </div>
	                </div>
	            </form>
	        </div>
        </div>
	</div>
</section>