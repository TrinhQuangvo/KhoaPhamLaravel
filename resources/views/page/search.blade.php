@extends('master')
@section('content')
<div class="container">
  <div id="content" class="space-top-none">
    <div class="main-content">
      <div class="space60">&nbsp;</div>
      <div class="row">
        <div class="col-sm-12">
          <div class="beta-products-list">
            <h4>Search</h4>
            <div class="beta-products-details">
              <p class="pull-left">Có {{count(product)}} Sản Phẩm Được Tìm Thấy</p>
              <div class="clearfix"></div>
            </div>
            <div class="row">
              @foreach($product as $new)
              <div class="col-sm-3">
                <div class="single-item">
                @if($new->promotion_price!=0)
                <div class="ribbon-wrapper">
                  <div class="ribbon sale">Sale</div>
                </div>
                @endif
                  <div class="single-item-header">
                    <a href="{{route('chitiet',$new->id)}}"><img src="source/image/product/{{$new->image}}" height="250px" alt=""></a>
                  </div>
                  <div class="single-item-body">
                    <p class="single-item-title">{{$new->name}}</p>
                    <p class="single-item-price">
                  @if($new->promotion_price!=0)
                    <span class="flash-sale">{{$new->unit_price}}</span>
                  @else
                     <span class="flash-del">{{$new->unit_price}}</span>
                    <p class="single-item-price">
                      <span>{{$new->promotion_price}} vnđ</span>
                    </p>
                  @endif
                  </div>
                  <div class="single-item-caption">
                  <a class="add-to-cart pull-left" href="{{route('themgiohang',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
                    <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div class="row">
            
            </div>
            <div class="row">
              {{$new_product->links()}}
            </div>
          </div>
        
      </div>
      <!-- end section with sidebar and main content -->
    </div>
    <!-- .main-content -->
  </div>
  <!-- #content -->
</div>
@endsection