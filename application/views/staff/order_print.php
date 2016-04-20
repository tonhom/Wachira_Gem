<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Wachira Gem&Jewelry</title>
        <link rel="stylesheet" type="text/css" href="<?= base_url("asset/css/semantic.min.css") ?>"/>
    </head>
    <body>
        <?php
        $member = $IMember->GetMemberInfo($order->member_id);
        ?>
        <div class="ui segments">
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
                <a class="ui button" href="<?= site_url("staff/order/detail/{$order->order_id}") ?>">
                    <i class="arrow left icon"></i>
                    กลับ
                </a>
                <a class="ui button" href="javascript:window.print();">
                    <i class="print icon"></i>
                    พิมพ์
                </a>
            </div>
        </div>
    </body>
</html>