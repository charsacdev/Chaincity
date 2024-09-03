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
                         <a class="nav-link active" data-bs-toggle="tab" href="#completed">City Reviews</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" data-bs-toggle="tab" href="#pending">Trip Reviews</a>
                     </li>
                 </ul>
             </div>
 
     
     <div class="tab-content mb-5">     
         <!---Pending Review--->
         <div class="tab-pane fade show active" id="completed" role="tabpanel">
             <div class="table-responsive">
                 <table id="example4" class="display" style="min-width: 845px; border: 0;">
                     <thead style="border: 0;">
                     <tr class="th_tpc" style="border: 0;white-space:nowrap">
                         <th>S/N</th>
                         <th>User Details</th>
                         <th>Star Rating</th>
                         <th>Comment</th>
                         <th>Action</th>
                     </tr>
                     </thead>
                     <tbody>
                 <!--all listing-->
                 @php($i=1)
                 @foreach($chaincityReviews as $item)
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
                         <td align="center">{{$item->rating}}<i class="fas fa-star mt-1"></i></td>
                         <td align="center">{{ \Str::words($item->rating_message, 10, '...') }}</td>
                         <td align="center">
                            <button wire:click="ReviewpopupCity({{$item->id}})" class="rlf-btn rlf-btn-primary p-1 fw-100 tb-btn w-100 mt-4" data-bs-toggle="modal" data-bs-target="#previewModal">Preview</button>
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
                                        <th>Star Rating</th>
                                        <th>Comment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            <tbody>
                            <!--all listing-->
                            @php($i=1)
                            @foreach ($chaincityTripReviews as $item)
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
                                <td align="center">{{$item->rating}}<i class="fas fa-star mt-1"></i></td>
                                <td align="center">{{ \Str::words($item->rating_message, 10, '...') }}</td>
                                <td align="center">
                                   <button wire:click="ReviewpopupTrip({{$item->id}})" class="rlf-btn rlf-btn-primary p-1 fw-100 tb-btn w-100 mt-4" data-bs-toggle="modal" data-bs-target="#previewTripModal" style="background-color:#0ace7e !important">Preview</button>
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


     <!--modal chaincity reviews-->
     <div wire:ignore.self class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-light">
            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color:#D80450">Chaincity User Review</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-light">
              <p class="text-dark fw-100">{{$cityreviewmessage}}</p>
              <br>
              <small>Posted By: {{$cityusername}}</small>
            </div>
            <div class="modal-footer bg-light">
            <button type="button" wire:click="DeleteChaincityReview({{$chainCityReviewId}})" class="rlf-btn rlf-btn-primary p-1 fw-100 tb-btn  mt-4">Delete</button>
            <button type="button" wire:click="ApproveChaincityReview({{$chainCityReviewId}})" class="rlf-btn rlf-btn-primary p-1 fw-100 tb-btn  mt-4">Approve</button>
            </div>
        </div>
        </div>
    </div>

     <!--modal chaincity Trip reviews-->
     <div wire:ignore.self class="modal fade" id="previewTripModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-light">
            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color:#0ace7e">Chaincity Trip User Review</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-light">
              <p class="text-dark fw-100">{{$tripreviewmessage}}</p>
              <br>
              <small>Posted By: {{$tripusername}}</small>
            </div>
            <div class="modal-footer bg-light">
            <button type="button" wire:click="DeleteChaincityTripReview({{$chainCityTripReviewId}})" class="rlf-btn rlf-btn-primary p-1 fw-100 tb-btn mt-4" style="background-color:#0ace7e !important">Delete</button>
            <button type="button" wire:click="ApproveChaincityTripReview({{$chainCityTripReviewId}})" class="rlf-btn rlf-btn-primary p-1 fw-100 tb-btn  mt-4" style="background-color:#0ace7e !important">Approve</button>
            </div>
        </div>
        </div>
    </div>
 
 </div>
 