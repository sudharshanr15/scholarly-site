@props(['name'])

@error($name)
<p class="text-alert-error text-body-md font-medium mt-2">{{ $message }}</p>
@enderror
