<x-layout.Auth>
    <div class="flex justify-center w-full max-w-xl mx-auto shadow-xl">
            <div class="w-full bg-light-fg dark:bg-dark-fg p-10">
            <h1 class="mb-4 text-xl font-semibold text-dark-fg dark:text-gray-200">Login</h1>
            <form action="" method="POST">
                @csrf
                <div class="mb-4">
                    <x-form.label for="email">Email</x-form.label>
                    <x-form.input id="email" name="email" placeholder="user**@gmail.com" value="{{ old('email') }}"></x-form.input>
                    <x-form.error name="email"></x-form.error>
                </div>
                <div class="mb-4">
                    <x-form.label for="password">Password</x-form.label>
                    <x-form.input id="password" name="password" placeholder="**********"></x-form.input>
                    <x-form.error name="password"></x-form.error>
                </div>
                <div class="mt-4 text-center">
                    <x-form.error name="error"></x-form.error>
                </div>
                <button class="bg-primary text-white rounded-lg w-full p-2 mt-4" type="submit">Log in</button>
            </form>
            <hr class="my-8 border border-gray-300 dark:border-gray-700">
            <a href="#" class="text-purple-500 font-medium hover:underline block mb-2">Forgot your password?</a>
        </div>
    </div>
</x-layout.Auth>