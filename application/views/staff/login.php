<div class="ui stacked segment" style="max-width: 500px; margin: auto; margin-top: 70px; margin-bottom: 240px;">
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
    <form class="ui form" method="post" action="<?= site_url("staff/admin/signinProcess") ?>">
        <div class="ui header">เข้าสู่ระบบสำหรับผู้ดูแลระบบ</div>
        <div class="field">
            <label>
                Username
            </label>
            <input type="text" name="admin_username" />
        </div>
        <div class="field">
            <label>
                Password
            </label>
            <input type="password" name="admin_password" />
        </div>
        <div class="field">
            <button type="submit" class="ui raised button primary">เข้าสู่ระบบ</button>
        </div>
    </form>
</div>