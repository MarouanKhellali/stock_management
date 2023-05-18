@extends('/layout.layout')
@section('title', 'Ajouter produit')
@section('content')
    <div class="border-2 rounded-lg shadow-lg bg-white">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-3">
            <div class="flex items-center justify-center mb-5 ">
                <div class=" w-full p-3 ">
                    <div class=" px-4 ">
                        <h1 class="text-2xl font-bold antialiased pb-3 pt-6 text-green-600">Ajouter Produit</h1>
                    </div>
                    <form action="{{ url('produits') }}" method="post"> @csrf
                        <div class="-mx-3 flex flex-wrap">
                            <div class="w-full px-3 ">
                                <div class="mb-5">
                                    <label for="nom_p" class="pl-3 mb-3 block text-base font-medium text-[#07074D]">
                                        Nom:
                                    </label>
                                    <input type="text" name="nom_p" id="nom_p" placeholder="Nom"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    @error('nom_p')
                                        <div class="text-red-700">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="-mx-3 flex flex-wrap">
                            <div class="w-full px-3 md:w-1/2" hidden>
                                <div class="mb-5">
                                    <label for="ref_p" class="pl-3 mb-3 block text-base font-medium text-[#07074D]">
                                        Référence:
                                    </label>
                                    <input type="number" name="ref_p" value="auto_increment" id="ref_p"
                                        placeholder="Référence"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                            </div>
                            <div class="w-full px-3  ">
                                <div class="mb-5">
                                    <label for="libelle_p" class="pl-3 mb-3 block text-base font-medium text-[#07074D]">
                                        Libelle:
                                    </label>
                                    <input type="text" name="libelle_p" id="libelle_p" placeholder="Libelle"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    @error('libelle_p')
                                        <div class="text-red-700">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="-mx-3 flex flex-wrap">
                            <div class="w-full px-3 md:w-1/2">
                                <div class="mb-5">
                                    <label for="qte_p" class="pl-3 mb-3 block text-base font-medium text-[#07074D]">
                                        Quantité:
                                    </label>
                                    <input type="number" min="1" name="qte_p" id="qte_p"
                                        placeholder="Quantité"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    @error('qte_p')
                                        <div class="text-red-700">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full px-3 md:w-1/2">
                                <div class="mb-5">
                                    <label for="date_enter" class="pl-3 mb-3 block text-base font-medium text-[#07074D]">
                                        Date d'entrée :
                                    </label>
                                    <input type="date" name="date_enter" id="date_enter"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    @error('date_enter')
                                        <div class="text-red-700">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-center pt-5">
                            <button type="submit"
                                class=" hover:shadow-form inline-flex items-center text-gray-100 bg-green-700 focus:ring-4 font-medium rounded-lg text-sm py-3 px-8 ">
                                Envoyer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
