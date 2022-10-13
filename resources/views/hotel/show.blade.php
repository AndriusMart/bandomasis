@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="header-back">
                        <h2>Hotel</h2>
                        <a href="{{route('m_index')}}" class="close"><span class="sr-only">Close</span></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="posts-list">
                        <div class="content">
                            <div class="hotel-show">
                                <div class="line"><small>Title: </small>
                                    <h5>{{$hotel->title}}</h5>
                                </div>
                                <div class="line"><small>Price: </small>
                                    <h5>{{$hotel->price}}</h5>
                                </div>
                                <div class="line"><small>country: </small>
                                    <h5>{{$hotel->getCountry->title}}</h5>
                                </div>
                                <div class="swiper">
                                    <div class="swiper-wrapper">
                                        @forelse($hotel->getPhotos as $photo)

                                        <div class="img swiper-slide">
                                            <img src="{{$photo->url}}" alt="Hotel photo">
                                        </div>
                                        @empty
                                        <h3>No Photos</h3>
                                        @endforelse
                                    </div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection