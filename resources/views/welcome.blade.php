@extends('layouts.main')
@section('title', 'Homeseek | Temukan Properti Impian di Indonesia')
@section('content')

<!-- hero section -->
<section class="hero-section">
  <div class="container-fluid pt-5 pb-2">
    <h2 class="hero-title">Temukan Properti Impian di Indonesia</h2>
    <form action="/beli" id="search-bar">
      <div class="input-group mb-3 mt-4 mx-auto search-bar">
        <select class="form-select form-select-lg" onchange="document.getElementById('search-bar').setAttribute('action', this.value)" aria-label="Default select example">
          <option selected value="/beli">DIJUAL</option>
          <option value="/sewa">DISEWA</option>
        </select>
        <input type="text" class="form-control" name="q" placeholder="cari rumah minimalis di jakarta">
        <button class="btn btn-light btn-search" type="submit" id="button-addon2"><i class="fas fa-search"></i> Cari</button>
      </div>
      <div class="search-bar-filter pb-5">
        <div class="row">
          <div class="col-4">
            <select name="properti" class="form-select form-select-lg" aria-label="Default select example">
              <option selected value="rumah">Rumah</option>
              <option value="apartemen">Apartemen</option>
              <option value="tanah">Tanah</option>
              <option value="ruko">Ruko</option>
              <option value="semua">Apapun</option>
            </select>
          </div>
          <div class="col-4">
            <input type="number" name="minHarga" class="form-control form-control-lg" placeholder="Min. Harga">
          </div>
          <div class="col-4">
            <input type="number" name="maxHarga" class="form-control form-control-lg" placeholder="Maks. Harga">
          </div>
        </div>
      </div>
    </form>
  </div>
</section>

