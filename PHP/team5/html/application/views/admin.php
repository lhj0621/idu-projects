<script type="text/javascript">
			function find_text(){

				form1.action="/~team5/admin/index/year/"+form1.year.value;
				form1.submit();
			}
			/*$(function(){
				var date=$('#datepicker').daterangepicker({dateFormat: 'dd-mm-yy'}).val();
				$('#text1') .datetimepicker({
					locale:'ko',
					format:'YYYY-MM-DD',
					defaultDate:moment()
				});
				$('#text2') .datetimepicker({
					locale:'ko',
					format:'YYYY-MM-DD',
					defaultDate:moment()
				});
				$("#text1") .on("dp.change",function(e){
					find_text();
				});
				$("#text2") .on("dp.change",function(e){
					find_text();
				});
			});*/
		</script>
<script src="/~team5/my/js/Chart.js"></script>
<script src="/~team5/my/js/utils.js"></script>
<div class="right_col" role="main">
	<!-- top tiles -->
	<div class="row tile_count">
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-user"></i> Total Users</span>
			<div class="count"><?=$gender?>
			</div>
			<br>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-list"></i> Total Product</span>
			<div class="count"><?=$product?>
			</div>
			<br>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-user"></i> Total Hotel</span>
			<div class="count green"><?=$hotel?>
			</div>
			<br>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-user"></i> Total Free-Travel Product</span>
			<div class="count"><?=$freetrevel?>
			</div>
			<br>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-user"></i> Total Reservation</span>
			<div class="count"><?=$yeyag?>
			</div>
			<br>
		</div>
		<? foreach($sales as $row1){?>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-user"></i> Total Sales</span>
			<div class="count"><?=number_format($row1->total);?> ￦
			</div>
			<br>
			<?}?>
		</div>
	</div>
	<!-- /top tiles -->
	<!--
				<div class="col-md-6">
						div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc" onchange="find_text();">
						  <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
						  <span><?=$text1?> - <?=$text2?></span> <b class="caret"></b>
						</div>
                  </div-->
	<!--daterangepicker-->
	<!--form name="form1" action="" method="post">
						<div class="form-inline">
							날짜&nbsp;
							<input type="text" name="text1" value="<?=$text1?>">
							<input type="text" name="text2" value="<?=$text2?>">
							<?$dateRange=$text1." - ".$text2;?>
							<input type="text" style="width: 200px" name="dateRange" id="reservation" class="form-control" value="<?=$dateRange?>"  >
						</div>
					</form
					</div>
					-->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="dashboard_graph">
				<div class="row x_title">
					<div class="col-md-9">
						<h3>Monthly Sales Status </h3> 
					</div>
					<form name="form1" action="" method="post">
						<div class="col-md-3">
							<select class="form-control form-control-sm" name="year" onchange="javascript:find_text();">
							<?
								foreach($year_list as $year_row){
									if($year_row->y==$year)
										echo("<option value='$year_row->y' selected>$year_row->y 년</option>");
									else
										echo("<option value='$year_row->y'>$year_row->y 년</option>");
								}
							?>
							</select> 
						</div>
					</form>
				</div>
				<!--그래프1-->
				<?
			$str_label1="";
			$str_data1="";
		    foreach ($s_sales as $row){
				$str_label1 .= "'$row->month',"; $str_data1 .= $row->sprice . ','; } ?>
				<style>
				canvas{
					-moz-user-select: none;
					-webkit-user-select: none;
					-ms-user-select: none;
				}
				</style>
				<div id="canvas-holder1" style="width:100%">
					<br>
					<canvas id="Status"></canvas>
				</div>
				<script>
				var config1 = {
			type: 'line',
			data: {
				datasets: [{
					data: [ <?=$str_data1;?> ],
					backgroundColor: 
						"rgba(38,185,154,0.7)"
					,
					label: ''
				}],
				labels: [<?=$str_label1;?>]
			},
			options: {
				responsive: true,
				title: {
					display: false,
					text: 'TopCountry'
				},
				padding: {
					rignt: 100
				},
				scales: {
					xAxes:[{
						display: true,
						angleLines:{
							display:false
						},
						drawBorder:false
					}],
					yAxes: [{
						display: true,
						ticks: {
							beginAtZero: true,
							callback: function(value, index, values) {
								return value + '￦';
							}
						},
						drawBorder:false
					}]
				},
				/*legend: {
					display: false,
					position: 'top'
				}*/
			}
		};
			</script>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12 ">
			<div class="dashboard_graph">
				<div class="row x_title">
					<div class="col-md-6">
						<h3>Top City </h3>
					</div>
				</div>
				<!--그래프2-->
				<?
			$str_label2="";
			$str_data2="";
		    foreach ($c_list as $row){
				$str_label2 .= "'$row->city_name',"; $str_data2 .= $row->p_count . ','; } ?>
				<style>
				canvas{
					-moz-user-select: none;
					-webkit-user-select: none;
					-ms-user-select: none;
				}
				</style>
				<div id="canvas-holder1" style="width:100% " >
					<br>
					<canvas id="chart-area"></canvas>
				</div>
				<script>
				var config2 = {
			type: 'horizontalBar',
			data: {
				datasets: [{
					data: [ <?=$str_data2;?> ],
					backgroundColor: 
						"rgba(38,185,154,0.7)"
					,
					label: 'city'
				}],
				labels: [<?=$str_label2;?>]
			},
			options: {
				responsive: true,
				title: {
					display: false,
					text: 'TopCountry'
				},
				padding: {
					rignt: 100
				},
				scales: {
					xAxes:[{
						display: false,
						angleLines:{
							display:false
						},
						ticks: {
							beginAtZero: true
						},
						drawBorder:false
					}],
					yAxes: [{
						display: true,
						ticks: {
							display:true
						},
						drawBorder:false
					}]
				},
				/*legend: {
					display: false,
					position: 'top'
				}*/
			}
		};
			</script>
			</div>
		</div>
	</div>
	<br>
