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
                                <a href="<?= site_url("product/category/{$item->id}") ?>" class="header"><?= $item->name ?></a>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="twelve wide column">
                <form method="post" action="<?= site_url("member/signupProcess") ?>">
                    <div class="ui segments" style="max-width: 600px;">
                        <div class="ui segment">
                            <h2 class="ui pink header">แบบฟอร์มสมัครสมาชิก</h2>
                        </div>
                        <div class="ui pink segment">
                            <div class="ui grid form">
                                <div class="row">
                                    <div class="four wide column">
                                        ชื่อ - สกุล
                                    </div>
                                    <div class="nine wide column">
                                        <div class="field">
                                            <input type="text" name="full_name" required="" />
                                        </div>
                                    </div>
                                    <div class="three wide column"></div>
                                </div>
                                <div class="row">
                                    <div class="four wide column">
                                        วันเกิด
                                    </div>
                                    <div class="nine wide column">
                                        <div class="inline fields">
                                            <div class="ui fluid search selection dropdown">
                                                <input type="hidden" name="year">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">ปี ค.ศ.</div>
                                                <div class="menu">
                                                    <?php
                                                    for ($i = 1900; $i <= date("Y"); $i++) {
                                                        ?>
                                                        <div class="item" data-value="<?= $i ?>"><?= ($i + 543) ?></div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="ui fluid search selection dropdown">
                                                <input type="hidden" name="month">
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
                                                <input type="hidden" name="date">
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
                                    <div class="three wide column"></div>
                                </div>
                                <div class="row">
                                    <div class="four wide column">
                                        เพศ
                                    </div>
                                    <div class="nine wide column">
                                        <div class="field">
                                            <input type="text" name="gender" />
                                        </div>
                                    </div>
                                    <div class="three wide column"></div>
                                </div>
                                <div class="row">
                                    <div class="four wide column">
                                        ที่อยู่
                                    </div>
                                    <div class="nine wide column">
                                        <div class="field">
                                            <textarea name="address"></textarea>
                                        </div>
                                    </div>
                                    <div class="three wide column"></div>
                                </div>
                                <div class="row">
                                    <div class="four wide column">
                                        เบอร์โทรศัพท์
                                    </div>
                                    <div class="nine wide column">
                                        <div class="field">
                                            <input type="text" name="tel" required="" />
                                        </div>
                                    </div>
                                    <div class="three wide column"></div>
                                </div>
                                <div class="ui divider"></div>
                                <div class="row">
                                    <div class="four wide column">
                                        ชื่อเข้าระบบ
                                    </div>
                                    <div class="nine wide column">
                                        <div class="field">
                                            <input type="text" name="username" required="" />
                                        </div>
                                    </div>
                                    <div class="three wide column"></div>
                                </div>
                                <div class="row">
                                    <div class="four wide column">
                                        รหัสผ่าน
                                    </div>
                                    <div class="nine wide column">
                                        <div class="field">
                                            <input type="password" name="password" required="" />
                                        </div>
                                    </div>
                                    <div class="three wide column"></div>
                                </div>
                                <div class="row">
                                    <div class="four wide column">
                                        อีเมล
                                    </div>
                                    <div class="nine wide column">
                                        <div class="field">
                                            <input type="email" name="email" required="" />
                                        </div>
                                    </div>
                                    <div class="three wide column"></div>
                                </div>
                            </div>
                        </div>
                        <div class="ui segment">
                            <div class="ui grid form">
                                <div class="row">
                                    <div class="four wide column"></div>
                                    <div class="nine wide column">
                                        <button type="submit" class="ui button large primary">สมัครสมาชิก</button>
                                    </div>
                                    <div class="three wide column"></div>
                                </div>
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