<div class="container">
    <h2 class="mt-3 mb-3">Booking Ended</h2>
    <div class="card cardi px-5 mx-auto" style="height:37rem; width:40rem">

        <div class="card-body mt-3">
            <h5>Event Performer</h5>
            @if(!is_null($book))
                <div class="card mb-4 text-center" style="background-color:white">
                    @if(!is_null($book->band))
                    <p class="mt-2" style="color:red">{{ $book->band->band_name }}
                    </p>
                    <h6>{{ $book->band->genre }}</h6>

                    @endif

                </div>


                <h5>Rate and Review</h5>
                <hr>
                <form>
                    <div class="row">
                        <div class="rate py-3 text-white">
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
                        <div class="location">
                            <textarea name="" id="" cols="10" rows="10" placeholder="Write a review here" class="form-control border-1 text-dark p-2 mb-2" wire:model='review'></textarea>
                        </div>
                    </div>

                    <div class="col float-end">
                    <!-- Submit button -->
                        <button type="button" class="btn btn-primary btn-block mb-4" wire:click="complete({{ $book->id }})">Send Rate</button>
                        <button type="submit"  wire:click="cancel" class="btn btn-secondary btn-block mb-4">Cancel</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>

<style scoped>
    .card .cardi{
border: 1;
box-shadow: 5px 6px 6px 2px #e9ecef;
border-radius: 12px;
}

.name{
margin-top: -21px;
font-size: 18px;
}

/*
.fw-500{
font-weight: 500 !important;
} */


.start{

color: green;
}



.rating {
display: flex;
flex-direction: row-reverse;
justify-content: center
}

.rating>input {
display: none
}

.rating>label {
position: relative;
width: 1em;
font-size: 30px;
font-weight: 300;
color: #FFD600;
cursor: pointer
}

.rating>label::before {
content: "\2605";
position: absolute;
opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
opacity: 1 !important
}

.rating>input:checked~label:before {
opacity: 1
}

.rating:hover>input:checked~label:before {
opacity: 0.4
}


.buttons{
top: 36px;
position: relative;
}


.rating-submit{
border-radius: 15px;
color: #fff;
    height: 49px;
}


.rating-submit:hover{

color: #fff;
}
</style>
