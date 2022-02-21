@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template as Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');

    $productConfig = config('zvn.product_config');
    // echo '<pre>';
    // print_r($productConfig);
    // echo '</pre>';
    // die();
    $configSelected = [];
    if(isset($item['config']))
        $configSelected = array_keys(json_decode(@$item['type'], true));
@endphp

<div class="x_panel">
    <div class="x_title">
        <h2>Cấu hình</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="row">
            @foreach($productConfig as $key => $config)
                <div class="col-md-9 col-md-offset-1 col-sm-12">
                    <div class="form-check">
                        <label class="form-check-label" for="">
                            <input type="checkbox" class="form-check-input"   name="type" value="{!!$key!!}" @if(in_array($key, $configSelected)) checked @endif > {{$config['name']}}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
