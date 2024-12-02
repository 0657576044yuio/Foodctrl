<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h3>แก้ไขข้อมูลเครื่อง</h3>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <?php
                        if(isset($_GET['id']))
                        {
                            $id=$_GET['id'];
                            $sql=" select *  from tb_device";
                            $sql.=" where";
                            $sql.=" device_id=$id";
                            $result=$cls_conn->select_base($sql);
                            while($row=mysqli_fetch_array($result))
                            {
                                $device_id=$row['device_id'];
                                $device_no=$row['device_no'];
                                $device_uuid=$row['device_uuid'];
                                $device_note=$row['device_note'];
                                $member_id=$row['member_id'];
                                $device_datetime=$row['device_datetime'];
                                
                            }
                        }
                        ?>
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                            <input type="hidden" name="device_id" value="<?=$device_id;?>" />
                        
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_uuid">รหัสเครื่อง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="device_uuid" name="device_uuid" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>

                       <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_note">รายละเอียด<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="device_note" name="device_note" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>
                            
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="member_id">ผู้ใช้<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="member_id" name="member_id" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>
                            
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_datetime">วันที่ใช้งาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="datetime-local" id="device_datetime" name="device_datetime" required="required" class="form-control col-md-7 col-xs-12">
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
                                        $device_id = $_POST['device_id'];
                                        $device_uuid = $_POST['device_uuid'];
                                        $device_note = $_POST['device_note'];
                                        $member_id = $_POST['member_id'];
                                        $device_datetime = $_POST['device_datetime'];

                                        $sql = "UPDATE tb_device SET ";
                                        $sql .= "device_uuid = '$device_uuid', ";
                                        $sql .= "device_note = '$device_note', ";
                                        $sql .= "member_id = $member_id, ";
                                        $sql .= "device_datetime = '$device_datetime' ";
                                        $sql .= "WHERE device_id = $device_id";
                             
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(1,'show_device.php');
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
    <?php include('footer.php');?>