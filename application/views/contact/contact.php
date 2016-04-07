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
                <div class="ui segment">
                    <div class="">
                        <div class="ui container center aligned">
                            <h1 style="font-size: 2.8em;">
                                ติดต่อร้าน Wachira Gem&Jewelry
                            </h1>
                            <div class="ui one column grid">
                                <div class="row">
                                    <div class="column" style="font-weight: bold; font-size: 1.1em;">
                                        เลขที่ 926 ถ.ท่าแฉลบ ต.ตลาด อ.เมือง จ.จันทบุรี 22000
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="column" style="font-weight: bold; font-size: 1.1em;">
                                        <div class="ui labeled button" tabindex="0">
                                            <div class="ui button">
                                                <i class="phone icon"></i> โทรศัพท์
                                            </div>
                                            <a class="ui basic label">
                                                082-220-3040 (บอม)
                                            </a>
                                        </div>
                                        <div class="ui labeled button" tabindex="0">
                                            <div class="ui button">
                                                <i class="mail icon"></i> อีเมล
                                            </div>
                                            <a class="ui basic label">
                                                basic-in-love@hotmail.com
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    if ($this->session->flashdata("send_success") != "") {
                        ?>
                        <div class="ui container padded1em" style="text-align: center;">
                            <div class="ui olive floating huge message" style="max-width: 600px;margin: auto;">
                                <h1 class="ui header">
                                    ดำเนินการสำเร็จ
                                </h1>
                                <p>ระบบได้ส่งข้อมูลเพื่อติดต่อร้านค้าแล้ว ทางร้านจะติดต่อกลับทันทีที่เห็นข้อมูลของท่าน</p>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="ui container padded1em">
                        <form class="ui form" method="post" action="<?= site_url("contact/send") ?>">
                            <div class="ui segments" style="max-width: 600px;margin: auto;">
                                <div class="ui segment">
                                    <h2 class="ui pink header">
                                        แบบฟอร์มติดต่อร้านค้า
                                    </h2>
                                </div>
                                <div class="ui segment">
                                    <div class="field">
                                        <label>หัวเรื่อง <span style="color: red;">*</span></label>
                                        <input type="text" name="title" placeholder="" required="" />
                                    </div>
                                    <div class="field">
                                        <label>ชื่อ - สกุล <span style="color: red;">*</span></label>
                                        <input type="text" name="full_name" placeholder="" required="" />
                                    </div>
                                    <div class="field">
                                        <label>อีเมล <span style="color: red;">*</span></label>
                                        <input type="email" name="email" placeholder="" required="" />
                                    </div>
                                    <div class="field">
                                        <label>รายละเอียด <span style="color: red;">*</span></label>
                                        <textarea name="detail" required=""></textarea>
                                    </div>
                                    <div class="field">
                                        <span style="color:red;">หมายเหตุ</span> - กรุณากรอกข้อมูลที่มี  <span style="color: red;">*</span> ทุกช่อง
                                    </div>
                                </div>
                                <div class="ui segment">
                                    <button type="submit" class="ui large button primary">ส่งข้อมูล</button>
                                    <button type="reset" class="ui raised button">กลับสู่ค่าเริ่มต้น</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>