
                        @extends('layouts.app')

                        @section('content')
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-9">
                                    <div class="card">
                                        <div class="card-header">
                                            <h2>Category</h2>
                                            <a href="{{route('c_index')}}" class="close"><span class="sr-only">Close</span></a>
                                        </div>
                                        <div class="card-body">
                                            <div class="category">
                                                <h5>{{$country->title}}</h5>
                                                <h5>{{$country->season}}</h5>
                                            </div>
                                            {{-- <ul class="list-group">
                                                @forelse($country->hotels as $hotel)
                                                <li class="list-group-item">
                                                    <div class="movies-list">
                                                        <div class="content">
                                                            <h2><span>title: </span>{{$hotel->title}}</h2>
                                                            <h4><span>price: </span>{{$hotel->price}}</h4>
                                                        </div>
                                                    </div>
                                                </li>
                                                @empty
                                                <li class="list-group-item">No countries found</li>
                                                @endforelse
                                            </ul> --}}
                                            @if(Auth::user()->role >=10)
                                            {{-- <form action="{{route('c_delete_movies', $country)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form> --}}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endsection