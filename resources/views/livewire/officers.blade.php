<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <x-slot name="header">
        <div class="row">
            <div class="col-md-10">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('الضباط') }}
                </h2>
            </div>
            <div class="col-md-2">
                <a href="{{ route('create-officer') }}" class="btn btn-outline-warning">اضافة ضابط</a>
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
                        <th scope="col">الاسم</th>
                        <th scope="col">اسم الشهرة</th>
                        <th scope="col">رقم التليفون</th>
                        <th scope="col">العنوان</th>
                        <th scope="col">تعديل</th>
                        <th scope="col">حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div style="display: none">{{ $id = 1 }}</div>
                        @forelse($officers as $officer)  
                            <tr>
                                <th scope="row">{{ $id++ }}</th>
                                <td>{{ $officer->name }}</td>
                                <td>{{ $officer->nick_name }}</td>
                                <td>{{ $officer->phone }}</td>
                                <td>{{ $officer->address }}</td>
                                <td>
                                    <a href="{{ route('edit-officer', $officer->id) }}" class="btn btn-outline-primary">تعديل</a>
                                </td>
                                <td>
                                    <form id="deleteform" onsubmit="return confirm('هل تريد حذف الضابط؟');" action="{{ route('destroy-officer', $officer->id) }}" method="POST">
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
