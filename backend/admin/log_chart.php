<?php include ('header.php'); ?>
<html>

<head>
    <style type="text/css">
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 320px;
        max-width: 800px;
        margin: 1em auto;
    }

    .chart {
        height: 400px;
        width: 700px;
    }

    #container {
        height: 450px;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
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
    </style>
</head>

<body>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!--script src="https://code.highcharts.com/modules/exporting.js"></!--script>-->
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <div class="right_col" role="main">
        <div class="right_col">
            <div class="no-print">
                <div class="col-md-8 col-sm-15 col-xs-15">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>ค้นหาข้อมูล</h2>
                            <div class="clearfix">
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
                                        <input type="datetime-local" id="date_start" name="date_start"
                                            class="form-control col-md-7 col-xs-7">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                        for="date_end">ถึงวันที่<span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <input type="datetime-local" id="date_end" name="date_end"
                                            class="form-control col-md-7 col-xs-7">
                                    </div>
                                </div>
                                <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_uuid">เลือกรหัสเครื่อง</label>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <select id="device_uuid" name="device_uuid" class="form-control">
                                <option value="">ทั้งหมด</option>
                                <?php
                                $sql_device_uuid = "SELECT DISTINCT device_uuid FROM tb_device";
                                $result_device_uuid = $cls_conn->select_base($sql_device_uuid);
                                while ($row_device_uuid = mysqli_fetch_assoc($result_device_uuid)) {
                                    echo "<option value='" . $row_device_uuid['device_uuid'] . "'>" . $row_device_uuid['device_uuid'] . "</option>";
                                }
                                ?>
                            </select>

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
            <div class="chart-table-container  ">


                <div class="col-md-8 col-sm-15 col-xs-15">
                    <div class="x_panel">
                        <div class="x_title">
                            <h3>สรุปรายงานสุขภาพ</h3>
                            <div class="clearfix">
                        </div>
                        <figure class="highcharts-figure">
                            <div id="container_area1"></div>
                            <div id="container_area"></div>
                            <div id="container_area2"></div>
                        </figure>
 

                        <div class="table-container">
                            <div class="x_panel print1">
                                <div class="x_title">
                                    <h3>ตารางรายงานสุขภาพ</h3>
                                    <div class="clearfix">
                                </div>
                                <div class="x_content">
                                    <p class="text-muted font-13 m-b-12">
                                    <table id="datatable-buttons" class="table table-striped table-bordered" class="control-label col-md-3 col-sm-3 col-xs-3">
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
                                        // Filter by date range and device_uuid if form is submitted
                                        if (isset($_POST['submit'])) {
                                            $conditions = array();
                                            if (!empty($_POST['date_start']) && !empty($_POST['date_end'])) {
                                                $date_start = $_POST['date_start'];
                                                $date_end = $_POST['date_end'];
                                                $conditions[] = "log_datetime >= '$date_start' AND log_datetime <= '$date_end'";
                                            }
                                            if (!empty($_POST['device_uuid'])) {
                                                $device_uuid = $_POST['device_uuid'];
                                                $conditions[] = "device_uuid = '$device_uuid'";
                                            }
                                            if (!empty($conditions)) {
                                                $sql .= " WHERE " . implode(" AND ", $conditions);
                                            }
                                        }

                                        $result = $cls_conn->select_base($sql);
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?= $row['log_id']; ?></td>
                                                <td><?= $row['log_bpm']; ?></td>
                                                <td><?= $row['log_step']; ?></td>
                                                <td><?= $row['log_falling']; ?></td>
                                                <td><?= $row['device_uuid']; ?></td>
                                                <td><?= $row['log_datetime']; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                <?php
                $sql = "SELECT * FROM tb_log ";
                if (isset($_POST['submit'])) {
                    $conditions = array();
                    if (!empty($_POST['date_start']) && !empty($_POST['date_end'])) {
                        $date_start = $_POST['date_start'];
                        $date_end = $_POST['date_end'];
                        $conditions[] = "log_datetime >= '$date_start' AND log_datetime <= '$date_end'";
                    }
                    if (!empty($_POST['device_uuid'])) {
                        $device_uuid = $_POST['device_uuid'];
                        $conditions[] = "device_uuid = '$device_uuid'";
                    }
                    if (!empty($conditions)) {
                        $sql .= " WHERE " . implode(" AND ", $conditions);
                    }
                }
                
                $result = $cls_conn->select_base($sql);

                $categories = array();
                $log_bpm = array();
                $log_step = array();
                $log_falling = array();

                if ($result->num_rows > 0) {
                    // มีข้อมูล ให้สร้างกราฟ
                    $datetime_format = 'Y-m-d H:i:s';

                    while ($row = mysqli_fetch_assoc($result)) {
                        $categories[] = strtotime($row['log_datetime']) * 1000;
                        $log_bpm[] = (int) $row['log_bpm'];
                        $log_step[] = $row['log_step'];
                        $log_falling[] = $row['log_falling'];
                    }
                } else {
                    // ไม่มีข้อมูล
                }
               
                ?>

                <script type="text/javascript">
                function syncExtremes(e) {
                    // ... (same as before)
                }

                Highcharts.chart('container_area', {
                    chart: {
                        type: 'area'
                    },
                    accessibility: {
                        description: 'Image description: ...'
                    },
                    title: {
                        text: 'อัตราการเต้นของหัวใจ'
                    },
                    xAxis: {
                        type: 'datetime', // กำหนดให้แกน x เป็นประเภทวันที่-เวลา
                        categories: [
                        <?php echo implode(',', $categories); ?>], // ใช้ช่วงวันที่จากการเลือกของผู้ใช้
                        crosshair: true,
                        events: {
                            setExtremes: syncExtremes
                        },
                        labels: {
                            formatter: function() {
                                return Highcharts.dateFormat('%d-%m-%Y %H:%M:%S', this
                                .value); // รูปแบบการแสดงวันที่-เวลา
                            }
                        },
                        accessibility: {
                            description: 'Date',
                            rangeDescription: 'Date range'
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Nuclear weapon states'
                        }
                    },
                    tooltip: {
                        pointFormat: '{series.name} had stockpiled <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
                    },
                    plotOptions: {
                        area: {

                            marker: {
                                enabled: false,
                                symbol: 'circle',
                                radius: 3,
                                states: {
                                    hover: {
                                        enabled: true
                                    }
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'BPM',
                        data: [<?php echo implode(",", $log_bpm); ?>]
                
                    }]
                });
                </script>




                <script type="text/javascript">
                function syncExtremes(e) {
                    // ... (same as before)
                }

                Highcharts.chart('container_area1', {
                    chart: {
                        type: 'line'
                    },
                    accessibility: {
                        description: 'Image description: ...'
                    },
                    title: {
                        text: 'Falling'
                    },
                    xAxis: {
                        type: 'datetime', // กำหนดให้แกน x เป็นประเภทวันที่-เวลา
                        categories: [
                        <?php echo implode(',', $categories); ?>], // ใช้ช่วงวันที่จากการเลือกของผู้ใช้
                        crosshair: true,
                        events: {
                             setExtremes: syncExtremes
                        },
                        labels: {
                            formatter: function() {
                                return Highcharts.dateFormat('%d-%m-%Y %H:%M:%S', this
                                .value); // รูปแบบการแสดงวันที่-เวลา
                            }
                        },
                        accessibility: {
                            description: 'Date',
                            rangeDescription: 'Date range'
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Nuclear weapon states'
                        }
                    },
                    tooltip: {
                        pointFormat: '{series.name} had stockpiled <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
                    },
                    plotOptions: {
                        area: {

                            marker: {
                                enabled: false,
                                symbol: 'circle',
                                radius: 3,
                                states: {
                                    hover: {
                                        enabled: true
                                    }
                                }
                            }
                        }
                    },
                    series: [{
                        
                        name: 'FALLING',
                        data: [<?php echo implode(",", $log_falling); ?>]
                    }]
                });
                </script>


                </script>
                <script type="text/javascript">
                function syncExtremes(e) {
                    // ... (same as before)
                }

                Highcharts.chart('container_area2', {
                    chart: {
                        type: 'area'
                    },
                    accessibility: {
                        description: 'Image description: ...'
                    },
                    title: {
                        text: 'STEP'
                    },
                    xAxis: {
                        type: 'datetime', // กำหนดให้แกน x เป็นประเภทวันที่-เวลา
                        categories: [
                        <?php echo implode(',', $categories); ?>], // ใช้ช่วงวันที่จากการเลือกของผู้ใช้
                        crosshair: true,
                        events: {
                            setExtremes: syncExtremes
                        },
                        labels: {
                            formatter: function() {
                                return Highcharts.dateFormat('%d-%m-%Y %H:%M:%S', this
                                .value); // รูปแบบการแสดงวันที่-เวลา
                            }
                        },
                        accessibility: {
                            description: 'Date',
                            rangeDescription: 'Date range'
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Nuclear weapon states'
                        }
                    },
                    tooltip: {
                        pointFormat: '{series.name} had stockpiled <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
                    },
                    plotOptions: {
                        area: {

                            marker: {
                                enabled: false,
                                symbol: 'circle',
                                radius: 3,
                                states: {
                                    hover: {
                                        enabled: true
                                    }
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'STEP',
                        data: [<?php echo implode(",", $log_step); ?>]
                  
                    }]
                });
                </script>
                <?php include ('footer.php'); ?>
</body>

</html>