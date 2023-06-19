@extends('layout')
@section('content')
    <div class="post-main">
        <div class="container">
            <div class="body-post">
                <div class="col-9">
                    <div class="nav-tab">
                        @foreach($searches as $key => $post_item)
                            @include('pages.common.post_item_1')
                        @endforeach
                    </div>
                    <div class="pagination">

                    </div>
                </div>
                <div class="col-3">
                    <div class="search-post">
                        <form class="form-search" method="post" action="{{URL::to('search-post')}}">
                            <label>
                                <input class="form-control" name="keyword_submit" type="text" placeholder="Search..">
                            </label>
                            <button type="submit" name="search" class="btn btn-sm"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="banner">
                        <a href=""><img src="{{'WebPage/img/poster/poster1.jpg'}}" alt=""></a>
                    </div>
                    <div class="tag-post">
                        @foreach($tags as $key => $tag_item)
                            @include('pages.common.tag_item')
                        @endforeach
                    </div>
                    <div class="banner">
                        <a href=""><img src="{{'WebPage/img/poster/poster2.png'}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
