@extends("base.app")
@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
@endpush
@section('sidebar')

@include('base.sidebar')

@endsection

{{-- Modal --}}

<div x-data="{ open: false }" @keydown.escape.window="open = false">
    <button @click="open = true" id="addButton" class="btn btn-primary">Tambah Data</button>
    <div x-show="open" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
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
                                        <input type="text" class="form-control" id="addNama" name="nama">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat:</label>
                                        <input type="text" class="form-control" id="addAlamat" name="alamat">
                                    </div>
                                    <div class="form-group">
                                        <label>Telepon:</label>
                                        <input type="text" class="form-control" id="addTelepon" name="telepon">
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


@section('konten')
    <div class="mt-4">
      <div class="bg-white rounded-lg shadow-md ml-10 mr-10 p-4">

        <form id="deleteForm" action="" method="POST" style="display: none;">
            @csrf
        </form>

<table id="example" class=" display cell-border" style="width:100%">
    <thead class="" style="width: 100%">
        <tr>
            <th>Name</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Action</th>
        </tr>
        
    </thead>
    <tbody>
   
    </tbody>
</table>

</div>

</div>
@endsection

   


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/ad1585c3d7.js" crossorigin="anonymous"></script>
<script src="/src/js/app.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


<script  type="text/javascript">
$(document).ready(function() {
    $(document).on('click', '#addButton', function(){
    document.querySelector('[x-data]').__x.$data.open = true;
});

$('#addForm').on('submit', function(e){
    e.preventDefault();
    var nama = $('#addNama').val();
    var alamat = $('#addAlamat').val();
    var telepon = $('#addTelepon').val();
    $.ajax({
        type: 'POST',
        url: '/addData',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'nama': nama,
            'alamat': alamat,
            'telepon': telepon
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
    ajax: "/dashboard", // Ubah route ke route yang sesuai dengan data mahasiswa
    columns: [
        
        {data: 'nama', name: 'nama'},
        {data: 'alamat', name: 'alamat'},
        {data: 'telepon', name: 'telepon'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
    ],
    initComplete: function () {
        var button = '<button class="btn btn-primary" id="addButton">Tambah Data</button>';
        $('.dt-search').prepend(button);
    }
});

$(document).on('click', '.edit', function(){
    var tr = $(this).closest('tr');
    var row = table.row(tr);
    var data = row.data();
    tr.html('<td><input type="text" id="editNama" value="' + data.nama + '"></td><td><input type="text" id="editAlamat" value="' + data.alamat + '"></td><td><input type="text" id="editTelepon" value="' + data.telepon + '"></td><td><button class="save btn btn-success btn-sm" data-id="' + data.id + '">Save</button></td>');
});

$(document).on('click', '.save', function(){
    var id = $(this).data('id');
    var nama = $('#editNama').val();
    var alamat = $('#editAlamat').val();
    var telepon = $('#editTelepon').val();
    $.ajax({
        type: 'POST',
        url: '/updateData/'+id,
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'nama': nama,
            'alamat': alamat,
            'telepon': telepon
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
                $('#deleteForm').attr('action', '/delete-data/' + id);
                $('#deleteForm').submit();
            }
        });
    });
});
});

</script>
@endpush