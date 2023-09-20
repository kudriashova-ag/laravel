<div class="form-group">
  {!! Form::label('name', 'Category Name:') !!}
  {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group mt-3">
  {!! Form::label('description', 'Category Description:') !!}
  {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>

{!! Form::submit('Save category', ['class'=>'btn btn-primary mt-3']) !!}