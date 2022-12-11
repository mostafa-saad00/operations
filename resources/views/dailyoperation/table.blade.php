<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-md-10">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('جدول الخدمات اليومي') }} 
                </h2>
            </div>
        
            
        </div> 
        
    </x-slot>

    <style>
        .my-table tr { line-height: 14px; }
    </style>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="printDiv" class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg print">
                
                <button class="btn btn-danger float-left" id="print_button" onclick="printDiv()">طباعة</button>

                <div class="container">
                    <div class="row">
                        
                        @foreach ($gehats as $gehat)
                        <div style="display: none">{{ $id = 1 }}</div>
                            <div class="col-6">
                                <div class="p-3 mb-2 bg-dark text-white text-center"> {{ $gehat->name }} ( {{ $gehat->officers()->count() }} ضابط ) </div>
                                <table class="table table-light table-bordered border-dark my-table">  
                                    <thead> 
                                    <tr>
                                        <th  scope="row">م</th>                
                                        <th  scope="row">الرتبة</th>                
                                        <th  scope="row">الاسم</th>                
                                        <th  scope="row">العمل القائم به</th>                
                                        <th  scope="row">التشغيل</th>                
                                    
                                    </tr>

                                    </thead>

                                    @foreach ($gehat->officers as $officer)

                                        <tbody>
                                            
                                            <tr>
                                            <td >{{ $id++ }}</td>                 
                                            <td>{{ $officer->rank }}</td>
                                            <td>{{ $officer->nick_name }}</td>
                                            <td>{{ $officer->what_he_do }}</td>
                                            <td>
                                                @foreach ($weeklyOfficerOperations->where('officer_id', $officer->id) as $operation)
                                                    {{ App\Models\Dailyoperation::where('id', $operation->dailyoperation_id)->first()->name }}
                                                    <br>
                                                @endforeach
                                            </td>
                                            </tr>
                    
                                        </tbody>
                                    @endforeach
                                    
                                </table>
                            </div>

                        @endforeach
                        




                    </div>
                </div>





                
            </div>
        </div>
    </div>


    <script>
        function printDiv()
        {

            var printContent = document.getElementById('printDiv').innerHTML;
            var originalContent = document.body.innerHTML;
            document.body.innerHTML = printContent;
            window.print();

            
        }
    </script>


</x-app-layout>    