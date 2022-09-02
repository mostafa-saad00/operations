<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-md-10">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('التشغيل') }}
                </h2>
            </div>
            <div class="col-md-2">
                <a href="{{ route('create-dailyoperation') }}" class="btn btn-outline-warning">اضافة تشغيل</a>
            </div>
            
        </div> 
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">التشغيل</th>
                        <th scope="col">نوع التشغيل</th>
                        <th scope="col">الحالة</th>
                        <th scope="col">تعديل</th>
                        <th scope="col">حذف</th>
                      </tr>
                    </thead>
                    <tbody>
                        <div style="display: none">{{ $id = 1 }}</div>
                        @forelse($dailyoperations as $dailyoperation)
                            @if($dailyoperation->type == "تواجد مسائي" || $dailyoperation->type == "راحة اسبوعية" || $dailyoperation->type == "راحة تعويضية" || $dailyoperation->type == "راحة خدمة" || $dailyoperation->type == "اجازات" || $dailyoperation->type == "مرضي" || $dailyoperation->type == "مامورية سيناء" || $dailyoperation->type == "راحة مامورية سيناء" || $dailyoperation->type == "انتداب" || $dailyoperation->type == "فرق" || $dailyoperation->type == "عمل عادي" || $dailyoperation->type == "مبيت بالقطاع")  
                            
                            @else
                            <tr>
                                <th scope="row">{{ $id++ }}</th>
                                <td>{{ $dailyoperation->name }}</td>
                                <td>{{ $dailyoperation->type }}</td>
                                <td>@if($dailyoperation->status == 'active') مفعلة @else غير مفعلة @endif</td>
                                <td>
                                    <a href="{{ route('edit-dailyoperation', $dailyoperation->id) }}" class="btn btn-outline-primary">تعديل</a>
                                </td>
                                <td>
                                    <form id="deleteform" onsubmit="return confirm('هل تريد مسح التشغيل؟');" action="{{ route('destroy-dailyoperation', $dailyoperation->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger" type="submit">حذف</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
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
</x-app-layout>
