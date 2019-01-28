<style type="text/css">
	.results-container {
		max-height: 200px;
		overflow-y: scroll;
	}
</style>
<section class="content">
    <!-- TABS -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    	<!-- Add Product Modal -->
	    <div class="modal fade" id="productsModal" tabindex="-1" role="dialog">
	        <div class="modal-dialog modal-lg" role="document">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <h4 class="modal-title" id="productsModalLabel">
	                    	Add products for <strong class="lme_modal_name"></strong>
	                    </h4>
	                </div>
	                <div class="modal-body">
	                    <div class="row clearfix">
	                    	<form method="post" id="append" action="">
			                    <div class="col-xs-5">
			                    	<div class="form-group">
			                    		<label>Product Name </label>
			                    		<select multiple data-max-options="1" class="form-control show-tick lme-select" id="product_name" name="ProductName" data-live-search="true">
			                            	<?php foreach($products as $product): ?>
			                            		<option value="<?php echo $product['ProductName']; ?>"><?php echo $product['ProductName'];?></option>
			                            	<?php endforeach; ?>
			                        	</select>
			                    	</div>
			                    </div>
			                    <input type="reset" class="reset" style="display: none;">
			                    <div class="col-xs-5">
			                        <label for="first_name">Quantity</label>
			                        <div class="form-group">
			                            <div class="form-line">
			                                <input type="number" id="quantity" name="Quantity" class="form-control" required>
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
		                		<table class="table table-responsive table-bordered" id="productsData">
			            			<thead>
			            				<th>#</th>
			            				<th>Product Name</th>
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
	                    <button type="button" class="btn btn-link waves-effect" id="saveProducts">SAVE CHANGES</button>
	                    <button type="button" class="btn btn-link waves-effect" id="cancelAdd" data-dismiss="modal">CANCEL</button>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- end Add Product Modal -->
	    <!-- Add Distribution Modal -->
	    <div class="modal fade" id="distributionModal" tabindex="-1" role="dialog">
	        <div class="modal-dialog" role="document">
	            <div class="modal-content" style="width: 800px;">
	                <div class="modal-header">
	                    <h4 class="modal-title" id="productsModalLabel">
	                    	Add distributions for <strong class="d_lme_modal_name"></strong>
	                    </h4>
	                </div>
	                <div class="modal-body">
	                    <div class="row clearfix">
	                    	<form method="post" id="d_append" action="">
			                    <div class="col-xs-3">
			                    	<div class="form-group">
			                    		<label>Customer County </label>
			                    		<select multiple data-max-options="1" class="form-control show-tick" id="d_county" name="County" data-live-search="true">
			                            	<?php foreach($counties as $county): ?>
			                            		<option value="<?php echo $county['County']; ?>"><?php echo $county['County'];?></option>
			                            	<?php endforeach; ?>
			                        	</select>
			                    	</div>
			                    </div>
			                    <input type="reset" class="reset" style="display: none;">
			                    <div class="col-xs-4">
			                    	<div class="form-group">
			                    		<label>Customer Sub County </label>
			                    		<select multiple data-max-options="1" class="form-control show-tick" id="d_subcounty" name="SubCounty" data-live-search="true">
			                            	<?php foreach($sub_counties as $county): ?>
			                            		<option value="<?php echo $county['SubCounty']; ?>"><?php echo $county['SubCounty'];?></option>
			                            	<?php endforeach; ?>
			                        	</select>
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
			                    <div class="col-xs-2 m-t-25">
			                    	<button type="submit" class="d_append_product btn btn-sm btn-primary waves-effect">
			                            <i class="material-icons">launch</i>
			                            <span>Add</span>
			                        </button>
			                	</div>
		                	</form>
		                	<div class="col-xs-12 results-container">
		                		<table class="table table-responsive table-bordered" id="d_productsData">
			            			<thead>
			            				<th>#</th>
			            				<th>Customer County</th>
			            				<th>Customer Sub County</th>
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
	                    <button type="button" class="btn btn-link waves-effect" id="saveDistributions">SAVE CHANGES</button>
	                    <button type="button" class="btn btn-link waves-effect" id="cancelDistributions" data-dismiss="modal">CANCEL</button>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- end Add Distribution Modal -->
        <div class="card">
            <div class="header">
                <h2>
                    SALES
                    <small>Add sales and product distribution data for lmes in real time</small>
                </h2>
            </div>
            <div class="body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active"><a href="#home" id="go_home" data-toggle="tab" aria-expanded="false">SALES</a></li>
                    <li role="presentation" class=""><a href="#distro" id="go_to_distro" data-toggle="tab" aria-expanded="false">PRODUCT DISTRIBUTION
                    <span id="total_quantities" class="badge c-white bg-red"></span></a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                    	<div class="row clearfix">
		            		<div class="col-xs-4">
		                        <div class="form-group">
		                    		<label>Book Number</label>
		                    		<select multiple data-max-options="1" class="form-control show-tick" id="bookNumber"  data-live-search="true">
		                            	<?php foreach($books as $row): ?>
		                            		<option data-book-lme-last="<?php echo $row['LME_LastName']; ?>" data-book-lme-first="<?php echo $row['LME_FirstName']; ?>" value="<?php echo $row['bookNumber']; ?>"><?php echo $row['bookNumber'];?></option>
		                            	<?php endforeach; ?>
		                        	</select>
		                    	</div>
		                    </div>
		              	</div>
                       <form method="post" id="addSale">
			            	<div class="row clearfix">
			            		<div class="col-xs-4">
			                        <label for="period">Period</label>
			                        <div class="form-group">
			                            <div class="form-line">
			                                <input type="text" id="period" name="Period" class="form-control datepicker" required>
			                            </div>
			                        </div>
			                    </div>
			                    <input type="hidden" name="added_by" value="<?php echo $user->user_id; ?>">
			                    <div class="col-xs-4">
			                    	<div class="form-group">
			                    		<label>Cluster</label>
			                    		<select multiple data-max-options="1" class="form-control show-tick" id="cluster" name="Cluster" data-live-search="true">
			                            	<?php foreach($clusters as $cluster): ?>
			                            		<option value="<?php echo $cluster['Cluster']; ?>"><?php echo $cluster['Cluster'];?></option>
			                            	<?php endforeach; ?>
			                        	</select>
			                    	</div>
			                    </div>

			                    <div class="col-xs-4">
			                    	<div class="form-group">
			                    		<label>County </label>
			                    		<select multiple data-max-options="1" class="form-control show-tick" id="county" name="County" data-live-search="true">
			                            	<?php foreach($counties as $county): ?>
			                            		<option value="<?php echo $county['County']; ?>"><?php echo $county['County'];?></option>
			                            	<?php endforeach; ?>
			                        	</select>
			                    	</div>
			                    </div>
			                    <div class="col-xs-12">
			                    	<div class="row clearfix">
					                    <div class="col-xs-4">
					                        <div class="form-group">
					                    		<label>LME </label>
					                    		<select multiple data-max-options="1" class="form-control show-tick lme-select" id="lme" name="LME" data-live-search="true">
					                            	<?php foreach($lmes as $lme): ?>
					                            		<option
					                            		data-cluster="<?php echo $lme['Cluster']; ?>"
					                            		data-county="<?php echo $lme['County']; ?>"
					                            		data-subcounty="<?php echo $lme['SubCounty']; ?>"
					                            		value="<?php echo $lme['LME_FirstName'] . ',' . $lme['LME_LastName'] . ',' . $lme['id']; ?>"><?php echo $lme['LME_FirstName'] . ' ' . $lme['LME_LastName'];?></option>
					                            	<?php endforeach; ?>
					                        	</select>
					                    	</div>
					                    </div>
					                    <div class="col-xs-4 m-t-20">
					                    	<button type="button" id="add_products" class="btn btn-danger waves-effect">
			                                    <i class="material-icons">warning</i>
			                                    <span>Add Products</span>
			                                </button>
				                    	</div>
			                    	</div>
			                    </div>
			                    <div class="col-xs-12">
			                    	<button type="submit" id="add_sales" class="btn btn-primary waves-effect">
		                                <i class="material-icons">launch</i>
		                                <span>Save Sales</span>
		                            </button>
			                    </div>
			                </div>
			            </form>
			            <div class="row clearfix">
			            	<div class="col-xs-12">
			            		<span class="alert alert-info col-xs-12"> All sales added will be automatically displayed below. </span>
			            		<table class="table table-responsive table-bordered" id="salesData">
			            			<thead>
			            				<th>#</th>
			            				<th>Period</th>
			            				<th>Cluster</th>
			            				<th>County</th>
			            				<th>Coordinator</th>
			            				<th>LME</th>
			            				<th>Product Name</th>
			            				<th>Quantity</th>
			            				<th></th>
			            			</thead>
			            			<tbody>
			            			</tbody>
			            		</table>
			            	</div>
			            </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="distro">
                       <!-- product distribution -->
                       <div role="tabpanel" class="tab-pane fade in active" id="home">
                       <form method="post" id="addDistribution">
			            	<div class="row clearfix">
			            		<div class="col-xs-4">
			                        <label for="period">Period</label>
			                        <div class="form-group">
			                            <div class="form-line">
			                                <input type="text" id="d_period" name="Period" class="form-control datepicker" required>
			                            </div>
			                        </div>
			                    </div>
			                    <input type="hidden" name="added_by" value="<?php echo $user->user_id; ?>">
			                    <div class="col-xs-4">
			                    	<div class="form-group">
			                    		<label>Cluster</label>
			                    		<select multiple data-max-options="1" class="form-control show-tick" id="d_cluster1" name="Cluster" data-live-search="true">
			                            	<?php foreach($clusters as $cluster): ?>
			                            		<option value="<?php echo $cluster['Cluster']; ?>"><?php echo $cluster['Cluster'];?></option>
			                            	<?php endforeach; ?>
			                        	</select>
			                    	</div>
			                    </div>

			                    <div class="col-xs-4">
			                    	<div class="form-group">
			                    		<label>County </label>
			                    		<select multiple data-max-options="1" class="form-control show-tick" id="d_county1" name="County" data-live-search="true">
			                            	<?php foreach($counties as $county): ?>
			                            		<option value="<?php echo $county['County']; ?>"><?php echo $county['County'];?></option>
			                            	<?php endforeach; ?>
			                        	</select>
			                    	</div>
			                    </div>
			                    <div class="col-xs-12">
			                    	<div class="row clearfix">
					                    <div class="col-xs-4">
					                        <div class="form-group">
					                    		<label>LME </label>
					                    		<select multiple data-max-options="1" class="form-control show-tick lme-select" id="d_lme1" name="LME" data-live-search="true">
					                            	<?php foreach($lmes as $lme): ?>
					                            		<option
					                            			data-cluster="<?php echo $lme['Cluster']; ?>"
						                            		data-county="<?php echo $lme['County']; ?>"
						                            		data-subcounty="<?php echo $lme['SubCounty']; ?>"
					                            			value="<?php echo $lme['LME_FirstName'] . ',' . $lme['LME_LastName']; ?>"><?php echo $lme['LME_FirstName'] . ' ' . $lme['LME_LastName'];?></option>
					                            	<?php endforeach; ?>
					                        	</select>
					                    	</div>
					                    </div>
					                    <div class="col-xs-4 m-t-20">
					                    	<button type="button" id="add_distributions" class="btn btn-danger waves-effect">
			                                    <i class="material-icons">warning</i>
			                                    <span>Add Distributions</span>
			                                </button>
				                    	</div>
			                    	</div>
			                    </div>
			                    <div class="col-xs-12">
			                    	<button type="submit" id="post_data" class="btn btn-primary waves-effect">
		                                <i class="material-icons">launch</i>
		                                <span>Post Data</span>
		                            </button>
			                    </div>
			                </div>
			            </form>
			            <div class="row clearfix">
			            	<div class="col-xs-12">
			            		<span class="alert alert-info col-xs-12"> All data posted will be automatically displayed below. Click on any of the fields to edit values. </span>
			            		<table class="table table-responsive table-bordered" id="distributionData">
			            			<thead>
			            				<th>#</th>
			            				<th>Period</th>
			            				<th>Cluster</th>
			            				<th>County</th>
			            				<th>Coordinator</th>
			            				<th>LME</th>
			            				<th>Customer County</th>
			            				<th>Customer Sub-County</th>
			            				<th>Quantity</th>
			            				<th></th>
			            			</thead>
			            			<tbody>
			            			</tbody>
			            		</table>
			            	</div>
			            </div>
                       <!-- end distribution -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END TABS -->
            
