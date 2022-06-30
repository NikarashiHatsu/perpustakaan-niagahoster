<x-app-layout>
    <x-slot name="headerLeft">
        <div class="col">
            <div class="page-pretitle">
                Overview
            </div>
            <h2 class="page-title">
                Dashboard
            </h2>
        </div>
    </x-slot>

    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <p>
                    Welcome, {{ auth()->user()->name }}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
