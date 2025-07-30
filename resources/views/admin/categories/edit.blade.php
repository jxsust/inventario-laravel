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
        'name' => 'Editar',
    ]
]">
    <x-wire-card>
        <form action="{{route('admin.categories.update', $category)}}" method="POST" class="space-y-4">
           
            @csrf
            @method('PUT')

            <x-wire-input label="nombre" name="name" placeholder="Nombre De La Categoría" value="{{old('name', $category->name)}}"/>
            
            <x-wire-textarea label="Descripción" name="description" placeholder="Descripción de la categoría"> 
                {{ old('description', $category->description )}}
            </x-wire-textarea>

            <div class="flex justify-end">
                <x-button >
                    Actualizar
                </x-button>
        </form>
    </x-wire-card>
    

</x-admin-layout>