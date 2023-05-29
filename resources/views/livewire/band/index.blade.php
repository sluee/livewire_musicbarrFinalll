<div class="m-5 mt-2">
    <button type="button" class="btn btn-primary btn-md m-2 float-end" data-bs-toggle="modal" data-bs-target="#createModal"  >
        <i class="fa-solid fa-pen"></i>
    </button>
    <div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #146C94">
                    <h5 class="modal-title fs-5 text-white" id="createModalLabel">Create Band</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3">
                   <div class="form-floating mb-3 col-md-6">
                       <input type="text" class="form-control @error('band_name') is-invalid @enderror" id="band_name" wire:model.defer='band_name'>
                       <label for="band_name" class="col-form-label">Band Name:</label>
                       @error('band_name')
                       <p class="invalid-feedback">{{$message}}</p>
                       @enderror
                   </div>
                    <div class="form-floating mb-3 col-md-6">
                        <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" wire:model.defer='location'>
                        <label for="location" class="col-form-label">Location:</label>
                        @error('location')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3 col-md-6">
                        <input type="text" class="form-control @error('rate') is-invalid @enderror" id="rate" wire:model.defer='rate'>
                        <label for="rate" class="col-form-label">Rate:</label>
                        @error('rate')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3 col-md-6">
                        <select class="form-select "id ="genre @error('genre') is-invalid @enderror" wire:model.lazy='genre'>
                            <option value=""hidden="true">Select genre</option>
                            <option value=""disabled>Select genre</option>
                            <option value="Accoustic">Accoustic</option>
                            <option value="Reggae">Reggae</option>
                            <option value="Classical">Classical</option>
                            <option value="Rock">Rock</option>
                            <option value="Pop">Pop</option>
                        </select>
                        <label for="genre">Genre</label>
                        @error('genre')
                            <p class="invallid-feedback">{{$message}}</p>
                        @enderror
                        </div>
                    <div class="form-floating mb-3 ">
                        <input type="number" class="form-control @error('talent_fee') is-invalid @enderror" id="talent_fee" wire:model.defer='talent_fee'>
                        <label for="talent_fee" class="col-form-label">Talent Fee:</label>
                        @error('talent_fee')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('founder') is-invalid @enderror" id="founder" wire:model.defer='founder' >
                        <label for="founder" class="col-form-label">Founder:</label>
                        @error('founder')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <textarea type="text" class="form-control @error('desc') is-invalid @enderror" id="desc" wire:model.defer='description' style="height: 100px"></textarea>
                        <label for="desc" class="col-form-label">Description:</label>
                        @error('description')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">Image:</label>
                        @if($image)
                        <img src="{{$image->temporaryUrl()}}" class="img d-block mt-2" style="width:100px;" alt="">
                        @endif
                        <div class="mt-2">
                            <input type="file" name="image" class="form-control" wire:model="image">
                        </div>
                        @error('image')
                        <p class="text-danger text-sm">{{$message}}</p>
                        @enderror
                    </div>

                </form>
                </div>
                <div class="modal-footer">
                    <a href="/bands" class="btn btn-secondary "> Cancel </a>
                    <button type="button" class="btn btn-success m-2" wire:click='addBand' id="save_btn">Create</button>
                </div>
            </div>
        </div>
    </div>
    @if(session()->has('message'))
                <div id="popup-message" class="popup-message " >
                    {{ session()->get('message') }}
                </div>
            @endif
    <div class="row">
        <div class=" col-md-4" >
            <h3 class="header ">Bands</h3>

            <div class="card-left card rounded-lg ">
                <div class="card-body text-dark p-4 " style="background-color: #146C94; ">
                    <input type="text" name="" id="" placeholder="Search Name" class="form-control m-2 mb-4" wire:model='search_band'>

                    <div class="checkbox d-block m-2 text-white">
                        <label for="genre">Genre:</label> <br>
                            <input type="checkbox" name="" id="" wire:model='Rock' value="Rock"> &nbsp; Rock <br>
                            <input type="checkbox" name="" id="" wire:model='Pop' value="Pop"> &nbsp; Pop <br>
                            <input type="checkbox" name="" id="" wire:model='Reggae' value="Reggae"> &nbsp; Reggae <br>
                            <input type="checkbox" name="" id="" wire:model='Acoustic' value="Acoustic"> &nbsp; Acoustic <br>
                            <input type="checkbox" name="" id="" wire:model='Classical' value="Classical" class="mb-4"> &nbsp; Classical <br>

                    </div>

                    <div class="checkbox d-block m-2 text-white">
                        <label for="genre">Genre:</label> <br>
                        {{-- @foreach($genres as $key => $genre)
                            <input type="checkbox" wire:model="{{ $key }}" value="{{ $genre }}"> &nbsp; {{ $genre }} <br>
                        @endforeach --}}
                    </div>

                    <label for="location" class="text-white">Location</label> <br>
                    <select name="" id="" class="form-select mb-4 " style="transform: translateX(7px);" wire:model='bandLocation'>
                        <option value="all">Select Location</option>
                        @foreach ($bands as $band)
                            <option value="{{ $band->location }}">{{ $band->location }}</option>
                        @endforeach

                    </select>

                    <div class="rate d-inline-block mt-2 text-white" style="transform: translateX(6px);">
                        <label for="">Rate:</label><br>
                        <input style="width: 300px;" type="range" id="sortRangeInput" name="sortRangeInput" min="0" max="100"
                        oninput="showSortValue(this.value)" wire:model='sortRate'> <br>
                        ₱ <output class="mb-4" id="sortRangeInput" for="sortRangeInput">{{ number_format(floatval($sortRate), 2) }}</output>
                   </div>
                   <br>
                   <label for="sort" class="text-white">Sort:</label>
                        <select name="" id="" class="form-select" style="transform: translateX(6px);" wire:model='sortBy'>
                            <option value="asc">Lowest to Highest Rate</option>
                            <option value="desc">Highest to Lowest Rate </option>

                        </select>
                        <button class="btn btn-info float-end mt-5" wire:click='resetFilter'>Reset Filter</button>
                </div>
            </div>
      </div>
      <div class=" col-md-8">
            <div class="row justify-content-center">
                <h2 style="font-size:50px">Let The music take you away</h2>
                <hr>
                @if($bands->count()>0)
                    @foreach ($bands as $band )
                    <div class="col-md-5 mb-3">
                        <div class="post-card" data-bs-toggle="modal" data-bs-target="#viewBook" wire:click='view({{$band->id}})' type="button">
                            <div class="d-flex mt-3">
                                <div class="flex-grow-1">
                                    <a class="title" href="#">{{$band->band_name}}</a><br>
                                    <span class="datetime">{{$band->location}}</span>

                                </div>
                                <p class="text-white">{{$band->genre}}</p>
                            </div>


                            <div class="image-preview">
                                <img src="{{Storage::url($band->image)}}" style="width:100%; heigth:150px">
                            </div>
                            <div class="mt-3 mb-3 ">
                            <a href="{{ route('band.booking', ['id' => $band->id, 'band' => $band->name]) }}"> <button class="cta">
                                <span class="hover-underline-animation"> Book now </span>
                                <svg viewBox="0 0 46 16" height="10" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
                                    <path transform="translate(30)" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10" id="Path_10"></path>
                                </svg>
                            </button></a>
                            </div>
                            @if($band->averageRating == null)
                            <p>No ratings avaibale</p>
                            @else
                            <h6>Average rating: {{number_format($band->averageRating, 1)}}</h6>
                            <div class="star-icons">
                                @php
                                    $averageRating = $band->averageRating;
                                    $roundedRating = round($averageRating);
                                @endphp
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $roundedRating)
                                        <i class="fa fa-star filled" style="color: #ffd600"></i>
                                    @else
                                        <i class="fa fa-star" style="color: #bcbcb8;"></i>
                                    @endif
                                @endfor
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                @endif

                @if($bands->isEmpty())
                    <div class="text-dark text-center" style="font-size: 30px; font-weight:700">
                    Nothing found in the list.
                    </div>
                @endif
                {{$bands->links()}}
        </div>
    </div>

