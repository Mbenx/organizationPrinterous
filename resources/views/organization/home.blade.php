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
        <div class="col-md-4">
            <a href="/organization/create">
                <button class="btn btn-block btn-info">Tambah Data</button>
            </a>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Organization</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (Auth::user()->role == 'AcountManager')
                                @foreach ($data as $d)
                                @if (Auth::user()->organization->id == $d->id)
                                    <tr>
                                        <td><a href="/organization/show/{{$d->id}}">
                                                {{$d->name}}
                                            </a></td>
                                        <td>{{$d->phone}}</td>
                                        <td>{{$d->email}}</td>
                                        <td>{{$d->website}}</td>
                                        <td>
                                            <a href="/organization/edit/{{ $d->id }}">
                                                <button class="btn-primary">Edit</button>
                                            </a>
                                            <a href="/organization/delete/{{ $d->id }}">
                                                <button class="btn-warning">Delete</button>
                                            </a>
                                        </td>
                                    </tr>    
                                @else
                                    <tr>
                                        <td>{{$d->name}}</td>
                                        <td>{{$d->phone}}</td>
                                        <td>{{$d->email}}</td>
                                        <td>{{$d->website}}</td>
                                        <td>
                                            <a href="/organization/edit/{{ $d->id }}">
                                                <button class="btn disabled">Edit</button>
                                            </a>
                                            <a href="/organization/delete/{{ $d->id }}">
                                                <button class="btn disabled">Delete</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endif                                
                                @endforeach
                            @else
                                @foreach ($data as $d)
                                <tr>
                                    <td><a href="/organization/show/{{$d->id}}">
                                            {{$d->name}}
                                        </a></td>
                                    <td>{{$d->phone}}</td>
                                    <td>{{$d->email}}</td>
                                    <td>{{$d->website}}</td>
                                    <td>
                                        <a href="/organization/edit/{{ $d->id }}">
                                            <button class="btn-primary">Edit</button>
                                        </a>
                                        <a href="/organization/delete/{{ $d->id }}">
                                            <button class="btn-warning">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Website</th>
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

@section('link')

@endsection

@section('script')

@endsection