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
                <div style="max-width: 500px;">
                    <div class="ui stacked segment">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>