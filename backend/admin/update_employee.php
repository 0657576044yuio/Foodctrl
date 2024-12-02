<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h3>แก้ไขข้อมูลพนักงาน</h3>
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
                            $sql=" select *  from tb_employee";
                            $sql.=" where";
                            $sql.=" employee_id=$id";
                            $result=$cls_conn->select_base($sql);
                            while($row=mysqli_fetch_array($result))
                            {
                                $employee_id=$row['z'];
                                $employee_name=$row['employee_name'];
                                $employee_add=$row['employee_add'];
                                $employee_tel=$row['employee_tel'];
                                $employee_type=$row['employee_type'];
                                $employee_datetime=$row['employee_datetime'];
                                
                            }
                        }
                        ?>
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                            <input type="hidden" name="employee_id" value="<?=$employee_id;?>" />
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_name">ชื่อพนักงาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="employee_name" name="employee_name" value="<?=$employee_name;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_add">ที่อยู่พนักงาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="employee_add" name="employee_add" value="<?=$employee_add;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_tel">เบอร์โทรศัพท์พนักงาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="tel" id="employee_tel" name="employee_tel" value="<?=$employee_tel;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>
                            
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_type">ตำแหน่ง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="employee_type" name="employee_type" value="<?=$employee_type;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>
                            
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_datetime">วันเกิด<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="employee_datetime" name="employee_datetime" value="<?=$employee_datetime;?>" required="required"class="form-control col-md-7 col-xs-12"> </div>
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
                            $employee_id=$_POST['employee_id'];
                            $employee_name=$_POST['employee_name'];
                            $employee_add=$_POST['employee_add'];
                            $employee_tel=$_POST['employee_tel'];
                            $employee_type=$_POST['employee_type'];
                            $employee_datetime=$_POST['employee_datetime'];
                            
                            $sql=" update tb_employee";
                            $sql.=" set";
                            $sql.=" employee_name='$employee_name'";
                            $sql.=" ,employee_add='$employee_add'";
                            $sql.=" ,employee_tel='$employee_tel'";
                            $sql.=" ,employee_type='$employee_type'";
                            $sql.=" ,employee_datetime='$employee_datetime'";
                            $sql.=" where";
                            $sql.=" employee_id=$employee_id";
                             
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(1,'show_employee.php');
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