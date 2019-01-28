<?php ini_set('display_errors', 0);  ?>
<style type="text/css">
	.warning {
		font-size: 200pt;
	}
	.reports a {
		cursor: pointer;
	}
	.reports a:hover, a:focus {
	    text-decoration: none;
	    cursor: pointer;
	}
</style>
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>DASHBOARD</h2>
		</div>
		<!-- widgets -->
	<?php if($portal === 'solar') : ?>
		<div class="row clearfix">
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	            <div class="info-box bg-pink hover-expand-effect">
	                <div class="icon">
	                    <i class="material-icons">person_add</i>
	                </div>
	                <div class="content">
	                    <div class="text">LMES</div>
	                    <div class="number count-to" data-from="0" data-to="<?php echo $statistics['lmes'] ?>" data-speed="1000" data-fresh-interval="20"><?php echo $statistics['lmes'] ?></div>
	                </div>
	            </div>
	        </div>
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	            <div class="info-box bg-light-green hover-expand-effect">
	                <div class="icon">
	                    <i class="material-icons">label</i>
	                </div>
	                <div class="content">
	                    <div class="text">PRODUCTS</div>
	                    <div class="number count-to" data-from="0" data-to="<?php echo $statistics['products'] ?>" data-speed="1000" data-fresh-interval="20"><?php echo $statistics['products'] ?></div>
	                </div>
	            </div>
	        </div>
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	            <div class="info-box bg-orange hover-expand-effect">
	                <div class="icon">
	                    <i class="material-icons">money</i>
	                </div>
	                <div class="content">
	                    <div class="text">SALES</div>
	                    <div class="number count-to" data-from="0" data-to="<?php echo $total_sales; ?>" data-speed="1000" data-fresh-interval="20">
	                    <?php echo $total_sales; ?></div>
	                </div>
	            </div>
	        </div>
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 reports">
	        	<a href="<?php echo base_url('dashboard/reports'); ?>">
		            <div class="info-box bg-cyan">
		                <div class="icon">
		                    <i class="material-icons">print</i>
		                </div>
		                <div class="content">
		                    <div class="text">REPORTS</div>
		                    <div class="number count-to" data-from="0" data-to="2" data-speed="1000" data-fresh-interval="20">2</div>
		                </div>
		            </div>
	            </a>
	            </div>
	        </div>
	    </div>
	    <!-- end widgets -->
	    <div class="row clearfix">
	    <?php if($is_admin) : ?>
	        <!-- start sales per county map -->
	        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
	        	<div class="card">
	                <div class="header">
	                    <h2 class="text-uppercase">
	                    	PRODUCTS SOLD PER COUNTY
	                    </h2>
	                </div>
	                <div class="body" style="
					    height: 400px;
					    position: relative;
					    width: 100%;
					">
	                    <div id="map" style="width: 100%;overflow: visible;text-align: left;height: 400px;position: absolute;bottom: 10;right: 0;left: 0;top: 0;"></div>
	                </div>
	            </div>
	        </div>
	        <!-- end sales per county map -->
	        <!-- Sales By County -->
	        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
	            <div class="card">
	                <div class="header">
	                    <h2 class="text-uppercase">
	                    	COUNTIES WITH MOST SALES
	                    </h2>
	                </div>
	                <div class="body" style="
	                	height: 400px;
					    position: relative;
					    width: 100%;">
	                    <div id="county_sales" style="width: 100%;overflow: visible;text-align: left;height: 400px;position: absolute;bottom: 10;right: 0;left: 0;top: 0;">
	                    	<?php if(empty($county_sales)) : ?>
	                    		<center>No products sold</center>
	                    		<i class="material-icons warning">report_problem</i>
	                    	<?php endif; ?>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <!-- End Sales By County -->
	    <?php endif; ?>
	        <!-- start sales per product -->
	        <div class="col-xs-12">
	        	<div class="card">
	                <div class="header">
	                    <h2 class="text-uppercase">
	                    	<?php if($is_admin) : ?>
	                    		Sales per product
	                    	<?php else : ?>
	                    		Sales per product in <?php echo $user->County; ?>
	                    	<?php endif; ?>
	                    </h2>
	                </div>
	                <div class="body" style="
	                	height: 500px;
					    position: relative;
					    width: 100%;
	                ">
	                    <div id="line_chart" style="width: 100%;overflow: visible;text-align: left;height: 500px;position: absolute;bottom: 10;right: 0;left: 0;top: 0;"></div>
	                </div>
	            </div>
	        </div>
	        <!-- end sales per product -->
	        <!-- Top 5 lmes -->
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="card">
                    <div class="body bg-pink" style="height: 525px;">
                    	<div class="m-b--35 font-bold">TOP 10 PRODUCTS</div>
                        <div class="sparkline" data-type="line" data-spot-Radius="4" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#fff"
                             data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)" data-spot-Color="rgb(255,255,255)"
                             data-offset="90" data-width="100%" data-height="92px" data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
                             data-fill-Color="rgba(0, 188, 212, 0)">
                            <?php foreach($top_products as $top) : ?>
                            	<?php echo $top['total'] . ','; ?>
                            <?php endforeach; ?>
                        </div>
                        <ul class="dashboard-stat-list">
                        	<?php if(empty($top_products)) : ?>
                        		No data available
                        	<?php endif; ?>
                        	<?php foreach($top_products as $top) : ?>
                            	<li>
	                                <?php echo $top['ProductName']; ?>
	                                <span class="pull-right"><b><?php echo $top['total']; ?></b> <small>sold</small></span>
                            	</li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #END# Top 5 lmes -->
            <!-- Top 5 products -->
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="card">
                    <div class="body bg-blue" style="height: 525px;">
                    	<div class="m-b--35 font-bold">TOP 10 LMES</div>
                        <div class="sparkline" data-type="line" data-spot-Radius="4" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#fff"
                             data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)" data-spot-Color="rgb(255,255,255)"
                             data-offset="90" data-width="100%" data-height="92px" data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
                             data-fill-Color="rgba(0, 188, 212, 0)">
                            <?php foreach($top_lmes as $top) : ?>
                            	<?php echo $top['total'] . ','; ?>
                            <?php endforeach; ?>
                        </div>
                        <ul class="dashboard-stat-list">
                        	<?php if(empty($top_lmes)) : ?>
                        		No data available
                        	<?php endif; ?>
                            <?php foreach($top_lmes as $top) : ?>
                            	<li>
	                                <?php echo $top['LME_FirstName'] . ' ' . $top['LME_LastName']; ?>
	                                <span class="pull-right"><b><?php echo $top['total']; ?></b> <small>sold</small></span>
                            	</li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #END# Top 5 products -->
	    </div>
	<?php elseif($portal === 'stoves'): ?>
		<div class="row clearfix">
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	            <div class="info-box bg-pink hover-expand-effect">
	                <div class="icon">
	                    <i class="material-icons">person_add</i>
	                </div>
	                <div class="content">
	                    <div class="text">BUILDERS</div>
	                    <div class="number count-to" data-from="0" data-to="<?php echo $statistics['stove_builders'] ?>" data-speed="1000" data-fresh-interval="20"><?php echo $statistics['stove_builders'] ?></div>
	                </div>
	            </div>
	        </div>
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	            <div class="info-box bg-light-green hover-expand-effect">
	                <div class="icon">
	                    <i class="material-icons">label</i>
	                </div>
	                <div class="content">
	                    <div class="text">GROUPS</div>
	                    <div class="number count-to" data-from="0" data-to="<?php echo $statistics['stove_groups'] ?>" data-speed="1000" data-fresh-interval="20"><?php echo $statistics['stove_groups'] ?></div>
	                </div>
	            </div>
	        </div>
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	            <div class="info-box bg-cyan hover-expand-effect">
	                <div class="icon">
	                    <i class="material-icons">label</i>
	                </div>
	                <div class="content">
	                    <div class="text">PRODUCERS</div>
	                    <div class="number count-to" data-from="0" data-to="<?php echo $statistics['stove_producers'] ?>" data-speed="1000" data-fresh-interval="20"><?php echo $statistics['stove_producers'] ?></div>
	                </div>
	            </div>
	        </div>
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 reports">
	        	<a href="<?php echo base_url('dashboard/reports'); ?>">
		            <div class="info-box bg-orange">
		                <div class="icon">
		                    <i class="material-icons">print</i>
		                </div>
		                <div class="content">
		                    <div class="text">REPORTS</div>
		                    <div class="number count-to" data-from="0" data-to="2" data-speed="1000" data-fresh-interval="20">2</div>
		                </div>
		            </div>
	            </a>
	            </div>
	        </div>
	        <!-- start sales per product -->
	        <div class="row clearfix">
		        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		        	<div class="card">
		                <div class="header">
		                    <h2 class="text-uppercase">
		                    	<?php if($is_admin) : ?>
		                    		Number of stoves built per stove
		                    	<?php else : ?>
		                    		Number of stoves built per stove in <?php echo $user->County; ?>
		                    	<?php endif; ?>
		                    </h2>
		                </div>
		                <div class="body" style="
		                	height: 500px;
						    position: relative;
						    width: 100%;
		                ">
		                    <div id="line_chart" style="width: 100%;overflow: visible;text-align: left;height: 500px;position: absolute;bottom: 10;right: 0;left: 0;top: 0;"></div>
		                </div>
		            </div>
		        </div>
		        <!-- end sales per product -->
		         <!-- start sales per county map -->
		        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		        	<div class="card">
		                <div class="header">
		                    <h2 class="text-uppercase">
		                    	STOVES BUILT PER COUNTY
		                    </h2>
		                </div>
		                <div class="body" style="
						    height: 500px;
						    position: relative;
						    width: 100%;
						">
		                    <div id="map" style="width: 100%;overflow: visible;text-align: left;height: 400px;position: absolute;bottom: 10;right: 0;left: 0;top: 0;"></div>
		                </div>
		            </div>
		        </div>
		        <!-- end sales per county map -->
	    	</div>
	    	<div class="row clearfix">
		        <!-- Top 5 builders -->
	            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	                <div class="card">
	                    <div class="body bg-pink" style="height: 525px;">
	                    	<div class="m-b--35 font-bold">TOP 10 STOVE BUILDERS</div>
	                        <div class="sparkline" data-type="line" data-spot-Radius="4" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#fff"
	                             data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)" data-spot-Color="rgb(255,255,255)"
	                             data-offset="90" data-width="100%" data-height="92px" data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
	                             data-fill-Color="rgba(0, 188, 212, 0)">
	                            <?php foreach($top_builders as $top) : ?>
	                            	<?php echo $top['total'] . ','; ?>
	                            <?php endforeach; ?>
	                        </div>
	                        <ul class="dashboard-stat-list">
	                        	<?php if(empty($top_products)) : ?>
	                        		No data available
	                        	<?php endif; ?>
	                        	<?php foreach($top_builders as $top) : ?>
	                            	<li>
		                                <?php echo $top['StoveBuilder']; ?>
		                                <span class="pull-right"><b><?php echo $top['total']; ?></b> <small>built</small></span>
	                            	</li>
	                            <?php endforeach; ?>
	                        </ul>
	                    </div>
	                </div>
	            </div>
	            <!-- #END# Top 5 builders -->
	            <!-- Top 5 producers -->
	            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	                <div class="card">
	                    <div class="body bg-blue" style="height: 525px;">
	                    	<div class="m-b--35 font-bold">TOP 10 STOVE PRODUCERS</div>
	                        <div class="sparkline" data-type="line" data-spot-Radius="4" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#fff"
	                             data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)" data-spot-Color="rgb(255,255,255)"
	                             data-offset="90" data-width="100%" data-height="92px" data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
	                             data-fill-Color="rgba(0, 188, 212, 0)">
	                            <?php foreach($top_producers as $top) : ?>
	                            	<?php echo $top['total'] . ','; ?>
	                            <?php endforeach; ?>
	                        </div>
	                        <ul class="dashboard-stat-list">
	                        	<?php if(empty($top_products)) : ?>
	                        		No data available
	                        	<?php endif; ?>
	                        	<?php foreach($top_producers as $top) : ?>
	                            	<li>
		                                <?php echo $top['GroupName']; ?>
		                                <span class="pull-right"><b><?php echo $top['total']; ?></b> <small>sold</small></span>
	                            	</li>
	                            <?php endforeach; ?>
	                        </ul>
	                    </div>
	                </div>
	            </div>
	            <!-- #END# Top 5 producers -->
        	</div>
	    </div>
	<?php endif; ?>
	</div>
