@extends('layout.layout')

@section('title', 'état de Stock')

@section('content')
    <div class="border-2 rounded-lg shadow-lg bg-white">

        <div class="relative overflow-x-auto shadow-md  p-3 ">
            <div class=" px-4 ">
                <h1 class="text-2xl font-bold antialiased pb-3 pt-6 text-green-600 ">état de Stock</h1>
            </div>

            <div class="w-full flex items-center justify-between p-3 mb-5">
                <form action="#" method="get">
                    <div class="relative  ">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none ">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="search" id="searchInput" name="rechercher"
                            class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg  w-64 focus:ring-blue-500 focus:border-blue-500 outline-none "
                            placeholder="Rechercher produit">
                    </div>
                </form>
                <div>
                    <a href="#" id="dropdownActionButton" onclick="exportTable()">
                        <button
                            class="inline-flex items-center text-gray-100 bg-green-700 focus:ring-4 font-medium rounded-lg md:text-sm md:py-3 md:px-2 md:w-56  w-30 text-xs py-2 px-1 "
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 ml-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>

                            <span class="px-2">Tableau d'exportation</span>

                        </button>
                    </a>
                </div>
            </div>

            <table id="my-table" class="w-full text-sm text-left text-gray-500 border mb-5 bg-dark">
                <thead class="text-xs text-gray-100 uppercase bg-gray-500 px-4">
                    <tr>
                        <th scope="col" class="px-6 py-3 ">
                            Nom Produit
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Ref
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Date D'Entrée
                        </th>
                        <th scope="col" class="px-4 py-3">
                            quantité initial
                        </th>
                        <th scope="col" class="px-4 py-3">
                            quantité retirée
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Quantité actual
                        </th>
                        <th scope="col" class="px-4 py-3">
                            QUANTITÉ ALERT
                        </th>
                        
                        
                    </tr>
                </thead>
                <tbody>

                    @foreach ($produits as $item)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap ">
                                <div class="text-base font-semibold">
                                    {{ $item->nom_p }}
                                </div>
                            </th>
                            <td class="px-4 py-3">
                                {{ $item->ref_p }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $item->date_enter }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $item->qte_d }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $item->qte_d - $item->qte_p }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $item->qte_p }}
                            </td>
                            @if ($item->qte_p === 0)
                                <td class="flex px-4 py-3 text-red-700">
                                    <h5 class="px-3 py-2 bg-red-600 text-white rounded-full ">
                                        Épuisé
                                    </h5>
                                </td>
                            @elseif ($item->qte_p < 5)
                                <td class="flex px-4 py-3 text-yellow-700">
                                    <h5 class="px-3 py-2 bg-yellow-600 text-white rounded-full ">
                                        Qte limité
                                    </h5>
                                </td>
                            @else
                                <td class="flex px-4 py-3 text-green-700">
                                    <h5 class="px-3 py-2 bg-green-600 text-white rounded-full ">
                                        Disponible
                                    </h5>
                                </td>
                            @endif
                            
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <!-- HTML table -->


    <!-- Script to filter table rows based on search input -->
    <script>
        // Get the search input element
        var searchInput = document.getElementById("searchInput");

        // Add event listener to the search input
        searchInput.addEventListener("keyup", function() {
            // Get the search value and convert it to lowercase
            var searchValue = this.value.toLowerCase();

            // Get all table rows in the tbody
            var rows = document.querySelectorAll("#my-table tbody tr");

            // Loop through each row and hide/show based on search value
            rows.forEach(function(row) {
                // Get the text content of each cell in the row
                var rowData = row.textContent.toLowerCase();

                // Check if the search value is found in the row data
                if (rowData.includes(searchValue)) {
                    // Show the row if the search value is found
                    row.style.display = "";
                } else {
                    // Hide the row if the search value is not found
                    row.style.display = "none";
                }
            });
        });
    </script>


    <!-- Export button -->

    <script>
        function exportTable() {
            var table = document.getElementById("my-table");
            var filteredRows = Array.from(table.querySelectorAll("tbody tr:not([style='display: none;'])")); // Get filtered rows
    
            // Create a new table element to hold the filtered data
            var filteredTable = document.createElement("table");
    
            // Copy the table head
            var tableHead = table.querySelector("thead").cloneNode(true);
            filteredTable.appendChild(tableHead);
    
            // Copy the filtered rows
            var tbody = document.createElement("tbody");
            filteredRows.forEach(function(row) {
                tbody.appendChild(row.cloneNode(true));
            });
            filteredTable.appendChild(tbody);
    
            var workbook = XLSX.utils.table_to_book(filteredTable);
    
            // Export the workbook to Excel file format
            var wbout = XLSX.write(workbook, {
                bookType: "xls",
                type: "array"
            });
    
            // Create a new Blob object from the workbook data
            var blob = new Blob([wbout], {
                type: "application/vnd.ms-excel"
            });
    
            // Create a new anchor element for download
            var anchor = document.createElement("a");
            anchor.href = window.URL.createObjectURL(blob);
            anchor.download = "table-data.xls";
    
            // Trigger a click event on the anchor element to download the file
            anchor.click();
        }
    </script>
    

    
@endsection
