<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MUZIKO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    @livewireStyles()
</head>
<body>
    @include('layout.navbar')
    <div class="overlay-container">
        <h1>Get ready to rock with famous musicians!</h1>
        <p>Book now for an electrifying performance at your event..</p>
        <a href="/register"> <button>
            Sign up
            <div class="arrow-wrapper">
                <div class="arrow"></div>

            </div>
        </button></a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    @livewireScripts()
</body>
</html>

<style scoped>

body {
  position: relative;
  background-image: url({{ asset('assets/bg3.gif') }});
  background-size: cover;
  /* background-position: center; */
  background-repeat: no-repeat;
}

body::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: cover;
  height: 100%;
  background-color: rgba(6, 0, 0, 0.5); /* Adjust the opacity here */
}

.overlay-container {
  position: relative;
  padding: 20px;
  margin-top: 10%;
  color: white;
  text-align: center;
}

a{
    text-decoration: none;
}
.overlay-container h1 {
  font-size: 40px;
  font-weight: bolder;
  margin-bottom: 20px;

}

.overlay-container p {
  font-size: 18px;
}


button {
  --primary-color: #3a6edd;
  --secondary-color: #fff;
  --hover-color: #19129e;
  --arrow-width: 10px;
  --arrow-stroke: 2px;
  box-sizing: border-box;
  border: 0;
  border-radius: 20px;
  color: var(--secondary-color);
  padding: 1em 1.8em;
  background: var(--primary-color);
  display: flex;
  transition: 0.2s background;
  align-items: center;
  gap: 0.6em;
  font-weight: bold;
  margin-left: 45%;
}

button .arrow-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
}

button .arrow {
  margin-top: 1px;
  width: var(--arrow-width);
  background: var(--primary-color);
  height: var(--arrow-stroke);
  position: relative;
  transition: 0.2s;
}

button .arrow::before {
  content: "";
  box-sizing: border-box;
  position: absolute;
  border: solid var(--secondary-color);
  border-width: 0 var(--arrow-stroke) var(--arrow-stroke) 0;
  display: inline-block;
  top: -3px;
  right: 3px;
  transition: 0.2s;
  padding: 3px;
  transform: rotate(-45deg);
}

button:hover {
  background-color: var(--hover-color);
}

button:hover .arrow {
  background: var(--secondary-color);
}

button:hover .arrow:before {
  right: 0;
}

</style>
