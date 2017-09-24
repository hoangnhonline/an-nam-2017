
<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="block block_breadcrumb">
  <ol class="breadcrumb">
    <li><a href="<?php echo route('home'); ?>" title="Trang chủ">Trang chủ</a></li>
    <li class="active">Đặt hàng thành công</li>
  </ol>
</div><!-- /block_breadcrumb -->
<div class="block block_after-payment">
  <img src="<?php echo e(URL::asset('assets/images/ops-blk.jpg')); ?>" alt="Mua hang thanh cong">
  <div class="a-payment-ct">
    <div class="a-payment-w">
      <h1 class="main-msg">CẢM ƠN QUÝ KHÁCH ĐÃ ĐẶT HÀNG!</h1>
      <p><b><i>Annammobile sẽ gọi cho <?php echo $orderDetail->gender == 1  ? "Anh" : "Chị"; ?> <strong><?php echo $orderDetail->full_name; ?></strong>, số điện thoại <strong><?php echo $orderDetail->phone; ?></strong> ngay khi có thể để xác nhận đơn hàng.</i></b></p>
      <p>
      <b>Địa chỉ giao hàng:</b> <br>
       <?php echo $orderDetail->address; ?>, <?php echo $orderDetail->district->name; ?>, <?php echo $orderDetail->city->name; ?>                                                                  
                                            </p>
      <p>
      <b>Cần hỗ trợ tư vấn vui lòng gọi: 0904500057</b>
      </p>
    </div>  
  </div>
</div><!-- /block_after -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>