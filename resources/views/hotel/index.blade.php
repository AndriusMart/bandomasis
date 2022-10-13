@extends('layouts.app')

@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Hotels</h2>
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
                                    <h5><a href="{{$hotel->lastImageUrl()}}" target="_BLANK">Photos: [{{$hotel->getPhotos()->count()}}]</a> </h5>
                                    @endif
                                </div>
                                <div class="buttons">
                                    <a href="{{route('m_show', $hotel)}}" class="btn btn-info">Show</a>
                                    @if(Auth::user()->role >=10)
                                    <a href="{{route('m_edit', $hotel)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('m_delete', $hotel)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No hotels found</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection