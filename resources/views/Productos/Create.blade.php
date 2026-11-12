@extends('Productos.Layout')

@section('titulo', 'Nuevo producto')

@section('contenido')
    <a href="{{ route('productos.index') }}" class="text-sm text-forest underline">Volver a productos</a>
    <h1 class="mt-5 text-2xl font-semibold">Nuevo producto</h1>

    <form action="{{ route('productos.store') }}" method="POST"
        class="mt-6 space-y-5 rounded-xl border border-line bg-surface p-6">
        @csrf

        <div>
            <label for="nombre" class="mb-2 block text-sm font-medium">Nombre del producto</label>
            <input id="nombre" name="nombre" type="text" value="{{ old('nombre') }}" required maxlength="100"
                class="w-full rounded-xl border border-line bg-surface-muted px-4 py-3 text-sm focus:border-forest focus:outline-none focus:ring-2 focus:ring-forest/20">
            @error('nombre')
                <p class="mt-2 text-sm text-red-700">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="precio" class="mb-2 block text-sm font-medium">Precio (MXN)</label>
            <input id="precio" name="precio" type="number" value="{{ old('precio') }}" required min="0" step="0.01"
                class="w-full rounded-xl border border-line bg-surface-muted px-4 py-3 text-sm focus:border-forest focus:outline-none focus:ring-2 focus:ring-forest/20">
            @error('precio')
                <p class="mt-2 text-sm text-red-700">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-wrap items-center gap-4">
            <button type="submit" class="rounded-full bg-forest px-5 py-3 text-sm font-medium text-white hover:bg-forest-deep focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-forest">Guardar producto</button>
            <a href="{{ route('productos.index') }}" class="py-3 text-sm underline">Cancelar</a>
        </div>
    </form>
@endsection
