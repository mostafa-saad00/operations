<x-app-layout>
    <x-slot name="pageTitle">
        {{ __('الصرف اليومي') }} 
    </x-slot>

    <x-slot name="header">
        {{ __('الصرف اليومي') }} ليوم 
        
        @if($kitchendailydistribution->day == 'saturday') السبت @endif
        @if($kitchendailydistribution->day == 'sunday') الاحد @endif
        @if($kitchendailydistribution->day == 'monday') الاثنين @endif
        @if($kitchendailydistribution->day == 'tuesday') الثلاثاء @endif
        @if($kitchendailydistribution->day == 'wednesday') الاربعاء @endif
        @if($kitchendailydistribution->day == 'thursday') الخميس @endif
        @if($kitchendailydistribution->day == 'friday') الحمعة @endif
        
        الموافق {{ $kitchendailydistribution->date }}
    </x-slot>



    <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
        <!-- Kitchen Items Table -->
        <div>
            
            

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

                    </tr>
                </thead>
                <tbody>
                    <tr class="pointer">
                    <td 
                        class="whitespace-nowrap border border-l-0 border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5"
                    >
                        1
                    </td>
                    <td 
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
                    <td   
                        class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5"
                    >
                    {{ $kitchendailydistribution->date }}
                    </td>
                    <td 
                        class="whitespace-nowrap border border-r-0 border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5"
                    >
                    {{ $kitchendailydistribution->officers_number }}
                    </td>
                    <td 
                        class="whitespace-nowrap border border-r-0 border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5"
                    >
                    {{ $kitchendailydistribution->amens_number }}
                    </td>
                    <td 
                        class="whitespace-nowrap border border-r-0 border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5"
                    >
                    {{ $kitchendailydistribution->soliders_number }}
                    </td>
                    
                    </tr>
               
                </tbody>
                </table>
            </div>
                


            
            </div>
        </div>


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
                    <a 
                      href="{{ route('print-kitchendailydistribution', $kitchendailydistribution->id) }}"
                      class="btn mt-3 space-x-reverse space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                        <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                      </svg>
                     <span>طباعة يومية الصرف</span>
                    </a>
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
                          اسم الصنف 
                        </th>
                        <th
                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                        >
                           المقرر اليومي للضابط
                        </th>
                        <th
                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                        >
                           المقرر اليومي للفرد
                        </th>
                        <th
                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                        >
                           المقرر اليومي للمجند
                        </th>
                        <th
                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                        >
                           الكمية قبل الصرف
                        </th>
                        <th
                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                        >
                           الكمية بعد الصرف
                        </th>
                        <th
                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                        >
                           الكمية المصروفة
                        </th>

                        
                        
                        
    
                      </tr>
                    </thead>
                    <tbody>
    
                        
                        <div style="display: none">{{ $id = 1 }}</div>
                        @forelse($kitchendailydistribution->kitchendailydistributionitems as $item_distribution)  
    
                            <tr class="pointer border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $id++ }}</td>

                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $item_distribution->kitchenitem->name }}</td>

                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <div
                                    class="badge border border-slate-300 text-slate-800 dark:border-navy-450 dark:text-navy-50"
                                    >
                                    {{ $item_distribution->mokrar_officer }} 
                                    {{ $item_distribution->kitchenitem->unit }}
                                    </div>
                                  
                                </td>

                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <div
                                    class="badge border border-slate-300 text-slate-800 dark:border-navy-450 dark:text-navy-50"
                                    >
                                    {{ $item_distribution->mokrar_amen }} 
                                    {{ $item_distribution->kitchenitem->unit }}
                                    </div>
                                    
                                </td>

                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <div
                                    class="badge border border-slate-300 text-slate-800 dark:border-navy-450 dark:text-navy-50"
                                    >
                                    {{ $item_distribution->mokrar_solider }} 
                                    {{ $item_distribution->kitchenitem->unit }}
                                    </div>
                                   
                                </td>

                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <div
                                    class="badge border border-slate-300 text-slate-800 dark:border-navy-450 dark:text-navy-50"
                                    >
                                    {{ $item_distribution->before_quantity }} 
                                    {{ $item_distribution->kitchenitem->unit }}
                                    </div>
                                   
                                </td>

                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <div
                                    class="badge border border-slate-300 text-slate-800 dark:border-navy-450 dark:text-navy-50"
                                    >
                                    {{ $item_distribution->after_quantity }} 
                                    {{ $item_distribution->kitchenitem->unit }}
                                    </div>
                                   
                                </td>

                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <div
                                    class="badge border border-slate-300 text-slate-800 dark:border-navy-450 dark:text-navy-50"
                                    >
                                    {{ $item_distribution->total_distribution }} 
                                    {{ $item_distribution->kitchenitem->unit }}
                                    </div>
                                   
                                </td>
 
                            </tr>
                          
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

</x-app-layout>

