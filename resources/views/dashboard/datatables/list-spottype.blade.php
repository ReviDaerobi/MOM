@extends('dashboard.index')

<!-- Modal -->
<div x-data="{ open: false }" @keydown.escape.window="open = false" x-init="
() => {
    $watch('open', value => {
        if (value) {
            $refs.modalContainer.style.display = 'block';
            gsap.fromTo('.modal-container', { y: 100, opacity: 0 }, { y: 0, opacity: 1, duration: 0.5, ease: 'power4.out' });
        } else {
            gsap.to('.modal-container', { y: 100, opacity: 0, duration: 0.5, ease: 'power4.in', onComplete: () => $refs.modalContainer.style.display = 'none' });
        }
    });
}"
>
<div x-show="open" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
        <div class="modal-container inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" x-ref="modalContainer">
            <div class="bg-white px-6 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Tambah Data
                        </h3>
                        <div class="mt-2">
                            <form id="addForm">
                                @csrf
                                <div class="form-group mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Nama:</label>
                                    <input type="text" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addNama" name="add1">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Alamat:</label>
                                    <input type="text" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addAlamat" name="add2">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Telepon:</label>
                                    <input type="text" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addTelepon" name="add3">
                                </div>
                                <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" @click="open = false">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Modal -->

@section('table')

<div class="mt-4">
    <div class="bg-white rounded-lg shadow-md ml-10 mr-10 p-4">

        <form id="deleteForm" action="" method="POST" style="display: none;">
            @csrf
            </form>
            
            <table id="example" class="ui display cell-border nowrap unstackable" style="width:100%">
                <thead class="" style="width: 100%">
                    <tr>
                        <th>spottype</th>
                        <th>description</th>
                        <th>spottypeupdate</th>
                        <th>Action</th>
                        </tr>
                        
                        </thead>
                        <tbody>
                            
                        </tbody>
                        </table>
                        
                        </div>
                        
                        </div>    

@endsection
@push('scripts-datatable')
<script  type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#addButton', function(){
        document.querySelector('[x-data]').__x.$data.open = true;
    });
    
    $('#addForm').on('submit', function(e){
        e.preventDefault();
        var spottype = $('#addspottype').val();
        var description = $('#adddescription').val();
        var spottypeupdate = $('#addspottypeupdate').val();
        $.ajax({
            type: 'POST',
            url: '/addData',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'spottype': spottype,
                'description': description,
                'spottypeupdate': spottypeupdate
            },
            success: function(response){
                alert('Data Added');
                location.reload();
            }
        });
    });
    
    
        $(function () {
    
    var table = $('#example').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "/list-spottype", // Ubah route ke route yang sesuai dengan data mahasiswa
        columns: [
            
            {data: 'spottype', name: 'spottype'},
            {data: 'description', name: 'description'},
            {data: 'spottypeupdate', name: 'spottypeupdate'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        initComplete: function () {
            var button = '<button class="btn btn-primary" id="addButton">Tambah Data</button>';
            $('.dt-search').prepend(button);
        }
    });
    
    var originalData;
        $(document).on('click', '.edit', function(){
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            originalData = {...data}; // Store original data
            tr.html(`
                <td><input type="text" id="editspottype" value="${data.spottype}" class="edit-input"></td>
                <td><input type="text" id="editdescription" value="${data.description}" class="edit-input"></td>
                <td><input type="text" id="editspottypeupdate" value="${data.spottypeupdate}" class="edit-input"></td>
                <td>
                    <button class="save py-4 px-12 rounded bg-successColor text-white text-xl" data-id="${data.id}">Save</button>
                    <button class="cancel py-4 px-12 rounded bg-red-600 text-white text-xl">Cancel</button>
                </td>
            `);
            $('.edit-input').first().focus();
        });

        $(document).on('keydown', '.edit-input', function(e) {
            if (e.key === 'Enter') {
                var inputs = $('.edit-input');
                var idx = inputs.index(this);
                if (idx === inputs.length - 1) {
                    inputs[idx].blur();
                } else {
                    inputs[idx + 1].focus();
                }
            }
        });
    
    $(document).on('click', '.save', function(){
        var id = $(this).data('id');
        var spottype = $('#editspottype').val();
        var description = $('#editdescription').val();
        var spottypeupdate = $('#editspottypeupdate').val();
        $.ajax({
            type: 'POST',
            url: '/updateDataSpottype/'+id,
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'spottype': spottype,
                'description': description,
                'spottypeupdate': spottypeupdate
            },
            success: function(response){
                alert('Data Updated');
                location.reload();
            }
        });
    });
    
    $(document).on('click', '.cancel', function(){
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            row.data(originalData).draw(false); // Restore original data
        });
    });

    });
    
    
    
    
        $(document).ready(function() {
    
         
            
        $(document).on('click', '.show-alert-delete-box', function(event){
            var id = $(this).data('id');
    
            event.preventDefault();
            swal({
                title: "Are you sure you want to delete this record?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel","Yes!"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete) {
                    $('#deleteForm').attr('action', '/delete-dataSpottype/' + id);
                    $('#deleteForm').submit();
                }
            });
        });
    });
    
    </script>
@endpush

                        