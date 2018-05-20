@extends('master')
@section('content')
<div class="fullwidthbanner-container">
  <div class="fullwidthbanner">
    <div class="bannercontainer" >
      <div class="banner" >
        <ul>
		@foreach($slide as $sl)
          <!-- THE FIRST SLIDE -->
          <li data-transition="boxfade" data-slotamount="20" class="active-revslide" 
            style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" 
              data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" 
              data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" 
              data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" 
              data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
              <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center"
			   data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$sl->image}}" 
			   data-src="source/image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat;
			   background-image: url('source/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
              </div>
            </div>
          </li>
		@endforeach
        </ul>
      </div>
    </div>
    <div class="tp-bannertimer"></div>
  </div>
</div>
<!--slider-->
</div>
<div class="container">
  <div id="content" class="space-top-none">
    <div class="main-content">
      <div class="space60">&nbsp;</div>
      <div class="row">
        <div class="col-sm-12">
          <div class="beta-products-list">
            <h4>Sản Phẩm Mới</h4>
            <div class="beta-products-details">
              <p class="pull-left">Có {{count($new_product)}} Sản Phẩm Được Tìm Thấy</p>
              <div class="clearfix"></div>
            </div>
            <div class="row">
              @foreach($new_product as $new)
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
          <!-- .beta-products-list -->
          <div class="space50">&nbsp;</div>
          <div class="beta-products-list">
            <h4>Sản Phẩm Khuyến Mãi</h4>
            <div class="beta-products-details">
              <p class="pull-left">Tìm Thấy {{count($sanpham_khuyenmai)}} Sản Phẩm</p>
              <div class="clearfix"></div>
            </div>
            <div class="space40">&nbsp;</div>
            <div class="row">
            @foreach($sanpham_khuyenmai as $spkm)
              <div class="col-sm-3">
                <div class="single-item">
                  <div class="single-item-header">
                    <a href="route('chitiet',$spkm->id)"><img src="source/image/product/{{$spkm->image}}" height="250px" alt=""></a>
                  </div>
                  <div class="single-item-body">
                    <p class="single-item-title">{{$spkm->name}}</p>
                    <p class="single-item-price">
                      <span class="flash-del">
                      {{number_format($spkm->unit_price)}}  VNĐ
                      </span>
                      <span class="flash-sale">
                      {{number_format($spkm->promotion_price)}} VNĐ
                      </span>
                    </p>
                  </div>
                  <div class="single-item-caption">
                    <a class="add-to-cart pull-left" href="{{route('themgiohang',$spkm->id)}}"><i class="fa fa-shopping-cart"></i></a>
                    <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            @endforeach
            </div>
          </div>
          <!-- .beta-products-list -->
        </div>
      </div>
      <!-- end section with sidebar and main content -->
    </div>
    <!-- .main-content -->
  </div>
  <!-- #content -->
</div>
<!-- .container -->
<div id="footer" class="color-div">
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="widget">
          <h4 class="widget-title">Instagram Feed</h4>
          <div id="beta-instagram-feed">
            <div></div>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="widget">
          <h4 class="widget-title">Information</h4>
          <div>
            <ul>
              <li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Web Design</a></li>
              <li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Web development</a></li>
              <li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Marketing</a></li>
              <li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Tips</a></li>
              <li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Resources</a></li>
              <li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Illustrations</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="col-sm-10">
          <div class="widget">
            <h4 class="widget-title">Contact Us</h4>
            <div>
              <div class="contact-info">
                <i class="fa fa-map-marker"></i>
                <p>30 South Park Avenue San Francisco, CA 94108 Phone: +78 123 456 78</p>
                <p>Nemo enim ipsam voluptatem quia voluptas sit asnatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="widget">
          <h4 class="widget-title">Newsletter Subscribe</h4>
          <form action="#" method="post">
            <input type="email" name="your_email">
            <button class="pull-right" type="submit">Subscribe <i class="fa fa-chevron-right"></i></button>
          </form>
        </div>
      </div>
    </div>
    <!-- .row -->
  </div>
  <!-- .container -->
</div>
@endsection