</section>
<script type="text/javascript">
	$(function () {
		$('.count-to').countTo({
			formatter: function (value, options) {
				value = value.toFixed(options.decimals);
				value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
				return value;
			}
		});
		var data = <?php echo json_encode($county_sales); ?>;
		var colors  = [];
		//
		function getRandomColor() {
		  var letters = '0123456789ABCDEF';
		  var color = '#';
		  for (var i = 0; i < 6; i++) {
		    color += letters[Math.floor(Math.random() * 16)];
		  }
		  return color;
		}

		for(i = 0; i < data.length; i++) {
    		colors.push(getRandomColor());
    	}
	    //
	     $(".sparkline").each(function () {
	        var $this = $(this);
	        $this.sparkline('html', $this.data());
	    });
	});
</script>
<!-- amCharts javascript code -->
<script type="text/javascript">
	$(function () {
		var data = <?php echo json_encode($portal === 'solar' ? $county_sales_map : $stove_sales_map); ?>;
		var map = AmCharts.makeChart( "map", {
	        "type": "map",
	        "theme": "light",
	        "pathToImages": "<?php echo base_url('plugins/ammap/images/'); ?>",
	        "addClassNames": true,
	        "fontSize": 15,
	        "colorSteps": 10,
	        "dataProvider": {
	            "map": "kenyaHigh",
	            "areas": data
	        },

	        "areasSettings": {
	            "autoZoom": true
	        },

	        "export": {
	            "enabled": true,
	            "forceRemoveImages": true,
	        },

		   //  "legend": {
			  //   "width": "100%",
			  //   "marginRight": 27,
			  //   "marginLeft": 27,
			  //   "equalWidths": false,
			  //   "backgroundAlpha": 0,
			  //   "backgroundColor": "#FFFFFF",
			  //   "borderColor": "#ffffff",
			  //   "borderAlpha": 1,
			  //   "position": "top",
			  //   "fontSize": 9,
			  //   "align": "right",
			  //   "top": 0,
			  //   "horizontalGap": 10,
			  //   "data": data.map(function (item) {
			  //   	return {
			  //   		title: item.county,
			  //   		color: item.color,
			  //   	}
			  //   })
			  // },

			 "responsive": {
			 	"enabled": true,
			 }

	    });
	});
