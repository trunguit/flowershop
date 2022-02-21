@php
    use App\Helpers\Template as Template;
    use App\Helpers\Hightlight as Hightlight;
@endphp
<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">User Info</th>
                    <th class="column-title">Nội dung</th>
                    <th class="column-title">Tạo mới</th>
                    <th class="column-title">Id bài viết</th>
                    <th class="column-title">Thời gian</th>
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
                            $name            = Hightlight::show($val['name'], $params['search'], 'name');
                            $email            = Hightlight::show($val['email'], $params['search'], 'email');
                            $content     = Hightlight::show($val['content'], $params['search'], 'content');
                            $article_id       = $val['article_id'];
                            $status          = Template::showItemStatus($controllerName, $id, $val['status']); ;
                            $time      = Template::showDatetimeFrontend($val['time']);
                            $listBtnAction   = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td width="25%">
                                <p><strong>Name:</strong> {!! $name !!}</p>
                                <p><strong>Email:</strong> {!! $email!!}</p>
                            </td>
                            <td>{!! $content !!}</td>
                            <td>{!! $status !!}</td>
                            <td>{!! $article_id !!}</td>
                            {{-- <td>{!! $createdHistory !!}</td> --}}
                            <td>{!! $time !!}</td>
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
           