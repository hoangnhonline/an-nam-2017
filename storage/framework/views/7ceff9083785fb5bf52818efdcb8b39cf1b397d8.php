<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="block block_breadcrumb">
  <ol class="breadcrumb">
    <li><a href="<?php echo route('home'); ?>">Trang chủ</a></li>
    <li class="active">Tin Tức</li>
  </ol>
</div><!-- /block_breadcrumb -->
<div class="block_news row">
  <div class="col-md-9 col-sm-9 col-xs-12 block_cate_left">
    <?php if($page == 1): ?>
    <div class="block block-news-default row">
      <div class="block-news-default-left">
        <div class="col-sm-8 col-xs-12">
          <?php if($articlesList->first()): ?>
          <div class="block-news-default-item">
            <div class="block_thumb">
              <a href="<?php echo e(route('news-detail', ['slug' => $articlesList->first()->slug, 'id' => $articlesList->first()->id])); ?>" title="<?php echo $articlesList->first()->title; ?>">
                <img src="<?php echo Helper::showImage($articlesList->first()->image_url); ?>" alt="<?php echo $articlesList->first()->title; ?>">
              </a>
            </div>
            <a href="<?php echo e(route('news-detail', ['slug' => $articlesList->first()->slug, 'id' => $articlesList->first()->id])); ?>" title="<?php echo $articlesList->first()->title; ?>">
                    <h3><?php echo $articlesList->first()->title; ?>

              <!--<span class="lesscom"><i class="fa fa-comment-o"></i>11</span>-->
                    </h3>
                </a>
                <figure>
              <?php echo $articlesList->first()->description; ?>

            </figure>
          </div>
          <?php endif; ?>
        </div>
      </div><!-- /block-news-default-left -->
      <div class="block-news-default-right">
        <div class="col-sm-4 col-xs-12">
          <?php if($articlesList): ?>
          <ul class="list_news">
            <?php $i = 0; ?>
            <?php foreach($articlesList as $articles): ?>
            <?php $i++ ; ?>
            <?php if($i > 1 && $i < 6): ?>
            <li class="item">
              <?php if($i == 2): ?>
              <div class="block_thumb">
                <a href="<?php echo e(route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id])); ?>" title="<?php echo $articles->title; ?>">
                  <img src="<?php echo Helper::showImage($articles->image_url); ?>" alt="<?php echo $articles->title; ?>">
                </a>
              </div>
              <?php endif; ?>
              <a href="<?php echo e(route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id])); ?>" title="<?php echo $articles->title; ?>">
                <h3>  
                  <?php echo $articles->title; ?>

                </h3>
              </a>
            </li>
            <?php endif; ?>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
        </div>
      </div><!-- /block-news-default-right -->
    </div><!-- /block-news-default -->
    <?php endif; ?>
    <ul class="block_news_bot clearfix">
      <?php $i = 0; 
      $nRow = $page == 1 ? 6 : 0;
      ?>
          <?php foreach($articlesList as $articles): ?>
          <?php $i++ ; ?>

          <?php if($i > $nRow): ?>
      <li class="item">
        <div class="block_thumb">
          <a href="<?php echo e(route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id])); ?>" title="<?php echo $articles->title; ?>">
            <img src="<?php echo Helper::showImage($articles->image_url); ?>" alt="<?php echo $articles->title; ?>">
          </a>
        </div>
        <div class="description">
          <a href="<?php echo e(route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id])); ?>" title="<?php echo $articles->title; ?>">
            <h3> <?php echo $articles->title; ?></h3>
          </a>
          <figure>
            <?php echo $articles->description; ?>

          </figure>                     
        </div>
      </li><!-- /item -->
      <?php endif; ?>
      <?php endforeach; ?>
      
    </ul><!-- /block_news_bot -->
    <div style="text-align:center"><?php echo e($articlesList->links()); ?></div>
  </div><!-- /block_cate_left -->

  <?php echo $__env->make('frontend.news.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div><!-- /block_categories -->
<?php $__env->stopSection(); ?>