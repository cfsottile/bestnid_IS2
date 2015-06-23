@extends('layout.default')

@section('title', 'Alta de subasta')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">


          <form class="form-horizontal" role="form" method="POST" action="{{ route('auctions.store') }}" enctype="multipart/form-data">
            <fieldset>
              <legend>Alta de subasta</legend>
              <div class="form-group @if($errors->has('title')) has-error @endif">
                <label for="name" class="col-lg-2 control-label">Título</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
					@if($errors->has('title'))
						<p class="help-block">{{$errors->first('title')}}</p>
					@endif
                </div>
				<div class="col-lg-1">
					<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" tabindex="-1" data-original-title="El título debe contener entre 3 y 255 carácteres">?</button>
				</div>
              </div>
              {{-- <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                <div class="col-lg-10">
                  <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Checkbox
                    </label>
                  </div>
                </div>
              </div> --}}
              <div class="form-group @if($errors->has('description')) has-error @endif">
                <label for="description" class="col-lg-2 control-label">Descripción</label>
                <div class="col-lg-9">
                  <textarea class="form-control" rows="3" id="description" name="description">{{ old('description') }}</textarea>
				@if($errors->has('description'))
					<p class="help-block">{{$errors->first('description')}}</p>
				@endif
                </div>
				<div class="col-lg-1">
					<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" tabindex="-1" data-original-title="La descripción no tiene restricciones">?</button>
				</div>
              </div>
              {{-- <div class="form-group">
                <label class="col-lg-2 control-label">Radios</label>
                <div class="col-lg-10">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                      Option one is this
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                      Option two can be something else
                    </label>
                  </div>
                </div>
              </div> --}}
              <div class="form-group @if($errors->has('image')) has-error @endif">
                <label for="image" class="col-lg-2 control-label">Imagen</label>
                <div class="col-lg-9">
                    <input type="file" id="image" name="image" value="{{ old('image') }}">
					@if($errors->has('image'))
						<p class="help-block">{{$errors->first('image')}}</p>
					@endif
                </div>
				<div class="col-lg-1">
					<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" tabindex="-1" data-original-title="La imagen debe ser .jpg, .jpeg o .png, su tamaño no debe superar los 10MB, y sus dimensiones no deben ser mayores a 500x500">?</button>
				</div>
              </div>
              <div class="form-group @if($errors->has('categoryName')) has-error @endif">
                <label for="categoryName" class="col-lg-2 control-label">Categoría</label>
                <div class="col-lg-9">
                  <select class="form-control" id="categoryName" name="categoryName"  value="{{ old('categoryName') }}">
                      @foreach (App\Models\Category::all() as $c)
                        <option @if($c->name == old('categoryName')) selected="true" @endif>{{ $c->name }}</option>
                      @endforeach
                  </select>
				@if($errors->has('categoryName'))
					<p class="help-block">{{$errors->first('categoryName')}}</p>
				@endif
                </div>
              </div>
              <div class="form-group @if($errors->has('durationInDays')) has-error @endif">
                <label for="durationInDays" class="col-lg-2 control-label">Días de duración</label>
                <div class="col-lg-9">
                  <select class="form-control" id="durationInDays" name="durationInDays"  value="{{ old('durationInDays') }}">
                    @for ($i = 15; $i <= 30; $i++)
                      <option @if($i == old('durationInDays')) selected="true" @endif>{{ $i }}</option>
                    @endfor
                  </select>
				@if($errors->has('durationInDays'))
					<p class="help-block">{{$errors->first('durationInDays')}}</p>
				@endif
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <a href="{{ URL::previous() }}" class="btn btn-default">Cancelar</a>
                  <button type="submit" class="btn btn-primary">Dar de alta</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
@overwrite
