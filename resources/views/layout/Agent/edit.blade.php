@extends('/layout.layout')

@section('title', 'Ajouter produit')

@section('content')
    <div class="border-2 rounded-lg shadow-lg bg-white">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-3">
            <div class="flex items-center justify-center mb-5 ">
                <div class=" w-full p-3 ">
                    <div class=" px-4 ">
                        <h1 class="text-2xl font-bold antialiased pb-3 pt-6 text-green-600">Modifiée Produit</h1>
                    </div>


                    <form action="{{ url('agents/' . $agents->id_agent) }}" method="post">

                        @csrf
                        @method('PATCH')

                        <div class="-mx-3 flex flex-wrap">
                            <div class="w-full px-3 ">
                                <div class="mb-5">
                                    <label for="nom_agent" class="pl-3 mb-3 block text-base font-medium text-[#07074D]">
                                        Nom:
                                    </label>
                                    <input type="text" name="nom_agent" id="nom_agent" placeholder="Name"
                                        value="{{ $agents->nom_agent }}"
                                        class="w-full  rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                            </div>
                        </div>
                        <div class="-mx-3 flex flex-wrap">
                            <div class="w-full px-3 ">
                                <div class="mb-5">
                                    <label for="prenom_agent" class="pl-3 mb-3 block text-base font-medium text-[#07074D]">
                                        Prenom:
                                    </label>
                                    <input type="text" name="prenom_agent" id="prenom_agent" placeholder="Prenom"
                                        value="{{ $agents->prenom_agent }}"
                                        class="w-full  rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                            </div>
                        </div>
                        <div class="-mx-3 flex flex-wrap">
                            <div class="w-full px-3 ">
                                <div class="mb-5">
                                    <label for="grade_agent" class="pl-3 mb-3 block text-base font-medium text-[#07074D]">
                                        Grade:
                                    </label>
                                    <input type="text" name="grade_agent" id="grade_agent" placeholder="Grade"
                                        value="{{ $agents->grade_agent }}"
                                        class="w-full  rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-center pt-5">
                            <button type="submit"
                                class=" hover:shadow-form inline-flex items-center text-gray-100 bg-green-700 focus:ring-4 font-medium rounded-lg text-sm py-3 px-8 ">
                                Submite
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
