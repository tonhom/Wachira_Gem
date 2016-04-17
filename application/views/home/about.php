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
                                <a href="<?= site_url("product/category/{$item->category_id}") ?>" class="header"><?= $item->category_name ?></a>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="twelve wide column">
                <div class="ui segments">
                    <div class='ui segment'>
                        <h3 class="ui header">ร้าน Wachira Gem&Jewelry</h3>
                        <p>
                            เป็นศูนย์รวม อัญมณี พลอย นานาชนิด จากตลาดพลอยจันทบุรี ซึ่งเป็นแหล่งผลิตอัญมณีที่ใหญ่ที่สุดในประเทศไทย อาทิเช่น บุษราคัม, ทับทิม, ไพลิน, มรกต, เพทาย และอื่นๆอีกมากมาย ทางเรามุ่งหวังที่จะให้ลูกค้าได้ซื้อขายอย่างสะดวกสบาย จึงเปิดช่องทางผ่านเว็บไซต์นี้ขึ้นมา อีกทั้งทางร้านได้ดำเนินธุรกิจเกี่ยวกับพลอยมากว่า 10 ปี เราจึงมั่นใจและกล้ารับประกันในคุณภาพของสินค้าของเราทุกชิ้น
                        </p>
                    </div>
                    <div class='ui segment' style="min-height: 440px;">
                        <h3 class="ui header">เวลาทำการ</h3>
                        <p>
                            เปิดบริการสั่งซื้อออนไลน์ / ชำระเงิน ตลอด 24 ชั่วโมง 7 วัน/สัปดาห์<br />
                            แต่กำหนดเวลาทำการของเจ้าหน้าที่ผู้ให้บริการ <br />
                            วันจันทร์-อาทิตย์ 8.00-20.00 น. <br />
                            กรณีเร่งด่วน ลูกค้าสามารถติดต่อผ่านอีเมล์ basic-in-love@hotmail.com ได้ตลอดเวลา
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
