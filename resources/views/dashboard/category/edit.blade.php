<x-app-layout>
    <x-slot name="headerLeft">
        <div class="col">
            <div class="btn-list">
                <a href="{{ route('dashboard.category.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <line x1="5" y1="12" x2="11" y2="18"></line>
                        <line x1="5" y1="12" x2="11" y2="6"></line>
                    </svg>
                    Back
                </a>
                <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                </a>
            </div>
        </div>
    </x-slot>

    <x-slot name="headerRight">
        <div class="col-auto ms-auto d-print-none d-flex flex-column align-items-end">
            <div class="page-pretitle">
                Edit Category
            </div>
            <h2 class="page-title">
                Category
            </h2>
        </div>
    </x-slot>

    <div class="container-xl">
        <x-alert />

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Edit Category
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.category.update', $category) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <x-form-input
                                field_name="Name"
                                :field_value="$category->name"
                            />
                        </div>
                    </div>
                    <button class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                            <circle cx="12" cy="14" r="2"></circle>
                            <polyline points="14 4 14 8 8 8 8 4"></polyline>
                        </svg>
                        <span>
                            Update
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
