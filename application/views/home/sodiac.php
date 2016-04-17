<div class="ui container padded1em-top">
    <div class="ui grid">
        <div class="row">
            <div class="four wide column">
                <div class="ui stacked segment" style="min-height: 300px;">
                    <h3 class="ui header">หมวดรายการสินค้า</h3>
                    <div class="ui middle aligned divided relaxed list">
                        <?php
                        foreach ($category as $item) {
                            ?>
                            <div class="item">
                                <a href="<?= site_url("product/category/{$item->category_id}") ?>" class="header"><?= $item->category_name ?></a>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="twelve wide column">
                <div class="ui segments">
                    <div class="ui segment">
                        <h3 class="ui header">
                            อัญมณีประจำราศี
                        </h3>
                    </div>
                    <div class='ui segment'>
                        <img src='<?= base_url("asset/img/sodiac.png") ?>' class='ui image' />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
