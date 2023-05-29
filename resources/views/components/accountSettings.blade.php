@extends('welcome')

@section('content')
<div class="container ">
    <div class="" style="margin-left: 150px">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    {{-- <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Maxwell Admin"> --}}
                                     {{-- <img width="100" height="100" src=" {{Auth::user()->profile_pic}}" alt="Profile Image" class="preview-image rounded-circle bg-dark mb-2"> --}}
                                     <img width="100" height="100" src="{{ (auth()->user()->profile_pic ? asset('storage/bandImgs/' . auth()->user()->profile_pic) : asset('assets/defaultProfile/pfp.png')) }}" alt="Profile Image" class="preview-image rounded-circle bg-dark mb-2">
                                </div>
                                <h5 class="user-name">{{Auth::user()->name}}</h5>
                                <h6 class="user-email">{{Auth::user()->email}}</h6>
                            </div>
                            <div class="about">
                                <h5 class="mb-2 text-white">Bio</h5>
                                <p>{{Auth::user()->description}}</p>
                            </div>
                            <div class="mt-5">
                                <hr>
                                <div class="acc mb-2">
                                    <a href="/profile" >Personal Settings</a>
                                </div>
                                <hr>
                                <div class="acc mb-2">
                                    <a href="/settings" >Account Settings</a>
                                </div>
                                <hr>
                                <div class="acc mt-5">
                                    <button type="button" class="btn btn-danger" style="width:200px">Logout</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <livewire:profile.account-settings>
            </div>
        </div>
    </div>
</div>
@endsection
<style scoped>
*{
    color:white;
}

.acc a{
    text-decoration: none;
    margin-left: 30px;
    font-size: 16px;
    color:white;
}

.acc a:hover{
    color:darkblue;
}
.container{
    margin-top: 70px;
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
    background: #f6f7fb;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}
.form-control {
    border: 1px solid #596280;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    /* background: #1A233A; */
    color: #bcd0f7;
}
</style>
