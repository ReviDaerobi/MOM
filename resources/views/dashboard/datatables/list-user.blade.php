@extends('dashboard.index')

@section('table')
<div class="card mt-12">
    <div class="mt-4">
        <div class="bg-white rounded-lg shadow-md ml-10 mr-10 p-4">
            <form id="deleteForm" action="" method="POST" style="display: none;">
                @csrf
            </form>

            <table id="example" class="ui display cell-border nowrap unstackable " style="width:100%">
                <thead style="width: 100%">
                    <tr>
                        <th>Username</th>
                        <th>Fullname</th>
                        <th>Company</th>
                        <th>Position</th>
                        <th>Level</th>
                        <th>Type</th>
                        <th>Created By</th>
                        <th>Create Date</th>
                        <th>Updated By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
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
             <div class="modal-container inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full" x-ref="modalContainer">
                 <div class="bg-white px-6 pt-5 pb-4 sm:p-6 sm:pb-4">
                     <div class="sm:flex sm:items-start">
                         <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                             <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                 Tambah Data
                             </h3>
                             <div class="mt-2">
                                 <form id="addForm">
                                     @csrf
                                     <div class="grid grid-cols-3 gap-4">
                                         <div class="form-group">
                                             <label class="block text-sm font-medium text-gray-700">Username:</label>
                                             <input type="text" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addUsername" name="username">
                                         </div>
                                         <div class="form-group">
                                             <label class="block text-sm font-medium text-gray-700">Password:</label>
                                             <input type="password" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addPassword" name="password">
                                         </div>
                                         <div class="form-group">
                                             <label class="block text-sm font-medium text-gray-700">Full Name:</label>
                                             <input type="text" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addFullname" name="fullname">
                                         </div>
                                     </div>
                                     <div class="grid grid-cols-3 gap-4 mt-4">
                                         <div class="form-group border-r pr-4">
                                             <label class="block text-sm font-medium text-gray-700">Posisi:</label>
                                             <select class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addPosisi" name="posisi">
                                                 <option value="admin">Admin</option>
                                                 <option value="sales admin">Sales Admin</option>
                                                 <option value="agencies">Agencies</option>
                                                 <option value="billing">Billing</option>
                                                 <option value="client">Client</option>
                                             </select>
                                         </div>
                                         <div class="form-group border-r px-4">
                                             <label class="block text-sm font-medium text-gray-700">Level:</label>
                                             <select class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addLevel" name="level">
                                                 <option value="admin">Admin</option>
                                                 <option value="sales admin">Sales Admin</option>
                                                 <option value="agencies">Agencies</option>
                                                 <option value="billing">Billing</option>
                                                 <option value="client">Client</option>
                                             </select>
                                         </div>
                                         <div class="form-group pl-4">
                                             <label class="block text-sm font-medium text-gray-700">User As:</label>
                                             <select class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addUserAs" name="userAs">
                                                 <option value="admin">Admin</option>
                                                 <option value="tv">TV</option>
                                                 <option value="agencies">Agencies</option>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="grid grid-cols-3 gap-4 mt-4">
                                         <div class="form-group">
                                             <label class="block text-sm font-medium text-gray-700">Stasiun TV:</label>
                                             <select class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addStasiunTV" name="stasiun_tv">
                                                 <option value="mnctv">MNCTV</option>
                                                 <option value="rcti">RCTI</option>
                                             </select>
                                         </div>
                                         <div class="form-group">
                                             <label class="block text-sm font-medium text-gray-700">Agencies Commission:</label>
                                             <input type="number" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addAgenciesCommission" name="agencies_commission">
                                         </div>
                                         <div class="form-group">
                                             <label class="block text-sm font-medium text-gray-700">Agencies To Be Hold:</label>
                                             <input type="number" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addAgenciesToBeHold" name="agencies_to_be_hold">
                                         </div>
                                         <div class="form-group">
                                             <label class="block text-sm font-medium text-gray-700">Agencies To Be Hold Name:</label>
                                             <input type="text" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="addAgenciesToBeHoldName" name="agencies_to_be_hold_name">
                                         </div>
                                     </div>
                                     <button type="submit" class="w-full mt-4 inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:col-start-2 sm:text-sm">Tambah</button>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
@endsection

@push('scripts-datatable')
<script type="text/javascript">
    $(document).ready(function() {


        // Open modal on button click
        $(document).on('click', '#addButton', function(){
            document.querySelector('[x-data]').__x.$data.open = true;
        });
    
        // Handle form submission
        $('#addForm').on('submit', function(e) {
            e.preventDefault();
            
            var formData = {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'username': $('#addUsername').val(),
                'password': $('#addPassword').val(),
                'fullname': $('#addFullname').val(),
                'posisi': $('#addPosisi').val(),
                'stasiuntvid': $('#addStasiunTV').val(),
                'level': $('#addLevel').val(),
                'userAs': $('#addUserAs').val(),
                'agencies_commision': $('#addAgenciesCommission').val(),
                'AgenciesToBeHold': $('#addAgenciesToBeHold').val(),
                'AgenciesToBeHoldName': $('#addAgenciesToBeHoldName').val()
            };
    

    // var originalData;
    //     $(document).on('click', '.edit', function(){
    //         var tr = $(this).closest('tr');
    //         var row = table.row(tr);
    //         var data = row.data();
    //         originalData = {...data}; // Store original data
    //         tr.html(`
    //             <td><input type="text" id="editNama" value="${data.username}" class="edit-input"></td>
    //             <td><input type="text" id="editAlamat" value="${data.fullname}" class="edit-input"></td>
    //             <td><input type="text" id="editTelepon" value="${data.posisi}" class="edit-input"></td>
    //             <td>
    //                 <button class="save py-4 px-12 rounded bg-successColor text-white text-xl" data-id="${data.id}">Save</button>
    //                 <button class="cancel py-4 px-12 rounded bg-red-600 text-white text-xl">Cancel</button>
    //             </td>
    //         `);
    //         $('.edit-input').first().focus();
    //     });

    //     $(document).on('keydown', '.edit-input', function(e) {
    //         if (e.key === 'Enter') {
    //             var inputs = $('.edit-input');
    //             var idx = inputs.index(this);
    //             if (idx === inputs.length - 1) {
    //                 inputs[idx].blur();
    //             } else {
    //                 inputs[idx + 1].focus();
    //             }
    //         }
    //     });

    // // Save button functionality
    // $(document).on('click', '.save', function(){
    //     var id = $(this).data('id');
    //     var username = $('#editNama').val();
    //     var fullname = $('#editAlamat').val();
    //     var posisi = $('#editTelepon').val();
    //     $.ajax({
    //         type: 'POST',
    //         url: '/updateData/' + id,
    //         data: {
    //             '_token': $('meta[name="csrf-token"]').attr('content'),
    //             'username': username,
    //             'fullname': fullname,
    //             'posisi': posisi
    //         },
    //         success: function(response){
    //             alert('Data Updated');
    //             location.reload();
    //         }
    //     });
    // });

    // $(document).on('click', '.cancel', function(){
    //         var tr = $(this).closest('tr');
    //         var row = table.row(tr);
    //         row.data(originalData).draw(false); // Restore original data
    //     });

    // Delete button functionality
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
