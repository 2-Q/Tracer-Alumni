@extends('layouts.app')
@section('title', 'Home - Bursa Kerja Khusus STMJ')
@section('content')
 @if (!Auth::check())
{{--  <div style="margin-top:-22px;" id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img style="background-color: #999" src="{{ asset('slides/hm.jpg') }}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h1 >Jika anda alumni, mari bergabung</h1>
          <button class="btn btn-primary"><a style="color: white;text-decoration:none" href="{{ route('register') }}">{{ __('Daftar Sekarang') }}</a></button>
        </div>
      </div>
    </div>
</div>  --}}
@endif

<div class="text-center" style="background: linear-gradient( #00C2D9, white); padding:50px 0 50px 0; margin-top:-20px; margin-bottom:50px;">
    @if (!Auth::check())
    <h2 class="mb-2" >Mari bergabung bersama kami</h2>
    <button class="btn btn-primary"><a style="color: white;text-decoration:none" href="{{ route('register') }}">{{ __('Daftar Sekarang') }}</a></button>
    @endif
</div>


</div>
<div class="container">
    <div class=" row justify-content-center mt-3">
        <h3>Kepala Sekolah</h3>
    </div>
    <div class=" row justify-content-center">
        <H1 style="font-family: arial">SMKN 1 JENANGAN</H1>
    </div>
    <div  class=" row justify-content-center">
        <img style="width: 350px; border-top:1px solid black" class="mt-2 py-2" src="{{ asset('pjono.png') }}" alt="">
    </div>
    </div>
    <div class="text-center" style="background: linear-gradient( white, #00C2D9); padding:50px 0 50px 0; margin-bottom:-4px;margin-top:50px;">
    </div>
    {{--  News  --}}
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="container mb-2 mt-2">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('slides/telo2.jpg') }}" height="250" width="250" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">BERITA</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container mb-2 mt-2">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('slides/telo2.jpg') }}" height="250" width="250" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">BERITA</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container mb-2 mt-2">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('slides/telo2.jpg') }}" height="250" width="250" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">BERITA</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    {{--  End News  --}}
    <div style="background-image: url({{ asset('bck.jpg') }}); padding:50px;" >
        
    <div class="row">
        <div class="col-md-6">
            <h3 style="border-bottom: 1px solid #999">Visi</h3>
            <p>Menjadi penyalur tamatan serta menjembatani antara pencari kerja dengan pemberi kerja untuk menyiapkan dan mendapatkan sumber daya manusia yang berkualitas sesuai dengan kompetensinya dan berkarakter baik.</p>
        </div>
        <div class="col-md-6">
            <h3 style="border-bottom: 1px solid #999" >Misi</h3>
            <p><i class="fas fa-arrow-right"></i> Meningkatkan kerjasama dengan industri dalam hal rekruitmen tenaga kerja maupun kerjasama lain secara kontinyu yang bermanfaat bagi kedua belah pihak. </p>
            <p><i class="fas fa-arrow-right"></i> Berperan sebagai pusat pelayanan pencari kerja lulusan, dan industri dalam rangka rekruitmen tenaga kerja baik dalam negeri maupun luar negeri. </p>
            <p><i class="fas fa-arrow-right"></i> Meningkatkan komunikasi dengan alumni untuk berperan dalam pengembangan BKKk khususnya dan sekolah pada umumnya. </p>
            <p><i class="fas fa-arrow-right"></i> Meningkatkan kemampuan dan keterampilan SDM pengelolah bkk dalam hal pelayanan, baik yang bersifat administratif maupun personaliti yaitu “tanggap, tepat, ramah dan peduli”. </p>
        </div>
    </div>
</div>
@endsection
