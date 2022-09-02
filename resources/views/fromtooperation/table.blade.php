<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-md-10">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('جدول التشغيل الاسبوعي') }} من السبت {{ $fromtooperation->from }} الي الجمعة {{ $fromtooperation->to }}
                </h2>
            </div>
        
            
        </div> 
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <table class="table table-light table-bordered border-dark">
                    <thead class="thead-dark">
                      <tr>
                        <th class="table-dark" scope="col">اليوم</th>
                        @foreach ($averageOperations as $averageOperation)
                          <th class="table-dark" scope="col">{{ $averageOperation->nick_name }}</th>   
                        @endforeach
                        <th class="table-dark" scope="col">تواجد القادة</th>
                        <th class="table-dark" scope="col">الخدمات الطارئة</th>
                        <th class="table-dark" scope="col">راحات</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th class="table-dark" scope="row">السبت</th>
                        @foreach ($averageOperations as $averageOperation)
                        @if($weeklyofficeroperations->where('day', 'sat')->where('dailyoperation_id', $averageOperation->id)->first() !=  null)
                          <td>{{ $weeklyofficeroperations->where('day', 'sat')->where('dailyoperation_id', $averageOperation->id)->first()->officer->nick_name }}</td>
                        @else
                          <td></td>
                        @endif
                        @endforeach
                        
                        <td>
                          @foreach ($twagodOperations as $twagodOperation)
                            @if ($weeklyofficeroperations->where('day', 'sat')->where('dailyoperation_id', $twagodOperation->id)->first() != null)
                              @foreach ($weeklyofficeroperations->where('day', 'sat')->where('dailyoperation_id', $twagodOperation->id) as $operation)
                                  {{ $operation->officer->nick_name }}
                              @endforeach
                            @endif     
                          @endforeach
                        </td>

                        <td>
                          @foreach ($argentOperations as $argentOperation)
                            @if ($weeklyofficeroperations->where('day', 'sat')->where('dailyoperation_id', $argentOperation->id)->first() != null)
                              @foreach ($weeklyofficeroperations->where('day', 'sat')->where('dailyoperation_id', $argentOperation->id) as $operation)
                                  {{ $operation->officer->nick_name }}
                              @endforeach
                            @endif     
                          @endforeach
                        </td>

                        <td>
                          @foreach ($offDaysOperations as $offDaysOperation)
                            @if ($weeklyofficeroperations->where('day', 'sat')->where('dailyoperation_id', $offDaysOperation->id)->first() != null)
                              @foreach ($weeklyofficeroperations->where('day', 'sat')->where('dailyoperation_id', $offDaysOperation->id) as $operation)
                                  {{ $operation->officer->nick_name }}
                              @endforeach
                            @endif     
                          @endforeach
                        </td>
                        
                      </tr>
                      <tr>
                        <th class="table-dark" scope="row">الاحد</th>
                        @foreach ($averageOperations as $averageOperation)
                        @if($weeklyofficeroperations->where('day', 'sun')->where('dailyoperation_id', $averageOperation->id)->first() !=  null)
                          <td>{{ $weeklyofficeroperations->where('day', 'sun')->where('dailyoperation_id', $averageOperation->id)->first()->officer->nick_name }}</td>
                        @else
                          <td></td>
                        @endif
                        @endforeach
                        

                        <td>
                          @foreach ($twagodOperations as $twagodOperation)
                            @if ($weeklyofficeroperations->where('day', 'sun')->where('dailyoperation_id', $twagodOperation->id)->first() != null)
                              @foreach ($weeklyofficeroperations->where('day', 'sun')->where('dailyoperation_id', $twagodOperation->id) as $operation)
                                  {{ $operation->officer->nick_name }}
                              @endforeach
                            @endif     
                          @endforeach
                        </td>

                        <td>
                          @foreach ($argentOperations as $argentOperation)
                            @if ($weeklyofficeroperations->where('day', 'sun')->where('dailyoperation_id', $argentOperation->id)->first() != null)
                              @foreach ($weeklyofficeroperations->where('day', 'sun')->where('dailyoperation_id', $argentOperation->id) as $operation)
                                  {{ $operation->officer->nick_name }}
                              @endforeach
                            @endif     
                          @endforeach
                        </td>

                        <td>
                          @foreach ($offDaysOperations as $offDaysOperation)
                            @if ($weeklyofficeroperations->where('day', 'sun')->where('dailyoperation_id', $offDaysOperation->id)->first() != null)
                              @foreach ($weeklyofficeroperations->where('day', 'sun')->where('dailyoperation_id', $offDaysOperation->id) as $operation)
                                  {{ $operation->officer->nick_name }}
                              @endforeach
                            @endif     
                          @endforeach
                        </td>
                        
                      </tr>
                      <tr>
                        <th class="table-dark" scope="row">الاثنين</th>
                        @foreach ($averageOperations as $averageOperation)
                        @if($weeklyofficeroperations->where('day', 'mon')->where('dailyoperation_id', $averageOperation->id)->first() !=  null)
                          <td>{{ $weeklyofficeroperations->where('day', 'mon')->where('dailyoperation_id', $averageOperation->id)->first()->officer->nick_name }}</td>
                        @else
                          <td></td>
                        @endif
                        @endforeach
                        
                        <td>
                          @foreach ($twagodOperations as $twagodOperation)
                            @if ($weeklyofficeroperations->where('day', 'mon')->where('dailyoperation_id', $twagodOperation->id)->first() != null)
                              @foreach ($weeklyofficeroperations->where('day', 'mon')->where('dailyoperation_id', $twagodOperation->id) as $operation)
                                  {{ $operation->officer->nick_name }}
                              @endforeach
                            @endif     
                          @endforeach
                        </td>

                        <td>
                          @foreach ($argentOperations as $argentOperation)
                            @if ($weeklyofficeroperations->where('day', 'mon')->where('dailyoperation_id', $argentOperation->id)->first() != null)
                              @foreach ($weeklyofficeroperations->where('day', 'mon')->where('dailyoperation_id', $argentOperation->id) as $operation)
                                  {{ $operation->officer->nick_name }}
                              @endforeach
                            @endif     
                          @endforeach
                        </td>

                        <td>
                          @foreach ($offDaysOperations as $offDaysOperation)
                            @if ($weeklyofficeroperations->where('day', 'mon')->where('dailyoperation_id', $offDaysOperation->id)->first() != null)
                              @foreach ($weeklyofficeroperations->where('day', 'mon')->where('dailyoperation_id', $offDaysOperation->id) as $operation)
                                  {{ $operation->officer->nick_name }}
                              @endforeach
                            @endif     
                          @endforeach
                        </td>
                       
                      </tr>
                      <tr>
                        <th class="table-dark" scope="row">الثلاثاء</th>
                        @foreach ($averageOperations as $averageOperation)
                        @if($weeklyofficeroperations->where('day', 'tue')->where('dailyoperation_id', $averageOperation->id)->first() !=  null)
                          <td>{{ $weeklyofficeroperations->where('day', 'tue')->where('dailyoperation_id', $averageOperation->id)->first()->officer->nick_name }}</td>
                        @else
                          <td></td>
                        @endif
                        @endforeach
                        
                        <td>
                          @foreach ($twagodOperations as $twagodOperation)
                            @if ($weeklyofficeroperations->where('day', 'tue')->where('dailyoperation_id', $twagodOperation->id)->first() != null)
                              @foreach ($weeklyofficeroperations->where('day', 'tue')->where('dailyoperation_id', $twagodOperation->id) as $operation)
                                  {{ $operation->officer->nick_name }}
                              @endforeach
                            @endif     
                          @endforeach
                        </td>

                        <td>
                          @foreach ($argentOperations as $argentOperation)
                            @if ($weeklyofficeroperations->where('day', 'tue')->where('dailyoperation_id', $argentOperation->id)->first() != null)
                              @foreach ($weeklyofficeroperations->where('day', 'tue')->where('dailyoperation_id', $argentOperation->id) as $operation)
                                  {{ $operation->officer->nick_name }}
                              @endforeach
                            @endif     
                          @endforeach
                        </td>

                        <td>
                          @foreach ($offDaysOperations as $offDaysOperation)
                            @if ($weeklyofficeroperations->where('day', 'tue')->where('dailyoperation_id', $offDaysOperation->id)->first() != null)
                              @foreach ($weeklyofficeroperations->where('day', 'tue')->where('dailyoperation_id', $offDaysOperation->id) as $operation)
                                  {{ $operation->officer->nick_name }}
                              @endforeach
                            @endif     
                          @endforeach
                        </td>
                        
                      </tr>
                      <tr>
                        <th class="table-dark" scope="row">الاربعاء</th>
                        @foreach ($averageOperations as $averageOperation)
                        @if($weeklyofficeroperations->where('day', 'wed')->where('dailyoperation_id', $averageOperation->id)->first() !=  null)
                          <td>{{ $weeklyofficeroperations->where('day', 'wed')->where('dailyoperation_id', $averageOperation->id)->first()->officer->nick_name }}</td>
                        @else
                          <td></td>
                        @endif
                        @endforeach
                        
                        <td>
                          @foreach ($twagodOperations as $twagodOperation)
                            @if ($weeklyofficeroperations->where('day', 'wed')->where('dailyoperation_id', $twagodOperation->id)->first() != null)
                              @foreach ($weeklyofficeroperations->where('day', 'wed')->where('dailyoperation_id', $twagodOperation->id) as $operation)
                                  {{ $operation->officer->nick_name }}
                              @endforeach
                            @endif     
                          @endforeach
                        </td>

                        <td>
                          @foreach ($argentOperations as $argentOperation)
                            @if ($weeklyofficeroperations->where('day', 'wed')->where('dailyoperation_id', $argentOperation->id)->first() != null)
                              @foreach ($weeklyofficeroperations->where('day', 'wed')->where('dailyoperation_id', $argentOperation->id) as $operation)
                                  {{ $operation->officer->nick_name }}
                              @endforeach
                            @endif     
                          @endforeach
                        </td>

                        <td>
                          @foreach ($offDaysOperations as $offDaysOperation)
                            @if ($weeklyofficeroperations->where('day', 'wed')->where('dailyoperation_id', $offDaysOperation->id)->first() != null)
                              @foreach ($weeklyofficeroperations->where('day', 'wed')->where('dailyoperation_id', $offDaysOperation->id) as $operation)
                                  {{ $operation->officer->nick_name }}
                              @endforeach
                            @endif     
                          @endforeach
                        </td>
                       
                      </tr>
                      <tr>
                        <th class="table-dark" scope="row">الخميس</th>
                        @foreach ($averageOperations as $averageOperation)
                        @if($weeklyofficeroperations->where('day', 'thu')->where('dailyoperation_id', $averageOperation->id)->first() !=  null)
                          <td>{{ $weeklyofficeroperations->where('day', 'thu')->where('dailyoperation_id', $averageOperation->id)->first()->officer->nick_name }}</td>
                        @else
                          <td></td>
                        @endif
                        @endforeach
                        

                        <td>
                          @foreach ($twagodOperations as $twagodOperation)
                            @if ($weeklyofficeroperations->where('day', 'thu')->where('dailyoperation_id', $twagodOperation->id)->first() != null)
                              @foreach ($weeklyofficeroperations->where('day', 'thu')->where('dailyoperation_id', $twagodOperation->id) as $operation)
                                  {{ $operation->officer->nick_name }}
                              @endforeach
                            @endif     
                          @endforeach
                        </td>

                        <td>
                          @foreach ($argentOperations as $argentOperation)
                            @if ($weeklyofficeroperations->where('day', 'thu')->where('dailyoperation_id', $argentOperation->id)->first() != null)
                              @foreach ($weeklyofficeroperations->where('day', 'thu')->where('dailyoperation_id', $argentOperation->id) as $operation)
                                  {{ $operation->officer->nick_name }}
                              @endforeach
                            @endif     
                          @endforeach
                        </td>

                        <td>
                          @foreach ($offDaysOperations as $offDaysOperation)
                            @if ($weeklyofficeroperations->where('day', 'thu')->where('dailyoperation_id', $offDaysOperation->id)->first() != null)
                              @foreach ($weeklyofficeroperations->where('day', 'thu')->where('dailyoperation_id', $offDaysOperation->id) as $operation)
                                  {{ $operation->officer->nick_name }}
                              @endforeach
                            @endif     
                          @endforeach
                        </td>
                        
                      </tr>
                      <tr>
                        <th class="table-dark" scope="row">الجمعة</th>
                        @foreach ($averageOperations as $averageOperation)
                        @if($weeklyofficeroperations->where('day', 'fri')->where('dailyoperation_id', $averageOperation->id)->first() !=  null)
                          <td>{{ $weeklyofficeroperations->where('day', 'fri')->where('dailyoperation_id', $averageOperation->id)->first()->officer->nick_name }}</td>
                        @else
                          <td></td>
                        @endif
                        @endforeach
                        
                        <td>
                          @foreach ($twagodOperations as $twagodOperation)
                            @if ($weeklyofficeroperations->where('day', 'fri')->where('dailyoperation_id', $twagodOperation->id)->first() != null)
                              @foreach ($weeklyofficeroperations->where('day', 'fri')->where('dailyoperation_id', $twagodOperation->id) as $operation)
                                  {{ $operation->officer->nick_name }}
                              @endforeach
                            @endif     
                          @endforeach
                        </td>

                        <td>
                          @foreach ($argentOperations as $argentOperation)
                            @if ($weeklyofficeroperations->where('day', 'fri')->where('dailyoperation_id', $argentOperation->id)->first() != null)
                              @foreach ($weeklyofficeroperations->where('day', 'fri')->where('dailyoperation_id', $argentOperation->id) as $operation)
                                  {{ $operation->officer->nick_name }}
                              @endforeach
                            @endif     
                          @endforeach
                        </td>

                        <td>
                          @foreach ($offDaysOperations as $offDaysOperation)
                            @if ($weeklyofficeroperations->where('day', 'fri')->where('dailyoperation_id', $offDaysOperation->id)->first() != null)
                              @foreach ($weeklyofficeroperations->where('day', 'fri')->where('dailyoperation_id', $offDaysOperation->id) as $operation)
                                  {{ $operation->officer->nick_name }}
                              @endforeach
                            @endif     
                          @endforeach
                        </td>
                        
                      </tr>
                    </tbody>
                  </table>






                  <table class="table table-light table-bordered border-dark">
                    <thead class="thead-dark">
                      <tr>
                        <th class="table-dark" scope="col">الاجازات</th>
                        <th class="table-dark" scope="col">مرضي</th>           
                        <th class="table-dark" scope="col">مامورية سيناء</th>
                        <th class="table-dark" scope="col">راحة مامورية سيناء</th>
                        <th class="table-dark" scope="col">انتداب</th>   
                        <th class="table-dark" scope="col">فرق</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                            @if ($weeklyofficeroperations->where('dailyoperation_id', $agazatOperation->id)->first() != null)
                              @foreach ($weeklyofficeroperations->where('dailyoperation_id', $agazatOperation->id) as $operation)
                                  
                                  @if($currentOfficer1 == $operation->officer->nick_name)
                                   @continue
                                  
                                  @else
                                  {{ $currentOfficer1 = $operation->officer->nick_name }}
                                  @endif
                                  
                              @endforeach
                            @endif     
                        </td>

                        <td>
                          @if ($weeklyofficeroperations->where('dailyoperation_id', $maradiOperation->id)->first() != null)
                            @foreach ($weeklyofficeroperations->where('dailyoperation_id', $maradiOperation->id) as $operation)
                                
                                @if($currentOfficer2 == $operation->officer->nick_name)
                                 @continue
                                
                                @else
                                {{ $currentOfficer2 = $operation->officer->nick_name }}
                                @endif
                                
                            @endforeach
                          @endif     
                        </td>

                        <td>
                          @if ($weeklyofficeroperations->where('dailyoperation_id', $sinaOperation->id)->first() != null)
                            @foreach ($weeklyofficeroperations->where('dailyoperation_id', $sinaOperation->id) as $operation)
                                
                                @if($currentOfficer3 == $operation->officer->nick_name)
                                 @continue
                                
                                @else
                                {{ $currentOfficer3 = $operation->officer->nick_name }}
                                @endif
                                
                            @endforeach
                          @endif     
                      </td>

                      <td>
                        @if ($weeklyofficeroperations->where('dailyoperation_id', $sinaOffOperation->id)->first() != null)
                          @foreach ($weeklyofficeroperations->where('dailyoperation_id', $sinaOffOperation->id) as $operation)
                              
                              @if($currentOfficer4 == $operation->officer->nick_name)
                               @continue
                              
                              @else
                              {{ $currentOfficer4 = $operation->officer->nick_name }}
                              @endif
                              
                          @endforeach
                        @endif     
                    </td>

                    <td>
                      @if ($weeklyofficeroperations->where('dailyoperation_id', $antedabOperation->id)->first() != null)
                        @foreach ($weeklyofficeroperations->where('dailyoperation_id', $antedabOperation->id) as $operation)
                            
                            @if($currentOfficer5 == $operation->officer->nick_name)
                             @continue
                            
                            @else
                            {{ $currentOfficer5 = $operation->officer->nick_name }}
                            @endif
                            
                        @endforeach
                      @endif     
                  </td>

                  <td>
                    @if ($weeklyofficeroperations->where('dailyoperation_id', $ferakOperation->id)->first() != null)
                      @foreach ($weeklyofficeroperations->where('dailyoperation_id', $ferakOperation->id) as $operation)
                          
                          @if($currentOfficer6 == $operation->officer->nick_name)
                           @continue
                          
                          @else
                          {{ $currentOfficer6 = $operation->officer->nick_name }}
                          @endif
                          
                      @endforeach
                    @endif     
                </td>


                        
                        

                        
                        
                      </tr>
                      
                    </tbody>
                  </table>






                  
                  
            
            </div>
        </div>
    </div>
</x-app-layout>
