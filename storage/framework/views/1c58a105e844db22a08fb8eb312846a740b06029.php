<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="block block_breadcrumb">
    <ol class="breadcrumb">
        <li><a href="<?php echo route('home'); ?>">Trang chủ</a></li>         
        <li class="active"><?php echo $detailPage->title; ?></li>
    </ol>
</div><!-- /block_breadcrumb -->
<div class="block_news row">
    <div class="col-md-9 col-sm-9 col-xs-12 block_cate_left">
        <div class="block_news_content">
            <h1 class="article-title"><?php echo $detailPage->title; ?></h1>
            
            <div class="block" style="margin-top:30px">
                <p class="block_intro">
                    <img src="<?php echo Helper::showImage($detailPage->image_url ); ?>" alt="<?php echo $detailPage->title; ?>">
                </p>
                <?php echo $detailPage->content; ?>

            </div><!-- /block -->            
        </div>
    </div><!-- /block_cate_left -->

    <?php echo $__env->make('frontend.news.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div><!-- /block_categories -->
<style type="text/css">
    .block_news_related ul li a{
        font-size: 12px;
        height: 30px;
        display: block;
        overflow-y: hidden;
    }
</style>
<?php $__env->stopSection(); ?>  

<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>