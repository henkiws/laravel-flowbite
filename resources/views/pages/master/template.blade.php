<x-app-layout>

    <div class="flex justify-between mb-3">
        <h5 class="text-xl font-bold dark:text-white">Template</h5>
        <x-breadcrumbs :bcLinks="['Master']" bcActive='Template'></x-breadcrumbs>
    </div>

    <div class="w-full p-4 text-center bg-white border border-gray-100 rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">

        <div class="mt-2 text-right">
            <x-button :btnType="'button'" :btnClass="'btn-add-new'" :btnOpenModal="'modalTemplate'" :btnName="'Add New Template'" :btnIcon="'add'" :btnStyle="'dark'" :btnAttrs="['data-action' => route('templates.store')]"> </x-button>
        </div>

        <x-table :tableHeader="[ 'No', 'Template Name', 'Description', 'Image', 'Active', 'Date Creation', 'Action' ]" :tableData="$templates" :tableElement="['no','name','description','image','active','created_at','action']" :tableAction="'templates'" tableModalId="modalTemplate"></x-table>

    </div>

    <x-modal :modalId="'modalTemplate'" :modalFormAction="'templates.store'" :modalTitle="'Template'" modalContent='
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Template Name" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea name="description" id="description" class="form-control w-full p-2.5" rows="3" placeholder="Default Input"></textarea>
                        </div>
                        <div class="col-span-2">
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                            <input type="file" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Image" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Active</label>
                            <select name="active" id="active" class="form-control w-full mt-2">
                                <option value="1" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Yes</option>
                                <option value="0" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">No</option>
                            </select>
                        </div>
                    </div>'></x-modal>

    <x-modal-confirmation :modalId="'modalTemplateConfirmation'" modalContent='
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this bank?</h3>      
    '></x-modal-confirmation>

</x-app-layout>