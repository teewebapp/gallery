@extends('admin::layouts.main')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{{ attributeName($modelClass, 'title') }}}</th>
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
                            <a href="{{ route('admin.gallery.gallery_item.index', ['gallery'=>$model->id]) }}" class="btn btn-primary btn-xs">
                                <i class="fa fa-picture-o"></i> Fotos
                            </a>
                            {{ HTML::updateButton('Editar', route("{$routePrefix}.edit", $model->id)) }}
                            @if(!$model->special)
                                {{ HTML::deleteButton('Remover', route("{$routePrefix}.destroy", $model->id)) }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="2">
                        Nada cadastrado
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
    <a class="btn btn-primary" href="{{ route("{$routePrefix}.create") }}">
        Cadastrar Nova Galeria
    </a>
@stop