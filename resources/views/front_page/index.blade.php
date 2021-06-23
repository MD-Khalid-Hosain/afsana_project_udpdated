@extends('layouts.front_page')

@section('content')
  <div id="main">
     
      <section class="page-section no-padding background-img-slider">
          <div class="container">

              <div id="main-slider" class="owl-carousel owl-theme">

                  <div class="item page text-center slide4">
                      <div class="caption">
                          <div class="container">
                              <div class="div-table">
                                  <div class="div-cell">
                                      <h3 class="caption-subtitle">Online Program Organization</h3>
                                      <h4><span>You Can Find "<a href="#">Festivals</a>, <a href="#">Parties</a>, <a href="#">Conference</a>, <a href="#">Fairs</a>, <a href="#">Exhibitions</a>, <a href="#">Speakers</a> and more</span></h4>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>

          </div>
      </section>
      
  </div>

  <!-- PAGE -->
  <section class="page-section">
      <div class="container">

            <h1 class="section-title">
                <span data-animation="flipInY" data-animation-delay="300" class="icon-inner"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-h-square fa-stack-1x"></i></span></span>
                <span data-animation="fadeInRight" data-animation-delay="500" class="title-inner">Events<small> /Hurry!!dont forget to book your event</small></span>
            </h1>

            <div class=" thumbnails hotels">
              @foreach ($event_lists as $event_list)

                <div class="col-md-3">
                    <div class="thumbnail no-border no-padding">
                        <div class="media">
                            <img src="{{ asset('uploads/events') }}/{{ $event_list->events_photo }}" alt="">
                            <div class="caption hovered">
                                <div class="caption-wrapper div-table">
                                    <div class="caption-inner div-cell">
                                        <p class="caption-buttons"><a href="{{ route('event_details', $event_list->id) }}" class="btn btn-theme caption-link"><i class="fa fa-file-text"></i> Event Details</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="caption">
                            <h3 class="caption-title"><a href="#">{{ $event_list->events_title }}</a></h3>

                            <p class="caption-text">{{ $event_list->events_details }}</p>

                        </div>
                    </div>
                </div>
              @endforeach
            </div>
      </div>
  </section>
  <!-- /PAGE -->

  <!-- PAGE Event Location -->
  <section class="page-section light" id="speakers">
      <div class="container">
          <h1 class="section-title">
              <span data-animation="flipInY" data-animation-delay="300" class="icon-inner"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-user fa-stack-1x"></i></span></span>
              <span data-animation="fadeInUp" data-animation-delay="500" class="title-inner">Event Locations <small> / We are here</small></span>
          </h1>

          <!-- Speakers row -->
          <div class="thumbnails clear">
            @foreach ($location_lists as $location_list)

                <div data-animation="fadeInUp" data-animation-delay="100" class="col-md-3">
                        <div class="thumbnail no-border no-padding text-center">
                            <div class="rehex speaker-avatar">
                                <div class="rehex-deg">
                                    <div class="rehex-deg">
                                        <div class="rehex-inner">
                                            <div class="media">

                                                <img src="{{ asset('uploads/locations') }}/{{  $location_list->location_photo }}" alt="">
                                                <div class="caption hovered">
                                                    <div class="caption-wrapper div-table">
                                                        <div class="caption-inner div-cell">
                                                            <p class="caption-buttons"><a href="#" class="btn caption-link"><i class="fa fa-link"></i></a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="caption before-media">
                                <h3 class="caption-title">{{ $location_list->city_name }}</h3>
                            </div>
                            <div class="caption">
                                <p>{{ $location_list->city_address }}</p>

                            </div>
                        </div>
                    </div>
            @endforeach


                  <!-- -->
          </div>
          <!-- /Speakers row -->
      </div>
  </section>
  <!-- /PAGE Event Location -->





  <!-- PAGE LOCATION -->
  <section class="page-section" id="location">
      <div class="container full-width gmap-background">

          <div class="container">
              <div class="on-gmap color">
                  <h1 class="section-title">
                      <span data-animation="flipInY" data-animation-delay="100" class="icon-inner"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-map-marker fa-stack-1x"></i></span></span>
                      <span data-animation="fadeInRight" data-animation-delay="100" class="title-inner">Head Office Location</span>
                  </h1>
                  <p data-animation="fadeInUp" data-animation-delay="200" class="text-uppercase">Online Program Organization<br/>
                      4 Embankment Drive Road,Sector-10,<br>
                       Uttara Model Town, Dhaka-1230. <br>
                       Developed By Hosne Ara Ferdousy<br>
                      +8801723270941</p>
                  <p><a href="#">hosnearaferdousy@gmail.com</a></p>
                  <a href="#" class="btn btn-theme"
                     data-animation="flipInY" data-animation-delay="300">Get Direction <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>

          <!-- Google map -->
          <div class="google-map">

                  <iframe id="map-canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.0380362296096!2d90.38847081498399!3d23.88826988452171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c469610d01b9%3A0xaa41c726134f443b!2sInternational%20University%20Of%20Business%20Agriculture%20%26%20Technology!5e0!3m2!1sen!2sbd!4v1584467581214!5m2!1sen!2sbd" ></iframe>

          </div>
          <!-- /Google map -->

      </div>
  </section>
  <!-- /PAGE LOCATION -->

@endsection
