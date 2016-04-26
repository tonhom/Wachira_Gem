<div class="ui container padded1em">
    <div class="ui segments" style="min-height: 200px;">
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
                                <?= $order->order_id ?>
                            </td>
                            <td>
                                <?= $DateTime->ToThaiDate($order->order_date_order, TRUE) ?>
                            </td>
                            <td>
                                <?= number_format($order->order_total_price, 2) ?>
                            </td>
                            <td style="color : <?= $order->order_status == 1 ? "orange" : "inherit" ?>">
                                <?php
                                echo order_status($order->order_status);
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
                                if ($order->order_status == 1) {
                                    ?>
                                    | <a href="<?= site_url("payment/confirm/{$order->order_id}") ?>">แจ้งชำระเงิน</a>
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