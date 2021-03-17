@if ($errors->any())
    <div class="flex">
        <div role="alert" class="mx-auto">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                Invalid input
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
@if (session('message'))
    <div class="flex">
        <div class="mx-auto bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
            <p class="font-bold">{{ session('message') }}</p>
        </div>
    </div>
@endif
