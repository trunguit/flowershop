@php
    use App\Helpers\Template as Template;
    use App\Helpers\Hightlight as Hightlight;
    
@endphp
<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">Mã đơn hàng</th>
                    <th class="column-title">Thông tin</th>
                    <th class="column-title">Chi tiết</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Ngày đặt</th>
                    <th class="column-title">Tổng tiền</th>
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($items) > 0)
                
                    @foreach ($items as $key => $item)
                        @php
                            $index           = $item['id'];
                            $class           = ($index % 2 == 0) ? "even" : "odd";
                            $id              = $item['id'];
                            $price      = 0;
                            $products      = json_decode($item['products'],true);
                           
                            $total = Template::formatMoney($item['total_price']);
                          
                            $detail = '';
                               foreach($products as $product){
                                    
                               $detail     .='- '. $product['name']. ' x '. $product['qty'].' = '.  $product['total'] ."</br>";
                                }
                            
                                    
                            $date            = Template::showItemHistory('admin',$item['date']);
                            // $status          = Template::showItemStatus($controllerName, $id, $item['status']); 
                           
                            // dd($valueStatus);
                            $status       = Template::showItemSelectCart($controllerName, $item['id'], $item['status'], 'status');
                            $createdHistory  = Template::showItemHistory($item['created_by'], $item['created']);
                            $modifiedHistory = Template::showItemHistory($item['modified_by'], $item['modified']);
                            $listBtnAction   = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td >{!! $id !!}</td>
                            <td width="20%">
                               <p>Người đặt : {!!$item['username']!!}</p>
                               <p>Số điện thoại : {!!$item['phone']!!}</p>
                               <p>Địa chỉ : {!!$item['address']!!}</p>
                            </td>
                            <td width="30%">
                                {!!$detail!!}
                            </td>
                            <td>{!! $status !!}</td>
                            <td>{!! $date !!}</td>
                            <td>{!! $total!!}</td>
                            <td class="last">{!! $listBtnAction !!}</td>
                        </tr>
                    @endforeach
                @else
                    @include('admin.templates.list_empty', ['colspan' => 6])
                @endif
            </tbody>
        </table>
    </div>
</div>
           