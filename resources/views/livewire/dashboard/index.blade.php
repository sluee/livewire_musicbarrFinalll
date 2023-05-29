<div>
    @if(session()->has('message'))

    <div id="popup-message" class="popup-message " >
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="container">
        <h1 class="mt-3">Dashboard</h1>
        <h5>Quick stats</h5>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="circle-tile ">
                <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
                <div class="circle-tile-content dark-blue">
                    <div class="circle-tile-description text-faded"> Total Booking</div>
                    <div class="circle-tile-number text-faded ">{{$totalBookings}}</div>

                </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="circle-tile ">
                <a href="#"><div class="circle-tile-heading yellow"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
                <div class="circle-tile-content red">
                    <div class="circle-tile-description text-faded"> Active Bookings </div>
                    <div class="circle-tile-number text-faded ">{{$totalActiveBookings}}</div>

                </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="circle-tile ">
                <a href="#"><div class="circle-tile-heading orange"><i class="fa fa-comments fa-fw fa-3x"></i></div></a>
                <div class="circle-tile-content orange">
                    <div class="circle-tile-description text-faded"> Completed Bookings </div>
                    <div class="circle-tile-number text-faded ">{{$totalCompletedBookings}}</div>

                </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="circle-tile ">
                <a href="#"><div class="circle-tile-heading red "><i class="fa fa-envelope fa-fw fa-3x"></i></div></a>
                <div class="circle-tile-content yellow">
                    <div class="circle-tile-description text-faded"> Canceled Bookings</div>
                    <div class="circle-tile-number text-faded ">{{$totalCancelBookings}}</div>

                </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            @foreach ($bookings as $booking )
            <div class="col-xl-3 col-sm-6">
                <div class="card" data-bs-toggle="modal" data-bs-target="#viewBook-{{$booking->id}}" wire:click='viewDetail({{$booking->id}})'>
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-1 ms-3">
                                <h2 class="font-size-20 mb-1">{{ $booking->event_name }}</h2>
                                @if($booking->status == 'Pending')
                                    Status: <span class="badge badge-soft-success mb-0 " style="color:blue; font-size:15px">Pending</span>
                                @elseif($booking->status == 'Completed')
                                    Status: <span class="badge badge-soft-success mb-0" style="color:green; font-size:15px">Completed</span>
                                @else
                                    Status: <span class="badge badge-soft-success mb-0" style="color:red; font-size:15px">Canceled</span>
                                @endif
                            </div>
                        </div>
                        <div class="mt-3 pt-1">
                            <p class="text-muted mb-0"><i class="fa-solid fa-hourglass-start"></i> {{ $booking->time_start }}</p>
                            <p class="text-muted mb-0 mt-2"><i class="fa-solid fa-hourglass-end"></i> {{ $booking->time_end }}</p>
                            <p class="text-muted mb-0 mt-2"><i class="mdi mdi-google-maps font-size-15 align-middle pe-2 text-primary"></i> {{ $booking->event_location }}</p>
                        </div>
                        <div class="d-flex gap-2 pt-4">
                            @if($booking->status == 'Pending')
                                <button type="button" class="btn btn-success btn-sm w-50"><a type="button" href="{{ route('dashboard.reviews', ['id' => $booking->id]) }}" style="text-decoration: none; color:white"><i class="fa-solid fa-check"></i> Finish</a></button>
                                <button type="button" class="btn btn-danger btn-sm w-50" data-bs-toggle="modal" data-bs-target="#cancel"><i class="fa-solid fa-ban"></i> Cancel</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            @endforeach
        </div>


        @foreach ($bookings as $booking )
            {{-- View Book Detail --}}
            <div wire:ignore.self class="modal fade" id="viewBook-{{$booking->id}}" tabindex="-1" aria-labelledby="moreModal-{{$booking->id}}-label" aria-hidden="true" data-backdrop="false" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:darkblue; color:white">
                            Booking Details
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color:white"></button>
                        </div>

                        <div class="modal-body">
                            @if(!is_null($book))
                            <div class="cards">
                                <h6>Event Performer</h6>
                                <div class="card mb-4 text-center" style="background-color:white">
                                    @if(!is_null($book->band))
                                        <p class="mt-2" style="color:red">{{ $book->band->band_name }}
                                        </p>
                                        <h6 class="text-dark">{{ $book->band->genre }}</h6>

                                    @endif
                                </div>
                                <h6>Event Details</h6>
                                <div class="card text-center text-dark" style="background-color:white">
                                    <div class="row mb-2 mt-2">
                                        <div class="col">
                                            <h6>{{ $book->event_name }}</h6>
                                            <p style="font-size:1rem">Event name</p>
                                        </div>
                                        <div class="col">
                                            <h6>{{ $book->event_location }}</h6>
                                            <p style="font-size:1rem">Location</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <p style="font-size:1rem">Date</p>
                                            <h6>{{ $book->event_date }}</h6>
                                        </div>
                                        <div class="col">
                                            <p style="font-size:1rem">Start</p>
                                            <h6>{{ $book->time_start }}</h6>
                                        </div>
                                        <div class="col">
                                            <p style="font-size:1rem">End</p>
                                            <h6>{{ $book->time_end }}</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="">
                                        <h6>{{ $book->event_details }}</h6>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

                {{-- Cancel Booking Detail Modal --}}
            <div wire:ignore.self class="modal fade" id="cancel" tabindex="-1" aria-labelledby="cancelModalL" aria-hidden="true" data-backdrop="false" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: red;">
                        Cancel Booking
                        </div>
                        <div class="modal-body">
                            @if(!is_null($book))
                                <div class="cards">
                                    <h6>Event Performer</h6>
                                    <div class="card mb-4 text-center" style="background-color:white">
                                        @if(!is_null($book->band))
                                            <p class="mt-2" style="color:red">{{ $book->band->band_name }}
                                            </p>
                                            <h6>{{ $book->band->genre }}</h6>

                                        @endif
                                    </div>
                                    <h6>Event Details</h6>
                                    <div class="card text-center text-dark" style="background-color:white">
                                        <div class="row mb-2 mt-2">
                                            <div class="col">
                                                <h6>{{ $book->event_name }}</h6>
                                                <p style="font-size:1rem">Event name</p>
                                            </div>
                                            <div class="col">
                                                <h6>{{ $book->event_location }}</h6>
                                                <p style="font-size:1rem">Location</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col">
                                                <p style="font-size:1rem">Date</p>
                                                <h6>{{ $book->event_date }}</h6>
                                            </div>
                                            <div class="col">
                                                <p style="font-size:1rem">Start</p>
                                                <h6>{{ $book->time_start }}</h6>
                                            </div>
                                            <div class="col">
                                                <p style="font-size:1rem">End</p>
                                                <h6>{{ $book->time_end }}</h6>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="">
                                            <h6>{{ $book->event_details }}</h6>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger" id="save_btn" wire:click="cancel({{$booking->id }})" data-bs-dismiss="modal">Cancel Booking</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Review Booking Detail Modal --}}
            <div wire:ignore.self class="modal fade" id="complete({{ $booking->id }})" tabindex="-1" aria-labelledby="complete({{ $booking->id }})Label" aria-hidden="true" data-backdrop="false" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: green;">
                        Review Booking
                        </div>
                        <div class="modal-body">
                            @if(!is_null($book))
                                <div class="cards">
                                    <h6>Event Performer</h6>
                                    <div class="card mb-4 text-center" style="background-color:white">
                                        @if(!is_null($book->band))
                                            <p class="mt-2" style="color:red">{{ $book->band->band_name }}
                                            </p>
                                            <h6>{{ $book->band->genre }}</h6>

                                        @endif

                                    </div>

                                    <h6>Rate and Review</h6>
                                    <div class="card cardi text-center" style="background-color:white">
                                        <div class="location">
                                            <textarea name="" id="" cols="30" rows="10" placeholder="Write a review here" class="form-control border-0 text-dark p-2 mb-2" wire:model='review'></textarea>
                                        </div>
                                        <div class="rate bg-success py-3 text-white">
                                            <div class="rating">
                                                <input type="radio" name="rating" value="5" id="5" wire:model="rating">
                                                <label for="5">☆</label>
                                                <input type="radio" name="rating" value="4" id="4" wire:model="rating">
                                                <label for="4">☆</label>
                                                <input type="radio" name="rating" value="3" id="3" wire:model="rating">
                                                <label for="3">☆</label>
                                                <input type="radio" name="rating" value="2" id="2" wire:model="rating">
                                                <label for="2">☆</label>
                                                <input type="radio" name="rating" value="1" id="1" wire:model="rating">
                                                <label for="1">☆</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" id="save_btn" wire:click="complete({{ $booking->id }})" data-bs-dismiss="modal">Complete Booking</button>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

    </div>



