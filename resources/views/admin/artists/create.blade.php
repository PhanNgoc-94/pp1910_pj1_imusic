@extends('admin.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Artists</h1>
    <!-- <a href="template_admin/#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    <a href="{{ route('admin.artists.create') }}" class="btn btn-primary btn-sm align-self-center">
        <i class="fa fa-plus-square" aria-hidden="true"></i> Tạo mới
    </a>
</div>
@if (session('success'))
<div class="alert alert-success" role="alert" style="text-align: center;">
    {{ session('success') }}
</div>
@endif
<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('admin.artists.create')}}" enctype="multipart/form-data">
    @csrf
    {{-- name --}}
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="name" required="required" class="form-control col-md-7 col-xs-12">
        </div>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    {{-- Avatar --}}
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Avatar</label>
        <div class="input-group col-lg-6 col-md-9 col-sm-12">
            <input class="url" type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01" name="url" id="url">
        </div>
        @if ($errors->has('url'))
            <span class="help-block">
                <strong>{{ $errors->first('url') }}</strong>
            </span>
        @endif
    </div>
    {{-- Information --}}
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="information">Information <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea name="information" required="required" class="form-control col-md-7 col-xs-12" name="information"></textarea>
        </div>
        @if ($errors->has('information'))
            <span class="help-block">
                <strong>{{ $errors->first('information') }}</strong>
            </span>
        @endif
    </div>
    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button class="btn btn-primary" type="reset">Reset</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
</form>
@endsection