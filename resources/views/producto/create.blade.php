
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">AGREGAR PRODUCTO</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('productos.store') }}" method="post">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label for="" class="form-label">Categoria</label>
              <select name= "categoria_id" id="" class="form-control"> 
                @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="codigo" class="form-label">Codigo</label>
              <input type="text" class="form-control" name="codigo" id="codigo" required>
            </div>
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre" required>
            </div>
            <div class="mb-3">
              <label for="precio" class="form-label">Precio</label>
              <input type="number" class="form-control" name="precio" id="precio" required>
            </div>
            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción</label>
              <input type="text" class="form-control" name="descripcion" id="descripcion">
            </div>
            <div class="mb-3">
              <label for="imagen" class="form-label">Imagen</label>
              <input type="text" class="form-control" name="imagen" id="imagen">
            </div>
            <div class="mb-3">
              <label for="estado" class="form-label">Estado</label>
              <input type="text" class="form-control" name="estado" id="estado" required>
            </div>     
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  