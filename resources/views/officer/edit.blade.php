<x-app-layout>
  <x-slot name="pageTitle">
      {{ __('تعديل الضابط') }}
  </x-slot>

  <x-slot name="header">
      {{ __('تعديل الضابط') }}
  </x-slot>






  <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
      
      <div class="col-span-12 lg:col-span-12">
        <div class="card">
          <div
            class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5"
          > 
          <a href="{{ route('show-officer', $officer->id) }}">
            <h2
              class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100"
            >
              تعديل بيانات {{ $officer->rank }}/ {{ $officer->nick_name }}
            </h2>
          </a> 
          </div>
          <div class="p-4 sm:p-5">
            <form action="{{ route('update-officer', $officer->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
             

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
                  
                  
                  <div id="image_rapper" class="flex flex-col">
                    
                    <div class="avatar mt-1.5 h-40 w-40">
                      <img
                        class="mask is-squircle"
                        @if($officer->photo)
                        src="{{ asset('storage/posts/' . $officer->photo->folder . '/' . $officer->photo->text) }}"
                        @else 
                        src="{{ asset('/profile_placeholder.png') }}"
                        @endif
                        alt="avatar"
                      />
                      <div
                        class="absolute bottom-0 right-0 flex items-center justify-center rounded-full bg-white dark:bg-navy-700"
                      >
                        <button onclick="event.preventDefault();
                        document.getElementById('image_rapper').classList.add('hidden');
                        document.getElementById('filepond_div').classList.remove('hidden');"
                          class="btn h-6 w-6 rounded-full border border-slate-200 p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:border-navy-500 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                        >
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="bi bi-x" viewBox="0 0 16 16">
                          <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                        </button>
                      </div>
                    </div>
                  </div>

                  <div id="filepond_div" class="filepond fp-bordered label-icon mt-5 hidden">

                    <input type="file" id="photo" name="image">
  
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
                 
                </span>
              </label>

              <label class="block">
                  <span class="font-bold">الاسم بالكامل </span>
                  <span class="relative mt-1.5 flex">
                      <input name="name"
                      class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                      placeholder="ادخل الاسم بالكامل"
                      type="text"
                      value="{{ $officer->name }}"
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
                      value="{{ $officer->nick_name }}"
                    />
                  
                 
                </span>
              </label>
              <label class="block">
                  <span class="font-bold">الجهة</span>
                  <span class="relative mt-1.5 flex">
                    <select name="gehat"
                    class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                    >
                      @foreach ($gehats as $gehat)
                          <option @if($gehat->id == $officer->gehat->id) selected @endif value="{{ $gehat->id }}">
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
                        value="{{ $officer->tarteb }}"
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
                        value="{{ $officer->year_of_graduate }}"
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
                        value="{{ $officer->what_he_do }}"
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
                  @if($officer->city == 'القاهرة') checked @endif
                    
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="القاهرة"
                  />
                  <p>القاهرة</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'الجيزة') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="الجيزة"
                  />
                  <p>الجيزة</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'الاسكندرية') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="الاسكندرية"
                  />
                  <p>الاسكندرية</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'القليوبية') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="القليوبية"
                  />
                  <p>القليوبية</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'الشرقية') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="الشرقية"
                  />
                  <p>الشرقية</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'الاسماعيلية') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="الاسماعيلية"
                  />
                  <p>الاسماعيلية</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'اسوان') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="اسوان"
                  />
                  <p>اسوان</p>
                </label>

                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'اسيوط') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="اسيوط"
                  />
                  <p>اسيوط</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'الاقصر') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="الاقصر"
                  />
                  <p>الاقصر</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'البحر الاحمر') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="البحر الاحمر"
                  />
                  <p>البحر الاحمر</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'البحيرة') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="البحيرة"
                  />
                  <p>البحيرة</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'بني سويف') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="بني سويف"
                  />
                  <p>بني سويف</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'بورسعيد') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="بورسعيد"
                  />
                  <p>بورسعيد</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'جنوب سيناء') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="جنوب سيناء"
                  />
                  <p>جنوب سيناء</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'الدقهلية') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="الدقهلية"
                  />
                  <p>الدقهلية</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'دمياط') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="دمياط"
                  />
                  <p>دمياط</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'سوهاج') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="سوهاج"
                  />
                  <p>سوهاج</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'السويس') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="السويس"
                  />
                  <p>السويس</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'شمال سيناء') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="شمال سيناء"
                  />
                  <p>شمال سيناء</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'الغربية') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="الغربية"
                  />
                  <p>الغربية</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'الفيوم') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="الفيوم"
                  />
                  <p>الفيوم</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'قنا') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="قنا"
                  />
                  <p>قنا</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'كفر الشيخ') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="كفر الشيخ"
                  />
                  <p>كفر الشيخ</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'مطروح') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="مطروح"
                  />
                  <p>مطروح</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'المنوفية') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="المنوفية"
                  />
                  <p>المنوفية</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'المنيا') checked @endif
                    class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    name="city"
                    type="radio"
                    value="المنيا"
                  />
                  <p>المنيا</p>
                </label>
                <label class="inline-flex items-center  space-x-reverse space-x-2">
                  <input
                  @if($officer->city == 'الوادي الجديد') checked @endif
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
                      value="{{ $officer->address }}"
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
                        <option @if($officer->religion == "مسلم") selected @endif value="مسلم">مسلم</option>         
                        <option @if($officer->religion == "مسيحي") selected @endif value="مسيحي">مسيحي</option>         
                        
                    </select>
                   
                  </span>
                </label>
                <label class="block">
                  <span class="font-bold">الحالة الاجتماعية</span>
                  <span class="relative mt-1.5 flex">
                    <select name="status"
                    class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                    >
                        <option @if($officer->status == "اعزب") selected @endif value="اعزب">اعزب</option>         
                        <option @if($officer->status == "متزوج") selected @endif value="متزوج">متزوج</option> 
                        <option @if($officer->status == "متزوج ويعول") selected @endif value="متزوج ويعول">متزوج ويعول</option>        
                        <option @if($officer->status == "ارمل") selected @endif value="ارمل">ارمل</option>         
                        <option @if($officer->status == "مطلق") selected @endif value="مطلق">مطلق</option>         
                        
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
                      value="{{ $officer->health }}"
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
                      value="{{ $officer->phone1 }}"
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
                      value="{{ $officer->phone2 }}"
                  />
                  
                  </span>
              </label>
                <label class="block">
                  <span class="font-bold">الطبنجة</span>
                  <span class="relative mt-1.5 flex">
                    <select name="pistol"
                    class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                    >
                    @if ($officer->pistol_id != 0)
                    <option selected value="{{ $officer->pistol->id }}">{{ $officer->pistol->type }} - {{ $officer->pistol->number }}</option>   
                   
                    @endif

                    @foreach ($pistols as $pistol)
                        <option value="{{ $pistol->id }}">
                            {{ $pistol->type }} - {{ $pistol->number }} 
                        </option>
          
                    @endforeach

                    @if ($officer->pistol_id == 0)
                    <option selected value="0">بدون طبنجة</option>        
                    @endif    
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
                    value="{{ $officer->height }}"
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
                    value="{{ $officer->weight }}"
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
                    value="{{ $officer->age }}"
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
              @livewire('editofficertrainings', ['officer' => $officer])
              
              

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
