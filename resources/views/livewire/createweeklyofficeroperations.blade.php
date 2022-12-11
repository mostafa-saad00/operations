<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <x-slot name="pageTitle">
        {{ __('التشغيل الاسبوعي') }}
    </x-slot>

    <x-slot name="header">  
    
    </x-slot>

    <div class="text-center">
        
        <h3
          class="mt-3 text-xl font-semibold text-slate-600 dark:text-navy-100"
        >
          التشغيل الاسبوعي
        </h3>
        <p class="mt-0.5 text-base">
            {{ $officer->rank }}/ {{ $officer->nick_name }}
        </p>
    </div>


    <form action="{{ route('store-weeklyofficeroperation', ['officer'=>$officer->id, 'fromtooperation'=>$fromtooperation->id]) }}" method="POST">
        @csrf
        @method('POST')

    <div
    class="mx-auto mt-8 grid w-full max-w-4xl grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:gap-6"
    >

    

        <div class="card p-4 sm:p-5">
            <div class="avatar h-12 w-12">
                <div class="is-initial rounded-full bg-info text-white">
                 السبت
                </div>
            </div>
            <h2
                class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100"
            >
                
                {{ date('Y-m-d', strtotime($fromtooperation->from. ' + 0 day'))  }}
                
            </h2>
            @foreach ($satoperations as $index => $satoperation)
                                    
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-2">
                <select name="satoperations[{{$index}}][dailyoperation_id]"
                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">               
                    <option>-- اختر التشغيل --</option>
                    @foreach ($dailyoperations as $dailyoperation)
                        <option @if($satoperation->dailyoperation_id == $dailyoperation->id) selected @endif value="{{ $dailyoperation->id }}">
                            &nbsp; &nbsp; &nbsp; {{ $dailyoperation->name }} 
                        </option>
                    @endforeach
                </select>
                </div>    
                @if($satoperations->count() > 1)
                    <div>
                        <button wire:click.prevent="removeOperation({{$satoperation->id}}, 'satoperations', '{{ $satoperations->first->id->day }}')" class="btn h-9 w-9 p-0 font-medium text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                          </button>


                    </div>
                @endif
            </div>    
            @endforeach 
            <div class="mt-5 pb-1">

                <button wire:click.prevent="addOperation('sat', 'satoperations')"
                    class="btn bg-primary/10 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25"
                  >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                  </svg>
                  &nbsp;<span> تشغيل اضافي</span>
                  </button>
   
            </div>
        </div>

        <div class="card p-4 sm:p-5">
            <div class="avatar h-12 w-12">
                <div class="is-initial rounded-full bg-warning text-white">
                الاحد
                </div>
            </div>
            <h2
                class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100"
            >
            {{ date('Y-m-d', strtotime($fromtooperation->from. ' + 1 day'))  }}
            </h2>
            
            @foreach ($sunoperations as $index => $sunoperation)
                                    
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-2">
                <select name="sunoperations[{{$index}}][dailyoperation_id]"
                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">               
                    <option>-- اختر التشغيل --</option>
                    @foreach ($dailyoperations as $dailyoperation)
                        <option @if($sunoperation->dailyoperation_id == $dailyoperation->id) selected @endif value="{{ $dailyoperation->id }}">
                            &nbsp; &nbsp; &nbsp; {{ $dailyoperation->name }} 
                        </option>
                    @endforeach
                </select>
                </div>    
                @if($sunoperations->count() > 1)
                    <div>
                        <button wire:click.prevent="removeOperation({{$sunoperation->id}}, 'sunoperations', '{{ $sunoperations->first->id->day }}')" class="btn h-9 w-9 p-0 font-medium text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                          </button>


                    </div>
                @endif
            </div>    
            @endforeach 
            <div class="mt-5 pb-1">

                <button wire:click.prevent="addOperation('sun', 'sunoperations')"
                    class="btn bg-primary/10 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25"
                  >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                  </svg>
                  &nbsp;<span> تشغيل اضافي</span>
                  </button>
   
            </div>

        </div>

        <div class="card p-4 sm:p-5">
            <div class="avatar h-12 w-12">
                <div class="is-initial rounded-full bg-secondary text-white">
                الاثنين
                </div>
            </div>
            <h2
                class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100"
            >
            {{ date('Y-m-d', strtotime($fromtooperation->from. ' + 2 day'))  }}
            </h2>
            
            @foreach ($monoperations as $index => $monoperation)
                                    
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-2">
                <select name="monoperations[{{$index}}][dailyoperation_id]"
                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">               
                    <option>-- اختر التشغيل --</option>
                    @foreach ($dailyoperations as $dailyoperation)
                        <option @if($monoperation->dailyoperation_id == $dailyoperation->id) selected @endif value="{{ $dailyoperation->id }}">
                            &nbsp; &nbsp; &nbsp; {{ $dailyoperation->name }} 
                        </option>
                    @endforeach
                </select>
                </div>    
                @if($monoperations->count() > 1)
                    <div>
                        <button wire:click.prevent="removeOperation({{$monoperation->id}}, 'monoperations', '{{ $monoperations->first->id->day }}')" class="btn h-9 w-9 p-0 font-medium text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                          </button>


                    </div>
                @endif
            </div>    
            @endforeach 
            <div class="mt-5 pb-1">

                <button wire:click.prevent="addOperation('mon', 'monoperations')"
                    class="btn bg-primary/10 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25"
                  >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                  </svg>
                  &nbsp;<span> تشغيل اضافي</span>
                  </button>
   
            </div>

        </div>

        <div class="card p-4 sm:p-5">
            <div class="avatar h-12 w-12">
                <div
                class="is-initial rounded-full bg-primary text-white dark:bg-accent"
                >
                الثلاثاء
                </div>
            </div>
            <h2
                class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100"
            >
            {{ date('Y-m-d', strtotime($fromtooperation->from. ' + 3 day'))  }}
            </h2>
            
            @foreach ($tueoperations as $index => $tueoperation)
                                    
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-2">
                <select name="tueoperations[{{$index}}][dailyoperation_id]"
                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">               
                    <option>-- اختر التشغيل --</option>
                    @foreach ($dailyoperations as $dailyoperation)
                        <option @if($tueoperation->dailyoperation_id == $dailyoperation->id) selected @endif value="{{ $dailyoperation->id }}">
                            &nbsp; &nbsp; &nbsp; {{ $dailyoperation->name }} 
                        </option>
                    @endforeach
                </select>
                </div>    
                @if($tueoperations->count() > 1)
                    <div>
                        <button wire:click.prevent="removeOperation({{$tueoperation->id}}, 'tueoperations', '{{ $tueoperations->first->id->day }}')" class="btn h-9 w-9 p-0 font-medium text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                          </button>


                    </div>
                @endif
            </div>    
            @endforeach 
            <div class="mt-5 pb-1">

                <button wire:click.prevent="addOperation('tue', 'tueoperations')"
                    class="btn bg-primary/10 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25"
                  >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                  </svg>
                  &nbsp;<span> تشغيل اضافي</span>
                  </button>
   
            </div>

        </div>

        <div class="card p-4 sm:p-5">
            <div class="avatar h-12 w-12">
                <div class="is-initial rounded-full bg-error text-white">
                الاربعاء
                </div>
            </div>
            <h2
                class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100"
            >
                {{ date('Y-m-d', strtotime($fromtooperation->from. ' + 4 day'))  }}
            </h2>
            
            @foreach ($wedoperations as $index => $wedoperation)
                                    
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-2">
                <select name="wedoperations[{{$index}}][dailyoperation_id]"
                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">               
                    <option>-- اختر التشغيل --</option>
                    @foreach ($dailyoperations as $dailyoperation)
                        <option @if($wedoperation->dailyoperation_id == $dailyoperation->id) selected @endif value="{{ $dailyoperation->id }}">
                            &nbsp; &nbsp; &nbsp; {{ $dailyoperation->name }} 
                        </option>
                    @endforeach
                </select>
                </div>    
                @if($wedoperations->count() > 1)
                    <div>
                        <button wire:click.prevent="removeOperation({{$wedoperation->id}}, 'wedoperations', '{{ $wedoperations->first->id->day }}')" class="btn h-9 w-9 p-0 font-medium text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                          </button>


                    </div>
                @endif
            </div>    
            @endforeach 
            <div class="mt-5 pb-1">

                <button wire:click.prevent="addOperation('wed', 'wedoperations')"
                    class="btn bg-primary/10 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25"
                  >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                  </svg>
                  &nbsp;<span> تشغيل اضافي</span>
                  </button>
   
            </div>

        </div>

        <div class="card p-4 sm:p-5">
            <div class="avatar h-12 w-12">
                <div class="is-initial rounded-full bg-success text-white">
                الخميس
                </div>
            </div>
            <h2
                class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100"
            >
                {{ date('Y-m-d', strtotime($fromtooperation->from. ' + 5 day'))  }}
            </h2>
            
            @foreach ($thuoperations as $index => $thuoperation)
                                    
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-2">
                <select name="thuoperations[{{$index}}][dailyoperation_id]"
                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">               
                    <option>-- اختر التشغيل --</option>
                    @foreach ($dailyoperations as $dailyoperation)
                        <option @if($thuoperation->dailyoperation_id == $dailyoperation->id) selected @endif value="{{ $dailyoperation->id }}">
                            &nbsp; &nbsp; &nbsp; {{ $dailyoperation->name }} 
                        </option>
                    @endforeach
                </select>
                </div>    
                @if($thuoperations->count() > 1)
                    <div>
                        <button wire:click.prevent="removeOperation({{$thuoperation->id}}, 'thuoperations', '{{ $thuoperations->first->id->day }}')" class="btn h-9 w-9 p-0 font-medium text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                          </button>


                    </div>
                @endif
            </div>    
            @endforeach 
            <div class="mt-5 pb-1">

                <button wire:click.prevent="addOperation('thu', 'thuoperations')"
                    class="btn bg-primary/10 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25"
                  >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                  </svg>
                  &nbsp;<span> تشغيل اضافي</span>
                  </button>
   
            </div>

        </div>

        <div class="card p-4 sm:p-5">
            <div class="avatar h-12 w-12">
                <div class="is-initial rounded-full bg-info text-white">
                الجمعة
                </div>
            </div>
            <h2
                class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100"
            >
            {{ date('Y-m-d', strtotime($fromtooperation->from. ' + 6 day'))  }}
            </h2>
            
            @foreach ($frioperations as $index => $frioperation)
                                    
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-2">
                <select name="frioperations[{{$index}}][dailyoperation_id]"
                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">               
                    <option>-- اختر التشغيل --</option>
                    @foreach ($dailyoperations as $dailyoperation)
                        <option @if($frioperation->dailyoperation_id == $dailyoperation->id) selected @endif value="{{ $dailyoperation->id }}">
                            &nbsp; &nbsp; &nbsp; {{ $dailyoperation->name }} 
                        </option>
                    @endforeach
                </select>
                </div>    
                @if($frioperations->count() > 1)
                    <div>
                        <button wire:click.prevent="removeOperation({{$frioperation->id}}, 'frioperations', '{{ $frioperations->first->id->day }}')" class="btn h-9 w-9 p-0 font-medium text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                          </button>


                    </div>
                @endif
            </div>    
            @endforeach 
            <div class="mt-5 pb-1">

                <button wire:click.prevent="addOperation('fri', 'frioperations')"
                    class="btn bg-primary/10 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25"
                  >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                  </svg>
                  &nbsp;<span> تشغيل اضافي</span>
                  </button>
   
            </div>

        </div>
        

        
    </div>
    <div class="text-center mt-5 ">
        
        <input style="width: 67%;" class="btn bg-success font-medium text-white hover:bg-success-focus hover:shadow-lg hover:shadow-success/50 focus:bg-success-focus focus:shadow-lg focus:shadow-success/50 active:bg-success-focus/90" type="submit" value="حفظ التشغيل">

    </div>
    </form>


    
</div>
