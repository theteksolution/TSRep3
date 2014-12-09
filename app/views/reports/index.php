<script src="app/templates/default/js/jquery.js"></script>
<script src="app/templates/default/js/highcharts.js"></script>
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
            alert('goin ig');
            var url = "/Reports/Chart1";
            $.getJSON('@Url.Action("Chart1")', function (data) {

                alert(data[1]['data']);
                options.xAxis.categories = data[1]['data'];
                options.series[0] = data[0];
                //options.series[0].data = data.Count;
                var chart = new Highcharts.Chart(options);
                });
        }
        
        loadReports();
    });


    //$(function () {
    //    $('#container').highcharts({
    //        chart: {
    //            type: 'bar'
    //        },
    //        title: {
    //            text: 'Fruit Consumption'
    //        },
    //        xAxis: {
    //            categories: ['Apples', 'Bananas', 'Oranges']
    //        },
    //        yAxis: {
    //            title: {
    //                text: 'Fruit eaten'
    //            }
    //        },
    //        series: [{
    //            name: 'Jane',
    //            data: [1, 0, 4]
    //        }, {
    //            name: 'John',
    //            data: [5, 7, 3]
    //        }]
    //    });
    //});

</script>



<h2>Reports</h2>


<div id="container" style="width:100%; height:400px;"></div>

