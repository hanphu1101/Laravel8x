@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Hiển thị chương truyện</div>
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
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Tóm tắt</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Thuộc truyện</th>
                                <th scope="col">Kích hoạt</th>
                                <th scope="col">Chức năng</th>
                                <th scope="col">Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dschapter as $key => $chapter)
                                <?php
                                ?>
                                <tr>
                                    <th scope="row">{{$key}}</th>
                                    <td>{{$chapter->tieude}}</td>
                                    <td>{{$chapter->slug_chapter}}</td>
                                    <td>{{$chapter->tomtat}}</td>
                                    <td>{{$chapter->noidung}}</td>
                                    {{--Hiển thị danh sách truyện--}}
                                    <td>{{$chapter->danhsachtruyen->tentruyen}}</td>
                                    <td>@if($chapter->kichhoat==0)
                                            <span class="text text-success">Kích hoạt</span>
                                        @else
                                            <span class="text text-danger">Không Kích hoạt</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('chapter.edit',[$chapter->id])}}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{route('chapter.destroy',[$chapter->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('Bạn chắc chắn muốn xóa chương này ư?');" class="btn btn-danger">
                                                DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
