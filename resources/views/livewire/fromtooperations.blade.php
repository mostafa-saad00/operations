<div>
    {{-- Success is as dangerous as failure. --}}
    <x-slot name="header">
        <div class="row">
            <div class="col-md-10">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('التشغيل الاسبوعي') }}
                </h2>
            </div>
            <div class="col-md-2">
                <a href="{{ route('create-fromtooperation') }}" class="btn btn-outline-warning">اضافة تشغيل اسبوعي</a>
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
                        <th scope="col">من السبت الموافق</th>
                        <th scope="col">الي الجمعة الموافق</th>
                        <th scope="col">تعديل</th>
                        <th scope="col">حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div style="display: none">{{ $id = 1 }}</div>
                        @forelse($fromtooperations as $fromtooperation)  
                            <tr>
                                <th scope="row">{{ $id++ }}</th>
                                <td>{{ $fromtooperation->from }}</td>
                                <td>{{ $fromtooperation->to }}</td>
                                <td>
                                    <a href="{{ route('index-weeklyofficeroperations', $fromtooperation->id) }}" class="btn btn-outline-primary">التشغيل الاسبوعي للضباط</a>
                                </td>
                                <td>
                                    <form id="deleteform" onsubmit="return confirm('هل تريد حذف الضابط؟');" action="{{ route('destroy-fromtooperation', $fromtooperation->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger" type="submit">حذف</button>
                                    </form>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td>لا يوجد بيانات</td>
                            </tr>

                        @endforelse

                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
