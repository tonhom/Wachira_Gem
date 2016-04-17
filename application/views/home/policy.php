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
                    <div class="ui segment">
                        <h3 class="ui header">
                            นโยบายความเป็นส่วนตัว
                        </h3>
                    </div>
                    <div class='ui segment' style="min-height: 510px;">
                        ทางร้าน เคารพสิทธิ์และความเป็นส่วนตัวของท่านและให้ความสำคัญกับการคุ้มครองข้อมูล ส่วนบุคคลในเครือข่ายอินเทอร์เน็ตเป็นสำคัญ Wachira Gem&Jewelry ให้คำมั่นว่าข้อมูลส่วนตัวของสมาชิกทุกท่านจะถูกเก็บรักษาเป็นความลับ ไม่อนุญาตให้ผู้อื่นเข้าถึงข้อมูลดังกล่าวได้ ตลอดจนจะไม่เปิดเผยข้อมูลของท่านต่อสาธารณะหรือบุคคลที่สาม ในทั้งในเชิงพาณิชย์หรือกรณีใดก็ตาม 
                        โดยทั่วไปแล้ว ท่านสามารถเข้าเยี่ยมชมเว็บไซต์ได้ โดยมิต้องแจ้งให้บริษัทฯ ทราบว่าท่านเป็นใคร อีกทั้งไม่ต้องเปิดเผยข้อมูลส่วนบุคคลต่างๆ ที่เกี่ยวกับท่าน แต่สำหรับการทำธุรกรรมบนเว็บไซต์ บริษัทฯ จะกำหนดให้ท่านต้องทำการสมัครเป็นสมาชิกก่อนการสั่งซื้อ

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>