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
    <tr>
        <td class="fw-bold">{{ $casProducto->nombre_cas_producto }}</td> <!-- Nombre del CasProducto -->
        <td>{{ $casProducto->concentracion ?? ' ' }}</td> <!-- Concentración del Producto -->
        <td>{{ $casProducto->cas }}</td> <!-- CAS del CasProducto -->
        <td>
            <span class="badge bg-warning fs-6">{{ $casProducto->fds }}</span> <!-- FDS del CasProducto -->
        </td>
        <td>{{ $casProducto->tipo }}</td> <!-- Tipo del CasProducto -->
        <td>
            <a href="#" class="btn btn-warning">Editar</a>
            <form action="{{ route('productos.destroy', $casProducto->id_cas_producto) }}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </td>
    </tr>
@endforeach

        </table>
    </div>

    {{-- Pagination --}}
    {{ $casProductos->links() }}
</div>
@endsection
