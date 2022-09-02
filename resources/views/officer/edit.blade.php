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
                            <option @if($officer->rank == "ملازم") selected @endif value="ملازم">ملازم</option>         
                            <option @if($officer->rank == "ملازم اول") selected @endif value="ملازم اول">ملازم اول</option>         
                            <option @if($officer->rank == "نقيب") selected @endif value="نقيب">نقيب</option>         
                            <option @if($officer->rank == "رائد") selected @endif value="رائد">رائد</option>         
                            <option @if($officer->rank == "مقدم") selected @endif value="مقدم">مقدم</option>         
                            <option @if($officer->rank == "عقيد") selected @endif value="عقيد">عقيد</option>         
                            <option @if($officer->rank == "عميد") selected @endif value="عميد">عميد</option>         
                            <option @if($officer->rank == "لواء") selected @endif value="لواء">لواء</option>         
                            
                        </select>
                    </div>

                    <div class="py-2">
                        <x-label for="name" :value="__('اسم الضابط')" />
        
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$officer->name" required autofocus />
                    </div>

                    <div class="py-2">
                        <x-label for="nick_name" :value="__('اسم الشهرة')" />
        
                        <x-input id="nick_name" class="block mt-1 w-full" type="text" name="nick_name" :value="$officer->nick_name" required />
                    </div>

                    <div class="py-2">
                        <x-label for="tarteb" :value="__('الترتيب')" />
        
                        <x-input id="tarteb" class="block mt-1 w-full" type="number" name="tarteb" :value="$officer->tarteb" required />
                    </div>

                    <div class="py-2">
                        <x-label for="year_of_graduate" :value="__('سنة التخرج')" />
        
                        <x-input id="year_of_graduate" class="block mt-1 w-full" type="number" name="year_of_graduate" :value="$officer->year_of_graduate" required />
                    </div>

                    <div class="py-2">
                        <x-label for="nick_name" :value="__('الجهة')" />

                        <select name="gehat"
                        class="form-select s mb-3">               
                            @foreach ($gehats as $gehat)
                                <option @if($gehat->id == $officer->gehat->id) selected @endif value="{{ $gehat->id }}">
                                    {{ $gehat->name }} 
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="py-2">
                        <x-label for="what_he_do" :value="__('العمل القائم به')" />
        
                        <x-input id="what_he_do" class="block mt-1 w-full" type="text" name="what_he_do" :value="$officer->what_he_do" required />
                    </div>

                    <div class="py-2">
                        <x-label for="city" :value="__('المحافظة')" />

                        <select name="city"
                        class="form-select s mb-3">      
                            <option value="">اختر المحافظة</option>         
                            <option @if($officer->city == "القاهرة") selected @endif value="القاهرة">القاهرة</option>         
                            <option @if($officer->city == "الجيزة") selected @endif value="الجيزة">الجيزة</option>         
                            <option @if($officer->city == "القليوبية") selected @endif value="القليوبية">القليوبية</option>         
                            <option @if($officer->city == "الاسكندرية") selected @endif value="الاسكندرية">الاسكندرية</option>         
                            <option @if($officer->city == "الاسماعيلية") selected @endif value="الاسماعيلية">الاسماعيلية</option>         
                            <option @if($officer->city == "اسوان") selected @endif value="اسوان">اسوان</option>         
                            <option @if($officer->city == "اسيوط") selected @endif value="اسيوط">اسيوط</option>         
                            <option @if($officer->city == "الاقصر") selected @endif value="الاقصر">الاقصر</option>         
                            <option @if($officer->city == "البحر الاحمر") selected @endif value="البحر الاحمر">البحر الاحمر</option>         
                            <option @if($officer->city == "البحيرة") selected @endif value="البحيرة">البحيرة</option>         
                            <option @if($officer->city == "بني سويف") selected @endif value="بني سويف">بني سويف</option>         
                            <option @if($officer->city == "بورسعيد") selected @endif value="بورسعيد">بورسعيد</option>         
                            <option @if($officer->city == "جنوب سيناء") selected @endif value="جنوب سيناء">جنوب سيناء</option>         
                            <option @if($officer->city == "الدقهلية") selected @endif value="الدقهلية">الدقهلية</option>         
                            <option @if($officer->city == "دمياط") selected @endif value="دمياط">دمياط</option>         
                            <option @if($officer->city == "سوهاج") selected @endif value="سوهاج">سوهاج</option>         
                            <option @if($officer->city == "السويس") selected @endif value="السويس">السويس</option>         
                            <option @if($officer->city == "الشرقية") selected @endif value="الشرقية">الشرقية</option>         
                            <option @if($officer->city == "شمال سيناء") selected @endif value="شمال سيناء">شمال سيناء</option>         
                            <option @if($officer->city == "الغربية") selected @endif value="الغربية">الغربية</option>         
                            <option @if($officer->city == "الفيوم") selected @endif value="الفيوم">الفيوم</option>         
                            <option @if($officer->city == "قنا") selected @endif value="قنا">قنا</option>         
                            <option @if($officer->city == "كفر الشيخ") selected @endif value="كفر الشيخ">كفر الشيخ</option>         
                            <option @if($officer->city == "مطروح") selected @endif value="مطروح">مطروح</option>         
                            <option @if($officer->city == "المنوفية") selected @endif value="المنوفية">المنوفية</option>         
                            <option @if($officer->city == "المنيا") selected @endif value="المنيا">المنيا</option>         
                            <option @if($officer->city == "الوادي الجديد") selected @endif value="الوادي الجديد">الوادي الجديد</option>         
                            
                        </select>
                    </div>

                    <div class="py-2">
                        <x-label for="address" :value="__('العنوان')" />
        
                        <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="$officer->address" required />
                    </div>

                    <div class="py-2">
                        <x-label for="religion" :value="__('الديانة')" />

                        <select name="religion"
                        class="form-select s mb-3">      
                            <option value="">اختر الديانة</option>         
                            <option @if($officer->religion == "مسلم") selected @endif value="مسلم">مسلم</option>         
                            <option @if($officer->religion == "مسيحي") selected @endif value="مسيحي">مسيحي</option>                                            
                            
                        </select>
                    </div>

                    <div class="py-2">
                        <x-label for="status" :value="__('الحالة الاجتماعية')" />

                        <select name="status"
                        class="form-select s mb-3">      
                            <option value="">اختر الحالة الاجتماعية</option>         
                            <option @if($officer->status == "اعزب") selected @endif value="اعزب">اعزب</option>         
                            <option @if($officer->status == "متزوج") selected @endif value="متزوج">متزوج</option>                                            
                            <option @if($officer->status == "ارمل") selected @endif value="ارمل">ارمل</option>                                            
                            <option @if($officer->status == "مطلق") selected @endif value="مطلق">مطلق</option>                                            
                            
                        </select>
                       
                    </div>

                    <div class="py-2">
                        <x-label for="health" :value="__('الحالة الصحية')" />
        
                        <x-input id="health" class="block mt-1 w-full" type="text" name="health" :value="$officer->health" required />
                      
                    </div>

                    <div class="py-2">
                        <x-label for="phone1" :value="__('رقم التليفون 1')" />
        
                        <x-input id="phone1" class="block mt-1 w-full" type="number" name="phone1" :value="$officer->phone1" required />
                    </div>

                    <div class="py-2">
                        <x-label for="phone2" :value="__('رقم التليفون 2')" />
        
                        <x-input id="phone2" class="block mt-1 w-full" type="number" name="phone2" :value="$officer->phone2" placeholder="(اختياري)" />
                       
                    </div>

                    <div class="py-2">
                        <x-label for="nick_name" :value="__('الطبنجة')" />

                        <select name="pistol"
                        class="form-select s mb-3">  
                            <option>اختر الطبنجة</option>
                            @if ($officer->pistol_id != 0)
                                <option selected value="{{ $officer->pistol->id }}">{{ $officer->pistol->type }} - {{ $officer->pistol->number }}</option>   
                            @endif

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
                        @livewire('editofficertrainings', ['officer' => $officer])
                    </div>

                    <x-button class="ml-3">
                        {{ __('تعديل') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
