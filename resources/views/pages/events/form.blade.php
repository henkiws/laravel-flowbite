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
                        <div class="w-full p-4 step-event text-green-700 bg-green-100 border border-green-300 rounded-lg dark:bg-gray-800 dark:border-green-800 dark:text-green-400" role="alert" data-to="general_info">
                            <div class="flex items-center justify-between">
                                <span class="sr-only">General info</span>
                                <h3 class="font-medium">General Info</h3>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w-full p-4 step-event text-gray-900 bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" role="alert" data-to="cover_image">
                            <div class="flex items-center justify-between">
                                <span class="sr-only">Cover Image</span>
                                <h3 class="font-medium">Cover Image</h3>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w-full p-4 step-event text-gray-900 bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" role="alert" data-to="groom_bride">
                            <div class="flex items-center justify-between">
                                <span class="sr-only">Groom & Bride</span>
                                <h3 class="font-medium">Groom & Bride</h3>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w-full p-4 step-event text-gray-900 bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" role="alert" data-to="events">
                            <div class="flex items-center justify-between">
                                <span class="sr-only">Events</span>
                                <h3 class="font-medium">Events</h3>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w-full p-4 step-event text-gray-900 bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" role="alert" data-to="gallery">
                            <div class="flex items-center justify-between">
                                <span class="sr-only">Gallery</span>
                                <h3 class="font-medium">Gallery</h3>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w-full p-4 step-event text-gray-900 bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" role="alert" data-to="love_story">
                            <div class="flex items-center justify-between">
                                <span class="sr-only">Love Story</span>
                                <h3 class="font-medium">Love Story</h3>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w-full p-4 step-event text-gray-900 bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" role="alert" data-to="gifts">
                            <div class="flex items-center justify-between">
                                <span class="sr-only">Gifts</span>
                                <h3 class="font-medium">Gifts</h3>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w-full p-4 step-event text-gray-900 bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" role="alert" data-to="invites">
                            <div class="flex items-center justify-between">
                                <span class="sr-only">Invites</span>
                                <h3 class="font-medium">Invites</h3>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w-full p-4 step-event text-gray-900 bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" role="alert" data-to="confirmation">
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
                    <form id="form_general_info" action="{{ isset($event->id) ? route('events.update',[$event->id]) : route('events.store') }}" method="POST">
                        @csrf
                        @isset($event->id)
                        @method('put')
                        @endisset
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                <input type="text" name="title" id="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Title" required="" value="{{ !empty(old('title')) ? old('title') : (isset($event->title) ? $event->title : '' ) }}">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="e.g. San Francisco" required="" value="{{ !empty(old('name')) ? old('name') : (isset($event->name) ? $event->name : '' ) }}">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="initial_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Initial Name</label>
                                <input type="text" name="initial_name" id="initial_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="e.g. California" required="" value="{{ !empty(old('initial_name')) ? old('initial_name') : (isset($event->initial_name) ? $event->initial_name : '' ) }}">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="organization" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quotes</label>
                                <textarea id="quotes" name="quotes" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter event quotes here">{{ !empty(old('quotes')) ? old('quotes') : (isset($event->quotes) ? $event->quotes : '' ) }}</textarea>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="event_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event Date</label>
                                <input type="date" name="event_date" id="event_date" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="event_date" required="" value="{{ !empty(old('event_date')) ? old('event_date') : (isset($event->event_date) ? \Carbon\Carbon::parse($event->event_date)->format('Y-m-d') : '' ) }}">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Show Prokes</label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="1" name="show_prokes" class="sr-only peer" {{ !empty(old('show_prokes')) ? (old('show_prokes') == 1 ? "checked" : "") : (isset($event->show_prokes) ? ($event->show_prokes == 1 ? "checked" : "") : '' ) }}>
                                    <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                </label>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event Type</label>
                                {!! $form_event_type !!}
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Theme</label>
                                {!! $form_event_template !!}
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Background Music</label>
                                {!! $form_event_music !!}
                            </div>
                            <div class="col-span-6 sm:col-full text-right">
                                <x-button :btnType="'button'" :btnClass="'btn-step'" :btnName="'Next'" :btnIcon="'next'" :btnStyle="'dark'" :btnAttrs="['data-target' => 'cover_image', 'data-action' => 'next', 'data-form' => 'form_general_info']"> </x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-span-2 step-content hidden" id="cover_image">
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 mb-4">
                    <form action="#" method="POST" id="form_cover_image">
                        @csrf
                        <div class="grid grid-cols-4 xl:grid-cols-4 xl:gap-1 dark:bg-gray-900 cover-image">
                            <div class="col-span-1">
                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 box-add-new" data-target="cover_image_file[]" data-prepend="cover-image">
                                        <div class="flex flex-col items-center justify-center pt-6 pb-6">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Choose Files</p>
                                        </div>
                                    </label>
                                    <input type="file" name="cover_image_file[]" multiple class="hidden" accept="image/*">
                                </div> 
                            </div>
                            <div class="col-span-6 sm:col-full text-right">
                                <x-button :btnType="'button'" :btnClass="'btn-step'" :btnName="'Back'" :btnIcon="'back'" :btnStyle="'dark'" :btnAttrs="['data-target' => 'general_info', 'data-action' => 'back', 'data-form' => 'form_cover_image']"> </x-button>
                                <x-button :btnType="'button'" :btnClass="'btn-step'" :btnName="'Next'" :btnIcon="'next'" :btnStyle="'dark'" :btnAttrs="['data-target' => 'groom_bride', 'data-action' => 'next', 'data-form' => 'form_cover_image']"> </x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-span-2 step-content hidden" id="groom_bride">
                <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <form action="#" id="form_groom_bride">
                        @csrf
                        <h5 class="text-xl font-bold dark:text-white">Groom</h5>
                        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="groom_fullname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fullname</label>
                                <input type="text" name="groom_fullname" id="groom_fullname" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Title" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="groom_nickname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nickname</label>
                                <input type="text" name="groom_nickname" id="groom_nickname" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="e.g. San Francisco" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="groom_photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo</label>
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="groom_photo" type="file">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="groom_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                <textarea name="groom_address" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter event quotes here"></textarea>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="groom_child" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Child</label>
                                <input type="text" name="groom_child" id="groom_child" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="React Developer" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="groom_father" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Father Name</label>
                                <input type="text" name="groom_father" id="groom_father" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="React Developer" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="groom_mother" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mother Name</label>
                                <input type="text" name="groom_mother" id="groom_mother" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="React Developer" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="groom_instagram" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram</label>
                                <input type="text" name="groom_instagram" id="groom_instagram" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="React Developer" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="groom_facebook" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook</label>
                                <input type="text" name="groom_facebook" id="groom_facebook" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="React Developer" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="groom_twitter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Twitter</label>
                                <input type="text" name="groom_twitter" id="groom_twitter" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="React Developer" required="">
                            </div>
                        </div>

                        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                        <h5 class="text-xl font-bold dark:text-white">Bride</h5>
                        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="bride_fullname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fullname</label>
                                <input type="text" name="bride_fullname" id="bride_fullname" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Title" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="bride_nickname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nickname</label>
                                <input type="text" name="bride_nickname" id="bride_nickname" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="e.g. San Francisco" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="bride_photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo</label>
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="bride_photo" type="file">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="bride_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                <textarea name="bride_address" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter event quotes here"></textarea>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="bride_child" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Child</label>
                                <input type="text" name="bride_child" id="bride_child" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="React Developer" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="bride_father" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Father Name</label>
                                <input type="text" name="bride_father" id="bride_father" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="React Developer" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="bride_mother" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mother Name</label>
                                <input type="text" name="bride_mother" id="bride_mother" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="React Developer" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="bride_instagram" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram</label>
                                <input type="text" name="bride_instagram" id="bride_instagram" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="React Developer" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="bride_facebook" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook</label>
                                <input type="text" name="bride_facebook" id="bride_facebook" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="React Developer" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="bride_twitter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Twitter</label>
                                <input type="text" name="bride_twitter" id="bride_twitter" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="React Developer" required="">
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-full text-right">
                            <x-button :btnType="'button'" :btnClass="'btn-step'" :btnName="'Back'" :btnIcon="'back'" :btnStyle="'dark'" :btnAttrs="['data-target' => 'cover_image', 'data-action' => 'back', 'data-form' => 'form_groom_bride']"> </x-button>
                            <x-button :btnType="'button'" :btnClass="'btn-step'" :btnName="'Next'" :btnIcon="'next'" :btnStyle="'dark'" :btnAttrs="['data-target' => 'events', 'data-action' => 'next', 'data-form' => 'form_groom_bride']"> </x-button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-span-2 step-content hidden" id="events">
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 mb-4">
                    <form id="form_events">
                        @csrf
                        <div class="grid grid-cols-1 xl:grid-cols-4 xl:gap-1 dark:bg-gray-900">
                            <div class="col-span-1">
                                <div class="relative items-center justify-center w-full">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="pt-5 pb-6">
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Name</span></p>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Location Name</span></p>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Date</p>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Day, time</p>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Addess</p>
                                        </div>
                                    </label>
                                    <div class="absolute flex top-0 right-0 py-3 h-20 w-20">
                                        <button type="button" class="w-9 h-9 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100  focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 dark:bg-gray-800">
                                            <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
                                                <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                        <button type="button" class="w-9 h-9 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100  focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 dark:bg-gray-800">
                                            <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div> 
                            </div>

                            <div class="col-span-1">
                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-6 pb-6">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                        </div>
                                    </label>
                                </div> 
                            </div>

                            <div class="col-span-6 sm:col-full text-right">
                                <x-button :btnType="'button'" :btnClass="'btn-step'" :btnName="'Back'" :btnIcon="'back'" :btnStyle="'dark'" :btnAttrs="['data-target' => 'groom_bride', 'data-action' => 'back', 'data-form' => 'form_events']"> </x-button>
                                <x-button :btnType="'button'" :btnClass="'btn-step'" :btnName="'Next'" :btnIcon="'next'" :btnStyle="'dark'" :btnAttrs="['data-target' => 'gallery', 'data-action' => 'next', 'data-form' => 'form_events']"> </x-button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="col-span-2 step-content hidden" id="gallery">
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 mb-4">
                    <form id="form_gallery">
                        @csrf
                        <div class="grid grid-cols-4 xl:grid-cols-4 xl:gap-1 dark:bg-gray-900 tab-gallery">
                            <div class="col-span-1">
                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 box-add-new" data-target="gallery_file[]" data-prepend="tab-gallery">
                                        <div class="flex flex-col items-center justify-center pt-6 pb-6">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Choose Files</p>
                                        </div>
                                    </label>
                                    <input type="file" name="gallery_file[]" multiple class="hidden" accept="image/*">
                                </div> 
                            </div>
                            <div class="col-span-6 sm:col-full text-right">
                                <x-button :btnType="'button'" :btnClass="'btn-step'" :btnName="'Back'" :btnIcon="'back'" :btnStyle="'dark'" :btnAttrs="['data-target' => 'events', 'data-action' => 'back', 'data-form' => 'form_gallery']"> </x-button>
                                <x-button :btnType="'button'" :btnClass="'btn-step'" :btnName="'Next'" :btnIcon="'next'" :btnStyle="'dark'" :btnAttrs="['data-target' => 'love_story', 'data-action' => 'next', 'data-form' => 'form_gallery']"> </x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-span-2 step-content hidden" id="love_story">
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 mb-4">
                    <form id="form_love_story">
                        @csrf
                        <div class="grid grid-cols-1 xl:grid-cols-4 xl:gap-1 dark:bg-gray-900">
                            <div class="col-span-1">
                                <div class="relative items-center justify-center w-full">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="pt-5 pb-6">
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Name</span></p>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Location Name</span></p>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Date</p>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Day, time</p>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Addess</p>
                                        </div>
                                    </label>
                                    <div class="absolute flex top-0 right-0 py-3 h-20 w-20">
                                        <button type="button" class="w-9 h-9 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100  focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 dark:bg-gray-800">
                                            <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
                                                <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                        <button type="button" class="w-9 h-9 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100  focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 dark:bg-gray-800">
                                            <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div> 
                            </div>

                            <div class="col-span-1">
                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-6 pb-6">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                        </div>
                                    </label>
                                </div> 
                            </div>

                            <div class="col-span-6 sm:col-full text-right">
                                <x-button :btnType="'button'" :btnClass="'btn-step'" :btnName="'Back'" :btnIcon="'back'" :btnStyle="'dark'" :btnAttrs="['data-target' => 'gallery', 'data-action' => 'back', 'data-form' => 'form_events']"> </x-button>
                                <x-button :btnType="'button'" :btnClass="'btn-step'" :btnName="'Next'" :btnIcon="'next'" :btnStyle="'dark'" :btnAttrs="['data-target' => 'gifts', 'data-action' => 'next', 'data-form' => 'form_events']"> </x-button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="col-span-2 step-content hidden" id="gifts">
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 mb-4">
                    <form id="form_gifts">
                        @csrf
                        <div class="grid grid-cols-4 xl:grid-cols-4 xl:gap-1 dark:bg-gray-900">
                            <div class="col-span-1">
                                <div class="relative items-center justify-center w-full">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="pt-5 pb-6">
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Name</span></p>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Location Name</span></p>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Date</p>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Day, time</p>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Addess</p>
                                        </div>
                                    </label>
                                    <div class="absolute flex top-0 right-0 py-3 h-20 w-20">
                                        <button type="button" class="w-9 h-9 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100  focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 dark:bg-gray-800">
                                            <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
                                                <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                        <button type="button" class="w-9 h-9 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100  focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 dark:bg-gray-800">
                                            <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div> 
                            </div>

                            <div class="col-span-1">
                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-6 pb-6">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                        </div>
                                    </label>
                                </div> 
                            </div>

                            <div class="col-span-6 sm:col-full text-right">
                                <x-button :btnType="'button'" :btnClass="'btn-step'" :btnName="'Back'" :btnIcon="'back'" :btnStyle="'dark'" :btnAttrs="['data-target' => 'love_story', 'data-action' => 'back', 'data-form' => 'form_gifts']"> </x-button>
                                <x-button :btnType="'button'" :btnClass="'btn-step'" :btnName="'Next'" :btnIcon="'next'" :btnStyle="'dark'" :btnAttrs="['data-target' => 'invites', 'data-action' => 'next', 'data-form' => 'form_gifts']"> </x-button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="col-span-2 step-content hidden" id="invites">
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 mb-4">
                    <form id="form_invites">
                        @csrf
                        <div class="grid grid-cols-4 xl:grid-cols-4 xl:gap-1 dark:bg-gray-900">
                            <div class="col-span-1">
                                <div class="relative items-center justify-center w-full">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="pt-5 pb-6">
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Name</span></p>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Location Name</span></p>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Date</p>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Day, time</p>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Addess</p>
                                        </div>
                                    </label>
                                    <div class="absolute flex top-0 right-0 py-3 h-20 w-20">
                                        <button type="button" class="w-9 h-9 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100  focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 dark:bg-gray-800">
                                            <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
                                                <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                        <button type="button" class="w-9 h-9 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100  focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 dark:bg-gray-800">
                                            <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div> 
                            </div>

                            <div class="col-span-1">
                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-6 pb-6">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                        </div>
                                    </label>
                                </div> 
                            </div>

                            <div class="col-span-6 sm:col-full text-right">
                                <x-button :btnType="'button'" :btnClass="'btn-step'" :btnName="'Back'" :btnIcon="'back'" :btnStyle="'dark'" :btnAttrs="['data-target' => 'gifts', 'data-action' => 'back', 'data-form' => 'form_invites']"> </x-button>
                                <x-button :btnType="'button'" :btnClass="'btn-step'" :btnName="'Next'" :btnIcon="'next'" :btnStyle="'dark'" :btnAttrs="['data-target' => 'confirmation', 'data-action' => 'next', 'data-form' => 'form_invites']"> </x-button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="col-span-2 step-content hidden" id="confirmation">
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 mb-4">
                    <form id="form_confirmation">
                        @csrf
                        <div class="grid grid-cols-4 xl:grid-cols-4 xl:gap-1 dark:bg-gray-900">
                            <div class="col-span-6 sm:col-full text-right">
                                <x-button :btnType="'button'" :btnClass="'btn-step'" :btnName="'Back'" :btnIcon="'back'" :btnStyle="'dark'" :btnAttrs="['data-target' => 'invites', 'data-action' => 'back', 'data-form' => 'form_confirmation']"> </x-button>
                                <x-button :btnType="'button'" :btnClass="'btn-step'" :btnName="'Finish'" :btnIcon="'save'" :btnStyle="'dark'" :btnAttrs="['data-target' => '#', 'data-action' => 'confirmation', 'data-form' => 'form_confirmation']"> </x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>


    </div>

</x-app-layout>