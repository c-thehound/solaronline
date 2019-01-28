<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>PRODUCTION CENTRE DATA ENTRY</h2>
		</div>
		<div class="card">
			<div class="header">
				 <div class="row clearfix">
                    <h2 class="col-xs-10">
                        Please enter the details below
                    </h2>
                    <a href="<?php echo base_url('/upload/stove_producers'); ?>" class="btn btn-primary waves-effect pull-right col-xs-2">
                        <i class="material-icons">file_upload</i>
                        <span>Upload excel file</span>
                    </a>
                </div>
            </div>
			<div class="body">
				<!-- Add Household Modal -->
			    <div class="modal fade" id="producersModal" tabindex="-1" role="dialog">
			        <div class="modal-dialog modal-lg" role="document">
			            <div class="modal-content">
			                <div class="modal-header">
			                    <h4 class="modal-title" id="productsModalLabel">
			                    	Add data for <strong class="producer_modal_name"></strong>
			                    </h4>
			                </div>
			                <div class="modal-body">
			                    <div class="row clearfix">
			                    	<form method="post" id="append" action="">
					                    <div class="col-xs-2">
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
					                    <div class="col-xs-2">
					                        <label for="first_name">Quantity Green</label>
					                        <div class="form-group">
					                            <div class="form-line">
					                                <input type="number" id="quantity" name="QtyGreen" class="form-control" required>
					                            </div>
					                        </div>
					                    </div>
					                    <div class="col-xs-2">
					                        <label for="first_name">Quantity Fired</label>
					                        <div class="form-group">
					                            <div class="form-line">
					                                <input type="number" id="quantity" name="QtyFired" class="form-control" required>
					                            </div>
					                        </div>
					                    </div>
					                     <div class="col-xs-2">
					                        <label for="first_name">Quantity Sold</label>
					                        <div class="form-group">
					                            <div class="form-line">
					                                <input type="number" id="quantity" name="QtySold" class="form-control" required>
					                            </div>
					                        </div>
					                    </div>
					                    <div class="col-xs-2 m-t-25">
					                    	<button type="submit" class="append_product btn btn-sm btn-primary waves-effect">
					                            <i class="material-icons">launch</i>
					                            <span>Add</span>
					                        </button>
					                	</div>
				                	</form>
				                	<div class="col-xs-12 results-container">
				                		<table class="table table-responsive table-bordered" id="producersData">
					            			<thead>
					            				<th>#</th>
					            				<th>StoveType</th>
					            				<th>Quantity Green</th>
					            				<th>Quantity Fired</th>
					            				<th>Quantity Sold</th>
					            				<th></th>
					            			</thead>
					            			<tbody>
					            			</tbody>
				            			</table>
				                	</div>
			                    </div>
			                </div>
			                <div class="modal-footer">
			                    <button type="button" class="btn btn-link waves-effect" id="saveproducers">SAVE CHANGES</button>
			                    <button type="button" class="btn btn-link waves-effect" id="cancelAdd" data-dismiss="modal">CANCEL</button>
			                </div>
			            </div>
			        </div>
			    </div>
			    <!-- end Add Household Modal -->
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
	                    		<label> Production Centre </label>
	                    		<select multiple data-max-options="1" class="form-control show-tick lme-select" id="centre" name="GroupName" data-live-search="true">
	                            	<?php foreach($centres as $lme): ?>
	                            		<option
	                            			data-cluster="<?php echo $lme['Cluster']; ?>"
	                            			data-ward="<?php echo $lme['Ward']; ?>"
		                            		data-county="<?php echo $lme['County']; ?>"
		                            		data-subcounty="<?php echo $lme['SubCounty']; ?>"
	                            			value="<?php echo $lme['GroupName']; ?>">
	                            				<?php echo $lme['GroupName']; ?>
	                            			</option>
	                            	<?php endforeach; ?>
	                        	</select>
	                    	</div>
	                    </div>
	                    <div class="col-md-4">
                        	<button type="button" class="btn m-t-25 btn-danger waves-effect" id="addProducers">
	                        	<i class="material-icons">warning</i>
	                        	<span>Add Stove Distributions</span>
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
	            	<div class="col-xs-12" style="overflow: auto;">
	            		<span class="alert alert-info col-xs-12"> All data added will be automatically displayed below. </span>
	            		<table class="table table-responsive table-bordered" id="salesData">
	            			<thead>
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
				window.solar.groups = [];
			}
			if (typeof window.solar.wards === 'undefined') {
				window.solar.wards = [];
			}
			if (typeof window.solar.monitors === 'undefined') {
				window.solar.monitors = [];
			}
			if (typeof window.solar.builders === 'undefined') {
				window.solar.builders = [];
			}
	});
