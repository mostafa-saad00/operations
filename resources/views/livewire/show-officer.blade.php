<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <x-slot name="header">

        
    </x-slot>
    

    <div class="grid grid-cols-4 gap-2">
        <div class="" > 

            <label class="relative flex">
                <input
                x-init="$el._x_flatpickr = flatpickr($el,{mode: 'range',dateFormat: 'Y-m-d', })"
                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pr-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                placeholder="حدد التاريخ"
                type="text"
                wire:model="date_range"
                />
                <span
                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 transition-colors duration-200"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.5"
                >
                    <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                    />
                </svg>
                </span>
            </label>
        </div>

    </div>




    

    <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6 mt-4">
        <div class="col-span-12 lg:col-span-4">
            <div class="card grow items-center p-4 sm:p-5">
                <div class="card lg:flex-row">
                  <img
                    class="rounded-lg"
                    @if($officer->photo)
                    src="{{ asset('storage/posts/' . $officer->photo->folder . '/' . $officer->photo->text) }}"
                    @else 
                    src="{{ asset('/profile_placeholder.png') }}"
                    @endif
                    alt="avatar"
                  />
                  
                </div>
                <h3
                  class="pt-3 text-lg font-medium text-slate-700 dark:text-navy-100"
                >
                  {{ $officer->rank }}/ {{ $officer->nick_name }}
                </h3>
                <p class="text-xs+">{{ $officer->what_he_do }}</p>
                <div class="my-4 h-px w-full bg-slate-200 dark:bg-navy-500"></div>
                <div class="grow space-y-4">
                  <div class="flex items-center space-x-4 space-x-reverse">
                    <div
                      class="flex h-7 w-7 items-center rounded-lg bg-primary/10 p-2 text-primary dark:bg-accent-light/10 dark:text-accent-light"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                      </svg>
                    </div>
                    <p>{{ $officer->phone1 }}</p>
                  </div>

                  @if (auth()->user()->role == "admin") 
                  <div class="flex items-center space-x-4 space-x-reverse">
                    <div
                      class="flex h-7 w-7 items-center rounded-lg bg-primary/10 p-2 text-primary dark:bg-accent-light/10 dark:text-accent-light"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                      </svg>
                    </div>
                    <p>{{ $officer->address }}</p>
                  </div>
                  @endif

                  <div class="flex items-center space-x-4 space-x-reverse">
                    <div
                      class="flex h-7 w-7 items-center rounded-lg bg-primary/10 p-2 text-primary dark:bg-accent-light/10 dark:text-accent-light"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"/>
                      </svg>
                    </div>
                    <p>{{ $officer->city }}</p>
                  </div>
                </div>
                <button onclick="location.href='{{ route('edit-officer', $officer->id) }}';"
                  class="btn mt-5 space-x-2 space-x-reverse bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                  </svg>
                  <span> تعديل البيانات </span>
                </button>
              </div>
    
        </div>
        <div class="col-span-12 lg:col-span-8">
          <div class="card">
            
            <div class="p-4 sm:p-5">              
              <div class="grid grid-cols-1 gap-4 sm:grid-cols-1">

                <div x-data="{activeTab:'tabProfile'}" class="tabs flex flex-col">
                    <div class="is-scrollbar-hidden overflow-x-auto">
                      <div class="border-b-2 border-slate-150 dark:border-navy-500">
                        <div class="tabs-list -mb-0.5 flex">
                          
                          <button
                            @click="activeTab = 'tabProfile'"
                            :class="activeTab === 'tabProfile' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                            class="btn shrink-0 space-x-2 space-x-reverse rounded-none border-b-2 px-3 py-2 font-medium"
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="h-4.5 w-4.5"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                              stroke-width="1.5"
                            >
                              <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                              />
                            </svg>
                            <span>البيانات الاساسية</span>
                          </button>
                          <button
                            @click="activeTab = 'tabHome'"
                            :class="activeTab === 'tabHome' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                            class="btn shrink-0 space-x-2 space-x-reverse rounded-none border-b-2 px-3 py-2 font-medium"
                          >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-award" viewBox="0 0 16 16">
                                <path d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z"/>
                                <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
                            </svg>
                            <span>الفرق التدريبية</span>
                          </button>
                          <button
                            @click="activeTab = 'tabMessages'"
                            :class="activeTab === 'tabMessages' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                            class="btn shrink-0 space-x-2 space-x-reverse rounded-none border-b-2 px-3 py-2 font-medium"
                          >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                            </svg>
                            <span> العهدة الشخصية </span>
                          </button>
                          <button
                            @click="activeTab = 'tabTash8eel'"
                            :class="activeTab === 'tabTash8eel' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                            class="btn shrink-0 space-x-2 space-x-reverse rounded-none border-b-2 px-3 py-2 font-medium"
                          >
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stopwatch" viewBox="0 0 16 16">
                            <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z"/>
                            <path d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z"/>
                          </svg>
                            <span> التشغيل  </span>
                          </button>
                          <button
                            @click="activeTab = 'tabMa2moryat'"
                            :class="activeTab === 'tabMa2moryat' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                            class="btn shrink-0 space-x-2 space-x-reverse rounded-none border-b-2 px-3 py-2 font-medium"
                          >
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                            <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                          </svg>
                            <span> المأموريات الخارجية  </span>
                          </button>
                          <button
                            @click="activeTab = 'tabAgazat'"
                            :class="activeTab === 'tabAgazat' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                            class="btn shrink-0 space-x-2 space-x-reverse rounded-none border-b-2 px-3 py-2 font-medium"
                          >
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                            <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                          </svg>
                            <span>الاجازات</span>
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class="tab-content pt-4">
                      
                      <div
                        x-show="activeTab === 'tabProfile'"
                        x-transition:enter="transition-all duration-500 easy-in-out"
                        x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                      >
                        <div>


                            <ol class="timeline  [--size:1.5rem]">
                                <li class="timeline-item">
                                  <div
                                    class="timeline-item-point rounded-full border border-current bg-white text-secondary dark:bg-navy-700 dark:text-secondary-light"
                                  >
                                    <i class="fa fa-user-edit text-tiny"></i>
                                  </div>
                                  <div class="timeline-item-content flex-1 pr-4 sm:pr-8">
                                    <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                                      <p
                                        class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"
                                      >
                                        الاسم بالكامل
                                      </p>
                                      <span class="text-xs text-slate-400 dark:text-navy-300"
                                        >
                                        
                                        </span
                                      >
                                    </div>
                                    <p class="py-1">{{ $officer->name }}</p>
                                    
                                  </div>
                                </li>
                                <li class="timeline-item">
                                  <div
                                    class="timeline-item-point rounded-full border border-current bg-white text-primary dark:bg-navy-700 dark:text-accent"
                                  >
                                    <i class="fa-solid fa-image text-tiny"></i>
                                  </div>
                                  <div class="timeline-item-content flex-1 pr-4 sm:pr-8">
                                    <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                                      <p
                                        class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"
                                      >
                                        الجهة
                                      </p>
                                      <span class="text-xs text-slate-400 dark:text-navy-300"
                                        >
                                        
                                        </span
                                      >
                                    </div>
                                    <p class="py-1">{{ $officer->gehat->name }}</p>
                                    
                                
                                  </div>
                                </li>
                               
                                <li class="timeline-item">
                                  <div
                                    class="timeline-item-point rounded-full border border-current bg-white text-success dark:bg-navy-700"
                                  >
                                    <i class="fa fa-leaf text-tiny"></i>
                                  </div>
                                  <div class="timeline-item-content flex-1 pr-4 sm:pr-8">
                                    <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                                      <p
                                        class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"
                                      >
                                        الديانة والحالة الاجتماعية
                                      </p>
                                      <span class="text-xs text-slate-400 dark:text-navy-300"
                                        >
                                        
                                        </span
                                      >
                                    </div>
                                    
                                    
                                    <div class="pt-2">
                                      
                                      <a
                                      href="#"
                                      class="tag rounded-full border border-success/30 bg-success/10 text-success hover:bg-success/20 focus:bg-success/20 active:bg-success/25"
                                        >
                                        {{ $officer->religion }}
                                        </a>
                                      <a
                                        href="#"
                                        class="tag rounded-full border border-info/30 bg-info/10 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25"
                                      >
                                      {{ $officer->status }}
                                      </a>
                            
                                      
                                    </div>
                                  </div>
                                </li>
                                
                                <li class="timeline-item">
                                  <div
                                    class="timeline-item-point rounded-full border border-current bg-white text-error dark:bg-navy-700"
                                  >
                                    <i class="fa fa-history text-tiny"></i>
                                  </div>
                                  <div class="timeline-item-content flex-1 pr-4 sm:pr-8">
                                    <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                                      <p
                                        class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"
                                      >
                                        الحالة الصحية
                                      </p>
                                      <span class="text-xs text-slate-400 dark:text-navy-300"
                                        >
                                        
                                        </span
                                      >
                                    </div>
                                    <p class="py-1">{{ $officer->health }}</p>
                                  </div>
                                </li>
                                <li class="timeline-item">
                                    <div
                                      class="timeline-item-point rounded-full border border-current bg-white text-error dark:bg-navy-700"
                                    >
                                      <i class="fa fa-history text-tiny"></i>
                                    </div>
                                    <div class="timeline-item-content flex-1 pr-4 sm:pr-8">
                                      <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                                        <p
                                          class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"
                                        >
                                          جهات الاتصال
                                        </p>
                                        <span class="text-xs text-slate-400 dark:text-navy-300"
                                          >
                                          
                                          </span
                                        >
                                      </div>
                                      <p class="py-1">{{ $officer->phone1 }} @if($officer->phone2) - {{ $officer->phone2 }} @endif</p>
                                    </div>
                                  </li>
                                  <li class="timeline-item">
                                    <div
                                      class="timeline-item-point rounded-full border border-current bg-white text-success dark:bg-navy-700"
                                    >
                                      <i class="fa fa-leaf text-tiny"></i>
                                    </div>
                                    <div class="timeline-item-content flex-1 pr-4 sm:pr-8">
                                      <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                                        <p
                                          class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"
                                        >
                                          الطول
                                        </p>
                                        <span class="text-xs text-slate-400 dark:text-navy-300"
                                          >
                                          
                                          </span
                                        >
                                      </div>
                                      
                                      
                                      <div class="pt-2">
                                        <div class="flex space-x-reverse -space-x-px  ">
                                        <a
                                          href="#"
                                          class="tag rounded-r-none bg-primary text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                                        >
                                        {{ $officer->height }}
                                        </a>
                                        <a
                                          href="#"
                                          class="tag rounded-l-none bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-100 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                                        >
                                        سنتيمتر
                                        </a>
                                        </div>
                                        
                                    </div>
                                  </li>

                                  <li class="timeline-item">
                                    <div
                                      class="timeline-item-point rounded-full border border-current bg-white text-success dark:bg-navy-700"
                                    >
                                      <i class="fa fa-leaf text-tiny"></i>
                                    </div>
                                    <div class="timeline-item-content flex-1 pr-4 sm:pr-8">
                                      <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                                        <p
                                          class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"
                                        >
                                          الوزن
                                        </p>
                                        <span class="text-xs text-slate-400 dark:text-navy-300"
                                          >
                                          
                                          </span
                                        >
                                      </div>
                                      
                                      
                                      <div class="pt-2">
                                        

                                        <div class="flex space-x-reverse -space-x-px">
                                          <a
                                            href="#"
                                            class="tag rounded-r-none bg-secondary text-white hover:bg-secondary-focus focus:bg-secondary-focus active:bg-secondary-focus/90"
                                          >
                                          {{ $officer->weight }}
                                          </a>
                                          <a
                                            href="#"
                                            class="tag rounded-l-none bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-100 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                                          >
                                          كيلو جرام
                                          </a>
                                          </div>
 
                                    </div>
                                  </li>

                                  <li class="timeline-item">
                                    <div
                                      class="timeline-item-point rounded-full border border-current bg-white text-success dark:bg-navy-700"
                                    >
                                      <i class="fa fa-leaf text-tiny"></i>
                                    </div>
                                    <div class="timeline-item-content flex-1 pr-4 sm:pr-8">
                                      <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                                        <p
                                          class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"
                                        >
                                          السن
                                        </p>
                                        <span class="text-xs text-slate-400 dark:text-navy-300"
                                          >
                                          
                                          </span
                                        >
                                      </div>
                                      
                                      
                                      <div class="pt-2">
                                       

                                        

                                        <div class="flex space-x-reverse -space-x-px">
                                          <a
                                            href="#"
                                            class="tag rounded-r-none bg-error text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90"
                                          >
                                          {{ $officer->age }} 
                                          </a>
                                          <a
                                            href="#"
                                            class="tag rounded-l-none bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-100 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                                          >
                                          سنة
                                          </a>
                                          </div>

                                        
                                        
                                    </div>
                                  </li>
                              </ol>


                        </div>
                      </div>
                      <div
                        x-show="activeTab === 'tabHome'"
                        x-transition:enter="transition-all duration-500 easy-in-out"
                        x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                      >
                        
                      <ol class="timeline  [--size:1.5rem]">
                        @foreach ($officer->trainings as $training)
                            

                        <li class="timeline-item">
                          <div
                            class="timeline-item-point rounded-full border border-current bg-white text-primary dark:bg-navy-700 dark:text-accent"
                          >
                            <i class="fa-solid fa-image text-tiny"></i>
                          </div>
                          <div class="timeline-item-content flex-1 pr-4 sm:pr-8">
                            <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                              <p
                                class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"
                              >
                              {{ $training->name }}
                              </p>
                              <span class="text-xs text-slate-400 dark:text-navy-300"
                                >
                                
                                </span
                              >
                            </div>
                            <p class="py-1">
                              
                            </p>
                            
                        
                          </div>
                        </li>
                        
                        @endforeach
                        
                        

                        
                      </ol>




                      </div>
                      <div
                        x-show="activeTab === 'tabMessages'"
                        x-transition:enter="transition-all duration-500 easy-in-out"
                        x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                      >
                        
                      <ol class="timeline  [--size:1.5rem]">
                            

                        <li class="timeline-item">
                          <div
                            class="timeline-item-point rounded-full border border-current bg-white text-primary dark:bg-navy-700 dark:text-accent"
                          >
                            <i class="fa-solid fa-image text-tiny"></i>
                          </div>
                          <div class="timeline-item-content flex-1 pr-4 sm:pr-8">
                            <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                              <p
                                class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"
                              >
                              الطبنجة
                              </p>
                              <span class="text-xs text-slate-400 dark:text-navy-300"
                                >
                                
                                </span
                              >
                            </div>
                            @if($officer->pistol)
                            <p class="py-1">{{ $officer->pistol->type }} - {{ $officer->pistol->number }}</p>
                            @else 
                            <p class="py-1">بدون طبنجة</p>
                            @endif  
                        
                          </div>
                        </li>
                        
                        
                        

                        
                      </ol>



                      </div>


                      <div
                      x-show="activeTab === 'tabTash8eel'"
                      x-transition:enter="transition-all duration-500 easy-in-out"
                      x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                      x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                    >
                      
                    <ol class="timeline  [--size:1.5rem]">
                      

                    

                          

                      <li class="timeline-item">
                        
                        <div class="timeline-item-content flex-1 pr-4 sm:pr-8">

                          <div
                          class="alert flex overflow-hidden rounded-lg border border-info text-info"
                        >
                          <div class="bg-info p-3 text-white">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="h-5 w-5"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                            >
                              <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                              />
                            </svg>
                          </div>
                          <div class="px-4 py-3 sm:px-5">اجمالي نجدات الاهداف للتاريخ المحدد: {{ $totalNagadatAhdaf }} جنيه</div>
                        </div>

                          
                          
                          
                          <div x-data="{expandedItem:null}" class=" flex flex-col">

                            <!-- loop begin here -->
                            @foreach ($monthsUniqueArray as $month)
                                
                            
                            <div x-data="accordionItem({{$month}})">
                              <div
                                @click="expanded = !expanded"
                                class="flex cursor-pointer justify-between items-center py-4 text-base font-medium text-slate-700 dark:text-navy-100"
                              >
                                <p>شهر {{$month}}</p>
                                <div
                                  :class="expanded && '-rotate-180'"
                                  class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300"
                                >
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                  </svg>
                                </div>
                              </div>
                              <div x-collapse x-show="expanded">
                                <div>
                                  
                                  @foreach ($UniqueofficerOperations as $index => $operation)
                                  @if ($operation->month == $month)
                                  
                                      
                                <div class="timeline-item-content flex-1 pr-4 sm:pr-8 mt-5">
                                  <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                                    <p
                                      class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"
                                    >
                                    @if ($operation->day == 'sat')
                                        يوم السبت
                                    @elseif($operation->day == 'sun')
                                        يوم الاحد
                                    @elseif($operation->day == 'mon')
                                        يوم الاثنين
                                    @elseif($operation->day == 'tue')
                                        يوم الثلاثاء
                                    @elseif($operation->day == 'wed')
                                        يوم الاربعاء
                                    @elseif($operation->day == 'thu')
                                        يوم الخميس
                                    @elseif($operation->day == 'fri')
                                        يوم الجمعة
                                    
                                    @endif
                                    
                                    </p>
                                    <span class="text-xs text-slate-400 dark:text-navy-300"
                                      >
                                      {{ $operation->date }}
                                      </span
                                    >
                                  </div>
                                  @if ($officerOperations->where('date', $operation->date)->count() > 1)
                                    @foreach ($officerOperations->where('date', $operation->date) as $index => $morethanOneoperation)
                                      {{ $dailyOperations->find($morethanOneoperation->dailyoperation_id)->name }}
                                      @if ($officerOperations->where('date', $operation->date)->count() != $index)
                                      -  
                                      @endif
                                      
                                    @endforeach
                                    
                                  @else 
                                      <p class="py-1">{{ $dailyOperations->find($operation->dailyoperation_id)->name }}</p>
                                      
                                  @endif
                                  {{ $operation[$index] }}
                                  
                              
                                </div>
                                @endif
                                  @endforeach

                                </div>
                              </div>
                            </div>
                            @endforeach
                            <!-- loop end here -->


                            
                            
                          </div>

                          
                           
                      
                        </div>
                      </li>
                      
                      
                      
                      

                      
                    </ol>



                    </div>




                      <div
                      x-show="activeTab === 'tabMa2moryat'"
                      x-transition:enter="transition-all duration-500 easy-in-out"
                      x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                      x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                    >
                      
                    <ol class="timeline  [--size:1.5rem]">

                      <li class="timeline-item">
                        
                        <div class="timeline-item-content flex-1 pr-4 sm:pr-8">

                          <div x-data="{expandedItem:null}" class=" flex flex-col">

                            <!-- loop begin here -->
                            @foreach ($yearsUniqueArray as $year)
                                
                            
                            <div x-data="accordionItem({{$year}})">
                              <div
                                @click="expanded = !expanded"
                                class="flex cursor-pointer justify-between items-center py-4 text-base font-medium text-slate-700 dark:text-navy-100"
                              >
                                <p>سنة {{$year}}</p>
                                <div
                                  :class="expanded && '-rotate-180'"
                                  class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300"
                                >
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                  </svg>
                                </div>
                              </div>
                              <div x-collapse x-show="expanded">
                                <div>
                                  
                                  @foreach ($officerMa2moryats as $index => $ma2moryat)
                                  @if ($ma2moryat->year == $year)
                                  
                                      
                                <div class="timeline-item-content flex-1 pr-4 sm:pr-8 mt-5">
                                  <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                                    <p
                                      class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"
                                    >
                                    {{ $ma2moryat->dailyoperation($ma2moryat->dailyoperation_id) }}
                                    
                                    </p>
                                    <span class="text-xs text-slate-400 dark:text-navy-300"
                                      >

                                      </span
                                    >
                                  </div>
                                  
                                      <p class="py-1">  {{ $ma2moryat->date }}</p>
                                      
                                  
                                  
                              
                                </div>
                                @endif
                                  @endforeach

                                </div>
                              </div>
                            </div>
                            @endforeach
                            <!-- loop end here -->


                            
                            
                          </div>

                          
                           
                      
                        </div>
                      </li>
                      
                      
                      
                      

                      
                    </ol>



                    </div>


                    <div
                      x-show="activeTab === 'tabAgazat'"
                      x-transition:enter="transition-all duration-500 easy-in-out"
                      x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                      x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                    >
                      
                        <ol class="timeline  [--size:1.5rem]">

                        <li class="timeline-item">
                            
                            <div class="timeline-item-content flex-1 pr-4 sm:pr-8">

                            <div x-data="{expandedItem:null}" class=" flex flex-col">

                                <div x-data="accordionItem('الاجازات الطارئة')">
                                    <div
                                        @click="expanded = !expanded"
                                        class="flex cursor-pointer justify-between items-center py-4 text-base font-medium text-slate-700 dark:text-navy-100"
                                    >
                                        <p>الاجازات الطارئة</p>
                                        <div
                                        :class="expanded && '-rotate-180'"
                                        class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300"
                                        >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                        </svg>
                                        </div>
                                    </div>
                                    <div x-collapse x-show="expanded">
                                        <div>

                                        @if ($OfficerAgazatTar2a->count() > 0 )
                                       
                                        @foreach ($OfficerAgazatTar2a as $tar2aOperation)
  
                                            <div class="timeline-item-content flex-1 pr-4 sm:pr-8 mt-5">
                                                <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                                                    <p
                                                    class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"
                                                    >
                                                    
                                                    @if ($tar2aOperation->day == 'sat')
                                                    يوم السبت
                                                    @elseif($tar2aOperation->day == 'sun')
                                                        يوم الاحد
                                                    @elseif($tar2aOperation->day == 'mon')
                                                        يوم الاثنين
                                                    @elseif($tar2aOperation->day == 'tue')
                                                        يوم الثلاثاء
                                                    @elseif($tar2aOperation->day == 'wed')
                                                        يوم الاربعاء
                                                    @elseif($tar2aOperation->day == 'thu')
                                                        يوم الخميس
                                                    @elseif($tar2aOperation->day == 'fri')
                                                        يوم الجمعة
                                                    
                                                    @endif
                                                    
                                                    </p>
                                                    <span class="text-xs text-slate-400 dark:text-navy-300"
                                                    >
                                                   
                                                    </span
                                                    >
                                                </div>                                       
                                            <p class="py-1">{{ $tar2aOperation->date }}</p>
                                            </div>                                       
                                        @endforeach 

                                        @else
                                        <div class="timeline-item-content flex-1 pr-4 sm:pr-8 mt-5">
                                            <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                                                <p
                                                class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"
                                                >
                                                لا يوجد اجازات طارئة للتاريخ المحدد
                                                </p>
                                            </div>
                                        </div>
                                        @endif    
                                        </div>
                                    </div>
                                </div>

                                <div x-data="accordionItem('الاجازات الدوري')">
                                    <div
                                        @click="expanded = !expanded"
                                        class="flex cursor-pointer justify-between items-center py-4 text-base font-medium text-slate-700 dark:text-navy-100"
                                    >
                                        <p>الاجازات الدوري</p>
                                        <div
                                        :class="expanded && '-rotate-180'"
                                        class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300"
                                        >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                        </svg>
                                        </div>
                                    </div>
                                    <div x-collapse x-show="expanded">
                                        
                                        <div>
                                        
                                        @if ($OfficerAgazatDawry->count() > 0 )
                                            @foreach ($OfficerAgazatDawry as $dawryOperation)
      
                                                <div class="timeline-item-content flex-1 pr-4 sm:pr-8 mt-5">
                                                    <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                                                        <p
                                                        class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"
                                                        >
                                                        
                                                        @if ($dawryOperation->day == 'sat')
                                                        يوم السبت
                                                        @elseif($dawryOperation->day == 'sun')
                                                            يوم الاحد
                                                        @elseif($dawryOperation->day == 'mon')
                                                            يوم الاثنين
                                                        @elseif($dawryOperation->day == 'tue')
                                                            يوم الثلاثاء
                                                        @elseif($dawryOperation->day == 'wed')
                                                            يوم الاربعاء
                                                        @elseif($dawryOperation->day == 'thu')
                                                            يوم الخميس
                                                        @elseif($dawryOperation->day == 'fri')
                                                            يوم الجمعة
                                                        
                                                        @endif
                                                        
                                                        </p>
                                                        <span class="text-xs text-slate-400 dark:text-navy-300"
                                                        >
                                                       
                                                        </span
                                                        >
                                                    </div>                                       
                                                <p class="py-1">{{ $dawryOperation->date }}</p>
                                                </div>                                       
                                            @endforeach 
                                        @else
                                            <div class="timeline-item-content flex-1 pr-4 sm:pr-8 mt-5">
                                                <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                                                    <p
                                                    class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"
                                                    >
                                                    لا يوجد اجازات دوري للتاريخ المحدد
                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                        </div>

                                    </div>
                                </div>

                                <div x-data="accordionItem('الاجازات المرضي')">
                                    <div
                                        @click="expanded = !expanded"
                                        class="flex cursor-pointer justify-between items-center py-4 text-base font-medium text-slate-700 dark:text-navy-100"
                                    >
                                        <p>الاجازات المرضي</p>
                                        <div
                                        :class="expanded && '-rotate-180'"
                                        class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300"
                                        >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                        </svg>
                                        </div>
                                    </div>
                                    <div x-collapse x-show="expanded">
                                        
                                        <div>
                                        
                                            @if ($OfficerAgazatMarady->count() > 0 )
                                                @foreach ($OfficerAgazatMarady as $maradyOperation)
          
                                                    <div class="timeline-item-content flex-1 pr-4 sm:pr-8 mt-5">
                                                        <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                                                            <p
                                                            class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"
                                                            >
                                                            
                                                            @if ($maradyOperation->day == 'sat')
                                                            يوم السبت
                                                            @elseif($maradyOperation->day == 'sun')
                                                                يوم الاحد
                                                            @elseif($maradyOperation->day == 'mon')
                                                                يوم الاثنين
                                                            @elseif($maradyOperation->day == 'tue')
                                                                يوم الثلاثاء
                                                            @elseif($maradyOperation->day == 'wed')
                                                                يوم الاربعاء
                                                            @elseif($maradyOperation->day == 'thu')
                                                                يوم الخميس
                                                            @elseif($maradyOperation->day == 'fri')
                                                                يوم الجمعة
                                                            
                                                            @endif
                                                            
                                                            </p>
                                                            <span class="text-xs text-slate-400 dark:text-navy-300"
                                                            >
                                                           
                                                            </span
                                                            >
                                                        </div>                                       
                                                    <p class="py-1">{{ $maradyOperation->date }}</p>
                                                    </div>                                       
                                                @endforeach 
                                            @else
                                                <div class="timeline-item-content flex-1 pr-4 sm:pr-8 mt-5">
                                                    <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                                                        <p
                                                        class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"
                                                        >
                                                        لا يوجد اجازات مرضي للتاريخ المحدد
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                            </div>

                                    </div>
                                </div>
                                
                                
                            </div>

                            
                            
                        
                            </div>
                        </li>                 
                        </ol>
                    </div>
                      


                    </div>
                  </div>


              </div>
              
            </div>
          </div>
        </div>
      </div>

</div>
