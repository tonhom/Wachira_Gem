<div class="ui container" style="margin-top: 58px;">
    <div class="ui segments">
        <div class="ui segment">
            <h3 class="ui header">
                ข้อความติดต่อเรา
            </h3>
        </div>
        <div class="ui segment" style="min-height: 450px;">
            <?php
            if ($this->session->flashdata("success") != "") {
                ?>
                <div class="ui positive icon  message">
                    <i class="check icon"></i>
                    <div class="content">
                        <div class="header">
                            ดำเนินการสำเร็จ
                        </div>
                        <p>ระบบได้ลบข้อความการติดต่อแล้ว</p>
                    </div>
                </div>
                <?php
            }
            ?>
            <table class="ui selectable celled table">
                <thead>
                    <tr>
                        <th>หัวข้อ</th>
                        <th>ผู้ติดต่อ</th>
                        <th>อีเมล์</th>
                        <th>รายละเอียด</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($messages as $item) {
                        ?>
                        <tr>
                            <td>
                                <?= $item->contact_title ?>
                            </td>
                            <td>
                                <?= $item->contact_full_name ?>
                            </td>
                            <td>
                                <?= $item->contact_email ?>
                            </td>
                            <td>
                                <?php
                                echo nl2br($item->contact_detail);
                                ?>
                            </td>
                            <td>
                                <a class="ui labeld icon basic orange button" onclick="return confirm('ยืนยันการลบ? ');" href="<?= site_url("staff/message/delete/{$item->contact_id}") ?>">
                                    <i class="delete icon"></i> ลบ
                                </a>
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
