<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2>{{ __("School List") }}</h2>
                    <a href="{{ route('school_list.create') }}" class="btn btn-xs btn-primary float-end">Add School</a>
                </div>

                <div class="container mt-3">
                <form method="get" action="/school_list/school_search">
                    <div class="row">
                        <div class="col-md-3">
                                <label for="sel2" class="form-label">School Type:</label>
                                @php $school_types = schoolType(); @endphp
                                <select  class="form-select" id="sel2" name="school_type_id">
                                    @php if(!isset($school_type_id)) $school_type_id = ''; @endphp
                                    @if(!empty(schoolTypeName($school_type_id)))
                                    <option value="{{ $school_type_id }}">{{ schoolTypeName($school_type_id)->school_type }}</option>
                                    @endif
                                    <option value="">---Select---</option>
                                    @foreach ($school_types as $key => $school_type) 
                                    <option value="{{ $school_type->id }}">{{ $school_type->school_type }}</option>
                                    @endforeach    
                                </select>
                            </div>    
                            <!-- <div class="col-md-3">
                                <label for="sel2" class="form-label">School:</label>
                                <x-text-input id="school_city" name="school_city" type="text" class="mt-1 block w-full" />
                            </div> -->
                        
                        <div class="col-md-3"><br>
                            <button class="btn btn-success">Search</button>
                        </div>
                    </div>
                </form>    
                    <hr class="mt-3">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>S/L</th>
                            <th>School Type</th>
                            <th>School Name</th>
                            <th>School Post Code</th>
                            <th>School Prefecture</th>
                            <th>School City</th>
                            <th>School Address</th>
                            <th>Status</th>
                            <td>Action</td>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $n=1; //dd($school_type); die; ?>
                        @foreach ($school_list as $data)
                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{ schoolTypeName($data->school_type_id)->school_type }}</td>
                                <td>{{ $data->school_name }}</td>
                                <td>{{ $data->school_post_code }}</td>
                                <td>{{ $data->school_ken }}</td>
                                <td>{{ $data->school_city }}</td>
                                <td>{{ $data->school_address_line_1 }} {{ $data->school_address_line_2 }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td style="width:120px !important">
                                    <!-- <button type="button" class="btn btn-info">Edit</button> -->
                                    <a href="{{ route('school_list.edit', $data->id) }}" class="btn btn-xs btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <!-- <button type="button" class="btn btn-info">View</button> -->
                                    <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
