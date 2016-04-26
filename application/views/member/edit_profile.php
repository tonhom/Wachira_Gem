<?php
if ($data->member_birthday != null) {
    $birthday = explode("-", $data->member_birthday);
} else {
    $birthday = [];
}
?>
<div class="ui container padded1em">
    <div style="max-width: 800px; margin: auto;">
        <?php
        if ($this->session->flashdata("success") != "") {
            ?>
            <div class="ui positive message">
                <div class="header">
                    <i class="check icon"></i>
                    ดำเนินการสำเร็จ
                </div>
                <p>ระบบได้บันทึกข้อมูลส่วนตัวของคุณแล้ว หากมีการเปลี่ยนรหัสผ่านจะมีผลในการล็อกอินครั้งต่อไป</p>
            </div>
            <?php
        }
        ?>
        <form method="post" action="<?= site_url("member/save") ?>" id="form">
            <div class="ui segments">
                <div class="ui segment">
                    <h2 class="ui pink header">แก้ไขข้อมูลส่วนตัว</h2>
                </div>
                <div class="ui pink segment">
                    <div class="ui grid form">
                        <div class="row">
                            <div class="four wide column">
                                ชื่อ - สกุล
                            </div>
                            <div class="nine wide column">
                                <div class="field">
                                    <input type="text" name="member_full_name" required="" value="<?= getValDefault($data, "member_full_name") ?>" />
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
                                    <div class="ui fluid search selection dropdown" id="year_dd">
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
                                    <div class="ui fluid search selection dropdown" id="month_dd">
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
                                    <div class="ui fluid search selection dropdown" id="date_dd">
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
                                    <input type="text" name="member_gender" value="<?= getValDefault($data, "member_gender") ?>" />
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
                                    <textarea name="member_address"><?= getValDefault($data, "member_address") ?></textarea>
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
                                    <input type="text" name="member_tel" required="" value="<?= getValDefault($data, "member_tel") ?>" />
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
                                    <input type="text" name="member_email" required="" value="<?= getValDefault($data, "member_email") ?>" />
                                </div>
                            </div>
                            <div class="three wide column"></div>
                        </div>
                        <div class="ui divider"></div>
                        <div class="row">
                            <div class="four wide column">
                                ชื่อเข้าสู่ระบบ
                            </div>
                            <div class="nine wide column">
                                <div class="field">
                                    <input type="text" disabled="" value="<?= getValDefault($data, "member_username") ?>" />
                                </div>
                            </div>
                            <div class="three wide column"></div>
                        </div>
                        <div class="row">
                            <div class="four wide column">
                                รหัสผ่านใหม่
                            </div>
                            <div class="nine wide column">
                                <div class="field">
                                    <input type="text" name="new_password" value="" />
                                    <br />
                                    <span style="color: red;">(หากไม่ต้องการเปลี่ยน ไม่ต้องระบุ)</span>
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
                                <button type="submit" class="ui button large primary">บันทึกข้อมูล</button>
                            </div>
                            <div class="three wide column"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(function () {
        $('.ui.dropdown').dropdown();
        $('#year_dd').dropdown('set selected', "<?= getValDefault($birthday, "0") ?>");
        $('#month_dd').dropdown('set selected', "<?= getValDefault($birthday, "1") ?>");
        $('#date_dd').dropdown('set selected', "<?= getValDefault($birthday, "2") ?>");
    });
</script>