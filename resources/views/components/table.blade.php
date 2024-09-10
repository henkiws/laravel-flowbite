<div class="relative overflow-x-auto shadow-sm sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                @foreach( $tableHeader as $header )
                <th scope="col" class="px-6 py-3">
                    {{ $header }}
                </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse( $tableData as $key_row => $row )
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                @foreach( $tableElement as $el )
                @if( $el == "no" ) 
                    <td class="px-6 py-4">
                        {{ ($key_row + 1) }}
                    </td>
                @elseif( $el == "action" )
                    <td class="flex items-center px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                    </td>
                @else
                    <td class="px-6 py-4">
                        {{ $row->{$el} }}
                    </td>
                @endif
                @endforeach
            </tr>
            @empty
            <tr class="px-6 py-4">
                <td class="text-center" colspan="{{ count($tableElement) }}">No Data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>