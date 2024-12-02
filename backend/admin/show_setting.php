<?php session_start(); ?>
<?php include('header.php');
?>
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>แสดงข้อมูลการตั้งค่า</h2>
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
                <div align="right">
                    <a href="insert_device.php">
                        <button>เพิ่มข้อมูล</button>
                    </a>
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>รหัสสมาชิก</th>
                            <th>ค่าหัวใจต่ำ</th>
                            <th>ค่าหัวใจสูง</th>
                            <th>api line</th>
                            <th>รหัสผู้ใช้</th>
                            <th>วันที่ใช้งาน</th>
                            <th>สถานะการเต้นของหัวใจ</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT
                            tb_setting.*,
                            tb_realtime_data.realtime_bpm,
                            tb_realtime_data.realtime_falling
                        FROM
                            tb_setting
                        INNER JOIN
                            tb_realtime_data ON tb_realtime_data.device_uuid = tb_setting.device_uuid";
                       
                        $result = $cls_conn->select_base($sql);
                        while($row = mysqli_fetch_array($result)) {
                            $realtime_bpm = $row['realtime_bpm'];
                            $setting_bpm_min = $row['setting_bpm_min'];
                            $setting_bpm_max = $row['setting_bpm_max'];
                            ?>
                            <tr>
                                <td><?=$row['setting_id'];?></td>
                                <td><?=$row['setting_bpm_min'];?></td>
                                <td><?=$row['setting_bpm_max'];?></td>
                                <td><?=$row['setting_line_token'];?></td>
                                <td><?=$row['member_id'];?></td>
                                <td><?=$row['setting_datetime'];?></td>
                                <td>
                                <?php
                        if ($realtime_bpm <= $setting_bpm_min) {
                            echo "<span style='color: red;'>คุณมีอัตราการเต้นของหัวใจช้ากว่าปกติ!!</span>";
                        } elseif ($realtime_bpm >= $setting_bpm_max) {
                            echo "<span style='color: red;'>คุณมีอัตราการเต้นของหัวใจเร็วกว่าปกติ!!</span>";
                        } else {
                            echo "<span>คุณมีอัตราการเต้นของหัวใจปกติ</span>";
                        }
                        ?>

                                </td>
                                <td>
                                    <a href="update_setting.php?id=<?=$row['setting_id'];?>" onclick="return confirm('คุณต้องการแก้ไขหรือไม่?')"><img src="../../images/edit.png" /></a>
                                </td>
                                <td>
                                    <a href="delete_setting.php?id=<?=$row['setting_id'];?>" onclick="return confirm('คุณต้องการลบหรือไม่?')"><img src="../../images/delete.png" /></a>
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
