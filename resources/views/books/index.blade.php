<x-layout>
    <main class="min-vh-100" style="margin-top: 500px">
        @foreach ($books as $book)
            @if ($book->id < 5)
            {{$book->title}}
                <div class="text-dark">
                    {{ $book->author->firstname }}
                </div>
            @endif
        @endforeach
    </main>
</x-layout>
