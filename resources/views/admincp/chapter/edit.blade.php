@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cập nhật chương truyện</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{route('chapter.update',[$chapter->id])}}" enctype='multipart/form-data'>
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="tieude">Tiêu đề</label>
                                <input type="text" class="form-control" value="{{$chapter->tieude}}" onkeyup="ConvertNameToSlug();" name="tieude"
                                       id="tendanhmuc" placeholder="Tiêu đề">
                            </div>
                            <div class="form-group">
                                <label for="slug_chapter">Slug</label>
                                <input type="text" class="form-control" value="{{$chapter->slug_chapter}}" name="slug_chapter"
                                       id="slug_danhmuc" placeholder="Slug">
                            </div>
                            <div class="form-group">
                                <label for="noidung">Nội dung chương</label>
                                <textarea class="form-control" name="noidung" id="noidung" rows="5">{{$chapter->noidung}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="tomtat">Tóm tắt truyện</label>
                                <textarea class="form-control" name="tomtat" id="tomtat" rows="5">{{$chapter->tomtat}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="truyen_id">Thuộc truyện</label>
                                <select name="truyen_id" id="truyen_id" class="custom-select" required>
                                    <option value="" selected>Lựa chọn...</option>
                                    @foreach($dstruyen as $key => $truyen)
                                        <option {{$truyen->id == $chapter->truyen_id ?  'selected' : ''}} value="{{$truyen->id}}">{{$truyen->tentruyen}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kichhoat">Kích hoạt</label>
                                <select name="kichhoat" class="custom-select">
                                    @if($chapter->kichhoat==0)
                                        <option selected value="0">Kích hoạt</option>
                                        <option value="1">Không kích hoạt</option>
                                    @else
                                        <option value="0">Kích hoạt</option>
                                        <option selected value="1">Không kích hoạt</option>
                                    @endif
                                </select>
                            </div>
                            <button type="submit" name="themchapter" class="btn btn-primary">Cập nhật chương truyện</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
