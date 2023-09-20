<x-layout>
    @auth
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            @method('POST')
            <button onclick="event.preventDefault(); this.closest('form').submit();" type="submit">Logout</button>
        </form>
    @endauth
</x-layout>