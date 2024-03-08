@extends('adminlte::page')

@section('title', __('appmenus.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('appmenus.header') }}</h1>
@stop

@section('content')

    <style>
      .progress { position:relative; width:100%; border: 1px solid #7F98B2; padding: 1px; border-radius: 3px; }
      .bar { background-color: #B4F5B4; width:0%; height:25px; border-radius: 3px; }
      .percent { position:absolute; display:inline-block; top:3px; left:48%; color: #7F98B2;}
    </style>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>{{ __('tables.edit') }}</h1>
            </div>
            @include('layouts.back')
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form name="vform" action="{{ route('appmenus.store2', ['appmenu' => $appmenu, 'project' => $project, 'position' => $position]) }}" method="POST" enctype="multipart/form-data">
        <div class="form-group"><input type="number" id="id" name="id" value="{{ $appmenu->id }}" hidden></div>
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" id="proj_id" name="proj_id" value="$project->id" >
                    <strong>{{ __('appmenus.project') }} : {{ $project->name }}</strong>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" id="position" name="position" value="$position">
                    <strong>{{ __('appmenus.position') }} : {{ $position }}</strong>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('appmenus.package_from') }} :</strong>
                    <input type="radio" name="from" value="1" {{ ($appmenu->id == 0) ? "checked" : null }} >{{ __('appmenus.internal_package') }}
                    <input type="radio" name="from" value="0" {{ ($appmenu->id > 0) ? "checked" : null }} >{{ __('appmenus.external_package') }}
                </div>
            </div>
            <script>
                var rad=document.vform.from;
                for (var i=0; i<rad.length; i++) {
                     rad[i].addEventListener('change', function() {
                         if (this.value == 1) {
                             document.getElementById('div-upload').style.display='';
                             document.getElementById('div-progress').style.display='';
                             document.getElementById('div-external0').style.display='none';
                             document.getElementById('div-external1').style.display='none';
                             document.getElementById('div-external2').style.display='none';
                             document.getElementById('div-external3').style.display='none';
                         } else {
                             document.getElementById('div-upload').style.display='none';
                             document.getElementById('div-progress').style.display='none';
                             document.getElementById('div-external0').style.display='';
                             document.getElementById('div-external1').style.display='';
                             document.getElementById('div-external2').style.display='';
                             document.getElementById('div-external3').style.display='';
                         }
                     });
                }
            </script>
            <div class="col-xs-12 col-sm-12 col-md-12" id="div-upload">
                <div class="form-group">
                    <strong>{{ __('appmenus.upload_apk') }} :</strong>
                    <input type="file" name="app_file" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" id="div-progress">
                <div class="progress">
                    <div class="bar"></div>
                    <div class="percent">0%</div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" id="div-external0" >
                <div class="form-group">
                    <strong>{{ __('appmenus.label') }} :</strong>
                    <input type="text" name="label" value="{{ $appmenu->label }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" id="div-external1" >
                <div class="form-group">
                    <strong>{{ __('appmenus.name') }} :</strong>
                    <input type="text" name="name" value="{{ $appmenu->name }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" id="div-external2" >
                <div class="form-group">
                    <div id="div-url-name"><strong>{{ __('appmenus.thumbnail') }} : </strong></div>
                    <div id="div-image">
                        <input type="file" id="image" name="image" accept="image/*" onchange="loadImage(event)" >
                    </div>
                    <div id="div-preview">
                        <img name="preview" id="preview" src="{{ $appmenu->thumbnail }}" width="160" height="160">
                    </div>
                </div>
                <script>
                    var loadImage = function(event) {
                        var output = document.getElementById('preview');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                           URL.revokeObjectURL(output.src) // free memory
                        }
                    };
                </script>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" id="div-external3" >
                <div class="form-group">
                    <strong>{{ __('appmenus.url') }} :</strong>
                    <input type="text" name="url" value="{{ $appmenu->url }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('appmenus.status') }} :</strong>
                    <input type="radio" name="status" value="1" {{ ($appmenu->status==1) ? "checked":null }} >{{ __('tables.status_on') }}
                    <input type="radio" name="status" value="0" {{ ($appmenu->status!=1) ? "checked":null }} >{{ __('tables.status_off') }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">{{ __('tables.submit') }}</button>
            </div>
        </div>
    </form>
@endsection

@section('adminlte_js')
           <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script> 
           <script type="text/javascript">
                     $(document).ready(function() {
                          var bar = $('.bar');
                          var percent = $('.percent');
                          var id = document.getElementById('id').value;
                          var proj_id = document.getElementById('proj_id').value;
                          var position = document.getElementById('position').value;
                          onLoad(id);
                          $("form[name='vform]").ajaxForm({
                                beforeSend: function() {
                                    var percentVal = '0%';
                                    bar.width(percentVal)
                                    percent.html(percentVal);
                                },
                                uploadProgress: function(event, position, total, percentComplete) {
                                    var percentVal = percentComplete + '%';
                                    bar.width(percentVal)
                                    percent.html(percentVal);
                                },
                                complete: function(xhr) {
                                    alert('File Has Been Uploaded Successfully');
                                    console.log("uploaded");
                                    window.location.href="/frontend_views/" + proj_id + "/edit";
                                }
                          });
                     });
                     function onLoad(id) {
                        if (id == 0) {
                            document.getElementById('div-upload').style.display='';
                            document.getElementById('div-progress').style.display='';
                            document.getElementById('div-external0').style.display='none';
                            document.getElementById('div-external1').style.display='none';
                            document.getElementById('div-external2').style.display='none';
                            document.getElementById('div-external3').style.display='none';
                        } else {
                            document.getElementById('div-upload').style.display='none';
                            document.getElementById('div-progress').style.display='none';
                            document.getElementById('div-external0').style.display='';
                            document.getElementById('div-external1').style.display='';
                            document.getElementById('div-external2').style.display='';
                            document.getElementById('div-external3').style.display='';
                        }
                     }
            </script>
@endsection

