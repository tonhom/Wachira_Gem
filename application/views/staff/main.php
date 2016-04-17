<div class="ui container"  style="margin-top: 58px;">
    <div class="ui segments">
        <div class="ui segment">
            <h3 class="ui header">รายการคำสั่งซื้อ</h3>
        </div>
        <div class="ui segment">
            <table class="ui table celled selectable">
                <thead>
                    <tr>
                        <th>เลขที่ใบสั่งซื้อ</th>
                        <th>ชื่อลูกค้า</th>
                        <th>วันที่</th>
                        <th>ยอดรวม</th>
                        <th>รายละเอียด</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($lastOrder as $item) {
                        $memberInfo = $instantMember->GetMemberInfo($item->member_id);
                        ?>
                        <tr>
                            <td><?= $item->order_number ?></td>
                            <td><?= $memberInfo->member_full_name ?></td>
                            <td><?= $DateTime->ToThaiDate($item->order_date_order, TRUE) ?></td>
                            <td><?= number_format($item->order_total_price) ?></td>
                            <td>
                                <a class="ui button" href="<?= site_url("staff/order/detail/{$item->order_id}") ?>">
                                    More
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

    <div class="ui segments">
        <div class="ui segment">
            <h3 class="ui header">รายการแจ้งชำระเงิน</h3>
        </div>
        <div class="ui segment">
            <table class="ui table celled selectable">
                <thead>
                    <tr>
                        <th>เลขที่ใบสั่งซื้อ</th>
                        <th>ชื่อลูกค้า</th>
                        <th>ธนาคาร</th>
                        <th>จำนวนที่ชำระ</th>
                        <th>วันเวลาที่ชำระ</th>
                        <th>สลิป</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($lastPayment as $item) {
                        $memberInfo = $instantMember->GetMemberInfo($item->member_id);
                        $orderDetail = $IOrder->GetDetailByOrderNumber($item->order_number);
                        ?>
                        <tr>
                            <td><?= $orderDetail->order_number ?></td>
                            <td><?= $memberInfo->member_full_name ?></td>
                            <td><?= $item->payment_bank ?> <?= !empty($item->payment_branch) ? "สาขา" . $item->payment_branch : "" ?></td>
                            <td><?= number_format($item->payment_amount) ?></td>
                            <td><?= $DateTime->ToThaiDate($item->payment_date_transfer) ?> <?= !empty($item->payment_time_transfer) ? $item->payment_time_transfer : "" ?></td>
                            <td>
                                <?php
                                if (!empty($item->payment_evidence)) {
                                    ?>
                                    <a target="_blank" href="<?= base_url("content/slip_transfer/{$item->payment_evidence}") ?>">
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