</div>
<style scoped>
.circle-tile {
    margin-bottom: 15px;
    text-align: center;
}
.circle-tile-heading {
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-radius: 100%;
    color: #FFFFFF;
    height: 80px;
    margin: 0 auto -40px;
    position: relative;
    transition: all 0.3s ease-in-out 0s;
    width: 80px;
}
.circle-tile-heading .fa {
    line-height: 80px;
}
.circle-tile-content {
    padding-top: 50px;
}
.circle-tile-number {
    font-size: 26px;
    font-weight: 700;
    line-height: 1;
    padding: 5px 0 15px;
}
.circle-tile-description {
    text-transform: uppercase;
}
.circle-tile-footer {
    background-color: rgba(0, 0, 0, 0.1);
    color: rgba(255, 255, 255, 0.5);
    display: block;
    padding: 5px;
    transition: all 0.3s ease-in-out 0s;
}
.circle-tile-footer:hover {
    background-color: rgba(0, 0, 0, 0.2);
    color: rgba(255, 255, 255, 0.5);
    text-decoration: none;
}
.circle-tile-heading.dark-blue:hover {
    background-color: #2E4154;
}
.circle-tile-heading.green:hover {
    background-color: #138F77;
}
.circle-tile-heading.orange:hover {
    background-color: #DA8C10;
}
.circle-tile-heading.blue:hover {
    background-color: #2473A6;
}
.circle-tile-heading.red:hover {
    background-color: #CF4435;
}
.circle-tile-heading.purple:hover {
    background-color: #7F3D9B;
}
.tile-img {
    text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
}

