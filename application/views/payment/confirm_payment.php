<?php
$data = $this->session->userdata("payment_form_data");
if ($data == "") {
    $data = [];
}
?>
<div class="ui container padded1em-top">
    <form class="ui form" method="post" action="<?= site_url("payment/save") ?>" enctype="multipart/form-data" id="form">
        <div class="ui segments">
            <div class="ui active dimmer" id="loading_order_detail">
                <div class="ui text loader">Loading</div>
            </div>
            <div class="ui segment">
                <h2 class="ui pink header">แบบฟอร์มแจ้งการชำระเงิน</h2>
            </div>
            <?php
            if ($this->session->flashdata("save_error") === true) {
                ?>
                <div class="ui segment">
                    <div class="ui negative message">
                        <div class="header">
                            เกิดข้อผิดพลาดในการบันทึกข้อมูล
                        </div>
                        <p>
                            โปรดใส่ข้อมูลใหม่ให้ถูกต้อง
                        </p>
                    </div>
                </div>
                <?php
            }

            if (isset($error)) {
                ?>
                <div class="ui segment">
                    <div class="ui negative message">
                        <div class="header">
                            เกิดข้อผิดพลาดในการอัพโหลดภาพสลิป 
                        </div>
                        <p>
                            โปรดตรวจสอบรูปภาพของท่านว่าอยู่ในเงื่อนไขของการอัพโหลดหรือไม่
                        </p>
                    </div>
                </div>
                <?php
            }

            if ($this->session->flashdata("save_success") === true) {
                ?>
                <div class="ui segment">
                    <div class="ui positive message">
                        <div class="header">
                            บันทึกข้อมูลสำเร็จ
                        </div>
                        <p>
                            ระบบได้บันทึกข้อมูลการชำระเงินแล้ว โปรดรอการติดต่อกลับจากเราในเร็วๆนี้
                        </p>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="ui segment">
                <div class="ui labeled <?= empty($order_id) ? "action" : "" ?> fluid input">
                    <div class="ui label">
                        หมายเลขใบสั่งซื้อ
                    </div>
                    <?php
                    if (empty($order_id)) {
                        ?>
                        <input type="text" id="order_id" name="order_id" value="<?= getValDefault($data, "order_id") ?>" maxlength="8" />
                        <button type="button" class="ui primary icon button" id="btnCheckOrder">
                            <i class="check circle icon"></i>
                            ตรวจสอบ
                        </button>
                        <?php
                    } else {
                        ?>
                        <input type="text" name="order_id" value="<?= $order_id ?>" readonly="" maxlength="8" />
                        <?php
                    }
                    ?>
                </div>
                <div id="<?= empty($order_id) ? "orderDetail" : "ordeDetailPaid" ?>">
                    <table class="ui celled table" id="orderDetailTable">
                        <thead>
                            <tr>
                                <th colspan="4">รายละเอียดการสั่งซื้อ</th>
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
                            if (!empty($order_id)) {
                                $totalAll = 0;
                                foreach ($order_list as $row) {
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
                                        <h4 class="ui header">ราคารวมภาษีมูลค่าเพิ่ม 7%</h4>
                                    </td>
                                    <td><strong><?= number_format($totalAll * 1.07, 2) ?></strong> (Vat. 7% = <?= number_format($totalAll * 0.07, 2) ?>)</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="ui divider"></div>
                <div class="two fields">
                    <div class="field">
                        <label>ชำระเงินเข้าบัญชี <span style="color:red;">*</span></label>
                        <div class="ui selection dropdown" id="payment_bank_dropdown">
                            <input type="hidden" name="payment_bank" id="payment_bank">
                            <i class="dropdown icon"></i>
                            <div class="default text">โปรดเลือกธนาคาร</div>
                            <div class="menu">
                                <div class="item" data-value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</div>
                                <div class="item" data-value="ธนาคารออมสิน">ธนาคารออมสิน</div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>ชำระเงินที่สาขา</label>
                        <input type="text" name="payment_branch" value="<?= getValDefault($data, "payment_branch") ?>" />
                    </div>
                </div>
                <div class="field">
                    <label>จำนวนเงิน <span style="color:red;">*</span></label>
                    <input type="number" id="payment_amount" name="payment_amount" required=""  value="<?= getValDefault($data, "payment_amount") ?>" />
                </div>
                <div class="two fields">
                    <div class="field">
                        <label>วันที่ชำระเงิน <span style="color:red;">*</span></label>
                        <div class="inline three fields">
                            <div class="ui fluid search selection dropdown"  id="paid_year_dropdown">
                                <input type="hidden" name="paid_year" id="payment_bank">
                                <i class="dropdown icon"></i>
                                <div class="default text">ปี พ.ศ.</div>
                                <div class="menu">
                                    <?php
                                    for ($i = date("Y"); $i >= 1900; $i--) {
                                        ?>
                                        <div class="item" data-value="<?= $i ?>"><?= ($i + 543) ?></div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="ui fluid search selection dropdown" id="paid_month_dropdown">
                                <input type="hidden" name="paid_month" id="payment_bank">
                                <i class="dropdown icon"></i>
                                <div class="default text">เดือน</div>
                                <div class="menu">
                                    <?php
                                    foreach ($months as $key => $month) {
                                        ?>
                                        <div class="item" data-value="<?= $key ?>"><?= $month ?></div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="ui fluid search selection dropdown" id="paid_date_dropdown">
                                <input type="hidden" name="paid_date" id="payment_bank">
                                <i class="dropdown icon"></i>
                                <div class="default text">วัน</div>
                                <div class="menu">
                                    <?php
                                    for ($i = 1; $i < 32; $i++) {
                                        ?>
                                        <div class="item" data-value="<?= $i ?>"><?= $i ?></div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>เวลาโดยประมาณ (รูปแบบ 24)</label>
                        <input type="text" name="payment_time_transfer" placeholder="ชั่วโมง:นาที:วินาที"  value="<?= getValDefault($data, "payment_time_transfer") ?>" />
                    </div>
                </div>
                <div class="field">
                    <label>หมายเหตุ</label>
                    <input type="text" name="payment_remark" value="<?= getValDefault($data, "payment_remark") ?>" />
                </div>
                <div class="field">
                    <label>รูปใบสลิป <span style="color: red;">*</span></label>
                    <input type="file" name="payment_evidence" />
                    <br />
                    <span style="color: red;"> - ขนาดไม่เกิน 2MB และกว้างxสูง ไม่เกิน 1920x1080 พิกเซล</span><br />
                    <span style="color: red;"> - อนุญาตเฉพาะไฟล์ GIF, JPG, PNG</span>
                </div>
                <div class="field">
                    <span style="color:red;">หมายเหตุ</span> - กรุณากรอกข้อมูลที่มี  <span style="color: red;">*</span> ทุกช่อง
                </div>
            </div>
            <div class="ui segment">
                <button type="submit" class="ui large button primary">บันทึกการชำระเงิน</button>
                <button type="reset" class="ui raised button">ยกเลิก</button>
            </div>
        </div>
    </form>
</div>

<input type="hidden" id="order_total_price" value="<?= empty($order_id) ? 0 : $order_detail->order_total_price * 1 ?>" />

<script>
    var hasOrder = false;
    if ($("#order_id").length == 0) {
        hasOrder = true;
    }

    $("#loading_order_detail").hide();
    $("#orderDetail").hide();

    $(function () {
        $('.ui.dropdown').dropdown();
        $('#payment_bank_dropdown').dropdown('set selected', '<?= getValDefault($data, "payment_bank") ?>');
        $('#paid_year_dropdown').dropdown('set selected', '<?= getValDefault($data, "paid_year") ?>');
        $('#paid_month_dropdown').dropdown('set selected', '<?= getValDefault($data, "paid_month") ?>');
        $('#paid_date_dropdown').dropdown('set selected', '<?= getValDefault($data, "paid_date") ?>');
    });

    $("#form").submit(function () {
        if (hasOrder === true) {
            if(($("#order_total_price").val()*1) !== ($("#payment_amount").val() *1)){
                swal("โปรดตรวจสอบ", "จำนวนเงินที่คุณชำระไม่ถูกต้อง โปรดตรวจสอบอีกครั้ง", "warning");
                return false;
            }
            if ($("#payment_bank").val() == "" || $("#paid_year").val() == "" || $("#paid_month").val() == "" || $("#paid_date").val() == "") {
                swal("ข้อความจากระบบ", "โปรดกรอกข้อมูลให้ครบ", "warning");
                return false;
            } else {
                return true;
            }

        } else {
            swal("ข้อความจากระบบ", "กรุณาระบุหมายเลขใบสั่งซื้อและตรวจสอบ", "warning");
            return false;
        }
    });

    $("#btnCheckOrder").on("click", function () {
        var value = $("#order_id").val();
        if (value != "") {
            // ajax load data
            var param = {order_id: value};
            $("#loading_order_detail").show();
            $.post("<?= site_url("Order/GetDetail") ?>", param, function (response) {
                //console.log(response);
                $("#loading_order_detail").hide();
                if (response.error) {
                    var tableBody = $("#orderDetailTable > tbody");
                    tableBody.html("");
                    swal("ข้อความจากระบบ", "ไม่พบรายการสั่งซื้อหมายเลขนี้", "warning");
                } else {
                    hasOrder = true;
                    $("#order_total_price").val(response.order_total_price_vat_number);
                    var tableBody = $("#orderDetailTable > tbody");
                    tableBody.html("");
                    for (var index in response.items) {
                        var tr = $("<tr></tr>");
                        var tdItemName = $("<td></td>");
                        var tdItemDesc = $("<td></td>");
                        var tdItemAmount = $("<td></td>");
                        var tdItemTotalPrice = $("<td></td>");
                        var total = 0;

                        tdItemName.text(response.items[index].product_name);
                        tdItemDesc.text(response.items[index].product_description);
                        tdItemAmount.text(response.items[index].order_detail_amount);
                        total = response.items[index].total_price;
                        tdItemTotalPrice.text(total);

                        tr.append(tdItemName);
                        tr.append(tdItemDesc);
                        tr.append(tdItemAmount);
                        tr.append(tdItemTotalPrice);

                        tableBody.append(tr);
                    }
                    var tdTotalLabel = $("<td colspan='3' style='text-align: right;'><h4 class='ui header'>ราคารวมทั้งหมด</h4></td>");
                    var tdTotal = $("<td style='font-weight: bold;'></td>").text(response.order_total_price);
                    var trTotal = $("<tr class='positive'></tr>");
                    trTotal.append(tdTotalLabel);
                    trTotal.append(tdTotal);

                    var tdTotalVatLabel = $("<td colspan='3' style='text-align: right;'><h4 class='ui header'>ราคารวมภาษีมูลค่าเพิ่ม</h4></td>");
                    var tdTotalVat = $("<td style='font-weight: bold;'></td>").html(response.order_total_price_vat);
                    var trTotalVat = $("<tr class='positive'></tr>");
                    trTotalVat.append(tdTotalVatLabel);
                    trTotalVat.append(tdTotalVat);

                    tableBody.append(trTotal);
                    tableBody.append(trTotalVat);
                    $("#orderDetail").show();
                }
            }, "json");
        } else {
            swal("ข้อความจากระบบ", "กรุณาระบุหมายเลขใบสั่งซื้อ", "warning");
        }
    });
</script>