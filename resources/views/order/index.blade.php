@extends('layouts.app')

@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Orders</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($orders as $order)

                        @if(Auth::user()->role == 1 && Auth::user()->name == $order->getUsers->name)
                        <li class="list-group-item">
                            <div class="hotels-list">
                                <div class="content">
                                    <div class="content">
                                        <h2><span>User Name: </span>{{$order->getUsers->name}}</h2>
                                        <h4><span>Hotel: </span>{{$order->getHotels->title}}</h4>
                                        <h4><span>Status: </span>{{$order->progress}}</h4>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        @if(Auth::user()->role >=10)
                        <li class="list-group-item">
                            <div class="hotels-list">
                                <div class="content">
                                    <h2><span>User Name: </span>{{$order->getUsers->name}}</h2>
                                    <h4><span>Hotel: </span>{{$order->getHotels->title}}</h4>
                                    <h4><span>Status: </span>{{$order->progress}}</h4>
                                </div>
                                <div class="buttons">
                                    @if(Auth::user()->role >=10)
                                    <a href="{{route('o_edit', $order)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('o_delete', $order)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @endif
                        @empty
                        <li class="list-group-item">No countries found</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection