<div class="flex flex-col gap-y-2">
    <a href="{{ url('movies/' . $id) }}">
        <img src="{{ $imageUrl }}"
            class="rounded-lg shadow-md hover:opacity-75 transition ease-in-out duration-150 w-full"
            alt="{{ $title }}">
    </a>
    <div class="mt-auto">
        <a href="{{ url('movies/' . $id) }}" class="hover:text-gray-300 transition ease-in-out duration-150">
            <p class="leading-4 font-semibold">{{ $title }}</p>
            <p>{{ $year }}</p>
        </a>
    </div>
</div>