</div>
<div wire:ignore.self class="modal fade" id="viewBook" tabindex="-1" aria-labelledby="moreModalLabel" aria-hidden="true" data-backdrop="false" >
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="mt-2">
                <button type="button" class="btn-close float-end m-2" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                @foreach ($bands as $bandImg)
                    <div class="cards" style="border:none">
                        @if ($bandImg->id == $band_show_id)
                            <img src="{{Storage::url($bandImg->image)}}" class="card-img-top mx-auto mb-1 " alt="image" style="border-radius:50%;width:100px; height:100px;">
                            <div class="card-body">
                                <h6 class="card-title text-center">@founder | {{$bandImg->founder}}  </h6>
                                <hr>
                                <p class="card-text text-center">{{$bandImg->description}}</p>
                                <div class="row mt-2 text-center">
                                    <div class="col-md-6 ">
                                        <p class="card-text ">{{$bandImg->talent_fee}}</p>
                                        <p class="card-text"><small class="text-muted">Talent fee</small></p>
                                    </div>
                                    <div class="col-md-6">
                                        @if($bandImg->id === $band_show_id)
                                        <p class="card-text">{{$bandImg->bookings->count()}}</p>
                                        @endif
                                        <p class="card-text"><small class="text-muted">Total Transactions</small></p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
                @if ($bands->count() > 0)
                    @foreach ($bands as $band )
                        @if($band->id === $band_show_id)
                            <h4 class="mt-2">Gig History</h4>
                            @if ($band->bookings->count() > 0)
                                @foreach($band->bookings as $booking)
                                    @if($booking->status !== 'Canceled' && $booking->status !== 'Pending' )
                                        <div class="post-card mb-2" style="width:100%">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="title"> {{ $booking->event_name }}</h6>
                                                    <h6 class="">{{ $booking->event_date }}</h6>
                                                </div>
                                                <div class="mt-2">
                                                    @forelse($booking->user->reviews->where('booking_id', $booking->id) as $review)
                                                        <h6 class="form-control border-3 text-dark p-2 mb-2" style="background-color:#EEEEEE">
                                                           <b>Review:</b> {{ $review->review }}
                                                        </h6>
                                                    @empty
                                                        <p>No review found.</p>
                                                    @endforelse

                                                    @forelse($booking->user->reviews->where('booking_id', $booking->id) as $rating)
                                                        @php
                                                            $stars = '';
                                                            for ($i = 1; $i <= $rating->rating; $i++) {
                                                                $stars .= '<i class="fa-solid fa-star text-warning"></i>';
                                                            }
                                                            for ($i = $rating->rating + 1; $i <= 5; $i++) {
                                                                $stars .= '<i class="far fa-star"></i>';
                                                            }
                                                        @endphp
                                                        <h6 class="form-control border-0 text-dark p-2 mb-2">
                                                            <b>Rate: {!! $stars !!}</b>
                                                        </h6>
                                                    @empty
                                                        <p>No ratings found.</p>
                                                    @endforelse
                                                    <h6 class="form-control border-3 text-dark p-2 mb-2" style="background-color:#EEEEEE">
                                                        <b>Rated By:</b> {{ $booking->user->username }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @elseif ($band->bookings->count() <= 0)
                            <p class="mt-2 text-center">No gig history found</p>
                            @endif
                        @endif
                    @endforeach
                @endif
            </div>

        </div>
    </div>
</div>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins&family=Sacramento&display=swap');
    /* font-family: 'Poppins', sans-serif;
font-family: 'Sacramento', cursive; */

.modal-backdrop{
    display: none;
}
img {
  max-width: 100%;
  display: block;
}
    *{
    font-family: 'Poppins', sans-serif;
    }
    .card{
        width:400px;
    }
    .header{
        font-size:  5vh;
        font-weight: bold;
        color:#00376b;
    }

    h1{
        text-align:center;
        margin-bottom:50px;
        margin-top:50px;
    }

    .post-card {
  width: 320px;
  background: wheat;
  background-color: #146C94;
  border: 1px solid rgb(84 90 106);
  border-radius: 20px;
  display: flex;
  flex-direction: column;
  padding: 10px 20px;
}


.title {
  font-size: 20px;
  line-height: 22px;
  font-weight: 600;
  margin-top: 20px;
  color: #fff;
  text-decoration: none;
  transition: all .35s ease-in;
}

.title:hover {
  text-decoration: underline blueviolet;
}

.datetime {
  font-size: 13px;
  color: whitesmoke;
  margin: 10px 0;
}


.cta {
  border: none;
  background: none;
  margin-left: 25%;
}

.cta span {
  padding-bottom: 7px;
  letter-spacing: 4px;
  font-size: 14px;
  padding-right: 15px;
  text-transform: uppercase;
}

.cta svg {
  transform: translateX(-8px);
  transition: all 0.3s ease;
}

.cta:hover svg {
  transform: translateX(0);
}

.cta:active svg {
  transform: scale(0.9);
}

.hover-underline-animation {
  position: relative;
  color: white;
  padding-bottom: 20px;
}

.hover-underline-animation:after {
  content: "";
  position: absolute;
  width: 100%;
  transform: scaleX(0);
  height: 2px;
  bottom: 0;
  left: 0;
  background-color: #000000;
  transform-origin: bottom right;
  transition: transform 0.25s ease-out;
}

.cta:hover .hover-underline-animation:after {
  transform: scaleX(1);
  transform-origin: bottom left;
}
.popup-message {
    position: relative;
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
