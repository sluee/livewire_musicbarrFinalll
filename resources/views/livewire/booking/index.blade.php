<div class="container">
    <h3 class=" header mt-3">Booking Request</h3>
            <div class="card" >
                <div class="card-body">
                        <form class="row g-3">
                            @if($selectedBand)
                                <div class="col-md-6">
                                    <label for="band" class="form-label">Band Name</label>
                                    <input type="tetxt" class="form-control" value="{{ $selectedBand->band_name}}" id="band" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="talent_fee" class="form-label">Talent Fee</label>
                                    <input type="text" class="form-control" value="{{ $selectedBand->talent_fee}}" disabled>
                                </div>
                            @endif

                            <h5>Booking Details</h5>
                            <div class="col-4">
                              <label for="eventName" class="form-label">Event Name</label>
                              <input type="text" class="form-control" id="eventName" placeholder="e.g Birthday" wire:model="event_name">
                            </div>
                            <div class="col-4">
                              <label for="eventLocation" class="form-label">Event Location</label>
                              <input type="text" class="form-control" id="eventLocation" placeholder="1234 Main St" wire:model='event_location'>
                            </div>
                            <div class="col-md-4">
                              <label for="eventDate" class="form-label">Event Date</label>
                              <input type="date" class="form-control" id="eventDate" wire:model='event_date'>
                            </div>
                            <div class="col-md-6">
                              <label for="timeStart" class="form-label">Time Start</label>
                              <input type="time" class="form-control" id="timeStart" wire:model="time_start">
                            </div>
                            <div class="col-md-6">
                              <label for="timeEnd" class="form-label">Time End</label>
                              <input type="time" class="form-control" id="timeEnd" wire:model='time_end'>
                            </div>
                            <div class="col-12">
                                <label for="details" class="form-label">Event Details</label>
                                <textarea type="text" class="form-control" id="details"  style="height: 100px" placeholder="share your thoughts.." wire:model='event_details'></textarea>
                            </div>
                            <div class="col-12" >

                                <button type="submit" class="btn btn-secondary" wire:click='cancel'>Cancel</button>
                                <button type="submit" class="btn btn-success" wire:click='submit'>Send Request</button>
                            </div>
                          </form>
                </div>
        </div>
    </div>

<style scoped>
    button{
      float: right;
      margin: 5px;
    }

    .card{
        background-color:#146C94;
        color:white;
        width:70rem;
        margin: auto;
    }
</style>
