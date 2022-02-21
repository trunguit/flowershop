@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template as Template;
    $image_main = json_decode(@$item['image_main'], true);
    $image_extras = [];
    if(is_array(json_decode(@$item['image_extra'], true)))
        $image_extras = json_decode($item['image_extra'], true);
        
    $index = 0;
@endphp

<div class="x_panel">
    <div class="x_title">
        <h2>Hình ảnh</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="form-group">
            <label for="description_short" class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh chính</label>
            <div class="col-md-8 col-sm-10 col-xs-12">
                <div class="d-flex algin-items-center">
                    <div class="input-group" style="width: 100%">
                        <span class="input-group-btn">
                            <a data-input="image_main" data-preview="holder_main" class="btn btn-primary lfm">
                              <i class="fa fa-picture-o"></i> Chọn ảnh
                            </a>
                          </span>      
                        <input id="image_main" class="form-control" type="hidden" name="image_main" value="{{@$image_main['src']}}">
                        <input class="form-control w-75" type="text" name="image_main_alt" placeholder="Alt cho hình ảnh" value="{{@$image_main['alt']}}">
                    </div>
                    <img id="holder_main" @if(!empty($image_main['src'])) src="{{@$image_main['src'] }}" @endif class="mb-4 img-fluid image-preview" style="max-height:60px;">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="document" class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh phụ</label>
            <div class="col-md-8 col-sm-10 col-xs-12">
                <div class="needsclick dropzone" id="document-dropzone">
                    @if(count($image_extras) > 0)
                        @foreach($image_extras as $image)
                            @php
                                $path = 'upload/1/product';
                                if(is_array(explode($path, $image['src'])))
                                    $fileName =  explode($path, $image['src'])[1];
                            @endphp
                            <div class="dz-preview dz-processing dz-image-preview dz-complete" data-file="{{$fileName}}">
                                <div class="dz-image"><img alt="{{$image['alt']}}" src="{{$image['src']}}"></div>
                                <div class="dz-details">
                                    <div class="dz-size"><span data-dz-size=""><strong>100</strong> KB</span></div>
                                    <div class="dz-filename"><span data-dz-name="">{{$fileName}}</span></div>
                                </div>
                                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress="" style="width: 100%;"></span></div>
                                <div class="dz-error-message"><span data-dz-errormessage=""></span></div>
                                <div class="dz-success-mark">
                                    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                        <title>Check</title>
                                        <defs></defs>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                            <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="dz-error-mark">
                                    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                        <title>Error</title>
                                        <defs></defs>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                            <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                                                <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </div><a class="dz-remove" data-file="{{$fileName}}" href="javascript:undefined;" data-dz-remove="{{$fileName}}">Remove file</a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        @foreach($image_extras as $i => $image)
            @php
                $path = '/upload/1/product';
                $fileName =  explode($path, $image['src'])[1];
            @endphp
            <input class="image-hidden" data-file="{{$fileName}}" type="hidden" name="document[]" value="{{$fileName}}">
            <div class="form-group image-hidden" data-file="{{$fileName}}">
                <label for="description_short" class="control-label col-md-3 col-sm-3 col-xs-12">Alt ảnh phụ {{$i+1}}</label>
                <div class="col-md-8 col-sm-10 col-xs-12">
                    <input class="image-alt form-control" placeholder="Alt cho hình ảnh phụ" type="text" name="alt[]" value="{{$image['alt']}}">
                </div>
            </div>
        @endforeach
        <div class="form-image-alt" data-number="{{count($image_extras)}}"></div>
    </div>
</div>

<script>
    var uploadedDocumentMap = {}
    Dropzone.options.documentDropzone = {
        url: '{{ route($controllerName.'/media') }}',
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function (file, response) {
            $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
            let number = $('.form-image-alt').data('number')
            $('.form-image-alt').before('<div class="form-group image-hidden" data-file="'+ response.name +'">\n' +
                '                <label for="description_short" class="control-label col-md-3 col-sm-3 col-xs-12">Alt ảnh phụ '+ (parseInt(number)+1) +'</label>\n' +
                '                <div class="col-md-8 col-sm-10 col-xs-12">\n' +
                '                    <input class="image-alt form-control" type="text" placeholder="Alt cho hình ảnh phụ" name="alt[]" value="">\n' +
                '                </div>\n' +
                '            </div>')
            $('.form-image-alt').data('number', parseInt(number)+1)
            uploadedDocumentMap[file.name] = response.name
        },
        removedfile: function (file) {
            file.previewElement.remove()
            var name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedDocumentMap[file.name]
            }
            $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            $('.form-group[data-file="'+ name +'"]').remove()
        },
        init: function () {
                    @if(isset($project) && $project->document)
            var files =
            {!! json_encode($project->document) !!}
                for (var i in files) {
                var file = files[i]
                this.options.addedfile.call(this, file)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
            }
            @endif
        }
    }
</script>