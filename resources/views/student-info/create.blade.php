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
                            <h2 style="font-size 35px !important;">Student Information</h2>
                            <a href="{{ route('student_info.index') }}" class="btn btn-xs btn-warning float-end">Back</a>
                            <!-- <a href="{{ route('student_info.index') }}" class="btn btn-xs btn-primary float-end ms-2 mr-1">Upload Resume</a>&nbsp;&nbsp;&nbsp; -->
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary float-end ms-2 mr-1" data-bs-toggle="modal" data-bs-target="#myModal">
                            Upload Resume
                            </button>
                        </div>

                    </header>

                    <form method="post" action="{{ route('student_info.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="col-md-6 mb-3 mt-3 ml-3">
                                <x-input-label for="school_type_id" :value="__('School Type')" />
                                <select  class="form-select" id="sel2" name="school_type_id">
                                @php $school_types = schoolType(); @endphp
                                
                                <option value="">Select School Type</option>
                                @foreach ($school_types as $key => $school_type) 
                                <option value="{{ $school_type->id }}">{{ $school_type->school_type }}</option>
                                @endforeach    
                            </select>
                            </div>
                            <div class="col-md-6 mb-3 mt-3 ml-3">
                                <x-input-label for="school_name_id" :value="__('School Name')" />
                                <!-- <x-text-input id="school_name_id" name="school_name_id" type="text" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('school_name_id')" /> -->
                                <select  class="form-select" id="sel2" name="school_name_id">
                                    @php $school_list = schoolList(); @endphp
                                    
                                    <option>Select School Name</option>
                                    @foreach ($school_list as $key => $school) 
                                    <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                                    @endforeach 
                                </select>
                            </div>

                            <div class="col-md-6 mb-3 mt-3 ml-3">
                                <x-input-label for="student_name" :value="__('Student Name')" />
                                <x-text-input id="student_name" name="student_name" type="text" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('student_name')" />
                            </div>
                            <div class="col-md-6 mb-3 mt-3 ml-3">
                                <x-input-label for="student_gender" :value="__('Gender')" />
                                <!-- <x-text-input id="student_gender" name="student_gender" type="text" class="mt-1 block w-full" required /> -->

                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="radio1" name="student_gender" value="Male" checked>
                                    <label class="form-check-label" for="radio1">Male</label>
                                    </div>
                                    <div class="form-check">
                                    <input type="radio" class="form-check-input" id="radio2" name="student_gender" value="Female">
                                    <label class="form-check-label" for="radio2">Female</label>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('student_gender')" />
                                    
                                <!-- <select name="gender"  id="gender" >
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                </select> -->
                            </div>
                            <div class="col-md-6 mb-3 mt-3 ml-3">
                                <x-input-label for="student_contact_number" :value="__('Contact Number')" />
                                <x-text-input id="student_contact_number" name="student_contact_number" type="text" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('student_contact_number')" />
                            </div>
                            <div class="col-md-6 mb-3 mt-3 ml-3">
                                <x-input-label for="student_graduation" :value="__('Graduation')" />
                                <x-text-input id="student_graduation" name="student_graduation" type="text" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('student_graduation')" />
                            </div>
                            <div class="col-md-6 mb-3 mt-3 ml-3">
                                <x-input-label for="student_fb_id" :value="__('Facebook ID')" />
                                <x-text-input id="student_fb_id" name="student_fb_id" type="text" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('student_fb_id')" />
                            </div>
                            <div class="col-md-6 mb-3 mt-3 ml-3">
                                <x-input-label for="student_country" :value="__('Country')" />
                                <x-text-input id="student_country" name="student_country" type="text" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('student_country')" />
                            </div>
                            <div class="col-md-6 mb-3 mt-3 ml-3">
                                <x-input-label for="student_apartment" :value="__('Apartment')" />
                                <x-text-input id="student_apartment" name="student_apartment" type="text" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('student_apartment')" />
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


    <!-- Resume Upload -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Upload Resume</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <form action="/student_info/upload_resume" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label for="fileUpload" class="form-label">Choose File</label>
                    <input type="file" class="form-control" id="fileUpload" name="fileUpload">
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
    </div>
</x-app-layout>
