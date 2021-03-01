<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
      <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
      <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
      {{-- <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li> --}}
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('slides/telo.jpg') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('slides/telo2.jpg') }}" class="d-block w-100" alt="...">
      </div>
      {{-- <div class="carousel-item">
        <img src="{{ asset('slides/telo.jpg') }}" class="d-block w-100" alt="...">
      </div> --}}
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden"></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden"></span>
    </a>
  </div>