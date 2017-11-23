@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<div class="block_cate_top">
  <ul class="list">
    <li style="margin-left:0px"><a href="{{ route('old-device') }}" title="Máy cũ nổi bật">Máy cũ nổi bật</a></li>
    @foreach( $loaiSpList as $loaiSp)
    <li @if($loaiDetail->id == $loaiSp->id) class="actused" @endif><a href="{{ route('old-cate', $loaiSp->slug ) }}" title="{!! $loaiSp->name !!} cũ">{!! $loaiSp->name !!} cũ</a></li>
    @endforeach   
  </ul>
</div><!-- /block_cate_top -->

<div class="block block_product block_product_old">
    <h3 class="block_title block_title_link">
      <span>{!! $thongTinDetail->name !!} CŨ GIÁ RẺ</span> 
      <span class="num">{{ $productList->total() }}</span>
      <p style="display: block;font-size: 13px;color: #666;text-transform: none;font-weight: normal;">Giá máy mới: <b style="color: #d0021b;font-weight: 300;">{{ number_format($thongTinDetail->price) }}₫</b></p>
    </h3>
    <div class="viewcolor">
      @if(!empty($colorArr))
      <form method="GET" action="{{ url()->current() }}">
            <span>Xem theo màu:</span>
            @foreach($colorArr as $cl_id => $cl_name)
            <label>
              <input type="checkbox" name="color_id[]" {{ in_array($cl_id,$color_id) ? "checked"  : "" }} class="color" value="{{ $cl_id }}">  {{ $cl_name }}
            </label>
            @endforeach

       </form>     
       @endif
    </div>
    <div class="block_content">
      <div class="list_de_old">
        @if($productList->count() > 0)
        <ul class="pro_de_old">
          @foreach( $productList as $product )
          <?php 
         // var_dump("<pre>", $product );die;
          ?>
          <li class="col-sm-5ths col-xs-6 product_item">
            <div class="de_old_img">
              <a href="{{ route('product-detail', [$product->slug, $product->id]) }}" title="{!! $product->name !!}">
                <img alt="{!! $product->name !!}" src="{{ $product->image_url ? Helper::showImageThumb($product->image_url) : URL::asset('admin/dist/img/no-image.jpg') }}">
              </a>
            </div>
            <div class="product_info">             
              <div class="product_price">
              <p class="price_title price_now"><span style="font-size: 16px">{{ number_format($product->price) }}₫</span></p>
                @if($product->thongtinchung->price)               

                <p class="price_title price_compare">Rẻ hơn máy mới: <span style="color:#5c5c5c">{{ number_format($product->thongtinchung->price - $product->price) }}₫</span></p>
                <p class="price_title price_compare">Màu: <span style="color:#5c5c5c">{{ $product->color->name }}</span></p>
                @endif
            </div> 
            @if($product->is_sale)
            <span class="sale_off">GIẢM {{ ceil(($product->price-$product->price_sale)*100/$product->price) }}%</span>
            @endif          
            </div>
          </li><!-- /product_item -->
          @endforeach
        </ul>
        @else
        <p style="font-style:italic">Không tìm thấy sản phẩm nào.</p>
        @endif
      </div>
    </div>
  </div><!-- /block_product -->
  <style type="text/css">
      
      .block_product h3.block_title.block_title_link{
        border-top: none;
      }
      
    .viewcolor {
        float: right;
        margin-right: 10px;
        font-size: 13px;
        margin-top: 10px;
    }
  </style>
@stop
@section('js')
<script>
$(document).ready(function(){
    $('.old-cid').click(function(){
        var cid = $(this).data('value');
        $('#c').val(cid);
        $(this).parents('form').submit();
    });
    $('.color').click(function(){
      $(this).parents('form').submit();
    });
    $('.old-sort').click(function(){
        var sort = $(this).data('value');
        $('#s').val(sort);
        $(this).parents('form').submit();
    });
    $('.old-price').click(function(){
        var obj = $(this);
        var pf = obj.data('fm');
        var pt = obj.data('to');
        $('#pf').val(pf);
        $('#pt').val(pt);
        obj.parents('form').submit();
    });
    $('.rm-cate').click(function(){
        $('#c').val('');
        $(this).parents('form').submit();
    });
    $('.rm-price').click(function(){
        $('#pf').val(0);
        $('#pt').val(500000000);
        $(this).parents('form').submit();
    });
}); 
</script>
@stop