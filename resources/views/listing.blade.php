@extends('layouts.main')
@section('title', $listing["nama_listing"].' | Homeseek')
@section('content')
<section class="breadcrumb-section">
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
          <ol class="breadcrumb" style="font-size: 14px">
            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{$listing['TipePenjualan'] == 'jual'? '/beli' : '/sewa'}}?properti=semua">{{$listing['TipePenjualan'] == 'jual'? 'Beli' : 'Sewa'}}</a></li>
            <li class="breadcrumb-item"><a href="{{$listing['TipePenjualan'] == 'jual' ? '/beli' : '/sewa'}}?properti={{strtolower($listing['jenis_listing'])}}">{{ucfirst($listing['jenis_listing'])}} {{$listing['TipePenjualan'] == 'jual' ? 'Dijual' : 'Disewakan'}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$listing['id_properti']}}</li>
          </ol>
        </nav>
    </div>
</section>

<section class="listing-carousel-section">
    <div class="container-fluid">
        <div class="listing-img-carousel">
            <img class="img-fluid listing-img" src="/assets/tes.jpeg" alt="">
            <img class="img-fluid listing-img" src="/assets/tes2.jpg" alt="">
        </div>
    </div>
</section>

<section class="listing-properties-section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-8">
                <h1 class="listing-price mb-2" style="font-size:36px">Rp. {{number_format($listing['harga'],0,',','.')}} {{$listing['TipePenjualan'] == 'sewa' ? '/ Tahun' : ''}}</h1>
                <div class="row desc-detail" style="font-size: 18px">
                    <p><i class="fas fa-bed"></i> {{$listing['kamar']}}
                    <i class="fas fa-bath ps-3"></i> {{$listing['kamar_mandi']}}
                    <i class="fas fa-th-large ps-3"></i> {{$listing['luas']}} m<sup>2</sup></p>
                </div>
                <h5 class="listing-title mt-2" style="font-size:21px">{{$listing['nama_listing']}}</h5>
                <p class="listing-place"><i class="fas fa-map-marker-alt me-1"></i> {{$listing['wilayah']}}, {{$listing['kota']}}</p>

                <hr class="my-5">

                <h5 class="section-title mb-4">Informasi Listing</h5>
                <div class="row informasi-properti">
                    <div class="col-md-6 col-sm-6">
                        <p><label>ID Properti :</label><br>{{$listing['id_properti']}}</p>
                        <p><label>Luas :</label><br>{{$listing['luas']}} m<sup>2</sup></p>
                        <p><label>Kamar Tidur :</label><br>
                        @if($listing['kamar_mandi'] > 0)
                        {{$listing['kamar_mandi']}} Kamar
                        @else
                        -
                        @endif    
                        </p>
                        <p><label>Garasi : </label><br>
                        @if($listing['garasi'] > 0)
                        {{$listing['garasi']}} Mobil
                        @else
                        -
                        @endif
                        </p>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <p><label>Jenis Properti :</label><br>{{$listing['jenis_listing']}}</p>
                        <p><label>Sertifikat Tanah :</label><br>{{$listing['statusTanah']}}</p>
                        <p><label>Kamar Mandi :</label><br>{{$listing['kamar_mandi']}} Kamar Mandi</p>
                        <p><label>Tipe Penjualan :</label><br>{{ucfirst($listing['TipePenjualan'])}}</p>
                    </div>
                </div>

                <hr class="my-5">

                <h5 class="section-title mb-4">Fasilitas</h5>
                <div class="row informasi-properti">
                    <div class="col-md-3 col-sm-6 {{$listing['listing_facilities']['swimming_pool'] == 1 ? 'd-block' : 'd-none'}}">
                        <p><i class="fas fa-swimming-pool me-2"></i>Kolam Renang</p>
                    </div>
                    <div class="col-md-2 col-sm-6 {{$listing['listing_facilities']['carport'] == 1 ? 'd-block' : 'd-none'}}">
                        <p><i class="fas fa-parking me-2"></i>Carport</p>
                    </div>
                    <div class="col-md-2 col-sm-6 {{$listing['listing_facilities']['security'] == 1 ? 'd-block' : 'd-none'}}">
                        <p><i class="fas fa-user-tie me-2"></i>Security</p>
                    </div>
                    <div class="col-md-2 col-sm-6 {{$listing['listing_facilities']['gym'] == 1 ? 'd-block' : 'd-none'}}">
                        <p><i class="fas fa-dumbbell me-2"></i>Gym</p>
                    </div>
                    <div class="col-md-2 col-sm-6 {{$listing['listing_facilities']['restaurant'] == 1 ? 'd-block' : 'd-none'}}">
                        <p><i class="fas fa-utensils me-2"></i>Restoran</p>
                    </div>
                </div>

                <hr class="my-5">

                <h5 class="section-title mb-4">Deskripsi</h5>
                <p class="listing-desc mb-3" style="font-size: 15px">{!! nl2br(e($listing['desc'])) !!}</p>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <img class="img-fluid profile-pic" src="/assets/user-placeholder.jpg" alt="">
                            </div>
                            <div class="col-8">
                                <p class="profile-name">{{$marketing['name']}}</p>
                                <p class="profile-title">Agen Properti</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <p class="mb-0"><i class="fab fa-whatsapp me-2"></i> {{$marketing['phone_number']}}</p>
                            <p><i class="fas fa-envelope me-2"></i> {{$marketing['email']}}</p>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6 px-1">
                                <button class="btn btn-whatsapp w-100"><i class="fab fa-whatsapp"></i> Hubungi Whatsapp</button>
                            </div>
                            <div class="col-6 px-1">
                                <button class="btn btn-primary btn-email w-100"><i class="fas fa-envelope"></i> Hubungi Email</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


@endsection
@section('scripts')
<script>
$('.listing-img-carousel').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  centerMode: true,
  variableWidth: true,
  arrows:false
});
</script>
@endsection