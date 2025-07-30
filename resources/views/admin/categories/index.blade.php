<x-admin-layout
title="Categorias | Codersfree"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Categorias',
    ],
]">

<x-slot name="action">
    
    <x-wire-button href="{{route('admin.categories.create')}}" blue>
        Nuevo
    </x-wire-button>

</x-slot>

@livewire('admin.datatables.category-table')

@push('js')

    <script>
        forms = document.querySelectorAll('.delete-form');
       
        forms.forEach(form => {
            form.addEventListener('submit', function(e){
                e.preventDefault();
                
                alert('Se detuvo el envio del formulario');
                
            });

        });
    </script>
@endpush

</x-admin-layout>