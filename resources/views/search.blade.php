@extends('layouts.main')
@section('title', 'Rumah Modern Di Jakarta | Homeseek')
@section('content')

<section class="search-bar-secondary pb-4">
    <div class="container">
        <form action="" id="search-bar">
            <div class="row">
                <p class="mb-2 px-4 pt-3 pb-0">Cari Properti</p>
                <div class="col-lg-2">
                    <select class="form-select" name="properti" aria-label="Default select example">
                        <option {{Request::get('properti') == 'rumah' ? 'selected' : ''}} value="rumah">Rumah</option>
                        <option {{Request::get('properti') == 'apartemen' ? 'selected' : ''}} value="apartemen">Apartemen</option>
                        <option {{Request::get('properti') == 'tanah' ? 'selected' : ''}} value="tanah">Tanah</option>
                        <option {{Request::get('properti') == 'ruko' ? 'selected' : ''}} value="ruko">Ruko</option>
                        <option {{Request::get('properti') == 'semua' ? 'selected' : ''}} value="semua">Apapun</option>
                    </select>
                </div>
                <div class="col-lg-9">  
                    <input type="text" onClick="this.select();" class="form-control" name="q" placeholder="cari rumah minimalis di jakarta" value="{{Request::get('q')}}">
                </div>
                <div class="col-lg-1">  
                    <button type="submit" class="btn btn-primary w-100">Cari</button>
                </div>
            </div>
        </form>
    </div>
</section>

<section class="breadcrumb-section">
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
            <li class="breadcrumb-item"><a href="/beli">Beli</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{Request::get('properti') == NULL ? 'Properti Dijual' : ucfirst(Request::get("properti")) . " Dijual"}}</li>
          </ol>
        </nav>
    </div>
</section>

<!-- search result section -->
<section class="search-result-metadata">
    <div class="container">
        <div class="row">
            <h4 class="search-query">{{Request::get('q')}}</h4>
            <div class="col-4">
                <p class="my-2">{{count($listings)}} Properti Ditemukan</p>
            </div>
            <div class="col-2 d-flex ms-auto">
                <select class="form-select form-sort">
                    <option selected value="rumah">Paling Sesuai</option>
                    <option value="apartemen">Harga Tertinggi</option>
                    <option value="apartemen">Harga Terendah</option>
                </select>
            </div>
            <div class="col-lg-1 d-flex d-md-none">  
                <button class="btn btn-outline-primary h-100" data-bs-toggle="modal" data-bs-target="#modalFilter"><i class="fas fa-sliders-h"></i> Filter</button>
            </div>
        </div>
    </div>
</section>

<!-- filter section -->
<section class="search-result-listing mt-4">
    <div class="container">
        <div class="row">
            <div class="d-none d-md-block col-md-3">
                <form action="" id="filter-form">
                
                <!-- hidden -->
                <input type="hidden" name="properti" value="{{Request::get('properti')}}">
                <input type="hidden" name="q" value="{{Request::get('q')}}">

                <p>Filter <span class="badge bg-secondary">2</span></p>
                <div class="accordion" id="accordionFilter">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="filter-1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#filter-1-collapse" aria-expanded="true" aria-controls="filter-1-collapse">
                            Kisaran Harga
                        </button>
                        </h2>
                        <div id="filter-1-collapse" class="accordion-collapse collapse show" aria-labelledby="filter-1">
                            <div class="accordion-body">
                                <label class="mb-1" for="minHarga">Harga Minimal</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    <input type="number" name="minHarga" id="minHarga" class="form-control" value="{{Request::get('minHarga')}}" placeholder="Min. Harga" aria-label="Min. Harga">
                                </div>      
                                <label class="mb-1" for="maxHarga">Harga Maksimal</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    <input type="number" name="maxHarga" id="maxHarga" class="form-control" value="{{Request::get('maxHarga')}}" placeholder="Maks. Harga" aria-label="Maks. Harga">
                                </div>      
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="filter-2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#filter-2-collapse" aria-expanded="true" aria-controls="filter-2-collapse">
                            Luas Tanah
                        </button>
                        </h2>
                        <div id="filter-2-collapse" class="accordion-collapse collapse" aria-labelledby="filter-2">
                            <div class="accordion-body">
                                <label class="mb-1" for="minLuas">Luas Minimal</label>
                                <div class="input-group mb-3">
                                    <input type="number" name="minLuas" id="minLuas" class="form-control" value="{{Request::get('minLuas')}}" placeholder="Min. Luas" aria-label="Min. Luas">
                                    <span class="input-group-text" id="basic-addon1">m<sup>2</sup></span>
                                </div>      
                                <label class="mb-1" for="maxLuas">Luas Maksimal</label>
                                <div class="input-group mb-3">
                                    <input type="number" name="maxLuas" id="maxLuas" class="form-control" value="{{Request::get('maxLuas')}}" placeholder="Maks. Luas" aria-label="Maks. Luas">
                                    <span class="input-group-text" id="basic-addon1">m<sup>2</sup></span>
                                </div>      
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="filter-3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#filter-3-collapse" aria-expanded="true" aria-controls="filter-3-collapse">
                            Kamar Tidur
                        </button>
                        </h2>
                        <div id="filter-3-collapse" class="accordion-collapse collapse" aria-labelledby="filter-3">
                            <div class="accordion-body">
                                <label class="mb-1" for="minKamar">Minimal</label>
                                <div class="input-group mb-3">
                                    <input type="number" name="minKamar" id="minKamar" class="form-control" value="{{Request::get('minKamar')}}" placeholder="Min. Kamar" aria-label="Min. Kamar">
                                    <span class="input-group-text" id="basic-addon1">Kamar</span>
                                </div>      
                                <label class="mb-1" for="maxKamar">Maksimal</label>
                                <div class="input-group mb-3">
                                    <input type="number" name="maxKamar" id="maxKamar" class="form-control" value="{{Request::get('maxKamar')}}" placeholder="Maks. Kamar" aria-label="Maks. Kamar">
                                    <span class="input-group-text" id="basic-addon1">Kamar</span>
                                </div>      
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="filter-4">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#filter-4-collapse" aria-expanded="true" aria-controls="filter-4-collapse">
                            Kamar Mandi
                        </button>
                        </h2>
                        <div id="filter-4-collapse" class="accordion-collapse collapse" aria-labelledby="filter-4">
                            <div class="accordion-body">
                                <label class="mb-1" for="minKamarMandi">Minimal</label>
                                <div class="input-group mb-3">
                                    <input type="number" name="minKamarMandi" id="minKamarMandi" class="form-control" value="{{Request::get('minKamarMandi')}}" placeholder="Min. Kamar Mandi" aria-label="Min. Kamar Mandi">
                                    <span class="input-group-text" id="basic-addon1">Kamar</span>
                                </div>      
                                <label class="mb-1" for="maxKamarMandi">Maksimal</label>
                                <div class="input-group mb-3">
                                    <input type="number" name="maxKamarMandi" id="maxKamarMandi" class="form-control" value="{{Request::get('maxKamarMandi')}}" placeholder="Maks. Kamar Mandi" aria-label="Maks. Kamar Mandi">
                                    <span class="input-group-text" id="basic-addon1">Kamar</span>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="filter-5">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#filter-5-collapse" aria-expanded="true" aria-controls="filter-5-collapse">
                            Fasilitas
                        </button>
                        </h2>
                        <div id="filter-5-collapse" class="accordion-collapse collapse" aria-labelledby="filter-5">
                            <div class="accordion-body">
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" value="swimming_pool" name="fasilitas[]" {{@in_array('swimming_pool', Request::get('fasilitas')) ? 'checked' : ''}} id="check-fasilitas1">
                                    <label class="form-check-label" for="check-fasilitas1">
                                        Kolam Renang
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" value="carport" name="fasilitas[]" {{@in_array('carport', Request::get('fasilitas')) ? 'checked' : ''}} id="check-fasilitas2">
                                    <label class="form-check-label" for="check-fasilitas2">
                                        Carport
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" value="security" name="fasilitas[]" {{@in_array('security', Request::get('fasilitas')) ? 'checked' : ''}} id="check-fasilitas3">
                                    <label class="form-check-label" for="check-fasilitas3">
                                        Security 24 Jam
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" value="restaurant" name="fasilitas[]" {{@in_array('restaurant', Request::get('fasilitas')) ? 'checked' : ''}} id="check-fasilitas4">
                                    <label class="form-check-label" for="check-fasilitas4">
                                        Restoran
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" value="gym" name="fasilitas[]" {{@in_array('gym', Request::get('fasilitas')) ? 'checked' : ''}} id="check-fasilitas5">
                                    <label class="form-check-label" for="check-fasilitas5">
                                        Gym
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary mt-2 mb-2 w-100">Terapkan Filter</button>
                </form>
            </div>
            <div class="col-12 col-md-9">
                @foreach($listings as $listing)
                <div class="card mb-4">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/assets/tes.jpeg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="listing-title">{{$listing['nama_listing']}}</h5>
                                <h5 class="listing-title">{{$listing['id_properti']}}</h5>
                                <p class="listing-place mb-1"><i class="fas fa-map-marker-alt"></i> {{$listing['wilayah']}}, {{$listing['kota']}}</p>
                                <p class="listing-desc text-truncate">{{$listing['desc']}}</p>
                            </div>
                            <div class="card-footer">
                                <hr class="mt-0">
                                <div class="row desc-detail">
                                    <p><i class="fas fa-bed"></i> {{$listing['kamar']}}
                                    <i class="fas fa-bath ps-3"></i> {{$listing['kamar_mandi']}}
                                    <i class="fas fa-th-large ps-3"></i> {{$listing['luas']}} m<sup>2</sup>
                                    @isset($listing['ratio'])
                                    Score : {{$listing['ratio']}}
                                    @endisset    
                                    </p>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <p class="listing-price">Rp. {{number_format($listing['harga'],0,',','.')}}</p>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <a href="/properti/{{$listing['id_properti']}}" class="btn btn-outline-primary w-100">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- filter modal -->
<div class="modal fade" id="modalFilter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
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
  //form control script
  var myForm2 = document.getElementById('filter-form');

  myForm2.addEventListener('submit', function () {
      var allInputs2 = myForm2.getElementsByTagName('input');

      for (var i = 0; i < allInputs2.length; i++) {
          var input2 = allInputs2[i];

          if (input2.name && !input2.value) {
              input2.name = '';
          }
      }
  });
</script>
@endsection