<div>
    {{-- Be like water. --}}
    <div class="card">
        

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
                                class="form-control">               
                                <option>-- اختر الفرقة --</option>
                                @foreach ($trainings as $training)
                                    <option value="{{ $training->id }}">
                                        &nbsp; &nbsp; &nbsp; {{ $training->name }} 
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <a href="#" wire:click.prevent="removeTraining({{$index}})">حذف</a>
                        </td>
                    </tr>
                @endforeach
               
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-sm btn-secondary"
                        wire:click.prevent="addTraining">+ اضافة فرقة 
                    </button>
                </div>
            </div>
        </div>

    </div>    
</div>
