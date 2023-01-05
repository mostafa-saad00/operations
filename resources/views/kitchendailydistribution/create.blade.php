<x-app-layout>
    <x-slot name="pageTitle">
        
    </x-slot>

    <x-slot name="header">
        
    </x-slot>


    <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
        
        <div class="col-span-12 lg:col-span-12">
          <div class="card">
            <div
              class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5"
            >
              <h2
                class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100"
              >
                انشاء صرف يومي جديد
              </h2>
              
            </div>
            <div class="p-4 sm:p-5">

              

                <form action="{{ route('store-kitchendailydistribution') }}" method="POST">
                    @csrf

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
               
              <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            

                
                <label class="block">
                    <span class="font-bold">عدد الضباط</span>
                    <span class="relative mt-1.5 flex">
                        <input name="officers_number"
                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        type="number"
                      />
                      
                    </span>
                  </label>
                
                  <label class="block">
                      <span class="font-bold">عدد الافراد</span>
                      <span class="relative mt-1.5 flex">
                          <input name="amens_number"
                          class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                          type="number"
                        />
                        
                      </span>
                    </label>
                  <label class="block">
                    <span class="font-bold">عدد المجندين</span>
                    <span class="relative mt-1.5 flex">
                      <input name="soliders_number"
                          class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                          type="number"
                        />
                      
                     
                    </span>
                  </label>

                  <label class="block">
                    <span class="font-bold">التاريخ</span>
                    <span class="relative mt-1.5 flex">
                      <input
                        x-init="$el._x_flatpickr = flatpickr($el)"
                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pr-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="اختر التاريخ"
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
                     
                    </span>
                  </label>
 
              </div>

              <div>
              
                <div class="flex items-center justify-between pt-4">
                  <div class="flex items-center space-x-4 space-x-reverse">
                    
                  </div>
                  <div class="flex justify-center space-x-2 space-x-reverse">
                    
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
