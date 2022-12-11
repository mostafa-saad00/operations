<div>
    {{-- Be like water. --}}
    <div class="">
        

        <div class="card-body">
            <table class="table" id="products_table">
                <thead>
                
                </thead>
                <tbody>
              
                @foreach ($officerTrainings as $index => $officerTraining)
                    <tr>
                        <td>
                            <select name="officerTrainings[{{$index}}]"
                                    wire:model="officerTrainings.{{$index}}"
                                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">               
                                <option>-- اختر الفرقة --</option>
                                @foreach ($trainings as $training)
                                    <option value="{{ $training->id }}">
                                        &nbsp; &nbsp; &nbsp; {{ $training->name }} 
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <button wire:click.prevent="removeTraining({{$index}})"
                            class="btn h-9 w-9 p-0 font-medium text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25"
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="h-5 w-5"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                            >
                              <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                              />
                            </svg>
                          </button>
                        </td>
                    </tr>
                @endforeach
               
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-12">
                    <button wire:click.prevent="addTraining"
                    class="btn mt-3 space-x-reverse space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                  >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                  </svg>
                    <span> اضافة فرقة </span>
                  </button>

                    
                </div>
            </div>
        </div>

    </div>    
</div>
