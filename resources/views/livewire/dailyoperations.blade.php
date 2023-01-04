<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <x-slot name="pageTitle">
        {{ __('الخدمات') }}
    </x-slot>

    <x-slot name="header">
        {{ __('الخدمات') }}
    </x-slot>



    <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
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
            <script>
                window.setTimeout(function(){
                    var element = document.getElementById("error_element");
                    element.classList.add("hidden");
        
                }, 4000);
            </script>
            @endforeach
        </div>
        @if (\Session::has('message'))
        <div id="message_element">
            
                <div
                    class="alert flex rounded-lg border border-success/30 bg-success/10 py-4 px-4 text-success sm:px-5"
                >
                    {!! \Session::get('message') !!}
                </div>
                <script>
                    window.setTimeout(function(){
                        var element = document.getElementById("message_element");
                        element.classList.add("hidden");
            
                    }, 4000);
                </script>
           
        </div>
        @endif
        
        
        <!-- Ma2moryat Table -->
        <div>
          <div class="grid grid-cols-2 gap-2">
            <div>    
                <!-- search elements here... -->
                <select
                    wire:model="tash8el_name_search"
                    class="mt-3 w-full"
                    x-init="$el._x_tom = new Tom($el,{create: true,sortField: {field: 'text',direction: 'asc'}})"
                    >
                    <option value="">&nbsp; &nbsp; &nbsp; &nbsp; بحث باسم الخدمة</option>
                    @foreach ($specific_dailyoperations as $specific_dailyoperation)
                    <option value="{{ $specific_dailyoperation->name }}">&nbsp; &nbsp; &nbsp; &nbsp; {{ $specific_dailyoperation->name }}</option>    
                    @endforeach
                    
                    
                </select>
            </div>
            <div>
                <!-- search elements here... -->
                <select
                    wire:model="tash8el_type_search"
                    class="mt-3 w-full"
                    x-init="$el._x_tom = new Tom($el,{create: true,sortField: {field: 'text',direction: 'asc'}})"
                    >
                    <option value="">&nbsp; &nbsp; &nbsp; &nbsp; بحث بنوع الخدمة</option>
                    <option value="خدمة عادية">خدمة عادية</option>        
                    <option value="خدمة طارئة">خدمة طارئة</option>        
                    <option value="مأمورية خارجية">مأمورية خارجية</option> 
                    
                    
                </select>
            </div>
                <!-- search elements here... -->
                <select
                    wire:model="tash8el_status_search"
                    class="mt-3 w-full"
                    x-init="$el._x_tom = new Tom($el,{create: true,sortField: {field: 'text',direction: 'asc'}})"
                    >
                    <option value="">&nbsp; &nbsp; &nbsp; &nbsp; بحث بالحالة </option>
                    <option value="active">مفعلة</option>        
                    <option value="disabled">غير مفعلة</option>        
                </select>
           
            

            <div x-data="{showModal:false}">
                <button
                  @click="showModal = true"
                  class="btn mt-3 space-x-reverse space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                  </svg>
                 <span>اضافة خدمة</span>
                </button>
                <template x-teleport="#x-teleport-target">
                  <div
                    class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                    x-show="showModal"
                    role="dialog"
                    @keydown.window.escape="showModal = false"
                  >
                    <div
                      class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
                      @click="showModal = false"
                      x-show="showModal"
                      x-transition:enter="ease-out"
                      x-transition:enter-start="opacity-0"
                      x-transition:enter-end="opacity-100"
                      x-transition:leave="ease-in"
                      x-transition:leave-start="opacity-100"
                      x-transition:leave-end="opacity-0"
                    ></div>
                    <div
                      class="relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300 dark:bg-navy-700"
                      x-show="showModal"
                      x-transition:enter="easy-out"
                      x-transition:enter-start="opacity-0 scale-95"
                      x-transition:enter-end="opacity-100 scale-100"
                      x-transition:leave="easy-in"
                      x-transition:leave-start="opacity-100 scale-100"
                      x-transition:leave-end="opacity-0 scale-95"
                    >
                      <div
                        class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5"
                      >
                        <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                            اضافة خدمة 
                        </h3>


                        <button
                          @click="showModal = !showModal"
                          class="btn -ml-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4.5 w-4.5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M6 18L18 6M6 6l12 12"
                            ></path>
                          </svg>
                        </button>
                      </div>
                      <div class="px-4 py-4 sm:px-5">
                        
                        <div class="mt-4 space-y-4">
                        <form action="{{ route('store-dailyoperation') }}" method="POST">
                            @csrf

                            <label class="block">
                                <span>اسم الخدمة</span>
                                <input
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  placeholder="اسم الخدمة"
                                  type="text"
                                  name="name"
                                />
                            </label>

                            <label class="block">
                                <span>نوع الخدمة</span>
                                <select
                                  class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                                  name="type"
                                  >
                                    <option value="">اختر نوع الخدمة</option>         
                                    <option value="خدمة عادية">خدمة عادية</option>        
                                    <option value="خدمة طارئة">خدمة طارئة</option>        
                                    <option value="مأمورية خارجية">مأمورية خارجية</option> 
                                </select>
                            </label>

                            <label class="block">
                                <span>نجدات الاهداف</span>
                                <input
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  placeholder="نجدات الاهداف"
                                  type="number"
                                  name="price"
                                />
                            </label>


                          <div class="mt-4 space-x-reverse space-x-2 text-right">
                            <button
                            onclick="event.preventDefault();"
                              @click="showModal = false"
                              class="btn min-w-[7rem] border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                            >
                              الغاء
                            </button>
                            <button type="submit"
                              class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                            >
                             اضافة
                            </button>
                          </div>
                        </form>

                        </div>
                      </div>
                    </div>
                  </div>
                </template>
              </div>

 
            <div class="inline-flex col-span-12" >

                

                

            </div> 
            


          </div>
          

          <div class="card mt-3">
            <div
              class="is-scrollbar-hidden min-w-full overflow-x-auto"
              x-data="pages.tables.initExample1"
            >
              <table class="is-hoverable w-full text-right">
                <thead>
                  <tr>
                    <th
                      class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                    >
                      #
                    </th>
                    <th
                      class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                    >
                      الخدمة  
                    </th>
                    <th
                      class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                    >
                      نوع الخدمة 
                    </th>
                    <th
                      class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                    >
                      الحالة
                    </th>
                    
                    @if (auth()->user()->role == "admin")
                    <th
                      class="text-center whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                    >
                      تعديل
                    </th>
                    @endif 

                  </tr>
                </thead>
                <tbody>

                    
                    <div style="display: none">{{ $id = 1 }}</div>
                    @forelse($dailyoperations as $dailyoperation)
                    @if($dailyoperation->type == "تواجد مسائي" || $dailyoperation->type == "راحة اسبوعية" || $dailyoperation->type == "راحة تعويضية" || $dailyoperation->type == "راحة خدمة" || $dailyoperation->name == "اجازة دوري" || $dailyoperation->type == "اجازة مرضي" || $dailyoperation->type == "اجازة طارئة" || $dailyoperation->type == "مامورية سيناء" || $dailyoperation->type == "راحة مامورية سيناء" || $dailyoperation->type == "انتداب" || $dailyoperation->type == "فرق" || $dailyoperation->type == "عمل عادي" || $dailyoperation->type == "مبيت بالقطاع")  
                            
                            @else  

                        <tr class="pointer border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $id++ }}</td>
                              
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                <div
                                    class="badge  space-x-reverse space-x-2.5 text-primary dark:text-accent-light"
                                >
                                    <div class="h-2 w-2 rounded-full bg-current"></div>
                                    <span>{{ $dailyoperation->name }}</span>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                <div
                                class="badge rounded-full border border-slate-300 text-slate-800 dark:border-navy-450 dark:text-navy-50"
                              >
                              {{ $dailyoperation->type }}
                              </div>
                            </td>

                            @if ($dailyoperation->status == 'active')

                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <div
                                    class="badge bg-success/10 text-success dark:bg-success/15"
                                >
                                
                                    مفعلة
                                    </div>
                                </td>

                            @elseif($dailyoperation->status == 'disabled')

                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <div
                                    class="badge bg-error/10 text-error dark:bg-error/15"
                                >
                              
                                    غير مفعلة
                                    </div>
                                </td>
                              
                            @endif

                            

                            @if (auth()->user()->role == "admin")
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                <div x-data="{showModal:false}">
                                    <button
                                      @click="showModal = true"
                                      class="btn h-9 w-9 p-0 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </button>
                                    <template x-teleport="#x-teleport-target">
                                      <div
                                        class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                                        x-show="showModal"
                                        role="dialog"
                                        @keydown.window.escape="showModal = false"
                                      >
                                        <div
                                          class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
                                          @click="showModal = false"
                                          x-show="showModal"
                                          x-transition:enter="ease-out"
                                          x-transition:enter-start="opacity-0"
                                          x-transition:enter-end="opacity-100"
                                          x-transition:leave="ease-in"
                                          x-transition:leave-start="opacity-100"
                                          x-transition:leave-end="opacity-0"
                                        ></div>
                                        <div
                                          class="relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300 dark:bg-navy-700"
                                          x-show="showModal"
                                          x-transition:enter="easy-out"
                                          x-transition:enter-start="opacity-0 scale-95"
                                          x-transition:enter-end="opacity-100 scale-100"
                                          x-transition:leave="easy-in"
                                          x-transition:leave-start="opacity-100 scale-100"
                                          x-transition:leave-end="opacity-0 scale-95"
                                        >
                                          <div
                                            class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5"
                                          >
                                            <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                                                تعديل خدمة -  {{ $dailyoperation->name }} 
                                            </h3>
                    
                    
                                            <button
                                              @click="showModal = !showModal"
                                              class="btn -ml-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                                            >
                                              <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-4.5 w-4.5"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2"
                                              >
                                                <path
                                                  stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M6 18L18 6M6 6l12 12"
                                                ></path>
                                              </svg>
                                            </button>
                                          </div>
                                          <div class="px-4 py-4 sm:px-5">
                                            
                                            <div class="mt-4 space-y-4">
                                            <form action="{{ route('update-dailyoperation', $dailyoperation->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <label class="block mt-2">
                                                    <span>اسم الخدمة</span>
                                                    <input
                                                      class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                      placeholder="اسم الخدمة"
                                                      type="text"
                                                      name="name"
                                                      value="{{ $dailyoperation->name }}"
                                                    />
                                                </label>
                    
                                                <label class="block mt-2">
                                                    <span>نوع الخدمة</span>
                                                    <select
                                                      class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                                                      name="type"
                                                      >
                                                        <option @if($dailyoperation->type == "خدمة عادية") selected @endif value="خدمة عادية">خدمة عادية</option>        
                                                        <option @if($dailyoperation->type == "خدمة طارئة") selected @endif value="خدمة طارئة">خدمة طارئة</option>        
                                                        <option @if($dailyoperation->type == "مأمورية خارجية") selected @endif value="مأمورية خارجية">مأمورية خارجية</option> 
                                                    </select>
                                                </label>
                    
                                                <label class="block mt-2">
                                                    <span>نجدات الاهداف</span>
                                                    <input
                                                      class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                      placeholder="نجدات الاهداف"
                                                      type="number"
                                                      name="price"
                                                      value="{{ $dailyoperation->price }}"
                                                    />
                                                </label>

                                                <label class="block mt-2">
                                                    <span>الحالة </span>
                                                    <select
                                                      class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                                                      name="status"
                                                      >
                                                        <option @if($dailyoperation->status == "active") selected @endif value="active">مفعلة</option>        
                                                        <option @if($dailyoperation->status == "disabled") selected @endif value="disabled">غير مفعلة</option>        
                                                    </select>
                                                </label>
                  

                                              <div class="mt-4 space-x-reverse space-x-2 text-right">
                                                <button
                                                onclick="event.preventDefault();"
                                                  @click="showModal = false"
                                                  class="btn min-w-[7rem] border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                                                >
                                                  الغاء
                                                </button>
                                                <button type="submit"
                                                  class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                                                >
                                                 تعديل
                                                </button>
                                              </div>
                                            </form>
                    
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </template>
                                  </div>
                            </td>
                            @endif
                 
                            
                            
                        </tr>
                      @endif
                    @empty
                        <tr>
                            <td>لا يوجد بيانات</td>
                        </tr>

                    @endforelse



                  
                </tbody>
              </table>
            </div>

            
          </div>
        </div>



    </div>


</div>
