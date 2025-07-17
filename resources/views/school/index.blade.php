@push("scripts")
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.4/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.4/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.4/js/buttons.print.min.js"></script>
@endpush
@push("css")
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.4/css/buttons.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css">
@endpush
<x-console.layout>
    <h1 class="heading-2">School</h1>

    <div class="card">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-headline-sm font-semibold">All Schools</h2>
            <a href="{{ route('school.create') }}" class="">
                <x-button class="inline-flex items-center gap-2">
                    Create
                    <span class="inline">
                        <x-icon.add class="h-6 fill-light-text" />
                    </span>
                </x-button>
            </a>
        </div>
        <div>
            <table id="myTable" class="display nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>School Name</th>
                        <th>Campus ID</th>
                        <th>Campus Name</th>
                        <!-- <th>Edit</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($schools as $school)
                    <tr>
                        <td>{{ $school->id }}</td>
                        <td>{{ $school->school_name }}</td>
                        <td>{{ $school->campus_id }}</td>
                        <td>{{ $school->campus_name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-console.layout>
