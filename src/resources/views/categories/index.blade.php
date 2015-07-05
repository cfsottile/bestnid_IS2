@extends('layout.default')

@section('title', 'Indice de categorias')

@section('content')


@include('partials.detailed_notifications')

<div class="page-header">
  <h1> Indice de subastas </h1>
</div>


  <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>#Subastas</th>
        <th>Opciones<th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)

      <tr>
        <td>{{$category->name}}</td>
        <td>{{count($category->auctions)}}</td>
        <td>
          <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#editCategoryModal" data-categoryId="{{$category->id}}">
            Editar
          </button>
           <form method="GET" action="{{ route('admin.categories.delete' , ['id' => $category->id]) }}" style="display:inline">
             <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Eliminar categoria" data-message="Estás seguro? Será permanente">
               Eliminar
             </button>
           </form>
        </td>
      </tr>

      @endforeach
      <tr>
        <td>
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addCategoryModal">
            Categoria Nueva
          </button>
        </td>
      </tr>
    </tbody>
  </table>


{{-- modal para modificar categoria --}}

  <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="editCategoryLabel">Editar categoria</h4>
        </div>
        <div class="modal-body">

          <form role="form" method="POST" action="{{ route('admin.categories.update') }}">
            <div class="form-group">
              <label for="name" class="control-label">Nombre de categoria <small>(entre 2 y 50 carácteres)</small></label>
              <input type='text' name ='name' class="form-control">
            </div>
            <div class="form-group">
  						<input type="hidden" class="form-control" name="id" id="categoryid">
  					</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    jQuery(function($){
      $('#editCategoryModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var category = button.data('categoryid') // Extract info from data-* attributes

        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        $('#categoryid').val(category)

      })
    })
  </script>

{{-- modal para agregar categoria --}}

  <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Agregar una categoria</h4>
        </div>
        <div class="modal-body">

          <form role="form" method="POST" action='{{ route('admin.categories.store') }}'>
            <div class="form-group">
              <label for="name" class="control-label">Nombre de categoria <small>(entre 2 y 50 carácteres)</small></label>
              <input type='text' name ='name' class="form-control">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Agregar</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  @include('partials.delete_confirmation')



@endsection
