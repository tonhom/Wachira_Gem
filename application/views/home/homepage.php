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
                                            <a class="image" href="<?= site_url("product/view/{$item->id}") ?>">
                                                <img src="<?= base_url("images/{$item->imgDir}/{$item->thumbnail}") ?>">
                                            </a>
                                            <div class="content">
                                                <a class="header" href="<?= site_url("product/view/{$item->id}") ?>"><?= $item->name ?></a>
                                                <div class="meta">
                                                    <a><?= $item->description ?></a>
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
                <!--                <div class="ui segments">
                                    <div class="ui segment">
                                        <h2 class="ui pink header">บริการหลังการขาย</h2>
                                    </div>
                                    <div class="ui segment">
                                        <h3 class="ui pink header">การรับประกัน</h3>
                                        ทางร้านยินดีคืนสินค้า ในกรณีที่สินค้าไม่ตรงตามที่ผู้ซื้อได้ระบุไว้ หรือชำรุดเสียหายระหว่างจัดส่ง
                                        ผู้ขายยินดีคืนเงินเฉพาะค่าสินค้าให้ภายใต้เงื่อนไขดังนี้<br />
                                        <ol>
                                            <li>
                                                ทางร้านยินดีคืนเงินภายใน 7 วัน นับจากวันที่ส่งสินค้า
                                            </li>
                                            <li>
                                                ผู้ซื้อสามารถขอรับเงินคืนได้เฉพาะกรณีที่ได้รับสินค้าไม่ถูกต้องตามที่ระบุ หรือเกิดจากความผิดพลาดของผู้ขาย
                                            </li>
                                        </ol>
                                    </div>
                                    <div class="ui segment">
                                        <h3 class="ui pink header">วิธีรับสินค้า</h3>
                                        จัดส่งทางไปรษณีย์แบบ EMS เท่านั้น ได้รับภายใน 2-3 หรือตามตกลงกัน<br />
                                        กรณีสินค้าชำรุดเสียหายในระหว่างการจัดส่ง เรารับเปลี่ยนสินค้าภายใน 7 วัน<br />
                                        ทางร้านจะออกค่าจัดส่งสินค้าคืนในกรณีเป็นความผิดพลาดของทางร้าน
                                    </div>
                                </div>-->

                <div class="ui segments">
                    <div class="ui segment">
                        <h3 class="ui header">วิธีการสั่งซื้อ</h3>
                    </div>

                    <div class="ui segment">
                        <p>
                            จะมีรูปตะกร้าแสดงอยู่ในรายการสินค้า ท่านสามารถคลิ๊กสั่งซื้อสินค้านั้นได้โดยการคลิ๊กที่รูปตะกร้า แล้วคลิ๊กไปที่เมนูรถเข็น ซึ่งจะนำท่านไปสู่กระบวนการสั่งซื้อ เมื่อท่านสั่งผ่านระบบตะกร้าเรียบร้อย ท่านต้องยืนยันการสั่งซื้อ และเลือกชำระเงินผ่านธนาคาร และแจ้งการชำระเงิน ภายใน 7 วันทำการ
                        </p>
                    </div>

                    <!--                    <div class="ui segment">
                                            <h3 class="ui pink header"><i class="phone icon"></i> ทางโทรศัพท์</h3>
                                            <p>
                                                เป็นวิธีการที่สะดวกและรวดเร็วที่สุด สามารถสอบถามรายละเอียดสินค้าได้ทันที
                                                ให้ท่านเลือกสินค้าที่ต้องการ โทรมาตามเบอร์ที่แจ้งไว้ในหน้าติดต่อเรา
                                            </p>
                                        </div>
                                        <div class="ui segment">
                                            <h3 class="ui pink header">
                                                <i class="cart icon"></i>
                                                สั่งซื้อออนไลน์ผ่านระบบตะกร้า
                                            </h3>
                                            <p>
                                                จะมีรูปตะกร้าแสดงอยู่ในรายการสินค้า ท่านสามารถคลิ๊กสั่งซื้อสินค้านั้นได้โดยการคลิ๊กที่รูปตะกร้า แล้วคลิ๊กไปที่เมนูรถเข็น
                                                ซึ่งจะนำท่านไปสู่กระบวนการสั่งซื้อ เมื่อท่านสั่งผ่านระบบตะกร้าเรียบร้อย ท่านต้องยืนยันการสั่งซื้อ และเลือกชำระเงินผ่านธนาคาร
                                                และแจ้งการชำระเงิน และรอรับสินค้า 2-3 วัน
                                            </p>
                                        </div>
                                        <div class="ui segment">
                                            <h3 class="ui pink header">
                                                <i class="mail icon"></i>
                                                สั่งซื้อผ่านเมนู "ติดต่อเรา"
                                            </h3>
                                            <p>
                                                สั่งซื้อสินค้าผ่านเมนู "ติดต่อเรา" มีวิธีการดังนี้<br />
                                            <ul>
                                                <li>
                                                    เลือกไปที่เมนู "ติดต่อเรา" (ด้านขวาบน)
                                                </li>
                                                <li>
                                                    ใส่รายละเอียดใน หัวข้อเรื่องว่า "สั่งซื้อสินค้า"
                                                </li>
                                                <li>
                                                    ใส่รายละเอียด ชื่อ + เบอร์โทรศัพท์สำหรับใช้ในการติดต่อกับท่าน
                                                </li>
                                                <li>
                                                    ใส่รายละเอียดอีเมล ที่ต้องการให้เราติดต่อกลับไปหาท่าน
                                                </li>
                                                <li>
                                                    พิมพ์รายละเอียดสินค้าที่ท่านต้องการสั่งซื้อ พร้อมระบุจำนวนลงในช่องรายละเอียด
                                                </li>
                                                <li>
                                                    คลิ๊กปุ่ม "ส่งข้อมูล"
                                                </li>
                                            </ul>
                                            หลังจากที่เราได้รับข้อความจากท่านแล้ว เราจะรีบติดต่อกลับไปหาท่านโดยเร็วที่สุด
                                            </p>
                                        </div>-->
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
                                <input type="text" name="username" />
                            </div>
                            <div class="field">
                                <label>
                                    Password
                                </label>
                                <input type="password" name="password" />
                            </div>
                            <div class="field">
                                <button type="submit" class="ui raised button primary">เข้าสู่ระบบ</button>
                                <a href="<?= site_url("member/signup") ?>" class="ui tiny button">สมัครสมาชิก</a>
                            </div>
                        </form>
                        <?php
                    } else {
                        ?>
                        <div>
                            <h3 class="ui header">ยินดีต้อนรับ คุณ<?= $user->full_name ?></h3>
                            <a href="<?= site_url("member/profile") ?>" class="ui disabled fluid button" style="margin-bottom: 5px;">แก้ไขโพรไฟล์</a>
                            <a href="<?= site_url("member/myorder") ?>" class="ui disabled fluid button" style="margin-bottom: 5px;">รายการสั่งซื้อ</a>
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