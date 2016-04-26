<?php
$payment = $IPayment->GetPayment($order->order_id);
$member = $IMember->GetMemberInfo($order->member_id);
?>
<div class="ui container" style="margin-top: 58px;">
    <div class="ui segments" style="min-height: 500px;">
        <div class="ui segment">
            <h3 class="ui header">
                เลขที่ใบสั่งซื้อ : <?= $order->order_id ?>
            </h3>
        </div>
        <div class="ui horizontal segments" style="background-color: #fff;">
            <div class="ui segment">
                <h4 class="ui header">ข้อมูลลูกค้า</h4>
                ชื่อลูกค้า : <?= $member->member_full_name ?> <br />
                อีเมล์ : <?= $member->member_email ?><br />
                เบอร์โทรติดต่อ : <?= $member->member_tel ?>
            </div>
            <div class="ui segment">
                <h4 class="ui header">ที่อยู่สำหรับจัดส่ง</h4>
                ที่อยู่ : <?= $member->member_address ?>
            </div>
        </div>
        <?php
        if ($order->order_status != 1 && $order->order_status != 4) {
            ?>
            <div class="ui segment">
                <h4 class="ui header">รายละเอียดการชำระเงิน</h4>
                <table class="ui table celled selectable">
                    <thead>
                        <tr>
                            <th>ธนาคาร</th>
                            <th>จำนวนที่ชำระ</th>
                            <th>วันเวลาที่ชำระ</th>
                            <th>สลิปการโอนเงิน</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $payment->payment_bank ?> <?= !empty($payment->payment_branch) ? "สาขา" . $payment->payment_branch : "" ?></td>
                            <td><?= number_format($payment->payment_amount, 2) ?></td>
                            <td><?= $DateTime->ToThaiDate($payment->payment_date_transfer) ?> <?= !empty($payment->payment_time_transfer) ? $payment->payment_time_transfer : "" ?></td>
                            <td>
                                <?php
                                if (!empty($payment->payment_evidence)) {
                                    ?>
                                    <a target="_blank" href="<?= base_url("content/slip_transfer/{$payment->payment_evidence}") ?>">
                                        <i class="picture icon"></i>
                                    </a>
                                    <?php
                                } else {
                                    ?>
                                    <i class="ban icon"></i>
                                    <?php
                                }
                                ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <?php
        }
        ?>
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
                        ราคารวมภาษีมูลค่าเพิ่ม
                    </div>
                    <div class="value">
                        <?= number_format($order->order_total_price, 2) ?>
                    </div>
                </div>
            </div>
            <div class="ui segment">
                <div class="ui <?= $order->order_status == 1 ? "orange" : "" ?> <?= $order->order_status == 3 ? "green" : "" ?> <?= $order->order_status == 4 ? "red" : "" ?> tiny statistic">
                    <div class="label">
                        สถานะ
                    </div>
                    <div class="value">
                        <?= order_status($order->order_status) ?>
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
                    $totalAll = 0;
                    foreach ($detail as $row) {
                        $totalAll += $row->product_price * $row->order_detail_amount;
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
                    <tr class="positive">
                        <td colspan="3" style='text-align: right;'>
                            <h4 class="ui header">ราคารวมสุทธิ</h4>
                        </td>
                        <td><strong><?= number_format($totalAll, 2) ?></strong></td>
                    </tr>
                    <tr class="positive">
                        <td colspan="3" style='text-align: right;'>
                            <h4 class="ui header">ภาษี</h4>
                        </td>
                        <td><strong><?= number_format($totalAll * 0.07, 2) ?></strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="ui segment">
            <a class="ui button" href="<?= site_url("staff/shipping?order_id={$order->order_id}") ?>">
                <i class="arrow left icon"></i>
                กลับ
            </a>
            <?php
            if ($order->order_status == 2) {
                ?>
                <a class="ui labeled icon primary button" onclick="return confirm('ยืนยันแจ้งการจัดส่ง')" href="<?= site_url("staff/shipping/shiped/{$order->order_id}") ?>">
                    <i class="check circle icon"></i> แจ้งการจัดส่ง
                </a>
                <?php
            }
            ?>
        </div>
    </div>
</div>
