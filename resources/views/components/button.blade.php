<button {{ $attributes->merge(["class" => "bg-primary text-white rounded px-4 py-2 mt-6 text-label-lg uppercase"]) }}>
    {{ $slot }}
</button>
