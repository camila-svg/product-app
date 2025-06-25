<x-app-layout>

    <!-- Incluye Bootstrap y Bootstrap Icons si no están ya en tu layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                <h1 class="h4 mb-4 d-flex align-items-center gap-1">
                    <i class="bi bi-plus-circle"></i> @lang('Create Product')
                </h1>

                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">@lang('Name')</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="@lang('Enter product name')">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">@lang('Price')</label>
                        <input type="number" step="0.01" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" placeholder="@lang('Enter price')">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">@lang('Description')</label>
                        <textarea name="description" id="description" class="form-control" placeholder="@lang('Enter description')">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">@lang('Category')</label>
                        <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
                            <option value="">@lang('Select Category')</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> @lang('Back')
                        </a>
                        <button type="submit" class="btn btn-primary d-flex align-items-center gap-1">
                            <i class="bi bi-save"></i> @lang('Save')
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
