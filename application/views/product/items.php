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
                                <a href="<?= site_url("product/category/{$item->id}") ?>" class="header"><?= $item->name ?></a>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="twelve wide column">
                <div class="ui segment">
                    <?php
                    $totalData = count($products);
                    $totalRow = ceil($totalData / 3);
                    if ($totalData > 0) {
                        ?>
                        <div class="ui grid four column">
                            <?php
                            foreach ($products as $item) {
                                ?>
                                <div class="column">
                                    <div class="ui card">
                                        <a class="image" href="<?= site_url("product/view/{$item->id}") ?>">
                                            <img src="<?= base_url("images/{$item->imgDir}/{$item->thumbnail}") ?>">
                                        </a>
                                        <div class="content">
                                            <a class="header" href="<?= site_url("product/view/{$item->id}") ?>"><?= $item->name ?></a>
                                            <div class="meta">
                                                <a><?= $item->description ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="ui segment">
                            <h3 class="ui header">ไม่พบรายการใดๆ</h3>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>