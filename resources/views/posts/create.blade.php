@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create New Post') }}</div>

                    <div class="card-body">
                        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-2">
                                <input type="file" name="file" class="form-control">
                            </div>

                            <div class="form-group  mt-2">
                                <input type="text" name="title" class="form-control">
                            </div>

                            <div class="form-group  mt-2">
                                <textarea name="content" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>

                            <div class="form-group  mt-2">
                                <input type="submit" class="btn btn-success form-control" value="create">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
