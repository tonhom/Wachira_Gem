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
            <div class="eight wide column">
                <?php
                if (!empty($bestSeller)) {
                    //print_r($bestSeller);
                    ?>
                    <div class="ui segments">
                        <div class="ui segment">
                            <h2 class="ui header">สินค้าขายดี</h2>
                        </div>
                        <div class="ui pink segment">
                            <div class="ui two column grid">
                                <?php
                                foreach ($bestSeller as $item) {
                                    ?>
                                    <div class="column">
                                        <div class="ui card">
                                            <a class="image" href="<?= site_url("product/view/{$item->product_id}") ?>">
                                                <img src="<?= base_url("images/{$item->product_imgDir}/{$item->product_thumbnail}") ?>">
                                            </a>
                                            <div class="content">
                                                <a class="header" href="<?= site_url("product/view/{$item->product_id}") ?>"><?= $item->product_name ?></a>
                                                <div class="meta">
                                                    <a><?= $item->product_description ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <div class="ui segments">
                    <div class="ui segment">
                        <h3 class="ui header">วิธีการสั่งซื้อ</h3>
                    </div>

                    <div class="ui segment">
                        <p>
                            จะมีรูปตะกร้าแสดงอยู่ในรายการสินค้า ท่านสามารถคลิ๊กสั่งซื้อสินค้านั้นได้โดยการคลิ๊กที่รูปตะกร้า แล้วคลิ๊กไปที่เมนูรถเข็น ซึ่งจะนำท่านไปสู่กระบวนการสั่งซื้อ เมื่อท่านสั่งผ่านระบบตะกร้าเรียบร้อย ท่านต้องยืนยันการสั่งซื้อ และเลือกชำระเงินผ่านธนาคาร และแจ้งการชำระเงิน ภายใน 7 วันทำการ
                        </p>
                    </div>
                </div>
            </div>
            <div class="four wide column">
                <div class="ui segment">
                    <form class="ui form" method="post" action="<?= site_url("product/search") ?>">
                        <div class="field">
                            <div class="ui icon input">
                                <input type="text" name="q" placeholder="Search..." required="">
                                <i class="inverted circular search link icon"></i>
                            </div>
                        </div>

                        <div class="field">
                            <button type="submit" class="ui raised button primary">ค้นหา</button>
                        </div>
                    </form>
                </div>
                <div class=" ui stacked segment">
                    <?php
                    $user = $this->session->userdata("user");
                    if ($user == "") {
                        if ($this->session->flashdata("login_error") === true) {
                            ?>
                            <div class="ui negative message">
                                <div class="header">
                                    ไม่สามารถล็อกอินได้
                                </div>
                                <p>
                                    โปรดตรวจสอบชื่อผู้ใช้และรหัสผ่านของท่านให้ถูกต้อง
                                </p>
                            </div>
                            <?php
                        }
                        ?>
                        <form class="ui form" method="post" action="<?= site_url("member/signin") ?>">
                            <div class="ui header">เข้าสู่ระบบสำหรับสมาชิก</div>
                            <div class="field">
                                <label>
                                    Username
                                </label>
                                <input type="text" name="member_username" />
                            </div>
                            <div class="field">
                                <label>
                                    Password
                                </label>
                                <input type="password" name="member_password" />
                            </div>
                            <div class="field">
                                <button type="submit" class="ui raised button primary">เข้าสู่ระบบ</button>
                                <a href="<?= site_url("member/signup") ?>" class="ui tiny button">สมัครสมาชิก</a>
                            </div>
                            <div class="field">
                                <a href="<?= site_url("member/forgotpassword") ?>" class="ui link">
                                    <i class="asterisk icon"></i>
                                    ลืมรหัสผ่าน
                                </a>
                            </div>
                        </form>
                        <?php
                    } else {
                        ?>
                        <div>
                            <h3 class="ui header">ยินดีต้อนรับ คุณ<?= $user->member_full_name ?></h3>
                            <a href="<?= site_url("member/profile") ?>" class="ui fluid button" style="margin-bottom: 5px;">แก้ไขโพรไฟล์</a>
                            <a href="<?= site_url("member/myorder") ?>" class="ui fluid button" style="margin-bottom: 5px;">รายการสั่งซื้อ</a>
                            <a href="<?= site_url("member/signout") ?>" class="ui fluid button">ออกจากระบบ</a>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="ui divider"></div>
                    <a href="<?= site_url("staff/main") ?>" class="ui link">
                        <i class="options icon"></i>
                        สำหรับผู้ดูแลระบบ
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>