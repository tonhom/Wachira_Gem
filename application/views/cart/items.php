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
                <?php
                if ($this->session->flashdata("empty_cart") === TRUE) {
                    ?>
                    <div class="ui negative message">
                        <div class="header">
                            ตะกร้าสินค้าว่าง
                        </div>
                        <p>
                            กรุณาเลือกสินค้า ก่อนไปขั้นตอนถัดไป
                        </p>
                    </div>
                    <?php
                }

                if ($this->session->flashdata("save_error") === TRUE) {
                    ?>
                    <div class="ui negative message">
                        <div class="header">
                            เกิดข้อผิดพลาดในการบันทึก
                        </div>
                        <p>
                            ระบบไม่สามารถบันทึกข้อมูลการสั่งซื้อได้ โปรดติดต่อเรา
                        </p>
                    </div>
                    <?php
                }

                if ($this->session->flashdata("save_success") === TRUE) {
                    ?>
                    <div class="ui positive message">
                        <div class="header">
                            ระบบบันทึกข้อมูลการสั่งซื้อสำเร็จ
                        </div>
                        <p>
                            ทางเราจะรีบติดต่อกลับในเร็วๆนี้
                        </p>
                    </div>
                    <?php
                }
                ?>
                <div class="ui segments">
                    <div class="ui fluid top attached steps">
                        <div class="<?= empty($this->session->userdata("order_items")) ? "" : "completed" ?> step">
                            <i class="cart icon"></i>
                            <div class="content">
                                <div class="title">ช็อปปิ้ง</div>
                                <div class="description">เลือกสินค้าเข้าตะกร้า</div>
                            </div>
                        </div>
                        <div class="active step">
                            <i class="list icon"></i>
                            <div class="content">
                                <div class="title">ระบุรายการจัดส่ง</div>
                                <div class="description">จัดการสินค้าในตะกร้าของคุณ</div>
                            </div>
                        </div>
                        <div class="disabled step">
                            <i class="info circle icon"></i>
                            <div class="content">
                                <div class="title">ยืนยันการสั่งซื้อ</div>
                                <div class="description">ตรวจสอบข้อมูลการสั่งซื้อของคุณ</div>
                            </div>
                        </div>
                    </div>
                    <div class="ui segment">
                        <div class='ui header'>ตะกร้าสินค้า</div>
                        <table class="ui selectable celled table">
                            <thead>
                                <tr>
                                    <th>ชื่อสินค้า</th>
                                    <th>จำนวน</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($items as $id => $amount) {
                                    $info = $instantProduct->GetById($id);
                                    ?>
                                    <tr>
                                        <td>
                                            <a href="<?= site_url("product/view/{$id}") ?>"><?= $info->product_name ?></a>
                                        </td>
                                        <td>
                                            <div class="ui fluid action input">
                                                <input type="number" value="<?= $amount ?>" class="amount" min="1" step="1" max="<?= $info->product_stock ?>" />
                                                <a href="<?= site_url("cart/updateItem/{$id}") ?>" class="ui basic blue button updateAmount">
                                                    <i class="write icon"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="ui icon basic orange button" href="<?= site_url("cart/removeItem/{$id}") ?>">
                                                <i class="trash icon"></i> ลบ
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="ui center aligned segment">
                        <a href="<?= site_url("product/") ?>" class="ui button">เลือกสินค้าต่อ</a>
                        <!--<a href="<?= site_url("cart/update") ?>" class="ui green button">คำนวณใหม่</a>-->
                        <a href="<?= site_url("cart/orderDetail") ?>" class="ui primary button" id="btnNextConfirmOrder">ขั้นตอนต่อไป</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#btnNextConfirmOrder").click(function (e) {
        var result = confirm("ต้องการที่จะเลือกสินค้าเพิ่มเติมหรือไม่");
        if (result === true) {
            e.preventDefault();
            window.location = "<?= site_url("product/") ?>";
        } else {
            return true;
        }
    });
    $(function () {
        $(".updateAmount").click(function () {
            var amount = $(this).parent().find("input").val();
            var href = $(this).attr("href");
            var max = $(this).parent().find("input").attr("max");

            if (amount > max) {
                href += "/" + max;
            } else {
                href += "/" + amount;
            }
            $(this).attr("href", href);
        });
    });
</script>