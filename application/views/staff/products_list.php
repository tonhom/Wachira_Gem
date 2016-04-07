<div class="ui container" style="margin-top: 58px;">
    <?php
    if ($this->session->flashdata("success") != "") {
        ?>
        <div class="ui positive message">
            <i class="close icon"></i>
            <div class="header">
                ดำเนินการสำเร็จ
            </div>
            <p>
                <?= $this->session->flashdata("success") == 1 ? "เพิ่มสินค้าสำเร็จ" : "แก้ไขข้อมูลสินค้าสำเร็จ" ?>
            </p>
        </div>
        <?php
    }
    ?>
    <div class="ui horizontal segments">
        <div class="ui segment">
            <form class="ui form" action="<?= site_url("staff/product/collection/{$filter["currentPage"]}") ?>" method="get">
                <div class="ui fluid icon input">
                    <i class="search icon"></i>
                    <input type="text" placeholder="ค้นหา..." name="q" />
                </div>
            </form>
        </div>
        <div class="ui segment">
            <a href="<?= site_url("staff/product/add") ?>" class="ui labeled icon primary button">
                <i class="add icon"></i>
                เพิ่มสินค้า
            </a>
        </div>
    </div>
    <div class="ui grid five column">
        <?php
        foreach ($products as $item) {
            ?>
            <div class="column">
                <div class="ui card">
                    <div class="image">
                        <img src="<?= base_url("images/{$item->product_imgDir}/{$item->product_thumbnail}") ?>">
                    </div>
                    <div class="content">
                        <div class="header"><?= $item->product_name ?></div>
                        <div class="meta">
                            <span><?= $item->product_description ?></span>
                        </div>
                    </div>
                    <div class="extra content">
                        <div class="ui two buttons">
                            <a href="<?= site_url("staff/product/edit/{$item->product_id}") ?>" class="ui green button">แก้ไข</a>
                            <a href="<?= site_url("staff/product/remove/{$item->product_id}") ?>" onclick="return confirm('ยืนยันการลบ')" class="ui button">ลบ</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
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