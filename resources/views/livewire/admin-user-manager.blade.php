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
                            <a class="nav-link active" data-bs-toggle="tab" href="#chaincityuser"></i>City Verified</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#chaincityagent">City Unverified</a> 
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tripverified">Trip Verified</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tripunverified">Trip Unverified</a>
                        </li>
                    </ul>
                </div>
                   
                <!--chaincity user verified-->
                  <div class="tab-content mb-5">
                       <div class="tab-pane fade show active" id="chaincityuser" role="tabpanel">
                            <div class="table-responsive">
                                 <table id="example4" class="display" style="min-width: 845px; border: 0;">
                                      <thead style="border: 0;">
                                      <tr class="th_tpc" style="border: 0;white-space:nowrap">
                                           <th>Chaincity Accounts</th>
                                           <th>Account Status</th>
                                           <th>Account Type</th>
                                           <th>Account Verification</th>
                                           <th>Listing</th>
                                           <th>Bookings</th>
                                           <th>Saved Listing</th>
                                           <th>Earnings</th>
                                           <th>KYC</th>
                                           <th>Action</th>
                                      </tr>
                                      </thead>
                        <tbody>
                        <!--Chaincity Verified user-->
                        @foreach ($CityVerifiedUser as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center justify-content-start gap-2">
                                        <div class="custom-control custom-checkbox ms-2 d-inline">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                            <label class="custom-control-label" for="customCheckBox2"></label>
                                        </div>
                                        <div class="apt_nit border-0">
                                            <img src="{{$item->profile_photo}}" class="img-fluid w-100 h-100" style="border-radius:50%;border:1px solid black">
                                           
                                        </div>
                                        <div class="apt_ful">
                                            <span>{{ucwords($item->first_name)}}&nbsp;{{ucwords($item->last_name)}}</span>
                                            <small class="text-muted">{{$item->email}}</small>
                                        </div>
                                    </div>
                                </td>
                                <td align="center">
                                    @if($item->account_status=="verified")
                                       <p class="text-success fw-bold">{{$item->account_status}}</p>
                                    @else
                                       <p class="text-danger fw-bold">{{$item->account_status}}</p>
                                    @endif
                                </td>
                                <td align="center">{{$item->account_type}}</td>
                                <td align="center">
                                    @if($item->account_type=='agent')
                                        <span class="text-success fw-bold">{{$item->account_kyc['verify_status']}}</span>
                                    @else
                                        <span class="text-success fw-bold">Completed</span>
                                    @endif
                                </td>
                                <td align="center">{{count($item->property)}}</td>
                                <td align="center">{{count($item->bookings)}}</td>
                                <td align="center">{{count($item->listingsaved)}}</td>
                                <td align="center">${{collect($item->earnings)->sum('amount')}}</td>
                                <td align="center">
                                    <div class="lightgallery">
                                        @if($item->account_type=='agent')
                                            <a href="{{$item->account_kyc['photo1']}}" data-sub-html="KYC DOCUMENT"
                                                data-exthumbimage="{{$item->account_kyc['photo1']}}"
                                                data-src="{{$item->account_kyc['photo1']}}">   
                                            </a>
                                            <a href="{{$item->account_kyc['photo2']}}" data-sub-html="KYC DOCUMENT"
                                                data-exthumbimage="{{$item->account_kyc['photo2']}}"
                                                data-src="{{$item->account_kyc['photo2']}}">   
                                            </a>
                                            <div class="lg__btn cursor-pointer">
                                                <i class="fa fa-eye" style="cursor:pointer"></i>
                                            </div>
                                        @else
                                           <span class="text-dark fw-bold">None</span>
                                        @endif    
                                    </div>
                                </td>
                                <td align="center">
                                    <i class="bi bi-three-dots-vertical dropdown-toggle" style="cursor:pointer" data-bs-toggle="dropdown"></i>
                                    <ul class="dropdown-menu dropdown-menu-end drop-action">
                                        <li><button class="dropdown-item" type="button" wire:click="Approveusers({{$item->id}})">Verify Account</button></li>
                                        <li><button class="dropdown-item" type="button" wire:click="Declineusers({{$item->id}})">Reject Account</button></li>
                                        <li><button class="dropdown-item" type="button" wire:click="Blockuser({{$item->id}})">Block Account</button></li>
                                        </ul>  
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>

                <!--Chaincity users unverified--->
                <div class="tab-pane fade show" id="chaincityagent" role="tabpanel">
                    <div class="table-responsive">
                        <table id="example4" class="display" style="min-width: 845px; border: 0;">
                             <thead style="border: 0;">
                             <tr class="th_tpc" style="border: 0;white-space:nowrap">
                                  <th>Chaincity Accounts</th>
                                  <th>Account Status</th>
                                  <th>Account Type</th>
                                  <th>Account Verification</th>
                                  <th>Listing</th>
                                  <th>Bookings</th>
                                  <th>Saved Listing</th>
                                  <th>Earnings</th>
                                  <th>KYC</th>
                                  <th>Action</th>
                             </tr>
                             </thead>
                         <tbody>
                
               <!--Chaincity UnVerified user-->
               @foreach ($CityUnVerifiedUser as $item)
                   <tr>
                       <td>
                           <div class="d-flex align-items-center justify-content-start gap-2">
                               <div class="custom-control custom-checkbox ms-2 d-inline">
                                   <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                   <label class="custom-control-label" for="customCheckBox2"></label>
                               </div>
                               <div class="apt_nit">
                                  <img src="{{$item->profile_photo}}" class="img-fluid w-100 h-100" style="border-radius:50%;border:1px solid black">
                                   
                               </div>
                               <div class="apt_ful">
                                   <span>{{ucwords($item->first_name)}}&nbsp;{{ucwords($item->last_name)}}</span>
                                   <small class="text-muted">{{$item->email}}</small>
                               </div>
                           </div>
                       </td>
                       <td align="center">
                           @if($item->account_status=="active")
                              <p class="text-success fw-bold">{{$item->account_status}}</p>
                           @else
                              <p class="text-danger fw-bold">{{$item->account_status}}</p>
                           @endif
                       </td>
                       <td align="center">{{$item->account_type}}</td>
                       <td align="center">
                           @if($item->account_type=='agent' and $item->account_kyc['verify_status']=='completed')
                               <span class="text-success fw-bold">{{$item->account_kyc['verify_status']}}</span>
                           @else
                               <span class="text-danger fw-bold">{{$item->account_kyc['verify_status']}}</span>
                           @endif
                       </td>
                       <td align="center">{{count($item->property)}}</td>
                       <td align="center">{{count($item->bookings)}}</td>
                       <td align="center">{{count($item->listingsaved)}}</td>
                       <td align="center">${{collect($item->earnings)->sum('amount')}}</td>
                       <td align="center">
                           <div class="lightgallery">
                               @if($item->account_type=='agent')
                                   <a href="{{$item->account_kyc['photo1']}}" data-sub-html="KYC DOCUMENT"
                                       data-exthumbimage="{{$item->account_kyc['photo1']}}"
                                       data-src="{{$item->account_kyc['photo1']}}">   
                                   </a>
                                   <a href="{{$item->account_kyc['photo2']}}" data-sub-html="KYC DOCUMENT"
                                       data-exthumbimage="{{$item->account_kyc['photo2']}}"
                                       data-src="{{$item->account_kyc['photo2']}}">   
                                   </a>
                                   <div class="lg__btn cursor-pointer">
                                       <i class="fa fa-eye" style="cursor:pointer"></i>
                                   </div>
                               @else
                                  <span class="text-dark fw-bold">None</span>
                               @endif    
                           </div>
                       </td>
                       <td align="center">
                           <i class="bi bi-three-dots-vertical dropdown-toggle" style="cursor:pointer" data-bs-toggle="dropdown"></i>
                           <ul class="dropdown-menu dropdown-menu-end drop-action">
                               <li><button class="dropdown-item" type="button" wire:click="Approveusers({{$item->id}})">Verify Account</button></li>
                               <li><button class="dropdown-item" type="button" wire:click="Declineusers({{$item->id}})">Reject Account</button></li>
                               <li><button class="dropdown-item" type="button" wire:click="Blockuser({{$item->id}})">Block Account</button></li>
                               </ul>  
                       </td>
                   </tr>
               @endforeach
               </tbody>
           </table>
           </div>
        </div>



        <!--Chaincity trip verified Reseller-->
        <div class="tab-pane fade show" id="tripverified" role="tabpanel">
            <div class="table-responsive">
                <table id="example4" class="display" style="min-width: 845px; border: 0;">
                    <thead style="border: 0;">
                        <tr class="th_tpc" style="border: 0;white-space:nowrap">
                            <th>Chaincity Accounts</th>
                            <th>Account Status</th>
                            <th>Account Type</th>
                            <th>Account Verification</th>
                            <th>Listing</th>
                            <th>Bookings</th>
                            <th>Saved Listing</th>
                            <th>Earnings</th>
                            <th>KYC</th>
                            <th>Action</th>
                       </tr>
                    </thead>
                        <tbody>
                              <!--verfied Chaincity Trip User-->
                                @foreach ($TripVerifiedUser as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-start gap-2">
                                            <div class="custom-control custom-checkbox ms-2 d-inline">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                                <label class="custom-control-label" for="customCheckBox2"></label>
                                            </div>
                                            <div class="apt_nit border-0">
                                                <img src="{{$item->profile_photo}}" class="img-fluid w-100 h-100" style="border-radius:50%;border:1px solid black">
                                               
                                            </div>
                                            <div class="apt_ful">
                                                <span>{{ucwords($item->first_name)}}&nbsp;{{ucwords($item->last_name)}}</span>
                                                <small class="text-muted">{{$item->email}}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td align="center">
                                        @if($item->account_status=="verified")
                                           <p class="text-success fw-bold">{{$item->account_status}}</p>
                                        @else
                                           <p class="text-danger fw-bold">{{$item->account_status}}</p>
                                        @endif
                                    </td>
                                    <td align="center">{{$item->account_type}}</td>
                                    <td align="center">
                                        @if($item->account_type=='agent')
                                            <span class="text-success fw-bold">{{$item->account_kyc['verify_status']}}</span>
                                        @else
                                            <span class="text-success fw-bold">Completed</span>
                                        @endif
                                    </td>
                                    <td align="center">{{count($item->property)}}</td>
                                    <td align="center">{{count($item->bookings)}}</td>
                                    <td align="center">{{count($item->listingsaved)}}</td>
                                    <td align="center">${{collect($item->earnings)->sum('amount')}}</td>
                                    <td align="center">
                                        <div class="lightgallery">
                                            @if($item->account_type=='agent')
                                                <a href="{{$item->account_kyc['photo1']}}" data-sub-html="KYC DOCUMENT"
                                                    data-exthumbimage="{{$item->account_kyc['photo1']}}"
                                                    data-src="{{$item->account_kyc['photo1']}}">   
                                                </a>
                                                <a href="{{$item->account_kyc['photo2']}}" data-sub-html="KYC DOCUMENT"
                                                    data-exthumbimage="{{$item->account_kyc['photo2']}}"
                                                    data-src="{{$item->account_kyc['photo2']}}">   
                                                </a>
                                                <div class="lg__btn cursor-pointer">
                                                    <i class="fa fa-eye" style="cursor:pointer"></i>
                                                </div>
                                            @else
                                               <span class="text-dark fw-bold">None</span>
                                            @endif    
                                        </div>
                                    </td>
                                    <td align="center">
                                        <i class="bi bi-three-dots-vertical dropdown-toggle" style="cursor:pointer" data-bs-toggle="dropdown"></i>
                                        <ul class="dropdown-menu dropdown-menu-end drop-action">
                                            <li><button class="dropdown-item" type="button" wire:click="ApproveusersTrip({{$item->id}})">Verify Account</button></li>
                                            <li><button class="dropdown-item" type="button" wire:click="DeclineusersTrip({{$item->id}})">Reject Account</button></li>
                                            <li><button class="dropdown-item" type="button" wire:click="BlockuserTrip({{$item->id}})">Block Account</button></li>
                                            </ul>  
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                       </table>
                    </div>
               </div>


        <!--Chaincity Trip Unverifed Reseller-->
         <div class="tab-pane fade show" id="tripunverified" role="tabpanel">
            <div class="table-responsive">
                <table id="example4" class="display" style="min-width: 845px; border: 0;">
                    <thead style="border: 0;">
                        <tr class="th_tpc" style="border: 0;white-space:nowrap">
                            <th>Chaincity Accounts</th>
                            <th>Account Status</th>
                            <th>Account Type</th>
                            <th>Account Verification</th>
                            <th>Listing</th>
                            <th>Bookings</th>
                            <th>Saved Listing</th>
                            <th>Earnings</th>
                            <th>KYC</th>
                            <th>Action</th>
                       </tr>
                    </thead>
                        <tbody>
                              <!--verfied Chaincity Trip User-->
                                @foreach ($TripUnVerifiedUser as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-start gap-2">
                                            <div class="custom-control custom-checkbox ms-2 d-inline">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                                <label class="custom-control-label" for="customCheckBox2"></label>
                                            </div>
                                            <div class="apt_nit border-0">
                                                <img src="{{$item->profile_photo}}" class="img-fluid w-100 h-100" style="border-radius:50%;border:1px solid black">
                                               
                                            </div>
                                            <div class="apt_ful">
                                                <span>{{ucwords($item->first_name)}}&nbsp;{{ucwords($item->last_name)}}</span>
                                                <small class="text-muted">{{$item->email}}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td align="center">
                                        @if($item->account_status=="verified")
                                           <p class="text-success fw-bold">{{$item->account_status}}</p>
                                        @else
                                           <p class="text-danger fw-bold">{{$item->account_status}}</p>
                                        @endif
                                    </td>
                                    <td align="center">{{$item->account_type}}</td>
                                    <td align="center">
                                        @if($item->account_type=='agent')
                                            <span class="text-success fw-bold">{{$item->account_kyc['verify_status']}}</span>
                                        @else
                                            <span class="text-success fw-bold">Completed</span>
                                        @endif
                                    </td>
                                    <td align="center">{{count($item->property)}}</td>
                                    <td align="center">{{count($item->bookings)}}</td>
                                    <td align="center">{{count($item->listingsaved)}}</td>
                                    <td align="center">${{collect($item->earnings)->sum('amount')}}</td>
                                    <td align="center">
                                        <div class="lightgallery">
                                            @if($item->account_type=='agent')
                                                <a href="{{$item->account_kyc['photo1']}}" data-sub-html="KYC DOCUMENT"
                                                    data-exthumbimage="{{$item->account_kyc['photo1']}}"
                                                    data-src="{{$item->account_kyc['photo1']}}">   
                                                </a>
                                                <a href="{{$item->account_kyc['photo2']}}" data-sub-html="KYC DOCUMENT"
                                                    data-exthumbimage="{{$item->account_kyc['photo2']}}"
                                                    data-src="{{$item->account_kyc['photo2']}}">   
                                                </a>
                                                <div class="lg__btn cursor-pointer">
                                                    <i class="fa fa-eye" style="cursor:pointer"></i>
                                                </div>
                                            @else
                                               <span class="text-dark fw-bold">None</span>
                                            @endif    
                                        </div>
                                    </td>
                                    <td align="center">
                                        <i class="bi bi-three-dots-vertical dropdown-toggle" style="cursor:pointer" data-bs-toggle="dropdown"></i>
                                        <ul class="dropdown-menu dropdown-menu-end drop-action">
                                            <li><button class="dropdown-item" type="button" wire:click="ApproveusersTrip({{$item->id}})">Verify Account</button></li>
                                            <li><button class="dropdown-item" type="button" wire:click="DeclineusersTrip({{$item->id}})">Reject Account</button></li>
                                            <li><button class="dropdown-item" type="button" wire:click="BlockuserTrip({{$item->id}})">Block Account</button></li>
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

</div>
