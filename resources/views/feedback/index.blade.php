<x-layout>
<div class="container mx-auto">
<div class="rounded-lg bg-gray-600 text-gray-100 my-8 px-8 py-12">
    <div
        class="mt-12 px-8 grid gap-8 grid-cols-1 md:grid-cols-2 md:px-12 lg:px-16 xl:px-32 py-16 mx-auto bg-gray-100 text-gray-900 rounded-lg shadow-lg">
        <div class="">
            <div>
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-600 leading-tight">{{ __('Feedback') }}</h2>
            </div>
            <div class="mt-8 text-center flex items-center">
                <img src="/img/feedback.svg" alt="">
            </div>
        </div>
        <div class="">
            <form method="POST" action="{{ route('feedback.store') }}" class="mt-2 w-full">
             @csrf   
             @method('post')

             @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="bg-red-500 text-white my-2 p-2 rounded">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (session('success'))
                <div class="mt-2 font-medium text-sm bg-green-500 rounded-2xl text-lg text-white p-4">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="mt-8">
            <x-input-label for="department" :value="__('form.department')" />
                <select name="department_id" id="department" class="placeholder-gray-600 w-full px-4 py-2.5 text-base border border-gray-400 transition duration-500 ease-in-out transform rounded-lg bg-gray-200  focus:border-secondary focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-2 ring-secondary">
                <option value="">Таңдаңыз</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->{'name_'.app()->getLocale()} }}</option>
                @endforeach
                </select>
            </div>
            <div class="mt-8">
            <x-input-label for="name" :value="__('form.name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <div class="mt-8">
            <x-input-label for="email" :value="__('form.email')" :required="true" />
            <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" :value="old('email')" required />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>
            <div class="mt-8">
            <x-input-label for="phone" :value="__('form.phone')"/>
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone')" />
            </div>
            <div class="mt-8">
                <x-input-label for="name" :value="__('form.message')" :required="true"/>
                <x-textarea name="message" :value="old('message')"></x-textarea>
                <x-input-error class="mt-2" :messages="$errors->get('message')" />
            </div>
            <div class="mt-8">
                <x-button-primary class="mx-auto cursor-pointer">{{ __('form.send') }}</x-button-primary>
            </div>
            </form>
        </div>
    </div>
    </div>
</div>
</x-layout>