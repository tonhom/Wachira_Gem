<div class="ui container" style="margin-top: 58px;">
    <div class="ui segments">
        <div class="ui segment">
            <h3 class="ui header">
                การจัดส่ง
            </h3>
        </div>
        <div class="ui segment">
            <form action="<?= site_url("staff/shipping/") ?>" method="get" class="form">
                <div class="ui labeled action input">
                    <div class="ui label">เลขที่รายการสั่งซื้อ</div>
                    <input type="text" name="order_id" value="<?= $order_id ?>" />
                    <button type="submit" class="ui primary button">
                        <i class="search icon"></i>
                        ค้นหา
                    </button>
                </div>
            </form>
        </div>
        <div class="ui segment">
            <table class="ui selectable celled table">
                <thead>
                    <tr>
                        <th>เลขที่รายการสั่งซื้อ</th>
                        <th>ลูกค้า</th>
                        <th>
                            วันที่สั่งซื้อ
                        </th>
                        <th>ดำเนินการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($shipping as $item) {
                        ?>
                        <tr>
                            <td>
                                <?= $item->order_id ?>
                            </td>
                            <td><?= $item->member_full_name ?></td>
                            <td><?= $DateTime->ToThaiDate($item->order_date_order, TRUE) ?></td>
                            <td>
                                <a href="<?= site_url("staff/shipping/ship/{$item->order_id}") ?>" class="ui button" onclik='return confirm("ยืนยันการจัดส่ง")'>
                                    <?php
                                    if ($item->order_status == 2) {
                                        ?>
                                        <i class="shipping icon"></i>
                                        จัดส่ง
                                        <?php
                                    } else if ($item->order_status == 1) {
                                        ?>
                                        <i class="book icon"></i>
                                        รายละเอียด
                                        <?php
                                    } else if ($item->order_status == 3) {
                                        ?>
                                        <span style="color: green">
                                            <i class="check icon"></i> แจ้งการจัดส่งแล้ว
                                        </span>
                                        <?php
                                    } else {
                                        ?>
                                        <span style="color: red">
                                            <i class="ban icon"></i> ไม่ชำระเงินภายใน 7 วัน
                                        </span>
                                        <?php
                                    }
                                    ?>
                                </a>
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

