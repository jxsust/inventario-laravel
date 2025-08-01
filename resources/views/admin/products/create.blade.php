<x-admin-layout
title="Productos| JustHack"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Productos',
        'href' => route('admin.products.index'),
    ],
    [
        'name' => 'Nuevo',
    ]
]">

    <x-wire-card>

        <form action="{{route('admin.products.store')}}" method="POST" class="space-y-4">
            @csrf
            <x-wire-input label="nombre" name="name" placeholder="Nombre De La Categoría" value="{{old('name')}}"/>
            
            <x-wire-textarea label="Descripción" name="description" placeholder="Descripción de la categoría"> 
                {{ old('description') }}
            </x-wire-textarea>

            <x-wire-input type label="Precio" name="price" placeholder="Precio del producto" value="{{old('price')}}"/>

            <x-wire-native-select label="Categoría" name="category_id">
                @foreach ($categories as $category )
                    <option value="{{$category->id}}" @selected(old('category_id') == $category->id )>
                        {{$category->name}}
                    </option>
                @endforeach
            </x-wire-native-select>

            <div class="flex justify-end">
                <x-button >
                    Guardar
                </x-button>
        </form>
    </x-wire-card>

</x-admin-layout>