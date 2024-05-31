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

                    <form method="post" action="/school_list/update/{{$school_list->id}}" class="mt-6 space-y-6">
                        @csrf
                    
                        <div class="col-md-6 mb-3 mt-3 ml-3">
                            <x-input-label for="school_type_id" :value="__('School Type')" />
                            <!-- <x-text-input id="school_type_id" name="school_type_id" type="text" class="mt-1 block w-full" :value="old('school_type_id', $school_list->school_type_id)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('school_type_id')" /> -->

                            <select  class="form-select" id="sel2" name="school_type_id">
                                @php $school_types = schoolType(); @endphp
                                
                                <!-- <option value="">Select School Type</option> -->
                                <option value="{{ $school_list->school_type_id }}">{{ schoolTypeName($school_list->school_type_id)->school_type }}</option>
                                @foreach ($school_types as $key => $school_type) 
                                <option value="{{ $school_type->id }}">{{ $school_type->school_type }}</option>
                                @endforeach    
                            </select>
                        </div>

                        <div class="col-md-6 mb-3 mt-3 ml-3">
                            <x-input-label for="school_name" :value="__('School Name')" />
                            <x-text-input id="school_name" name="school_name" type="text" class="mt-1 block w-full" :value="old('school_name', $school_list->school_name)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('school_name')" />
                        </div>
                        <div class="col-md-6 mb-3 mt-3 ml-3">
                            <x-input-label for="school_post_code" :value="__('School Post Code')" />
                            <x-text-input id="school_post_code" name="school_post_code" type="text" class="mt-1 block w-full" :value="old('school_post_code', $school_list->school_post_code)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('school_post_code')" />
                        </div>
                        <div class="col-md-6 mb-3 mt-3 ml-3">
                            <x-input-label for="school_ken" :value="__('School Prefecture')" />
                            <x-text-input id="school_ken" name="school_ken" type="text" class="mt-1 block w-full" :value="old('school_ken', $school_list->school_ken)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('school_ken')" />
                        </div>
                        <div class="col-md-6 mb-3 mt-3 ml-3">
                            <x-input-label for="school_city" :value="__('School City')" />
                            <x-text-input id="school_city" name="school_city" type="text" class="mt-1 block w-full" :value="old('school_city', $school_list->school_city)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('school_city')" />
                        </div>
                        <div class="col-md-6 mb-3 mt-3 ml-3">
                            <x-input-label for="school_address_line_1" :value="__('Address Line 1')" />
                            <x-text-input id="school_address_line_1" name="school_address_line_1" type="text" class="mt-1 block w-full" :value="old('school_address_line_1', $school_list->school_address_line_1)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('school_address_line_1')" />
                        </div>
                        <div class="col-md-6 mb-3 mt-3 ml-3">
                            <x-input-label for="school_address_line_2" :value="__('Address Line 2')" />
                            <x-text-input id="school_address_line_2" name="school_address_line_2" type="text" class="mt-1 block w-full" :value="old('school_address_line_2', $school_list->school_address_line_2)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('school_address_line_2')" />
                        </div>

                        <div class="flex items-center gap-4 ml-3  mb-3">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
            </div>            
        </div>            
    </div>            

</x-app-layout>