<section class="properti">
  <!-- Properti premium -->
  <div class="container-fluid pb-4">
    <div class="container pt-5">
      <h2 class="section-title">Properti Premium</h2>
      <p class="section-subtitle">Temukan Properti Impian Anda Lewat Properti Terbaik Kami</p>
      <div class="row pt-4">
        <div class="col-lg-6 col-12">
          <div class="card h-100">
            <img src="/assets/tes.jpeg" class="card-img" alt="...">
            <div class="card-img-overlay properti-premium-desc m-3" style="width:50%">
              <p class="desc-title mb-1">{{$premium[0]['nama_listing']}}</p>
              <p class="desc-place mb-1"><i class="fas fa-map-marker-alt"></i> {{$premium[0]['wilayah']}}, {{$premium[0]['kota']}}</p>
              <hr>
              <div class="row desc-detail">
                <p><i class="fas fa-bed"></i> {{$premium[0]['kamar']}}
                  <i class="fas fa-bath ps-3"></i> {{$premium[0]['kamar_mandi']}}
                  <i class="fas fa-th-large ps-3"></i> {{$premium[0]['luas']}} m<sup>2</sup></p>
              </div>
              <a href="/properti/{{$premium[0]['id_properti']}}" class="btn btn-outline-primary w-100">Lihat Detail</a>
            </div>
            <div class="card-img-overlay properti-premium-price m-3">
              <p class="desc-price mb-1">Rp. {{number_format($premium[0]['harga'],0,',','.')}}</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-12">
          <div class="card h-100">
            <img src="/assets/tes2.jpg" class="card-img" alt="...">
            <div class="card-img-overlay properti-premium-desc m-3" style="width:50%">
              <p class="desc-title mb-1">{{$premium[1]['nama_listing']}}</p>
              <p class="desc-place mb-1"><i class="fas fa-map-marker-alt"></i> {{$premium[1]['wilayah']}}, {{$premium[1]['kota']}}</p>
              <hr>
              <div class="row desc-detail">
                <p><i class="fas fa-bed"></i> {{$premium[1]['kamar']}}
                <i class="fas fa-bath ps-3"></i> {{$premium[1]['kamar_mandi']}}
                <i class="fas fa-th-large ps-3"></i> {{$premium[1]['luas']}} m<sup>2</sup></p>
              </div>
              <a href="/properti/{{$premium[1]['id_properti']}}" class="btn btn-outline-primary w-100">Lihat Detail</a>
            </div>
            <div class="card-img-overlay properti-premium-price m-3">
              <p class="desc-price mb-1">Rp. {{number_format($premium[1]['harga'],0,',','.')}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- berdasarkan kategori -->
  <div class="container-fluid pb-5 my-5 bg-light-blue">
    <div class="container pt-5">
      <h2 class="section-title">Jelajahi Macam - Macam Properti</h2>
      <p class="section-subtitle">Jelajahi Berbagai Properti Berdasarkan Tipe</p>
      <div class="row pt-4">
        <div class="col-lg-12 col-12 pb-3">
          <a href="/beli?properti=rumah">
            <div class="card" style="height:230px">
              <img src="/assets/img/banner/house.jpg" class="card-img" alt="Rumah">
              <div class="card-img-overlay d-flex">
                <h2 class="kategori-text text-center mx-auto align-self-end"><span style="font-size:20px">RUMAH</span><br><br> Lihat Produk > </h2>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-6 col-12 pb-3">
          <a href="/beli?properti=apartemen">
            <div class="card" style="height:230px">
              <img src="/assets/img/banner/apartment.jpg" class="card-img" alt="Apartemen">
              <div class="card-img-overlay d-flex">
                <h2 class="kategori-text text-center mx-auto align-self-end"><span style="font-size:20px">APARTEMEN</span><br><br> Lihat Produk > </h2>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-6 col-12 pb-3">
          <a href="/beli?properti=tanah">
            <div class="card" style="height:230px">
              <img src="/assets/img/banner/tanah.jpg" class="card-img" alt="Tanah">
              <div class="card-img-overlay d-flex">
                <h2 class="kategori-text text-center mx-auto align-self-end"><span style="font-size:20px">TANAH</span><br><br> Lihat Produk > </h2>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container-fluid pb-4">
    <div class="container">
      <h2 class="section-title">Best Seller</h2>
      <p class="section-subtitle">Temukan Rumah Terbaik Dengan Harga Terjangkau</p>
      <div class="row listing-carousel">
        @foreach($bestSeller as $listing)
        <div class="col">
          <div class="card">
            <img src="/assets/tes.jpeg" class="card-img-top" alt="...">
            <div class="card-body" id="best-seller">
              <h5 class="listing-title">{{$listing['nama_listing']}}</h5>
              <p class="listing-place mb-1"><i class="fas fa-map-marker-alt"></i> {{$listing['wilayah']}}, {{$listing['kota']}}</p>
            </div>
            <div class="card-footer">
              <hr class="mt-0">
              <div class="row desc-detail">
                <p><i class="fas fa-bed"></i> {{$listing['kamar']}}
                <i class="fas fa-bath ps-3"></i> {{$listing['kamar_mandi']}}
                <i class="fas fa-th-large ps-3"></i> {{$listing['luas']}} m<sup>2</sup></p>
              </div>
              <p class="listing-price">Rp. {{number_format($listing['harga'],0,',','.')}}</p>
              <a href="/properti/{{$listing['id_properti']}}" class="btn btn-outline-primary w-100">Lihat Detail</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endsection

@section('scripts')
<script>
  //form control script
  var myForm = document.getElementById('search-bar');

  myForm.addEventListener('submit', function () {
      var allInputs = myForm.getElementsByTagName('input');

      for (var i = 0; i < allInputs.length; i++) {
          var input = allInputs[i];

          if (input.name && !input.value) {
              input.name = '';
          }
      }
  });
</script>

<script>
  // Get cards
var cards = $('.card-body');
var maxHeight = 0;
// Loop all cards and check height, if bigger than max then save it
for (var i = 0; i < cards.length; i++) {
  if (maxHeight < $(cards[i]).outerHeight()) {
    maxHeight = $(cards[i]).outerHeight();
  }
}

if(maxHeight > 88){
  maxHeight = 88;
}
// Set ALL card bodies to this height
for (var i = 0; i < cards.length; i++) {
  $(cards[i]).height(maxHeight);
}
</script>
@endsection