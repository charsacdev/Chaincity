<div>
  
  <div class="adm-main-content">
      <div class="row my-3">
          <div class="col-lg-3 col-sm-6 mb-3">
              <a href="">
                  <div class="adm-dsb-card">
                      <div class="img">
                          <img src="{{asset('asset/img/icon-moneys-black-white.png')}}" alt="">
                      </div>
                      <div class="card-content">
                          <p>Total revenue</p>
                          <h2>${{number_format($totalRevenue)}}</h2>
                          <small class="d-none">+0.00%</small>
                      </div>
                  </div>
              </a>
          </div>
          <div class="col-lg-3 col-sm-6 mb-3">
              <a href="">
                  <div class="adm-dsb-card light-primary-bg">
                      <div class="img">
                          <img src="{{asset('asset/img/icon-users-active2.png')}}" alt="">
                      </div>
                      <div class="card-content">
                          <p>Total customers</p>
                          <h2>{{number_format($totalUsers)}}</h2>
                      </div>
                  </div>
              </a>
          </div>
          <div class="col-lg-3 col-sm-6 mb-3">
              <a href="">
                  <div class="adm-dsb-card">
                      <div class="img">
                          <img src="{{asset('asset/img/icon-user-square.png')}}" alt="">
                      </div>
                      <div class="card-content">
                          <p>Total agents</p>
                          <h2>{{number_format($totalagent)}}</h2>
                      </div>
                  </div>
              </a>
          </div>
          <div class="col-lg-3 col-sm-6 mb-3">
              <a href="">
                  <div class="adm-dsb-card light-primary-bg">
                      <div class="img">
                          <img src="{{asset('asset/img/icon-home-white.png')}}" alt="">
                      </div>
                      <div class="card-content">
                          <p>Total listings</p>
                          <h2>{{number_format($totalListing)}}</h2>
                      </div>
                  </div>
              </a>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-8 mb-4 order-1">
              <div class="adm-alt-card">
                  <div class="adm-alt-card-header rvn">
                      <h4>revenue analytics</h4>
                      <ul style="padding: 0; margin: 0;">
                          <li class="adm-alt-link" data-duration="daily">daily</li>
                          <li class="adm-alt-link" data-duration="weekly">weekly</li>
                          <li class="adm-alt-link" data-duration="monthly">monthly</li>
                          <li class="adm-alt-link active" data-duration="yearly">yearly</li>
                      </ul>
                  </div>
                  <div class="adm-alt-card-body" id="rv-chart-ctn">
                      <canvas id="revenueChart" class="revenueChart" width="550" height="258"
                          style="display: block; box-sizing: border-box; height: 129px; width: 100%;"></canvas>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 order-2">
              <div class="adm-alt-card">
                  <div class="adm-alt-card-header">
                      <h4>customers</h4>
                      <select name="" id="customer-select">
                          <option value="jan23">Jan - June '23</option>
                          <option value="jul23">Jul - Dec '23</option>
                      </select>
                  </div>
                  <div class="adm-alt-card-body" id="cm-chart-ctn">
                      <canvas id="customerChart" class="revenueChart" width="550" height="400"
                          style="display: block; box-sizing: border-box; height: 129px; width: 100%;"></canvas>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 order-3 order-lg-4" style="position: relative;">
              <div class="adm-alt-card listings-ctn">
                  <div class="adm-alt-card-header">
                      <h4>Listings</h4>
                      <select name="" id="listing-select">
                          <option value="jan23">Jan - June '23</option>
                          <option value="jul23">Jul - Dec '23</option>
                      </select>
                  </div>
                  <div class="adm-alt-card-body" id="lt-chart-ctn">
                      <canvas id="listingChart" class="revenueChart" width="550" height="400"
                          style="display: block; box-sizing: border-box; height: 129px; width: 100%;"></canvas>
                  </div>
              </div>
          </div>
          <div class="col-lg-8 mb-4 order-4 order-lg-3">
              <div class="adm-alt-card">
                  <div class="adm-alt-card-header border-bottom pb-3">
                      <div>
                          <h4 class="pb-0 mb-0">recent activities</h4>
                          <small>All account activities</small>
                      </div>
                  </div>
                  <div class="adm-alt-card-body">
                      <ul class="ntf_dpw" style="padding: 0; margin: 0;">
                        @foreach ($selectNotification as $item)
                          <li class="nav_dpd_itm">
                            <div class="d-flex align-items-center justify-content-between">
                                 <div class="d-flex align-items-start justify-content-start gap-2">
                                      <div class="img">
                                           <img src="asset/img/note-2.png" alt="">
                                      </div>
                                      <div>
                                        <h5 class="ntf_heading"><strong>{{$item->notification_type}}</strong></h5>
                                        <small class="ntf_stdt">{{$item->message}}</small>
                                           
                                      </div>
                                 </div>
                                 <p class="ntf_tme">{{$item->created_at->format('F j, Y, g:i a') }}</p>
                            </div>
                          </li>
                         @endforeach
                      </ul>
                  </div>
              </div>
          </div>
</div>
