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
                
                Swal.fire({
  title: "¿Estas Seguro?",
  text: "No podras revertir esta acción",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Si, eliminar!",
    cancelButtonText: "Cancelar"
    }).then((result) => {
    if (result.isConfirmed) {
    form.submit();
    }
    
        });
                
    });

});
</script>
@endpush

</x-admin-layout>