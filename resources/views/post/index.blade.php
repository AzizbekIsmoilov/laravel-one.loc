@extends('layouts.main')
@section('content')
    <table border="1" width="center">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Fullname</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data_post as $data_item)
            <tr>
                <td>{{$data_item['id']}}</td>
                <td>{{$data_item['name']}}</td>
                <td>{{$data_item['fullname']}}</td>
                <td>{{$data_item['phone']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
