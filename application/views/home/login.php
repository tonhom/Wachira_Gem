<div class="ui container padded1em-top">
    <div style="max-width: 500px; margin: auto;">
        <div class="ui stacked segment">
            <?php
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
            </form>
        </div>
    </div>
</div>