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
    $(function () {

var table = $('#example').DataTable({
    processing: true,
    serverSide: true,
    ajax: "/dashboard", // Ubah route ke route yang sesuai dengan data mahasiswa
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
        {data: 'nama', name: 'nama'},
        {data: 'alamat', name: 'alamat'},
        {data: 'telepon', name: 'telepon'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
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

</script>
@endpush