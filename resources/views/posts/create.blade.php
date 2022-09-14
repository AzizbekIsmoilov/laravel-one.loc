@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($errors->any())
                    <div @class('alert alert-danger')>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST"  action="{{ route('posts.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" value="{{@old('name')}}"
                                  name="name" placeholder="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fullname">Full name</label>
                            <input type="text" class="form-control" name="fullname" value="{{@old('fullname')}}"
                                   id="fullname" placeholder="Full name">
                        </div>
                    </div>
                   <div class="form-row">
                       <div class="form-group col-md-6">
                           <label for="age">Age</label>
                           <input type="text" class="form-control" id="age" value="{{@old('age')}}"
                                 name="age" placeholder="">
                       </div>
                       <div class="form-group col-md-6">
                           <label for="phone">Phone</label>
                           <input type="text" class="form-control" id="phone" value="{{@old('phone')}}"
                            name="phone"      placeholder="">
                       </div>
                   </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="reg_date">Reg Date</label>
                            <input type="date" class="form-control" value="{{@old('reg_date')}}"
                                   name="reg_date" id="reg_date">
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Saqlash</button>
                </form>
            </div>
        </div>
    </div>
@endsection
