<?php include('header.php');
$member_id = isset($_GET['member_id']) ? $_GET['member_id'] : $_SESSION['member_id'];
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h3>แก้ไขการตั้งค่า</h3>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <?php
                    if($member_id)
                    {
                        $sql = "SELECT * FROM tb_setting WHERE member_id = $member_id";
                        $result = $cls_conn->select_base($sql);
                        $row = mysqli_fetch_array($result);
                        
                        if($row) {
                            $setting_id = $row['setting_id'];
                            $setting_bpm_min = $row['setting_bpm_min'];
                            $setting_bpm_max = $row['setting_bpm_max'];
                            $setting_line_token = $row['setting_line_token'];
                            $member_id = $row['member_id'];
                            $setting_datetime = $row['setting_datetime'];
                        }
                    }
                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                        <input type="hidden" name="setting_id" value="<?=$setting_id;?>" />
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="setting_bpm_min">ค่าหัวใจต่ำ<span class="required">:</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="setting_bpm_min" name="setting_bpm_min" required="required" class="form-control col-md-7 col-xs-12" value="<?=$setting_bpm_min;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="setting_bpm_max">ค่าหัวใจสูง<span class="required">:</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="setting_bpm_max" name="setting_bpm_max" required="required" class="form-control col-md-7 col-xs-12" value="<?=$setting_bpm_max;?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="setting_line_token">api line<span class="required">:</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="setting_line_token" name="setting_line_token" required="required" class="form-control col-md-7 col-xs-12" value="<?=$setting_line_token;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="member_id">ผู้ใช้<span class="required">:</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="member_id" name="member_id" required="required" class="form-control col-md-7 col-xs-12" value="<?=$member_id;?>">
                            </div>
                        </div>
 
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="setting_datetime">ตั้งค่าเวลา<span class="required">:</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="datetime-local" id="setting_datetime" name="setting_datetime" required="required" class="form-control col-md-7 col-xs-12" value="<?=$setting_datetime;?>">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="submit" class="btn btn-success">แก้ไข</button>
                                <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button>
                            </div>
                        </div>
                    </form>
                    <?php
                    if(isset($_POST['submit']))
                    {
                        $setting_id = $_POST['setting_id'];
                        $setting_bpm_min = $_POST['setting_bpm_min'];
                        $setting_bpm_max = $_POST['setting_bpm_max'];
                        $setting_line_token = $_POST['setting_line_token'];
                        $member_id = $_POST['member_id'];
                        $setting_datetime = $_POST['setting_datetime'];

                        $sql = "UPDATE tb_setting SET 
                                setting_bpm_min = '$setting_bpm_min', 
                                setting_bpm_max = '$setting_bpm_max', 
                                setting_line_token = '$setting_line_token', 
                                member_id = '$member_id', 
                                setting_datetime = '$setting_datetime' 
                                WHERE setting_id = $setting_id";
                             
                        if($cls_conn->write_base($sql) == true)
                        {
                            echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
                            echo $cls_conn->goto_page(1, 'show_setting.php');
                        }
                        else
                        {
                            echo $cls_conn->show_message('แก้ไขข้อมูลไม่สำเร็จ');
                            echo $sql;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
