<?php
$data = $this->session->userdata("payment_form_data");
if ($data == "") {
    $data = [];
}
?>
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
                                <a href="<?= site_url("product/category/{$item->category_id}") ?>" class="header"><?= $item->category_name ?></a>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="twelve wide column">
                <form class="ui form" method="post" action="<?= site_url("payment/save") ?>" enctype="multipart/form-data" id="form">
                    <div class="ui container">
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
                                <div class="ui labeled <?= empty($order_number) ? "action" : "" ?> fluid input">
                                    <div class="ui label">
                                        หมายเลขใบสั่งซื้อ
                                    </div>
                                    <?php
                                    if (empty($order_number)) {
                                        ?>
                                        <input type="text" id="order_number" name="order_number" value="<?= getValDefault($data, "order_number") ?>" maxlength="8" />
                                        <button type="button" class="ui primary icon button" id="btnCheckOrder">
                                            <i class="check circle icon"></i>
                                            ตรวจสอบ
                                        </button>
                                        <?php
                                    } else {
                                        ?>
                                        <input type="text" name="order_number" value="<?= $order_number ?>" readonly="" maxlength="8" />
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div id="orderDetail">
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
                                                <div class="item" data-value="KTB">ธนาคารกรุงไทย</div>
                                                <div class="item" data-value="GOV">ธนาคารออมสิน</div>
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
                                    <input type="text" name="payment_amount" required=""  value="<?= getValDefault($data, "payment_amount") ?>" />
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
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var hasOrder = false;
    if ($("#order_number").length == 0) {
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
        var value = $("#order_number").val();
        if (value != "") {
            // ajax load data
            var param = {order_number: value};
            $("#loading_order_detail").show();
            $.post("<?= site_url("Order/GetDetail") ?>", param, function (response) {
                console.log(response);
                $("#loading_order_detail").hide();
                if (response.error) {
                    var tableBody = $("#orderDetailTable > tbody");
                    tableBody.html("");
                    swal("ข้อความจากระบบ", "ไม่พบรายการสั่งซื้อหมายเลขนี้", "warning");
                } else {
                    hasOrder = true;
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
                    var tdTotalLabel = $("<td colspan='3' style='text-align: right;font-weight: bold;'>ราคารวมทั้งหมด</td>");
                    var tdTotal = $("<td style='font-weight: bold;'></td>").text(response.order_total_price);
                    var trTotal = $("<tr></tr>");
                    trTotal.append(tdTotalLabel);
                    trTotal.append(tdTotal);
                    tableBody.append(trTotal);

                    $("#orderDetail").show();
                }
            }, "json");
        } else {
            swal("ข้อความจากระบบ", "กรุณาระบุหมายเลขใบสั่งซื้อ", "warning");
        }
    });
</script>