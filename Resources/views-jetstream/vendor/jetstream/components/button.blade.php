<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary inline-flex']) }}>
    {{ $slot }}
</button>
