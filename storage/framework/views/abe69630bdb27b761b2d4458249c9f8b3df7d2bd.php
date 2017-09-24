<?php $__env->startSection('content'); ?>
<div class="block_product_detail">
<div class="block block_breadcrumb">
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>" title="Trở về trang chủ">Trang chủ</a></li>
        <li><a href="<?php echo e(route('parent-cate', $loaiDetail->slug)); ?>" title="<?php echo $loaiDetail->name; ?>"><?php echo $loaiDetail->name; ?> </a></li>
        <li><a href="<?php echo e(route('child-cate', [$loaiDetail->slug, $cateDetail->slug])); ?>" title="<?php echo $cateDetail->name; ?>"><?php echo $cateDetail->name; ?> </a></li>
        <li class="active"><?php echo $detail->name; ?></li>
    </ol>
</div><!-- /block_breadcrumb -->

    <div class="block_detail_wrap">
        <h1><?php echo $detail->name; ?></h1>
        <div class="product_detail_content">
            <div class="row block">
                <div class="col-md-9 col-sm-8 col-xs-12 block_detail_left">
                    <div class="row">
                        <div class="col-md-7 col-sm-7 col-xs-12 product_detail_img">
                            <div class="product-image">
                                <div class="bxslider product-img-gallery">
                                    <?php foreach( $hinhArr as $hinh ): ?>
                                    <div class="item">
                                        <a href="<?php echo e(Helper::showImage($hinh['image_url'])); ?>" data-lightbox="roadtrip">
                                            <img src="<?php echo e(Helper::showImage($hinh['image_url'])); ?>" alt=" hinh anh <?php echo $detail->name; ?>" />
                                        </a>
                                    </div>
                                    <?php endforeach; ?>
                                </div><!-- /product-img-gallery -->
                                <div class="product-img-thumb">
                                    <div id="gallery_01" class="pro-thumb-img">
                                        <?php $i = 0; ?>
                                        <?php foreach( $hinhArr as $hinh ): ?>
                                        <div class="item">
                                            <a href="#" data-slide-index="<?php echo e($i); ?>">
                                                <img src="<?php echo e(Helper::showImageThumb($hinh['image_url'])); ?>" alt="thumb <?php echo $detail->name; ?>" />
                                            </a>
                                        </div>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div><!-- /product-img-thumb -->
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-12 product_detail_info">
                            <div class="block_price">
                                <strong>5.990.000₫</strong>
                            </div>
                            <div class="block_promotion">
                                <strong>2 khuyến mãi áp dụng đến 31/07</strong>
                                <p>Cơ hội trúng xe SH 150i (Hà Nội và miền Bắc) <a href="#" title="" class="link"> Xem chi tiết</a></p>
                                <p>Giảm thêm 500.000đ khi thanh toán trực tuyến bằng MasterCard</p>
                                <p>Trả góp 0% lãi suất thẻ HSBC <a href="#" title="" class="link"> Xem chi tiết</a></p>
                            </div>
                            <div class="block_note">
                                <div><b>Ưu đãi:</b> Mua sạc dự phòng giảm đến <strong><span class="red">30%</span></strong></div>
                                <a href="#" target="_blank" class="link">Xem chi tiết chương trình</a>
                            </div>
                            <div class="block_order">
                                <a href="#" title="" class="buy_now">
                                    <b>Mua ngay </b>
                                    <span>Giao tận nơi hoặc nhận tại cửa hàng</span>
                                </a>
                            </div>                           
                        </div>
                    </div>
                </div><!-- /block_detail_left -->
                <div class="col-md-3 col-sm-4 col-xs-12 block_detail_right">                    
                    <div class="block_support">
                        <h3>Tư vấn &amp; Mua hàng - Gọi</h3>
                        <div class="support_phone">
                            <a href="tel:02838000000">38.000.000</a>
                            <a href="tel:02838888999">38.888.999</a>
                        </div>
                        <div class="support_img">
                            <img src="images/msg_color.jpg" alt="">
                        </div>
                        <div class="support_content">
                            <ul>
                                <li>Hàng chính hãng, bảo hành toàn quốc</li>
                                <li>Giao hàng ngay (Nội thành TP.HCM)</li>
                                <li>Giao trong vòng 2 đến 3 ngày (Toàn quốc)</li>
                                <li>Gọi lại cho Quý khách trong 5 phút</li>
                                <li>Xem hàng tại nhà, hài lòng thanh toán</li>
                            </ul>
                            <div class="block_pay">
                                <p>MIỄN PHÍ <strong>CHARGE THẺ</strong></p><img src="images/logo-card.jpg" alt="Thanh toán với thẻ visa,...">
                            </div>
                        </div>
                        <span class="support-top"></span>
                        <span class="support-bot"></span>
                    </div>
                </div><!-- /block_detail_right -->
            </div>
            <div class="block box_detail clearfix">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-12 block_detail_left">
                        <div class="block_characteristics">
                            <h2>SAMSUNG GEAR S3 FRONTIER SM-R760</h2>
                            <ul>
                                <li>Đồng hồ thông minh chạy hệ điều hành Tizen dành cho các smartphone Android</li>
                                <li><strong><span>Có thể nghe gọi trên Gear S3 ở cả 2 phiên bản</span></strong></li>
                                <li>Gear S3 có thiết kế dạng mặt đồng hồ cảm ứng tròn, mỏng nhẹ và nhỏ gọn bám chắc chắn vào cổ tay bạn</li>
                                <li>Vỏ làm từ thép không gỉ 316L</li>
                                <li>Điều chỉnh nhẹ nhàng, đơn giản với một vòng xoay bên ngoài mặt kình</li>
                                <li>
                                    <span title="Track your daily activity levels, heart rate and water vs. caffeine intake.">Theo dõi mức độ hoạt động hàng ngày của bạn</span></li>
                                <li>
                                    Gear S3 có thể đếm bước chân, đo 
                                    <span title="Track your daily activity levels, heart rate and water vs. caffeine intake.">nhịp tim và lượng calories bạn tiêu hao trong quá trình tập luyện</span>
                                </li>
                                <li>
                                    <span title="Track your daily activity levels, heart rate and water vs. caffeine intake.">Kết nối với những chiếc xe Volkswagen để theo dõi hành trình hay mở cửa với một thao tác đơn giản</span>
                                </li>
                                <li>
                                    <span title="Track your daily activity levels, heart rate and water vs. caffeine intake.">Sử dụng tính năng Samsung Pay trên đồng hồ để mua cafe, sử dụng dịch vụ và nhiều thao tác khác.</span>
                                </li>
                                <li>
                                    <span title="Track your daily activity levels, heart rate and water vs. caffeine intake.">Cho phép lưu trữ tối đa 300 bài hát để bạn thưởng thức âm nhạc mọi lúc mọi nơi</span>
                                    </li>
                                <li>
                                    <span title="Track your daily activity levels, heart rate and water vs. caffeine intake.">Nhận và gửi tin nhắn thoại đồng thời với hình ảnh và văn bản</span>
                                </li>
                            </ul>
                            <p>
                                <img src="images/detail/1.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/2.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/3.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/4.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/5.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/1.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/2.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/3.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/4.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/5.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/1.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/2.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/3.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/4.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/5.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/1.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/2.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/3.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/4.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/5.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/1.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/2.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/3.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/4.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/5.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/1.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/2.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/3.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/4.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/5.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/1.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/2.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/3.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/4.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                            <p>
                                <img src="images/detail/5.jpg" alt="">
                                Nút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.
                            </p>
                        </div><!-- /block_characteristics -->
                        <div class="block_show_less">
                            <a class="btn-overflow" href="javascript:void(0);">Show More</a>
                        </div><!-- /block_show_less -->
                        <div class="block_bottom_order">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <img src="images/detail/thumb/1.jpg" alt="">
                                    <div class="info_sp">
                                        <h3>SAMSUNG GEAR S3 FRONTIER SM-R760</h3>
                                        <strong>5.990.000₫</strong>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="block_order">
                                        <a href="#" title="" class="buy_now">
                                            <b>Mua ngay </b>
                                            <span>Giao tận nơi hoặc nhận tại siêu thị</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /block_detail_left -->
                    <div class="col-md-4 col-sm-4 col-xs-12 block_detail_right">
                        <div class="block_tableparameter">
                            <h2>Thông số kỹ thuật</h2>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td class="title">Kích thước:</td>
                                        <td>49 x 46 x 12.9 mm</td>
                                    </tr>
                                    <tr>
                                        <td class="title">Màn hình tròn:</td>
                                        <td>1.3” sAMOLED 360 x 360 (~278ppi)</td>
                                    </tr>
                                    <tr>
                                        <td class="title">Chipset:</td>
                                        <td>Dual-Core 1 GHz, 768MB RAM, bộ nhớ trong 4GB</td>
                                    </tr>
                                    <tr>
                                        <td class="title">Dung lượng pin:</td>
                                        <td>Pin 380 mAh</td>
                                    </tr>
                                    <tr>
                                        <td class="title">Màn hình:</td>
                                        <td>Always-On</td>
                                    </tr>
                                    <tr>
                                        <td class="title">Công nghệ:</td>
                                        <td>
                                            <p>Bluetooth v4.2, Wi-Fi 802.11 b/g/n</p>
                                            <p>Chống nước chuẩn IP68</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="title">Hệ điều hành:</td>
                                        <td>Tizen</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            <button type="button" class="btn btn_tableparameter" data-toggle="modal" data-target="#Modalparameter">Xem cấu hình chi tiết</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div><!-- /block_detail_right -->
                </div><!-- /box_detaillightbox -->
            </div>
        </div><!-- /product_detail_content -->
    </div><!-- /block_detail_wrap -->
