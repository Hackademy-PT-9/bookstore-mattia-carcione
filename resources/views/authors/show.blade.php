<x-layout>
    <main class="container my-5 py-5 min-vh-100">
        @forelse ($author->books as $book)
            <tr>
                <th scope="row">{{ $book->id }}</th>
                <td>
                    <img class="card-img-top" style="width:3rem"
                        src="{{ empty($book->image) ? '/assets/images/default.jpg' : Storage::url($book->image) }}"
                        alt="..." />
                </td>
                <td>{{ $book['title'] }}</td>
                <td>{{ $book['pages'] }}</td>
                <td>{{ $book['year'] }}</td>

            </tr>
        @empty
            <tr colspan="3"> </tr>
        @endforelse
    </main>

</x-layout>
