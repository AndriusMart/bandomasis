@extends('layouts.app')
@section('content')

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="header-back">
                            <h2>Hotel</h2>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="content">
                            <div class="show-l">
                                <div class="show-info">

                                    <div class="line"><span>title: </span>
                                        <h5>{{$hotel->title}}</h5>
                                    </div>
                                    <div class="line"><span>price: </span>
                                        <h5>{{$hotel->price}}</h5>
                                    </div>
                                    <div class="line"><small>country: </small>
                                        <h5>{{$hotel->getCountry->title}}</h5>
                                    </div>
                                </div>
                                <div>
                                    @if($hotel->getPhotos()->count())
                                    @forelse($hotel->getPhotos as $photo)
                                    <img src="{{$photo->url}}" class="show-img">
                                    @empty
                                    <h3>No Photos</h3>
                                    @endforelse
                                    @else
                                    <img src="<?= asset('images/nophoto.jpg') ?>" class="show-img" />
                                    @endif
                                </div>
                            </div>
                            <form action="{{route('o_store')}}" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                <input type="hidden" value="in-progress" name="progress">
                                <input type="hidden" value="{{ $hotel->id}}" name="hotel_id">
                                @csrf
                                <button type="submit" class="order">Order</button>
                            </form>
                            
                            {{-- <h2 class="title">About!</h2>
                                    <div class="line">
                                        <p>{{$items->about}}</p>
                                    </div>
                        </div> --}}
                        {{-- @php
                        $votes = json_decode($items->votes ?? json_encode([]));
                        @endphp
                        @if(in_array(Auth::user()->id, $votes))
                        <div>You already rated this item</div>

                        @else
                        <form action="{{route('rate', $items)}}" method="post">
                            <select name="rate">
                                @foreach(range(1, 10) as $value)
                                <option value="{{$value}}">{{$value}}</option>
                                @endforeach
                            </select>
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-info">Rate</button>
                        </form>
                        @endif --}}


                    </div>
                </div>
            </div>
        </div>
        
    </div>
</body>
@endsection
