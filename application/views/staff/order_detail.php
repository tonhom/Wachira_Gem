<div class="ui container" style="margin-top: 58px;">
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
                        <?= number_format($order->order_total_price) ?>
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
            <a class="ui button" href="<?= site_url("staff/main") ?>">
                <i class="arrow left icon"></i>
                กลับ
            </a>
            <a class="ui button" href="<?= site_url("staff/order/printOrder/{$order->order_id}") ?>">
                <i class="print icon"></i>
                พิมพ์
            </a>
        </div>
    </div>
</div>
