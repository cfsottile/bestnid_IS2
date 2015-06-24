@extends('layout.default')

@section('title', 'Edición de subasta')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">


          <form class="form-horizontal" role="form" method="POST" action="{{ route('auctions.update', $auction->id) }}" enctype="multipart/form-data">
            <fieldset>
              <legend>Alta de subasta</legend>

              <div class="form-group @if($errors->has('title')) has-error @endif">
                <label for="name" class="col-lg-2 control-label">Título</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="title" name="title" value="@if(old('title') != null){{ old('title') }}@else{{ $auction->title }}@endif">
                    @if($errors->has('title'))
                        <p class="help-block">{{$errors->first('title')}}</p>
                    @endif
                </div>
                <div class="col-lg-1">
                    <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" tabindex="-1" data-original-title="El título debe contener entre 3 y 255 carácteres">?</button>
                </div>
              </div>

              <div class="form-group @if($errors->has('description')) has-error @endif">
                <label for="description" class="col-lg-2 control-label">Descripción</label>
                <div class="col-lg-9">
                  <textarea class="form-control" rows="3" id="description" name="description">@if(old('description') != null){{ old('description') }}@else{{ $auction->description }}@endif</textarea>
                @if($errors->has('description'))
                    <p class="help-block">{{$errors->first('description')}}</p>
                @endif
                </div>
                <div class="col-lg-1">
                    <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" tabindex="-1" data-original-title="La descripción no tiene restricciones">?</button>
                </div>
              </div>

              <div class="form-group @if($errors->has('image')) has-error @endif">
                <label for="image" class="col-lg-2 control-label">
                    <input type="checkbox" id="modifyImage" name="modifyImage" onchange="setModifyImage();" @if(old('modifyImage') != null)checked={{ old('modifyImage') }}@endif>Editar imagen
                </label>
                <div class="col-lg-9">
                    <div id="imageEdit" class="@if(old('modifyImage') != true) hidden @endif">
                        <input type="file" id="image" name="image" value="{{old('image')}}">
                        @if($errors->has('image'))
                            <p class="help-block">{{$errors->first('image')}}</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-1">
                    <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" tabindex="-1" data-original-title="La imagen debe ser .jpg, .jpeg o .png, su tamaño no debe superar los 10MB, y sus dimensiones no deben ser mayores a 500x500">?</button>
                </div>
              </div>

              <div class="form-group @if($errors->has('categoryName')) has-error @endif">
                <label for="categoryName" class="col-lg-2 control-label">Categoría</label>
                <div class="col-lg-9">
                  <select class="form-control" id="categoryName" name="categoryName">
                      @foreach (App\Models\Category::all() as $c)
                        <option @if(old('categoryName') != null)
                                    @if($c->name == old('categoryName'))
                                        selected="true"
                                    @endif
                                @else
                                    @if($auction->category_id == App\Models\Category::idForName($c->name)->first()->id)
                                        selected="true"
                                    @endif
                                @endif>{{ $c->name }}</option>
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
                      @for ($i = 15 - $auction->elapsedDays(); $i <= 30 - $auction->elapsedDays(); $i++)
                          @if($i > 0)
                              <option @if(old('durationInDays') != null)
                                          @if($i == old('durationInDays'))
                                              selected="true"
                                          @endif
                                      @else
                                          @if(substr($auction->end_date, 1, 10) == substr(date_add($auction->created_at,date_interval_create_from_date_string($i."days")), 1, 10))
                                              selected="true"
                                          @endif
                                      @endif>{{ $i }}</option>
                          @endif
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
function setModifyImage () {
    $("#imageEdit").toggleClass('hidden');
}
</script>
@endsection
