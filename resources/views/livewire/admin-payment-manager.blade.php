<div>      
   <div class="adm-main-content">
    <div class="row">

             <!--session message-->
             <div>
                  @if(session('success'))
                        <div class="alert alert-success mt-3" role="alert">
                        {{session('success')}}
                        </div>
                  @elseif(session('error'))
                        <div class="alert alert-danger mt-3" role="alert">
                        {{session('error')}}
                        </div>
                    @endif
             </div>
        <!-- Nav tabs -->
        <div class="custom-tab mt-5" wire:ignore> 
            <div class="tab-container">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#completed">City Completed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#pending">City Pending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tripcompleted">Trip Completed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#trippending">Trip Pending</a>
                    </li>
                </ul>
            </div>

            <div class="tab-content mb-5">
            
                <!---Completed Payment Chaincity--->
                <div class="tab-pane fade show active" id="completed" role="tabpanel">
                    <div class="table-responsive">
                            <table id="example4" class="display" style="min-width: 845px; border: 0;">
                                <thead style="border: 0;">
                                <tr class="th_tpc" style="border: 0;white-space:nowrap">
                                    <th>S/N</th>
                                    <th>User Details</th>
                                    <th>Transaction ID</th>
                                    <th>Payment ID</th>
                                    <th>Amount</th>
                                    <th>Transaction Status</th>
                                    <th>Transaction Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                            <!--all listing-->
                            @php($i=1)
                            @foreach ($completed as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-start gap-2">
                                            <div class="custom-control custom-checkbox ms-2 d-inline">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                                <label class="custom-control-label" for="customCheckBox2"></label>
                                            </div>
                                            <div class="apt_nit">
                                                <img src="{{$item->user->profile_photo}}" class="img-fluid w-100 h-100" style="border-radius:50%;border:1px solid black">
                                            </div>
                                            <div class="apt_ful">
                                                <span>{{ucwords($item->user->first_name)}}&nbsp;{{ucwords($item->user->last_name)}}</span>
                                                <small class="text-muted">{{ucwords($item->user->email)}}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td align="center">{{$item->transaction_id}}</td>
                                    <td align="center">{{$item->payment_id}}</td>
                                    <td align="center">${{number_format($item->amount)}}</td>
                                    <td align="center">
                                        @if($item->transaction_status=="completed")
                                         <p class="text-success fw-bold">{{$item->transaction_status}}</p>
                                        @else
                                          <p class="text-danger fw-bold">{{$item->transaction_status}}</p>
                                        @endif
                                    </td>
                                    <td align="center">{{$item->created_at}}</td>
                                    <td align="center">
                                        <i class="bi bi-three-dots-vertical dropdown-toggle" style="cursor:pointer" data-bs-toggle="dropdown"></i>
                                        <ul class="dropdown-menu dropdown-menu-end drop-action">
                                            <li><button class="dropdown-item" type="button" wire:click="ApproveTxn({{$item->id}})">Completed</button></li>
                                            <li><button class="dropdown-item" type="button" wire:click="DeclineTxn({{$item->id}})">Pending</button></li>
                                        </ul>  
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>


                <!---Pending Payment Chaincity--->
                <div class="tab-pane fade show" id="pending" role="tabpanel">
                    <div class="table-responsive">
                            <table id="example4" class="display" style="min-width: 845px; border: 0;">
                                <thead style="border: 0;">
                                <tr class="th_tpc" style="border: 0;white-space:nowrap">
                                    <th>S/N</th>
                                    <th>User Details</th>
                                    <th>Transaction ID</th>
                                    <th>Payment ID</th>
                                    <th>Amount</th>
                                    <th>Transaction Status</th>
                                    <th>Transaction Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                            <!--all listing-->
                            @php($i=1)
                            @foreach ($pending as $item)
                                <tr>
                                   <td>{{$i++}}</td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-start gap-2">
                                            <div class="custom-control custom-checkbox ms-2 d-inline">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                                <label class="custom-control-label" for="customCheckBox2"></label>
                                            </div>
                                            <div class="apt_nit">
                                                <img src="{{$item->user->profile_photo}}" class="img-fluid w-100 h-100" style="border-radius:50%;border:1px solid black">
                                            </div>
                                            <div class="apt_ful">
                                                <span>{{ucwords($item->user->first_name)}}&nbsp;{{ucwords($item->user->last_name)}}</span>
                                                <small class="text-muted">{{ucwords($item->user->email)}}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td align="center">{{$item->transaction_id}}</td>
                                    <td align="center">{{$item->payment_id}}</td>
                                    <td align="center">${{number_format($item->amount)}}</td>
                                    <td align="center">
                                        @if($item->transaction_status=="completed")
                                         <p class="text-success fw-bold">{{$item->transaction_status}}</p>
                                        @else
                                          <p class="text-danger fw-bold">{{$item->transaction_status}}</p>
                                        @endif
                                    </td>
                                    <td align="center">{{$item->created_at}}</td>
                                    <td align="center">
                                        <i class="bi bi-three-dots-vertical dropdown-toggle" style="cursor:pointer" data-bs-toggle="dropdown"></i>
                                        <ul class="dropdown-menu dropdown-menu-end drop-action">
                                            <li><button class="dropdown-item" type="button" wire:click="ApproveTxn({{$item->id}})">Completed</button></li>
                                            <li><button class="dropdown-item" type="button" wire:click="DeclineTxn({{$item->id}})">Pending</button></li>
                                        </ul>  
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>

                <!--chaincity trip completed payout-->
                <div class="tab-pane fade show" id="tripcompleted" role="tabpanel">
                    <div class="table-responsive">
                            <table id="example4" class="display" style="min-width: 845px; border: 0;">
                                <thead style="border: 0;">
                                <tr class="th_tpc" style="border: 0;white-space:nowrap">
                                    <th>S/N</th>
                                    <th>User Details</th>
                                    <th>Transaction ID</th>
                                    <th>Payment ID</th>
                                    <th>Amount</th>
                                    <th>Transaction Status</th>
                                    <th>Transaction Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                            <!--all listing-->
                            @php($i=1)
                            @foreach ($tripcompleted as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-start gap-2">
                                            <div class="custom-control custom-checkbox ms-2 d-inline">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                                <label class="custom-control-label" for="customCheckBox2"></label>
                                            </div>
                                            <div class="apt_nit">
                                                <img src="{{$item->user->profile_photo}}" class="img-fluid w-100 h-100" style="border-radius:50%;border:1px solid black">
                                            </div>
                                            <div class="apt_ful">
                                                <span>{{ucwords($item->user->first_name)}}&nbsp;{{ucwords($item->user->last_name)}}</span>
                                                <small class="text-muted">{{ucwords($item->user->email)}}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td align="center">{{$item->transaction_id}}</td>
                                    <td align="center">{{$item->payment_id}}</td>
                                    <td align="center">${{number_format($item->amount)}}</td>
                                    <td align="center">
                                        @if($item->transaction_status=="completed")
                                         <p class="text-success fw-bold">{{$item->transaction_status}}</p>
                                        @else
                                          <p class="text-danger fw-bold">{{$item->transaction_status}}</p>
                                        @endif
                                    </td>
                                    <td align="center">{{$item->created_at}}</td>
                                    <td align="center">
                                        <i class="bi bi-three-dots-vertical dropdown-toggle" style="cursor:pointer" data-bs-toggle="dropdown"></i>
                                        <ul class="dropdown-menu dropdown-menu-end drop-action">
                                            <li><button class="dropdown-item" type="button" wire:click="ApproveTxnTrip({{$item->id}})">Completed</button></li>
                                            <li><button class="dropdown-item" type="button" wire:click="DeclineTxnTrip({{$item->id}})">Pending</button></li>
                                        </ul>  
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
               </div>
            </div>

            <!--chaincity trip pending payout-->
            <div class="tab-pane fade show" id="trippending" role="tabpanel">
                <div class="table-responsive">
                        <table id="example4" class="display" style="min-width: 845px; border: 0;">
                            <thead style="border: 0;">
                            <tr class="th_tpc" style="border: 0;white-space:nowrap">
                                <td>S/N</td>
                                <th>User Details</th>
                                <th>Transaction ID</th>
                                <th>Payment ID</th>
                                <th>Amount</th>
                                <th>Transaction Status</th>
                                <th>Transaction Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                        <!--all listing-->
                        @php($i=1)
                        @foreach ($trippending as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-start gap-2">
                                        <div class="custom-control custom-checkbox ms-2 d-inline">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                            <label class="custom-control-label" for="customCheckBox2"></label>
                                        </div>
                                        <div class="apt_nit">
                                            <img src="{{$item->user->profile_photo}}" class="img-fluid w-100 h-100" style="border-radius:50%;border:1px solid black">
                                        </div>
                                        <div class="apt_ful">
                                            <span>{{ucwords($item->user->first_name)}}&nbsp;{{ucwords($item->user->last_name)}}</span>
                                            <small class="text-muted">{{ucwords($item->user->email)}}</small>
                                        </div>
                                    </div>
                                </td>
                                <td align="center">{{$item->transaction_id}}</td>
                                <td align="center">{{$item->payment_id}}</td>
                                <td align="center">${{number_format($item->amount)}}</td>
                                <td align="center">
                                    @if($item->transaction_status=="completed")
                                     <p class="text-success fw-bold">{{$item->transaction_status}}</p>
                                    @else
                                      <p class="text-danger fw-bold">{{$item->transaction_status}}</p>
                                    @endif
                                </td>
                                <td align="center">{{$item->created_at}}</td>
                                <td align="center">
                                    <i class="bi bi-three-dots-vertical dropdown-toggle" style="cursor:pointer" data-bs-toggle="dropdown"></i>
                                    <ul class="dropdown-menu dropdown-menu-end drop-action">
                                        <li><button class="dropdown-item" type="button" wire:click="ApproveTxnTrip({{$item->id}})">Completed</button></li>
                                        <li><button class="dropdown-item" type="button" wire:click="DeclineTxnTrip({{$item->id}})">Pending</button></li>
                                    </ul>  
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
           </div>
        </div>

        </div>
        </div>

      </div>
   </div>

</div>
