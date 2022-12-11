<x-app-layout>
    <x-slot name="header">


        <div class="row">
            <div class="col-md-11">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('اضافة تشغيل اسبوعي') }}
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

    <script>
        

        $( function() {

          

          $( "#dp" ).datepicker({
            dateformat: "yy-mm-dd",
            inline: true,
            numberOfmonths: [1, 2],
            dayNamesMin: ['Sat', 'Sun','Mon','Tue','Wed','Thu','Fri'],
            beforeShowDay: function(date) {
                var day = date.getDay();
                if(day == 6)
                    return [0]; 
                if(day == 5)
                    return [0];
                if(day == 4)
                    return [0];   
                if(day == 3)
                    return [0]; 
                if(day == 2)
                    return [0];  
                if(day == 1) 
                    return [0]; 
                else 
                    return [1];      
            }
          });
          


          $( "#datepicker" ).datepicker();
          $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
          $( "#datepicker2" ).datepicker();
          $( "#datepicker2" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
        } );
        </script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('store-fromtooperation') }}" method="POST">
                    @csrf
                    
                    <div class="py-2 mb-2">

                        <div class="row">
                            <div class="col">
                                <x-label for="name" class="mb-2" :value="__('من تاريخ')" />
                                <input id="dp" name="from" type="text" class="form-control" placeholder="اختر التاريخ من هنا">
                            </div>
                            <div class="col">
                                <x-label for="name" class="mb-2" :value="__('الي تاريخ')" />
                                <input id="datepicker2" name="to" type="text" class="form-control" placeholder="اختر التاريخ من هنا">
                            </div>
                          </div>

                        
                    </div>

                    <x-button class="ml-3">
                        {{ __('حفظ') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
