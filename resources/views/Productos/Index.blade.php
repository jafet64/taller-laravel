@extends('Productos.Layout')

@section('titulo', 'Productos')

@section('contenido')
    <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
        <h1 class="text-2xl font-semibold tracking-[-0.02em] sm:text-[32px]">Productos</h1>

        <a href="{{ route('productos.create') }}"
            class="inline-flex shrink-0 items-center justify-center gap-2 rounded-full bg-forest px-5 py-3 text-sm font-medium text-white transition hover:bg-forest-deep focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-forest/40 focus-visible:ring-offset-2 focus-visible:ring-offset-canvas">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" aria-hidden="true">
                <path d="M12 5v14M5 12h14" />
            </svg>
            Nuevo producto
        </a>
    </div>

    @if (session('success'))
    <p role="status" class="mt-6 rounded-xl bg-forest-soft px-5 py-4 text-sm text-forest">{{ session('success') }}</p>
    @endif

    <div class="mt-6">
        <section class="overflow-hidden rounded-xl border border-line bg-surface">
            <div class="flex items-center justify-between gap-4 border-b border-line px-5 py-4 sm:px-6">
                <div>
                    <h2 class="text-base font-semibold">Catálogo</h2>
                </div>
            </div>

            @if ($productos->isEmpty())
            <div class="px-6 py-16 text-center">
                <p class="text-lg font-medium">Todavía no hay productos</p>
                <p class="mx-auto mt-2 max-w-sm text-sm text-muted">
                    Registra el primer artículo del catálogo.
                </p>
            </div>
            @else
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <caption class="sr-only">Listado de productos del catálogo</caption>
                    <thead>
                        <tr class="border-b border-line text-xs text-muted">
                            <th scope="col" class="px-6 py-3 font-medium">Producto</th>
                            <th scope="col" class="px-6 py-3 text-right font-medium">Precio</th>
                            <th scope="col" class="px-6 py-3 text-right font-medium">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-line">
                        @foreach ($productos as $producto)
                        <tr class="transition-colors hover:bg-surface-muted">
                            <td class="px-6 py-4">
                                <p class="truncate font-medium">{{ $producto->nombre }}</p>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <p class="font-semibold tabular-nums">
                                    ${{ number_format($producto->precio, 2) }}</p>
                                <p class="text-xs text-muted">MXN</p>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-1">
                                    <a href="{{ route('productos.edit', $producto->id) }}" title="Editar" aria-label="Editar {{ $producto->nombre }}"
                                        class="inline-flex h-11 w-11 items-center justify-center rounded-lg text-muted transition hover:bg-forest-soft hover:text-forest focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-forest/40">
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                            stroke-linejoin="round" aria-hidden="true">
                                            <path d="M4 20h4l10-10-4-4L4 16z" />
                                            <path d="m13.5 6.5 4 4" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST"
                                        onsubmit="return confirm('¿Eliminar este producto? Esta acción no se puede deshacer.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Eliminar" aria-label="Eliminar {{ $producto->nombre }}"
                                            class="inline-flex h-11 w-11 items-center justify-center rounded-lg text-muted transition hover:bg-red-50 hover:text-red-600 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-red-300">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                                stroke-linejoin="round" aria-hidden="true">
                                                <path d="M4 7h16M9 7V5h6v2M6 7l1 13h10l1-13" />
                                                <path d="M10 11v5M14 11v5" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </section>

    </div>
@endsection