</section>

<script src="<?php echo base_url('plugins/editable-table/mindmup-editabletable.js'); ?>"></script>
<script type="text/javascript">
	$(function () {
	    window.productsList = [];

	    window.solar = {
	    	productsList: [],
	    	totalQuantities: 0,
	    	lme_details: {},
	    	distributions: [],
	    	lmes: <?php echo json_encode($lmes); ?>
	    };

	    var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
	 //    $("select").select2({
		//     createSearchChoice:function(term, data) { 
		//         if ($(data).filter(function() { 
		//             return this.text.localeCompare(term)===0; 
		//         }).length===0) 
		//         {return {id:term, text:term};} 
		//     }
		// });
		$("#addSale").on("submit", function (e) {
			e.preventDefault();
			if (productsList.length === 0) {
				swal("No Products!", "Please add products first :(", "error");
			    return;
			}
			$data = $(this).serialize();
			$data += '&sales_data=' + JSON.stringify(productsList);
			$("#add_sales span").addClass("disabled").html("Loading...");
			$.ajax({
				url: "<?php echo base_url('/api/sales/add'); ?>",
		        type: "post",
		        dataType: "json",
		        data: $data,
		        success: function (responses) {
		        	$els = "";
		        	responses.map(function(response) {
		        		solar.lme_details = response;
		        		solar.totalQuantities += parseInt(response.Quantity, 10);
		        		$tr = '<tr>';
			        		$tr += '<td>' + response.id + '</td>';
			        		$tr += '<td data-table-key="Period" data-table-id="' + response.id + '">' + response.Period + '</td>';
			        		$tr += '<td data-table-key="Cluster" data-table-id="' + response.id + '">' + response.Cluster + '</td>';
			        		$tr += '<td data-table-key="Country" data-table-id="' + response.id + '">' + response.County + '</td>';
			        		$tr += '<td data-table-key="Coordinator" data-table-id="' + response.id + '">' + response.Coordinator_FirstName + ' ' + response.Coordinator_LastName + '</td>';
			        		$tr += '<td data-table-key="lme" data-table-id="' + response.id + '">' + response.LME_FirstName + ' ' + response.LME_LastName + '</td>';
			        		$tr += '<td data-table-key="ProductName" data-table-id="' + response.id + '">' + response.ProductName + '</td>';
			        		$tr += '<td data-table-key="Quantity" data-table-id="' + response.id + '">' + response.Quantity + '</td>';
			        		$tr += '<td><button class="btn btn-danger delete btn-circle" data-table-id="' + response.id + '"><i class="material-icons">delete</i></button></td>';
			        	$tr += '</tr>';
			        	$els += $tr;
		        	});
		        	$("#add_sales span").removeClass("disabled").html("Save Sales");
		        	$($els).appendTo('#salesData tbody');
		        	// allow sales to be deleted
		        	addSaleDeleteEvent();
		        	// clear all saved products after they have been added
		       		addSuccess();
		       		// move this data to dstribution table
		       		populateDistributionForm();
		        },
		        error: function (resp) {
		        	showNotification('bg-red', 'Failed to send request! Please contact Admin!');
		        	console.error('Failed to send request');
		        }
			});
			return false;
		});

		$("#addDistribution").on("submit", function (e) {
			e.preventDefault();
			if (solar.distributions.length === 0) {
				swal("No Distributions!", "Please add distributions first :(", "error");
			    return;
			}
			$data = $(this).serialize();
			$lme_csv = $('#d_lme1').val();
			if ($lme_csv && typeof $lme_csv === "object") {
				$lme_csv = $lme_csv.join(",");
			}
			$lme_details = $lme_csv.split(',');
			//
			var lme = solar.lmes.find(function (lme) {
				return lme.LME_FirstName === $lme_details[0];
			});

			$data += ('&Coordinator_FirstName=' + lme.Coordinator_FirstName + '&Coordinator_LastName=' + lme.Coordinator_LastName);
			$data += '&distributions_data=' + JSON.stringify(solar.distributions);
			$("#post_data span").addClass("disabled").html("Loading...");
			$.ajax({
				url: "<?php echo base_url('/api/distributions/add'); ?>",
		        type: "post",
		        dataType: "json",
		        data: $data,
		        success: function (responses) {
		        	$els = "";
		        	var quantities = 0;
		        	responses.map(function(response) {
		        		quantities += parseInt(response.Quantity, 10);
		        		$tr = '<tr>';
			        		$tr += '<td>' + response.id + '</td>';
			        		$tr += '<td data-table-key="Period" data-table-id="' + response.id + '">' + response.Period + '</td>';
			        		$tr += '<td data-table-key="Cluster" data-table-id="' + response.id + '">' + response.Cluster + '</td>';
			        		$tr += '<td data-table-key="Country" data-table-id="' + response.id + '">' + response.County + '</td>';
			        		$tr += '<td data-table-key="Coordinator" data-table-id="' + response.id + '">' + response.Coordinator_FirstName + ' ' + response.Coordinator_LastName + '</td>';
			        		$tr += '<td data-table-key="lme" data-table-id="' + response.id + '">' + response.LME_FirstName + ' ' + response.LME_LastName + '</td>';
			        		$tr += '<td data-table-key="CustomerCounty" data-table-id="' + response.id + '">' + response.CustomerCounty + '</td>';
			        		$tr += '<td data-table-key="CustomerSubCounty" data-table-id="' + response.id + '">' + response.CustomerSubCounty + '</td>';
			        		$tr += '<td data-table-key="Quantity" data-table-id="' + response.id + '">' + response.Quantity + '</td>';
			        		$tr += '<td><button class="btn btn-danger delete btn-circle" data-table-id="' + response.id + '"><i class="material-icons">delete</i></button></td>';
			        	$tr += '</tr>';
			        	$els += $tr;
		        	});

		        	if (quantities !== solar.totalQuantities) {
		        		swal("Warning!", "The total quantities for sales and distributions do not match. Please check again!", "warning");
		        		solar.totalQuantities -= quantities;
		        	} else {
		        		solar.totalQuantities -= quantities;
		        	}
		        	 $("#total_quantities").html(solar.totalQuantities);
		        	$("#post_data span").removeClass("disabled").html("Post Data");
		        	$($els).appendTo('#distributionData tbody');
		        	// make it deletable
		        	addDistributionDeleteEvent();
		        	// clear all saved products after they have been added
		       		addDSuccess();
		        },
		        error: function (resp) {
		        	swal("Error!", "Failed to send request", "error");
		        	console.error('Failed to send request');
		        }
			});
			return false;
		});

		$("#cancelAdd").on("click", function () {
			if (productsList.length > 0) {
				 swal({
			        title: "Are you sure?",
			        text: "This will remove all products you have added so far!",
			        type: "warning",
			        showCancelButton: true,
			        confirmButtonColor: "#DD6B55",
			        confirmButtonText: "Yes, cancel everything!",
			        closeOnConfirm: true
			    }, function (allow) {
			        if(allow) {
			        	productsList = [];
						$('#productsData tbody tr').remove();
						return true;
			        } else {
			        	$("#productsModal").modal("show");
			        	return false;
			        }
			    });
			} else {
				return true;
			}
		});

		$("#cancelDistributions").on("click", function () {
			if (solar.distributions.length > 0) {
				 swal({
			        title: "Are you sure?",
			        text: "This will remove all distributions you have added so far!",
			        type: "warning",
			        showCancelButton: true,
			        confirmButtonColor: "#DD6B55",
			        confirmButtonText: "Yes, cancel everything!",
			        closeOnConfirm: true
			    }, function (allow) {
			        if(allow) {
			        	solar.distributions = [];
						$('#distributionData tbody tr').remove();
						return true;
			        } else {
			        	$("#distributionModal").modal("show");
			        	return false;
			        }
			    });
			} else {
				return true;
			}
		});

		function addSuccess() {
			// clear everything
			productsList = [];
			$('#productsData tbody tr').remove();
			$('#salesData tbody tr').remove();
        	$("#add_products span").html('Add Products');
			$("#add_products .material-icons").html('warning');
			$("#productsModal").modal("hide");
			$("#add_products")
				.removeClass("btn-success")
				.addClass("btn-danger")
				.addClass("animated wobble").one(animationEnd, function() {
		            $(this).removeClass('animated wobble');
		        });
		     showNotification("bg-blue", "Sales added successfully");
		     showNotification("bg-black", "Navigating to distribution tab");
		     $("#total_quantities").html(solar.totalQuantities);
		     setTimeout(function () {
		     	 $('#go_to_distro').tab('show');
		     }, 1000);
		}

		function addDSuccess() {
			solar.distributions = [];
			$('#d_productsData tbody tr').remove();
			$("#add_distributions span").html('Add Distributions');
			$("#add_distributions .material-icons").html('warning');
			$("#add_distributions")
				.removeClass("btn-success")
				.addClass("btn-danger")
				.addClass("animated wobble").one(animationEnd, function() {
		            $(this).removeClass('animated wobble');
		        });
		    showNotification("bg-blue", "Distributions added successfully");
		}

		//
		$("#add_products").on("click", function () {
			$lme_csv = $('[name="LME"]').val();
			if ($lme_csv && typeof $lme_csv === "object") {
				$lme_csv = $lme_csv.join(",");
			} else if(!$lme_csv) {
				swal("No LME Selected!", "Please choose lme before adding products! :(", "error");
				return;
			}
			$lme_details = $lme_csv.split(',');
			$lme_name = $lme_details[0] + ' ' + $lme_details[1];
			$lme_id = $lme_details[2];
			$(".lme_modal_name").html($lme_name);
			$("#productsModal").modal("show");
		});

		$("#add_distributions").on("click", function() {
			$lme_csv = $("#d_lme1").val();
			if ($lme_csv && typeof $lme_csv === "object") {
				$lme_csv = $lme_csv.join(",");
			}
			$lme_details = $lme_csv.split(',');
			$lme_name = $lme_details[0] + ' ' + $lme_details[1];
			$(".d_lme_modal_name").html($lme_name);
			$("#distributionModal").modal("show");
		});

		$("#d_append").on("submit", function () {
			$data = $(this).serializeArray();
			$county = $data.find((c) => c.name === "County");
			if ($county) {
				$county = $county.value;
			} else {
				swal("No County!", "Please select customer county!", "error");
			}
			$sub_county = $data.find((c) => c.name === "SubCounty");
			if ($sub_county) {
				$sub_county = $sub_county.value;
			} else {
				swal("No SubCounty!", "Please select customer sub county!", "error");
			}
			$quantity = $data.find((c) => c.name === "Quantity").value;
			//
			$tr = '<tr>';
				$tr += '<td>' + solar.distributions.length + '</td>';
				$tr += '<td data-table-id="' + solar.distributions.length + '" data-table-key="county">' + $county + '</td>';
				$tr += '<td data-table-id="' + solar.distributions.length + '" data-table-key="sub_county">' + $sub_county + '</td>';
				$tr += '<td data-table-id="' + solar.distributions.length + '" data-table-key="quantity">' + $quantity + '</td>';
				$tr += '<td><button class="btn btn-danger delete" data-table-id="' + solar.distributions.length + '">Delete</button></td>'; 
			$tr += '</tr>';

			solar.distributions.push({
				county: $county,
				sub_county: $sub_county,
				quantity: $quantity,
				id: productsList.length
			});
			//
			$("#d_county").val('default');
			$("#d_county").selectpicker('refresh');

			$("#d_subcounty").val('default');
			$("#d_subcounty").selectpicker('refresh');
			

			$($tr).appendTo('#d_productsData tbody');
			$('#d_productsData').editableTableWidget();
			addDEvents();
			resetInputs();
			return false;
		});

		$("#append").on("submit", function (evt) {
			evt.preventDefault();
			$data = $(this).serializeArray();
			$product_name = $data.find((c) => c.name === "ProductName");
			if ($product_name) {
				$product_name = $product_name.value;
			} else {
				swal("No Product!","Please choose a product first!", "error");
				return false;
			}
			$quantity = $data.find((c) => c.name === "Quantity").value;
			//
			$tr = '<tr>';
				$tr += '<td>' + productsList.length + '</td>';
				$tr += '<td data-table-id="' + productsList.length + '" data-table-key="product_name">' + $product_name + '</td>';
				$tr += '<td data-table-id="' + productsList.length + '" data-table-key="quantity">' + $quantity + '</td>';
				$tr += '<td><button class="btn btn-danger delete" data-table-id="' + productsList.length + '">Delete</button></td>'; 
			$tr += '</tr>';

			productsList.push({
				product_name: $product_name,
				quantity: $quantity,
				id: productsList.length
			});

			$("#product_name").val('default');
			$("#product_name").selectpicker('refresh');

			$($tr).appendTo('#productsData tbody');
			$('#productsData').editableTableWidget();
			resetInputs();
			addEvents();
			return false;
		});

		function addSaleDeleteEvent() {
			$('#salesData td .delete').on('click', function(evt) {
				$id = $(this).attr('data-table-id');
				$.ajax({
					url: "<?php echo base_url('/api/sales/delete'); ?>",
			        type: "post",
			        dataType: "json",
			        data: 'id=' + $id,
			        success: function (responses) {
			        	$(this).closest('tr').fadeOut(1000);
			        	showNotification('bg-blue', 'Sale deleted successfully!');
			        }.bind(this),
			        error: function (resp) {
			        	showNotification('bg-red', 'Failed to send request! Please contact Admin!');
			        	console.error('Failed to send request');
			        }
				});
				return true;
			});
		}

		function addDistributionDeleteEvent() {
			$('#distributionData td .delete').on('click', function(evt) {
				$id = $(this).attr('data-table-id');
				$.ajax({
					url: "<?php echo base_url('/api/distributions/delete'); ?>",
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

		function addEvents () {
			$('#productsData td').on('change', function(evt) {
				$id = $(this).attr('data-table-id');
				$key = $(this).attr('data-table-key');
				$val = $(this).html();
				//
				productsList = productsList.map(function(product) {
					if(product.id === parseInt($id, 10)) {
						if ($key === 'quantity') {
							return {
								product_name: product.product_name,
								id: $id,
								quantity: $val
							};
						}
						else if($key === 'product_name') {
							return {
								product_name: $val,
								id: $id,
								quantity: product.quantity
							};
						}
				    } else {
						return product;
					}
				});
				return true;
			});
			//
			$('#productsData td .delete').on('click', function(evt) {
				$id = $(this).attr('data-table-id');
				productsList = productsList.filter(function(product) {
					return product.id !== parseInt($id, 10);
				});
				$(this).closest('tr').fadeOut(1000);
				return true;
			});
		}
		function addDEvents () {
			$('#d_productsData td').on('change', function(evt) {
				$id = $(this).attr('data-table-id');
				$key = $(this).attr('data-table-key');
				$val = $(this).html();
				//
				solar.distributions = solar.distributions.map(function(product) {
					if(product.id === parseInt($id, 10)) {
						if ($key === 'quantity') {
							return {
								county: product.county,
								sub_county: product.sub_county,
								quantity: $val,
								id: product.id
							};
						}
						else if($key === 'county') {
							return {
								county: $val,
								sub_county: product.sub_county,
								quantity: product.quantity,
								id: product.id
							};
						}
						else if($key === 'sub_county') {
							return {
								county: product.county,
								sub_county: $val,
								quantity: product.quantity,
								id: product.id
							};
						}
				    } else {
						return product;
					}
				});
				return true;
			});
			//
			$('#d_productsData td .delete').on('click', function(evt) {
				$id = $(this).attr('data-table-id');
				solar.distributions = solar.distributions.filter(function(product) {
					return product.id !== parseInt($id, 10);
				});
				$(this).closest('tr').fadeOut(1000);
				return true;
			});
		}
		//
		$("#saveProducts").on("click", function() {
			$("#add_products span").html(
				productsList.length + ' product' + (productsList.length === 1 ? '' : 's')  + ' added'
				);
			$("#add_products .material-icons").html('check');
			$("#productsModal").modal("hide");
			$("#add_products")
				.removeClass("btn-primary")
				.addClass("btn-success")
				.addClass("animated wobble").one(animationEnd, function() {
		            $(this).removeClass('animated wobble');
		        });
		});
		$("#saveDistributions").on("click", function() {
			$("#add_distributions span").html(
				solar.distributions.length + ' distribution' + (solar.distributions.length === 1 ? '' : 's')  + ' added'
				);
			$("#add_distributions .material-icons").html('check');
			$("#distributionModal").modal("hide");
			$("#add_distributions")
				.removeClass("btn-primary")
				.addClass("btn-success")
				.addClass("animated wobble").one(animationEnd, function() {
		            $(this).removeClass('animated wobble');
		        });
		});
		//
		$('#go_to_distro').on('click', function () {
			if (productsList.length < 1) {
				swal("No Products!", "Please add products first before navigating to distribution! :(", "error");
				return false;
			}
			return true;
		});
		//
		$('#go_home').on('click', function () {
			if (solar.totalQuantities > 0) {
				swal("Pending Products!", "Please finish populating product distribution table :(", "error");
				return false;
			}
			$('#distributionData tbody tr').remove();
			$('#d_productsData tbody tr').remove();
			return true;
		});
		//
		function populateDistributionForm () {
			$("#d_period").val(solar.lme_details.Period);
			//
			$('#d_cluster1').val(solar.lme_details.Cluster);
			$('#d_cluster1').selectpicker('refresh');

			$('#d_county1').val(solar.lme_details.County);
			$('#d_county1').selectpicker('refresh');

			$('#d_lme1').val(
				solar.lme_details.LME_FirstName + ',' +
				solar.lme_details.LME_LastName
				);
			$('#d_lme1').selectpicker('refresh');
		}
		// book number
		$('#bookNumber').on('change', function(){
			var selected = $(this).find("option:selected");
		    var lme_first = selected.attr('data-book-lme-first');
		    var lme_last = selected.attr('data-book-lme-last');
		    console.log(lme_first, lme_last);
		    var lme = solar.lmes.find(function(lme) {
		    	return (lme.LME_FirstName === lme_first) && (lme.LME_LastName === lme_last);
		    });
		    //
		    if (lme) {
				$('#cluster').val(lme.Cluster);
				$('#cluster').selectpicker('refresh');

				$('#county').val(lme.County);
				$('#county').selectpicker('refresh');

				$('#lme').val(
					lme.LME_FirstName + ',' +
					lme.LME_LastName + ',' +
					lme.id
					);
				$('#lme').selectpicker('refresh');
		    }
		});
	});
</script>
<script type="text/javascript">
	$(function() {
			solar = window.solar || {};
			if (typeof window.solar.counties === 'undefined') {
				window.solar.counties = <?php echo json_encode($counties); ?>;
			}
			if (typeof window.solar.lmes === 'undefined') {
				window.solar.lmes = <?php echo json_encode($lmes); ?>;
			}
			if (typeof window.solar.sub_counties === 'undefined') {
				window.solar.sub_counties = <?php echo json_encode($sub_counties); ?>;
			}
			if (typeof window.solar.clusters === 'undefined') {
				window.solar.clusters = <?php echo json_encode($clusters); ?>;
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