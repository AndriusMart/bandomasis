@extends('layouts.app')

@section('content')
<!-- nav-side -->

    <h1 class="title mid"><span>All</span>Hotels</h1>

<div class="items bg-foto">
    <!-- list items -->
    <div class="col-9 bg-foto">
        <div class="list-items">

            <div>
                <div class="filter">
                    <div class="card filter">
                        <span class="fs-5 fw-semibold">Filter</span>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{route('home')}}" method="get">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12">
                                                    <small>Categories</small>
                                                    <select name="cat" class="form-select mt-1">
                                                        <option value="0">All</option>
                                                        @foreach($countries as $country)
                                                        <option value="{{$country->id}}" @if($cat==$country->id)
                                                            selected @endif>{{$country->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <small>Order By</small>
                                                    <select name="sort" class="form-select mt-1">
                                                        @foreach($sortSelect as $option)
                                                        <option value="{{$option[0]}}" @if($sort==$option[0]) selected
                                                            @endif>{{$option[1]}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <small>Items per page</small>
                                                    <select name="per_page" class="form-select mt-1">
                                                        <option value="11" @if('11'==$perPage) selected @endif>11
                                                        </option>
                                                        <option value="5" @if('5'==$perPage) selected @endif>5</option>
                                                        <option value="20" @if('20'==$perPage) selected @endif>20
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-8">
                                                    <button type="submit" class="input-group-text mt-1">Filter</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <span class="fs-5 fw-semibold">Search</span>
                                <div class="col-12  mt-1">
                                    <form action="{{route('home')}}" method="get">
                                        <div class="input-group mb-3">
                                            <input type="text" name="s" class="form-control" value="{{$s}}">
                                            <button type="submit" class="input-group-text">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @forelse($hotels as $hotel)
            <div class="">
                <div class="  carousel-border">
                    <div class="card">
                        <div class="card-img ">

                            @if($hotel->getPhotos()->count())
                            @forelse($hotel->getPhotos as $photo)
                                <img src="{{$photo->url}}" class="img-fluid">
                            @empty
                            <h3>No Photos</h3>
                            @endforelse
                            @else
                            <img src="<?= asset('images/nophoto.jpg') ?>" class="img-fluid" />
                            @endif
                        </div>
                        <div class="carusel-tag ">
                            <h3>{{$hotel->title}}</h3>
                            {{-- <h3>{{$item->rating ?? 'X'}} <i class="fa fa-star"></i></h3> --}}
                            <p>{{$hotel->getCountry->country}}</p>
                            <p>{{$hotel->time}} day</p>
                            <h2>{{$hotel->price}}$</h2>
                        </div>
                        <div class="buy-see overlay">
                            <form action="{{route('o_store')}}" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                <input type="hidden" value="in-progress" name="progress">
                                <input type="hidden" value="{{ $hotel->id}}" name="hotel_id">
                                @csrf
                                <button type="submit" class="btn btn-secondary mt-4">Order</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            @empty
            <h1 class="list-group-item">No items found</h1>
            @endforelse
        </div>
        <div class=" mt-3">
            {{ $hotels->links() }}
        </div>
    </div>
</div>
</body>
@endsection

