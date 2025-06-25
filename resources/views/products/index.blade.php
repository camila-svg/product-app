<x-app-layout>

    <!-- Incluye Bootstrap 5 y Bootstrap Icons si no lo tienes ya -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .btn-create {
            background: #2563eb;
            color: #fff;
            font-weight: 600;
            border-radius: 6px;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px rgba(37,99,235,0.08);
        }
        .btn-create:hover {
            background: #1d4ed8;
            color: #fff;
        }
        /* Ajuste ancho columnas */
        .description-column {
            width: 40%;
            max-width: 40%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .actions-column {
            width: 180px;
            min-width: 180px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h4 mb-0 d-flex align-items-center gap-1">
                        <i class="bi bi-bag"></i> @lang('Products')
                    </h1>
                    <a href="{{ route('products.create') }}" class="btn btn-create d-flex align-items-center gap-1">
                        <i class="bi bi-plus-circle"></i> @lang('Create Product')
                    </a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>@lang('Name')</th>
                                <th>@lang('Price')</th>
                                <th class="description-column">@lang('Description')</th>
                                <th>@lang('Category')</th>
                                <th class="actions-column">@lang('Actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>${{ number_format($product->price, 2) }}</td>
                                <td class="description-column" title="{{ $product->description }}">{{ $product->description }}</td>
                                <td>{{ $product->category->name ?? 'N/A' }}</td>
                                <td class="actions-column">
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning d-inline-flex align-items-center gap-1 mb-1">
                                        <i class="bi bi-pencil-square"></i> @lang('Edit')
                                    </a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('@lang('Are you sure you want to delete this product?')');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger d-inline-flex align-items-center gap-1">
                                            <i class="bi bi-trash"></i> @lang('Delete')
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
