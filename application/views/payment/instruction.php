<div class="ui container padded1em">
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
                <div class="ui segments" style="max-width: 600px;">
                    <div class="ui segment">
                        <h2 class="ui pink header">การชำระเงิน</h2>
                    </div>
                    <div class="ui segment">
                        <div class="ui items">
                            <div class="item">
                                <div class="ui small image">
                                    <img src="<?= base_url("asset/img/6_download_47287_1443415281280.jpg") ?>">
                                </div>
                                <div class="content">
                                    <a class="header">ธนาคารกรุงไทย</a>
                                    <div class="meta">
                                        <span>สาขาวิภาวดี-รังสิต2</span>
                                    </div>
                                    <div class="description">
                                        <p>
                                            ชื่อบัญชี : นายพีรพล วชิรชูเกียรติ</p>
                                        <p>
                                            ประเภท : ออมทรัพย์
                                        </p>
                                        <p>
                                            เลขที่บัญชี : 980-969675-2
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="ui small image">
                                    <img src="<?= base_url("asset/img/spd_2014010703402_b.jpg") ?>">
                                </div>
                                <div class="content">
                                    <a class="header">ธนาคารออมสิน</a>
                                    <div class="meta">
                                        <span>สาขาเซนทรัลพระราม3</span>
                                    </div>
                                    <div class="description">
                                        <p>
                                            ชื่อบัญชี : นายพีรพล วชิรชูเกียรติ</p>
                                        <p>ประเภท : ออมทรัพย์
                                        </p>
                                        <p>
                                            เลขที่บัญชี : 048-0-312578</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>