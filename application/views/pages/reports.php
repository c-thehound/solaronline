<style type="text/css">
    #tableBody, #reportContainer {
        overflow: auto;
        height: 400px;
    }
    #tableBody .table {
        width: 3000px;
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
			<h2>REPORTS</h2>
		</div>
	</div>
    <?php if($portal === 'solar') : ?>
	<div class="card">
        <div class="header">
            <div class="row clearfix">
                <div class="col-xs-4">
                    <h2> Products sales per county report </h2>
                </div>
                <?php echo form_open(current_url()); ?>
               <div class="col-xs-3">
                    <div class="input-group">
                        <span class="input-group-addon">Start Date</span>
                        <div class="form-line">
                            <input type="text" class="form-control datepicker" name="startDate" placeholder="Start Date" value="<?php echo isset($_POST['startDate']) ? $_POST['startDate'] : '' ; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="input-group">
                        <span class="input-group-addon"> End Date</span>
                        <div class="form-line">
                            <input type="text" name="endDate" class="form-control datepicker" placeholder="End Date" value="<?php echo isset($_POST['endDate']) ? $_POST['endDate'] : '' ; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-xs-2">
                    <button type="submit" class="btn btn-primary waves-effect"><i class="material-icons">filter_list</i></button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
		<div class="body" id="tableBody">
			<table id="js-table" class="table table-responsive"
             style="width: <?php echo count($sales_report['counties']) < 10 ? '1200px !important' : '3000px'; ?>"
                >
                <thead>
                    <th>#</th>
                    <th>Product Name</th>
                    <?php foreach($sales_report['counties'] as $county) : ?>
                        <th><?php echo $county; ?></th>
                    <?php endforeach; ?>
                </thead>   
                <tbody>
                <?php $index = 1; ?>
                <?php foreach($sales_report['sales'] as $product_name => $val) : ?>
                    <tr>
                        <td width="10px"><?php echo $index; ?></td>
                        <td><?php echo $product_name; ?></td>
                        <?php foreach($sales_report['counties'] as $county) : ?>
                            <td><?php echo array_key_exists($county, $val) ? $val[$county] : 0; ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <?php $index++; ?>
                <?php endforeach; ?>
                </tbody>      
            </table>
		</div>
	</div>
    <div class="card">
        <div class="header">
            <div class="row clearfix">
                <div class="col-xs-4">
                   <h2> Sales per lme report </h2>
                </div>
                <?php echo form_open(current_url()); ?>
               <div class="col-xs-3">
                    <div class="input-group">
                        <span class="input-group-addon">Start Date</span>
                        <div class="form-line">
                            <input type="text" class="form-control datepicker" name="startDate" placeholder="Start Date" value="<?php echo isset($_POST['startDate']) ? $_POST['startDate'] : '' ; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="input-group">
                        <span class="input-group-addon"> End Date</span>
                        <div class="form-line">
                            <input type="text" name="endDate" class="form-control datepicker" placeholder="End Date" value="<?php echo isset($_POST['endDate']) ? $_POST['endDate'] : '' ; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-xs-2">
                    <button type="submit" class="btn btn-primary waves-effect"><i class="material-icons">filter_list</i></button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="body" id="reportContainer">
            <table class="table table-bordered" id="js-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>LME</th>
                        <th>Cluster</th>
                        <th>County</th>
                        <th>Sub County</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lme_report as $lme): ?>
                        <tr>
                            <td><?php echo $lme['id']; ?></td>
                            <td><?php echo $lme['LME_FirstName'] .' ' . $lme['LME_LastName']; ?></td>
                            <td><?php echo $lme['Cluster']; ?></td>
                            <td><?php echo $lme['County']; ?></td>
                            <td><?php echo $lme['SubCounty']; ?></td>
                            <td><?php echo $lme['total']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php elseif($portal === 'stoves') : ?>
    <div class="card">
        <div class="header">
            <div class="row clearfix">
                <div class="col-xs-4">
                    <h2> Stoves built per county </h2> 
                </div>
                <?php echo form_open(current_url()); ?>
               <div class="col-xs-3">
                    <div class="input-group">
                        <span class="input-group-addon">Start Date</span>
                        <div class="form-line">
                            <input type="text" class="form-control datepicker" name="startDate" placeholder="Start Date" value="<?php echo isset($_POST['startDate']) ? $_POST['startDate'] : '' ; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="input-group">
                        <span class="input-group-addon"> End Date</span>
                        <div class="form-line">
                            <input type="text" name="endDate" class="form-control datepicker" placeholder="End Date" value="<?php echo isset($_POST['endDate']) ? $_POST['endDate'] : '' ; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-xs-2">
                    <button type="submit" class="btn btn-primary waves-effect"><i class="material-icons">filter_list</i></button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="body" id="tableBody">
            <table id="js-table" class="table table-responsive"
             style="width: <?php echo count($stoves_report['counties']) < 10 ? '1200px !important' : '3000px'; ?>"
                >
                <thead>
                    <th>#</th>
                    <th>Stove Type</th>
                    <?php foreach($stoves_report['counties'] as $county) : ?>
                        <th><?php echo $county; ?></th>
                    <?php endforeach; ?>
                </thead>   
                <tbody>
                <?php $index = 1; ?>
                <?php foreach($stoves_report['sales'] as $stove_type => $val) : ?>
                    <tr>
                        <td width="10px"><?php echo $index; ?></td>
                        <td><?php echo $stove_type; ?></td>
                        <?php foreach($stoves_report['counties'] as $county) : ?>
                            <td><?php echo array_key_exists($county, $val) ? $val[$county] : 0; ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <?php $index++; ?>
                <?php endforeach; ?>
                </tbody>      
            </table>
        </div>
    </div>
    <div class="card">
        <div class="header">
            <div class="row clearfix">
                <div class="col-xs-4">
                    <h2> Stoves built per stove builder </h2> 
                </div>
                <?php echo form_open(current_url()); ?>
               <div class="col-xs-3">
                    <div class="input-group">
                        <span class="input-group-addon">Start Date</span>
                        <div class="form-line">
                            <input type="text" class="form-control datepicker" name="startDate" placeholder="Start Date" value="<?php echo isset($_POST['startDate']) ? $_POST['startDate'] : '' ; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="input-group">
                        <span class="input-group-addon"> End Date</span>
                        <div class="form-line">
                            <input type="text" name="endDate" class="form-control datepicker" placeholder="End Date" value="<?php echo isset($_POST['endDate']) ? $_POST['endDate'] : '' ; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-xs-2">
                    <button type="submit" class="btn btn-primary waves-effect"><i class="material-icons">filter_list</i></button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="body" id="tableBody">
            <table id="js-table" class="table table-responsive"
             style="width: <?php echo count($stove_builder_report['stove_types']) < 10 ? '1200px !important' : '3000px'; ?>"
                >
                <thead>
                    <th>#</th>
                    <th>Stove Type</th>
                    <?php foreach($stove_builder_report['stove_types'] as $type) : ?>
                        <th><?php echo $type; ?></th>
                    <?php endforeach; ?>
                </thead>   
                <tbody>
                <?php $index = 1; ?>
                <?php foreach($stove_builder_report['sales'] as $builder => $val) : ?>
                    <tr>
                        <td width="10px"><?php echo $index; ?></td>
                        <td><?php echo $builder; ?></td>
                        <?php foreach($stove_builder_report['stove_types'] as $type) : ?>
                            <td><?php echo array_key_exists($type, $val) ? $val[$type] : 0; ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <?php $index++; ?>
                <?php endforeach; ?>
                </tbody>      
            </table>
        </div>
    </div>
    <?php endif; ?>
</section>
<script type="text/javascript">
    $(function () {
        //Exportable table
        $('.table').DataTable({
            pageLength: 20,
            dom: 'Blfrtip',
            responsive: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>