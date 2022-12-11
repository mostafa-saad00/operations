<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <x-slot name="pageTitle">
        {{ __('الضباط') }}
    </x-slot>

    <x-slot name="header">
        {{ __('الضباط') }}
    </x-slot>

    <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
        <!-- Users Table -->
        <div>
          <div class="flex items-center justify-between">
            <h2
              class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100"
            >
              جدول بيانات الضباط
            </h2>

                            
            <div class="inline-flex col-span-6" >

                <input wire:model="searchTerm"
                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                placeholder="بحث..."
                type="text"
                autofocus
                />

                <select wire:model="algeha"
                    class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                >
                    <option value="">كل الجهات</option>
                    @forelse ($gehats as $gehat)
                    <option value="{{ $gehat->id }}">{{ $gehat->name }}</option>
                    @empty
                    <option>لا توجد جهات مضافة حتي الان</option>
                    @endforelse
                
                </select>

                
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
                      الصورة
                    </th>
                    <th
                      class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                    >
                      الاسم
                    </th>
                    <th
                      class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                    >
                      الرتبة
                    </th>
                    <th
                      class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                    >
                      تليفون
                    </th>
                    <th
                      class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                    >
                      الجهة
                    </th>
                    <th
                      class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                    >
                      الاقدمية
                    </th>

                    @if (auth()->user()->role == "admin") 
                    <th
                      class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                    >
                      العنوان
                    </th>             
                    <th
                      class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                    >
                      تعديل
                    </th>
                    <th
                      class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                    >
                      حذف
                      
                    </th>
                    @endif

                  </tr>
                </thead>
                <tbody>

                    
                    <div style="display: none">{{ $id = 1 }}</div>
                    @forelse($officers as $officer)  

                        <tr class="pointer border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                          <td onmouseover="$('.pointer').css('cursor', 'pointer');" style="" onclick="location.href='{{ route('show-officer', $officer->id) }}';" class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $id++ }}</td>
                            <td onmouseover="$('.pointer').css('cursor', 'pointer');" style="" onclick="location.href='{{ route('show-officer', $officer->id) }}';" class="whitespace-nowrap px-4 py-3 sm:px-5">
                                <div class="avatar flex h-10 w-10">
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
                              </td>
                              <td onmouseover="$('.pointer').css('cursor', 'pointer');" onclick="location.href='{{ route('show-officer', $officer->id) }}';">{{ $officer->nick_name }}</td>
                            <td onmouseover="$('.pointer').css('cursor', 'pointer');" onclick="location.href='{{ route('show-officer', $officer->id) }}';" class="whitespace-nowrap px-4 py-3 sm:px-5">
                              <div class=" badge bg-success text-white">{{ $officer->rank }}</div>
                            </td>
                            <td onmouseover="$('.pointer').css('cursor', 'pointer');" onclick="location.href='{{ route('show-officer', $officer->id) }}';" class="">{{ $officer->phone1 }}</td>
                            <td onmouseover="$('.pointer').css('cursor', 'pointer');" onclick="location.href='{{ route('show-officer', $officer->id) }}';" class="">{{ $officer->gehat->name }}</td>
                            <td onmouseover="$('.pointer').css('cursor', 'pointer');" onclick="location.href='{{ route('show-officer', $officer->id) }}';" class="">{{ $officer->year_of_graduate }}/{{ $officer->tarteb }}</td>
                            
                            @if (auth()->user()->role == "admin")
                            <td onmouseover="$('.pointer').css('cursor', 'pointer');" onclick="location.href='{{ route('show-officer', $officer->id) }}';">{{ $officer->address }}</td>     
                            <td class="text-center">
                                <button type="submit" onclick="location.href='{{ route('edit-officer', $officer->id) }}';" class="btn h-9 w-9 p-0 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </button>
                            </td>
                            <td class="text-center">
                                <form id="deleteform" onsubmit="return confirm('هل تريد حذف الضابط؟');" action="{{ route('destroy-officer', $officer->id) }}" method="POST">
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
                  <select wire:model="records"
                    class="form-select rounded-full border border-slate-300 bg-white px-2 py-1 pl-6 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                  >
                    <option selected value="15">15</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                  </select>
                </label>
                <span>سجلات</span>
              </div>

              {{ $officers->links() }}



            </div>
          </div>
        </div>



    </div>


    
   
</div>
