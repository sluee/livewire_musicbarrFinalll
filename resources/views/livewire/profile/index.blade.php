<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
    <div class="card h-100">
        <div class="card-body">
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h5 class="mb-3 text-white bolder">Personal Details</h5>
                </div>
                @if(auth()->check())
                    <div class="image-upload position-relative mt-2">
                        <input type="file" class="form-control position-absolute top-0 start-0 opacity-0" wire:model="profile_pic" id="image" name="image">
                        <label for="image" class="upload-label d-flex align-items-center justify-content-center">

                            <img width="100" height="100" src="{{ $profile_pic ? $profile_pic->temporaryUrl() : (auth()->user()->profile_pic ? asset('storage/bandImgs/' . auth()->user()->profile_pic) : asset('assets/defaultProfile/pfp.png')) }}" alt="Profile Image" class="preview-image rounded-circle bg-dark mb-2">
                            {{-- <img width="100" height="100" src=" asset('assets/defaultProfile/pfp.jpg'))" alt="Profile Image" class="preview-image rounded-circle bg-dark mb-2"> --}}
                        </label>
                        <p class="text-center" style="font-size: 10px">Click the image to change profile</p>
                    </div>
                @endif
                    <div class="form-outline mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ auth()->user()->name }}" wire:model='name' />

                    @error('user_name')
                        <p class="invalid-feedback">
                            {{$message}}
                        </p>
                    @enderror
                    </div>

                <div class="form-outline mb-3">
                    <label class="form-label" for="location">Location</label>
                    <input type="text" id="location" class="form-control @error('location') is-invalid @enderror" wire:model='location' />

                @error('location')
                    <p class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
                </div>
                <div class="form-outline mb-3">
                    <label class="form-label" for="description">Description</label>
                    <textarea type="text" id="description" class="form-control @error('description') is-invalid @enderror" wire:model='description'></textarea>

                @error('description')
                    <p class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
                </div>
            </div>
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">
                    <div class="text-right float-end">
                        <button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
                        <button type="button" id="submit" name="submit" class="btn btn-primary" wire:click='submit'>Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style scoped>
    *{
color:white;
}

.container{
margin-top: 50px;
}
.account-settings .user-profile {
margin: 0 0 1rem 0;
padding-bottom: 1rem;
text-align: center;
}
.account-settings .user-profile .user-avatar {
margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
width: 90px;
height: 90px;
-webkit-border-radius: 100px;
-moz-border-radius: 100px;
border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
margin: 0;
font-size: 0.8rem;
font-weight: 400;
}
.account-settings .about {
margin: 1rem 0 0 0;
font-size: 0.8rem;
text-align: center;
}
.card {
background: #146C94;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
border: 0;
margin-bottom: 1rem;
}
.form-control {
border: 1px solid #1f43b9;
-webkit-border-radius: 2px;
-moz-border-radius: 2px;
border-radius: 2px;
font-size: .825rem;
background: white;
color:black;
}
</style>
