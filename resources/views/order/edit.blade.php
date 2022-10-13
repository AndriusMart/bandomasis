@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <div class="header-back">
                    <h2>edit order</h2>
                </div>
                </div>
                <div class="card-body">
                    <form action="{{route('o_update', $order)}}" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text">progress</span>
                            <input type="text" name="progress" class="form-control" value="{{old('progress',$order->progress)}}">
                        </div>
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-secondary mt-4">Change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection