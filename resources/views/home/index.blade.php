@extends('layouts.app')

@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-12 p-0 mb-2">
            <div class="card">
                <div class="card-header">
                    <h2>Hotel</h2>
                    <div class="container">
                        <div class="row">
                            <div class="col-7">
                                <form action="{{route('home')}}" method="get">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-5">
                                                <select name="cat" class="form-select mt-1">
                                                    <option value="0">All</option>
                                                    @foreach($countries as $country)
                                                    <option value="{{$country->id}}" @if($cat==$country->id) selected @endif>{{$country->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-5">
                                                <select name="sort" class="form-select mt-1">
                                                    <option value="0">All</option>
                                                    @foreach($sortSelect as $option)
                                                    <option value="{{$option[0]}}" @if($sort==$option[0]) selected @endif>{{$option[1]}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="input-group-text mt-1">Filter</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="container mt-2">
                        <div class="row">
                            <div class="col-7">
                                <form action="{{route('home')}}" method="get">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="s" class="form-control" value="{{$s}}">
                                                    <button type="submit" class="input-group-text">Search</button>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <a href="{{route('home')}}" class="btn btn-secondary">Reset</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @forelse($hotels as $hotel)
                <li class="list-group-item">
                    <div class="hotels-list">
                        <div class="content">
                            <h2><span>Title: </span>{{$hotel->title}}</h2>
                            <h4><span>Price: </span>{{$hotel->price}}</h4>
                            <h4><span>Time: </span>{{$hotel->time}}</h4>
                            <h5>
                                <span>Country: </span>
                                <a href="{{route('c_show', $hotel->getCountry->id)}}">
                                    {{$hotel->getCountry->title}}
                                </a>
                            </h5>
                            @if($hotel->getPhotos()->count())
                            <h5><a href="{{$hotel->lastImageUrl()}}" target="_BLANK">Photos: {{$hotel->getPhotos()->count()}}</a></h5>
                            @endif
                            
                        </div>
                        <div class="buttons">
                            <form action="{{route('o_store')}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                            <input type="hidden" value="in-progress" name="progress">
                            <input type="hidden" value="{{ $hotel->id}}" name="hotel_id">
                            @csrf
                            <button type="submit" class="btn btn-secondary mt-4">Order</button>
                       </form>
                     </div>
                    </div>
                </li>
                @empty
                <li class="list-group-item">No hotels found</li>
                @endforelse
            </ul>
        </div>
        <div class="me-3 mx-3">
            {{ $hotels->links() }}
        </div>
    </div>
</div>
</div>
</div>
@endsection