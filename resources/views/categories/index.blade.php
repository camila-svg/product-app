<x-app-layout>

    <!-- Bootstrap 5 y Bootstrap Icons (si no están ya en el layout principal) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        .btn-create {
            background: #2563eb;
            color: #fff;
            font-weight: 600;
            border-radius: 0.5rem;
            transition: background 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.15);
        }
        .btn-create:hover {
            background: #1d4ed8;
            color: #fff;
            box-shadow: 0 6px 18px rgba(29, 78, 216, 0.4);
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f5f9;
            cursor: pointer;
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
            width: 160px;
            min-width: 160px;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h4 mb-0 d-flex align-items-center gap-2 text-indigo-600">
                        <i class="bi bi-tags"></i> @lang('Categories')
                    </h1>
                    <a href="{{ route('categories.create') }}" class="btn btn-create d-flex align-items-center gap-2">
                        <i class="bi bi-plus-circle"></i> @lang('Create Category')
                    </a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <div>{{ session('success') }}</div>
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="@lang('Close')"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 30%;">@lang('Name')</th>
                                <th class="description-column">@lang('Description')</th>
                                <th class="actions-column">@lang('Actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td class="description-column" title="{{ $category->description }}">{{ $category->description }}</td>
                                    <td class="actions-column">
                                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning d-inline-flex align-items-center gap-1 mb-1">
                                            <i class="bi bi-pencil-square"></i> @lang('Edit')
                                        </a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger d-inline-flex align-items-center gap-1">
                                                <i class="bi bi-trash"></i> @lang('Delete')
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted fst-italic">@lang('Empty')</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- Confirmación de eliminación con ventana nativa -->
    <script>
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                if (!confirm('@lang("Confirm Delete")')) {
                    e.preventDefault();
                }
            });
        });
    </script>

</x-app-layout>
