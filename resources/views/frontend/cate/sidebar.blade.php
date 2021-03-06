<form action="{!! route('search') !!}" method="GET" id="searchForm">
<input type="hidden" name="sort" id="sort-filter" value="new">
<div class="col-md-3 col-sm-3 col-xs-12 block_cate_left" style="padding-bottom:30px">
    <div class="block block_modul">
        <div class="block_price">
            <h3 class="block_title">Khoảng giá</h3>
            <div class="block_content clearfix">
                <div class="slider-range">
                    <div id="slider-range"></div>
                    <div class="action clearfix">
                        <span id="amount-left"></span>
                        <span id="amount-right"></span>
                    </div>
                </div>
            </div>
            <input type="hidden" name="price_fm" value="{{ $price_fm }}" id="price_fm" />
            <input type="hidden" name="price_to" value="{{ $price_to }}" id="price_to" />
        </div>
    </div><!-- /block_modul -->
    @if($routeName != 'search')
    <div class="block block_modul">
        <div class="block_brands">
            <div class="box-accordion in">
                <div class="box-header accordion-header">
                    <h3 class="block_title">Hãng {{ $loaiDetail ? $loaiDetail->name : "" }}</h3>
                    <a href="javascript:void(0);" class="btn-opened" title="Down Up"></a>
                </div>
                <div class="box-collapse">
                    <div class="block_content">
                        <ul class="clearfix">
                            @foreach( $cateArrByLoai[$loaiDetail->id] as $cate)
                            <li>
                                <input {{ isset($cateDetail) && $cateDetail->id == $cate->id ? "checked" : "" }} type="checkbox" class="cate-filter" name="cate[]" value="{!! $cate->id !!}" id="brand-{!! $cate->id !!}"> 
                                <label for="brand-{!! $cate->id !!}" title="{!! $cate->name !!}">{!! $cate->name !!}
                                    <span class="number-prod">{{ $cate->product->count() }}</span>
                                </label>                            
                            </li>
                            @endforeach
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- /block_brands -->
    </div><!-- /block_modul -->
    @else
    @foreach($loaiSpList as $loaiSp)
    <div class="block block_modul">
        <div class="block_brands">
            <div class="box-accordion in">
                <div class="box-header accordion-header">
                    <h3 class="block_title">{!! $loaiSp->name !!}</h3>
                    <a href="javascript:void(0);" class="btn-opened" title="Down Up"></a>
                </div>
                <div class="box-collapse">
                    <div class="block_content">
                        <ul class="clearfix">
                            @foreach( $cateArrByLoai[$loaiSp->id] as $cate)
                            <li>
                                <input type="checkbox" class="cate-filter" name="cate[]" value="{!! $cate->id !!}" id="brand-{!! $cate->id !!}"> 
                                <label for="brand-{!! $cate->id !!}" title="{!! $cate->name !!}">{!! $cate->name !!}                                    
                                </label>                            
                            </li>
                            @endforeach                           
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- /block_brands -->
    </div><!-- /block_modul -->
    @endforeach
    @endif
    <div class="block block_modul" >
        <div class="block_colors">
            <div class="box-accordion in">
                <div class="box-header accordion-header">
                    <h3 class="block_title">MÀU SẮC</h3>
                    <a href="javascript:void(0);" class="btn-opened" title="Down Up"></a>
                </div>
                <div class="box-collapse">
                    <div class="block_content">
                        <ul class="search-color">
                            @foreach($colorList as $color)
                            <li ><a href="javascript:;" class="color-filter" data-id="{{ $color->id }}" style="background:{!! $color->color_code !!};"></a>
                            <input type="hidden" name="color[]" type="checkbox" value="" />
                            </li>
                            @endforeach                            
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- /block_colors -->
    </div><!-- /block_modul -->
</div><!-- /block_cate_left -->
<input type="hidden" name="loai_id" value="{{ $loaiDetail->id }}">
@if(isset($cateDetail))
<input type="hidden" name="cate_id" value="{{ $cateDetail->id }}">
@endif
</form>