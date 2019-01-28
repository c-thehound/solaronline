<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>STOVES DATA ENTRY</h2>
		</div>
		<div class="card">
			<div class="header">
				 <div class="row clearfix">
                    <h2 class="col-xs-10">
                        Please enter the details below
                    </h2>
                    <a href="<?php echo base_url('/upload/stove_data'); ?>" class="btn btn-primary waves-effect pull-right col-xs-2">
                        <i class="material-icons">file_upload</i>
                        <span>Upload excel file</span>
                    </a>
                </div>
            </div>
			<div class="body">
				<!-- Add Household Modal -->
			    <div class="modal fade" id="householdsModal" tabindex="-1" role="dialog">
			        <div class="modal-dialog" role="document">
			            <div class="modal-content">
			                <div class="modal-header">
			                    <h4 class="modal-title" id="productsModalLabel">
			                    	Add households for <strong class="builder_modal_name"></strong>
			                    </h4>
			                </div>
			                <div class="modal-body">
			                    <div class="row clearfix">
			                    	<form method="post" id="append" action="">
					                    <div class="col-xs-3">
					                    	<div class="form-group">
					                    		<label> StoveType </label>
					                    		<select multiple data-max-options="1" class="form-control show-tick lme-select" id="product_name" name="StoveType">
					                            	<option value="RSBC">RSBC</option>
					                            	<option value="RIS">RIS</option>
					                            	<option value="JK">JK</option>
					                            	<option value="Jikokoa">Jikokoa</option>
					                            	<option value="Ecozoom">Ecozoom</option>
					                            	<option value="Others">Others</option>
					                        	</select>
					                    	</div>
					                    </div>
					                    <input type="reset" class="reset" style="display: none;">
					                    <div class="col-xs-3">
					                        <label for="first_name">Household</label>
					                        <div class="form-group">
					                            <div class="form-line">
					                                <input type="number" id="quantity" name="Household" class="form-control" required>
					                            </div>
					                        </div>
					                    </div>
					                    <div class="col-xs-3">
					                        <label for="first_name">Quantity</label>
					                        <div class="form-group">
					                            <div class="form-line">
					                                <input type="number" id="quantity" name="Quantity" class="form-control" required>
					                            </div>
					                        </div>
					                    </div>
					                    <div class="col-xs-3 m-t-25">
					                    	<button type="submit" class="append_product btn btn-sm btn-primary waves-effect">
					                            <i class="material-icons">launch</i>
					                            <span>Add</span>
					                        </button>
					                	</div>
				                	</form>
				                	<div class="col-xs-12 results-container">
				                		<table class="table table-responsive table-bordered" id="householdsData">
					            			<thead>
					            				<th>#</th>
					            				<th>StoveType</th>
					            				<th>Household</th>
					            				<th>Quantity</th>
					            				<th></th>
					            			</thead>
					            			<tbody>
					            			</tbody>
				            			</table>
				                	</div>
			                    </div>
			                </div>
			                <div class="modal-footer">
			                    <button type="button" class="btn btn-link waves-effect" id="saveHouseholds">SAVE CHANGES</button>
			                    <button type="button" class="btn btn-link waves-effect" id="cancelAdd" data-dismiss="modal">CANCEL</button>
			                </div>
			            </div>
			        </div>
			    </div>
			    <!-- end Add Household Modal -->
			    <div class="row clearfix">
            		<div class="col-xs-4">
                        <div class="form-group">
                    		<label>Book Number</label>
                    		<select multiple data-max-options="1" class="form-control show-tick" id="sBookNumber"  data-live-search="true">
                    			<option>Please select...</option>
                            	<?php foreach($books as $row): ?>
                            		<option
                            			data-book-stove-builder="<?php echo $row['StoveBuilder']; ?>" value="<?php echo $row['bookNumber']; ?>"><?php echo $row['bookNumber'];?></option>
                            	<?php endforeach; ?>
                        	</select>
                    	</div>
                    </div>
              	</div>
				<form method="post" id="postData">
					<div class="row clearfix">
						<div class="col-md-4">
			                <label for="period">Period</label>
	                        <div class="form-group">
	                            <div class="form-line">
	                                <input type="text" id="period" name="Period" class="form-control datepicker" required>
	                            </div>
	                        </div>
	                    </div>
	                    <input type="hidden" name="added_by" value="<?php echo $user->user_id; ?>">
	                    <div class="col-md-4">
                        	<div class="form-group">
                        		<label>Cluster</label>
                        		<select multiple data-max-options="1" class="form-control show-tick" name="Cluster" id="cluster" data-live-search="true">
                                	<?php foreach($clusters as $cluster): ?>
                                		<option value="<?php echo $cluster['Cluster']; ?>"><?php echo $cluster['Cluster'];?></option>
                                	<?php endforeach; ?>
                            	</select>
                        	</div>
                        </div>
						<div class="col-md-4">
                        	<div class="form-group">
                        		<label>County</label>
                        		<select multiple data-max-options="1" class="form-control show-tick" id="county" name="County" data-live-search="true">
                                	<?php foreach($counties as $county): ?>
                                		<option value="<?php echo $county['County']; ?>"><?php echo $county['County'];?></option>
                                	<?php endforeach; ?>
                            	</select>
                        	</div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-4">
                        	<div class="form-group">
                        		<label>Sub County</label>
                        		<select multiple data-max-options="1" class="form-control show-tick" id="sub_county" name="SubCounty" data-live-search="true">
                                	<?php foreach($sub_counties as $sub_county): ?>
                                		<option value="<?php echo $sub_county['SubCounty']; ?>"><?php echo $sub_county['SubCounty'];?></option>
                                	<?php endforeach; ?>
                            	</select>
                        	</div>
                        </div>
                        <div class="col-md-4">
                        	<div class="form-group">
                        		<label>Ward</label>
                        		<select multiple data-max-options="1" class="form-control show-tick" id="ward" name="Ward" data-live-search="true">
                                	<?php foreach($wards as $ward): ?>
                                		<option value="<?php echo $ward['Ward']; ?>"><?php echo $ward['Ward'];?></option>
                                	<?php endforeach; ?>
                            	</select>
                        	</div>
                        </div>
                        <div class="col-md-4">
	                    	<div class="form-group">
	                    		<label> Monitor </label>
	                    		<select multiple data-max-options="1" class="form-control show-tick lme-select" id="monitor" name="Monitor" data-live-search="true">
	                    			<option value="N/A">N/A</option>
	                            	<?php foreach($monitors as $lme): ?>
	                            		<option
	                            			data-cluster="<?php echo $lme['Cluster']; ?>"
	                            			data-group="<?php echo $lme['SGroup']; ?>"
	                            			data-ward="<?php echo $lme['Ward']; ?>"
		                            		data-county="<?php echo $lme['County']; ?>"
		                            		data-subcounty="<?php echo $lme['SubCounty']; ?>"
	                            			value="<?php echo $lme['StoveBuilder']; ?>">
	                            				<?php echo $lme['StoveBuilder']; ?>
	                            			</option>
	                            	<?php endforeach; ?>
	                        	</select>
	                    	</div>
	                    </div>
	                </div>
	                <div class="row clearfix">
	                    <div class="col-md-4">
                        	<div class="form-group">
                        		<label>Group</label>
                        		<select multiple data-max-options="1" class="form-control show-tick" id="group" name="SGroup" data-live-search="true">
                                	<?php foreach($groups as $row): ?>
                                		<option
                                			data-cluster="<?php echo $row['Cluster']; ?>"
	                            			data-ward="<?php echo $row['Ward']; ?>"
		                            		data-county="<?php echo $row['County']; ?>"
		                            		data-subcounty="<?php echo $row['SubCounty']; ?>"
                                			value="<?php echo $row['SGroup']; ?>"><?php echo $row['SGroup'];?></option>
                                	<?php endforeach; ?>
                            	</select>
                        	</div>
                        </div>
                        <div class="col-md-4">
	                    	<div class="form-group">
	                    		<label> Builder</label>
	                    		<select multiple data-max-options="1" class="form-control show-tick lme-select" id="builder" name="StoveBuilder" data-live-search="true">
	                            	<?php foreach($builders as $lme): ?>
	                            		<option
	                            			data-cluster="<?php echo $lme['Cluster']; ?>"
	                            			data-group="<?php echo $lme['SGroup']; ?>"
	                            			data-ward="<?php echo $lme['Ward']; ?>"
		                            		data-county="<?php echo $lme['County']; ?>"
		                            		data-subcounty="<?php echo $lme['SubCounty']; ?>"
	                            			value="<?php echo $lme['StoveBuilder']; ?>">
	                            				<?php echo $lme['StoveBuilder']; ?>
	                            			</option>
	                            	<?php endforeach; ?>
	                        	</select>
	                    	</div>
	                    </div>
	                    <div class="col-md-4">
                        	<button type="button" class="btn m-t-25 btn-danger waves-effect" id="addHouseholds">
	                        	<i class="material-icons">warning</i>
	                        	<span>Add Households</span>
                        	</button>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                        	<button type="submit" class="btn btn-primary m-t-15 waves-effect" id="saveData">Post Data</button>
                        </div>
					</div>
				<?php echo form_close(); ?>
				<div class="row clearfix">
	            	<div class="col-xs-12">
	            		<span class="alert alert-info col-xs-12"> All data added will be automatically displayed below. </span>
	            		<table class="table table-responsive table-bordered" id="salesData">
	            			<thead>
	            				<th>#</th>
	            				<th>Period</th>
	            				<th>Cluster</th>
	            				<th>County</th>
	            				<th>SubCounty</th>
	            				<th>Ward</th>
	            				<th>StoveBuilder</th>
	            				<th>StoveType</th>
	            				<th>Households</th>
	            				<th>Quantity</th>
	            				<th></th>
	            			</thead>
	            			<tbody>
	            			</tbody>
	            		</table>
	            	</div>
	            </div>
			</div>
		</div>
	</div>
