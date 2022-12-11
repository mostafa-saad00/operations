<x-app-layout>
    <x-slot name="pageTitle">
        {{ __('اضافة ضابط') }}
    </x-slot>

    <x-slot name="header">
        {{ __('اضافة ضابط') }}
    </x-slot>






    <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
        
        <div class="col-span-12 lg:col-span-12">
          <div class="card">
            <div
              class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5"
            >
              <h2
                class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100"
              >
                ادخل بيانات الضابط
              </h2>
              
            </div>
            <div class="p-4 sm:p-5">

              

                <form action="{{ route('store-officer') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div id="error_element">
                        @foreach ($errors->all() as $error)
                        <div 
                            class=" alert flex  space-x-reverse space-x-2 rounded-lg border border-error px-4 py-4 text-error"
                        >
                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            >
                            <path
                                fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd"
                            />
                            </svg>
                            <p>{{ $error }}</p>
                        </div>
                            
                        @endforeach
                    </div>
                <div class="flex flex-col">
                    <span
                    class="text-base font-medium text-slate-600 dark:text-navy-100"
                    >الصورة الشخصية</span
                    >      
                    
                    

                <div class="filepond fp-bordered label-icon mt-5">

                  <input type="file"  id="photo" name="image">

                </div>

              </div>
              <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
              <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <label class="block">
                  <span class="font-bold">الرتبة</span>
                  <span class="relative mt-1.5 flex">
                    <select name="rank"
                    class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                    >
                        <option  value="">اختر الرتبة</option>         
                        <option value="ملازم">ملازم</option>         
                        <option value="ملازم اول">ملازم اول</option>         
                        <option value="نقيب">نقيب</option>         
                        <option value="رائد">رائد</option>         
                        <option value="مقدم">مقدم</option>         
                        <option value="عقيد">عقيد</option>         
                        <option value="عميد">عميد</option>         
                        <option value="لواء">لواء</option>
                    </select>
                   
                  </span>
                </label>

                <label class="block">
                    <span class="font-bold">الاسم بالكامل </span>
                    <span class="relative mt-1.5 flex">
                        <input name="name"
                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="ادخل الاسم بالكامل"
                        type="text"
                      />
                      
                    </span>
                  </label>
                <label class="block">
                  <span class="font-bold">اسم الشهرة</span>
                  <span class="relative mt-1.5 flex">
                    <input name="nick_name"
                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="الاسم الثنائي المشهور به الضابط"
                        type="text"
                      />
                    
                   
                  </span>
                </label>
                <label class="block">
                    <span class="font-bold">الجهة</span>
                    <span class="relative mt-1.5 flex">
                      <select name="gehat"
                      class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                      >
                        <option value="">اختر الجهة</option>         
                        @foreach ($gehats as $gehat)
                            <option value="{{ $gehat->id }}">
                                {{ $gehat->name }} 
                            </option>
                        @endforeach
                      </select>
                     
                    </span>
                  </label>
                  <label class="block">
                      <span class="font-bold">الترتيب</span>
                      <span class="relative mt-1.5 flex">
                          <input name="tarteb"
                          class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                          placeholder="الترتيب علي دفعة التخرج"
                          type="number"
                        />
                        
                      </span>
                    </label>
                  <label class="block">
                    <span class="font-bold">سنة التخرج</span>
                    <span class="relative mt-1.5 flex">
                      <input name="year_of_graduate"
                          class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                          placeholder="سنة تخرج الضابط"
                          type="number"
                        />
                      
                     
                    </span>
                  </label>
                  <label class="block">
                    <span class="font-bold">العمل القائم به</span>
                    <span class="relative mt-1.5 flex">
                      <input name="what_he_do"
                          class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                          placeholder="العمل القائم به في الضابط"
                          type="text"
                        />
                      
                     
                    </span>
                  </label>
                
                
              </div>
              <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>


              

              <label class="block">
                <span class="font-bold">المحافظة </span>
              </label>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-4 mt-5">


                <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      checked
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="القاهرة"
                    />
                    <p>القاهرة</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="الجيزة"
                    />
                    <p>الجيزة</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="الاسكندرية"
                    />
                    <p>الاسكندرية</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="القليوبية"
                    />
                    <p>القليوبية</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="الشرقية"
                    />
                    <p>الشرقية</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="الاسماعيلية"
                    />
                    <p>الاسماعيلية</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="اسوان"
                    />
                    <p>اسوان</p>
                  </label>

                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="اسيوط"
                    />
                    <p>اسيوط</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="الاقصر"
                    />
                    <p>الاقصر</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="البحر الاحمر"
                    />
                    <p>البحر الاحمر</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="البحيرة"
                    />
                    <p>البحيرة</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="بني سويف"
                    />
                    <p>بني سويف</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="بورسعيد"
                    />
                    <p>بورسعيد</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="جنوب سيناء"
                    />
                    <p>جنوب سيناء</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="الدقهلية"
                    />
                    <p>الدقهلية</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="دمياط"
                    />
                    <p>دمياط</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="سوهاج"
                    />
                    <p>سوهاج</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="السويس"
                    />
                    <p>السويس</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="شمال سيناء"
                    />
                    <p>شمال سيناء</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="الغربية"
                    />
                    <p>الغربية</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="الفيوم"
                    />
                    <p>الفيوم</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="قنا"
                    />
                    <p>قنا</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="كفر الشيخ"
                    />
                    <p>كفر الشيخ</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="مطروح"
                    />
                    <p>مطروح</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="المنوفية"
                    />
                    <p>المنوفية</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="المنيا"
                    />
                    <p>المنيا</p>
                  </label>
                  <label class="inline-flex items-center  space-x-reverse space-x-2">
                    <input
                      class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      name="city"
                      type="radio"
                      value="الوادي الجديد"
                    />
                    <p>الوادي الجديد</p>
                  </label>


                
                
                
                
              </div>
              <div class="grid grid-cols-1 gap-4 sm:grid-cols-1 mt-5">
                <label class="block">
                    <span class="font-bold">العنوان</span>
                    <span class="relative mt-1.5 flex">
                        <input name="address"
                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="ادخل العنوان هنا"
                        type="text"
                    />
                    
                    </span>
                </label>
              </div>


              <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
              <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

                <label class="block">
                    <span class="font-bold">الديانة</span>
                    <span class="relative mt-1.5 flex">
                      <select name="religion"
                      class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                      >
                          <option  value="">اختر الديانة</option>         
                          <option value="مسلم">مسلم</option>         
                          <option value="مسيحي">مسيحي</option>         
                          
                      </select>
                     
                    </span>
                  </label>
                  <label class="block">
                    <span class="font-bold">الحالة الاجتماعية</span>
                    <span class="relative mt-1.5 flex">
                      <select name="status"
                      class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                      >
                          <option  value="">اختر الحالة الاجتماعية</option>         
                          <option value="اعزب">اعزب</option>         
                          <option value="متزوج">متزوج</option>         
                          <option value="متزوج ويعول">متزوج ويعول</option>         
                          <option value="ارمل">ارمل</option>         
                          <option value="مطلق">مطلق</option>         
                          
                      </select>
                     
                    </span>
                  </label>
                <label class="block">
                    <span class="font-bold">الحالة الصحية</span>
                    <span class="relative mt-1.5 flex">
                        <input name="health"
                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="ادخل الحالة الصحية هنا"
                        type="text"
                    />
                    
                    </span>
                </label>

                <label class="block">
                    <span class="font-bold">تليفون 1</span>
                    <span class="relative mt-1.5 flex">
                        <input name="phone1"
                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="تليفون 1"
                        type="number"
                    />
                    
                    </span>
                </label>
                <label class="block">
                    <span class="font-bold">تليفون 2 (اختياري)</span>
                    <span class="relative mt-1.5 flex">
                        <input name="phone2"
                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="تليفون 2"
                        type="number"
                    />
                    
                    </span>
                </label>
                  <label class="block">
                    <span class="font-bold">الطبنجة</span>
                    <span class="relative mt-1.5 flex">
                      <select name="pistol"
                      class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                      >
                        <option value="">اختر الطبينجة</option>
                        @foreach ($pistols as $pistol)
                                
                                <option value="{{ $pistol->id }}">
                                    {{ $pistol->type }} - {{ $pistol->number }} 
                                </option>
                            
                            
                        @endforeach
                        <option value="0">بدون طبنجة</option>        
                          
                      </select>
                     
                    </span>
                  </label>
                

              </div>

              <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
              <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div>
                  <span class="font-bold">الطول</span>
                  <label class="mt-1 flex space-x-reverse -space-x-px">
                    
                    <input
                      name="height"
                      class="form-input w-full border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                      placeholder="(اختياري)"
                      type="number"
                    />
                    <span
                      class="flex items-center justify-center rounded-l-lg border border-slate-300 bg-slate-150 px-3.5 font-inter text-slate-800 dark:border-navy-450 dark:bg-navy-500 dark:text-navy-100"
                    >
                      <span>سنتيمتر</span>
                    </span>
                  </label>
                </div>

                <div>
                  <span class="font-bold">الوزن</span>
                  <label class="mt-1 flex space-x-reverse -space-x-px">
                    
                    <input
                      name="weight"
                      class="form-input w-full border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                      placeholder="(اختياري)"
                      type="number"
                    />
                    <span
                      class="flex items-center justify-center rounded-l-lg border border-slate-300 bg-slate-150 px-3.5 font-inter text-slate-800 dark:border-navy-450 dark:bg-navy-500 dark:text-navy-100"
                    >
                      <span>كيلو جرام</span>
                    </span>
                  </label>
                </div>

                <div>
                  <span class="font-bold">السن</span>
                  <label class="mt-1 flex space-x-reverse -space-x-px">
                    
                    <input
                      name="age"
                      class="form-input w-full border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                      placeholder="(اختياري)"
                      type="number"
                    />
                    <span
                      class="flex items-center justify-center rounded-l-lg border border-slate-300 bg-slate-150 px-3.5 font-inter text-slate-800 dark:border-navy-450 dark:bg-navy-500 dark:text-navy-100"
                    >
                      <span>سنة</span>
                    </span>
                  </label>
                </div>
                
              </div>

              
              


              <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>

              <div class="grid grid-cols-1 gap-4 sm:grid-cols-1">
                <span class="font-bold">الفرق التدريبية</span>
                @livewire('createofficertrainings')
                
                

              </div>


              <div>
              
                <div class="flex items-center justify-between pt-4">
                  <div class="flex items-center space-x-4 space-x-reverse">
                    
                  </div>
                  <div class="flex justify-center space-x-2 space-x-reverse">
                    <button
                        type="button"
                        onclick="location.href='{{ route('index-officers') }}';"
                        class="btn min-w-[7rem] border border-slate-300 font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                    >
                      الغاء
                    </button>
                    <button
                    type="submit"
                      class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                    >
                      حفظ
                    </button>
                  </div>
                </div>
              </div>
              
              </form>
            </div>
          </div>
        </div>
      </div>





      
      <script>
        window.setTimeout(function(){
            var element = document.getElementById("error_element");
            element.classList.add("hidden");

        }, 5000);
    </script>
    









    
</x-app-layout>
