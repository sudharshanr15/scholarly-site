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
<x-user.Layout>
    <h1 class="mb-6 text-2xl font-semibold">Department Users</h1>

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">All Users</h2>
        <a href="{{ route('users_admin.register') }}" class="bg-primary text-white rounded-lg px-4 py-2 font-medium">Create +</a>
    </div>
    <div class="bg-light-fg dark:bg-dark-fg p-6 rounded overflow-x-auto">
        <div>
            <table id="myTable" class="display nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Mobile No</th>
                        <th>Department ID</th>
                        <th>Department Name</th>
                        <th>Created At</th>
                        <th>Email Verified At</th>
                        <!-- <th>Edit</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->full_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile_no }}</td>
                        <td>{{ $user->department_id }}</td>
                        <td>{{ $user->department_name }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->email_verified_at ?? "Not Verified" }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-user.Layout>