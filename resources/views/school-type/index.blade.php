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
                    <h2>{{ __("School Type") }}</h2>
                    <a href="{{ route('school_type.create') }}" class="btn btn-xs btn-primary float-end">Add</a>
                </div>

                <div class="container mt-3">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>S/L</th>
                            <th>School Type</th>
                            <th>Created</th>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $n=1; //dd($school_type); die; ?>
                        @foreach ($school_type as $data)
                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{ $data->school_type }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>
                                    <!-- <button type="button" class="btn btn-info">Edit</button> -->
                                    <a href="{{ route('school_type.edit', $data->id) }}" class="btn btn-xs btn-info">Edit</a>
                                    <button type="button" class="btn btn-danger">Delete</button>
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
