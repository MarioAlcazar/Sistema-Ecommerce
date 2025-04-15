<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">AGREGAR PRODUCTO</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">

          {{-- CATEGORÍA --}}
          <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoría</label>
            <select name="categoria_id" id="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror">
              <option value="">-- Seleccione --</option>
              @foreach($categorias as $categoria)
              <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nombre }}
              </option>
              @endforeach
            </select>
            @error('categoria_id')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          {{-- CÓDIGO --}}
          <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" id="codigo" value="{{ old('codigo') }}" required>
            @error('codigo')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          {{-- NOMBRE --}}
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
            @error('nombre')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          {{-- PRECIO --}}
          <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control @error('precio') is-invalid @enderror" name="precio" id="precio" value="{{ old('precio') }}" required>
            @error('precio')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          {{-- DESCRIPCIÓN --}}
          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion" value="{{ old('descripcion') }}">
            @error('descripcion')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          {{-- IMAGEN --}}
          <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen" id="imagen" accept="image/*">
            @error('imagen')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          {{-- ESTADO --}}
          <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror" required>
              <option value="">-- Seleccione --</option>
              <option value="activo" {{ old('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
              <option value="inactivo" {{ old('estado') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
            @error('estado')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
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
