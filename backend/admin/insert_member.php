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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="member_name">ชื่อสมาชิก<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="member_name" name="member_name" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="member_add">ที่อยู่<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="member_add" name="member_add" required="required" class="form-control col-md-7 col-xs-12">                            
                            </div>                            
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="member_tel">เบอร์โทรศัพท์<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="tel" id="member_tel" name="member_tel" required="required" class="form-control col-md-7 col-xs-12"> </div>
                                <script>
                                    function number(){
                                        if(isNaN(member_tel.value)){
                                            alert("Please Insert Numbers Only");
                                            return false;
                                        }
                                    }
                                </script>
                        </div>
                               
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="member_username">username<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="member_username" name="member_username" required="required" class="form-control col-md-7 col-xs-12"> </div>
                                <script>
                                        function checkText(){
                                            var text = document.getElementById('member_username').value;
                                            if(text.search(/[^a-zA-Z0-9\_@]/) !== -1 ) {
                                                alert('Can Only Be Specified A-Z,a-z,0-9 and _ @');
                                                document.getElementById('member_username').value = "";
                                                return false;
                                            }
                                        }
                                    </script>

                        </div>    

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="member_password">รหัสผ่าน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="member_password" name="member_password" required="required" class="form-control col-md-7 col-xs-12"> </div>
                                <script>
                                        function checkPass(){
                                            var text = document.getElementById('member_password').value;
                                            if(text.search(/[^a-zA-Z0-9\_@]/) !== -1 ) {
                                                alert('Can Only Be Specified A-Z,a-z,0-9 and _ @');
                                                document.getElementById('member_password').value = "";
                                                return false;
                                            }
                                        }
                                    </script>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="member_datetime">วันเกิด<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="datetime-local" id="member_datetime" name="member_datetime" required="required" class="form-control col-md-7 col-xs-12"> </div>
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
                            $member_name=$_POST['member_name'];
                            $member_add=$_POST['member_add'];
                            $member_tel=$_POST['member_tel'];
                            $member_username=$_POST['member_username'];
                            $member_password=$_POST['member_password'];
                            $member_datetime=$_POST['member_datetime'];
                          
                          
                            
                            $sql=" insert into tb_member(member_name,member_add,  member_tel, member_username,member_password, member_datetime)";
                            $sql.=" values ('$member_name','$member_add','$member_tel','$member_username','$member_password','$member_datetime')";
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(1,'show_member.php');
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