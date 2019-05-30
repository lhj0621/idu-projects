
<div class="alert mycolor1 mymargin5" role="alert">구분별 분포도</div>
<script>
	function find_text()
	{
		form1.action="/~sale44/graph/lists/text1/" + form1.text1.value+"/text2/" +  form1.text2.value;
		form1.submit();
	}

	$(function(){	 
		$('#text1') .datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD',
			defaultDate: moment()
		});
		$('#text2') .datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD',
			defaultDate: moment()
		});
		$("#text1").on("dp.change",function(e){
			find_text();
		});
		$("#text2").on("dp.change",function(e){
			find_text();
		});

	});
</script>
  <table class="table table-bordered table-sm mymargin5">
<form name="form1" action="" method="post">
		<div class="row">
			<div class="col-12" align="left">
			  <div class="form-inline">

				<div class="input-group input-group-sm date table-sm" id="text1">
					<div class="input-group-prepend">
						<span class="input-group-text">날짜</span>
					</div>
					<input type="text" name="text1" value="<?=$text1;?>" class="form-control" size="9" onKeydown="if(event.keyCode == 13){find_text();}">
					<div class="input-group-append">
					<div class="input-group-text">
					<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
						</div>
					</div>
				</div>
				&nbsp;&nbsp;
				<div class="input-group input-group-sm date table-sm" id="text2">
					<input type="text" name="text2" value="<?=$text2;?>" class="form-control" size="9" onKeydown="if(event.keyCode == 13){find_text();}">
					<div class="input-group-append">
					<div class="input-group-text">
					<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
						</div>
					</div>
				</div>
		
			</div>
        </div>
    </div>
</form>
<?
	$str_label="";
	$str_data ="";
	foreach ($list as $row)
	{
	$str_label .= "'$row->gubun_name',";
	$str_data  .= $row->cnumo .',';
	}
?>
			<script src="/~sale44/my/js/Chart.min.js"></script>
			<script src="/~sale44/my/js/utils.js"></script>
			<BR><BR>

			<style>
				canvas {
					-moz-user-select: none;
					-webkit-user-select: none;
					-ms-user-select: none;
				}
			</style>

			<div id="canvas-holder" style="width:60%">
				<canvas id="chart-area"></canvas>
			</div>

			<script>

var config = {
			type: "doughnut",
			data: {
				datasets: [{
					data: [ <?=$str_data;?>	],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.orange,
						window.chartColors.yellow,
						window.chartColors.green,
						window.chartColors.blue,
						window.chartColors.gray,
						window.chartColors.purple,
						"rgba(255, 99, 132, 0.7)",
						"rgba(255, 159, 64, 0.7)",
						"rgba(255, 205, 86, 0.7)",
						"rgba(75, 192, 192, 0.7)",
						"rgba(153, 102, 255, 0.7)",
						"rgba(201, 203, 207, 0.7)",
						"rgba(54, 162, 235, 0.7)",
					],
					label: "Dataset 1"
				}],
				labels: [ <?=$str_label;?>  ]
			},
			options: {
				responsive: true,
				legend: {
					position: "top",
				},
				title: {
					display: false,
					text: "구분별 분포도"
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById("chart-area").getContext("2d");
			window.myDoughnut = new Chart(ctx, config);
		};

			</script>
