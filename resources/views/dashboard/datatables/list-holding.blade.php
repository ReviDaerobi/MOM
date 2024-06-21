@extends('dashboard.index')

@section('table')

<div class="mt-4">
    <div class="bg-white rounded-lg shadow-md ml-10 mr-10 p-4">

        <form id="deleteForm" action="" method="POST" style="display: none;">
            @csrf
            </form>
            
            <table id="example" class=" display cell-border" style="width:100%">
                <thead class="" style="width: 100%">
                    <tr>
                        <th>n_holding</th>
                        <th>description</th>
                        <th>createdby</th>
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
        var n_holding = $('#add1').val();
        var description = $('#add2').val();
        var createdby = $('#add3').val();
        $.ajax({
            type: 'POST',
            url: '/addDataHolding',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'n_holding': n_holding,
                'description': description,
                'createdby': createdby
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
        ajax: "/list-holding", // Ubah route ke route yang sesuai dengan data mahasiswa
        columns: [
            
            {data: 'n_holding', name: 'n_holding'},
            {data: 'description', name: 'description'},
            {data: 'createdby', name: 'createdby'},
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
        tr.html('<td><input type="text" id="editn_holding" value="' + data.n_holding + '"></td><td><input type="text" id="editdescription" value="' + data.description + '"></td><td><input type="text" id="editcreatedby" value="' + data.createdby + '"></td><td><button class="save btn btn-success btn-sm" data-id="' + data.id + '">Save</button></td>');
    });
    
    $(document).on('click', '.save', function(){
        var id = $(this).data('id');
        var n_holding = $('#editn_holding').val();
        var description = $('#editdescription').val();
        var createdby = $('#editcreatedby').val();
        $.ajax({
            type: 'POST',
            url: '/updateDataHolding/'+id,
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'n_holding': n_holding,
                'description': description,
                'createdby': createdby
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
                    $('#deleteForm').attr('action', '/delete-dataHolding/' + id);
                    $('#deleteForm').submit();
                }
            });
        });
    });
    });
    
    </script>
@endpush

                        