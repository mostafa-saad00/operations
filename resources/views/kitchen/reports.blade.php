<x-app-layout>
    <x-slot name="header">


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
        
        
        <!-- Kitchen Items Table -->
        <div>
          <div class="grid grid-cols-2 gap-2">
            <div>    
                <!-- search elements here... -->  
                          
            </div>
            <div>
                <!-- search elements here... -->
            </div>
                <!-- search elements here... -->
                
            <div> 
                <!-- search elements here... -->
                
            </div>
            
            
            <div>
               
            </div>

 
            <div class="inline-flex col-span-12" >

            </div> 

          </div>
          

          
        </div>



    </div>













    <div x-data="{showModal:false}">
        <button
          @click="showModal = true"
          class="btn mt-3 space-x-reverse space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
        >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
          </svg>
         <span>طباعة بيان حصر اعداد استهلاك الوجبات</span>
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
                    طباعة بيان حصر اعداد استهلاك الوجبات 
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
                <form action="{{ route('kitchen-monthly-consumption-numbers', Auth::user()->id , Auth::user()->id ) }}" method="POST">
                    @csrf
                    
                        <div class="" > 
                
                            <label class="relative flex">
                                <input
                                x-init="$el._x_flatpickr = flatpickr($el,{mode: 'range',dateFormat: 'Y-m-d', })"
                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pr-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="حدد التاريخ"
                                type="text"
                                name="date_range"
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
                
                    


                  <div class="mt-4 space-x-reverse space-x-2 text-right">
                    <button
                    onclick="event.preventDefault();"
                      @click="showModal = false"
                      class="btn min-w-[7rem] border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                    >
                      الغاء
                    </button>
                    <button type="submit" @click="showModal = false"
                      class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                    >
                     طباعة
                    </button>
                  </div>
                </form>

                </div>
              </div>
            </div>
          </div>
        </template>
      </div>



      <div x-data="{showModal:false}">
        <button
          @click="showModal = true"
          class="btn mt-3 space-x-reverse space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
        >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
          </svg>
         <span>طباعة بيان الاستهلاك الشهري للاصناف الواردة من الامداد</span>
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
                    طباعة بيان الاستهلاك الشهري للاصناف الواردة من الامداد 
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
                <form action="{{ route('kitchen-monthly-amdad-numbers', Auth::user()->id ) }}" method="POST">
                    @csrf
                    
                        <div class="" > 
                
                            <label class="relative flex">
                                <input
                                x-init="$el._x_flatpickr = flatpickr($el,{mode: 'range',dateFormat: 'Y-m-d', })"
                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pr-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="حدد التاريخ"
                                type="text"
                                name="date_range"
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
                
                    


                  <div class="mt-4 space-x-reverse space-x-2 text-right">
                    <button
                    onclick="event.preventDefault();"
                      @click="showModal = false"
                      class="btn min-w-[7rem] border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                    >
                      الغاء
                    </button>
                    <button type="submit" @click="showModal = false"
                      class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                    >
                     طباعة
                    </button>
                  </div>
                </form>

                </div>
              </div>
            </div>
          </div>
        </template>
      </div>


      <div x-data="{showModal:false}">
        <button
          @click="showModal = true"
          class="btn mt-3 space-x-reverse space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
        >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
          </svg>
         <span>طباعة بيان الاستهلاك الشهري للاصناف الواردة من صندوق التحسين</span>
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
                    طباعة بيان الاستهلاك الشهري للاصناف الواردة من صندوق التحسين 
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
                <form action="{{ route('kitchen-monthly-ta7sen-numbers', Auth::user()->id ) }}" method="POST">
                    @csrf
                    
                        <div class="" > 
                
                            <label class="relative flex">
                                <input
                                x-init="$el._x_flatpickr = flatpickr($el,{mode: 'range',dateFormat: 'Y-m-d', })"
                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pr-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="حدد التاريخ"
                                type="text"
                                name="date_range"
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
                
                    


                  <div class="mt-4 space-x-reverse space-x-2 text-right">
                    <button
                    onclick="event.preventDefault();"
                      @click="showModal = false"
                      class="btn min-w-[7rem] border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                    >
                      الغاء
                    </button>
                    <button type="submit" @click="showModal = false"
                      class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                    >
                     طباعة
                    </button>
                  </div>
                </form>

                </div>
              </div>
            </div>
          </div>
        </template>
      </div>



      <div x-data="{showModal:false}">
        <button
          @click="showModal = true"
          class="btn mt-3 space-x-reverse space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
        >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
          </svg>
         <span>طباعة بيان بالكميات المنصرفة</span>
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
                    طباعة بيان بالكميات المنصرفة 
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
                <form action="{{ route('kitchen-receipt-monthly', Auth::user()->id ) }}" method="POST">
                    @csrf
                    
                        <div class="" > 
                
                            <label class="relative flex">
                                <input
                                x-init="$el._x_flatpickr = flatpickr($el,{mode: 'range',dateFormat: 'Y-m-d', })"
                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pr-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="حدد التاريخ"
                                type="text"
                                name="date_range"
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
                
                    


                  <div class="mt-4 space-x-reverse space-x-2 text-right">
                    <button
                    onclick="event.preventDefault();"
                      @click="showModal = false"
                      class="btn min-w-[7rem] border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                    >
                      الغاء
                    </button>
                    <button type="submit" @click="showModal = false"
                      class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                    >
                     طباعة
                    </button>
                  </div>
                </form>

                </div>
              </div>
            </div>
          </div>
        </template>
      </div>



      <div x-data="{showModal:false}">
        <button
          @click="showModal = true"
          class="btn mt-3 space-x-reverse space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
        >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
          </svg>
         <span>طباعة بيان بجرد الاصناف</span>
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
                  طباعة بيان بجرد الاصناف 
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
                <form action="{{ route('kitchen-items-quantity', Auth::user()->id ) }}" method="POST">
                    @csrf
                    
                        <div class="" > 
                
                          <label class="relative flex">
                            <input
                              x-init="$el._x_flatpickr = flatpickr($el)"
                              class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pr-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                              placeholder="حدد التاريخ"
                              type="text"
                              name="date"
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
                
                    


                  <div class="mt-4 space-x-reverse space-x-2 text-right">
                    <button
                    onclick="event.preventDefault();"
                      @click="showModal = false"
                      class="btn min-w-[7rem] border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                    >
                      الغاء
                    </button>
                    <button type="submit" @click="showModal = false"
                      class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                    >
                     طباعة
                    </button>
                  </div>
                </form>

                </div>
              </div>
            </div>
          </div>
        </template>
      </div>



</x-app-layout>