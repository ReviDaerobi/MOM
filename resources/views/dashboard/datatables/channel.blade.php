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
                        <th>channelname</th>
                        <th>channelfullname</th>
                        <th>channelnameupdate</th>
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
        var channelname = $('#addchannelname').val();
        var channelfullname = $('#addchannelfullname').val();
        var channelnameupdate = $('#addchannelnameupdate').val();
        $.ajax({
            type: 'POST',
            url: '/addData',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'channelname': channelname,
                'channelfullname': channelfullname,
                'channelnameupdate': channelnameupdate
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
        ajax: "/list-channel", // Ubah route ke route yang sesuai dengan data mahasiswa
        columns: [
            
            {data: 'channelname', name: 'channelname'},
            {data: 'channelfullname', name: 'channelfullname'},
            {data: 'channelnameupdate', name: 'channelnameupdate'},
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
        tr.html('<td><input type="text" id="editchannelname" value="' + data.channelname + '"></td><td><input type="text" id="editchannelfullname" value="' + data.channelfullname + '"></td><td><input type="text" id="editchannelnameupdate" value="' + data.channelnameupdate + '"></td><td><button class="save btn btn-success btn-sm" data-id="' + data.id + '">Save</button></td>');
    });
    
    $(document).on('click', '.save', function(){
        var id = $(this).data('id');
        var channelname = $('#editchannelname').val();
        var channelfullname = $('#editchannelfullname').val();
        var channelnameupdate = $('#editchannelnameupdate').val();
        $.ajax({
            type: 'POST',
            url: '/updateDataChannel/'+id,
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'channelname': channelname,
                'channelfullname': channelfullname,
                'channelnameupdate': channelnameupdate
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
                    $('#deleteForm').attr('action', '/delete-dataChannel/' + id);
                    $('#deleteForm').submit();
                }
            });
        });
    });
    });
    
    </script>
@endpush

                        