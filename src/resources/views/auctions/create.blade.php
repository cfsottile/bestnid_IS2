@extends('layout.default')

@section('title', 'Alta de subasta')

@section('content')

    <form class="form-horizontal method="POST" action="{{ route('auctions.store') }}"
    {{-- enctype="multipart/form-data" --}}
    >
      <fieldset>
        <legend>Alta de subasta</legend>
        <div class="form-group">
          <label for="name" class="col-lg-2 control-label">Nombre</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="name">
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
        <div class="form-group">
          <label for="description" class="col-lg-2 control-label">Descripción</label>
          <div class="col-lg-10">
            <textarea class="form-control" rows="3" id="description"></textarea>
            {{-- <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span> --}}
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
        <div class="form-group">
          <label for="picture" class="col-lg-2 control-label">Imagen</label>
          <div class="col-lg-10">
              <input type="file" id="picture">
              {{-- <p class="help-block">Example block-level help text here.</p> --}}
          </div>
        </div>
        <div class="form-group">
          <label for="categoryName" class="col-lg-2 control-label">Categoría</label>
          <div class="col-lg-10">
            <select class="form-control" id="categoryName">
                @foreach (App\Models\Category::all() as $c)
                  <option>{{ $c->name }}</option>
                @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="durationInDays" class="col-lg-2 control-label">Días de duración</label>
          <div class="col-lg-10">
            <select class="form-control" id="durationInDays">
              @for ($i = 15; $i <= 30; $i++)
                <option>{{ $i }}</option>
              @endfor
            </select>
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

@overwrite
