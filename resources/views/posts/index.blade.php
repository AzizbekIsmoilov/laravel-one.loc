@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{route('posts.create')}}">
                <button class="btn btn-success" type="button">Create</button>
            </a>
        </div>
        <table @class('table table-bordered') id="myTable">
            <thead>
            <tr>
                <td colspan="3"></td>
                <td colspan="">
                    <input type="text" placeholder="search"
                           id="myInput" onkeyup="myFunction()"
                    @class('form-control d-inline')>
                </td>
            </tr>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Fullname</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($posts as $post)
                <tr>
                    <td>{{(($posts->currentPage()-1)*$posts->perpage() + ($loop->index+1))}}</td>
                    <td>  {{$post->name }} </td>
                    <td>{{$post->fullname }}</td>
                    <td>{{$post->phone }}</td>
                    <td class="no-print" style="width:100px;">
                        <a class="update-dialog btn btn-xs btn-success mr1"
                             href="{{route('posts.update',['post' => $post->id])}}"
                             title="Yangilash" data-form-id="{{$post->id}}"><span
                                class="glyphicon glyphicon-pencil"></span></a>
                        <a class="btn btn-xs btn-default view-dialog mr1"
                            href="{{route('posts.show',['post' => $post->id])}}" title="Ko'rish"
                            data-form-id="{{$post->id}}"><span class="glyphicon glyphicon-eye-open"></span></a>
                        <a class="btn btn-xs btn-danger delete-dialog"
                            href="{{route('posts.destroy',['post'=>$post->id])}}" title="O'chirish"
                            data-form-id="{{$post->id}}">
                            <span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5"> Hech narsa topilmadi</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{$posts->links()}}
    </div>

    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

@endsection
