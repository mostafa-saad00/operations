<div>
    {{-- Success is as dangerous as failure. --}}
    <x-slot name="pageTitle">
        {{ __('التشغيل الاسبوعي') }}
    </x-slot>

    <x-slot name="header">
        {{ __('التشغيل الاسبوعي') }}
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
        
        <!-- Fromtooperations Table -->
        <div>
          <div class="flex items-center justify-between">
            <div class="inline-flex col-span-12" >    

            
                <select wire:model="month"
                    class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                >
                    <option value="">شهر</option>
                    
                    <option value="1">يناير</option>
                    <option value="2">فبراير</option>
                    <option value="3">مارس</option>
                    <option value="4">ابريل</option>
                    <option value="5">مايو</option>
                    <option value="6">يونيو</option>
                    <option value="7">يوليو</option>
                    <option value="8">اغسطس</option>
                    <option value="9">سبتمبر</option>
                    <option value="10">اكتوبر</option>
                    <option value="11">نوفمبر</option>
                    <option value="12">ديسمبر</option>
                
                </select>
                

                
            
            
            
                <select wire:model="year"
                    class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                >
                    <option value="">سنة</option>
                    @foreach ($years as $year)
                    <option value="{{ $year }}">{{ $year }}</option> 
                    @endforeach
                    
        
                </select>
            
            </div>
              
            <div class="inline-flex col-span-12" >

                

                <div x-data="{showModal:false}">
                    <button
                      @click="showModal = true"
                      class="btn mt-3 space-x-reverse space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                      </svg>
                     <span> اضافة اسبوع </span>
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
                              اضافة اسبوع
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
                            <form action="{{ route('store-fromtooperation') }}" method="POST">
                                @csrf
                              <label class="block">
                                <span>من السبت الموافق</span>
                                <label class="relative flex mt-4">
                                    <input
                                      name="from"
                                      x-init="$el._x_flatpickr = flatpickr($el,{
                                              disable: [
                                                  function (date) {
                                                      return (date.getDay() === 0 || date.getDay() === 1 || date.getDay() === 2 || date.getDay() === 3 || date.getDay() === 4 || date.getDay() === 5);
                                                  }
                                              ],
                                              locale: {
                                                  firstDayOfWeek: 5
                                              }
                                          })"
                                      class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pr-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                      placeholder="اختر التاريخ..."
                                      type="text"
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
                                
                              </label>
                              <label class="block mt-4">
                                <span>الي الجمعة الموافق</span>
                                <label class="relative flex mt-4">
                                    <input
                                      name="to"
                                      x-init="$el._x_flatpickr = flatpickr($el,{
                                              disable: [
                                                  function (date) {
                                                      return (date.getDay() === 0 || date.getDay() === 1 || date.getDay() === 2 || date.getDay() === 3 || date.getDay() === 4 || date.getDay() === 6 );
                                                  }
                                              ],
                                              locale: {
                                                  firstDayOfWeek: 5 
                                              }
                                          })"
                                      class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pr-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                      placeholder="اختر التاريخ..."
                                      type="text"
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
                                  اضافة اسبوع
                                </button>
                              </div>
                            </form>

                            </div>
                          </div>
                        </div>
                      </div>
                    </template>
                  </div>

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
                      من السبت الموافق
                    </th>
                    <th
                      class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                    >
                      الي الجمعة الموافق
                    </th>
                    <th
                      class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                    >
                      تعديل/اضافة التشغيل الاسبوعي للضباط
                    </th>
                    
                    @if (auth()->user()->role == "admin")
                    <th
                      class="text-center whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                    >
                      حذف
                    </th>
                    @endif

                  </tr>
                </thead>
                <tbody>

                    
                    <div style="display: none">{{ $id = 1 }}</div>
                    @forelse($fromtooperations as $fromtooperation)  

                        <tr class="pointer border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $id++ }}</td>
                              
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                <div class="badge bg-success text-white">{{ $fromtooperation->from }}</div>
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                <div class="badge bg-success text-white">{{ $fromtooperation->to }}</div>
                            </td>
                            <td>
                                <a
                                href="{{ route('index-weeklyofficeroperations', $fromtooperation->id) }}"
                                class="btn  space-x-reverse space-x-2 border border-secondary font-medium text-secondary hover:bg-secondary hover:text-white focus:bg-secondary focus:text-white active:bg-secondary/90 dark:text-secondary-light dark:hover:bg-secondary dark:hover:text-white dark:focus:bg-secondary dark:focus:text-white dark:active:bg-secondary/90"
                              >
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                              </svg>
                                <span>تعديل التشغيل الاسبوعي للضباط</span>
                              </a>
                            </td>
                 
                            @if (auth()->user()->role == "admin")
                            <td class="text-center">
                                <form id="deleteform" onsubmit="return confirm('هل تريد حذف التشغيل الاسبوعي');" action="{{ route('destroy-fromtooperation', $fromtooperation->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn h-9 w-9 p-0 font-medium text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                      </button>
                                </form>
                            </td>
                            @endif
                        </tr>
                      
                    @empty
                        <tr>
                            <td>لا يوجد بيانات</td>
                        </tr>

                    @endforelse



                  
                </tbody>
              </table>
            </div>

            <div
              class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5"
            >
              <div
                class="flex items-center space-x-2 space-x-reverse text-xs+"
              >
                <span>اظهر</span>
                <label class="block">
                  <select 
                    class="form-select rounded-full border border-slate-300 bg-white px-2 py-1 pl-6 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                  >
                    <option selected value="15">15</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                  </select>
                </label>
                <span>سجلات</span>
              </div>

              



            </div>
          </div>
        </div>



    </div>












    
    
</div>
