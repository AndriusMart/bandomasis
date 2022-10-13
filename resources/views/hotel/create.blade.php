@extends('layouts.app')

@section('content')
<div  class="container">
    <div class="row justify-content-center">
        <div class="col-7">
            <div class="card">
                <div class="card-header">
                    <h2>New Hotel</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('m_store')}}" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Titile</span>
                            <input type="text" name="title" class="form-control" value="{{old('title')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Price</span>
                            <input type="text" name="price" class="form-control" value="{{old('price')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Time</span>
                            <input type="text" name="time" class="form-control" value="{{old('time')}}">
                        </div>
                        <select name="country_id" class="form-select mt-3">
                            <option value="0">Choose country</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}" @if($country->id == old('country_id')) selected
                                @endif>{{$country->title}}</option>
                            @endforeach
                        </select>
                        <div class="input-group mt-3">
                            <span class="input-group-text">Hotel photo</span>
                            <input type="file" name="photo[]" multiple class="form-control">
                        </div>
                        
                        @csrf
                        <button type="submit" class="btn btn-secondary mt-4">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection