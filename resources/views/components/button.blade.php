<button {{ $attributes->merge(["class" => "bg-primary text-light-text rounded px-4 py-2 text-body-md font-semibold uppercase"]) }}>
    {{ $slot }}
</button>
