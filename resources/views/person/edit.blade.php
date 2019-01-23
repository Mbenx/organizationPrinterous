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
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Organization</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="/person/update" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" class="form-control" name="id" value="{{$data->id}}" />
                            <input type="hidden" name="_method" value="PUT" />
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="name" value="{{$data->name}}" placeholder="Nama Organization">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{$data->phone}}" placeholder="08xxxxxxxxxx">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="{{$data->email}}" placeholder="example@mail.com">
                        </div>
                        <div class="form-group">
                            <label>Organization</label>
                            <select class="form-control" name="organization_id">
                                <option value="{{$data->organization_id}}">{{$data->organization->name}}</option>
                                @foreach ($org as $d)
                                @if ($d->id != $data->organization_id)
                                <option value="{{$d->id}}">{{$d->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Upload Avatar</label>
                            <input type="file" name="avatar">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->

        </div>
    </div>
</section>
@endsection