</div><!-- /block_product_detail -->
<div class="modal fade" id="Modalparameter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">SAMSUNG GEAR S3 FRONTIER SM-R760</h4>
            </div>
            <div class="modal-body">
                <img src="images/detail/1.jpg" alt="">
                <table class="table parameterfull">
                    <tr>
                        <td colspan="2" class="title">Màn Hình</td>
                    </tr>
                    <tr>
                        <td>Công nghệ màn hình:</td>
                        <td>LED-backlit IPS LC</td>
                    </tr>
                    <tr>
                        <td>Độ phân giải:</td>
                        <td>Full HD (1080 x 1920 pixels)</td>
                    </tr>
                    <tr>
                        <td>Màn hình rộng:</td>
                        <td>5.5"</td>
                    </tr>
                    <tr>
                        <td>Mặt kính cảm ứng:</td>
                        <td>Kính oleophobic (ion cường lực)</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="title">Hệ điều hành - CPU</td>
                    </tr>
                    <tr>
                        <td>Hệ điều hành:</td>
                        <td>Tizen</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="title">Kết Nối</td>
                    </tr>
                    <tr>
                        <td>Bluetooth:</td>
                        <td>Bluetooth v4.2, Wi-Fi 802.11 b/g/n</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="title">Kết Nối</td>
                    </tr>
                    <tr>
                        <td>Bluetooth:</td>
                        <td>Bluetooth v4.2, Wi-Fi 802.11 b/g/n</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="title">Kết Nối</td>
                    </tr>
                    <tr>
                        <td>Bluetooth:</td>
                        <td>Bluetooth v4.2, Wi-Fi 802.11 b/g/n</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="title">Kết Nối</td>
                    </tr>
                    <tr>
                        <td>Bluetooth:</td>
                        <td>Bluetooth v4.2, Wi-Fi 802.11 b/g/n</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="title">Kết Nối</td>
                    </tr>
                    <tr>
                        <td>Bluetooth:</td>
                        <td>Bluetooth v4.2, Wi-Fi 802.11 b/g/n</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div><!-- Modal -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
