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

<x-faculty.layout>
    <h1 class="mb-6 text-2xl font-semibold">Faculty Articles</h1>

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">All Articles</h2>
    </div>

        <div class="bg-light-fg dark:bg-dark-fg p-6 rounded overflow-x-auto">
        <div>
            <table id="myTable" class="display nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Campus Address</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td>{{ $article['id'] }}</td>
                        <td>
                            <a href="{{ $article['link'] }}" class="block hover:underline">{{ $article['title'] }}</a>
                        </td>
                        <td>{{ $article['published_year'] }}</td>
                        <td>
                            <a href="{{ route("faculty.article.edit", $article['id']) }}" class="hover:underline">edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-faculty.layout>
