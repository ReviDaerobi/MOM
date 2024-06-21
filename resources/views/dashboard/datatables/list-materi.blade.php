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
                        <th>version name</th>
                        <th>duration</th>
                        <th>type_iklan</th>
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
        var version_name = $('#add1').val();
        var duration = $('#add2').val();
        var type_iklan = $('#add3').val();
        $.ajax({
            type: 'POST',
            url: '/addDataMateri',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'version_name': version_name,
                'duration': duration,
                'type_iklan': type_iklan
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
        ajax: "/list-materi", // Ubah route ke route yang sesuai dengan data mahasiswa
        columns: [
            
            {data: 'version_name', name: 'version_name'},
            {data: 'duration', name: 'duration'},
            {data: 'type_iklan', name: 'type_iklan'},
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
        tr.html('<td><input type="text" id="editversion_name" value="' + data.version_name + '"></td><td><input type="text" id="editduration" value="' + data.duration + '"></td><td><input type="text" id="edittype_iklan" value="' + data.type_iklan + '"></td><td><button class="save btn btn-success btn-sm" data-id="' + data.id + '">Save</button></td>');
    });
    
    $(document).on('click', '.save', function(){
        var id = $(this).data('id');
        var version_name = $('#editversion_name').val();
        var duration = $('#editduration').val();
        var type_iklan = $('#edittype_iklan').val();
        $.ajax({
            type: 'POST',
            url: '/updateDataMateri/'+id,
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'version_name': version_name,
                'duration': duration,
                'type_iklan': type_iklan
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
                    $('#deleteForm').attr('action', '/delete-dataMateri/' + id);
                    $('#deleteForm').submit();
                }
            });
        });
    });
    });
    
    </script>
@endpush