</script>
<!-- pie chart -->
<script>
$(function () {
	var pie = AmCharts.makeChart("county_sales", {
	  "type": "pie",
	  "theme": "light",
	  "dataProvider": <?php echo json_encode($county_sales); ?>,
	  "valueField": "value",
	  "titleField": "label",
	   "balloon":{
	   "fixedPosition":true
	  },
	  "export": {
	    "enabled": true
	  },
	   "responsive": {
	    "enabled": true
	  }
	});
});
</script>
<!-- line chart -->
<script>
$(function() {
	var chart = AmCharts.makeChart( "line_chart", {
	  "type": "serial",
	  "theme": "light",
	  "dataProvider": <?php echo json_encode($portal === 'solar' ? $product_sales : $stove_sales); ?>,
	  "valueAxes": [ {
	    "gridColor": "#FFFFFF",
	    "gridAlpha": 0.2,
	    "dashLength": 0
	  } ],
	  "gridAboveGraphs": true,
	  "startDuration": 1,
	  "graphs": [ {
	    "balloonText": "[[category]]: <b>[[value]]</b>",
	    "fillAlphas": 0.8,
	    "lineAlpha": 0.2,
	    "type": "column",
	    "valueField": "value"
	  } ],
	  "chartCursor": {
	    "categoryBalloonEnabled": false,
	    "cursorAlpha": 0,
	    "zoomable": false
	  },
	  "categoryField": "label",
	  "categoryAxis": {
	    "gridPosition": "start",
	    "gridAlpha": 0,
	    "tickPosition": "start",
	    "tickLength": 20
	  },
	  "export": {
	    "enabled": true
	  }

} );
});
</script>
