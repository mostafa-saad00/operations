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

                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            <li>{{ $error }}</li>
                        </div>
                    @endforeach

                    <div class="py-2">
                        <x-label for="rank" :value="__('الرتبة')" />

                        <select name="rank"
                        class="form-select s mb-3">      
                            <option value="">اختر الرتبة</option>         
                            <option value="ملازم">ملازم</option>         
                            <option value="ملازم اول">ملازم اول</option>         
                            <option value="نقيب">نقيب</option>         
                            <option value="رائد">رائد</option>         
                            <option value="مقدم">مقدم</option>         
                            <option value="عقيد">عقيد</option>         
                            <option value="عميد">عميد</option>         
                            <option value="لواء">لواء</option>         
                            
                        </select>
                    </div>


                    <div class="py-2">
                        <x-label for="name" :value="__('اسم الضابط')" />
        
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    </div>
                    
                    <div class="py-2">
                        <x-label for="nick_name" :value="__('اسم الشهرة')" />
        
                        <x-input id="nick_name" class="block mt-1 w-full" type="text" name="nick_name" :value="old('nick_name')" required />
                    </div>

                    <div class="py-2">
                        <x-label for="tarteb" :value="__('الترتيب')" />
        
                        <x-input id="tarteb" class="block mt-1 w-full" type="number" name="tarteb" :value="old('tarteb')" required />
                    </div>

                    <div class="py-2">
                        <x-label for="year_of_graduate" :value="__('سنة التخرج')" />
        
                        <x-input id="year_of_graduate" class="block mt-1 w-full" type="number" name="year_of_graduate" :value="old('year_of_graduate')" required />
                    </div>

                    <div class="py-2">
                        <x-label for="nick_name" :value="__('الجهة')" />

                        <select name="gehat"
                        class="form-select s mb-3">      
                            <option value="">اختر الجهة</option>         
                            @foreach ($gehats as $gehat)
                                <option value="{{ $gehat->id }}">
                                    {{ $gehat->name }} 
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="py-2">
                        <x-label for="what_he_do" :value="__('العمل القائم به')" />
        
                        <x-input id="what_he_do" class="block mt-1 w-full" type="text" name="what_he_do" :value="old('what_he_do')" required />
                    </div>

                    <div class="py-2">
                        <x-label for="city" :value="__('المحافظة')" />

                        <select name="city"
                        class="form-select s mb-3">      
                            <option value="">اختر المحافظة</option>         
                            <option value="القاهرة">القاهرة</option>         
                            <option value="الجيزة">الجيزة</option>         
                            <option value="القليوبية">القليوبية</option>         
                            <option value="الاسكندرية">الاسكندرية</option>         
                            <option value="الاسماعيلية">الاسماعيلية</option>         
                            <option value="اسوان">اسوان</option>         
                            <option value="اسيوط">اسيوط</option>         
                            <option value="الاقصر">الاقصر</option>         
                            <option value="البحر الاحمر">البحر الاحمر</option>         
                            <option value="البحيرة">البحيرة</option>         
                            <option value="بني سويف">بني سويف</option>         
                            <option value="بورسعيد">بورسعيد</option>         
                            <option value="جنوب سيناء">جنوب سيناء</option>         
                            <option value="الدقهلية">الدقهلية</option>         
                            <option value="دمياط">دمياط</option>         
                            <option value="سوهاج">سوهاج</option>         
                            <option value="السويس">السويس</option>         
                            <option value="الشرقية">الشرقية</option>         
                            <option value="شمال سيناء">شمال سيناء</option>         
                            <option value="الغربية">الغربية</option>         
                            <option value="الفيوم">الفيوم</option>         
                            <option value="قنا">قنا</option>         
                            <option value="كفر الشيخ">كفر الشيخ</option>         
                            <option value="مطروح">مطروح</option>         
                            <option value="المنوفية">المنوفية</option>         
                            <option value="المنيا">المنيا</option>         
                            <option value="الوادي الجديد">الوادي الجديد</option>         
                            
                        </select>
                    </div>

                    <div class="py-2">
                        <x-label for="address" :value="__('العنوان')" />
        
                        <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
                    </div>

                    <div class="py-2">
                        <x-label for="religion" :value="__('الديانة')" />

                        <select name="religion"
                        class="form-select s mb-3">      
                            <option value="">اختر الديانة</option>         
                            <option value="مسلم">مسلم</option>         
                            <option value="مسيحي">مسيحي</option>                                            
                            
                        </select>
                    </div>

                    <div class="py-2">
                        <x-label for="status" :value="__('الحالة الاجتماعية')" />

                        <select name="status"
                        class="form-select s mb-3">      
                            <option value="">اختر الحالة الاجتماعية</option>         
                            <option value="اعزب">اعزب</option>         
                            <option value="متزوج">متزوج</option>                                            
                            <option value="ارمل">ارمل</option>                                            
                            <option value="مطلق">مطلق</option>                                            
                            
                        </select>
                        
                    </div>

                    <div class="py-2">
                        <x-label for="health" :value="__('الحالة الصحية')" />
        
                        <x-input id="health" class="block mt-1 w-full" type="text" name="health" :value="old('health')" required />
                        
                    </div>

                    <div class="py-2">
                        <x-label for="phone1" :value="__('رقم التليفون 1')" />
        
                        <x-input id="phone1" class="block mt-1 w-full" type="number" name="phone1" :value="old('phone1')" required />
                    </div>

                    <div class="py-2">
                        <x-label for="phone2" :value="__('رقم التليفون 2')" />
        
                        <x-input id="phone2" class="block mt-1 w-full" type="number" name="phone2" :value="old('phone2')" placeholder="(اختياري)" />
                        
                    </div>

                    <div class="py-2">
                        <x-label for="pistol" :value="__('الطبنجة')" />

                        <select name="pistol"
                        class="form-select s mb-3">  
                            <option value="">اختر الطبينجة</option>
                            @foreach ($pistols as $pistol)
                                    
                                    <option value="{{ $pistol->id }}">
                                        {{ $pistol->type }} - {{ $pistol->number }} 
                                    </option>
                                
                                
                            @endforeach
                            <option value="0">بدون طبنجة</option>        
                               
                        </select>
                    </div>

                    

                   

                    <div class="py-2">
                        <x-label for="address" :value="__('الفرق التدريبية')" />
                        @livewire('createofficertrainings')
                    </div>

                    <x-button class="ml-3">
                        {{ __('حفظ') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
