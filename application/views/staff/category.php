<?php
$isEdit = false;
if (!isset($dataEdit)) {
    $dataEdit = [];
} else {
    $isEdit = true;
}
?>
<div class="ui container" style="margin-top: 58px;">
    <form class="ui form" action="<?= site_url("staff/category/save") ?>" method="post">
        <input type="hidden" name="id" value="<?= getValDefault($dataEdit, "id") ?>" />
        <div class="ui segments">
            <div class="ui <?=$isEdit? "green inverted" : ""?> segment">
                <?php
                if ($isEdit) {
                    ?>
                    <h2 class="ui header">แก้ไขประเภทสินค้า</h2>
                    <?php
                } else {
                    ?>
                    <h2 class="ui pink header">เพิ่มประเภทสินค้า</h2>
                    <?php
                }
                ?>
            </div>
            <div class="ui segment two column grid">
                <div class="column">
                    <div class="field">
                        <label>ชื่อประเภทสินค้า</label>
                        <input type="text" name="name" placeholder="กรุณาระบุชื่อประเภทสินค้า" value="<?= getValDefault($dataEdit, "name") ?>" required="" />
                        <br /><br />
                        <button type="submit" class="ui primary button">บันทึก</button>
                        <a href="<?= site_url("staff/category/") ?>" class="ui button">ยกเลิก</a>
                    </div>
                </div>
                <div class="column">

                </div>
            </div>
        </div>
    </form>
    <table class="ui selectable celled table">
        <thead>
            <tr>
                <th style="width: 80px; max-width: 80px;text-align: center;">ลำดับ</th>
                <th>ชื่อประเภท</th>
                <th style="width:200px; max-width: 200px; text-align: left;">ดำเนินการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($category as $item) {
                ?>
                <tr>
                    <td style="text-align: center;"><?= $count++ ?></td>
                    <td><?= $item->name ?></td>
                    <td style="text-align: left;">
                        <div class="ui buttons">
                            <a href="<?= site_url("staff/category/edit/{$item->id}") ?>" class="ui button primary">แก้ไข</a>
                            <?php
                            if ($model->InUse($item->id)) {
                                ?>
                                <a href="javascript:;" class="ui disabled orange button">ลบ</a>
                                <?php
                            } else {
                                ?>
                                <a href="<?= site_url("staff/category/remove/{$item->id}") ?>" class="ui orange button">ลบ</a>
                                <?php
                            }
                            ?>
                        </div>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