$(document).ready(function () {
        lightbox.option({
            'resizeDuration': 700,
            'wrapAround': true,
            'showImageNumberLabel': false,
            'fadeDuration': 700,
            'positionFromTop': 50,
        });

        $(".bxslider").bxSlider({
            controls: false,
            pagerCustom: '.pro-thumb-img',
            infiniteLoop: false,
            hideControlOnEnd: true,
            mode: 'fade',
        });

        $(".pro-thumb-img").bxSlider({
            slideMargin: 10,
            maxSlides: 5,
            pager: false,
            controls: true,
            slideWidth: 70,
            infiniteLoop: false,
            nextText: '<i class="fa fa-angle-right"></i>',
            prevText: '<i class="fa fa-angle-left"></i>'
        });
        var text = $('.block_characteristics'),
            btn = $('.btn-overflow'),
            h = text[0].scrollHeight;

        if(h > 364) {
            btn.addClass('less');
            btn.css('display', 'block');
        }
        btn.click(function(e) {
            e.stopPropagation();

            if (btn.hasClass('less')) {
                btn.removeClass('less');
                btn.addClass('more');
                btn.parent().addClass("less")
                btn.text('Show Less');
                text.animate({'height': h});
            } else {
                btn.addClass('less');
                btn.removeClass('more');
                btn.text('Show More');
                btn.parent().removeClass("less")
                text.animate({'height': '364px'});
            }  
        });
        $('.btn_tableparameter').click(function(){
            if ($('body').hasClass('modal-open')) {
                $('body').addClass('.block_fixbody');
            }else{
                $('body').removeClass('.block_fixbody');
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>