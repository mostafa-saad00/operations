<div>
    {{-- Do your work, then step back. --}}
    {{-- Because she competes with no one, no one can compete with her. --}}
    <x-slot name="header">
        <div class="row">
            <div class="col-md-11">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    @if ($fromtooperation)
                        
                    
                    التشغيل الاسبوعي من السبت  {{ $fromtooperation->from }} حتي الجمعة {{ $fromtooperation->to }}
                        
                    @else
                        
                    @endif
                </h2>
            </div>

            <div class="col-md-1">
                <a href="{{ route('index-fromtooperations') }}" class="btn btn-secondary">       
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
                <input wire:model="searchTerm" type="text" class="form-control" placeholder="بحث..." autofocus>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">الرتبة</th>
                        <th scope="col">الضابط</th>
                        <th scope="col">تعديل</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($fromtooperation)
                        <div style="display: none">{{ $id = 1 }}</div>
                        @forelse($officers as $officer)  
                            <tr>
                                <th scope="row">{{ $id++ }}</th>
                                <td>نقيب</td>
                                <td>{{ $officer->name }}</td>
                                <td>
                                    <a href="{{ url('/create-weeklyofficeroperation') }}/{{ $officer->id }}/{{ $fromtooperation->id }}" class="btn btn-outline-primary">تعديل التشغيل الاسبوعي للضابط</a>
                                </td>
                                
                            </tr>

                        @empty
                            <tr>
                                <td>لا يوجد بيانات</td>
                            </tr>

                        @endforelse
                        @else
                            <tr>
                                <td>لا يوجد بيانات</td>
                            </tr>
                        @endif    
                    </tbody>
                    </table>
            </div>
        </div>
    </div>

    
</div>
