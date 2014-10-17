{{ Widget::errorList($errors) }}

{{ Form::resource($model, 'admin.gallery') }}
    <div class="form-group">
        {{ Form::labelModel($model, 'title') }}
        {{ Form::text('title', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::labelModel($model, 'image') }}
        {{ Form::file('image', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::labelModel($model, 'keywords') }}
        {{ Form::text('keywords', null, array('class' => 'form-control', 'rows' => 2)) }}
    </div>

    <div class="form-group">
        {{ Form::labelModel($model, 'description') }}
        {{ Form::textArea('description', null, array('class' => 'form-control', 'rows' => 2)) }}
    </div>

    {{ Form::submit($model->exists ? 'Editar' : 'Cadastrar', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}