<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update message #{{ $message->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Update message #{{ $message->id }}
                    <br>
                    <br>
                    <form method="post" action="{{ route('updatemessage') }}">
                        <input type="hidden" name="id" value="{{ $message->id }}">
                        <input type="text" name="message" value="{{ $message->message }}">
                        <input type="submit" value="Update" name="submit">
                        @csrf
                    </form>
                    <br>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
