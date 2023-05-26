@extends('layout.layout')
@section('title', 'services')
@section('content')
    <div class="border-2 rounded-lg shadow-lg bg-white">
        <div class="relative overflow-x-auto shadow-md p-3 ">
            <div class=" px-4 ">
                <h1 class="text-2xl font-bold antialiased pb-3 pt-6 text-green-600 ">Services List</h1>
            </div>
            <div class="w-full flex items-center justify-between p-3 mb-5">
                <div class="relative ">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none ">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="searchInput" placeholder="Rechercher Service"
                        class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-64 focus:ring-blue-500 focus:border-blue-500 outline-none ">
                </div>
                <div>
                    <a href="{{ url('services\create') }}">
                        <button
                            class="inline-flex items-center text-gray-100 bg-green-700 focus:ring-4 font-medium rounded-lg text-sm py-3 px-2 "
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 ml-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="px-2">Ajouter Service</span> </button>
                    </a>
                </div>
            </div>
            <div
                class="w-full grid 2xl:grid-cols-5 xl:grid-cols-4 lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-5 justify-between py-4 px-2 ">
                @foreach ($services as $service)
                    <div id="card-body" class="w-full max-w-sm border border-gray-200 rounded-lg hover:shadow-lg ">
                        <div class="flex justify-end px-4 pt-2">
                            <button id="dropdownButton" data-dropdown-toggle="dropdown"
                                class="inline-block text-gray-500 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg text-sm p-1.5"
                                type="button">
                                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                    </path>
                                </svg>
                            </button>
                            <div id="dropdown"
                                class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-xl w-44">
                                <ul class="py-2" aria-labelledby="dropdownButton">
                                    <li>
                                        <a href="{{ url('/services/' . $service[0]->id_service) . '/edit' }}"
                                            class="block px-4 py-2 text-sm text-green-700 hover:bg-gray-100 ">Modifier</a>
                                    </li>
                                    <li>

                                        <form method="post" action="  {{ url('/services/' . $service[0]->id_service) }} ">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" title="Delete P"
                                                onclick=" return confirm('confirm delete ? ') " type="button"
                                                class="w-full   px-4 py-2 text-sm text-red-600 hover:bg-gray-100 ">
                                                <span class="flex">Supprimer</span>
                                            </button>

                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex flex-col items-center pb-4">
                            <h5 class="text-xl font-medium text-gray-900 mb-2">{{ $service[0]->nom_service }}</h5>

                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="{{ url('/services/' . $service[0]->id_service) }} }}"
                                    class="inline-flex items-center px-4 py-2 text-white border-yellow-700 bg-yellow-500 hover:bg-yellow-400 focus:ring-1 focus:outline-none focus:ring-yellow-500 font-medium rounded-lg text-sm text-center">
                                    View
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        // Get the search input element
        var searchInput = document.getElementById("searchInput");

        // Get all card bodies
        var cardBodies = document.querySelectorAll("#card-body");

        // Add event listener to the search input
        searchInput.addEventListener("keyup", function() {
            // Get the search value and convert it to lowercase
            var searchValue = this.value.toLowerCase();

            // Loop through each card body and hide/show based on search value
            cardBodies.forEach(function(cardBody) {
                // Get the service name element within the card body
                var serviceNameElement = cardBody.querySelector("h5");

                // Get the text content of the service name and convert it to lowercase
                var serviceName = serviceNameElement.textContent.toLowerCase();

                // Check if the search value is found in the service name
                if (serviceName.includes(searchValue)) {
                    // Show the card body if the search value is found
                    cardBody.style.display = "";
                } else {
                    // Hide the card body if the search value is not found
                    cardBody.style.display = "none";
                }
            });
        });
    </script>



@endsection
