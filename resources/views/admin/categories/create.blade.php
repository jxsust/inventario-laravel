<x-admin-layout
title="Categorias | Codersfree"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Categorias',
        'href' => route('admin.categories.index'),
    ],
    [
        'name' => 'Nuevo',
    ]
]">

    <x-wire-card>
        <form action="{{route('admin.categories.store')}}" method="POST" class="space-y-4">
            @csrf
            <x-wire-input label="nombre" name="name" placeholder="Nombre De La Categoría" value="{{old('name')}}"/>
            
            <x-wire-textarea label="Descripción" name="description" placeholder="Descripción de la categoría"> 
                {{ old('description') }}
            </x-wire-textarea>

            <div class="flex justify-end">
                <x-button >
                    Guardar
                </x-button>
        </form>
    </x-wire-card>

</x-admin-layout>