<?php include('header.php');?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>ข้อมูลสมาชิก</h2>
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
                                for="employee_name">ชื่อพนักงาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="employee_name" name="employee_name" required="required"
                                    class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_add">ที่อยู่<span
                                    class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="employee_add" name="employee_add" required="required"
                                    class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                for="employee_tel">เบอร์โทรศัพท์<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="tel" id="employee_tel" name="employee_tel" required="required"
                                    class="form-control col-md-7 col-xs-12">
                            </div>
                            <script>
                            function number() {
                                if (isNaN(employee_tel.value)) {
                                    alert("Please Insert Numbers Only");
                                    return false;
                                }
                            }
                            </script>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_type">ตำแหน่ง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="employee_type" name="employee_type" value="<?=$employee_type;?>"  required="required" class="form-control col-md-7 col-xs-12">
                                <option value="chef">chef</option>       
                                <option value="Service">Service</option>
                                <option value="Rider">Rider</option>

                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                for="employee_datetime">วันเกิด<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="datetime-local" id="employee_datetime" name="employee_datetime"
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
                        if(isset($_POST['submit']))
                        {
                            $employee_name=$_POST['employee_name'];
                            $employee_add=$_POST['employee_add'];
                            $employee_tel=$_POST['employee_tel'];
                            $employee_type=$_POST['employee_type'];
                            $employee_datetime=$_POST['employee_datetime'];
                           
                            $sql=" insert into tb_employee(employee_name,employee_add,  employee_tel,  employee_type, employee_datetime)";
                            $sql.=" values ('$employee_name','$employee_add','$employee_tel','$employee_type','$employee_datetime')";

                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(1,'show_employee.php');
                            }
                            else
                            {
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