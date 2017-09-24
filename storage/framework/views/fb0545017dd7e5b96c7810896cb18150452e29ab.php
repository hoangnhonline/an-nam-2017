
<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="block block_breadcrumb">
    <ol class="breadcrumb">
        <li><a href="<?php echo route('home'); ?>">Trang chủ</a></li>
        <li><a href="<?php echo route('news-list'); ?>">Tin tức</a></li>        
        <li class="active"><?php echo $detail->title; ?></li>
    </ol>
</div><!-- /block_breadcrumb -->
<div class="block_news row">
    <div class="col-md-9 col-sm-9 col-xs-12 block_cate_left">
        <div class="block_news_content">
            <h1 class="article-title"><?php echo $detail->title; ?></h1>
            <p class="content-date">Ngày tạo: <?php echo date('d/m/Y H:i', strtotime($detail->created_at)); ?></p>
            <div class="block">
                <p class="block_intro">
                    <img class="lazy" data-original="<?php echo Helper::showImage($detail->image_url ); ?>" alt="<?php echo $detail->title; ?>">
                </p>
                <?php echo $detail->content; ?>

            </div><!-- /block -->
            <?php if( $otherArr ): ?>
                       
            <div class="block_news_related" style="margin-top:40px">
                <span class="block_title">CÁC TIN KHÁC</span>
                <ul class="row">
                 <?php foreach( $otherArr as $articles): ?>
                <li class="col-sm-3 col-sm-6">
                    <div class="des" style="text-align:left">
                        <img src="<?php echo Helper::showImage($articles->image_url ); ?>" alt="<?php echo $articles->title; ?>">
                        <a href="<?php echo e(route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id])); ?>" title="<?php echo $articles->title; ?>" ><?php echo $articles->title; ?></a>
                        <span>[<?php echo date('d/m/Y', strtotime($detail->created_at)); ?>]</span>
                    </div>
                </li>                
                <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
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