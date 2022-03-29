@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('All Posts') }}</div>

                    <div class="card-body">
                     @foreach($posts as $post)
                         <div id="box_posts">
                             <img src="{{asset('assets/posts/'.$post->file)}}" width="90%" height="250" alt="">
                             <div class="d-flex">
                                 <p class="font-weight-bold" style="margin-right: 10px;font-weight: bold">{{$post->title}}</p>
                             </div>
                             <p>{{$post->content}}</p>
                         </div>
                     @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
