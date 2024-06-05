@extends('back.layouts.master')
@section('title', 'Slider')

@section('head')
    <style>
        .moveContent {
        }
        .moveContent li {
            border: 1px solid #ddd;
            background: #717384;
            color: #fff;
            padding: 5px 12px;
            margin: 7px 0;
            border-radius: 3px;
            transition: .1s;
        }
        .moveContent li img {
            height: 80px;
        }
        .moveContent li:hover {
            cursor: pointer
        }
        .editImageBox {
            position: relative;
        }
        .editImageBox .delete {
            position: absolute;
            top: 5px;
            right: 7px;
            font-size: 27px;
            color: #E02D1B;
            z-index: 99;
        }
        .editImageBox .edit {
            position: absolute;
            top: 50px;
            right: 7px;
            font-size: 27px;
            color: #258391;
            z-index: 99;
        }
        .editImageBox .delete:hover, .editImageBox .edit:hover {
            cursor: pointer;
            color: #161711;
        }
    </style>
@endsection

@section('master')
<div class="row">
    <div class="col-md-8">
        <form action="{{route('back.sliders.store')}}" method="POST" enctype="multipart/form-data" id="productForm">
            @csrf

            <div class="card border-light mt-3 shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><b>Image Title(For SEO)*</b></label>
                                <input type="text" class="form-control form-control-sm" name="text_1" value="{{old('text_1')}}" required>
                            </div>
                        </div>
                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Text 2</b></label>
                                <input type="text" class="form-control form-control-sm" name="text_2" value="{{old('text_2')}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Text 3</b></label>
                                <input type="text" class="form-control form-control-sm" name="text_3" value="{{old('text_3')}}">
                            </div>
                        </div>

                        <hr>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Button 1 text</b></label>
                                <input type="text" class="form-control form-control-sm" name="button_1_text" value="{{old('button_1_text')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Button 1 URL</b></label>
                                <input type="text" class="form-control form-control-sm" name="button_1_url" value="{{old('button_1_url')}}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label><b>Description</b></label>

                                <textarea id="editor" class="form-control" name="description" cols="30" rows="3">{{old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><b>Text Align*</b></label>
                                <select class="form-control" name="text_align">
                                    <option value="1">Left Align</option>
                                    <option value="2">Right Align</option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-md-4">
                            @include('back.layouts.image-upload', [
                                'required' => true
                            ])
                            <p>Size: 1110*280px</p>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-success">Create</button>
                    <br>
                    <small><b>NB: *</b> marked are required field.</small>
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-4">
        <div class="card border-light mt-3 shadow">
            <div class="card-body">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($sliders as $i => $slider)
                            <div class="carousel-item {{($i == 0) ? 'active' : ''}}">
                                <img style="max-height:450px;object-fit: cover;" src="{{$slider->img_paths['original']}}" class="d-block w-100" >
                            </div>
                        @endforeach
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <form action="{{ route('back.sliders.position') }}" method="post">
            @csrf

            <div class="card border-light mt-3 shadow">
                <div class="card-body">
                    <ul class="moveContent npnls">
                        @foreach($sliders as $slider)
                            <li class="{{$slider->id}}">
                                <i class="fa fa-arrows-alt"></i>
                                <img src="{{$slider->img_paths['medium']}}" >
                                <input type="hidden" name="position[]" value="{{$slider->id}}">

                                <div class="float-right">
                                    <a class="btn btn-success btn-sm" href="{{route('back.sliders.edit', $slider->id)}}" style="color:#fff"><i class="fa fa-edit"></i></a>

                                    {{-- <form class="d-inline-block" action="{{route('back.sliders.destroy', $slider->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf

                                    </form> --}}
                                    <a href="{{route('back.sliders.delete', $slider->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to remove?')"><i class="fas fa-trash"></i></a>
                                </div>

                                {{-- <a href="{{route('back.sliders.store', $slider->id)}}" onclick="return confirm('Are you sure to remove?')" style="color:red"><i class="fa fa-trash"></i></a> --}}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="card-footer">
                    <button class="btn btn-success">Update position</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('footer')
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

    <script src="{{asset('back/js/jquery-sortable.js')}}"></script>
    <script>
        $(function () {
            $(".moveContent").sortable();
        });

        // CKEditor
        $(function () {
            CKEDITOR.replace('editor', {
                height: 400,
                filebrowserUploadUrl: "{{route('imageUpload')}}?"
            });
        });
    </script>
@endsection
