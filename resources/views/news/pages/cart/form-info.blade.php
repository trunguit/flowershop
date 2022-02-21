@php
     use App\Helpers\Template;
    //  $inputToken = Template::createinput('hidden', 'form[token]', 'form[token]', time(),null);
    
@endphp

<form action="{!!$linkBuy!!}" method="post">
    
    <div class="row">
        @csrf
    <div class="col-lg-6 col-md-6">
        <div class="billing-info">
            <label>Tên khách hàng</label>
            <input type="text" name="name">
        </div>
    </div>
   
    <input type="hidden" class="hidden-price-shipping" name="hidden-price-shipping" value="" >
    <input type="hidden"  class="hidden-total-price" name="hidden-total-price" value="" >
    
    <div class="col-lg-6 col-md-6">
        <div class="billing-info">
            <label>Email </label>
            <input type="email" name="email">
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="billing-info">
            <label>Số điện thoại</label>
            <input type="text" name="phone">
        </div>
    </div>
    @php
                                                
        $xhtmlSelectBox = Template::createSelectBox($itemsShip,'default','');
    @endphp
    <div class="col-lg-6 col-md-6">
        <div class="billing-select">
            <label>Quận</label>
            {!!$xhtmlSelectBox!!}
            
        </div>
    </div>
    
    <div class="col-lg-12 col-md-12">
        <div class="billing-info">
            <label>Địa chỉ</label>
            <input name="address" type="text">
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="billing-info">
            <label>Phí ship</label>
            <input disabled name="ship" class="price-ship" type="text" value="">
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="billing-info">
            <label>Ghi chú</label>
            <input name="note" type="text">
        </div>
    </div>
    <div class="billing-back-btn">
                                                
        <div class="billing-btn">
            <button type="submit">Đặt hàng</button>
        </div>
    </div>
    </div>
</form>