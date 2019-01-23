@extends('layouts.master')

@section('content-header')
<section class="content-header">
    <h1>
        Dashboard
        <small>Organizations</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Organizations</li>
    </ol>
</section>
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" 
                    src="{{ asset('/storage/organizations/'.$data->logo)}}"
                        alt="User profile picture">

                    <h3 class="profile-username text-center">
                        {{$data->name}}</h3>
                    <p class="text-muted text-center">
                        {{$data->mail}}</p>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->person as $d)
                        <tr>
                            <td><a href="/person/show/{{$d->id}}">
                                    {{$d->name}}
                                </a></td>
                            <td>{{$d->phone}}</td>
                            <td>{{$d->email}}</td>
                            <td>
                                <a href="/person/edit/{{ $d->id }}">
                                    <button class="btn-primary">Edit</button>
                                </a>
                                <a href="/person/delete/{{ $d->id }}">
                                    <button class="btn-warning">Delete</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection