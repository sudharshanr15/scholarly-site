<!-- <p><a href="/">Home</a></p>

<h1>Register</h1>

<form action="" method="POST">
    @csrf
    <div>
        <label for="">Full Name: </label>
        <input type="text" name="full_name">
        @error('full_name')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="">Email: </label>
        <input type="email" name="email">
        @error('email')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="">Mobile: </label>
        <input type="text" name="mobile_no">
        @error('mobile_no')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="">Select Department: </label>
        <select name="department_id" id="">
            @foreach($departments as $dept)
            <option value="{{ $dept['id'] }}">{{ $dept['name'] }}</option>
            @endforeach
        </select>
        @error("department_id")
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="">Password: </label>
        <input type="password" name="password">
        @error('password')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <input type="submit" name="Submit">
</form>

<p>Already a user? <a href="/admin/login">Login</a></p> -->

<x-user.Layout>
    <h1 class="mb-6 text-2xl font-semibold">Create Department Admin</h1>
    <div class="bg-light-fg dark:bg-dark-fg p-6 rounded">
        <form action="" method="POST">
            @csrf
            <div class="mt-4 text-center">
                <x-form.error name="error"></x-form.error>
            </div>
            <div class="mb-4">
                <x-form.label for="full_name">Full Name</x-form.label>
                <x-form.input id="full_name" name="full_name" placeholder="Jane Doe" value="{{ old('full_name') }}"></x-form.input>
                <x-form.error name="full_name"></x-form.error>
            </div>
            <div class="mb-4">
                <x-form.label for="email">Email</x-form.label>
                <x-form.input id="email" name="email" placeholder="user**@gmail.com" value="{{ old('email') }}"></x-form.input>
                <x-form.error name="email"></x-form.error>
            </div>
            <div class="mb-4">
                <x-form.label for="mobile_no">Mobile</x-form.label>
                <x-form.input id="mobile_no" name="mobile_no" placeholder="+91 9876543219" value="{{ old('mobile_no') }}"></x-form.input>
                <x-form.error name="mobile_no"></x-form.error>
            </div>
            <div class="mb-4">
                <x-form.label for="department_id">Select Department</x-form.label>
                <select
                    class="mt-2 w-full block p-2 text-sm rounded text-dark-text dark:text-light-text outline outline-gray-400 focus:outline-3 dark:outline-[#4c4f52] dark:outline-gray-700 dark:bg-[#24262d]"
                    name="department_id"
                    id="department_id"
                >
                    @foreach($departments as $dept)
                    <option value="{{ $dept['id'] }}" @selected($dept['id'] == old('department_id'))>{{ $dept['name'] }}</option>
                    @endforeach
                </select>
                <x-form.error name="department_id" />
            </div>
            <div class="mb-4">
                <x-form.label for="password">
                    Password
                    <span class="block text-sm">(Password is auto-generated)</span>
                </x-form.label>
                <x-form.input type="" :value="Str::password(16)" id="password" name="password" placeholder="**********"></x-form.input>
                <x-form.error name="password"></x-form.error>
            </div>
            <button class="bg-primary text-white rounded-lg w-full p-2 mt-4" type="submit">Create account</button>
        </form>
    </div>
</x-user.Layout>