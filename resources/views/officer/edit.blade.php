<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('تعديل الضابط') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('update-officer', $officer->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="py-2">
                        <x-label for="name" :value="__('اسم الضابط')" />
        
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$officer->name" required autofocus />
                    </div>

                    <div class="py-2">
                        <x-label for="nick_name" :value="__('اسم الشهرة')" />
        
                        <x-input id="nick_name" class="block mt-1 w-full" type="text" name="nick_name" :value="$officer->nick_name" required />
                    </div>

                    <div class="py-2">
                        <x-label for="phone" :value="__('رقم التليفون')" />
        
                        <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="$officer->phone" required />
                    </div>

                    <div class="py-2">
                        <x-label for="address" :value="__('العنوان')" />
        
                        <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="$officer->address" required />
                    </div>

                    <x-button class="ml-3">
                        {{ __('تعديل') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