</script>
<script type="text/javascript">
	$(function () {
		solar.producers = [];
		var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		$("#addProducers").on("click", function () {
			$(".producer_modal_name").html($("#centre").val());
			$("#producersModal").modal("show");
		});
		//
		$("#postData").on("submit", function (e) {
			e.preventDefault();
			if (solar.producers.length === 0) {
				swal("No Distributions!", "Please add stove distributions first :(", "error");
			    return;
			}
			$data = $(this).serialize();
			$data += '&producers=' + JSON.stringify(solar.producers);
			$("#saveData").addClass("disabled").html("Loading...");
			$.ajax({
				url: "<?php echo base_url('/api/producers/add'); ?>",
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
			        		$tr += '<td data-table-key="ProducerType" data-table-id="' + response.id + '">' + response.ProducerType + '</td>';
			        			$tr += '<td data-table-key="StoveType" data-table-id="' + response.id + '">' + response.StoveType + '</td>';
			        		$tr += '<td data-table-key="GroupName" data-table-id="' + response.id + '">' + response.GroupName + '</td>';
			        		$tr += '<td data-table-key=Kilns" data-table-id="' + response.id + '">' + response.Kilns + '</td>';
			        		$tr += '<td data-table-key="Mould" data-table-id="' + response.id + '">' + response.Mould + '</td>';
			        		$tr += '<td data-table-key="QtyGreen" data-table-id="' + response.id + '">' + response.QtyGreen + '</td>';
			        		$tr += '<td data-table-key="QtyFired" data-table-id="' + response.id + '">' + response.QtyFired + '</td>';
			        		$tr += '<td data-table-key="QtySold" data-table-id="' + response.id + '">' + response.QtySold + '</td>';
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
			solar.producers = [];
			$('#producersData tbody tr').remove();
        	$("#addProducers span").html('Add Stove Distributions');
			$("#addProducers .material-icons").html('warning');
			$("#addProducers")
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
			$green = $data.find((c) => c.name === "QtyGreen").value;
			$fired = $data.find((c) => c.name === "QtyFired").value;
			$sold = $data.find((c) => c.name === "QtySold").value;
			//
			$tr = '<tr>';
				$tr += '<td>' + solar.producers.length + '</td>';
				$tr += '<td data-table-id="' + solar.producers.length + '" data-table-key="stove_type">' + $type + '</td>';
				$tr += '<td data-table-id="' + solar.producers.length + '" data-table-key="QtyGreen">' + $green + '</td>';
				$tr += '<td data-table-id="' + solar.producers.length + '" data-table-key="QtyFired">' + $fired + '</td>';
				$tr += '<td data-table-id="' + solar.producers.length + '" data-table-key="QtySold">' + $sold + '</td>';
				$tr += '<td><button class="btn btn-danger delete" data-table-id="' + solar.producers.length + '">Delete</button></td>'; 
			$tr += '</tr>';

			solar.producers.push({
				stove_type: $type,
				green: $green,
				fired: $fired,
				sold: $sold,
				id: solar.producers.length,
			});
			//
			$("#product_name").val('default');
			$("#product_name").selectpicker('refresh');

			$($tr).appendTo('#producersData tbody');
			$('#producersData').editableTableWidget();
			addEvents();
			resetInputs();
			return false;
		});
		//
		function addEvents () {
			$('#producersData td').on('change', function(evt) {
				$id = $(this).attr('data-table-id');
				$key = $(this).attr('data-table-key');
				$val = $(this).html();
				//
				solar.producers = solar.producers.map(function(h) {
					if(h.id === parseInt($id, 10)) {
						if ($key === 'QtyGreen') {
							return {
								stove_type: h.type,
								green: $val,
								fired: h.fired,
								sold: h.sold,
								id: h.id,
							};
						}
						if ($key === 'QtyFired') {
							return {
								stove_type: h.type,
								green: h.green,
								fired: $val,
								sold: h.sold,
								id: h.id,
							};
						}
						if ($key === 'QtySold') {
							return {
								stove_type: h.type,
								green: h.green,
								fired: h.fired,
								sold: $val,
								id: h.id,
							};
						}
						else if($key === 'stove_type') {
							return {
								stove_type: $val,
								green: h.green,
								fired: h.fired,
								sold: h.sold,
								id: h.id,
							};
						}
				    } else {
						return h;
					}
				});
				return true;
			});
			//
			$('#producersData td .delete').on('click', function(evt) {
				$id = $(this).attr('data-table-id');
				solar.producers = solar.producers.filter(function(h) {
					return h.id !== parseInt($id, 10);
				});
				$(this).closest('tr').fadeOut(1000);
				return true;
			});
		}
		//
		$("#saveproducers").on("click", function() {
			$("#addProducers span").html(
				solar.producers.length + ' distribution' + (solar.producers.length === 1 ? '' : 's')  + ' added'
				);
			$("#addProducers .material-icons").html('check');
			$("#producersModal").modal("hide");
			$("#addProducers")
				.removeClass("btn-primary")
				.addClass("btn-success")
				.addClass("animated wobble").one(animationEnd, function() {
		            $(this).removeClass('animated wobble');
		        });
		});
		$("#cancelAdd").on("click", function () {
			if (solar.producers.length > 0) {
				 swal({
			        title: "Are you sure?",
			        text: "This will remove all stoves you have added so far!",
			        type: "warning",
			        showCancelButton: true,
			        confirmButtonColor: "#DD6B55",
			        confirmButtonText: "Yes, cancel everything!",
			        closeOnConfirm: true
			    }, function (allow) {
			        if(allow) {
			        	solar.producers = [];
						$('#producersData tbody tr').remove();
						return true;
			        } else {
			        	$("#producersModal").modal("show");
			        	return false;
			        }
			    });
			} else {
				return true;
			}
		});
	});
</script>