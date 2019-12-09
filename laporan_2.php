<!DOCTYPE html>
<html>
<head>

</head>
<body>



	<div class="col-md-8 stats-info widget" style="margin-left: 0px; margin-top: 20px;">
       <div class="stats-info-agileits" style="margin-top: 10px; margin-left: 14px; margin: 0px">
        <div id="container8" style="height: 400px"></div>
       </div>
    </div>

    <script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/highcharts-3d.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>

    <!--Bilangan Projek Mengikut Tahun-->
	<script type="text/javascript">
    $.ajax({
	  url: "jenis.php",
	  type: "POST",
	  dataType: "JSON",
	  success: function(jenis){
      
      var jenis = [];
      var total = [];

      for (var i = jenis.length - 1; i >= 0; i--) {

        // year.push(projek[i].year);
        // total.push(parseInt(projek[i].total));

        var data = [jenis[i].year, parseInt(jenis[i].total)];

        total.push(data);
      }

      Highcharts.chart('container8', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45,
                    beta: 0
                }
            },
            title: {
                text: ' Laporan mengikut jenis aduan'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: <br> <h4>{point.percentage:.1f} % Jenis</h4>'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: "Jenis",
                data: total
            }]
        });
	    }
	  });
	</script>

<!--Laporan Akhir-->

</body>
</html>









