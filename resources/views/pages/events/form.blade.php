<x-app-layout>

    <div class="flex justify-between mb-3">
        <h5 class="text-xl font-bold dark:text-white">Event Details</h5>
        <x-breadcrumbs :bcLinks="['Events']" bcActive='Details'></x-breadcrumbs>
    </div>

    <div class="w-full p-4 bg-white border border-gray-100 rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">

        <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">
            <div class="bg-white dark:bg-gray-800"> 
                <ol class="space-y-4">
                    <li>
                        <div class="w-full p-4 step-event cursor-pointer text-green-700 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:border-green-800 dark:text-green-400" role="alert" data-to="general_info">
                            <div class="flex items-center justify-between">
                                <span class="sr-only">General info</span>
                                <h3 class="font-medium">General Info</h3>
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                </svg>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w-full p-4 step-event cursor-pointer text-green-700 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:border-green-800 dark:text-green-400" role="alert" data-to="cover_image">
                            <div class="flex items-center justify-between">
                                <span class="sr-only">Cover Image</span>
                                <h3 class="font-medium">Cover Image</h3>
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                </svg>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w-full p-4 step-event cursor-pointer text-blue-700 bg-blue-100 border border-blue-300 rounded-lg dark:bg-gray-800 dark:border-blue-800 dark:text-blue-400" role="alert" data-to="groom_bride">
                            <div class="flex items-center justify-between">
                                <span class="sr-only">Groom & Bride</span>
                                <h3 class="font-medium">Groom & Bride</h3>
                                <svg class="rtl:rotate-180 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w-full p-4 step-event cursor-pointer text-gray-900 bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" role="alert" data-to="events">
                            <div class="flex items-center justify-between">
                                <span class="sr-only">Events</span>
                                <h3 class="font-medium">Events</h3>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w-full p-4 step-event cursor-pointer text-gray-900 bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" role="alert" data-to="gallery">
                            <div class="flex items-center justify-between">
                                <span class="sr-only">Gallery</span>
                                <h3 class="font-medium">Gallery</h3>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w-full p-4 step-event cursor-pointer text-gray-900 bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" role="alert" data-to="love_story">
                            <div class="flex items-center justify-between">
                                <span class="sr-only">Love Story</span>
                                <h3 class="font-medium">Love Story</h3>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w-full p-4 step-event cursor-pointer text-gray-900 bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" role="alert" data-to="gifts">
                            <div class="flex items-center justify-between">
                                <span class="sr-only">Gifts</span>
                                <h3 class="font-medium">Gifts</h3>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w-full p-4 step-event cursor-pointer text-gray-900 bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" role="alert" data-to="background_sound">
                            <div class="flex items-center justify-between">
                                <span class="sr-only">Background Sound</span>
                                <h3 class="font-medium">Background Sound</h3>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w-full p-4 step-event cursor-pointer text-gray-900 bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" role="alert" data-to="invites">
                            <div class="flex items-center justify-between">
                                <span class="sr-only">Invites</span>
                                <h3 class="font-medium">Invites</h3>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w-full p-4 step-event cursor-pointer text-gray-900 bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" role="alert" data-to="confirmation">
                            <div class="flex items-center justify-between">
                                <span class="sr-only">Confirmation</span>
                                <h3 class="font-medium">Confirmation</h3>
                            </div>
                        </div>
                    </li>
                </ol>
            </div>
            
            <div class="col-span-2 step-content" id="general_info">
                <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <form action="#">
                        @csrf
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                <input type="text" name="title" id="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Title" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="e.g. San Francisco" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="initial_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Initial Name</label>
                                <input type="text" name="initial_name" id="initial_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="e.g. California" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="organization" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quotes</label>
                                <textarea id="quotes" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter event quotes here"></textarea>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="event_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event Date</label>
                                <input type="date" name="event_date" id="event_date" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="React Developer" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Show Prokes</label>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="" class="sr-only peer" checked>
                                    <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                </label>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event Type</label>
                                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Choose a country</option>
                                    <option value="US">United States</option>
                                    <option value="CA">Canada</option>
                                    <option value="FR">France</option>
                                    <option value="DE">Germany</option>
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Theme</label>
                                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Choose a country</option>
                                    <option value="US">United States</option>
                                    <option value="CA">Canada</option>
                                    <option value="FR">France</option>
                                    <option value="DE">Germany</option>
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-full text-right">
                                <x-button :btnType="'submit'" :btnClass="'btn-href'" :btnName="'Save'" :btnIcon="'save'" :btnStyle="'dark'" :btnAttrs="['data-action' => route('events.create')]"> </x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-span-2 step-content hidden" id="cover_image">
                <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <form action="#">
                        @csrf
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                                <input type="text" name="first-name" id="first-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Bonnie" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="last-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                                <input type="text" name="last-name" id="last-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Green" required="">
                            </div>
                            <div class="col-span-6 sm:col-full text-right">
                                <x-button :btnType="'button'" :btnClass="'btn-href'" :btnName="'Save'" :btnIcon="'add'" :btnStyle="'dark'" :btnAttrs="['data-action' => route('events.create')]"> </x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>


    </div>

</x-app-layout>