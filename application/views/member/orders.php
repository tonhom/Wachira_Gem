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
                        <h3 class="ui header">รายการสั่งซื้อของฉัน</h3>
                    </div>
                    <div class="ui segment">
                        <table class="ui celled selectable table">
                            <thead>
                                <tr>
                                    <th>หมายเลขใบสั่งซื้อ</th>
                                    <th>วันที่สั่งซื้อ</th>
                                    <th>ราคา</th>
                                    <th>สถานะ</th>
                                    <th>เพิ่มเติม</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($orders as $order) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $order->order_number ?>
                                        </td>
                                        <td>
                                            <?= $DateTime->ToThaiDate($order->order_date_order, TRUE) ?>
                                        </td>
                                        <td>
                                            <?= number_format($order->order_total_price) ?>
                                        </td>
                                        <td style="color : <?=$order->order_status == "รอการชำระเงิน" ? "orange" : "inherit"?>">
                                            <?php
                                            echo $order->order_status;
//                                            if ($IPayment->CheckPaymentPaid($order->order_number)) {
//                                                echo "ชำระแล้ว";
//                                            } else {
//                                                
//                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?= site_url("order/details/{$order->order_id}") ?>">รายละเอียด</a> 
                                            <?php
                                            if ($order->order_status == "รอการชำระเงิน") {
                                                ?>
                                                | <a href="<?= site_url("payment/confirm/{$order->order_number}") ?>">แจ้งชำระเงิน</a>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>