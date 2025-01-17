@extends('layouts.layout')

@section('content')
    <div class="flex container-index w-full py-0">
        <div class="flex-1">
            <div class="py-5">
                <div class="mb-10 flex flex-col gap-3">
                    <label class="text-2xl">Title</label>
                    <input type="text" class="border-b max-w-xl px-3 py-2 outline-none">
                </div>
                <div class="mb-10 flex flex-col gap-3 text-sm">
                    <label class="text-2xl">Deskripsi</label>
                    <textarea class="border-b max-w-xl outline-none focus:outline-none" rows="10"></textarea>
                </div>
                <div class="flex gap-5">
                    <button id="urlButton" class="relative group">
                        <svg class="w-6 h-6" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_373_1365)">
                                <path
                                    d="M6.01242 18.4998C6.01242 15.8636 8.15534 13.7207 10.7916 13.7207H16.9583V10.7915H10.7916C6.53659 10.7915 3.08325 14.2448 3.08325 18.4998C3.08325 22.7548 6.53659 26.2082 10.7916 26.2082H16.9583V23.279H10.7916C8.15534 23.279 6.01242 21.1361 6.01242 18.4998ZM12.3333 20.0415H24.6666V16.9582H12.3333V20.0415ZM26.2083 10.7915H20.0416V13.7207H26.2083C28.8445 13.7207 30.9874 15.8636 30.9874 18.4998C30.9874 21.1361 28.8445 23.279 26.2083 23.279H20.0416V26.2082H26.2083C30.4633 26.2082 33.9166 22.7548 33.9166 18.4998C33.9166 14.2448 30.4633 10.7915 26.2083 10.7915Z"
                                    fill="#001E50" />
                            </g>
                            <defs>
                                <clipPath id="clip0_373_1365">
                                    <rect width="37" height="37" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <div
                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden w-fit group-hover:block bg-black text-white text-xs rounded py-1 px-2">
                            Tambah URL
                        </div>
                    </button>

                    <button id="fileButton" class="relative group">
                        <svg class="w-6 h-6" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_373_1366)">
                                <path
                                    d="M13.8749 24.6667H23.1249V15.4167H29.2916L18.4999 4.625L7.70825 15.4167H13.8749V24.6667ZM7.70825 27.75H29.2916V30.8333H7.70825V27.75Z"
                                    fill="#262626" />
                            </g>
                            <defs>
                                <clipPath id="clip0_373_1366">
                                    <rect width="37" height="37" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <div
                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden w-fit group-hover:block bg-black text-white text-xs rounded py-1 px-2">
                            Tambah File
                        </div>
                    </button>
                </div>
                <!-- Container for URL Preview -->
                <div id="urlPreviewContainer"></div>
                <div class="flex justify-end my-5">
                    <button
                        class="py-3 px-5 text-lg bg-primary text-white rounded-lg hover:ring transition-all ease-in-out">Unggah</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal URL -->
    <!-- Modal URL -->
    <div id="urlModal"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex justify-center items-center opacity-0 pointer-events-none transition-opacity duration-300 z-10">
        <div class="bg-white p-8 rounded-lg transform translate-y-10 transition-transform duration-300 w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4 text-center">Tambah URL</h2>
            <form id="urlForm">
                <div class="mb-4">
                    <label for="urlInput" class="block text-gray-700 my-2">URL</label>
                    <input type="text" id="urlInput" name="urlInput"
                        class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-lg outline-none focus:border-primary"
                        placeholder="https://example.com" required>
                </div>
                <div class="flex justify-end gap-3 mt-8">
                    <button type="button" id="closeUrlModal"
                        class="px-4 py-2 bg-white hover:ring rounded-lg transition-all ease-in-out">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-primary text-white hover:bg-blue-600 hover:ring transition-all ease-in-out rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal File -->
    <div id="fileModal"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex justify-center items-center opacity-0 pointer-events-none transition-opacity duration-300 z-10">
        <div class="bg-white p-8 rounded-lg transform translate-y-10 transition-transform duration-300 w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4 text-center">Tambah File</h2>
            <form>
                <div class="mb-4">
                    <label for="fileInput" class="block text-gray-700 my-2">File</label>
                    <input type="file" id="fileInput" name="fileInput"
                        class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-lg outline-none focus:border-primary"
                        required>
                </div>
                <div class="flex justify-end gap-3 mt-8">
                    <button type="button" id="closeFileModal"
                        class="px-4 py-2 bg-white hover:ring rounded-lg transition-all ease-in-out">Batal</button>
                    <button type="button" id="saveFileModal"
                        class="px-4 py-2 bg-primary text-white hover:bg-blue-600 hover:ring transition-all ease-in-out rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            const urlModal = $('#urlModal');
            const urlCache = {};
            let isLoading = false; // Variable to track loading state

            $('#urlButton').on('click', function() {
                if (!isLoading) {
                    urlModal.removeClass('opacity-0 pointer-events-none');
                    urlModal.addClass('opacity-100');
                    urlModal.find('> div').removeClass('translate-y-10');
                    urlModal.find('> div').addClass('translate-y-0');
                }
            });

            $('#closeUrlModal').on('click', function() {
                urlModal.addClass('opacity-0 pointer-events-none');
                urlModal.removeClass('opacity-100');
                urlModal.find('> div').addClass('translate-y-10');
                urlModal.find('> div').removeClass('translate-y-0');
            });

            // Simpan URL dan tampilkan preview
            $('#urlForm').on('submit', function(event) {
                event.preventDefault();
                const urlInput = $('#urlInput').val();
                isLoading = true; // Set loading state to true

                // Display initial preview with minimal data
                const initialPreviewHtml = `
                <div class="relative flex gap-5 ring-1 ring-black rounded-2xl my-4 p-4 opacity-0 translate-y-10 transition-all duration-1000 ease-in-out overflow-hidden">
                    <img src="{{ asset('assets/images/thumbnail/default.png') }}" alt="" class="h-full aspect-video max-w-48 object-cover">
                    <div class="flex justify-between w-full items-center">
                        <div class="flex flex-col gap-3">
                            <h1 class="font-medium">Loading...</h1>
                            <p class="text-gray-500 max-w-[500px] truncate">${urlInput}</p>
                        </div>
                    </div>
                </div>
            `;
                $('#urlPreviewContainer').html(initialPreviewHtml);

                setTimeout(() => {
                    $('#urlPreviewContainer .relative').removeClass('opacity-0 translate-y-10')
                        .addClass('opacity-100 translate-y-0');
                }, 200);

                $('#urlModal').addClass('opacity-0 pointer-events-none');
                $('#urlModal').removeClass('opacity-100');
                $('#urlModal').find('> div').addClass('translate-y-10');
                $('#urlModal').find('> div').removeClass('translate-y-0');

                // Check if the URL metadata is already cached
                if (urlCache[urlInput]) {
                    updateUrlPreview(urlCache[urlInput]);
                    isLoading = false; // Set loading state to false
                } else {
                    // Request URL metadata and create preview
                    $.ajax({
                        url: `https://api.allorigins.win/get?url=${encodeURIComponent(urlInput)}`,
                        success: function(response) {
                            const html = response.contents;
                            const doc = new DOMParser().parseFromString(html, "text/html");
                            const title = doc.querySelector('meta[property="og:title"]')
                                ?.getAttribute('content') || doc.querySelector('title')
                                ?.innerText;
                            const description = doc.querySelector(
                                'meta[property="og:description"]')?.getAttribute('content');
                            const image = doc.querySelector('meta[property="og:image"]')
                                ?.getAttribute('content') ||
                                '{{ asset('assets/images/thumbnail/default.png') }}';

                            const urlMetadata = {
                                url: urlInput,
                                title,
                                description,
                                image
                            };
                            urlCache[urlInput] = urlMetadata;
                            updateUrlPreview(urlMetadata);
                            isLoading = false; // Set loading state to false
                        },
                        error: function() {
                            $('#urlPreviewContainer').html(
                                '<div class="error">Failed to load metadata</div>');
                            isLoading = false; // Set loading state to false
                        }
                    });
                }
            });

            function updateUrlPreview({
                url,
                title,
                description,
                image
            }) {
                const updatedPreviewHtml = `
                <div class="relative flex gap-5 ring-1 ring-black rounded-2xl my-4 p-4 transition-all duration-1000 ease-in-out overflow-hidden">
                    <img src="${image}" alt="" class="h-full aspect-video max-w-48 object-cover">
                    <div class="flex justify-between w-full items-center">
                        <div class="flex flex-col gap-3">
                            <h1 class="font-medium truncate">${title || 'No Title'}</h1>
                            <p class="text-gray-500 max-w-[500px] truncate">${description || url}</p>
                        </div>
                    </div>
                </div>
                <button id="deleteUrl" type="button" class="absolute top-1/2 -translate-y-1/2 right-0 mr-2 bg-white rounded-full p-1 group">
                    <svg width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_373_1377)">
                            <path d="M7.5 24.25C7.5 25.625 8.625 26.75 10 26.75H20C21.375 26.75 22.5 25.625 22.5 24.25V9.25H7.5V24.25ZM10 11.75H20V24.25H10V11.75ZM19.375 5.5L18.125 4.25H11.875L10.625 5.5H6.25V8H23.75V5.5H19.375Z" fill="#323232"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_373_1377)">
                                <rect width="30" height="30" fill="white" transform="translate(0 0.5)"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <div class="absolute -right-[15px] hidden group-hover:block bg-black text-white text-xs rounded py-1 px-2">
                        Hapus URL
                    </div>
                </button>
            `;

                $('#urlPreviewContainer').html(updatedPreviewHtml);
            }

            // Event handler for deleting the URL preview
            $(document).on('click', '#deleteUrl', function(event) {
                event.preventDefault(); // Prevent the default behavior of the <a> tag
                event.stopPropagation(); // Prevent the click event from bubbling up to the <a> element
                $('#urlInput').val(''); // Clear the URL input
                $('#urlPreviewContainer').html(''); // Remove the URL preview
            });
        });
    </script>

    <style>
        .ck-editor__editable {
            border-bottom-left-radius: 15px !important;
            border-bottom-right-radius: 15px !important;
            height: 200px;
            /* border: 0; */
        }

        .ck-toolbar {
            background: #F2F4F7 !important;
            border-top-left-radius: 15px !important;
            border-top-right-radius: 15px !important;
        }
    </style>
@endsection
