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
                        <th>Wallet Type</th>
                        <th>Wallet Address</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                <!--all listing-->
                @php($i=1)
                @foreach ($completed as $item)
                    <tr align="left">
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
                        <td align="center">{{$item->user->crypto_type}}</td>
                        <td align="center">{{$item->user->wallet_address}}</td>
                        <td align="center">${{collect($item->earnings)->sum('amount')}}</td>
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
                                    <th>Wallet Type</th>
                                    <th>Wallet Address</th>
                                    <th>Amount</th>
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
                                    <td align="center">{{$item->user->crypto_type}}</td>
                                    <td align="center">{{$item->user->wallet_address}}</td>
                                    <td align="center">${{collect($item->earnings)->sum('amount')}}</td>
                                    <td align="center">
                                        <button class="btn btn-success" type="button" wire:loading.attr='disabled' wire:click="ApproveChaincityPayout({{$item->user_id}})">Paid</button>   
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
                                    <th>Wallet Type</th>
                                    <th>Wallet Address</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                            <!--all listing-->
                            @php($i=1)
                            @foreach ($tripcompleted as $item)
                                <tr align="left">
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
                                <td align="center">{{$item->user->crypto_type}}</td>
                                <td align="center">{{$item->user->wallet_address}}</td>
                                <td align="center">${{collect($item->earnings)->sum('amount')}}</td>
                                {{-- <td align="center">
                                     <button class="btn btn-success" type="button" wire:click="ApproveChaincityPayout({{$item->id}})">Paid</button>   
                                </td> --}}
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
                            <th>S/N</th>
                            <th>User Details</th>
                            <th>Wallet Type</th>
                            <th>Wallet Address</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                    <!--all listing-->
                    @php($i=1)
                    @foreach ($trippending as $item)
                        <tr align="left">
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
                            <td align="center">{{$item->user->crypto_type}}</td>
                            <td align="center">{{$item->user->wallet_address}}</td>
                            <td align="center">${{collect($item->earnings)->sum('amount')}}</td>
                            <td align="center">
                                <button class="btn btn-success" type="button" wire:loading.attr='disabled' wire:click="ApproveChaincityTripPayout({{$item->user_id}})">Paid</button>   
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