</section>
<script src="<?php echo base_url('plugins/editable-table/mindmup-editabletable.js'); ?>"></script>
<script type="text/javascript">
	$(function() {
			solar = window.solar || {};
			if (typeof window.solar.counties === 'undefined') {
				window.solar.counties = <?php echo json_encode($counties); ?>;
			}
			if (typeof window.solar.sub_counties === 'undefined') {
				window.solar.sub_counties = <?php echo json_encode($sub_counties); ?>;
			}
			if (typeof window.solar.clusters === 'undefined') {
				window.solar.clusters = <?php echo json_encode($clusters); ?>;
			}
			if (typeof window.solar.lmes === 'undefined') {
				window.solar.lmes = [];
			}
			if (typeof window.solar.coordinators === 'undefined') {
				window.solar.coordinators = [];
			}
			if (typeof window.solar.groups === 'undefined') {
				window.solar.groups = <?php echo json_encode($groups); ?>;
			}
			if (typeof window.solar.wards === 'undefined') {
				window.solar.wards = <?php echo json_encode($wards); ?>;
			}
			if (typeof window.solar.monitors === 'undefined') {
				window.solar.monitors = <?php echo json_encode($monitors); ?>;
			}
			if (typeof window.solar.builders === 'undefined') {
				window.solar.builders = <?php echo json_encode($builders); ?>;
			}
	});