.dark-blue {
    background-color: #34495E;
}
.green {
    background-color: #16A085;
}
.blue {
    background-color: #2980B9;
}
.orange {
    background-color: #F39C12;
}
.red {
    background-color: #E74C3C;
}
.purple {
    background-color: #8E44AD;
}
.dark-gray {
    background-color: #7F8C8D;
}
.gray {
    background-color: #95A5A6;
}
.light-gray {
    background-color: #BDC3C7;
}
.yellow {
    background-color: #F1C40F;
}
.text-dark-blue {
    color: #34495E;
}
.text-green {
    color: #16A085;
}
.text-blue {
    color: #2980B9;
}
.text-orange {
    color: #F39C12;
}
.text-red {
    color: #E74C3C;
}
.text-purple {
    color: #8E44AD;
}
.text-faded {
    color: rgba(255, 255, 255, 0.7);
}

.rounded {
    border-radius: 5px !important;
}
.bg-light {
    background-color: #f7f8fa !important;
}
.bg-primary, .btn-primary, .btn-outline-primary:hover, .btn-outline-primary:focus, .btn-outline-primary:active, .btn-outline-primary.active, .btn-outline-primary.focus, .btn-outline-primary:not(:disabled):not(.disabled):active, .badge-primary, .nav-pills .nav-link.active, .pagination .active a, .custom-control-input:checked ~ .custom-control-label:before, #preloader #status .spinner > div, .social-icon li a:hover, .back-to-top:hover, .back-to-home a, ::selection, #topnav .navbar-toggle.open span:hover, .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots.clickable .owl-dot:hover span, .watch-video a .play-icon-circle, .sidebar .widget .tagcloud > a:hover, .flatpickr-day.selected, .flatpickr-day.selected:hover, .tns-nav button.tns-nav-active, .form-check-input.form-check-input:checked {
    background-color: #6dc77a !important;
}

.badge {
    padding: 5px 8px;
    border-radius: 3px;
    letter-spacing: 0.5px;
    font-size: 12px;
}

