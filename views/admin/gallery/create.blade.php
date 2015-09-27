@extends('admin::layouts.main')

@section('content')
    @include("{$moduleName}::admin.{$resourceName}._form")
@stop