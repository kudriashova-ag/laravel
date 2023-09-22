<div class="form-group mt-3">
  {!! Form::label('name', 'Product Name:') !!}
  {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group mt-3">
  {!! Form::label('price', 'Product Price:') !!}
  {!! Form::text('price', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group mt-3">
  {!! Form::label('category_id', 'Product Category:') !!}
  {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
</div>

<div class="form-group mt-3">
  {!! Form::label('image', 'Product Image:') !!}
  {!! Form::file('image', ['class'=>'form-control']) !!}
</div>

<div class="form-group mt-3">
  {!! Form::label('description', 'Product Description:') !!}
  {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>






{!! Form::submit('Save product', ['class'=>'btn btn-primary mt-3']) !!}