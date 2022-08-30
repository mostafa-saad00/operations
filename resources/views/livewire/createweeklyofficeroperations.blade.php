<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <x-slot name="header">


        <div class="row">
            <div class="col-md-11">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    تعديل التشغيل الاسبوعي للضابط/ {{ $officer->name }} 
                </h2>
            </div>
            <div class="col-md-1">
                <a href="{{ route('index-weeklyofficeroperations', $fromtooperation->id) }}" class="btn btn-secondary">       
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                        <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"></path>
                    </svg>
                    
                </a>
            </div>
            
        </div> 
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">   
                <form action="{{ route('store-weeklyofficeroperation', ['officer'=>$officer->id, 'fromtooperation'=>$fromtooperation->id]) }}" method="POST">
                    @csrf
                    @method('POST')
                    <!-- Card Body -->
                    <div class="card">
                        <div class="card-header">
                            من السبت {{ $fromtooperation->from }} حتي الجمعة {{ $fromtooperation->to }}
                        </div>
            
                        <div class="card-body">
                            <table class="table" id="products_table">
                                <thead>
                                <tr>
                                    <th>يوم السبت</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                              
                                @foreach ($satoperations as $index => $satoperation)
                                    <tr>
                                        <td>
                                            <select name="satoperations[{{$index}}][dailyoperation_id]"
                                            class="form-control">               
                                                <option>-- اختر التشغيل --</option>
                                                @foreach ($dailyoperations as $dailyoperation)
                                                    <option @if($satoperation->dailyoperation_id == $dailyoperation->id) selected @endif value="{{ $dailyoperation->id }}">
                                                        &nbsp; &nbsp; &nbsp; {{ $dailyoperation->name }} 
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        @if($satoperations->count() > 1)
                                        <td>
                                            <a href="#" wire:click.prevent="removeOperation({{$satoperation->id}}, 'satoperations', '{{ $satoperations->first->id->day }}')">حذف</a>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                               
                                </tbody>
                            </table>
            
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-sm btn-secondary"
                                        wire:click.prevent="addOperation('sat', 'satoperations')">+ تشغيل اضافي
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card Body -->

                    <!-- Card Body -->
                    <div class="card mt-3">
                        <div class="card-header">
                        </div>
            
                        <div class="card-body">
                            <table class="table" id="products_table">
                                <thead>
                                <tr>
                                    <th>يوم الاحد</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($sunoperations as $index => $sunoperation)
                                    <tr>
                                        <td>
                                            <select name="sunoperations[{{$index}}][dailyoperation_id]"
                                                    class="form-control">
                                                <option value="">-- اختر التشغيل --</option>
                                                @foreach ($dailyoperations as $dailyoperation)
                                                    <option @if($sunoperation->dailyoperation_id == $dailyoperation->id) selected @endif value="{{ $dailyoperation->id }}">
                                                        &nbsp; &nbsp; &nbsp; {{ $dailyoperation->name }} 
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        @if($sunoperations->count() > 1)
                                        <td>
                                            <a href="#" wire:click.prevent="removeOperation({{$sunoperation->id}}, 'sunoperations', '{{ $sunoperations->first->id->day }}')">حذف</a>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
            
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-sm btn-secondary"
                                        wire:click.prevent="addOperation('sun', 'sunoperations')">+ تشغيل اضافي</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card Body -->
                    
                    
                    <!-- Card Body -->
                    <div class="card mt-3">
                        <div class="card-header">
                        </div>
            
                        <div class="card-body">
                            <table class="table" id="products_table">
                                <thead>
                                <tr>
                                    <th>يوم الاثنين</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($monoperations as $index => $monoperation)
                                    <tr>
                                        <td>
                                            <select name="monoperations[{{$index}}][dailyoperation_id]"
                                                    class="form-control">
                                                <option value="">-- اختر التشغيل --</option>
                                                @foreach ($dailyoperations as $dailyoperation)
                                                    <option @if($monoperation->dailyoperation_id == $dailyoperation->id) selected @endif value="{{ $dailyoperation->id }}">
                                                        &nbsp; &nbsp; &nbsp; {{ $dailyoperation->name }} 
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        @if($monoperations->count() > 1)
                                        <td>
                                            <a href="#" wire:click.prevent="removeOperation({{$monoperation->id}}, 'monoperations', '{{ $monoperations->first->id->day }}')">حذف</a>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
            
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-sm btn-secondary"
                                        wire:click.prevent="addOperation('mon', 'monoperations')">+ تشغيل اضافي</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card Body -->



                    
                    <!-- Card Body -->
                    <div class="card mt-3">
                        <div class="card-header">
                        </div>
            
                        <div class="card-body">
                            <table class="table" id="products_table">
                                <thead>
                                <tr>
                                    <th>يوم الثلاثاء</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($tueoperations as $index => $tueoperation)
                                    <tr>
                                        <td>
                                            <select name="tueoperations[{{$index}}][dailyoperation_id]"
                                                    class="form-control">
                                                <option value="">-- اختر التشغيل --</option>
                                                @foreach ($dailyoperations as $dailyoperation)
                                                    <option @if($tueoperation->dailyoperation_id == $dailyoperation->id) selected @endif value="{{ $dailyoperation->id }}">
                                                        &nbsp; &nbsp; &nbsp; {{ $dailyoperation->name }} 
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        @if($tueoperations->count() > 1)
                                        <td>
                                            <a href="#" wire:click.prevent="removeOperation({{$tueoperation->id}}, 'tueoperations', '{{ $tueoperations->first->id->day }}')">حذف</a>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
            
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-sm btn-secondary"
                                        wire:click.prevent="addOperation('tue', 'tueoperations')">+ تشغيل اضافي</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card Body -->


                    
                    <!-- Card Body -->
                    <div class="card mt-3">
                        <div class="card-header">
                        </div>
            
                        <div class="card-body">
                            <table class="table" id="products_table">
                                <thead>
                                <tr>
                                    <th>يوم الاربعاء</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($wedoperations as $index => $wedoperation)
                                    <tr>
                                        <td>
                                            <select name="wedoperations[{{$index}}][dailyoperation_id]"
                                                    class="form-control">
                                                <option value="">-- اختر التشغيل --</option>
                                                @foreach ($dailyoperations as $dailyoperation)
                                                    <option @if($wedoperation->dailyoperation_id == $dailyoperation->id) selected @endif value="{{ $dailyoperation->id }}">
                                                        &nbsp; &nbsp; &nbsp; {{ $dailyoperation->name }} 
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        @if($wedoperations->count() > 1)
                                        <td>
                                            <a href="#" wire:click.prevent="removeOperation({{$wedoperation->id}}, 'wedoperations', '{{ $wedoperations->first->id->day }}')">حذف</a>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
            
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-sm btn-secondary"
                                        wire:click.prevent="addOperation('wed', 'wedoperations')">+ تشغيل اضافي</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card Body -->


                    
                    <!-- Card Body -->
                    <div class="card mt-3">
                        <div class="card-header">
                        </div>
            
                        <div class="card-body">
                            <table class="table" id="products_table">
                                <thead>
                                <tr>
                                    <th>يوم الخميس</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($thuoperations as $index => $thuoperation)
                                    <tr>
                                        <td>
                                            <select name="thuoperations[{{$index}}][dailyoperation_id]"
                                                    class="form-control">
                                                <option value="">-- اختر التشغيل --</option>
                                                @foreach ($dailyoperations as $dailyoperation)
                                                    <option @if($thuoperation->dailyoperation_id == $dailyoperation->id) selected @endif value="{{ $dailyoperation->id }}">
                                                        &nbsp; &nbsp; &nbsp; {{ $dailyoperation->name }} 
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        @if($thuoperations->count() > 1)
                                        <td>
                                            <a href="#" wire:click.prevent="removeOperation({{$thuoperation->id}}, 'thuoperations', '{{ $thuoperations->first->id->day }}')">حذف</a>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
            
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-sm btn-secondary"
                                        wire:click.prevent="addOperation('thu', 'thuoperations')">+ تشغيل اضافي</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card Body -->


                    
                    <!-- Card Body -->
                    <div class="card mt-3">
                        <div class="card-header">
                        </div>
            
                        <div class="card-body">
                            <table class="table" id="products_table">
                                <thead>
                                <tr>
                                    <th>يوم الجمعة</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($frioperations as $index => $frioperation)
                                    <tr>
                                        <td>
                                            <select name="frioperations[{{$index}}][dailyoperation_id]"
                                                    class="form-control">
                                                <option value="">-- اختر التشغيل --</option>
                                                @foreach ($dailyoperations as $dailyoperation)
                                                    <option @if($frioperation->dailyoperation_id == $dailyoperation->id) selected @endif value="{{ $dailyoperation->id }}">
                                                        &nbsp; &nbsp; &nbsp; {{ $dailyoperation->name }} 
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        @if($frioperations->count() > 1)
                                        <td>
                                            <a href="#" wire:click.prevent="removeOperation({{$frioperation->id}}, 'frioperations', '{{ $frioperations->first->id->day }}')">حذف</a>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
            
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-sm btn-secondary"
                                        wire:click.prevent="addOperation('fri', 'frioperations')">+ تشغيل اضافي</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card Body -->



                    <br />
                    <div>
                        <input class="btn btn-outline-primary" type="submit" value="حفظ التشغيل">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
