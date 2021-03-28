<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-blue']) }}>
    {{ $slot }}
</button>
