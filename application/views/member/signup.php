<div class="ui container padded1em">
    <div class="" style="max-width: 800px;margin: auto;">
        <form method="post" action="<?= site_url("member/signupProcess") ?>" id="form">
            <div class="ui segments">
                <div class="ui segment">
                    <h2 class="ui pink header">แบบฟอร์มสมัครสมาชิก</h2>
                </div>
                <div class="ui pink segment">
                    <div class="ui grid form">
                        <div class="row">
                            <div class="four wide column">
                                ชื่อเข้าระบบ
                            </div>
                            <div class="nine wide column">
                                <div class="ui action fluid input">
                                    <input type="text" name="member_username" id="member_username" required="" />
                                    <button type="button" class="ui primary button" id="btnCheckUsername">
                                        <i class="check circle icon"></i>
                                        ตรวจสอบ
                                    </button>
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
                                    <input type="password" name="member_password" required="" />
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
                                    <input type="email" name="member_email" required="" />
                                </div>
                            </div>
                            <div class="three wide column"></div>
                        </div>
                        <div class="ui divider"></div>
                        <div class="row">
                            <div class="four wide column">
                                ชื่อ - สกุล
                            </div>
                            <div class="nine wide column">
                                <div class="field">
                                    <input type="text" name="member_full_name" required="" />
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
                                    <input type="text" name="member_gender" />
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
                                    <textarea name="member_address"></textarea>
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
                                    <input type="text" name="member_tel" required="" maxlength="10" minlength="10" />
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

<script>
    var usernameDuplicate = true;
    $("#form").submit(function () {
        if (usernameDuplicate === false) {
            return true;
        } else {
            swal("ข้อความจากระบบ", "กรุณาตรวจสอบ Username ก่อนดำเนินการสมัคร", "warning");
            return false;
        }
    });
    $("#btnCheckUsername").click(function () {
        var val = $("#member_username").val();
        if (val != "") {
            $.post("<?= site_url("member/checkDuplicate") ?>", {username: val}, function (response) {
                if (response.duplicate === false) {
                    swal("ข้อความจากระบบ", "ใช้ username : " + val + " ได้", "success");
                    usernameDuplicate = false;
                } else {
                    usernameDuplicate = true;
                    swal("ข้อความจากระบบ", "กรุณาระบุ username ใหม่", "warning");
                }
            }, "json");

        } else {
            swal("ข้อความจากระบบ", "กรุณาระบุ Username", "warning");
        }
    });

    $(function () {
        $('.ui.dropdown').dropdown();
    });
</script>