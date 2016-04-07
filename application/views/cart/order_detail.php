<div class="ui container padded1em-top">
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
                                <a href="<?= site_url("product/category/{$item->id}") ?>" class="header"><?= $item->name ?></a>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="twelve wide column">
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
                                    $total = $info->price * $amount;
                                    $totalAll += $total;
                                    ?>
                                    <tr>
                                        <td>
                                            <a href="<?= site_url("product/view/{$id}") ?>"><?= $info->name ?></a>
                                        </td>
                                        <td>
                                            <?= $amount ?> ชิ้น
                                        </td>
                                        <td>
                                            <?= number_format($total) ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>

                                <tr class="positive">
                                    <td colspan="2" style='text-align: right;'>
                                        <h4 class="ui header">รวมเป็นเงินทั้งหมด</h4>
                                    </td>
                                    <td><strong><?= number_format($totalAll) ?></strong></td>
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
                        <a href="<?= site_url("cart/clear") ?>" class="ui orange button">ยกเลิก</a>
                        <a href="<?= site_url("cart/confirmOrder") ?>" class="ui primary button">สั่งซื้อสินค้า</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>