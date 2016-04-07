<?php
$base = getcwd();
$baseArr = explode(DIRECTORY_SEPARATOR, $base);
$countDir = count($baseArr);
$base = $baseArr[$countDir - 1];

// find in cart
$carts = $this->session->userdata("order_items") == "" ? [] : $this->session->userdata("order_items");
$default = 1;
$inCart = false;
if(isset($carts[$product->id])){
    $inCart = TRUE;
    $default = $carts[$product->id];
}
?>
<div class="ui container padded1em-top">
    <div class="ui grid">
        <div class="row">
            <div class="four wide column">
                <?php
                if($inCart === TRUE){
                    ?>
                <div class="ui positive message">
                    <div class="header">
                        <i class="check icon"></i>
                        อยู่ในตะกร้า
                    </div>
                    <p>สินค้าชิ้นนี้อยู่ในตะกร้าสินค้าแล้ว</p>
                </div>
                <?php
                }
                ?>
                <div class="ui card">
                    <div class="content">
                        <div class="header"><?= $product->name ?></div>
                        <div class="description">
                            ประเภทสินค้า<?= $categoryDict[$product->category_id] ?>
                        </div>
                    </div>
                    <div class="content">
                        <?= $product->description ?>
                    </div>
                    <div class="content">
                        <p>
                            ราคา <strong><?= number_format($product->price) ?> บาท</strong>
                        </p>
                    </div>
                    <div class="extra content">
                        <div class="ui form">
                            <div class="field">
                                <label>จำนวนสินค้า</label>
                                <div class="ui fluid action input">
                                    <input type="number" name="amount" value="<?=$default?>" id="amount" min="1" step="1" />
                                    <a href="<?= site_url("cart/addItem/{$product->id}") ?>" class="ui button primary addToCart">
                                        <i class="add to cart icon"></i> เพิ่มเข้าตะกร้า
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="twelve wide column">
                <div class="ui segments">
                    <div class="ui segment">
                        <h3 class="ui header">ภาพ 360 องศา</h3>
                    </div>
                    <div class="ui segment">
                        <img src="<?= base_url("images/{$product->imgDir}") ?>/1.JPG" width="100%" height="100%"
                             class="reel ui fluid image"
                             id="image360Holder" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url("asset/js/jquery.reel.js") ?>"></script>
<script>
    $.reel.def.indicator = 10;
    $('#image360Holder').reel({
        images: "/<?= $base ?>/images/<?= $product->imgDir ?>/#.JPG",
        frames: 15,
        loops: true,
        speed: 0.05,
        revolution: 300
    });

    $(".addToCart").click(function () {
        var amount = $("#amount").val();
        var href = $(this).attr("href");
        href += "/" + amount;
        $(this).attr("href", href);
    });
</script>
