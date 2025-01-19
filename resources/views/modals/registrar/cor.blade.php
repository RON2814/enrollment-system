<!-- Update Student Modal -->
<div id="corModal"
    class="hidden fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center z-50 transition-opacity duration-300 ease-in-out">
    <div
        class="modal-container bg-white w-full sm:w-[80%] md:w-[80%] lg:w-[80%] max-w-full h-[92vh] max-h-[92vh] rounded-lg shadow-2xl p-12 py-8 relative overflow-y-auto">

        <!-- Close Button -->
        <button onclick=closeUpdateStudentModal() class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>


        {{-- Page 1  --}}
        <h3 class="text-xl font-semibold mb-6 text-gray-800 border-b border-gray-300">Certificate of Registration</h3>

    </div>
</div>

<script>
    // Function to open the COR modal
    function openCORMOdal() {
        const corModal = document.getElementById('corModal');
        corModal.classList.remove('hidden'); // Show the COR modal
    }

    // Function to close the COR modal
    function closeUpdateStudentModal() {
        const corModal = document.getElementById('corModal');
        corModal.classList.add('hidden'); // Hide the COR modal
    }
</script>