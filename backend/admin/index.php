<?php include('header.php');?>
         

<div class="right_col" role="main">

              <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="x_panel">
                            <div class="x_title">
                                   <h2>แสดงข้อมูล</h2>
                                   <ul class="nav navbar-right panel_toolbox">
                                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                          </li>

                                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                                          </li>
                                   </ul>
                                   <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                   <p class="text-muted font-13 m-b-30">
                                   <table id="datatable-buttons" class="table table-striped table-bordered">
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
                                                 $sql = " select * from tb_log";
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
                                          </tbody>
                                   </table>
                            </div>
                     </div>
              </div>

           
</div>
<?php include('footer.php');?>
