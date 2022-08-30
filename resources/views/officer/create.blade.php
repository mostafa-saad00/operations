<x-app-layout>
    <x-slot name="header">


        <div class="row">
            <div class="col-md-11">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('اضافة ضابط') }}
                </h2>
            </div>
            <div class="col-md-1">
                <a href="{{ route('index-officers') }}" class="btn btn-secondary">       
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                        <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"></path>
                    </svg>
                    
                </a>
            </div>
            
        </div> 
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('store-officer') }}" method="POST">
                    @csrf
                    <div class="py-2">
                        <x-label for="name" :value="__('اسم الضابط')" />
        
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    </div>

                    <div class="py-2">
                        <x-label for="nick_name" :value="__('اسم الشهرة')" />
        
                        <x-input id="nick_name" class="block mt-1 w-full" type="text" name="nick_name" :value="old('nick_name')" required />
                    </div>

                    <div class="py-2">
                        <x-label for="phone" :value="__('رقم التليفون')" />
        
                        <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
                    </div>

                    <div class="py-2">
                        <x-label for="address" :value="__('العنوان')" />
        
                        <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
                    </div>

                    <x-button class="ml-3">
                        {{ __('حفظ') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
