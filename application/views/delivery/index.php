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
                <div class="ui segment">
                    <img src="<?=  base_url("asset/img/delivery.png")?>" class="ui fluid image" />
                </div>
                <div class="ui segment">
                    <h4 class="ui header">3.1	จัดส่งสินค้าโดย บริษัท อินเตอร์ เอ็กซ์เพรส โฮม ดิลิเวอรี่ จำกัด โดยมีเงื่อนไขจัดส่งดังนี้ (http://www.iel.co.th)</h4>
                    <div class="ui list">
                        <div class="item">
                            -	กรุงเทพฯ และปริมณฑล และภาคกลาง 2 วัน
                        </div>
                        <div class="item">
                            -	ภาคอีสาน, ภาคเหนือ,ภาคใต้ 3 วัน
                        </div>
                        <div class="item">
                            -	พื้นที่เกาะ และจังหวัดแม่ฮ่องสอน, สามจังหวัดภาคใต้ 5 วัน
                        </div>
                    </div>
                </div>

                <div class="ui segment">
                    <p>
                        <Strong>ขั้นตอนเปลี่ยนสินค้า</Strong> ส่งสินค้าผิดรุ่น ส่งสินค้ากลับมาซ่อมแซม และอื่นๆ โดยปัญหาดังกล่าวต้องเกิดจากความผิดพลาดของทางร้านเท่านั้น โดยมีข้อปฏิบัติ ดังนี้
                    </p>
                    <div class="ui list">
                        <div class="item">
                            1.	ลูกค้าเข้าไปที่หน้าเว็บไซต์ของทางร้าน เลือกเมนูติดต่อเรา
                        </div>
                        <div class="item">
                            2.	แจ้งปัญหาที่เกิดขึ้น และรหัสของสินค้าที่มีปัญหา
                        </div>
                        <div class="item">
                            3.	ยืนยันข้อมูล และรอทางร้านติดต่อกลับ (ไม่เกิน 2 วันทำการ)
                        </div>
                    </div>
                </div>

                <div class="ui segment">
                    <h4 class="ui header">3.2	ระบบรับประกันสินค้ากับ  บริษัท อินเตอร์ เอ็กซ์เพรส โฮม ดิลิเวอรี่ จำกัด</h4>
                    <p>
                         โดยมีเงื่อนไข ดังนี้ การประกันสินค้าในกรณีที่มีสินค้าเสียหายหรือสูญหายระหว่างการขนส่งบริษัทฯยินดีที่จะชดใช้ให้ตามมูลค่าของสินค้าที่เสียหาย แต่ไม่เกิน 5,000 บาทต่อกล่อง ในกรณีที่ต้องการประกันความเสียหายตามมูลค่าสินค้าที่เอาประกันภัย บริษัทฯ คิดค่าประกันอัตรา 0.25 ของมูลค่าที่เอาประกัน นอกเหนือจากค่าบริการขนส่ง
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>