<?php
$payment = $IPayment->GetPayment($order->order_number);
$member = $IMember->GetMemberInfo($order->member_id);
?>
<div class="ui container" style="margin-top: 58px;">
    <div class="ui segments" style="min-height: 500px;">
        <div class="ui segment">
            <h3 class="ui header">
                เลขที่ใบสั่งซื้อ : <?= $order->order_number ?>
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
        if ($order->order_status != "รอการชำระเงิน") {
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
                            <td><?= number_format($payment->payment_amount) ?></td>
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
                        ราคารวมทั้งหมด
                    </div>
                    <div class="value">
                        <?= number_format($order->order_total_price) ?>
                    </div>
                </div>
            </div>
            <div class="ui segment">
                <div class="ui <?= $order->order_status == "รอการชำระเงิน" ? "orange" : "" ?> <?= $order->order_status == "จัดส่งแล้ว" ? "green" : "" ?> tiny statistic">
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
            <a class="ui button" href="<?= site_url("staff/shipping?order_number={$order->order_number}") ?>">
                <i class="arrow left icon"></i>
                กลับ
            </a>
            <?php
            if ($order->order_status == "รอการจัดส่ง") {
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
