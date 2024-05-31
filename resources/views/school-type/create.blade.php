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
                            <h2>{{ __("School Type") }}</h2>
                            <a href="{{ route('school_type.index') }}" class="btn btn-xs btn-warning float-end">Back</a>
                        </div>
                    </header>

                    <form method="post" action="{{ route('school_type.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')

                        <div class="col-md-6 mb-3 mt-3 ml-3">
                            <x-input-label for="school_type" :value="__('School Type')" />
                            <x-text-input id="school_type" name="school_type" type="text" class="mt-1 block w-full" required />
                            <x-input-error class="mt-2" :messages="$errors->get('school_type')" />
                            
                        </div>

                        <div class="flex items-center gap-4 ml-3  mb-3">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            
                        </div>
                    </form>
            </div>            
        </div>            
    </div>            

</x-app-layout>
