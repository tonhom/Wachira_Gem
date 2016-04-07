<?php
$isEdit = false;
if (!isset($info)) {
    $info = [];
} else {
    $isEdit = true;
}
?>
<div class="ui container" style="margin-top: 58px;">
    <div class="ui segments">
        <div class="ui <?= $isEdit ? "inverted green" : "" ?> segment">
            <h3 class="ui header">
                <?= ($isEdit ? "แก้ไขข้อมูลินค้า : {$info->name}" : "เพิ่มสินค้า") ?>
            </h3>
        </div>
        <div class="ui segment">
            <form class="ui form" action="<?= site_url("staff/product/save") ?>" method="post">
                <input type="hidden" name="id" value="<?= getValDefault($info, "id") ?>" />
                <div class="two field fields">
                    <div class="field">
                        <label>ชื่อสินค้า</label>
                        <input type="text" name="name" placeholder="" required="" value="<?= getValDefault($info, "name") ?>" />
                    </div>
                    <div class="field">
                        <label>คำอธิบายสั้นๆ</label>
                        <input type="text" name="description" placeholder="" required="" value="<?= getValDefault($info, "description") ?>" />
                    </div>
                </div>

                <div class="two field fields">
                    <div class="field">
                        <label>ประเภท</label>
                        <div class="ui search selection dropdown">
                            <input type="hidden" name="category_id">
                            <i class="dropdown icon"></i>
                            <div class="default text">เลือกประเภทของสินค้า</div>
                            <div class="menu">
                                <?php
                                $cat = getValDefault($info, "category_id");
                                foreach ($category as $item) {
                                    ?>
                                    <div class="item" data-value="<?= $item->id ?>"><?= $item->name ?></div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>ราคาต่อชิ้น</label>
                        <input type="text" name="price" placeholder="" required="" value="<?= getValDefault($info, "price") ?>" />
                    </div>
                </div>
                <div class="two field fields">
                    <div class="field">
                        <label>ชื่ออัลบั้ม</label>
                        <input type="text" name="imgDir" placeholder="" required="" value="<?= getValDefault($info, "imgDir") ?>" />
                    </div>
                    <div class="field">
                        <label>ไฟล์รูป Thumbnail</label>
                        <input type="text" name="thumbnail" placeholder="" required="" value="<?= getValDefault($info, "thumbnail") ?>" />
                    </div>
                </div>
                <button type="submit" class="ui primary button">บันทึกข้อมูล</button>
            </form>
        </div>
    </div>
</div>

<script>
    $(function () {
        $(".ui.dropdown").dropdown('set selected', '<?= $cat ?>');
    });
</script>