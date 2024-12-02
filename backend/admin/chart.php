<?php include('header.php'); ?>
<html>

<head>
    <style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 400px;
        max-width: 800px;
        margin: 1em auto;
    }

    .chart {
        height: 400px;
        width: 700px;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 800px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }

    .chart-container {
        width: 33.33%;
        float: right;
    }

    .table-container {
        width: 100%;
        float: none;
        overflow: hidden;
    }

    .x_panel {
        border: none;
        box-shadow: none;
    }
    </style>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>

<body>

    <div class="right_col" role="main">
        <div class="right_col">
            <div class="no-print">
                <div class="col-md-12 col-sm-15 col-xs-15">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>ค้นหาข้อมูล</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                        for="date_start">จากวันที่<span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <input type="date" id="date_start" name="date_start"
                                            class="form-control col-md-7 col-xs-7">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                        for="date_end">ถึงวันที่<span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <input type="date" id="date_end" name="date_end"
                                            class="form-control col-md-7 col-xs-7">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="submit" class="btn btn-success">ค้นหา</button>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chart-table-container  "></div>

            <div class="col-md-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h3>สรุปรายงานสุขภาพ</h3>
                        <div class="clearfix"></div>
                    </div>
                    <figure class="highcharts-figure">
                        <div id="container_line"></div>
                        <p class="highcharts-description">
                            This demo shows how related charts can be synchronized. Hover
                            over one chart to see the effect in the other charts as well.
                            This is a technique that is commonly seen in dashboards,
                            where multiple charts are often used to visualize related
                            information.
                        </p>
                    </figure>

                    <div class="table-container">
                        <div class="x_panel print1">
                            <div class="x_title">
                                <h3>ตารางรายงานสุขภาพ</h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <p class="text-muted font-13 m-b-12">
                                <table id="datatable-buttons" class="table table-striped table-bordered"
                                    class="control-label col-md-3 col-sm-3 col-xs-3">
                                    <thead>
                                        <tr>
                                            <th>รหัสผู้ใช้</th>
                                            <th>อัตราการเต้นของหัวใจ</th>
                                            <th>การก้าว</th>
                                            <th>ความเอียง</th>
                                            <th>รหัสเครื่อง</th>
                                            <th>วันเวลาที่แสดง</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    $sql = "SELECT * FROM tb_log ";
                                     // Filter by date range if form is submitted
                                    if (isset($_POST['submit'])) {
                                    $date_start = $_POST['date_start'];
                                    $date_end = $_POST['date_end'];
                                    $sql .= " WHERE log_datetime>='$date_start' AND log_datetime<='$date_end'";
                                     }

                                    $result = $cls_conn->select_base($sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $row['log_id']; ?>
                                            </td>
                                            <td>
                                                <?= $row['log_bpm']; ?>
                                            </td>
                                            <td>
                                                <?= $row['log_step']; ?>
                                            </td>
                                            <td>
                                                <?= $row['log_falling']; ?>
                                            </td>
                                            <td>
                                                <?= $row['device_id']; ?>
                                            </td>
                                            <td>
                                                <?= $row['log_datetime']; ?>
                                            </td>

                                        </tr>
                                        <?php
                                            }
                                         ?>

                                        <?php
                                        $sql = "SELECT * FROM tb_log ";

                                          // Filter by date range if form is submitted
                                         if (isset($_POST['submit'])) {
                                         $date_start = $_POST['date_start'];
                                         $date_end = $_POST['date_end'];

                                         $sql .= " WHERE log_datetime>='$date_start' AND log_datetime<='$date_end'";
                                        }

                                         $result = $cls_conn->select_base($sql);

                                         // เก็บข้อมูลที่ดึงมาจากฐานข้อมูลไว้ใน array
                                         $log_bpm = array();
                                         $log_step = array();
                                         $log_falling = array();
                                         $log_datetime = array();

                                         while ($row = mysqli_fetch_assoc($result)) {
                                         $log_bpm[] = $row['log_bpm'];
                                         $log_step[] = $row['log_step'];
                                         $log_falling[] = $row['log_falling'];
                                         $log_datetime[] = $row['log_datetime'];
                                        }
                                    ?>

                                        <script type="text/javascript">
                                        ['mousemove', 'touchmove', 'touchstart'].forEach(function(eventType) {
                                            document.getElementById('container_line').addEventListener(
                                                eventType,
                                                function(e) {
                                                    let chart,
                                                        point,
                                                        i,
                                                        event;

                                                    for (i = 0; i < Highcharts.charts.length; i =
                                                        i + 1) {
                                                        chart = Highcharts.charts[i];
                                                        // Find coordinates within the chart
                                                        event = chart.pointer.normalize(e);
                                                        // Get the hovered point
                                                        point = chart.series[0].searchPoint(event,
                                                            true);

                                                        if (point) {
                                                            point.highlight(e);
                                                        }
                                                    }
                                                }
                                            );
                                        });

                                        /**
                                         * Override the reset function, we don't need to hide the tooltips and
                                         * crosshairs.
                                         */
                                        Highcharts.Pointer.prototype.reset = function() {
                                            return undefined;
                                        };

                                        /**
                                         * Highlight a point by showing tooltip, setting hover state and draw crosshair
                                         */
                                        Highcharts.Point.prototype.highlight = function(event) {
                                            event = this.series.chart.pointer.normalize(event);
                                            this.onMouseOver(); // Show the hover marker
                                            this.series.chart.tooltip.refresh(this); // Show the tooltip
                                            this.series.chart.xAxis[0].drawCrosshair(event,
                                                this); // Show the crosshair
                                        };

                                        /**
                                         * Synchronize zooming through the setExtremes event handler.
                                         */
                                        function syncExtremes(e) {
                                            const thisChart = this.chart;

                                            if (e.trigger !== 'syncExtremes') { // Prevent feedback loop
                                                Highcharts.each(Highcharts.charts, function(chart) {
                                                    if (chart !== thisChart) {
                                                        if (chart.xAxis[0]
                                                            .setExtremes) { // It is null while updating
                                                            chart.xAxis[0].setExtremes(
                                                                e.min,
                                                                e.max,
                                                                undefined,
                                                                false, {
                                                                    trigger: 'syncExtremes'
                                                                }
                                                            );
                                                        }
                                                    }
                                                });
                                            }
                                        }

                                        // Get the data. The contents of the data file can be viewed at
                                        Highcharts.ajax({
                                            url: 'http://localhost/watchmonitor/backend/admin/jj.json',
                                            dataType: 'text',
                                            success: function(activity) {

                                                activity = JSON.parse(activity);
                                                activity.datasets.forEach(function(dataset, i) {

                                                    // Add X values
                                                    dataset.data = Highcharts.map(dataset
                                                        .data,
                                                        function(val, j) {
                                                            return [activity.xData[j],
                                                                val
                                                            ];
                                                        });

                                                    const chartDiv = document.createElement(
                                                        'div');
                                                    chartDiv.className = 'chart';
                                                    document.getElementById(
                                                        'container_line').appendChild(
                                                        chartDiv);

                                                    Highcharts.chart(chartDiv, {
                                                        chart: {
                                                            marginLeft: 40, // Keep all charts left aligned
                                                            spacingTop: 20,
                                                            spacingBottom: 20

                                                        },
                                                        title: {
                                                            text: dataset.name,
                                                            align: 'left',
                                                            margin: 0,
                                                            x: 30
                                                        },
                                                        credits: {
                                                            enabled: false
                                                        },
                                                        legend: {
                                                            enabled: false
                                                        },
                                                        xAxis: {
                                                            type: 'datetime', // กำหนดให้แกน x เป็นประเภทวันที่-เวลา
                                                            crosshair: true,
                                                            events: {
                                                                setExtremes: syncExtremes
                                                            },
                                                            labels: {
                                                                format: '{value:%d-%m-%Y}', // รูปแบบการแสดงของวันที่ (วัน-เดือน-ปี)
                                                            },
                                                            accessibility: {
                                                                description: 'Date',
                                                                rangeDescription: 'Date range'
                                                            }
                                                        },
                                                        yAxis: {
                                                            title: {
                                                                text: null
                                                            }
                                                        },
                                                        tooltip: {
                                                            positioner: function() {
                                                                return {
                                                                    // right aligned
                                                                    x: this
                                                                        .chart
                                                                        .chartWidth -
                                                                        this
                                                                        .label
                                                                        .width,
                                                                    y: 10 // align to title
                                                                };
                                                            },
                                                            borderWidth: 0,
                                                            backgroundColor: 'none',
                                                            pointFormat: '{point.y}',
                                                            headerFormat: '',
                                                            shadow: false,
                                                            style: {
                                                                fontSize: '25px'
                                                            },
                                                            valueDecimals: dataset
                                                                .valueDecimals
                                                        },
                                                        series: [{
                                                            data: dataset
                                                                .data,
                                                            name: dataset
                                                                .name,
                                                            type: dataset
                                                                .type,
                                                            color: Highcharts
                                                                .getOptions()
                                                                .colors[i],
                                                            fillOpacity: 0.3,
                                                            tooltip: {
                                                                valueSuffix: ' ' +
                                                                    dataset
                                                                    .unit
                                                            }
                                                        }]
                                                    });
                                                });
                                            }
                                        });
                                        </script>
                                        <?php include('footer.php');?>
</body>

</html>