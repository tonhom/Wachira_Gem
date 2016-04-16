<div  style="padding-top: 10px; padding-bottom: 10px;background-color: #323232;">
    <div class="ui container">
        <ul id="slider" class="homepage-slider">
            <li>
                <img src="<?= base_url("asset/img/banner.gif") ?>" class="ui bordered rounded fluid image" style="max-height : 220px;" />
            </li>
        </ul>
    </div>
</div>
<div class="ui pointing borderless menu" id="mainNavbar">
    <div class="ui container">
        <?php
        $navItems = [
            ["name" => "home", "href" => "home/", "icon" => "home", "text" => "หน้าหลัก"],
            ["name" => "signup", "href" => "member/signup", "icon" => "add user", "text" => "สมัครสมาชิก"],
            ["name" => "product", "href" => "product/", "icon" => "diamond", "text" => "สินค้า"],
            ["name" => "cart", "href" => "cart/items", "icon" => "cart", "text" => "ตะกร้าสินค้า"],
            ["name" => "payment_instruction", "href" => "payment/instruction", "icon" => "money", "text" => "การชำระเงิน"],
            ["name" => "confirm_payment", "href" => "payment/confirm", "icon" => "check circle", "text" => "แจ้งชำระเงิน"],
            ["name" => "delivery", "href" => "delivery/", "icon" => "emergency", "text" => "จัดส่ง"],
            ["name" => "contact", "href" => "contact/", "icon" => "mail", "text" => "ติดต่อเรา"],
        ];
        foreach ($navItems as $item) {
            $active = $current == $item["name"] ? "active" : "";
            ?>
            <a href="<?= site_url($item["href"]) ?>" class="item <?= $active ?>">
                <i class="<?= $item["icon"] ?> icon"></i>
                <?= $item["text"] ?>
            </a>
            <?php
        }
        ?>
    </div>
</div>

<link rel="stylesheet" type="text/css" href="<?= base_url("asset/css/slippry.css") ?>" />
<script src="<?= base_url("asset/js/slippry.min.js") ?>"></script>
<script>
    $(function () {
        $('#slider').slippry();
    });
</script>