.btn-primary, .btn-outline-primary:hover, .btn-outline-primary:focus, .btn-outline-primary:active, .btn-outline-primary.active, .btn-outline-primary.focus, .btn-outline-primary:not(:disabled):not(.disabled):active {
    box-shadow: 0 3px 7px rgb(109 199 122 / 50%) !important;
}
.btn-primary, .btn-outline-primary, .btn-outline-primary:hover, .btn-outline-primary:focus, .btn-outline-primary:active, .btn-outline-primary.active, .btn-outline-primary.focus, .btn-outline-primary:not(:disabled):not(.disabled):active, .bg-soft-primary .border, .alert-primary, .alert-outline-primary, .badge-outline-primary, .nav-pills .nav-link.active, .pagination .active a, .form-group .form-control:focus, .form-group .form-control.active, .custom-control-input:checked ~ .custom-control-label:before, .custom-control-input:focus ~ .custom-control-label::before, .form-control:focus, .social-icon li a:hover, #topnav .has-submenu.active.active .menu-arrow, #topnav.scroll .navigation-menu > li:hover > .menu-arrow, #topnav.scroll .navigation-menu > li.active > .menu-arrow, #topnav .navigation-menu > li:hover > .menu-arrow, .flatpickr-day.selected, .flatpickr-day.selected:hover, .form-check-input:focus, .form-check-input.form-check-input:checked, .container-filter li.active, .container-filter li:hover {
    border-color: #6dc77a !important;
}
.bg-primary, .btn-primary, .btn-outline-primary:hover, .btn-outline-primary:focus, .btn-outline-primary:active, .btn-outline-primary.active, .btn-outline-primary.focus, .btn-outline-primary:not(:disabled):not(.disabled):active, .badge-primary, .nav-pills .nav-link.active, .pagination .active a, .custom-control-input:checked ~ .custom-control-label:before, #preloader #status .spinner > div, .social-icon li a:hover, .back-to-top:hover, .back-to-home a, ::selection, #topnav .navbar-toggle.open span:hover, .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots.clickable .owl-dot:hover span, .watch-video a .play-icon-circle, .sidebar .widget .tagcloud > a:hover, .flatpickr-day.selected, .flatpickr-day.selected:hover, .tns-nav button.tns-nav-active, .form-check-input.form-check-input:checked {
    background-color: #6dc77a !important;
}
.btn {
    padding: 8px 20px;
    outline: none;
    text-decoration: none;
    font-size: 16px;
    letter-spacing: 0.5px;
    transition: all 0.3s;
    font-weight: 600;
    border-radius: 5px;
}
.btn-primary {
    background-color: #6dc77a !important;
    border: 1px solid #6dc77a !important;
    color: #fff !important;
    box-shadow: 0 3px 7px rgb(109 199 122 / 50%);
}

a {
text-decoration:none;
}

    .modal-backdrop {
       display: none;
   }

    .radius-10 {
        border-radius: 10px !important;
    }

    .border-info {
        border-left: 5px solid  #0dcaf0 !important;
    }
    .border-danger {
        border-left: 5px solid  #fd3550 !important;
    }
    .border-success {
        border-left: 5px solid  #15ca20 !important;
    }
    .border-warning {
        border-left: 5px solid  #ffc107 !important;
    }


    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0px solid rgba(0, 0, 0, 0);
        border-radius: .25rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
    }
    .bg-gradient-scooter {
        background: #17ead9;
        background: -webkit-linear-gradient(
    45deg
    , #17ead9, #6078ea)!important;
        background: linear-gradient(
    45deg
    , #17ead9, #6078ea)!important;
    }
    .widgets-icons-2 {
        width: 56px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #ededed;
        font-size: 27px;
        border-radius: 10px;
    }
    .rounded-circle {
        border-radius: 50%!important;
    }
    .text-white {
        color: #fff!important;
    }
    .ms-auto {
        margin-left: auto!important;
    }
    .bg-gradient-bloody {
        background: #f54ea2;
        background: -webkit-linear-gradient(
    45deg
    , #f54ea2, #ff7676)!important;
        background: linear-gradient(
    45deg
    , #f54ea2, #ff7676)!important;
    }

    .bg-gradient-ohhappiness {
        background: #00b09b;
        background: -webkit-linear-gradient(
    45deg
    , #00b09b, #96c93d)!important;
        background: linear-gradient(
    45deg
    , #00b09b, #96c93d)!important;
    }

    .bg-gradient-blooker {
        background: #ffdf40;
        background: -webkit-linear-gradient(
    45deg
    , #ffdf40, #ff8359)!important;
        background: linear-gradient(
    45deg
    , #ffdf40, #ff8359)!important;
    }
    .popup-message {
    position: fixed;
    top: 15%;
    left: 80%;
    padding: 20px;
    background-color: #B3C890;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var popupContainer = document.getElementById('popup-message');

        // Show the pop-up container
        popupContainer.style.display = 'block';

        // Hide the pop-up container after a delay (e.g., 3 seconds)
        setTimeout(function() {
            popupContainer.style.display = 'none';
        }, 3000);
    });
 </script>
