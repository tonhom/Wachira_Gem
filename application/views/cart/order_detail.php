<div class="ui container padded1em-top">
    <div class="ui segments">
        <div class="ui fluid top attached steps">
            <div class="completed step">
                <i class="cart icon"></i>
                <div class="content">
                    <div class="title">ช็อปปิ้ง</div>
                    <div class="description">เลือกสินค้าเข้าตะกร้า</div>
                </div>
            </div>
            <div class="completed step">
                <i class="list icon"></i>
                <div class="content">
                    <div class="title">ระบุรายการจัดส่ง</div>
                    <div class="description">จัดการสินค้าในตะกร้าของคุณ</div>
                </div>
            </div>
            <div class="active step">
                <i class="info circle icon"></i>
                <div class="content">
                    <div class="title">ยืนยันการสั่งซื้อ</div>
                    <div class="description">ตรวจสอบข้อมูลการสั่งซื้อของคุณ</div>
                </div>
            </div>
        </div>
        <div class="ui segment">
            <div class='ui header'>ข้อมูลการจัดส่ง</div>
            <table class="ui selectable celled table">
                <thead>
                    <tr>
                        <th>ชื่อสินค้า</th>
                        <th>จำนวน</th>
                        <th>ราคา (บาท)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalAll = 0;
                    foreach ($items as $id => $amount) {
                        $info = $instantProduct->GetById($id);
                        $total = $info->product_price * $amount;
                        $totalAll += $total;
                        ?>
                        <tr>
                            <td>
                                <a href="<?= site_url("product/view/{$id}") ?>"><?= $info->product_name ?></a>
                            </td>
                            <td>
                                <?= $amount ?> ชิ้น
                            </td>
                            <td>
                                <?= number_format($total, 2) ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>

                    <tr class="positive">
                        <td colspan="2" style='text-align: right;'>
                            <h4 class="ui header">ราคารวมสุทธิ</h4>
                        </td>
                        <td><strong><?= number_format($totalAll, 2) ?></strong></td>
                    </tr>
                    <tr class="positive">
                        <td colspan="2" style='text-align: right;'>
                            <h4 class="ui header">ราคารวมภาษีมูลค่าเพิ่ม 7%</h4>
                        </td>
                        <td><strong><?= number_format(($totalAll * 107) / 100, 2) ?></strong> (Vat. 7% = <?= number_format($totalAll * 0.07, 2) ?>)</td>
                    </tr>
                </tbody>
            </table>
            <div class='ui header'>โอนเงินผ่านธนาคาร</div>
            <div class='ui divided relaxed list'>
                <div class='item'>
                    ธนาคารกรุงไทย
                    สาขาวิภาวดี-รังสิต2
                    ชื่อบัญชี : นายพีรพล วชิรชูเกียรติ

                    ประเภท : ออมทรัพย์

                    เลขที่บัญชี : 980-969675-2
                </div>
                <div class='item'>
                    ธนาคารออมสิน
                    สาขาเซนทรัลพระราม3
                    ชื่อบัญชี : นายพีรพล วชิรชูเกียรติ

                    ประเภท : ออมทรัพย์

                    เลขที่บัญชี : 048-0-312578
                </div>
            </div>
        </div>
        <div class="ui center aligned segment">
            <a href="<?= site_url("cart/items") ?>" class="ui button">ย้อนกลับ</a>
            <a href="<?= site_url("cart/clear") ?>" onclick="return confirm('หากยกเลิกระบบจะล้างตะกร้า\ยืนยัน?')" class="ui orange button">ยกเลิก</a>
            <a href="<?= site_url("cart/confirmOrder") ?>" class="ui primary button">สั่งซื้อสินค้า</a>
        </div>
    </div>
</div>