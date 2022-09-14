@extends('layouts.main')
@section('content')
    <h1 class="text-center">Tashkilot haqida</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{route('posts.index')}}">Prev</a>
                <table class="table table-bordered">
                    <tr>
                        <td>Postname</td>
                        <td>{{$post->name}}</td>
                    </tr>
                    <tr>
                        <td>Post fullname</td>
                        <td>{{$post->fullname}}</td>
                    </tr>
                    <tr>
                        <td>Post Agw</td>
                        <td>{{$post->age}}</td>
                    </tr>
                    <tr>
                        <td>Post phone</td>
                        <td>{{$post->phone}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
