<x-app-layout>
    <x-slot name="header">


    </x-slot>

    <form action="{{ route('store-kitchenitem') }}" method="post">
        @csrf

        <div class="col-span-12 lg:col-span-8 xl:col-span-9">
            <div class="flex items-center space-x-2 space-x-reverse pb-4">
            <div
                class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light"
            >
                <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-full w-full"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"
                />
                </svg>
            </div>
            <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">
                اضافة صنف جديد
            </h4>
            </div>


            <div class="grid grid-cols-1 gap-4 sm:grid-cols-4">


                <label class="block">
                  <span class="font-bold">اسم الصنف</span>
                  <span class="relative mt-1.5 flex">
                      <input name="name"
                      class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                      placeholder="اسم الصنف"
                      type="text"
                    />
                    
                  </span>
                </label>

                <label class="block">
                  <span class="font-bold">جهة التوريد</span>
                  <span class="relative mt-1.5 flex">
                    <select name="kitchensupplier_id"
                    class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                    >
                      <option value="">اختر جهة التوريد</option> 
                      @foreach ($kitchensuppliers as $kitchensupplier)   
                        <option value="{{ $kitchensupplier->id }}">{{ $kitchensupplier->name }}</option>
                      @endforeach
  
                    </select>
                   
                  </span>
              </label>

                <label class="block">
                    <span class="font-bold">وحدة القياس</span>
                    <span class="relative mt-1.5 flex">
                      <select name="unit"
                      class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                      >
                        <option value="">اختر الوحدة</option>         
                        <option value="كيلو">كيلو</option>
                        <option value="جرام">جرام</option>
                        <option value="علبة">علبة</option>
                        <option value="فتلة">فتلة</option>
                        <option value="قطعة">قطعة</option>
    
                      </select>
                     
                    </span>
                </label>


              <label class="block">
                <span class="font-bold">الكمية الحالية</span>
                <span class="relative mt-1.5 flex">
                  <input name="current_quantity"
                      class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                      step="any"
                      type="number"
                    />
                  
                 
                </span>
              </label>

            </div>


            <div
            x-data="{expandedItem:'item-1'}"
            class="space-y-4 sm:space-y-5 mt-5"
            >
            <div class="card" x-data="accordionItem('item-1')">
                <div
                class="flex cursor-pointer items-center justify-between p-4"
                @click="expanded = !expanded"
                >
                <h3
                    class="text-base font-medium text-slate-700 dark:text-navy-100"
                >
                <div class="badge bg-primary text-white dark:bg-accent" style="font-size: 17px">يوم السبت</div>
 
                </h3>
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
                    
                <div class="px-4 pb-4">
                    
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

                        <label class="block">

                          <span class="font-bold">ضباط (شتاء)</span>
                          <span class="relative mt-1.5 flex">
                            <input name="saturday_winter_officer"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                step="any"
                                type="number"
                              />
                            
                           
                          </span>
                        </label>
                        <label class="block">

                            <span class="font-bold">افراد (شتاء)</span>
                            <span class="relative mt-1.5 flex">
                              <input name="saturday_winter_amen"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  step="any"
                                  type="number"
                                />
                              
                             
                            </span>
                          </label>
                          <label class="block">

                            <span class="font-bold">مجندين (شتاء)</span>
                            <span class="relative mt-1.5 flex">
                              <input name="saturday_winter_solider"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  step="any"
                                  type="number"
                                />
                              
                             
                            </span>
                          </label>

                          <label class="block">

                            <span class="font-bold">ضباط (صيف)</span>
                            <span class="relative mt-1.5 flex">
                              <input name="saturday_summer_officer"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  step="any"
                                  type="number"
                                />
                              
                             
                            </span>
                          </label>
                          <label class="block">
  
                              <span class="font-bold">افراد (صيف)</span>
                              <span class="relative mt-1.5 flex">
                                <input name="saturday_summer_amen"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    step="any"
                                    type="number"
                                  />
                                
                               
                              </span>
                            </label>
                            <label class="block">
  
                              <span class="font-bold">مجندين (صيف)</span>
                              <span class="relative mt-1.5 flex">
                                <input name="saturday_summer_solider"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    step="any"
                                    type="number"
                                  />
                                
                               
                              </span>
                            </label>

                      </div>
                    
                </div>
                </div>
            </div>

            <div class="card" x-data="accordionItem('item-2')">
                <div
                class="flex cursor-pointer items-center justify-between p-4"
                @click="expanded = !expanded"
                >
                <h3
                    class="text-base font-medium text-slate-700 dark:text-navy-100"
                >
                <div class="badge bg-secondary text-white" style="font-size: 17px">يوم الاحد</div>
                
                </h3>
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
                    
                <div class="px-4 pb-4">
                    
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

                        <label class="block">

                          <span class="font-bold">ضباط (شتاء)</span>
                          <span class="relative mt-1.5 flex">
                            <input name="sunday_winter_officer"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                step="any"
                                type="number"
                              />
                            
                           
                          </span>
                        </label>
                        <label class="block">

                            <span class="font-bold">افراد (شتاء)</span>
                            <span class="relative mt-1.5 flex">
                              <input name="sunday_winter_amen"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  step="any"
                                  type="number"
                                />
                              
                             
                            </span>
                          </label>
                          <label class="block">

                            <span class="font-bold">مجندين (شتاء)</span>
                            <span class="relative mt-1.5 flex">
                              <input name="sunday_winter_solider"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  step="any"
                                  type="number"
                                />
                              
                             
                            </span>
                          </label>

                          <label class="block">

                            <span class="font-bold">ضباط (صيف)</span>
                            <span class="relative mt-1.5 flex">
                              <input name="sunday_summer_officer"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  step="any"
                                  type="number"
                                />
                              
                             
                            </span>
                          </label>
                          <label class="block">
  
                              <span class="font-bold">افراد (صيف)</span>
                              <span class="relative mt-1.5 flex">
                                <input name="sunday_summer_amen"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    step="any"
                                    type="number"
                                  />
                                
                               
                              </span>
                            </label>
                            <label class="block">
  
                              <span class="font-bold">مجندين (صيف)</span>
                              <span class="relative mt-1.5 flex">
                                <input name="sunday_summer_solider"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    step="any"
                                    type="number"
                                  />
                                
                               
                              </span>
                            </label>

                      </div>
                    
                </div>
                </div>
            </div>

            <div class="card" x-data="accordionItem('item-3')">
                <div
                class="flex cursor-pointer items-center justify-between p-4"
                @click="expanded = !expanded"
                >
                <h3
                    class="text-base font-medium text-slate-700 dark:text-navy-100"
                >
                <div class="badge bg-info text-white" style="font-size: 17px">يوم الاثنين</div>
 
                </h3>
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
                    
                <div class="px-4 pb-4">
                    
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

                        <label class="block">

                          <span class="font-bold">ضباط (شتاء)</span>
                          <span class="relative mt-1.5 flex">
                            <input name="monday_winter_officer"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                step="any"
                                type="number"
                              />
                            
                           
                          </span>
                        </label>
                        <label class="block">

                            <span class="font-bold">افراد (شتاء)</span>
                            <span class="relative mt-1.5 flex">
                              <input name="monday_winter_amen"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  step="any"
                                  type="number"
                                />
                              
                             
                            </span>
                          </label>
                          <label class="block">

                            <span class="font-bold">مجندين (شتاء)</span>
                            <span class="relative mt-1.5 flex">
                              <input name="monday_winter_solider"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  step="any"
                                  type="number"
                                />
                              
                             
                            </span>
                          </label>

                          <label class="block">

                            <span class="font-bold">ضباط (صيف)</span>
                            <span class="relative mt-1.5 flex">
                              <input name="monday_summer_officer"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  step="any"
                                  type="number"
                                />
                              
                             
                            </span>
                          </label>
                          <label class="block">
  
                              <span class="font-bold">افراد (صيف)</span>
                              <span class="relative mt-1.5 flex">
                                <input name="monday_summer_amen"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    step="any"
                                    type="number"
                                  />
                                
                               
                              </span>
                            </label>
                            <label class="block">
  
                              <span class="font-bold">مجندين (صيف)</span>
                              <span class="relative mt-1.5 flex">
                                <input name="monday_summer_solider"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    step="any"
                                    type="number"
                                  />
                                
                               
                              </span>
                            </label>

                      </div>
                    
                </div>
                </div>
            </div>

            <div class="card" x-data="accordionItem('item-4')">
                <div
                class="flex cursor-pointer items-center justify-between p-4"
                @click="expanded = !expanded"
                >
                <h3
                    class="text-base font-medium text-slate-700 dark:text-navy-100"
                >
                <div class="badge bg-success text-white" style="font-size: 17px">يوم الثلاثاء</div>
 
                </h3>
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
                    
                <div class="px-4 pb-4">
                    
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

                        <label class="block">

                          <span class="font-bold">ضباط (شتاء)</span>
                          <span class="relative mt-1.5 flex">
                            <input name="tuesday_winter_officer"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                step="any"
                                type="number"
                              />
                            
                           
                          </span>
                        </label>
                        <label class="block">

                            <span class="font-bold">افراد (شتاء)</span>
                            <span class="relative mt-1.5 flex">
                              <input name="tuesday_winter_amen"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  step="any"
                                  type="number"
                                />
                              
                             
                            </span>
                          </label>
                          <label class="block">

                            <span class="font-bold">مجندين (شتاء)</span>
                            <span class="relative mt-1.5 flex">
                              <input name="tuesday_winter_solider"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  step="any"
                                  type="number"
                                />
                              
                             
                            </span>
                          </label>

                          <label class="block">

                            <span class="font-bold">ضباط (صيف)</span>
                            <span class="relative mt-1.5 flex">
                              <input name="tuesday_summer_officer"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  step="any"
                                  type="number"
                                />
                              
                             
                            </span>
                          </label>
                          <label class="block">
  
                              <span class="font-bold">افراد (صيف)</span>
                              <span class="relative mt-1.5 flex">
                                <input name="tuesday_summer_amen"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    step="any"
                                    type="number"
                                  />
                                
                               
                              </span>
                            </label>
                            <label class="block">
  
                              <span class="font-bold">مجندين (صيف)</span>
                              <span class="relative mt-1.5 flex">
                                <input name="tuesday_summer_solider"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    step="any"
                                    type="number"
                                  />
                                
                               
                              </span>
                            </label>

                      </div>
                    
                </div>
                </div>
            </div>

            <div class="card" x-data="accordionItem('item-5')">
                <div
                class="flex cursor-pointer items-center justify-between p-4"
                @click="expanded = !expanded"
                >
                <h3
                    class="text-base font-medium text-slate-700 dark:text-navy-100"
                >
                <div class="badge bg-warning text-white" style="font-size: 17px">يوم الاربعاء</div>
 
                </h3>
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
                    
                <div class="px-4 pb-4">
                    
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

                        <label class="block">

                          <span class="font-bold">ضباط (شتاء)</span>
                          <span class="relative mt-1.5 flex">
                            <input name="wednesday_winter_officer"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                step="any"
                                type="number"
                              />
                            
                           
                          </span>
                        </label>
                        <label class="block">

                            <span class="font-bold">افراد (شتاء)</span>
                            <span class="relative mt-1.5 flex">
                              <input name="wednesday_winter_amen"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  step="any"
                                  type="number"
                                />
                              
                             
                            </span>
                          </label>
                          <label class="block">

                            <span class="font-bold">مجندين (شتاء)</span>
                            <span class="relative mt-1.5 flex">
                              <input name="wednesday_winter_solider"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  step="any"
                                  type="number"
                                />
                              
                             
                            </span>
                          </label>

                          <label class="block">

                            <span class="font-bold">ضباط (صيف)</span>
                            <span class="relative mt-1.5 flex">
                              <input name="wednesday_summer_officer"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  step="any"
                                  type="number"
                                />
                              
                             
                            </span>
                          </label>
                          <label class="block">
  
                              <span class="font-bold">افراد (صيف)</span>
                              <span class="relative mt-1.5 flex">
                                <input name="wednesday_summer_amen"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    step="any"
                                    type="number"
                                  />
                                
                               
                              </span>
                            </label>
                            <label class="block">
  
                              <span class="font-bold">مجندين (صيف)</span>
                              <span class="relative mt-1.5 flex">
                                <input name="wednesday_summer_solider"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    step="any"
                                    type="number"
                                  />
                                
                               
                              </span>
                            </label>

                      </div>
                    
                </div>
                </div>
            </div>

            <div class="card" x-data="accordionItem('item-6')">
                <div
                class="flex cursor-pointer items-center justify-between p-4"
                @click="expanded = !expanded"
                >
                <h3
                    class="text-base font-medium text-slate-700 dark:text-navy-100"
                >
                <div class="badge bg-error text-white" style="font-size: 17px">يوم الخميس</div>
 
                </h3>
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
                    
                <div class="px-4 pb-4">
                    
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

                        <label class="block">

                          <span class="font-bold">ضباط (شتاء)</span>
                          <span class="relative mt-1.5 flex">
                            <input name="thursday_winter_officer"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                step="any"
                                type="number"
                              />
                            
                           
                          </span>
                        </label>
                        <label class="block">

                            <span class="font-bold">افراد (شتاء)</span>
                            <span class="relative mt-1.5 flex">
                              <input name="thursday_winter_amen"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  step="any"
                                  type="number"
                                />
                              
                             
                            </span>
                          </label>
                          <label class="block">

                            <span class="font-bold">مجندين (شتاء)</span>
                            <span class="relative mt-1.5 flex">
                              <input name="thursday_winter_solider"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  step="any"
                                  type="number"
                                />
                              
                             
                            </span>
                          </label>

                          <label class="block">

                            <span class="font-bold">ضباط (صيف)</span>
                            <span class="relative mt-1.5 flex">
                              <input name="thursday_summer_officer"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  step="any"
                                  type="number"
                                />
                              
                             
                            </span>
                          </label>
                          <label class="block">
  
                              <span class="font-bold">افراد (صيف)</span>
                              <span class="relative mt-1.5 flex">
                                <input name="thursday_summer_amen"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    step="any"
                                    type="number"
                                  />
                                
                               
                              </span>
                            </label>
                            <label class="block">
  
                              <span class="font-bold">مجندين (صيف)</span>
                              <span class="relative mt-1.5 flex">
                                <input name="thursday_summer_solider"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    step="any"
                                    type="number"
                                  />
                                
                               
                              </span>
                            </label>

                      </div>
                    
                </div>
                </div>
            </div>

            <div class="card" x-data="accordionItem('item-7')">
                <div
                class="flex cursor-pointer items-center justify-between p-4"
                @click="expanded = !expanded"
                >
                <h3
                    class="text-base font-medium text-slate-700 dark:text-navy-100"
                >
                <div class="badge bg-navy-700 text-white dark:bg-navy-900" style="font-size: 17px">يوم الجمعة</div>
 
                </h3>
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
                    
                <div class="px-4 pb-4">
                    
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

                        <label class="block">

                          <span class="font-bold">ضباط (شتاء)</span>
                          <span class="relative mt-1.5 flex">
                            <input name="friday_winter_officer"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                step="any"
                                type="number"
                              />
                            
                           
                          </span>
                        </label>
                        <label class="block">

                            <span class="font-bold">افراد (شتاء)</span>
                            <span class="relative mt-1.5 flex">
                              <input name="friday_winter_amen"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  step="any"
                                  type="number"
                                />
                              
                             
                            </span>
                          </label>
                          <label class="block">

                            <span class="font-bold">مجندين (شتاء)</span>
                            <span class="relative mt-1.5 flex">
                              <input name="friday_winter_solider"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  step="any"
                                  type="number"
                                />
                              
                             
                            </span>
                          </label>

                          <label class="block">

                            <span class="font-bold">ضباط (صيف)</span>
                            <span class="relative mt-1.5 flex">
                              <input name="friday_summer_officer"
                                  class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                  step="any"
                                  type="number"
                                />
                              
                             
                            </span>
                          </label>
                          <label class="block">
  
                              <span class="font-bold">افراد (صيف)</span>
                              <span class="relative mt-1.5 flex">
                                <input name="friday_summer_amen"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    step="any"
                                    type="number"
                                  />
                                
                               
                              </span>
                            </label>
                            <label class="block">
  
                              <span class="font-bold">مجندين (صيف)</span>
                              <span class="relative mt-1.5 flex">
                                <input name="friday_summer_solider"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    step="any"
                                    type="number"
                                  />
                                
                               
                              </span>
                            </label>

                      </div>

                      
                    
                </div>

                
                </div>

                
            </div>

            <div>
              
                <div class="flex items-center justify-between pt-4">
                  <div class="flex items-center space-x-4 space-x-reverse">
                    
                  </div>
                  <div class="flex justify-center space-x-2 space-x-reverse">
                    <button
                        type="button"
                        onclick="location.href='{{ route('index-kitchenitems') }}';"
                        class="btn min-w-[7rem] border border-slate-300 font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                    >
                      الغاء
                    </button>
                    <button
                    type="submit"
                      class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                    >
                      حفظ
                    </button>
                  </div>
                </div>
              </div>
 
            </div>
        </div>


    </form>

</x-app-layout>