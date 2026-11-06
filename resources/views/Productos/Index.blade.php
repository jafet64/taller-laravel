<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light">

    <title>Productos · {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-canvas font-sans text-ink antialiased">

    <main class="mx-auto w-full max-w-6xl px-5 pb-6 pt-10 sm:px-8 lg:px-10 lg:pt-14">


        <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
            <h1 class="text-2xl font-semibold tracking-[-0.02em] sm:text-[32px]">Productos</h1>

            <!-- <a href="#nuevo-producto"
                class="inline-flex shrink-0 items-center justify-center gap-2 rounded-full bg-forest px-5 py-3 text-sm font-medium text-white transition hover:bg-forest-deep focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-forest/40 focus-visible:ring-offset-2 focus-visible:ring-offset-canvas">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" aria-hidden="true">
                    <path d="M12 5v14M5 12h14" />
                </svg>
                Nuevo producto
            </a> -->
        </div>

        <div class="mt-6 grid gap-6 lg:grid-cols-[minmax(0,1fr)_360px] lg:items-start">
            <section class="overflow-hidden rounded-2xl border border-line bg-surface">
                <div class="flex items-center justify-between gap-4 border-b border-line px-5 py-4 sm:px-6">
                    <div>
                        <h2 class="text-base font-semibold">Catálogo</h2>
                    </div>
                </div>

                @if ($productos->isEmpty())
                <div class="px-6 py-16 text-center">
                    <p class="text-lg font-medium">Todavía no hay productos</p>
                    <p class="mx-auto mt-2 max-w-sm text-sm text-muted">
                        Usa el formulario para registrar el primer artículo del catálogo.
                    </p>
                    <a href="#nuevo-producto"
                        class="mt-5 inline-flex items-center justify-center rounded-full bg-forest px-5 py-2.5 text-sm font-medium text-white transition hover:bg-forest-deep focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-forest/40 focus-visible:ring-offset-2">
                        Agregar el primero
                    </a>
                </div>
                @else
                <div class="hidden md:block">
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
                                        <button type="button" title="Editar"
                                            class="inline-flex h-8 w-8 items-center justify-center rounded-lg text-muted transition hover:bg-forest-soft hover:text-forest focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-forest/40">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                                stroke-linejoin="round" aria-hidden="true">
                                                <path d="M4 20h4l10-10-4-4L4 16z" />
                                                <path d="m13.5 6.5 4 4" />
                                            </svg>
                                        </button>
                                        <button type="button" title="Eliminar"
                                            class="inline-flex h-8 w-8 items-center justify-center rounded-lg text-muted transition hover:bg-red-50 hover:text-red-600 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-red-300">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                                stroke-linejoin="round" aria-hidden="true">
                                                <path d="M4 7h16M9 7V5h6v2M6 7l1 13h10l1-13" />
                                                <path d="M10 11v5M14 11v5" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </section>

            <aside id="nuevo-producto" class="lg:sticky lg:top-6">
                <form action="{{ route('productos.store') }}" method="POST"
                    class="rounded-2xl border border-line bg-surface p-5 sm:p-6">
                    @csrf
                    <div class="mb-5">
                        <h2 class="text-base font-semibold">Nuevo producto</h2>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label for="nombre" class="mb-1.5 block text-sm font-medium">
                                Nombre del producto <span class="text-forest">*</span>
                            </label>
                            <input id="nombre" name="nombre" type="text" required maxlength="100"
                                autocomplete="off" placeholder='Ej. Tornillos'
                                class="w-full rounded-xl border border-line bg-surface-muted px-3.5 py-2.5 text-sm text-ink placeholder:text-muted/70 transition focus:border-forest focus:bg-surface focus:outline-none focus:ring-2 focus:ring-forest/20">
                        </div>

                        <div>
                            <label for="precio" class="mb-1.5 block text-sm font-medium">
                                Precio <span class="text-forest">*</span>
                            </label>
                            <div class="relative">
                                <span
                                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-sm text-muted">$</span>
                                <input id="precio" name="precio" type="number" required min="0"
                                    step="0.01" inputmode="decimal" placeholder="0.00"
                                    class="w-full rounded-xl border border-line bg-surface-muted py-2.5 pl-8 pr-14 text-sm text-ink tabular-nums placeholder:text-muted/70 transition focus:border-forest focus:bg-surface focus:outline-none focus:ring-2 focus:ring-forest/20">
                                <span
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3.5 text-xs font-medium text-muted">MXN</span>
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                        class="mt-5 flex w-full items-center justify-center gap-2 rounded-full bg-forest px-5 py-3 text-sm font-medium text-white transition hover:bg-forest-deep focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-forest/40 focus-visible:ring-offset-2">
                        Guardar
                    </button>
                    <p class="mt-3 text-center text-xs text-muted">
                        Los campos marcados con <span class="text-forest">*</span> son obligatorios.
                    </p>
                </form>
            </aside>
        </div>
    </main>
</body>

</html>