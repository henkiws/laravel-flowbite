<x-app-layout>

    <div class="flex justify-between mb-3">
        <h5 class="text-xl font-bold dark:text-white">Roles</h5>
        <x-breadcrumbs></x-breadcrumbs>
    </div>

    <div class="w-full p-4 text-center bg-white border border-gray-100 rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">

        <x-nav :navs="[ 'user.index'=>'Users', 'role.index'=>'Roles', 'permission.index'=>'Permissions' ]" :activeTab="'Roles'"></x-nav>

        <div class="mt-2 text-right">
            <x-button :btnType="'button'" :btnName="'Add New'" :btnIcon="'add'" :btnStyle="'dark'"> </x-button>
        </div>

        <x-table :tableHeader="[ 'No', 'Role Name', 'Date Creation', 'Action' ]" :tableData="$roles" :tableElement="['no','name','created_at','action']"></x-table>

    </div>
</x-app-layout>