<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="dashboard_graph">
			<div class="row x_title">
				<div class="col-md-6">
					<h3>Registered Nation</h3>
				</div>
			</div>
			<!--그래프1-->
			<?
			$str_label="";
			$str_data="";
		    foreach ($n_list as $row){
				$str_label .= "'$row->country_name',"; $str_data .= $row->p_count . ','; } ?>
			<style>
				canvas{
					-moz-user-select: none;
					-webkit-user-select: none;
					-ms-user-select: none;
				}
			</style>
			<div id="canvas-holder" style="width:100%">
				<br>
				<canvas id="country_chart"></canvas>
			</div >
			<script>
				var config3 = {
			type: 'bar',
			data: {
				datasets: [{
					data: [ <?=$str_data;?> ],
					backgroundColor: [
						"rgba(52,152,219,0.7)",
						"rgba(38,185,154,0.7)",
						"rgba(231,76,60,0.7)",
						"rgba(155,89,182,0.7)",
						"rgba(189,195,199,0.7)",
						window.chartColors.red,
						window.chartColors.orange,
						window.chartColors.yellow,
						window.chartColors.green,
						window.chartColors.blue,
						window.chartColors.gray,
						window.chartColors.purple,
						"rgba(201,203,207,0.7)",
						"rgba(54,162,235,0.7)"
					],
					label: 'Nation'
				}],
				labels: [<?=$str_label;?>]
			},
			options: {
				responsive: true,
				title: {
					display: false,
					text: 'Best Nation'
				},
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true,
							steps: 1,
							stepValue: 1,
						}
					}]
				},
				/*legend: {
					display:false,
					position: 'top'
				}*/
			}
			};
		 
			</script>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="dashboard_graph">
			<div class="row x_title">
				<div class="col-md-6">
					<h3>Reply Count</h3>
				</div>
			</div>
	
			
			
			<!--그래프2-->
			<!--
				<div class="col-md-4 col-xs-12 hidden-small">
					<table class="countries_list">
					<tbody>
					<?
				foreach($rcountlist as $rrow){
					?>
					<tr>
						<td><?=$rrow->name;?></td>
						<td class="fs15 fw700 text-right"><?=$rrow->count?></td>
					</tr>
					<?
				}
				?>
					</tbody>
					</table>
				</div>
				-->
				<?
					$str_label4="";
					$str_data4="";
					foreach ($rcountlist as $rrow){
						$str_label4 .= "'$rrow->name',"; $str_data4 .= $rrow->count . ','; 
					}
				?>
				<style>
				canvas{
					-moz-user-select: none;
					-webkit-user-select: none;
					-ms-user-select: none;
				}
				</style>

				<div id="canvas-holder1" style="width:65%; margin:auto;">

					<br>
					<canvas id="percentChart" style="width:80%"></canvas>
				</div>
				<script>
					var config4 = {
						type: 'doughnut',
						data: {
							datasets: [{
								data: [ <?=$str_data4;?> ],
								backgroundColor: [
									"rgba(52,152,219,0.7)",
									"rgba(38,185,154,0.7)",
									"rgba(231,76,60,0.7)",
									"rgba(155,89,182,0.7)",
									"rgba(189,195,199,0.7)",
									window.chartColors.red,
									window.chartColors.orange,
									window.chartColors.yellow,
									window.chartColors.green,
									window.chartColors.blue,
									window.chartColors.gray,
									window.chartColors.purple,
									"rgba(201,203,207,0.7)",
									"rgba(54,162,235,0.7)"]
								,
								label: 'city'
							}],
							labels: [<?=$str_label4;?>]
						},
						options: {
							responsive: true,
							legend: {
								position: 'top'
							},
							title: {
								display: false,
								text: 'location'
							},
							animation: {
								animateScale: true,
								animateRotate: true
							}
								
							
						}
			};
			window.onload = function() {
				var ctx1 = document.getElementById('Status').getContext('2d');
				var ctx2 = document.getElementById('chart-area').getContext('2d');
				var ctx3 = document.getElementById('country_chart').getContext('2d');
				var ctx4 = document.getElementById('percentChart').getContext('2d');
				//ctx.canvas.height=200;
				//ctx2.canvas.width=150;
				ctx3.canvas.height=100;
				window.myLine1 = new Chart(ctx1, config1);
				window.myBar2 = new Chart(ctx2, config2);
				window.myBar3 = new Chart(ctx3, config3);
				window.myDoughnut4=new Chart(ctx4, config4);
			}
			</script>
			
		</div>
	</div>
</div>
	<!-- end of weather widget -->
</div>
</div>
</div>
</div>