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
                <a href="{{ route('student_info.create') }}" class="btn btn-xs btn-primary float-end">Add Student</a>
                    <h2>GLOBAL PLUS</h2>
                    <p>Students List for Global Plus</p>
                </div>


                <div class="container mt-3">
                    
                    <form method="get" action="/student_info/student_search">
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
                        <div class="col-md-3">
                                <label for="sel2" class="form-label">School:</label>
                                @php $school_list = schoolList(); @endphp
                                
                                <select  class="form-select" id="sel2" name="school_name_id">
                                    @php if(!isset($school_name_id)) $school_name_id = ''; @endphp
                                    @if(!empty(schoolName($school_name_id)))
                                    <option value="{{ $school_name_id }}">{{ schoolName($school_name_id)->school_name }}</option>
                                    @endif
                                    <option value="">---Select---</option>
                                    @foreach ($school_list as $key => $school) 
                                    <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                                    @endforeach 
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="sel2" class="form-label">Year:</label>
                                <select id="year" name="year" class="form-control ">
                                    {{ $last= date('Y')-30 }}
                                    {{ $now = date('Y') }}
                                    @php if(!isset($year)) $year = ''; @endphp
                                    @if(!empty($year))
                                    <option value="{{ $year }}">{{ $year }}</option>
                                    @endif
                                    <option value="">---Select Year---</option>
                                    @for ($i = $now; $i >= $last; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-2">
                            <label for="sel2" class="form-label">Session:</label>
                            <select  class="form-select" id="sel2" name="session">
                                @php if(!isset($session)) $session = ''; @endphp
                                @if(!empty($session))
                                <option value="{{ $session }}">{{ $session }}</option>
                                @endif
                                <option value="">---Select Session---</option>
                                <option>April</option>
                                <option>July</option>
                                <option>October</option>
                                <option>January</option>
                            </select>
                            
                            </div>
                            <div class="col-md-2"><br>
                                <button class="btn btn-success">Search</button>
                            </div>
                        </div>
                    </form>
    
                        <div class="row">
                            <div class="coll-md-12">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>S/L</th>
                                        <th>Name</th>
                                        <th>Country</th>
                                        <th>School Type</th>
                                        <th>School Name</th>
                                        <th>Apartment</th>
                                        <!-- <th>Gender</th> -->
                                        <th>Contact</th>
                                        <th>Note</th>
                                        <th>Social Link</th>
                                        <th>Resume</th>
                                        <th>Action</th>
                                    
                                    </tr>
                                    <?php $n=1; //dd($school_type); die; ?>
                                    @foreach ($student_info as $data)
                                        <tr>
                                            <td>{{ $n++ }}</td>
                                            <td>{{ $data->student_name }}</td>
                                            <td>{{ $data->student_country }}</td>
                                            <td>{{ schoolTypeName($data->school_type_id)->school_type }}</td>
                                            <td>{{ schoolName($data->school_name_id)->school_name }}</td>
                                            <td>{{ $data->student_apartment }}</td>
                                            <!-- <td>{{ $data->student_gender }}</td> -->
                                            <td>{{ $data->student_contact_number }}</td>
                                            <td>Note</td>
                                            <!-- <td>{{ $data->student_graduation }}</td> -->
                                            <td>{{ $data->student_fb_id }}</td>
                                            <!-- <td>{{ $data->school_address_line_1 }} {{ $data->school_address_line_2 }}</td> -->
                                            <!-- <td>{{ $data->created_at }}</td> -->
                                            <td><button type="button" class="btn btn-secondary">Resume</button></td>
                                            <td style="width:150px !important">
                                                <!-- <button type="button" class="btn btn-info">Edit</button> -->
                                                
                                                
                                                <a href="{{ route('student_info.edit', $data->id) }}" class="btn btn-xs btn-success"><i class="fa-solid fa-eye"></i></a>
                                                <a href="{{ route('student_info.edit', $data->id) }}" class="btn btn-xs btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- <tr>
                                        <td>Erfan</td>
                                        <td>Bangladesh</td>
                                        <td>sakura mention</td>
                                        <td>Male</td>
                                        <td>08099999999</td>
                                        <td>note will write here</td>
                                        <td><a href="http://facebook.com">http://facebook.com</a></td>
                                        <td>
                                            <a href="#">Resume</a>
                                            <button type="button" class="btn btn-info">Edit</button>
                                            <button type="button" class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr> -->
                                    
                                   
                                    </thead>
                                </table>
                                    
                            </div>
                                
                                
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
