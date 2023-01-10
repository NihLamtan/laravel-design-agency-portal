

<div wire:poll.keep-alive>
 
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
          <div class="">
            <nav id="notification-nav">
              <ul class="notification-list list-unstyled m-0">
  @foreach ($notifications as $notification)

                <li>
                  <div class="notifications-wrap">
                    <div
                      class="
                        d-md-flex
                        align-items-center
                        noti-content-wrap
                      "
                    >
                      <div
                        class="
                          d-flex
                          align-items-center
                          col
                          justify-content-between
                        "
                      >
                        <div class="d-flex align-items-center">
                          <img
                            src="../images/usa-flag.png"
                            alt=""
                            class="usa-flag"
                          />
                          <div class="d-flex">
                            <div class="notification-hd">
                              <h6 class="nofication-title">
                                {{ $notification->data['title'] }}
                              </h6>
                              <p class="notification-content m-0">
                                {{ $notification->data['description'] }}
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="d-md-none">
                          <i
                            class="fas fa-chevron-right noti-aero-icon"
                          ></i>
                        </div>
                      </div>
                      <div class="col">
                        <div
                          class="
                            d-flex
                            justify-content-between
                            align-items-center
                            noti-second-col
                          "
                        >
                          <div class="">
                            <h5 class="notification-timing mb-2">
                              {{$notification->created_at->diffForHumans()}}
                            </h5>
                            <div
                              class="
                                noti-status
                                d-flex
                                align-items-center
                              "
                            >
                             @if($notification->read_at)
                             <i class="fas fa-check-double"></i>
                              @endif
                             
                            </div>
                          </div>
                          <div class="d-none d-md-block">
                            <i
                              class="fas fa-chevron-right noti-aero-icon"
                            ></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="noti-sep"></div>
                  </div>
                </li>

@endforeach
       
              </ul>
            </nav>
          </div>
        </div>
    </div>
</div>


  
