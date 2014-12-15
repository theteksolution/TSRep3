<!-- 

index.php

This is the index view for the Reports controller

-->

<script src="<?php echo \helpers\url::get_template_path();?>js/highcharts.js"></script>
<script>


    $(document).ready(function () {

        var options = {
            title: {
                text: 'Observation Counts'
            },
            subtitle: {
                text: 'By Type'
            },
            chart: {
                renderTo: 'container',
                type: 'bar'
            },
            xAxis: {
                categories: []
            },
            series: [{}]
        };


        function loadReports() {
            //var url = "/Reports/Chart1";
            $.getJSON("<?php echo DIR ?>reports/chart1", function (data) {
				
                //alert(data[0]['data']);
				options.xAxis.categories = data[0]['data'];
                options.series[0] = data[1];
                ////options.series[0].data = data.Count;
                var chart = new Highcharts.Chart(options);
                });
        }
        
        loadReports();
    });

</script>


<?php include 'app/templates/default/menu.php';?>
<div class="container-fluid">
<h2>Reports</h2>

<div id="container" style="width:100%; height:400px;"></div>
</div>
