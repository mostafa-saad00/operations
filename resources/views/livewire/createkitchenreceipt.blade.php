<div>
    {{-- Be like water. --}}

    <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
    
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <label class="block">
            <span class="font-bold">جهة التوريد</span>
            <span class="relative mt-1.5 flex">
                <select wire:model="kitchensupplier_id" name="kitchensupplier_id"
                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                >
                <option value="">اختر جهة التوريد</option> 
                @foreach ($kitchensuppliers as $kitchensupplier)   
                    <option value="{{ $kitchensupplier->id }}">{{ $kitchensupplier->name }}</option>
                @endforeach

                </select>
                
            </span>
        </label>

        <br>

        @foreach ($kitchenitems as $kitchenitem)

        <div>
            <span class="font-bold">{{ $kitchenitem->name }}</span>
            <label class="mt-1 flex space-x-reverse -space-x-px">
            
            <input
                name="kitchenitem_{{ $kitchenitem->id }}"
                class="form-input w-full border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                placeholder="(اختياري)"
                step="any"
                type="number"
            />
            <span
                class="flex items-center justify-center rounded-l-lg border border-slate-300 bg-slate-150 px-3.5 font-inter text-slate-800 dark:border-navy-450 dark:bg-navy-500 dark:text-navy-100"
            >
                <span>{{ $kitchenitem->unit }}</span>
            </span>
            </label>
        </div>
        @endforeach
 
    </div>
  
</div>
