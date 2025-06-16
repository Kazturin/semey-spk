<x-layout>
<div class="container mx-auto">
<div class="rounded-lg bg-gray-600 text-gray-100 my-8 px-8 py-12">
    <div
        class="mt-12 px-8 grid gap-8 grid-cols-1 md:grid-cols-2 md:px-12 lg:px-16 xl:px-32 py-16 mx-auto bg-gray-100 text-gray-900 rounded-lg shadow-lg">
        <div class="animate-fade-in-left">
            <div>
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-600 leading-tight">{{ $page->{'title_'.app()->getLocale()} }}</h2>
                <div class="content tiptap-content text-xl font-sf mt-4"> {!! tiptap_converter()->asHTML($page->{'content_'.app()->getLocale()}) !!}</div>
            </div>
            <div class="mt-8 text-center flex items-center">
                <img src="/img/feedback.svg" alt="">
            </div>
        </div>
        <div class="animate-fade-in-right">
            <form method="POST" action="{{ route('request.store') }}" class="mt-2 w-full" enctype="multipart/form-data">
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
            <input type="hidden" name="page_id" value="{{ $page->id }}">
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
            <x-input-label for="contact" :value="__('form.contact')" :required="true" />
            <x-text-input id="contact" name="contact" type="text" class="mt-1 block w-full" :value="old('contact')" placeholder="Телефон, Email" required />
            <x-input-error class="mt-2" :messages="$errors->get('contact')" />
            </div>
            <div class="mt-8">
                <x-input-label for="message" :value="__('form.message')" :required="true"/>
                <x-textarea id="message" name="message" :value="old('message')"></x-textarea>
                <x-input-error class="mt-2" :messages="$errors->get('message')" />
            </div>
            <div class="mt-8 relative flex w-full max-w-sm flex-col gap-1">
    <label class="w-fit pl-0.5 text-sm text-on-surface dark:text-on-surface-dark" for="fileInput">Файл</label>
    <input id="fileInput" type="file" name="filename" 
    class="w-full overflow-clip rounded border border-gray-400 bg-surface-alt/50 text-sm text-on-surface file:mr-4 file:border-none file:bg-surface-alt file:px-4 file:py-2 file:font-medium file:text-on-surface-strong focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:text-on-surface-dark dark:file:bg-surface-dark-alt dark:file:text-on-surface-dark-strong dark:focus-visible:outline-primary-dark" />
    @error('filename')
                            <div class="flex items-center text-sm text-red-600">
                                {{ $message }}
                            </div>
                            @enderror
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