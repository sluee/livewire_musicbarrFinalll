        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h5 class="mb-2 text-white bolder">Account Settings</h5>
                        </div>
                        <div class="col-md-8">
                            <div class="form-outline mb-3">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ auth()->user()->username }}" wire:model='username' />

                            @error('username')
                                <p class="invalid-feedback">
                                    {{$message}}
                                </p>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-4 float-right">
                            <button type="submit" class="btn btn-success " style="width:7rem; height:35px; margin-top:33px" wire:click="editUsername">Save</button>
                        </div>
                    </div>

                    <h6>Leave blank if you don't wish to change your password</h6>
                    <hr>

                    <div class="form-outline mb-3">
                        <label class="form-label" for="current_password">Current Password</label>
                        <input type="text" id="current_password" class="form-control @error('old_pass') is-invalid @enderror" wire:model='old_pass' />

                    @error('old_pass')
                        <p class="invalid-feedback">
                            {{$message}}
                        </p>
                    @enderror
                    </div>
                    <div class="form-outline mb-3">
                        <label class="form-label" for="password">New Password</label>
                        <input type="text" id="password" class="form-control @error('password') is-invalid @enderror" wire:model='password'/>

                    @error('password')
                        <p class="invalid-feedback">
                            {{$message}}
                        </p>
                    @enderror
                    </div>
                    <div class="form-outline mb-3">
                        <label class="form-label" for="password">Confirm Password</label>
                        <input type="text" id="password" class="form-control @error('password') is-invalid @enderror" wire:model='password_confirmation'/>

                    @error('password')
                        <p class="invalid-feedback">
                            {{$message}}
                        </p>
                    @enderror
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                                <button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
                                <button type="button" id="submit" name="submit" class="btn btn-primary">Update</button>
                            </div>
                            <div class="float-end mt-4">
                                {{-- <button type="button" class="btn btn-danger">Delete Account</button> --}}
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                   Delete Account
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: red">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Account</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <h6 class="text-dark">Are you sure you want to delete {{ auth()->user()->username }}?</h6>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Delete</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
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
