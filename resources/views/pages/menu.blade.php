<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{asset('')}}">COMIC BOOKS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Danh mục
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <div class="container">
                        <div class="row" style="width: 340px">
                            @foreach($dsdanhmuc as $key => $danhmuc)
                                <div class="col-md-6 col-6">
                                        <a class="text-dark" href="{{url('danhmuc/'.$danhmuc->slug_danhmuc)}}"><i class="fas fa-bookmark"></i> {{$danhmuc->tendanhmuc}}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </li>
            {{--            --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Admin
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('admin')}}">Admin</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('admin').'/danhmuc'}}">Admin</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
