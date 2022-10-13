@extends('layouts.app')

@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Countries</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($countries as $country)
                        <li class="list-group-item">
                            <div class="categories-list">
                                <div class="content">
                                    <h2>{{$country->title}}</h2>

                                </div>
                                <div class="buttons">
                                    <a href="{{route('c_show', $country)}}" class="btn btn-info">Show</a>
                                    @if(Auth::user()->role >=10)
                                        <a href="{{route('c_edit', $country)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('c_delete', $country)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    @endif
                                    
                                </div>
                            </div>
                        </li>
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