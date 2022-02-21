@php
    use App\Helpers\Template as Template;
    use App\Helpers\Hightlight as Highlight;
@endphp

{!! Form::open(['method'  => 'POST', 'url' => route("$controllerName/update"), 'id' => 'update-form']) !!}
<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
            <tr class="headings">
                {{-- <th>
                    <div class="icheckbox_flat-green" style="position: relative;">
                        <input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;">
                    </div>
                </th> --}}
                <th class="column-title">#</th>
                <th class="column-title">Thông tin</th>
                <th class="column-title">Danh mục</th>
                <th class="column-title">Hình ảnh</th>
                <th class="column-title">Trạng thái</th>
                <th class="column-title">Kiểu sản phẩm</th>
                {{-- <th class="column-title">Sắp xếp</th> --}}
                <th class="column-title">Tạo mới</th>
                <th class="column-title">Hành động</th>
                <th class="bulk-actions" colspan="9" style="display: none;">
                    <a class="antoo" style="color:#fff; font-weight:500;">Checked ( <span class="action-cnt">1 Records Selected </span> ) <i class="fa fa-chevron-down"></i></a>
                </th>
            </tr>
            </thead>
            <tbody>
            @if (count($items) > 0)
           
                @foreach ($items as $key => $val)
                    @php
                        $index  = $key + 1;
                        $id = $val['id'];
                        $image_main = json_decode($val['thumb'], true);
                        $class  = ($index % 2 == 0) ? "odd" : "even";
                        $name               = Highlight::show($val->name, $params['search'], 'name');
                        
                        $description        = Highlight::show(Template::substrContent($val->description, 300), $params['search'], 'description');
                        $description        = "Content";
                        $image              = Template::showItemThumbUpload($image_main[0]['name'], $image_main[0]['alt']);
                        
                        $category        = Form::select('category_id', $itemsCategory, $val['category_id'], ['class' => 'form-control select-ajax', 'data-url' => route("$controllerName/change-category", ['id' => $id, 'category_id' => 'value_new'])]);
                       
                        $type              = Template::showItemSelect($controllerName, $val['id'], $val['type'], 'config');
                        $status             = Template::showItemStatus($controllerName, $val['id'], $val['status']);
                        $createHistory      = Template::showItemHistory($val['created_by'], $val['created']);
                        $listBtnAction      = Template::showButtonAction($controllerName, $val['id']);
                    @endphp

                    <tr class="{{ $class }} pointer">
                        {{-- <td class="a-center ">
                            <div class="icheckbox_flat-green" style="position: relative;">
                                <input type="checkbox" class="flat table_records" name="cid[{{$id}}]" style="position: absolute; opacity: 0;">
                            </div>
                        </td> --}}
                        <td class="">{{ $index }}</td>
                        <td width="25%">
                            <p><strong>Tên sản phẩm:</strong> {!! $name !!}</p>
                            <p><strong>Mô tả:</strong> {!! $description !!}</p>
                        </td>
                        <td width="15%">{!! $category !!}</td>
                        <td width="10%">
                            <p>{!! $image !!}</p>
                        </td>
                        <td>{!! $status !!}</td>
                        <td>{!!$type!!}</td>
                        {{-- <td>{!! $ordering !!}</td> --}}
                        <td>{!! $createHistory !!}</td>
                        <td class="last">{!! $listBtnAction !!}</td>
                    </tr>
                @endforeach
            @else
                @include ('admin.templates.list_empty', ['colspan' => 9])
            @endif
            </tbody>
        </table>
    </div>
</div>
<style>
    img.zvn-thumb {
        height: 80px;
    }
</style>
<input type="hidden" id="type" name="type">
{!! Form::close() !!}