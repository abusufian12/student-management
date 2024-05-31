<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <header>
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h2>{{ __("School List") }}</h2>
                            <a href="{{ route('school_list.index') }}" class="btn btn-xs btn-warning float-end">Back</a>
                        </div>
                    </header>

                    <form method="post" action="{{ route('school_list.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="col-md-6 mb-3 mt-3 ml-3">
                                
                                <x-input-label for="school_type_id" :value="__('School Type')" />
                                <!-- <x-text-input id="school_type_id" name="school_type_id" type="text" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('school_type_id')" /> -->
                                
                                @php $school_types = schoolType(); @endphp
                                
                                <select  class="form-select" id="sel2" name="school_type_id">
                                    <option value="">Select School Name</option>
                                    @foreach ($school_types as $key => $school_type) 
                                    <option value="{{ $school_type->id }}">{{ $school_type->school_type }}</option>
                                    @endforeach    
                                </select>
                            </div>

                            <div class="col-md-6 mb-3 mt-3 ml-3">
                                <x-input-label for="school_name" :value="__('School Name')" />
                                <x-text-input id="school_name" name="school_name" type="text" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('school_name')" />
                            </div>
                            <div class="col-md-6 mb-3 mt-3 ml-3">
                                <x-input-label for="school_post_code" :value="__('School Post Code')" />
                                <x-text-input id="school_post_code" name="school_post_code" type="text" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('school_post_code')" />
                            </div>
                            <div class="col-md-6 mb-3 mt-3 ml-3">
                                <x-input-label for="school_ken" :value="__('School Prefecture')" />
                                <x-text-input id="school_ken" name="school_ken" type="text" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('school_ken')" />
                            </div>
                            <div class="col-md-6 mb-3 mt-3 ml-3">
                                <x-input-label for="school_city" :value="__('School City')" />
                                <x-text-input id="school_city" name="school_city" type="text" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('school_city')" />
                            </div>
                            <div class="col-md-6 mb-3 mt-3 ml-3">
                                <x-input-label for="school_address_line_1" :value="__('Address Line 1')" />
                                <x-text-input id="school_address_line_1" name="school_address_line_1" type="text" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('school_address_line_1')" />
                            </div>
                            <div class="col-md-6 mb-3 mt-3 ml-3">
                                <x-input-label for="school_address_line_2" :value="__('Address Line 2')" />
                                <x-text-input id="school_address_line_2" name="school_address_line_2" type="text" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('school_address_line_2')" />
                            </div>

                            <div class="flex items-center gap-4 ml-3  mb-3">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>

                                
                            </div>
                        </div>    
                    </form>
            </div>            
        </div>            
    </div>            

</x-app-layout>
