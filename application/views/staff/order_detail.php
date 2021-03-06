<?php
$payment = $IPayment->GetPayment($order->order_id);
$member = $IMember->GetMemberInfo($order->member_id);
?>
<div class="ui container" style="margin-top: 58px;">
    <div class="ui segments">
        <div class="ui segment">
            <h3 class="ui header">
                ใบรายการสั่งซื้อเลขที่ : <?= $order->order_id ?>
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
                <div class="ui <?= $order->order_status == 1 ? "orange" : "" ?> tiny statistic">
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
