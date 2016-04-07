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
                <form class="ui form" method="post" action="<?= site_url("payment/save") ?>" enctype="multipart/form-data">
                    <div class="ui container">
                        <div class="ui segments" style="max-width: 600px;">
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
                                <div class="field">
                                    <label>หมายเลขใบสั่งซื้อ</label>
                                    <input type="text" name="order_number" />
                                </div>
                                <div class="field">
                                    <label>ชื่อ - สกุล  <span style="color:red;">*</span></label>
                                    <input type="text" name="payment_full_name" required="" />
                                </div>
                                <div class="two fields">
                                    <div class="field">
                                        <label>อีเมล์ <span style="color:red;">*</span></label>
                                        <input type="email" name="payment_email" required="" />
                                    </div>
                                    <div class="field">
                                        <label>เบอร์โทรศัพท์ <span style="color:red;">*</span></label>
                                        <input type="text" name="payment_phone" required="" />
                                    </div>
                                </div>
                                <div class="two fields">
                                    <div class="field">
                                        <label>ชำระเงินเข้าบัญชี <span style="color:red;">*</span></label>
                                        <div class="ui selection dropdown">
                                            <input type="hidden" name="payment_bank">
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
                                        <input type="text" name="payment_branch" />
                                    </div>
                                </div>
                                <div class="field">
                                    <label>จำนวนเงิน <span style="color:red;">*</span></label>
                                    <input type="text" name="payment_amount" required="" />
                                </div>
                                <div class="two fields">
                                    <div class="field">
                                        <label>วันที่ชำระเงิน</label>
                                        <div class="inline three fields">
                                            <div class="ui fluid search selection dropdown">
                                                <input type="hidden" name="paid_year">
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
                                            <div class="ui fluid search selection dropdown">
                                                <input type="hidden" name="paid_month">
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
                                            <div class="ui fluid search selection dropdown">
                                                <input type="hidden" name="paid_date">
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
                                        <input type="text" name="payment_time_transfer" placeholder="ชั่วโมง:นาที:วินาที" />
                                    </div>
                                </div>
                                <div class="field">
                                    <label>หมายเหตุ</label>
                                    <input type="text" name="payment_remark" />
                                </div>
                                <div class="field">
                                    <label>รูปใบสลิป</label>
                                    <input type="file" name="payment_evidence" />
                                </div>
                                <div class="field">
                                    <span style="color:red;">หมายเหตุ</span> - กรุณากรอกข้อมูลที่มี  <span style="color: red;">*</span> ทุกช่อง
                                </div>
                            </div>
                            <div class="ui segment">
                                <button type="submit" class="ui large button primary">ส่งรายการชำระเงิน</button>
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
    $(function () {
        $('.ui.dropdown').dropdown();
    });
</script>