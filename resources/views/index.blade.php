@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Stock de químicos</h2>
        </div>
        <div>
            <a href="#" class="btn btn-primary">Dar de alta un químico</a>
            <a href="#" class="btn btn-primary">Ver historial de movimientos</a>
        </div>
    </div>
    @if(Session::get('success'))
    <div class="alert alert-success mt-2">
        <strong>{{ Session::get('success') }}</strong>
    </div>
    @endif

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Nombre</th>
                <th>Concentración</th>
                <th>CAS</th>
                <th>FDS</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
            @foreach($casProductos as $casProducto)
                @foreach($casProducto->productos as $producto)
                    <tr>
                        <td class="fw-bold">{{ $casProducto->nombre }}</td> <!-- Propiedad de CasProducto -->
                        <td>{{ $producto->concentracion ?? ' ' }}</td> <!-- Propiedad de Producto -->
                        <td>{{ $casProducto->cas }}</td> <!-- Propiedad de CasProducto -->
                        <td>
                            <span class="badge bg-warning fs-6">{{ $casProducto->fds }}</span> <!-- Propiedad de CasProducto -->
                        </td>
                        <td>{{ $casProducto->tipo }}</td> <!-- Propiedad de CasProducto -->
                        <td>
                            <a href="#" class="btn btn-warning">Editar</a>
                            <form action="{{ route('productos.destroy', $producto->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </table>
    </div>

        {{-- Pagination --}}
        {{ $casProductos->links() }}
    </div>
</div>
@endsection
