@extends('layouts.main')

@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th>{{{ attributeName($modelClass, 'title') }}}</th>
                <th>{{{ attributeName($modelClass, 'description') }}}</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @if($models->count() > 0)
                @foreach($models as $model)
                    <tr>
                        <td>
                            {{{ $model->title }}}
                        </td>
                        <td>
                            {{{ $model->description }}}
                        </td>
                        <td>
                            {{ HTML::updateButton('Editar', route("admin.{$resourceName}.edit", $model->id)) }}
                            {{ HTML::deleteButton('Remover', route("admin.{$resourceName}.destroy", $model->id)) }}
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">
                        Nada cadastrado
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
    <a class="btn btn-primary" href="{{ route("admin.{$resourceName}.create") }}">
        Cadastrar Nova Galeria
    </a>
@stop