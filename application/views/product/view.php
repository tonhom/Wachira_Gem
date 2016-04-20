<?php
$base = getcwd();
$baseArr = explode(DIRECTORY_SEPARATOR, $base);
$countDir = count($baseArr);
$base = $baseArr[$countDir - 1];

// find in cart
$carts = $this->session->userdata("order_items") == "" ? [] : $this->session->userdata("order_items");
$default = 1;
$inCart = false;
if (isset($carts[$product->product_id])) {
    $inCart = TRUE;
    $default = $carts[$product->product_id];
}
?>
<div class="ui container padded1em-top">
    <div class="ui grid">
        <div class="row">
            <div class="four wide column">
                <?php
                if ($inCart === TRUE) {
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
                        <div class="header"><?= $product->product_name ?></div>
                        <div class="description">
                            ประเภทสินค้า<?= $categoryDict[$product->category_id] ?>
                        </div>
                    </div>
                    <div class="content">
                        <?= $product->product_description ?>
                    </div>
                    <div class="content">
                        <p>
                            ราคา <strong><?= number_format($product->product_price) ?> บาท</strong>
                        </p>
                    </div>
                    <?php
                    if ($product->product_stock > 0) {
                        ?>
                        <div class="extra content">
                            <form class="ui form" onsubmit="return false">
                                <div class="field">
                                    <label>จำนวนสินค้า</label>
                                    <div class="ui fluid action input">
                                        <input type="number" name="amount" value="<?= $default ?>" id="amount" min="1" step="1" max="<?= $product->product_stock ?>" />
                                        <a href="<?= site_url("cart/addItem/{$product->product_id}") ?>" class="ui button primary addToCart">
                                            <?php
                                            if($inCart){
                                                ?>
                                            <i class="cart icon"></i> ปรับปรุง
                                            <?php
                                            }else{
                                                ?>
                                            <i class="add to cart icon"></i> เพิ่มเข้าตะกร้า
                                            <?php
                                            }
                                            ?>
                                        </a>
                                    </div>
                                </div>

                            </form>
                            <br />
                            <div class="ui statistic">
                                <div class="label">
                                    สินค้าคงเหลือ
                                </div>
                                <div class="value">
                                    <i class="cubes icon"></i>
                                    <?= number_format($product->product_stock) ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="content">
                            <h3 class="ui orange header">Out of stock</h3>
                            <p>ไม่มีสินค้าใน Stock</p>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="twelve wide column">
                <div class="ui segments">
                    <div class="ui segment">
                        <h3 class="ui header">ภาพ 360 องศา</h3>
                    </div>
                    <div class="ui segment">
                        <img src="<?= base_url("images/{$product->product_imgDir}") ?>/1.JPG" width="100%" height="100%"
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
                                images: "/<?= $base ?>/images/<?= $product->product_imgDir ?>/#.JPG",
                                frames: 15,
                                loops: true,
                                speed: 0.05,
                                revolution: 300
                            });

                            $(".addToCart").click(function () {
                                var amount = $("#amount").val();
                                var max = <?= $product->product_stock ?>;
                                var href = $(this).attr("href");
                                if (amount > max) {
                                    href += "/" + max;
                                } else {
                                    href += "/" + amount;
                                }
                                $(this).attr("href", href);
                            });
</script>
