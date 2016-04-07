<div class="ui container"  style="margin-top: 58px;">
    <div class="ui segment">
        <h1>ยินดีต้อนรับสู่ระบบจัดการสินค้า</h1>
        <h2>สวัสดีคุณ ...</h2>
    </div>

    <div class="ui two column grid">
        <div class="column">
            <div class="ui segments">
                <div class="ui segment">
                    <h3 class="ui pink header">รายการสั่งซื้อล่าสุด</h3>
                </div>
                <div class="ui segment">
                    <table class="ui table celled selectable">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อลูกค้า</th>
                                <th>วันที่</th>
                                <th>รายละเอียด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            foreach ($lastOrder as $item) {
                                $memberInfo = $instantMember->GetMemberInfo($item->member_id);
                                ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $memberInfo->full_name ?></td>
                                    <td><?= $item->date_order ?></td>
                                    <td>
                                        <a href="<?= site_url("staff/order/detail/{$item->id}") ?>">
                                            <i class="info icon"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>

                            <?php
                            if (empty($lastOrder)) {
                                ?>
                                <tr>
                                    <td colspan="4">
                                        <h3 class="ui header">ไม่พบรายการใดๆ</h3>
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
        <div class="column">
            <div class="ui segments">
                <div class="ui segment">
                    <h3 class="ui pink header">รายการแจ้งชำระเงินล่าสุด</h3>
                </div>
                <div class="ui segment">
                    <table class="ui table celled selectable">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อลูกค้า</th>
                                <th>วันที่</th>
                                <th>รายละเอียด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            foreach ($lastPayment as $item) {
                                //$memberInfo = $instantMember->GetMemberInfo($item->member_id);
                                ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $item->full_name ?></td>
                                    <td><?= $item->date_transfer ?></td>
                                    <td>
                                        <a href="<?= site_url("staff/payment/detail/{$item->id}") ?>">
                                            <i class="info icon"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>

                            <?php
                            if (empty($lastPayment)) {
                                ?>
                                <tr>
                                    <td colspan="4">
                                        <h3 class="ui header">ไม่พบรายการใดๆ</h3>
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