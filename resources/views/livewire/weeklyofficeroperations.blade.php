<div>
    {{-- Do your work, then step back. --}}
    {{-- Because she competes with no one, no one can compete with her. --}}
    <x-slot name="pageTitle">
        {{ __('التشغيل الاسبوعي') }}
    </x-slot>

    <x-slot name="header">
        @if ($fromtooperation)
                 
        التشغيل الاسبوعي من السبت  {{ $fromtooperation->from }} حتي الجمعة {{ $fromtooperation->to }}
            
        @else
            
        @endif
    </x-slot>

    <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6"> 
        <!-- weeklyofficeroperations Table -->
        <div>
          <div class="flex items-center justify-between">
            <div class="inline-flex col-span-12" >    
       
                <input wire:model="searchTerm"
                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                placeholder="بحث..."
                type="text"
                autofocus
                />
              
            </div>
              
            
            


          </div>
          

          <div class="card mt-3">
            <div
              class="is-scrollbar-hidden min-w-full overflow-x-auto"
              x-data="pages.tables.initExample1"
            >
              

                    @if ($fromtooperation)
                    <div style="display: none">{{ $id = 1 }}</div>
                    <div class="grid grid-cols-4 gap-4">
                    @forelse($officers as $officer)

                    
                    <div
                    x-data="{expandedItem:null}"
                    class="mr-2 ml-2 mt-5 flex flex-col space-y-4 sm:space-y-5 lg:space-y-6"
                    >  
                    <div
                    x-data="accordionItem('item-1')"
                    class="overflow-hidden rounded-lg border border-slate-150 dark:border-navy-500"
                    >
                        <div
                        class="flex items-center justify-between bg-slate-150 px-4 py-4 dark:bg-navy-500 sm:px-5"
                        >
                        <div
                            class="flex items-center  space-x-reverse space-x-3.5 tracking-wide outline-none transition-all"
                        >
                            <div class="avatar h-10 w-10">
                                @if($officer->photo)
                                <img
                                  class="mask is-squircle"
                                  src="{{ asset('storage/posts/' . $officer->photo->folder . '/' . $officer->photo->text) }}"
                                  alt="avatar"
                                />
                                @else 
                                <img
                                  class="mask is-squircle"
                                  src="{{ asset('/profile_placeholder.png') }}"
                                  alt="avatar"
                                />
                                @endif
                            </div>
                            <div>
                            <p class="text-slate-700 line-clamp-1 dark:text-navy-100">
                                {{ $officer->nick_name }}
                            </p>
                            <p class="text-xs text-slate-500 dark:text-navy-300">
                                {{ $officer->what_he_do }}
                            </p>
                            </div>
                        </div>
                        <button
                            @click="expanded = !expanded"
                            class="btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                            </svg>
                        </button>
                        </div>
                        <div x-collapse x-show="expanded">
                        <div class="px-4 py-4 sm:px-5">

                          <span class="font-bold">السبت</span>
                          @forelse ($weeklyofficeroperations->where('officer_id', $officer->id)->where('day', 'sat') as $weeklyofficeroperation)
                            @if ($weeklyofficeroperation->date)
                              <div
                              class="mt-1 badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light"
                              >
                                {{ $dailyoperations->find($weeklyofficeroperation->dailyoperation_id)->name  }}
                              </div>
                              @else 
                              <div class="mt-1 badge bg-error/10 text-error dark:bg-error/15">
                                غير محدد
                              </div>
                            @endif
                            

                          @empty
                          <div class="mt-1 badge bg-error/10 text-error dark:bg-error/15">
                            غير محدد
                          </div>
                            
                          @endforelse
                          <br>
                          <span class="font-bold">الاحد</span>
                          @forelse ($weeklyofficeroperations->where('officer_id', $officer->id)->where('day', 'sun') as $weeklyofficeroperation)
                          @if ($weeklyofficeroperation->date)
                            <div
                            class="mt-1 badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light"
                            >
                              {{ $dailyoperations->find($weeklyofficeroperation->dailyoperation_id)->name  }}
                            </div>
                            @else 
                            <div class="mt-1 badge bg-error/10 text-error dark:bg-error/15">
                              غير محدد
                            </div>

                            @endif
                          @empty
                          <div class="mt-1 badge bg-error/10 text-error dark:bg-error/15">
                            غير محدد
                          </div>
                          @endforelse
                          <br>
                          <span class="font-bold">الاثنين</span>
                          @forelse ($weeklyofficeroperations->where('officer_id', $officer->id)->where('day', 'mon') as $weeklyofficeroperation)
                            @if ($weeklyofficeroperation->date)
                            <div
                            class="mt-1 badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light"
                            >
                              {{ $dailyoperations->find($weeklyofficeroperation->dailyoperation_id)->name  }}
                            </div>
                            @else 
                            <div class="mt-1 badge bg-error/10 text-error dark:bg-error/15">
                              غير محدد
                            </div>

                            @endif
                          @empty
                          <div class="mt-1 badge bg-error/10 text-error dark:bg-error/15">
                            غير محدد
                          </div>
                          @endforelse
                          <br>
                          <span class="font-bold">الثلاثاء</span>
                          @forelse ($weeklyofficeroperations->where('officer_id', $officer->id)->where('day', 'tue') as $weeklyofficeroperation)
                          @if ($weeklyofficeroperation->date)
                            <div
                            class="mt-1 badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light"
                            >
                              {{ $dailyoperations->find($weeklyofficeroperation->dailyoperation_id)->name  }}
                            </div>
                            @else 
                            <div class="mt-1 badge bg-error/10 text-error dark:bg-error/15">
                              غير محدد
                            </div>
                            @endif 
                          @empty
                          <div class="mt-1 badge bg-error/10 text-error dark:bg-error/15">
                            غير محدد
                          </div>
                          @endforelse
                          <br>
                          <span class="font-bold">الاربعاء</span>
                          @forelse ($weeklyofficeroperations->where('officer_id', $officer->id)->where('day', 'wed') as $weeklyofficeroperation)
                          @if ($weeklyofficeroperation->date)
                            <div
                            class="mt-1 badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light"
                            >
                              {{ $dailyoperations->find($weeklyofficeroperation->dailyoperation_id)->name  }}
                            </div>
                            @else 
                            <div class="mt-1 badge bg-error/10 text-error dark:bg-error/15">
                              غير محدد
                            </div>
                            @endif 
                          @empty
                          <div class="mt-1 badge bg-error/10 text-error dark:bg-error/15">
                            غير محدد
                          </div>
                          @endforelse
                          <br>
                          <span class="font-bold">الخميس</span>
                          @forelse ($weeklyofficeroperations->where('officer_id', $officer->id)->where('day', 'thu') as $weeklyofficeroperation)
                          @if ($weeklyofficeroperation->date)
                            <div
                            class="mt-1 badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light"
                            >
                              {{ $dailyoperations->find($weeklyofficeroperation->dailyoperation_id)->name  }}
                            </div>
                            @else 
                            <div class="mt-1 badge bg-error/10 text-error dark:bg-error/15">
                              غير محدد
                            </div>
                            @endif 
                          @empty
                          <div class="mt-1 badge bg-error/10 text-error dark:bg-error/15">
                            غير محدد
                          </div>
                          @endforelse
                          <br>
                          <span class="font-bold">الجمعة</span>
                          @forelse ($weeklyofficeroperations->where('officer_id', $officer->id)->where('day', 'fri') as $weeklyofficeroperation)
                          @if ($weeklyofficeroperation->date)
                            <div
                            class="mt-1 badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light"
                            >
                              {{ $dailyoperations->find($weeklyofficeroperation->dailyoperation_id)->name  }}
                            </div>
                            @else 
                            <div class="badge bg-error/10 text-error dark:bg-error/15">
                              غير محدد
                            </div>
                            @endif
                          @empty
                          <div class="badge bg-error/10 text-error dark:bg-error/15">
                            غير محدد
                          </div>
                          @endforelse
                          



                            <div class="mt-4 flex justify-between">
                            <div class="flex flex-wrap space-x-reverse -space-x-2">
                                
                                     
                           
                              
                            </div>
                            <button
                                onclick="location.href='{{ route('create-weeklyofficeroperation', [$officer->id, $fromtooperation->id]) }}';"
                                class="btn h-9 w-9 p-0 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25"
                            >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            </button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>




                    


                    

                    @empty
                        <tr>
                            <td>لا يوجد بيانات</td>
                        </tr>

                    @endforelse
                </div>


                    



                    @else
                    
                       لا يوجد بيانات
                    
                    @endif 
                
            </div>

            
          </div>
        </div>



    </div>








    
    

    
</div>
