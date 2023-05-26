@extends('/layout.layout')
@section('title', 'Ajouter produit')
@section('content')
    <div class="border-2 rounded-lg shadow-lg bg-white">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-3">
            <div class="flex items-center justify-center mb-5 ">
                <div class=" w-full p-3 ">
                    <div class=" px-4 ">
                        <h1 class="text-2xl font-bold antialiased pb-3 pt-6 text-green-600">Ajouter Service</h1>
                    </div>
                    <form action="{{ url('services') }}" method="post">
                        @csrf
                        <div class="-mx-3 flex flex-wrap">
                            <div class="w-full px-3 ">
                                <div class="mb-5">
                                    <label for="nom_service" class="pl-3 mb-3 block text-base font-medium text-[#07074D]">
                                        Nom Service:
                                    </label>
                                    <input type="text" name="nom_service" id="nom_service" placeholder="Name"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    @error('nom_service')
                                        <div class="text-red-700">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <label for="prenom_agent" class="pl-3 mb-3 block text-base font-medium text-[#07074D]">
                            Nom Agents
                        </label>
                        <ul
                            class="py-3 border h-auto grid grid-cols-2 gap-4 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200 lg:grid-cols-3 ">
                            @foreach ($agents as $item)
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                        <input id="{{ $item->id_agent }}" type="checkbox" name="id_agent[]"
                                            value="{{ $item->id_agent }}"
                                            class="defaultCheckbox relative flex h-[20px] min-h-[20px] w-[20px] min-w-[20px] appearance-none items-center justify-center rounded-md border border-gray-300 text-white/0 outline-none transition duration-[0.2s] checked:text-white hover:cursor-pointer checked:bg-green-600 " />
                                        <label for="{{ $item->id_agent }}" 
                                            class="w-full ml-2 text-sm font-medium text-gray-400 rounded ">
                                            {{ $item->nom_agent }} {{ $item->prenom_agent }}
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="flex items-center justify-center pt-5">
                            <button type="submit"
                                class=" hover:shadow-form inline-flex items-center text-gray-100 bg-green-700 focus:ring-4 font-medium rounded-lg text-sm py-3 px-8 ">
                                envoyer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
