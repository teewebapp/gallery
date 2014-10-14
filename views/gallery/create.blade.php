@extends('layouts.main')

@section('content')
    @include("{$moduleName}::{$resourceName}._form")
@stop