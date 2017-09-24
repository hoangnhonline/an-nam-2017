<!DOCTYPE html>
<html lang="vi">
<head>
	<title><?php echo $__env->yieldContent('title'); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="robots" content="index,follow"/>
    <meta http-equiv="content-language" content="en"/>
    <meta name="description" content="<?php echo $__env->yieldContent('site_description'); ?>"/>
    <meta name="keywords" content="<?php echo $__env->yieldContent('site_keywords'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <link rel="shortcut icon" href="<?php echo $__env->yieldContent('favicon'); ?>" type="image/x-icon"/>
    <link rel="canonical" href="<?php echo e(url()->current()); ?>"/>        
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $__env->yieldContent('title'); ?>" />
    <meta property="og:description" content="<?php echo $__env->yieldContent('site_description'); ?>" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>" />
    <meta property="og:site_name" content="annammobile.com" />
    <?php $socialImage = isset($socialImage) ? $socialImage : $settingArr['banner']; ?>
    <meta property="og:image" content="<?php echo e(Helper::showImage($socialImage)); ?>" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="<?php echo $__env->yieldContent('site_description'); ?>" />
    <meta name="twitter:title" content="<?php echo $__env->yieldContent('title'); ?>" />        
    <meta name="twitter:image" content="<?php echo e(Helper::showImage($socialImage)); ?>" />
	<meta name="robots" content="noindex,nofollow" />
	<!-- <link rel="shortcut icon" href="<?php echo e(URL::asset('public/assets/images/favicon.ico')); ?>" type="image/x-icon">
	<link rel="icon" href="<?php echo e(URL::asset('public/assets/images/favicon.ico')); ?>" type="image/x-icon"> -->
	<!-- ===== Style CSS ===== -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('public/assets/css/style.css')); ?>">
	<!-- ===== Responsive CSS ===== -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('public/assets/css/responsive.css')); ?>">

	<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic&amp;subset=latin,vietnamese" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,700,800,300&amp;subset=latin,vietnamese" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700&amp;amp;subset=latin,vietnamese" rel="stylesheet" type="text/css">


	<!-- ===== Responsive CSS ===== -->
  	<!-- <link href="<?php echo e(URL::asset('public/assets/responsive.css')); ?>" rel="stylesheet"> -->

  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<link href='<?php echo e(URL::asset('public/assets/animations-ie-fix.css')); ?>' rel='stylesheet'>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body <?php echo $routeName == 'payment' ? "class=pre_checkout" : ''; ?>>

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<div class="wrapper">

		<header class="header-bar">
			<div class="container">
				<div class="row"></div>
			</div>
		</header><!-- /header -->

		<main class="main">
			<div class="container">
				<?php echo $__env->make('frontend.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

				<?php echo $__env->yieldContent('content'); ?>
			</div>
		</main><!-- /main -->

		<footer class="footer">
			<div class="footer_top">
				<div class="container">
					<ul class="row block_bottom_menu">
	                    <li><a href="<?php echo e(route('home')); ?>" title="Trang chủ">Trang chủ</a></li>	                  	                
	                    <li><a href="<?php echo e(route('parent-cate', 'chinh-sach-bao-hanh')); ?>" title="Chính sách bảo hành">Chính sách bảo hành</a></li>
	                    <li><a href="<?php echo e(route('parent-cate', 'gioi-thieu')); ?>" title="Giới thiệu">Giới thiệu</a></li>
	                    <li><a href="<?php echo e(route('contact')); ?>" title="Liên hệ">Liên hệ</a></li>
	                    <li><a href="<?php echo e(route('parent-cate', 'huong-dan-dat-hang')); ?>" title="Hướng dẫn đặt hàng">Hướng dẫn đặt hàng</a></li>	            
	                    <li><a href="<?php echo e(route('parent-cate', 'chinh-sach-bao-mat')); ?>" title="Chính sách bảo mật">Chính sách bảo mật</a></li>
					</ul><!-- /block_bottom_menu -->
				</div>
			</div><!-- /footer_top -->
			<div class="footer_bottom">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-sm-12 col-xs-12 block_copy">
							<a href="<?php echo route('home'); ?>" class="logo"><img src="<?php echo e(URL::asset('public/assets/images/logo_white.png')); ?>" alt="Logo Ân Nam Mobile"></a>
							<div class="copyright">
                                <p>Cửa hàng điện thoại Ân Nam</p>
                                <p>Đ/C : 683/1B An Dương Vương, P.Bình Trị Đông, Q.Bình Tân, Tp.HCM</p>
                                <p>Email: contact@annam.vn</p>                               
                                <p>Hotline: 0904500057 / 0968678767</p>
                                <p>Copyrights © 2017 annammobile.com. All Rights Reserved</p>
                            </div>
						</div><!-- /block_copy -->
						<div class="col-md-2 col-sm-3 col-xs-4 block_pay">
							<div class="block_payment"> 
                                <p>CHẤP NHẬN THANH TOÁN</p>
                            	<i class="fa fa-cc-visa"></i>
                            	<i class="fa fa-cc-mastercard"></i>
                            </div>
						</div><!-- /block_pay -->
						<div class="col-md-2 col-sm-3 col-xs-4 block_indus">
							<a href="http://online.gov.vn/CustomWebsiteDisplay.aspx?DocId=5895" target="_blank" class="block_industry">
                            	<img src="<?php echo e(URL::asset('public/assets/images/logo-bocongthuong.png')); ?>" alt="TMĐT">
                            </a>
						</div>
					</div>
				</div>
			</div><!-- /footer_bottom -->
		</footer><!-- /footer -->

		<a id="return-to-top" class="td-scroll-up" href="javascript:void(0)">
      		<i class="fa fa-angle-up" aria-hidden="true"></i>
    	</a><!-- Return To Top -->

    	<!-- Modal -->
		<div class="modal fade" id="scart_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content" id="short-cart-content">
				
				</div>
			</div>
		</div>
	</div><!-- /wrapper -->
	
	<input type="hidden" id="route-register-customer-ajax" value="<?php echo e(route('register-customer-ajax')); ?>">
	<input type="hidden" id="route-register-newsletter" value="<?php echo e(route('register.newsletter')); ?>">
	<input type="hidden" id="route-add-to-cart" value="<?php echo e(route('add-product')); ?>" />
	<input type="hidden" id="route-payment" value="<?php echo e(route('payment')); ?>" />
	<input type="hidden" id="route-short-cart" value="<?php echo e(route('short-cart')); ?>" />
	<input type="hidden" id="route-update-product" value="<?php echo e(route('update-product')); ?>" />
	<!-- ===== JS ===== -->
	<script src="<?php echo e(URL::asset('public/assets/js/jquery.min.js')); ?>"></script>
	<!-- ===== JS Bootstrap ===== -->
	<script src="<?php echo e(URL::asset('public/assets/lib/bootstrap/bootstrap.min.js')); ?>"></script>	<!-- ===== Plugins ===== -->
	
	<!-- carousel -->
	<script src="<?php echo e(URL::asset('public/assets/lib/carousel/owl.carousel.min.js')); ?>"></script>
	<!-- sticky -->
    <script src="<?php echo e(URL::asset('public/assets/lib/jquery-ui/jquery-ui.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/assets/js/lazy.js')); ?>"></script>	
   	<?php if($routeName == 'home'): ?>
    <script src="<?php echo e(URL::asset('public/assets/js/plugins.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/assets/lib/slick/slick.min.js')); ?>"></script>
    <?php endif; ?>
    <!-- Select2 --> 
    <?php if($routeName == 'product-detail'): ?>
	<script src="<?php echo e(URL::asset('public/assets/lib/bxslider/bxslider.min.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('public/assets/lib/lightbox/js/lightbox.js')); ?>"></script>
	
	<?php endif; ?>
	<script src="<?php echo e(URL::asset('public/assets/lib/sticky/jquery.sticky.js')); ?>"></script>
    <!-- Slick -->    
    <script src="<?php echo e(URL::asset('public/assets/js/common.js')); ?>"></script>
    <?php if($routeName == 'home'): ?>
	<script src="<?php echo e(URL::asset('public/assets/js/home.js')); ?>"></script>	
	<?php endif; ?>
	<script src="<?php echo e(URL::asset('public/assets/js/general.js')); ?>"></script>	
	<?php if($routeName != 'product-detail'): ?>
	<script src="<?php echo e(URL::asset('public/assets/lib/select2/js/select2.min.js')); ?>"></script>	
	<?php endif; ?>	
	<?php echo $__env->yieldContent('js'); ?>
</body>
</html>