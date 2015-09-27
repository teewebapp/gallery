@extends('admin::layouts.main')

{{ Tee\System\Asset::add(moduleAsset('admin', 'js/tableorder.js')) }}

@section('content')
    <table class="table table-hover table-result-list">
        <tbody>
            <tr>
                @if($orderable)
                    <td width="50">
                        &nbsp;
                    </td>
                @endif
                <th>{{{ attributeName($modelClass, 'description') }}}</th>
                <th>{{{ attributeName($modelClass, 'image') }}}</th>
                <th>Opções</th>
            </tr>
        
            @if($models->count() > 0)
                @foreach($models as $model)
                    <tr data-id="{{{ $model->id }}}">

                        @if($orderable)
                            <td>
                                <div style="float:left;">
                                    <a href="javascript:void(0)" class="glyphicon glyphicon-chevron-up" ></a>
                                    <a href="javascript:void(0)" class="glyphicon glyphicon-chevron-down" ></a>
                                    &nbsp;
                                </div>
                            </td>
                        @endif

                        <td>
                            {{{ $model->description }}}
                        </td>
                        <td>
                            <img src="{{{ URL::to($model->image->url()) }}}" height="100" />
                        </td>
                        <td>
                            {{ HTML::updateButton('Editar', route("{$routePrefix}.edit", ['id' => $model->id, 'gallery' => Route::current()->parameter('gallery')])) }}
                            {{ HTML::deleteButton('Remover', route("{$routePrefix}.destroy", ['id' => $model->id, 'gallery' => Route::current()->parameter('gallery')])) }}
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">
                        Nenhum resultado encontrado
                    </td>
                </tr>
            @endif
        </tbody>
    </table>

    <a class="btn btn-primary" href="{{ route("{$routePrefix}.create", ['gallery' => Route::current()->parameter('gallery')]) }}">
        <i class="fa fa-plus"></i> Adicionar Foto
    </a>

    @if($orderable)
        <script type="text/javascript">
            $(document).ready(function() {
                $('.table-result-list').tableOrder({
                    itens: 'tbody tr',
                    up: '.glyphicon-chevron-up',
                    down: '.glyphicon-chevron-down',
                    url: '{{ route("{$routePrefix}.order", ["gallery" => Route::current()->parameter("gallery")]) }}'
                });
            });
        </script>
    @endif
@stop