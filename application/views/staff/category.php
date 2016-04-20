<?php
$isEdit = false;
if (!isset($dataEdit)) {
    $dataEdit = [];
} else {
    $isEdit = true;
}
?>
<div class="ui container" style="margin-top: 58px;">
    <?php
    if ($this->session->flashdata("success") != "") {
        $message = $this->session->flashdata("success");
        ?>
        <div class="ui positive icon message">
            <i class="close icon"></i>
            <i class="check circle icon"></i>
            <div class="content">
                <div class="ui header">ดำเนินการสำเร็จ</div>
                <p><?= $message ?></p>
            </div>
        </div>
        <?php
    }
    ?>
    <form class="ui form" action="<?= site_url("staff/category/save") ?>" method="post">
        <input type="hidden" name="category_id" value="<?= getValDefault($dataEdit, "category_id") ?>" />
        <div class="ui segments">
            <div class="ui <?= $isEdit ? "green inverted" : "" ?> segment">
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
                        <input type="text" name="category_name" placeholder="กรุณาระบุชื่อประเภทสินค้า" value="<?= getValDefault($dataEdit, "category_name") ?>" required="" />
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
                    <td><?= $item->category_name ?></td>
                    <td style="text-align: left;">
                        <div class="ui buttons">
                            <a href="<?= site_url("staff/category/edit/{$item->category_id}") ?>" class="ui button primary">แก้ไข</a>
                            <?php
                            if ($model->InUse($item->category_id)) {
                                ?>
                                <a href="javascript:;" class="ui disabled orange button">ลบ</a>
                                <?php
                            } else {
                                ?>
                                <a href="<?= site_url("staff/category/remove/{$item->category_id}") ?>" class="ui orange button">ลบ</a>
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


<script>
    $(function () {
        $('.message .close')
                .on('click', function () {
                    $(this)
                            .closest('.message')
                            .transition('fade')
                            ;
                })
                ;
    });
</script>