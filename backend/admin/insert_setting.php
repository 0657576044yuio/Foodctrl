<?php include('header.php');?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>ตั้งค่า</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                for="setting_bpm_min">ค่าหัวใจต่ำ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="setting_bpm_min" name="setting_bpm_min" required="required"
                                    class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                for="setting_bpm_max">ค่าหัวใจสูง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="setting_bpm_max" name="setting_bpm_max" required="required"
                                    class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="setting_line_token">api
                                line<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="setting_line_token" name="setting_line_token" required="required"
                                    class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="member_id">ผู้ใช้<span
                                    class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="member_id" name="member_id" required="required"
                                    class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_uuid">หมายเลขอุปกรณ์<span
                                    class="required">:</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="device_uuid" name="device_uuid" required="required"
                                    class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                for="setting_datetime">ตั้งค่าเวลา<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="datetime-local" id="setting_datetime" name="setting_datetime"
                                    required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
                                <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button>
                            </div>
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['submit'])) {
                            $setting_bpm_min = $_POST['setting_bpm_min'];
                            $setting_bpm_max = $_POST['setting_bpm_max'];
                            $setting_line_token = $_POST['setting_line_token'];
                            $member_id = $_POST['member_id'];
                            $device_uuid = $_POST['device_uuid'];
                            $setting_datetime = $_POST['setting_datetime'];
                        
                            $sql = "INSERT INTO `tb_setting` (`setting_bpm_min`, `setting_bpm_max`, `setting_line_token`, `member_id`, `device_uuid`, `setting_datetime`)";
                            $sql .= " VALUES ('$setting_bpm_min', '$setting_bpm_max', '$setting_line_token', $member_id, '$device_uuid', '$setting_datetime')";
                            if($cls_conn->write_base($sql) == true) {
                                echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(1, 'show_setting.php');
                            } else {
                                echo $cls_conn->show_message('บันทึกข้อมูลไม่สำเร็จ');
                                echo $sql;
                            }
                        }
                        ?>


                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php');?>