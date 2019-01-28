<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>EDIT USER</h2>
		</div>
	</div>
	<div class="card">
		<div class="body">
			<div class="row clearfix">
				<div class="col-xs-6">
					<?php if((int)$success === 1): ?>
						<div class="alert alert-success">
			                <strong>Well done!</strong> User has been updated successfully!
			            </div>
		        	<?php elseif($success !== null && (int)$success === 0): ?>
		        		<div class="alert alert-error bg-red">
		                	<strong>Ooops!</strong> Failed to update user.
		            	</div>
		        	<?php endif; ?>
						<?php echo form_open('user/update/' . $edit_user->user_id);?>
		                <div class="input-group">
		                    <span class="input-group-addon">
		                        <i class="material-icons">person</i>
		                    </span>
		                    <div class="form-line">
		                        <input type="text" class="form-control" name="user_firstname" placeholder="First Name" value="<?php echo $edit_user->user_firstname;?>" required autofocus>
		                    </div>
		                </div>
		                <div class="input-group">
		                    <span class="input-group-addon">
		                        <i class="material-icons">person</i>
		                    </span>
		                    <div class="form-line">
		                        <input type="text" class="form-control" name="user_lastname" placeholder="Last Name" value="<?php echo $edit_user->user_lastname;?>" required autofocus>
		                    </div>
		                </div>
		                <div class="input-group">
		                    <span class="input-group-addon">
		                        <i class="material-icons">person</i>
		                    </span>
		                    <div class="form-line">
		                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $edit_user->username;?>" required autofocus>
		                    </div>
		                </div>
		                <div class="input-group">
		                    <span class="input-group-addon">
		                        <i class="material-icons">phone</i>
		                    </span>
		                    <div class="form-line">
		                       <input type="tel" pattern="[0-9]{9}" id="phone_number" name="user_phone" class="form-control" value="<?php echo $edit_user->user_phone;?>" placeholder="Phone Number" required>
		                    </div>
		                </div>
		                <div class="row">
		                    <div class="col-xs-1 p-l-0 p-r-0">
		                        <i class="material-icons m-l-10 m-t-25">language</i>
		                    </div>
		                    <div class="col-xs-11">
		                        <label>County </label>
		                        <select multiple data-max-options="1" class="form-control show-tick county-select" id="county" name="County" data-live-search="true">
		                            <?php foreach($counties as $county): ?>
		                                <option value="<?php echo $county['County']; ?>"><?php echo $county['County'];?></option>
		                            <?php endforeach; ?>
		                        </select>
		                    </div>
		                </div>
		                <div class="row">
		                    <div class="col-xs-1 p-l-0 p-r-0">
		                        <i class="material-icons m-l-10 m-t-25">language</i>
		                    </div>
		                    <div class="col-xs-11">
		                        <label>Sub County</label>
		                        <select multiple data-max-options="1" class="form-control show-tick sub-county-select" id="sub_county" name="SubCounty" data-live-search="true">
		                            <?php foreach($sub_counties as $sub_county): ?>
		                                <option value="<?php echo $sub_county['SubCounty']; ?>"><?php echo $sub_county['SubCounty'];?></option>
		                            <?php endforeach; ?>
		                        </select>
		                    </div>
		                </div>
		                <div class="row">
		                    <div class="col-xs-1 p-l-0 p-r-0">
		                        <i class="material-icons m-l-10 m-t-25">language</i>
		                    </div>
		                    <div class="col-xs-11">
		                        <label>Cluster</label>
		                        <select multiple data-max-options="1" class="form-control show-tick cluster-select" id="cluster" name="Cluster" data-live-search="true">
		                            <?php foreach($clusters as $cluster): ?>
		                                <option value="<?php echo $cluster['Cluster']; ?>"><?php echo $cluster['Cluster'];?></option>
		                            <?php endforeach; ?>
		                        </select>
		                    </div>
		                </div>
		                <div class="row">
		                    <div class="col-xs-1 p-l-0 p-r-0">
		                        <i class="material-icons m-l-10 m-t-25">language</i>
		                    </div>
		                    <div class="col-xs-11">
		                        <label>Access Level </label>
		                        <select multiple data-max-options="1" class="form-control show-tick" id="county" name="user_level" data-live-search="true">
		                            <option value="0" <?php echo (int)$edit_user->user_level === 0 ? 'selected' : ''; ?>>Data Entry</option>
		                            <option value="1" <?php echo (int)$edit_user->user_level === 1 ? 'selected' : ''; ?>>Admin</option>
		                            <option value="2" <?php echo (int)$edit_user->user_level === 2 ? 'selected' : ''; ?>>View Only</option>
		                        </select>
		                    </div>
		                </div>
		                <input type="hidden" name="added_by" value="<?php echo $user->user_id; ?>">
		                <div class="input-group">
		                    <span class="input-group-addon">
		                        <i class="material-icons">email</i>
		                    </span>
		                    <div class="form-line">
		                        <input type="email" class="form-control" name="user_email" placeholder="Email Address" value="<?php echo $edit_user->user_email;?>" required>
		                    </div>
		                </div>
		                <button class="btn btn-block btn-lg bg-green waves-effect" type="submit"> UPDATE USER</button>
		            </form>
            	</div>
            </div>
		</div>
	</div>
</section>
<script type="text/javascript">
	$(function () {
		// set county
		$('select.county-select').val('<?php echo $edit_user->County; ?>');
		console.log('<?php echo $edit_user->County; ?>');
		$('select.county-select').selectpicker('refresh');
		// set cluster
		$('select.cluster-select').val('<?php echo $edit_user->Cluster; ?>');
		$('select.cluster-select').selectpicker('refresh');
		// sub county
		$('select.sub-county-select').val('<?php echo $edit_user->SubCounty; ?>');
		$('select.sub-county-select').selectpicker('refresh');
	});
</script>