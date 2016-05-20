<?php echo Modules::run('templates/Templates/header'); ?>
<?php echo Modules::run('templates/Templates/sidebar'); ?>
<section class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo  site_url('dashboard'); ?>">Dashboard</a></li>
        </ol>
    </section>
<hr>
    <!-- Main content -->
    <section class="content"><br><br>
       <div class="row">
           <div class="col-md-3">
               <div class="form-group">
                   <label>Status</label>
                   <select name="status" class="form-control select2 select2-hidden-accessible choosen"
                           style="width: 100%;"
                           tabindex="-1" aria-hidden="true">
                       <option disabled selected>Selectionner Status</option>
                       <?php foreach ($status as $statu) { ?>
                           <option value="<?php echo $statu->id ?>"><?php echo $statu->description;
                               ?></option>
                       <?php } ?>
                   </select>
               </div>
               </div> <div class="col-md-3">
               <div class="form-group">
                   <label>Status</label>
                   <select name="status" class="form-control select2 select2-hidden-accessible choosen"
                           style="width: 100%;"
                           tabindex="-1" aria-hidden="true">
                       <option disabled selected>Selectionner Client</option>
                       <?php foreach ($status as $statu) { ?>
                           <option value="<?php echo $statu->id ?>"><?php echo $statu->description;
                               ?></option>
                       <?php } ?>
                   </select>
               </div>
               </div> <div class="col-md-3">
               <div class="form-group">
                   <label>Status</label>
                   <select name="status" class="form-control select2 select2-hidden-accessible choosen"
                           style="width: 100%;"
                           tabindex="-1" aria-hidden="true">
                       <option disabled selected>Selectionner Serveur</option>
                       <?php foreach ($status as $statu) { ?>
                           <option value="<?php echo $statu->id ?>"><?php echo $statu->description;
                               ?></option>
                       <?php } ?>
                   </select>
               </div>
               </div> <div class="col-md-3">
               <div class="form-group">
                   <label>Status</label>
                   <select name="status" class="form-control select2 select2-hidden-accessible choosen"
                           style="width: 100%;"
                           tabindex="-1" aria-hidden="true">
                       <option disabled selected>Selectionner Status</option>
                       <?php foreach ($status as $statu) { ?>
                           <option value="<?php echo $statu->id ?>"><?php echo $statu->description;
                               ?></option>
                       <?php } ?>
                   </select>
               </div>
               </div>

           <div class="col-md-6">
               <div class="box box-danger">
                   <div class="box-header with-border">
                       <h3 class="box-title text-center">Paiement</h3>
                       <div class="box-tools pull-right">
                           <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                           <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                       </div>
                   </div>
                   <div class="box-body">
                       <canvas id="pieChartPayement" style="height: 243px; width: 487px;" width="487" height="243"></canvas>
                   </div><!-- /.box-body -->
      
               </div>
           </div>
           <div class="col-md-6">
               <div class="box box-danger">
                   <div class="box-header with-border">
                       <h3 class="box-title text-center">Type de services</h3>
                       <div class="box-tools pull-right">
                           <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                           <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                       </div>
                   </div>
                   <div class="box-body">
                       <canvas id="pieChartTypeservice" style="height: 243px; width: 487px;" width="487" height="243"></canvas>
                   </div><!-- /.box-body -->
               </div>
           </div>

       </div>
    </section>
    <!--  main Content -->
</section><!-- Content Wrapper-->
<?php echo Modules::run('templates/Templates/footer'); ?>
<script>
    $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var areaChart = new Chart(areaChartCanvas);

        var areaChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "Electronics",
                    fillColor: "rgba(210, 214, 222, 1)",
                    strokeColor: "rgba(210, 214, 222, 1)",
                    pointColor: "rgba(210, 214, 222, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label: "Digital Goods",
                    fillColor: "rgba(60,141,188,0.9)",
                    strokeColor: "rgba(60,141,188,0.8)",
                    pointColor: "#3b8bba",
                    pointStrokeColor: "rgba(60,141,188,1)",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(60,141,188,1)",
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        };

        var areaChartOptions = {
            //Boolean - If we should show the scale at all
            showScale: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: false,
            //String - Colour of the grid lines
            scaleGridLineColor: "rgba(0,0,0,.05)",
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - Whether the line is curved between points
            bezierCurve: true,
            //Number - Tension of the bezier curve between points
            bezierCurveTension: 0.3,
            //Boolean - Whether to show a dot for each point
            pointDot: false,
            //Number - Radius of each point dot in pixels
            pointDotRadius: 4,
            //Number - Pixel width of point dot stroke
            pointDotStrokeWidth: 1,
            //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius: 20,
            //Boolean - Whether to show a stroke for datasets
            datasetStroke: true,
            //Number - Pixel width of dataset stroke
            datasetStrokeWidth: 2,
            //Boolean - Whether to fill the dataset with a color
            datasetFill: true,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true
        };

        //Create the line chart
        areaChart.Line(areaChartData, areaChartOptions);

        //-------------
        //- LINE CHART -
        //--------------

        /*
        PIE Chart type service
         */
        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.

      
        var pieChartCanvas = $("#pieChartTypeservice").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [

            {
                value: <?php echo count($serviceAsemail)?>,
                color: "#00a65a",
                highlight: "#00a65a",
                label: "Service Emailing"
            },
            {
                value: <?php echo count($serviceAsserviceAsdomaine)?>,
                color: "#f39c12",
                highlight: "#f39c12",
                label: "Non domaine"
            },
            {
                value: <?php echo count($serviceAscertif)?>,
                color: "#dd4b39",
                highlight: "#dd4b39",
                label: "Certification SSR"
            }
        ];
        var pieOptions = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke: true,
            //String - The colour of each segment stroke
            segmentStrokeColor: "#fff",
            //Number - The width of each segment stroke
            segmentStrokeWidth: 2,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps: 100,
            //String - Animation easing effect
            animationEasing: "easeOutBounce",
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate: true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale: false,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions);

        //-------------
        //- PIE CHART Payement-
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $("#pieChartPayement").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [

            {
                value: <?php echo count($servicespayed)?>,
                color: "#00a65a",
                highlight: "#00a65a",
                label: "Service Payé"
            },
            {
                value: <?php echo count($servicesnotpayed)?>,
                color: "#3c8dbc",
                highlight: "#3c8dbc",
                label: "Service non Payé"
            }
        ];
        var pieOptions = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke: true,
            //String - The colour of each segment stroke
            segmentStrokeColor: "#fff",
            //Number - The width of each segment stroke
            segmentStrokeWidth: 2,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps: 100,
            //String - Animation easing effect
            animationEasing: "easeOutBounce",
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate: true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale: false,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions);

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = areaChartData;
        barChartData.datasets[1].fillColor = "#00a65a";
        barChartData.datasets[1].strokeColor = "#00a65a";
        barChartData.datasets[1].pointColor = "#00a65a";
        var barChartOptions = {
            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            scaleBeginAtZero: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: true,
            //String - Colour of the grid lines
            scaleGridLineColor: "rgba(0,0,0,.05)",
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - If there is a stroke on each bar
            barShowStroke: true,
            //Number - Pixel width of the bar stroke
            barStrokeWidth: 2,
            //Number - Spacing between each of the X value sets
            barValueSpacing: 5,
            //Number - Spacing between data sets within X values
            barDatasetSpacing: 1,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            //Boolean - whether to make the chart responsive
            responsive: true,
            maintainAspectRatio: true
        };

        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions);
       
    });
</script>


