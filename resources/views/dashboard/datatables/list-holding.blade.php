@extends('dashboard.index')

@section('table')

<div class="mt-4">
    <div class="bg-white rounded-lg shadow-md ml-10 mr-10 p-4">
        <form id="deleteForm" action="" method="POST" style="display: none;">
            @csrf
        </form>
            
        <table id="example" class="ui display cell-border nowrap unstackable" style="width:100%">
            <thead>
                <tr>
                    <th>Holding Name</th>
                    <th>Description</th>
                    <th>Holding Code</th>
                    <th>Address</th>
                    <th>Tax Id</th>
                    <th>Phone No</th>
                    <th>Commision</th>
                    <th>Local Tax</th>
                    <th>DirectAdvertiser PO</th>
                    <th>Created By</th>
                    <th>Created Date</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>    

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
                                Tambah Datas
                            </h3>
                            <div class="mt-2">
                                <form id="addForm">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label class="block text-sm font-medium text-gray-700">Holding Name:</label>
                                        <input type="text" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addNama" name="n_holding">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="block text-sm font-medium text-gray-700">Description:</label>
                                        <input type="text" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addDescription" name="description">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="block text-sm font-medium text-gray-700">Holding Code:</label>
                                        <input type="text" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addHoldingCode" name="holding_code">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="block text-sm font-medium text-gray-700">Address:</label>
                                        <input type="text" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addAddress" name="address">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="block text-sm font-medium text-gray-700">Tax ID:</label>
                                        <input type="text" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addTaxId" name="tax_id">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="block text-sm font-medium text-gray-700">Phone No:</label>
                                        <input type="text" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addPhoneNo" name="phone_no">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="block text-sm font-medium text-gray-700">Commision:</label>
                                        <input type="text" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addCommision" name="commision">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="block text-sm font-medium text-gray-700">Local Tax:</label>
                                        <input type="text" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addLocalTax" name="local_tax">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="block text-sm font-medium text-gray-700">DirectAdvertiser PO:</label>
                                        <input type="text" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addDirectAdvertiserPO" name="direct_advertiser_po">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="block text-sm font-medium text-gray-700">Created By:</label>
                                        <input type="text" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addCreatedBy" name="created_by">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="block text-sm font-medium text-gray-700">Created Date:</label>
                                        <input type="date" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addCreatedDate" name="created_date">
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

@endsection

@push('scripts-datatable')
<script  type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#addButton', function(){
            document.querySelector('[x-data]').__x.$data.open = true;
        });
        
        $('#addForm').on('submit', function(e){
            e.preventDefault();
            var n_holding = $('#addNama').val();
            var description = $('#addDescription').val();
            var holding_code = $('#addHoldingCode').val();
            var address = $('#addAddress').val();
            var tax_id = $('#addTaxId').val();
            var phone_no = $('#addPhoneNo').val();
            var commision = $('#addCommision').val();
            var local_tax = $('#addLocalTax').val();
            var direct_advertiser_po = $('#addDirectAdvertiserPO').val();
            var created_by = $('#addCreatedBy').val();
            var created_date = $('#addCreatedDate').val();
        
            $.ajax({
                url: "/addDataHolding",
                type:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    n_holding:n_holding,
                    description:description,
                    holding_code:holding_code,
                    address:address,
                    tax_id:tax_id,
                    phone_no:phone_no,
                    commision:commision,
                    local_tax:local_tax,
                    direct_advertiser_po:direct_advertiser_po,
                    created_by:created_by,
                    created_date:created_date
                },
                success:function(response){
                    if(response) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data added successfully',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#addForm')[0].reset();
                        document.querySelector('[x-data]').__x.$data.open = false;
                        $('#example').DataTable().ajax.reload();
                    }
                },
                error: function(response) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Failed to add data',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });
        var table = $('#example').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "/list-holding", // Ubah route ke route yang sesuai dengan data mahasiswa
        columns: [
            
            {data: 'n_holding', name: 'n_holding'},
            {data: 'description', name: 'description'},
            {data: 'description', name: 'description'},
            {data: 'description', name: 'description'},
            {data: 'description', name: 'description'},
            {data: 'description', name: 'description'},
            {data: 'description', name: 'description'},
            {data: 'description', name: 'description'},
            {data: 'description', name: 'description'},
            {data: 'createdby', name: 'createdby'},
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
                <td><input type="text" id="editn_holding" value="${data.n_holding}" class="edit-input"></td>
                <td><input type="text" id="editdescription" value="${data.description}" class="edit-input"></td>
                <td><input type="text" id="editcreatedby" value="${data.createdby}" class="edit-input"></td>
                <td>
                    <button class="save py-4 px-12 rounded bg-successColor text-white text-xl" data-id="${data.id}">Save</button>
                    <button class="cancel py-4 px-12 rounded bg-red-600 text-white text-xl">Cancel</button>
                </td>
            `);
            $('.edit-input').first().focus();
            document.querySelector('[x-data]').__x.$data.open = true;
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

    $(document).on('click', '.cancel', function(){
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            row.data(originalData).draw(false); // Restore original data
        });
                   
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
                    
    }});
});
});

</script>
@endpush
