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
                <?= ($isEdit ? "แก้ไขข้อมูลินค้า : {$info->product_name}" : "เพิ่มสินค้า") ?>
            </h3>
        </div>
        <div class="ui segment">
            <form class="ui form" action="<?= site_url("staff/product/save") ?>" method="post">
                <input type="hidden" name="product_id" value="<?= getValDefault($info, "product_id") ?>" />
                <div class="two field fields">
                    <div class="field">
                        <label>ชื่อสินค้า</label>
                        <input type="text" name="product_name" placeholder="" required="" value="<?= getValDefault($info, "product_name") ?>" />
                    </div>
                    <div class="field">
                        <label>คำอธิบายสั้นๆ</label>
                        <input type="text" name="product_description" placeholder="" required="" value="<?= getValDefault($info, "product_description") ?>" />
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
                                    <div class="item" data-value="<?= $item->category_id ?>"><?= $item->category_name ?></div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>ราคาต่อชิ้น</label>
                        <input type="text" name="product_price" placeholder="" required="" value="<?= getValDefault($info, "product_price") ?>" />
                    </div>
                </div>
                <div class="two field fields">
                    <div class="field">
                        <label>ชื่ออัลบั้ม</label>
                        <input type="text" name="product_imgDir" placeholder="" required="" value="<?= getValDefault($info, "product_imgDir") ?>" />
                    </div>
                    <div class="field">
                        <label>ไฟล์รูป Thumbnail</label>
                        <input type="text" name="product_thumbnail" placeholder="" required="" value="<?= getValDefault($info, "product_thumbnail") ?>" />
                    </div>
                </div>
                <div class=" inline field">
                    <label>จำนวนสินค้าใน Stock</label>
                    <input type="number" name="product_stock" min="0" value="<?= getValDefault($info, "product_stock") == "" ? "0" : getValDefault($info, "product_stock") ?>" />
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