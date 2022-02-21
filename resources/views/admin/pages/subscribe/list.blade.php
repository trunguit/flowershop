@php
    use App\Helpers\Template;
    use App\Helpers\HightLight;

@endphp

<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">Email</th>
                   
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Ngày đăng ký</th>
                    <th class="column-title">IP Address</th>
                </tr>
            </thead>
            <tbody>
                @if(count($items) > 0)
                    @foreach($items as $key => $val)
                        @php
                            $index          = $key + 1;
                          
                            $email          = HightLight::show($val['email'], $params['search'], 'email');  
                            $status         = Template::showItemStatus($controllerName, $val['id'], $val['status']);
                            $time           = $val['date'];
                            $ipAddress      = $val['ip_address'];
                        @endphp
                        <tr>
                            <td>{{ $index }}</td>
                            <td>{{ $email }}</td>
                         
                            <td class="status-{{$val['id']}}">{!! $status !!}</td>
                            <td>{{ $time }}</td>
                            <td>{{ $ipAddress }}</td>
                        </tr>
                    @endforeach
                    
                @else
                    @include('admin.templates.list_empty', ['colspan' => 6])
                @endif
            </tbody>
        </table>
    </div>
</div>
