<?php include('header.php'); ?>
<html>
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
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date_start">จากวันที่<span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <input type="date" id="date_start" name="date_start" class="form-control col-md-7 col-xs-7">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date_end">ถึงวันที่<span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <input type="date" id="date_end" name="date_end" class="form-control col-md-7 col-xs-7">
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

                    <div class="col-md-20 col-sm-15 col-xs-15">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>แสดงข้อมูล</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>

                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix">
                            </div>
                            <div class="x_content">
                                <p class="text-muted font-13 m-b-30">
                                <table id="datatable-buttons" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>รหัสผู้ใช้ </th>
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
                                                    <?= $row['device_uuid']; ?>
                                                </td>
                                                <td>
                                                    <?= $row['log_datetime']; ?>
                                                </td>

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

            <?php include('footer.php'); ?>