</script>
<script type="text/javascript">
	$(function () {
		solar.households = [];
		var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		$("#addHouseholds").on("click", function () {
			$(".builder_modal_name").html($("#builder").val());
			$("#householdsModal").modal("show");
		});
		//
		$("#postData").on("submit", function (e) {
			e.preventDefault();
			if (solar.households.length === 0) {
				swal("No Households!", "Please add households first :(", "error");
			    return;
			}
			$data = $(this).serialize();
			$data += '&households=' + JSON.stringify(solar.households);
			$("#saveData").addClass("disabled").html("Loading...");
			$.ajax({
				url: "<?php echo base_url('/api/stoves/add'); ?>",
		        type: "post",
		        dataType: "json",
		        data: $data,
		        success: function (responses) {
		        	$els = "";
		        	responses.map(function(response, index) {
		        		$tr = '<tr>';
			        		$tr += '<td>' + response.id + '</td>';
			        		$tr += '<td data-table-key="Period" data-table-id="' + response.id + '">' + response.Period + '</td>';
			        		$tr += '<td data-table-key="Cluster" data-table-id="' + response.id + '">' + response.Cluster + '</td>';
			        		$tr += '<td data-table-key="Country" data-table-id="' + response.id + '">' + response.County + '</td>';
			        		$tr += '<td data-table-key="SubCounty" data-table-id="' + response.id + '">' + response.SubCounty + '</td>';
			        		$tr += '<td data-table-key="Ward" data-table-id="' + response.id + '">' + response.Ward + '</td>';
			        		$tr += '<td data-table-key="StoveBuilder" data-table-id="' + response.id + '">' + response.StoveBuilder + '</td>';
			        		$tr += '<td data-table-key="StoveType" data-table-id="' + response.id + '">' + response.StoveType + '</td>';
			        		$tr += '<td data-table-key="Households" data-table-id="' + response.id + '">' + response.Households + '</td>';
			        		$tr += '<td data-table-key="Quantity" data-table-id="' + response.id + '">' + response.Quantity + '</td>';
			        		$tr += '<td><button class="btn btn-danger delete btn-circle" data-table-id="' + response.id + '"><i class="material-icons">delete</i></button></td>';
			        	$tr += '</tr>';
			        	$els += $tr;
		        	});
		        	$("#saveData").removeClass("disabled").html("Post Data");
		        	$($els).appendTo('#salesData tbody');
		        	// allow sales to be deleted
		        	addDeleteEvent();
		        	// clear all saved products after they have been added
		       		addSuccess();
		        },
		        error: function (resp) {
		        	showNotification('bg-red', 'Failed to send request! Please contact Admin!');
		        	console.error('Failed to send request', resp);
		        }
			});
			return false;
		});

		function addSuccess() {
			// clear everything
			solar.households = [];
			$('#householdsData tbody tr').remove();
        	$("#addHouseholds span").html('Add Products');
			$("#addHouseholds .material-icons").html('warning');
			$("#addHouseholds")
				.removeClass("btn-success")
				.addClass("btn-danger")
				.addClass("animated wobble").one(animationEnd, function() {
		            $(this).removeClass('animated wobble');
		        });
		     showNotification("bg-blue", "Record added successfully");
		}

		function addDeleteEvent() {
			$('#salesData td .delete').on('click', function(evt) {
				$id = $(this).attr('data-table-id');
				$.ajax({
					url: "<?php echo base_url('/api/stoves/delete'); ?>",
			        type: "post",
			        dataType: "json",
			        data: 'id=' + $id,
			        success: function (responses) {
			        	$(this).closest('tr').fadeOut(1000);
			        	showNotification('bg-blue', 'Data deleted successfully!');
			        }.bind(this),
			        error: function (resp) {
			        	showNotification('bg-red', 'Failed to send request! Please contact Admin!');
			        	console.error('Failed to send request');
			        }
				});
				return true;
			});
		}
		//
		$("#append").on("submit", function (e) {
			if (e) {
				e.preventDefault();
				e.stopPropagation();
			}
			$data = $(this).serializeArray();
			$type = $data.find((c) => c.name === "StoveType");
			if ($type) {
				$type = $type.value;
			} else {
				swal("No Type", "Please select a stove type!", "error");
				return false;
			}
			$households = $data.find((c) => c.name === "Household").value;
			$quantity = $data.find((c) => c.name === "Quantity").value;
			//
			$tr = '<tr>';
				$tr += '<td>' + solar.households.length + '</td>';
				$tr += '<td data-table-id="' + solar.households.length + '" data-table-key="stove_type">' + $type + '</td>';
				$tr += '<td data-table-id="' + solar.households.length + '" data-table-key="households">' + $households + '</td>';
				$tr += '<td data-table-id="' + solar.households.length + '" data-table-key="quantity">' + $quantity + '</td>';
				$tr += '<td><button class="btn btn-danger delete" data-table-id="' + solar.households.length + '">Delete</button></td>'; 
			$tr += '</tr>';

			solar.households.push({
				stove_type: $type,
				households: $households,
				quantity: $quantity,
				id: solar.households.length,
			});

			$("#product_name").val('default');
			$("#product_name").selectpicker('refresh');
			//
			$($tr).appendTo('#householdsData tbody');
			$('#householdsData').editableTableWidget();
			addEvents();
			resetInputs();
			return false;
		});
		//
		function addEvents () {
			$('#householdsData td').on('change', function(evt) {
				$id = $(this).attr('data-table-id');
				$key = $(this).attr('data-table-key');
				$val = $(this).html();
				//
				solar.households = solar.households.map(function(h) {
					if(h.id === parseInt($id, 10)) {
						if ($key === 'quantity') {
							return {
								stove_type: h.stove_type,
								households: h.households,
								id: h.id,
								quantity: $val
							};
						}
						else if($key === 'stove_type') {
							return {
								stove_type: $val,
								households: h.households,
								id: h.id,
								quantity: h.quantity
							};
						}
						else if($key === 'households') {
							return {
								stove_type: h.stove_type,
								households: $val,
								id: h.id,
								quantity: h.quantity
							};
						}
				    } else {
						return h;
					}
				});
				return true;
			});
			//
			$('#householdsData td .delete').on('click', function(evt) {
				$id = $(this).attr('data-table-id');
				solar.households = solar.households.filter(function(h) {
					return h.id !== parseInt($id, 10);
				});
				$(this).closest('tr').fadeOut(1000);
				return true;
			});
		}
		//
		$("#saveHouseholds").on("click", function() {
			$("#addHouseholds span").html(
				solar.households.length + ' household' + (solar.households.length === 1 ? '' : 's')  + ' added'
				);
			$("#addHouseholds .material-icons").html('check');
			$("#householdsModal").modal("hide");
			$("#addHouseholds")
				.removeClass("btn-primary")
				.addClass("btn-success")
				.addClass("animated wobble").one(animationEnd, function() {
		            $(this).removeClass('animated wobble');
		        });
		});
		$("#cancelAdd").on("click", function () {
			if (solar.households.length > 0) {
				 swal({
			        title: "Are you sure?",
			        text: "This will remove all households you have added so far!",
			        type: "warning",
			        showCancelButton: true,
			        confirmButtonColor: "#DD6B55",
			        confirmButtonText: "Yes, cancel everything!",
			        closeOnConfirm: true
			    }, function (allow) {
			        if(allow) {
			        	solar.households = [];
						$('#householdsData tbody tr').remove();
						return true;
			        } else {
			        	$("#householdsModal").modal("show");
			        	return false;
			        }
			    });
			} else {
				return true;
			}
		});
		//
		$("#sBookNumber").on("change", function () {
			var selected = $(this).find("option:selected");
			var $builder = selected.attr("data-book-stove-builder");
			var $builder_details = solar.builders.find(function(builder) {
				return builder.StoveBuilder === $builder;
			});
			// cluster
			if ($builder_details) {
				$("#cluster").val($builder_details.Cluster);
				$("#cluster").selectpicker("refresh");

				$("#county").val($builder_details.County);
				$("#county").selectpicker("refresh");

				$("#sub_county").val($builder_details.SubCounty);
				$("#sub_county").selectpicker("refresh");

				$("#ward").val($builder_details.Ward);
				$("#ward").selectpicker("refresh");

				$("#monitor").val($builder_details.Monitor);
				$("#monitor").selectpicker("refresh");

				$("#group").val($builder_details.SGroup);
				$("#group").selectpicker("refresh");

				$("#builder").val($builder_details.StoveBuilder);
				$("#builder").selectpicker("refresh");
			}
		})
	});
</script>