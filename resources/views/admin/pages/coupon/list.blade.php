@php
    use App\Helpers\Template as Template;
    use App\Helpers\Hightlight as Hightlight;
    use App\Helpers\SelectBox as SelectBox;
    
@endphp
<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">Mã</th>
                    <th class="column-title">Loại giảm</th>
                    <th class="column-title">Giá trị</th>
                    <th class="column-title">Giá thấp nhất</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Ngày bắt đầu </th>
                    <th class="column-title">Ngày kết thúc</th>
                    <th class="column-title">Đã sử dụng</th>
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($items) > 0)
                
                    @foreach ($items as $key => $val)
                        @php
                            $index           = $key + 1;
                            $class           = ($index % 2 == 0) ? "even" : "odd";
                            $id              = $val['id'];
                            $code            = Hightlight::show($val['code'], $params['search'], 'code') ;
                            $type_coupon     = Template::nameCoupon($val['type_coupon']);
                            $value           = Template::valueCoupon($val['type_coupon'],$val['value']);
                            $price           = number_format($val['price_start']) . " VNĐ";
                            $status          = Template::showItemStatus($controllerName, $id, $val['status']); ;
                            $date_start      =  $val['date_start'] ;
                            $date_end        =  $val['date_end'];
                            $listBtnAction   = Template::showButtonAction($controllerName, $id);
                        @endphp
                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td>{!! $code !!}</td>
                            <td>{!! $type_coupon !!}</td>
                            <td>{!! $value !!}</td>
                            <td>{!! $price !!}</td>
                            <td>{!! $status !!}</td>
                            <td>{!! $date_start !!}</td>
                            <td>{!! $date_end !!}</td>
                            <td>{!! $val['total_used'] !!}</td>
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
           