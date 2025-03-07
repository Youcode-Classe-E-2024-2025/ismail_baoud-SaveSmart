@extends('base')

@section('main')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 py-12 px-4 sm:px-6">
        <div class="container mx-auto">
            <!-- Header -->
            <div class="text-center mb-16 relative">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 text-slate-700">
                    💰 Gestion Financière
                </h1>
                <div class="h-1 w-24 mx-auto bg-blue-200 rounded-full"></div>
            </div>

            <!-- Profile Selection -->
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-sm hover:shadow-md transition-all duration-500 border border-slate-100 mb-12">
                <h2 class="text-2xl font-semibold mb-8 text-slate-700 text-center flex items-center justify-center gap-3">
                    <span class="bg-blue-50 p-2 rounded-xl text-blue-500">👤</span>
                    Choisir un Profil
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach($profiles as $profile)
                        <div class="group relative bg-white rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 p-6 border border-slate-100">
                            <div class="relative mb-6">
                                <div class="w-24 h-24 mx-auto rounded-full overflow-hidden border-4 border-blue-100 group-hover:border-blue-200 transition-colors duration-300">
                                    <img
                                        src="{{ asset('storage/'.$profile->image) }}"
                                        alt="{{ $profile->name }}"
                                        class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500"
                                    >
                                </div>
                                <div class="absolute -bottom-2 left-1/2 -translate-x-1/2 bg-blue-500 text-white text-xs px-3 py-1 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    Voir profil
                                </div>
                            </div>
                            <h3 class="text-xl font-semibold text-slate-700 text-center mb-4">
                                {{ $profile->name }}
                            </h3>
                            <a
                                href="/profile/{{ $profile->id }}"
                                class="block w-full bg-blue-500 text-white font-medium px-6 py-3 rounded-xl hover:bg-blue-600 active:scale-[0.98] transition-all duration-300 text-center shadow-sm hover:shadow"
                            >
                                Sélectionner
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- Add Profile Section -->
                <div class="mt-12 text-center m-auto">
                    <h2 class="text-2xl font-semibold mb-6 text-slate-700 flex items-center justify-center gap-3">
                        <span class="bg-emerald-50 p-2 rounded-xl text-emerald-500">➕</span>
                        Ajouter un Nouveau Profil
                    </h2>
                    <button
                        id="addProfileBtn"
                        class="bg-emerald-500 text-white font-medium px-8 py-3 rounded-xl hover:bg-emerald-600 active:scale-[0.98] transition-all duration-300 shadow-sm hover:shadow inline-flex items-center gap-2"
                    >
                        <span class="text-lg">+</span>
                        Ajouter un Profil
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="addProfileModal" class="hidden fixed inset-0 flex justify-center items-center bg-slate-900/20 backdrop-blur-sm z-50">
        <div class=" w-full max-w-lg p-4">
            <div class="bg-white rounded-3xl p-8 shadow-xl transform transition-all duration-300 opacity-0 scale-95 border border-slate-200" id="modalContent">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-slate-700 flex items-center gap-3">
                        <span class="bg-emerald-50 p-2 rounded-xl text-emerald-500">🆕</span>
                        Nouveau Profil
                    </h2>
                    <button id="closeModalBtn" class="text-slate-400 hover:text-slate-600 transition-colors">
                        ×
                    </button>
                </div>

                <form action="/addProfile" method="POST" id="addProfileForm" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div class="space-y-2 group">
                        <label class="block text-sm font-medium text-slate-600 group-hover:text-blue-600 transition-colors">
                            Prénom
                        </label>
                        <input
                            type="text"
                            name="firstName"
                            required
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-600 focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-all duration-300"
                            placeholder="Entrez votre prénom"
                        >
                    </div>

                    <div class="space-y-2 group">
                        <label class="block text-sm font-medium text-slate-600 group-hover:text-blue-600 transition-colors">
                            Nom
                        </label>
                        <input
                            type="text"
                            name="lastName"
                            required
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-600 focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-all duration-300"
                            placeholder="Entrez votre nom"
                        >
                    </div>

                    <div class="space-y-2 group">
                        <label class="block text-sm font-medium text-slate-600 group-hover:text-blue-600 transition-colors">
                            Téléphone
                        </label>
                        <input
                            type="text"
                            name="phone"
                            required
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-600 focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-all duration-300"
                            placeholder="Entrez votre numéro de téléphone"
                        >
                    </div>

                    <div class="space-y-2 group">
                        <label class="block text-sm font-medium text-slate-600 group-hover:text-blue-600 transition-colors">
                            📷 Photo de profil
                        </label>
                        <div class="relative">
                            <input
                                type="file"
                                name="image"
                                id="image"
                                class="w-full bg-slate-50 border-2 border-dashed border-slate-200 rounded-xl px-4 py-8 text-slate-600 focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-all duration-300 cursor-pointer file:hidden"
                            />
                            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                <span class="text-sm text-slate-500">Cliquez ou glissez une image ici</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-4">
                        <button
                            type="button"
                            class="px-6 py-2 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 transition-colors"
                            onclick="closeModal()"
                        >
                            Annuler
                        </button>
                        <button
                            type="submit"
                            class="bg-emerald-500 text-white font-medium px-6 py-2 rounded-xl hover:bg-emerald-600 active:scale-[0.98] transition-all duration-300 shadow-sm hover:shadow"
                        >
                            Ajouter le profil
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Modal functionality with smooth transitions
        const modal = document.getElementById('addProfileModal');
        const modalContent = document.getElementById('modalContent');

        function openModal() {
            modal.classList.remove('hidden');
            requestAnimationFrame(() => {
                modalContent.classList.remove('opacity-0', 'scale-95');
                modalContent.classList.add('opacity-100', 'scale-100');
            });
        }

        function closeModal() {
            modalContent.classList.remove('opacity-100', 'scale-100');
            modalContent.classList.add('opacity-0', 'scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        document.getElementById('addProfileBtn').addEventListener('click', openModal);
        document.getElementById('closeModalBtn').addEventListener('click', closeModal);

        // Close modal on outside click
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });

        // File input preview functionality
        const fileInput = document.getElementById('image');
        fileInput.addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            if (fileName) {
                const label = this.nextElementSibling.querySelector('span');
                label.textContent = `Fichier sélectionné: ${fileName}`;
            }
        });

        // Prevent form submission when pressing Enter
        document.getElementById('addProfileForm').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
            }
        });
    </script>
@endsection
