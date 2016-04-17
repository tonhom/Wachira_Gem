<div class="ui container padded1em">
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
                <div class="ui segments">
                    <div class="ui segment">
                        <h3 class="ui header">รับรหัสผ่านชั่วคราวผ่านอีเมล</h3>
                    </div>
                    <div class="ui segment">
                        <?php
                        if ($this->session->flashdata("not_found") != "") {
                            ?>
                            <div class="ui negative icon message">
                                <i class="warning icon"></i>
                                <div class="content">
                                    <div class="ui header">ไม่พบอีเมล</div>
                                    <p>ระบบไม่พบอีเมลของสมาชิกภายในระบบ โปรดตรวจสอบอีกครั้ง</p>
                                </div>
                            </div>
                            <?php
                        }
                        
                        if ($this->session->flashdata("send_success") != "") {
                            ?>
                            <div class="ui positive icon message">
                                <i class="check icon"></i>
                                <div class="content">
                                    <div class="ui header">ดำเนินส่งอีเมล</div>
                                    <p>ระบบได้ส่งรหัสผ่านชั่วคราวไปยังอีเมลของท่านแล้ว เมื่อท่านได้รับรหัสผ่านชั่วคราวแล้ว โปรดดำเนินการล็อกอินเข้าสู่ระบบและเปลี่ยนรหัสผ่านด้วยตัวท่านเอง</p>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <form action="<?= site_url("member/sendemail") ?>" method="post" class="ui form">
                            <div class="ui labeled action input">
                                <div class="ui label">
                                    ระบุอีเมล
                                </div>
                                <input type="email" name="email" value="" />
                                <button type="submit" class="ui labeled icon primary button">
                                    <i class="arrow right icon"></i> ดำเนินการ
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>