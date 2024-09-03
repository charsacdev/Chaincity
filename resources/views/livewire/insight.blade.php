<div>
   
    <main>
        <div class="container payments mb-5">
             <div class="row">
                  <!-- Nav tabs -->
                  <div class="custom-tab mt-5">
                       <ul class="nav nav-tabs">
                            
                            <li class="nav-item">
                                 <a class="nav-link active" data-bs-toggle="tab" href="#earnings"> Earnings</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="tab" href="#reviews"> Reviews</a>
                            </li>
                            <li class="nav-item">
                                 <a class="nav-link" data-bs-toggle="tab" href="#views"> Views</a>
                            </li>
                            <li class="nav-item">
                                 <a class="nav-link" data-bs-toggle="tab" href="#issues"> Listing Issues</a>
                            </li>
                            <li class="nav-item">
                                 <a class="nav-link" data-bs-toggle="tab" href="#no-reviews"> No Reviews Template</a>
                            </li>
                       </ul>
                       <div class="tab-content mb-5">
                           
                            <div class="tab-pane fade show active" id="earnings" role="tabpanel">
                              <div class="row mt-5">
                                   <div class="col-sm-12 mt-3">
                                        <h3 class="dsb-header">Your Earnings</h3>
                                        <div class="form-group mb-5">
                                             <label for="">Select Month</label>
                                             <select name="" id="" class="custom-form-control" wire:model="month" wire:change="sortMonth">
                                                  <option value="">Select a month</option>
                                                  <option value="1">January</option>
                                                  <option value="2">February</option>
                                                  <option value="3">March</option>
                                                  <option value="4">April</option>
                                                  <option value="5">May</option>
                                                  <option value="6">June</option>
                                                  <option value="7">July</option>
                                                  <option value="8">August</option>
                                                  <option value="9">September</option>
                                                  <option value="10">October</option>
                                                  <option value="11">November</option>
                                                  <option value="12">December</option>
                                             </select>
                                        </div>
                                   </div>
                                   <div class="col-md-4">
                                        <div class="mt-5 pt-5">
                                             <h1 class="mb-0 dsb-header-md">${{number_format($earnings)}}</h1>
                                             <small class="text-muted">Booked earnings for 2023</small>
                                        </div>
                                        <div class="d-flex gap-5">
                                             <div class="mt-5">
                                                  <h2 class="mb-0 dsb-header">${{number_format($paidearning)}}</h2>
                                                  <small class="text-success">Payout</small>
                                             </div>
                                             <div class="mt-5">
                                                  <h2 class="mb-0 dsb-header">${{number_format($earnings)}}</h2>
                                                  <small class="text-warning">Pending</small>
                                             </div>
                                        </div>
                                   </div>
                         
                              </div>
                         </div>
                            <div class="tab-pane fade show" id="reviews" role="tabpanel">
                                 <div class="row mt-5">
                               @if(count($reviews)>0)
                                 @foreach ($reviews as $item)
                                   <div class="col-md-6 mb-4">
                                        <div class="rvw_cd_ctn">
                                             <div class="rvw_header">
                                                  <div class="header-prl">
                                                       <div class="img">
                                                            <img src="{{$item->user->profile_photo}}"
                                                                 class="img-fluid h-100" alt="">
                                                       </div>
                                                       <div>
                                                            <h5 class="rvw_nm">
                                                                 <b>
                                                                      {{ucwords($item->user->first_name)}}&nbsp;
                                                                      {{ucwords($item->user->last_name)}}
                                                                 </b>
                                                            </h5>
                                                            <small class="d-none">Marketing Coordinator</small>
                                                       </div>
                                                  </div>
                                                  <div>
                                                       <i class="fa fa-star"></i> {{$item->rating}}
                                                  </div>
                                             </div>
                                             <div class="rvw_content">
                                                  <h5 class="d-none">Great Work!</h5>
                                                  <p>"{{$item->rating_message}}"</p>
                                                       </div>
                                                  </div>
                                             </div>
                                  
                                   @endforeach
                                   @else
                                        <div class="d-flex align-items-center justify-content-center mt-5">
                                             <div class="nr_ctn">
                                                  <div class="img">
                                                       <img src="../asset/img/star.png" class="img-fluid" alt="">
                                                  </div>
                                                  <h3 class="mt-4">No reviews yet</h3>
                                                  <p class="mt-0">Your first review will show up here. We'll let you know
                                                       when it does.</p>
                                             </div>
                                        </div>
                                   @endif
                              </div>
                         </div>
                           
                            <div class="tab-pane fade show" id="issues" role="tabpanel">
                                 <div class="d-flex align-items-center justify-content-center mt-5">
                                      <div class="nr_ctn">
                                           <div class="img">
                                                <img src="../asset/img/homeabout.png" class="img-fluid" alt="">
                                           </div>
                                           <h3 class="mt-4">No issues yet</h3>
                                           <p class="mt-0">
                                                If issues are reported in the future, you'll be able to find that info here.
                                                It may take up to one day for the latest issues to appear.
                                           </p>
                                      </div>
                                 </div>
                            </div>
                            <div class="tab-pane fade show" id="no-reviews" role="tabpanel">
                                 <div class="d-flex align-items-center justify-content-center mt-5">
                                      <div class="nr_ctn">
                                           <div class="img">
                                                <img src="../asset/img/star.png" class="img-fluid" alt="">
                                           </div>
                                           <h3 class="mt-4">No reviews yet</h3>
                                           <p class="mt-0">Your first review will show up here. We'll let you know
                                                when it does.</p>
                                      </div>
                                 </div>
                            </div>
                       </div>
                  </div>
             </div>
        </div>
     </main>
     
</div>
