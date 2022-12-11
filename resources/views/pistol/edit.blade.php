<x-app-layout>
    <x-slot name="header">


        <div class="row">
            <div class="col-md-11">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('تعديل الطبنجة') }}
                </h2>
            </div>
            <div class="col-md-1">
                <a href="{{ route('index-pistols') }}" class="btn btn-secondary">       
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
                <form action="{{ route('update-pistol', $pistol->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="py-2">
                        <x-label for="nick_name" :value="__('نوع الطبنجة')" />

                        <select name="type"
                        class="form-select s mb-3">      
                            <option value="">اختر النوع</option>         
                            <option @if($pistol->type == "هيكلر") selected @endif value="هيكلر">هيكلر</option>         
                            <option @if($pistol->type == "برتا") selected @endif value="برتا">برتا</option>         
                            <option @if($pistol->type == "ديوتي") selected @endif value="ديوتي">ديوتي</option>         
                            <option @if($pistol->type == "كومباكت") selected @endif value="كومباكت">كومباكت</option>         
                            <option @if($pistol->type == "تورس") selected @endif value="تورس">تورس</option>        
                                
                        </select>
                    </div>

                    

                    <div class="py-2">
                        <x-label for="phone" :value="__('رقم الطبنجة')" />
        
                        <x-input id="phone" class="block mt-1 w-full" type="text" name="number" :value="$pistol->number" required />
                    </div>

                  

                    <x-button class="ml-3">
                        {{ __('تعديل') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
