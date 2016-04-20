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
                <div class="ui segments">
                    <div class="ui segment">
                        <h3 class="ui header">
                            ใบรายการสั่งซื้อเลขที่ : <?= $order->order_number ?>
                        </h3>
                    </div>
                    <div class="ui horizontal segments" style="background-color: #fff;">
                        <div class="ui segment">
                            <div class="ui mini statistic">
                                <div class="label">
                                    วันที่สั่งซื้อ
                                </div>
                                <div class="value">
                                    <?= $DateTime->ToThaiDate($order->order_date_order, TRUE) ?>
                                </div>
                            </div>
                        </div>
                        <div class="ui segment">
                            <div class="ui tiny statistic">
                                <div class="label">
                                    ราคารวมทั้งหมด
                                </div>
                                <div class="value">
                                    <?= number_format($order->order_total_price, 2) ?>
                                </div>
                            </div>
                        </div>
                        <div class="ui segment">
                            <div class="ui <?= $order->order_status == "รอการชำระเงิน" ? "orange" : "" ?> tiny statistic">
                                <div class="label">
                                    สถานะ
                                </div>
                                <div class="value">
                                    <?= $order->order_status ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui segment">
                        <table class="ui selectable celled table">
                            <thead>
                                <tr>
                                    <th colspan="4">รายการสินค้า</th>
                                </tr>
                                <tr>
                                    <th>ชื่อสินค้า</th>
                                    <th>รายละเอียด</th>
                                    <th>จำนวน</th>
                                    <th>ราคารวม</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($detail as $row) {
                                    ?>
                                    <tr>
                                        <td><?= $row->product_name ?></td>
                                        <td><?= $row->product_description ?></td>
                                        <td><?= $row->order_detail_amount ?></td>
                                        <td><?= number_format($row->product_price * $row->order_detail_amount) ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="ui segment">
                        <a class="ui button" href="<?= site_url("member/myorder") ?>">
                            <i class="arrow left icon"></i>
                            กลับ
                        </a>
                        <a class="ui button" href="<?= site_url("order/printOrder/{$order->order_id}") ?>">
                            <i class="print icon"></i>
                            พิมพ์
                        </a>
                        <?php
                        if($order->order_status == "รอการชำระเงิน"){
                            ?>
                        <a class="ui primary button" href="<?=  site_url("payment/confirm/{$order->order_number}")?>">
                            <i class="check circle icon"></i>
                            แจ้งชำระเงิน
                        </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
