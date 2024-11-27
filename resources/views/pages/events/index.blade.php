<x-app-layout>

    <div class="flex justify-between mb-3">
        <h5 class="text-xl font-bold dark:text-white">Events</h5>
        <x-breadcrumbs :bcLinks="[]" bcActive='Events'></x-breadcrumbs>
    </div>

    <div class="w-full p-4 text-center bg-white border border-gray-100 rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">

        <div class="mt-2 text-right">
            <x-button :btnType="'button'" :btnClass="'btn-href'" :btnName="'Add New Event'" :btnIcon="'add'" :btnStyle="'dark'" :btnAttrs="['data-action' => route('events.create')]"> </x-button>
        </div>

        <x-table :tableHeader="[ 'No', 'Title', 'Name', 'Event Date', 'Group', 'Template', 'Type', 'Demo', 'Date Creation', 'Action' ]" :tableData="$events" :tableElement="['no','title','name','image','event_date','fk_event_group','fk_template','is_demo','created_at','action']" :tableAction="'events'" tableModalId="modalEvent" tableActionEdit="href"></x-table>

    </div>

    <x-modal-confirmation :modalId="'modalEventConfirmation'" modalContent='
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this bank?</h3>      
    '></x-modal-confirmation>

</x-app-layout>