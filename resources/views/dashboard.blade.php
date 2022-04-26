<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Welcome on the Wall
                    <br>
                    <br>
                    <form method="post" action="{{ route('postmessage') }}">
                        <input type="text" name="message">
                        <input type="submit" value="Poster" name="submit">
                        @csrf
                    </form>
                    <br>
                    <br>
                    <ul>
                        @foreach($messages as $message)
                            <li>
                                {{ $message->message }}
                                @if($message->user_id === Auth::id())
                                    [<a href="{{ route('formupdatemessage',$message->id) }}">update</a>]
                                    [<a href="{{ route('deletemessage',$message->id) }}">delete</a>]
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
