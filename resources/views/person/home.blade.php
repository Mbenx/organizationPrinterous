@extends('layouts.master')

@section('content-header')
<section class="content-header">
    <h1>
        Dashboard
        <small>Person (PIC)</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Person</li>
    </ol>
</section>
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-4">
            <a href="/person/create">    
            <button class="btn btn-block btn-info">Tambah Data</button>
            </a>
        </div>
        <div class="col-md-2"></div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Person</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Organization</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @if (Auth::user()->role == 'AcountManager')
                                <tr>
                                    <td><a href="/person/show/{{$data->id}}">
                                            {{$data->name}}
                                    </a></td>
                                    <td>{{$data->phone}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->organization->name}}</td>
                                    <td>
                                        <a href="/person/edit/{{ $data->id }}">
                                            <button class="btn-primary">Edit</button>
                                        </a>
                                        <a href="/person/delete/{{ $data->id }}">
                                            <button class="btn-warning">Delete</button>
                                        </a>
                                    </td>
                                </tr>    
                            @else                                 --}}
                            @foreach ($data as $d)
                            <tr>
                                <td><a href="/person/show/{{$d->id}}">
                                        {{$d->name}}
                                </a></td>
                                <td>{{$d->phone}}</td>
                                <td>{{$d->email}}</td>
                                <td>{{$d->organization->name}}</td>
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
                            {{-- @endif --}}
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Organization</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>
@endsection
