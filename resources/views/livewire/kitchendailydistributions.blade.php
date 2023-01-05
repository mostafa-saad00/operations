<div>
    {{-- Do your work, then step back. --}}
    <x-slot name="pageTitle">
        {{ __('الصرف اليومي') }}
    </x-slot>

    <x-slot name="header">
        {{ __('الصرف اليومي') }}
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
                <label class="relative flex">
                  <input
                    x-init="$el._x_flatpickr = flatpickr($el)"
                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pr-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                    placeholder="حدد التاريخ"
                    type="text"
                    wire:model="search_by_date"
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
            <div>
                <!-- search elements here... -->
            </div>
                <!-- search elements here... -->
            <div> 
                <!-- search elements here... -->
                <a 
                href="{{ route('create-kitchendailydistribution') }}"
                class="btn mt-3 space-x-reverse space-x-2 bg-secondary font-medium text-white hover:bg-secondary-focus focus:bg-secondary-focus active:bg-secondary-focus/90"
              >
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
               <span>اضافة صرف يومي</span>
              </a>
            </div>
            
            

 
            <div class="inline-flex col-span-12" >

            </div> 

          </div>
          

          <div class="card mt-3">
            <div
              class="is-scrollbar-hidden min-w-full overflow-x-auto rounded-lg border border-slate-200 dark:border-navy-500"
            >
              <table class="w-full text-right">
                <thead>
                  <tr>
                    <th
                      class="whitespace-nowrap border border-t-0 border-l-0 border-slate-200 px-3 py-3 font-semibold uppercase text-slate-800 dark:border-navy-500 dark:text-navy-100 lg:px-5"
                    >
                      #
                    </th>
                    <th
                      class="whitespace-nowrap border border-t-0 border-slate-200 px-3 py-3 font-semibold uppercase text-slate-800 dark:border-navy-500 dark:text-navy-100 lg:px-5"
                    >
                      اليوم
                    </th>
                    <th
                      class="whitespace-nowrap border border-t-0 border-slate-200 px-3 py-3 font-semibold uppercase text-slate-800 dark:border-navy-500 dark:text-navy-100 lg:px-5"
                    >
                      تاريخ الصرف
                    </th>
                    <th
                      class="whitespace-nowrap border border-t-0 border-r-0 border-slate-200 px-3 py-3 font-semibold uppercase text-slate-800 dark:border-navy-500 dark:text-navy-100 lg:px-5"
                    >
                      عدد الضباط
                    </th>
                    <th
                      class="whitespace-nowrap border border-t-0 border-r-0 border-slate-200 px-3 py-3 font-semibold uppercase text-slate-800 dark:border-navy-500 dark:text-navy-100 lg:px-5"
                    >
                      عدد الافراد
                    </th>
                    <th
                      class="whitespace-nowrap border border-t-0 border-r-0 border-slate-200 px-3 py-3 font-semibold uppercase text-slate-800 dark:border-navy-500 dark:text-navy-100 lg:px-5"
                    >
                      عدد المجندين
                    </th>
                    @if (auth()->user()->role == "admin")
                    <th
                      class="whitespace-nowrap border border-t-0 border-r-0 border-slate-200 px-3 py-3 font-semibold uppercase text-slate-800 dark:border-navy-500 dark:text-navy-100 lg:px-5"
                    >
                      حذف
                    </th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  <div style="display: none">{{ $id = 1 }}</div>
                  @foreach ($kitchendailydistributions as $kitchendailydistribution)
                  <tr class="pointer">
                    <td onmouseover="$('.pointer').css('cursor', 'pointer');" style="" onclick="location.href='{{ route('show-kitchendailydistribution', $kitchendailydistribution->id) }}';"
                      class="whitespace-nowrap border border-l-0 border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5"
                    >
                      {{ $id++ }}
                    </td>
                    <td onmouseover="$('.pointer').css('cursor', 'pointer');" style="" onclick="location.href='{{ route('show-kitchendailydistribution', $kitchendailydistribution->id) }}';"
                      class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5"
                    >
                      @if($kitchendailydistribution->day == 'saturday') السبت @endif
                      @if($kitchendailydistribution->day == 'sunday') الاحد @endif
                      @if($kitchendailydistribution->day == 'monday') الاثنين @endif
                      @if($kitchendailydistribution->day == 'tuesday') الثلاثاء @endif
                      @if($kitchendailydistribution->day == 'wednesday') الاربعاء @endif
                      @if($kitchendailydistribution->day == 'thursday') الخميس @endif
                      @if($kitchendailydistribution->day == 'friday') الحمعة @endif
                      
                      
                    </td>
                    <td onmouseover="$('.pointer').css('cursor', 'pointer');" style="" onclick="location.href='{{ route('show-kitchendailydistribution', $kitchendailydistribution->id) }}';"  
                      class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5"
                    >
                    {{ $kitchendailydistribution->date }}
                    </td>
                    <td onmouseover="$('.pointer').css('cursor', 'pointer');" style="" onclick="location.href='{{ route('show-kitchendailydistribution', $kitchendailydistribution->id) }}';"
                      class="whitespace-nowrap border border-r-0 border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5"
                    >
                    {{ $kitchendailydistribution->officers_number }}
                    </td>
                    <td onmouseover="$('.pointer').css('cursor', 'pointer');" style="" onclick="location.href='{{ route('show-kitchendailydistribution', $kitchendailydistribution->id) }}';"
                      class="whitespace-nowrap border border-r-0 border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5"
                    >
                    {{ $kitchendailydistribution->amens_number }}
                    </td>
                    <td onmouseover="$('.pointer').css('cursor', 'pointer');" style="" onclick="location.href='{{ route('show-kitchendailydistribution', $kitchendailydistribution->id) }}';"
                      class="whitespace-nowrap border border-r-0 border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5"
                    >
                    {{ $kitchendailydistribution->soliders_number }}
                    </td>
                    @if (auth()->user()->role == "admin")
                    <td
                      class="whitespace-nowrap border border-r-0 border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5"
                    >
                    <form id="deleteform" onsubmit="return confirm('هل تريد حذف الصرف لهذا اليوم؟');" action="{{ route('destroy-kitchendailydistribution', $kitchendailydistribution->id) }}" method="POST">
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
                  @endforeach

                  
                  
                  
                </tbody>
              </table>
            </div>
              


            
          </div>
        </div>



    </div>
</div>
