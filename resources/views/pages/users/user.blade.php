<x-app-layout>

    <div class="flex justify-between mb-3">
        <h5 class="text-xl font-bold dark:text-white">Users</h5>
        <x-breadcrumbs :bcLinks="[]" bcActive='Users'></x-breadcrumbs>
    </div>
    
    <div class="w-full p-4 text-center bg-white border border-gray-100 rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">

        <x-nav :navs="[ 'users.index'=>'Users', 'roles.index'=>'Roles', 'permissions.index'=>'Permissions' ]" :activeTab="'Users'"></x-nav>

        <div class="mt-2 text-right">
            <x-button :btnType="'button'" :btnClass="'btn-add-new'" :btnOpenModal="'modalUser'" :btnName="'Add New User'" :btnIcon="'add'" :btnStyle="'dark'" :btnAttrs="['data-action' => route('users.store')]"> </x-button>
        </div>

        <x-table :tableHeader="[ 'No', 'Username', 'Email', 'Active', 'Date Creation', 'Action' ]" :tableElement="['no','name','email','email_verified_at','created_at','action']" :tableData="$users" tableModalId="modalUser" :tableAction="'users'"></x-table>

    </div>

    <x-modal :modalId="'modalUser'" :modalFormAction="'users.store'" :modalTitle="'User'" modalContent='
    <div class="grid gap-4 mb-4 grid-cols-2">
        <div class="col-span-2">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Name" required="">
        </div>
        <div class="col-span-2">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Email" required="">
        </div>
        <div class="col-span-2">
            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
            {!! $form_role !!}
        </div>
        <div class="col-span-2">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Password" required="">
        </div>
    </div>'></x-modal>

    <x-modal-confirmation :modalId="'modalUserConfirmation'" modalContent='
    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
    </svg>
    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this user?</h3>      
'></x-modal-confirmation>

</x-app-layout>