<div>
    <div class="container">

        <div class="content">
            @if(isset($errorMsg))
                <div class="alert alert-danger">
                    {{$errorMsg}}
                </div>
            @endif
            @if(session()->has('message'))
                <div id="popup-message" class="popup-message " >
                    {{ session()->get('message') }}
                </div>
            @endif
          <h6>Muzika</h6>
          <form class="content__form">
            <div class="content__inputs">
              <label>
                <input required="" type="email" wire:model='email'>
                <span>Email</span>
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
              </label>
              <label>
                <input required="" type="password" wire:model='password'>
                <span>Password</span>
                @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
              </label>
            </div>
            <button wire:click='submit'>Log In</button>
          </form>
          <div class="content__or-text">
            <span></span>
            <span>OR</span>
            <span></span>
          </div>
          <div class="content__forgot-buttons">
            <button>
              <span>
                <svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 408.788 408.788" y="0" x="0" height="512" width="512" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg">
                  <g>
                    <path class="" data-original="#475993" fill="#475993" d="M353.701 0H55.087C24.665 0 .002 24.662.002 55.085v298.616c0 30.423 24.662 55.085 55.085 55.085h147.275l.251-146.078h-37.951a8.954 8.954 0 0 1-8.954-8.92l-.182-47.087a8.955 8.955 0 0 1 8.955-8.989h37.882v-45.498c0-52.8 32.247-81.55 79.348-81.55h38.65a8.955 8.955 0 0 1 8.955 8.955v39.704a8.955 8.955 0 0 1-8.95 8.955l-23.719.011c-25.615 0-30.575 12.172-30.575 30.035v39.389h56.285c5.363 0 9.524 4.683 8.892 10.009l-5.581 47.087a8.955 8.955 0 0 1-8.892 7.901h-50.453l-.251 146.078h87.631c30.422 0 55.084-24.662 55.084-55.084V55.085C408.786 24.662 384.124 0 353.701 0z"></path>
                  </g>
                </svg>
              </span>
              <span>Log in with Facebook</span>
            </button>
            <a href="/register"><button>Don't have an account? <span style="color:blue;">Sign up here</span></button></a>
          </div>
        </div>
      </div>
</div>
<style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&family=Sacramento&display=swap');
    /* font-family: 'Poppins', sans-serif;
font-family: 'Sacramento', cursive; */


.content h6{
    font-family: 'Sacramento', cursive;
    font-weight:bolder;
    font-size:60px;
    color:#00376b;
    margin-bottom: 20px;

}

.container {
  border-radius: 1px;
  padding: 50px 40px 20px 40px;
  box-sizing: border-box;
  font-family: sans-serif;
  color: #737373;
  border: 1px solid rgb(219, 219, 219);
  text-align: center;
  background: white;
  margin-top: 90px;
  width:500px;

}

.container svg {
  width: 16px;
  height: auto;
}

.content__form {
  display: flex;
  flex-direction: column;
  row-gap: 14px;
}

.content__inputs {
  display: flex;
  flex-direction: column;
  row-gap: 8px;
}

.content__form label {
  border: 1px solid rgb(219, 219, 219);
  display: flex;
  align-items: center;
  position: relative;
  min-width: 268px;
  height: 38px;
  background: rgb(250, 250, 250);
  border-radius: 3px;
}

.content__form span {
  position: absolute;
  text-overflow: ellipsis;
  transform-origin: left;
  font-size: 12px;
  left: 8px;
  pointer-events: none;
  transition: transform ease-out .1s
}

.content__form p {
  position: absolute;
  text-overflow: ellipsis;
  transform-origin: right;
  font-size: 10px;
  right: 8px;
  pointer-events: none;
  transition: transform ease-out .1s
}
.content__form input {
  width: 100%;
  background: inherit;
  border: 0;
  outline: none;
  padding: 9px 8px 7px 8px;
  text-overflow: ellipsis;
  font-size: 16px;
  vertical-align: middle;
}

.content__form input:valid+span {
  transform: scale(calc(10 / 12)) translateY(-10px);
}

.content__form input:valid {
  padding: 14px 0 2px 8px;
  font-size: 12px;
}

.content__or-text {
  display: flex;
  justify-content: space-between;
  align-items: center;
  text-transform: uppercase;
  font-size: 13px;
  column-gap: 18px;
  margin-top: 18px;
}

.content__or-text span:nth-child(3),
.content__or-text span:nth-child(1) {
  display: block;
  width: 100%;
  height: 1px;
  background-color: rgb(219, 219, 219);
}

.content__forgot-buttons {
  display: flex;
  flex-direction: column;
  margin-top: 28px;
  row-gap: 15px;
}

a{
    text-decoration: none;
    display: flex;
  justify-content: center;
}
.content__forgot-buttons  button {
  display: flex;
  justify-content: center;
  align-items: center;
  column-gap: 8px;
  background: none;
  border: none;
  cursor: pointer;
  font-size: 13px;
  color: #00376b;
}

.content__forgot-buttons  button:first-child {
  color: #385185;
  font-size: 14px;
  font-weight: 600;
}

.content__form button {
  background: rgb(0, 149, 246);
  color: white;
  border: none;
  border-radius: 8px;
  font-weight: 700;
  font-size: 14px;
  padding: 7px 16px;
  cursor: pointer;
}

.content__form button:hover {
  background: rgb(24, 119, 242);
}

.content__form button:active:not(:hover) {
  background: rgb(0, 149, 246);
  opacity: .7;
}

.popup-message {
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
