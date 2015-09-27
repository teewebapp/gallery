{{ Widget::errorList($errors) }}

{{ Form::resource($model, ['admin.gallery.gallery_item', 'gallery' => Route::current()->parameter('gallery')], ['files'=>'true']) }}

    <div class="form-group">
        {{ Form::labelModel($model, 'description') }}
        {{ Form::text('description', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::labelModel($model, 'image') }}
        {{ Form::file('image', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit($model->exists ? 'Editar' : 'Cadastrar', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}