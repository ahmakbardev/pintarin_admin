@extends('layouts.layout')

@section('content')
    <div class="container-index w-full py-10">
        <h1 class="text-2xl font-bold mb-4 text-center">Dosen</h1>
        <div class="flex justify-end pb-3">
            <button id="openModalDosenBtn"
                class="flex gap-3 px-4 py-2 rounded-lg items-center bg-blue-500 text-white hover:bg-blue-600 transition-all ease-in-out">
                <i data-feather="plus" class="w-5 h-5"></i>
                <p>Tambah Dosen</p>
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                <thead>
                    <tr>
                        <th
                            class="py-3 px-6 bg-gray-100 border-b border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Nama</th>
                        <th
                            class="py-3 px-6 bg-gray-100 border-b border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            No. HP</th>
                        <th
                            class="py-3 px-6 bg-gray-100 border-b border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Email</th>
                        <th
                            class="py-3 px-6 bg-gray-100 border-b border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Action</th>
                    </tr>
                </thead>
                <tbody id="dosenTableBody">
                    @foreach ($dosens as $dosen)
                        <tr id="dosen-{{ $dosen->id }}">
                            <td class="py-4 px-6 border-b border-gray-300 text-gray-700">{{ $dosen->name }}</td>
                            <td class="py-4 px-6 border-b border-gray-300 text-gray-700">{{ $dosen->phone }}</td>
                            <td class="py-4 px-6 border-b border-gray-300 text-gray-700">{{ $dosen->email }}</td>
                            <td class="py-4 px-6 border-b border-gray-300 text-gray-700 flex gap-3">
                                <button
                                    class="editDosenBtn flex items-center bg-yellow-500 text-white px-3 py-1 text-xs rounded-lg hover:bg-yellow-600 transition-all ease-in-out"
                                    data-id="{{ $dosen->id }}">
                                    <i data-feather="edit" class="mr-1 w-5 h-5"></i>Edit
                                </button>
                                <button
                                    class="deleteDosenBtn flex items-center bg-red-500 text-white px-3 py-1 text-xs rounded-lg hover:bg-red-600 transition-all ease-in-out"
                                    data-id="{{ $dosen->id }}">
                                    <i data-feather="trash-2" class="mr-1 w-5 h-5"></i>Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Add Dosen -->
    <div id="myModalDosen"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex justify-center items-center opacity-0 pointer-events-none transition-opacity duration-300 z-10">
        <div class="bg-white p-8 rounded-lg transform translate-y-10 transition-transform duration-300 w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4 text-center">Tambah Dosen Baru</h2>
            <form id="addDosenForm">
                @csrf
                <div class="mb-4">
                    <label for="dosenName" class="block text-gray-700 my-2">Nama Dosen</label>
                    <input type="text" id="dosenName" name="name"
                        class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-lg outline-none focus:border-primary"
                        placeholder="Nama Dosen" required>
                </div>
                <div class="mb-4">
                    <label for="dosenEmail" class="block text-gray-700 my-2">Email</label>
                    <input type="email" id="dosenEmail" name="email"
                        class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-lg outline-none focus:border-primary"
                        placeholder="Email" required>
                </div>
                <div class="mb-4">
                    <label for="dosenPhone" class="block text-gray-700 my-2">Phone</label>
                    <input type="text" id="dosenPhone" name="phone"
                        class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-lg outline-none focus:border-primary"
                        placeholder="Phone">
                </div>
                <div class="mb-4">
                    <label for="dosenAddress" class="block text-gray-700 my-2">Address</label>
                    <input type="text" id="dosenAddress" name="address"
                        class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-lg outline-none focus:border-primary"
                        placeholder="Address">
                </div>
                <div class="flex justify-end gap-3 mt-8">
                    <button type="button" id="closeModalDosenBtn"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-all ease-in-out">Batal</button>
                    <button type="submit" id="saveModalDosenBtn"
                        class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-all ease-in-out">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Dosen -->
    <div id="myModalEditDosen"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex justify-center items-center opacity-0 pointer-events-none transition-opacity duration-300 z-10">
        <div class="bg-white p-8 rounded-lg transform translate-y-10 transition-transform duration-300 w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4 text-center">Edit Dosen</h2>
            <form id="editDosenForm">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="editDosenName" class="block text-gray-700 my-2">Nama Dosen</label>
                    <input type="text" id="editDosenName" name="name"
                        class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-lg outline-none focus:border-primary"
                        placeholder="Nama Dosen" required>
                </div>
                <div class="mb-4">
                    <label for="editDosenEmail" class="block text-gray-700 my-2">Email</label>
                    <input type="email" id="editDosenEmail" name="email"
                        class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-lg outline-none focus:border-primary"
                        placeholder="Email" required>
                </div>
                <div class="mb-4">
                    <label for="editDosenPhone" class="block text-gray-700 my-2">Phone</label>
                    <input type="text" id="editDosenPhone" name="phone"
                        class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-lg outline-none focus:border-primary"
                        placeholder="Phone">
                </div>
                <div class="mb-4">
                    <label for="editDosenAddress" class="block text-gray-700 my-2">Address</label>
                    <input type="text" id="editDosenAddress" name="address"
                        class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-lg outline-none focus:border-primary"
                        placeholder="Address">
                </div>
                <div class="flex justify-end gap-3 mt-8">
                    <button type="button" id="closeModalEditDosenBtn"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-all ease-in-out">Batal</button>
                    <button type="submit" id="saveModalEditDosenBtn"
                        class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-all ease-in-out">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div id="toastContainer" class="fixed bottom-4 right-4 flex flex-col gap-2 z-50"></div>

    <script>
        $(document).ready(function() {
            const openModalDosenBtn = $('#openModalDosenBtn');
            const closeModalDosenBtn = $('#closeModalDosenBtn');
            const myModalDosen = $('#myModalDosen');
            const dosenTableBody = $('#dosenTableBody');

            const openModalEditDosenBtn = $('.editDosenBtn');
            const closeModalEditDosenBtn = $('#closeModalEditDosenBtn');
            const myModalEditDosen = $('#myModalEditDosen');
            let currentEditId = null;

            function openModal(modal) {
                modal.removeClass('opacity-0 pointer-events-none');
                modal.addClass('opacity-100');
                modal.find('> div').removeClass('translate-y-10');
                modal.find('> div').addClass('translate-y-0');
            }

            function closeModal(modal) {
                modal.addClass('opacity-0 pointer-events-none');
                modal.removeClass('opacity-100');
                modal.find('> div').addClass('translate-y-10');
                modal.find('> div').removeClass('translate-y-0');
            }

            openModalDosenBtn.on('click', function() {
                openModal(myModalDosen);
            });

            closeModalDosenBtn.on('click', function() {
                closeModal(myModalDosen);
            });

            $(document).on('click', '.editDosenBtn', function() {
                const dosenId = $(this).data('id');
                currentEditId = dosenId;

                $.ajax({
                    url: `/admin/dosens/${dosenId}`,
                    type: 'GET',
                    success: function(response) {
                        $('#editDosenName').val(response.name);
                        $('#editDosenEmail').val(response.email);
                        $('#editDosenPhone').val(response.phone);
                        $('#editDosenAddress').val(response.address);

                        openModal(myModalEditDosen);
                    },
                    error: function() {
                        showToast('Gagal memuat data dosen', 'error');
                    }
                });
            });

            closeModalEditDosenBtn.on('click', function() {
                closeModal(myModalEditDosen);
            });

            $('#addDosenForm').on('submit', function(e) {
                e.preventDefault();
                const dosenName = $('#dosenName').val();
                const dosenEmail = $('#dosenEmail').val();
                const dosenPhone = $('#dosenPhone').val();
                const dosenAddress = $('#dosenAddress').val();

                $.ajax({
                    url: '{{ route('dosens.store') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: dosenName,
                        email: dosenEmail,
                        phone: dosenPhone,
                        address: dosenAddress,
                    },
                    success: function(response) {
                        closeModal(myModalDosen);
                        showToast(response.success, 'success');

                        const newRow = `
                            <tr id="dosen-${response.dosen.id}">
                                <td class="py-4 px-6 border-b border-gray-300 text-gray-700">${response.dosen.name}</td>
                                <td class="py-4 px-6 border-b border-gray-300 text-gray-700">${response.dosen.phone}</td>
                                <td class="py-4 px-6 border-b border-gray-300 text-gray-700">${response.dosen.email}</td>
                                <td class="py-4 px-6 border-b border-gray-300 text-gray-700 flex gap-3">
                                    <button class="editDosenBtn flex items-center bg-yellow-500 text-white px-3 py-1 text-xs rounded-lg hover:bg-yellow-600 transition-all ease-in-out" data-id="${response.dosen.id}">
                                        <i data-feather="edit" class="mr-1 w-5 h-5"></i>Edit
                                    </button>
                                    <button class="deleteDosenBtn flex items-center bg-red-500 text-white px-3 py-1 text-xs rounded-lg hover:bg-red-600 transition-all ease-in-out" data-id="${response.dosen.id}">
                                        <i data-feather="trash-2" class="mr-1 w-5 h-5"></i>Delete
                                    </button>
                                </td>
                            </tr>
                        `;
                        dosenTableBody.append(newRow);
                        feather.replace();
                    },
                    error: function(xhr) {
                        const response = JSON.parse(xhr.responseText);
                        showToast(response.error, 'error');
                    }
                });
            });

            $('#editDosenForm').on('submit', function(e) {
                e.preventDefault();
                const dosenName = $('#editDosenName').val();
                const dosenEmail = $('#editDosenEmail').val();
                const dosenPhone = $('#editDosenPhone').val();
                const dosenAddress = $('#editDosenAddress').val();

                $.ajax({
                    url: `/admin/dosens/${currentEditId}`,
                    type: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: dosenName,
                        email: dosenEmail,
                        phone: dosenPhone,
                        address: dosenAddress,
                    },
                    success: function(response) {
                        closeModal(myModalEditDosen);
                        showToast(response.success, 'success');

                        $(`#dosen-${response.dosen.id}`).html(`
                            <td class="py-4 px-6 border-b border-gray-300 text-gray-700">${response.dosen.name}</td>
                            <td class="py-4 px-6 border-b border-gray-300 text-gray-700">${response.dosen.phone}</td>
                            <td class="py-4 px-6 border-b border-gray-300 text-gray-700">${response.dosen.email}</td>
                            <td class="py-4 px-6 border-b border-gray-300 text-gray-700 flex gap-3">
                                <button class="editDosenBtn flex items-center bg-yellow-500 text-white px-3 py-1 text-xs rounded-lg hover:bg-yellow-600 transition-all ease-in-out" data-id="${response.dosen.id}">
                                    <i data-feather="edit" class="mr-1 w-5 h-5"></i>Edit
                                </button>
                                <button class="deleteDosenBtn flex items-center bg-red-500 text-white px-3 py-1 text-xs rounded-lg hover:bg-red-600 transition-all ease-in-out" data-id="${response.dosen.id}">
                                    <i data-feather="trash-2" class="mr-1 w-5 h-5"></i>Delete
                                </button>
                            </td>
                        `);
                        feather.replace();
                    },
                    error: function(xhr) {
                        const response = JSON.parse(xhr.responseText);
                        showToast(response.error, 'error');
                    }
                });
            });

            $(document).on('click', '.deleteDosenBtn', function() {
                const dosenId = $(this).data('id');

                if (confirm('Apakah Anda yakin ingin menghapus dosen ini?')) {
                    $.ajax({
                        url: `/admin/dosens/${dosenId}`,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            showToast(response.success, 'success');
                            $(`#dosen-${dosenId}`).remove();
                        },
                        error: function(xhr) {
                            const response = JSON.parse(xhr.responseText);
                            showToast(response.error, 'error');
                        }
                    });
                }
            });

            function showToast(message, type) {
                const toast = $(
                `<div class="toast ${type}"> <i data-feather="check" class=" w-5 h-5 mr-4"></i> ${message}</div>`);
                $('#toastContainer').append(toast);
                feather.replace();
                setTimeout(() => {
                    toast.remove();
                }, 3000);
            }

            feather.replace();
        });
    </script>

    <style>
        .toast {
            padding: 12px 24px;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: opacity 0.3s ease-in-out;
            opacity: 0;
            animation: fadeIn 0.5s forwards, fadeOut 0.5s 2.5s forwards;
            display: flex;
            align-items: center;
        }

        .toast.success {
            background-color: #4CAF50;
            /* Green */
        }

        .toast.error {
            background-color: #F44336;
            /* Red */
        }

        .toast i {
            margin-left: 10px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: translateY(0);
            }

            to {
                opacity: 0;
                transform: translateY(20px);
            }
        }

        .editDosenBtn,
        .deleteDosenBtn {
            transition: all 0.3s ease-in-out;
        }

        .editDosenBtn:hover,
        .deleteDosenBtn:hover {
            transform: scale(1.05);
        }
    </style>
@endsection
