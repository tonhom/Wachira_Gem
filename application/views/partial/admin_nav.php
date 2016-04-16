<div class="ui pointing top fixed borderless menu" id="mainNavbar">
    <div class="ui container">
        <?php
        $navItems = [
            ["name" => "home", "href" => "staff/main/", "icon" => "home", "text" => "หน้าหลัก"],
            ["name" => "category", "href" => "staff/category/", "icon" => "cubes", "text" => "ประเภทสินค้า"],
            ["name" => "product", "href" => "staff/product/", "icon" => "diamond", "text" => "สินค้า"],
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

        <div class="right menu">
            <?php
            if ($this->session->userdata("admin") != "") {
                ?>
                <a href="<?= site_url("Staff/Admin/signout") ?>" class="item">
                    <i class="sign out icon"></i>
                    ออกจากระบบ
                </a>
                <?php
            }
            ?>
            <a href="<?= site_url("home/") ?>" class="item" style='background-color : #2185d0;color:#fff;'>
                <i class="right arrow icon"></i>
                หน้าร้านค้า
            </a>
        </div>
    </div>
</div>