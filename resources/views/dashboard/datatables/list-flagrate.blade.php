@extends('dashboard.index')

{{-- Modal --}}
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
            <div class="modal-container animate__animated animate__fadeInUp inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" x-ref="modalContainer">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Tambah Data
                            </h3>
                            <div class="mt-2">
                                <form id="addForm">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama:</label>
                                        <input type="text" class="form-control" id="addNama" name="add1">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat:</label>
                                        <input type="text" class="form-control" id="addAlamat" name="add2">
                                    </div>
                                    <div class="form-group">
                                        <label>Telepon:</label>
                                        <input type="text" class="form-control" id="addTelepon" name="add3">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click="open = false">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}

@section('table')

<div class="mt-4">
    <div class="bg-white rounded-lg shadow-md ml-10 mr-10 p-4">

        <form id="deleteForm" action="" method="POST" style="display: none;">
            @csrf
            </form>
            
            <table id="example" class="ui display cell-border nowrap unstackable" style="width:100%">
                <thead class="" style="width: 100%">
                    <tr>
                        <th>flagrate</th>
                        <th>description</th>
                        <th>flagrateupdate</th>
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
        var flagrate = $('#addflagrate').val();
        var description = $('#adddescription').val();
        var flagrateupdate = $('#addflagrateupdate').val();
        $.ajax({
            type: 'POST',
            url: '/addData',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'flagrate': flagrate,
                'description': description,
                'flagrateupdate': flagrateupdate
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
        ajax: "/list-flagrate", // Ubah route ke route yang sesuai dengan data mahasiswa
        columns: [
            
            {data: 'flagrate', name: 'flagrate'},
            {data: 'description', name: 'description'},
            {data: 'flagrateupdate', name: 'flagrateupdate'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        initComplete: function () {
            var button = '<button class="bg-gray600 text-white md:mb-3 rounded py-3 px-3 hover:scale-105 hover:-translate-y-1 transform transition duration-300 mr-3" id="addButton">Tambah Data</button>';
            $('.dt-search').prepend(button);
        }
    });
    
    $(document).on('click', '.edit', function(){
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var data = row.data();
        tr.html('<td><input type="text" id="editflagrate" value="' + data.flagrate + '"></td><td><input type="text" id="editdescription" value="' + data.description + '"></td><td><input type="text" id="editflagrateupdate" value="' + data.flagrateupdate + '"></td><td><button class="save py-4 px-12 rounded bg-successColor text-white text-xl" data-id="' + data.id + '">Save</button></td>');
    });
    
    $(document).on('click', '.save', function(){
        var id = $(this).data('id');
        var flagrate = $('#editflagrate').val();
        var description = $('#editdescription').val();
        var flagrateupdate = $('#editflagrateupdate').val();
        $.ajax({
            type: 'POST',
            url: '/updateDataFlagrate/'+id,
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'flagrate': flagrate,
                'description': description,
                'flagrateupdate': flagrateupdate
            },
            success: function(response){
                alert('Data Updated');
                location.reload();
            }
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
                    $('#deleteForm').attr('action', '/delete-dataFlagrate/' + id);
                    $('#deleteForm').submit();
                }
            });
        });
    });
    });
    
    </script>
@endpush

                        