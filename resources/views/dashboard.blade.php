@extends('layouts.app')

@section('title', 'Plans You Can Do in Your Membership')

@section('contents')
<div class="content-wrapper">
    <div class="content">
        <!-- Plan Images -->
        <div class="row">    
            <div class="col-12 mt-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Gym Plans</h5>
                        <div class="row">
                            <!-- Plan 1 -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card">
                                    <img src="{{ asset('images/plans/plan1.jpg') }}" class="card-img-top" alt="Plan 1">
                                    <div class="card-body">
                                        <h6 class="card-title">Weight Loss</h6>
                                        <a>Tujuan: Mengurangi lemak tubuh sambil mempertahankan massa otot.</a>
                                        <p>Fokus: Defisit kalori, latihan kardio intensif, dan beban ringan dengan repetisi tinggi.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Plan 2 -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card">
                                    <img src="{{ asset('images/plans/plan2.jpg') }}" class="card-img-top" alt="Plan 2">
                                    <div class="card-body">
                                        <h6 class="card-title">Body Building</h6>
                                        <a>Tujuan: Meningkatkan massa otot dengan sedikit penambahan lemak.</a>
                                        <p>Fokus: Surplus kalori, latihan beban berat, dan protein tinggi.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Plan 3 -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card">
                                    <img src="{{ asset('images/plans/plan3.jpg') }}" class="card-img-top" alt="Plan 3">
                                    <div class="card-body">
                                        <h6 class="card-title">Maintenance Plan</h6>
                                        <a>Tujuan: Mempertahankan komposisi tubuh saat ini.</a>
                                        <p>Fokus: Asupan kalori sesuai kebutuhan, latihan beban dan kardio seimbang.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card">
                                    <img src="{{ asset('images/plans/plan4.jpg') }}" class="card-img-top" alt="Plan 4">
                                    <div class="card-body">
                                        <h6 class="card-title">Strength Training</h6>
                                        <a>Tujuan: Meningkatkan kekuatan otot dan performa fisik.</a>
                                        <p>Fokus: Latihan compound (deadlift, bench press, squat) dengan repetisi rendah dan beban tinggi.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card">
                                    <img src="{{ asset('images/plans/plan5.jpg') }}" class="card-img-top" alt="Plan 5">
                                    <div class="card-body">
                                        <h6 class="card-title">Endurance Plan</h6>
                                        <a>Tujuan: Meningkatkan daya tahan fisik.</a>
                                        <p>Fokus: Latihan kardio intensitas sedang hingga tinggi, seperti lari jarak jauh atau HIIT.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card">
                                    <img src="{{ asset('images/plans/plan6.jpg') }}" class="card-img-top" alt="Plan 6">
                                    <div class="card-body">
                                        <h6 class="card-title">Body Recomposition Plan</h6>
                                        <a>Tujuan: Mengurangi lemak sambil meningkatkan massa otot.</a>
                                        <p>Fokus: Latihan kekuatan dengan asupan protein tinggi dan pengaturan kalori yang ketat.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card">
                                    <img src="{{ asset('images/plans/plan7.jpg') }}" class="card-img-top" alt="Plan 7">
                                    <div class="card-body">
                                        <h6 class="card-title">Powerlifting Plan</h6>
                                        <a>Tujuan: Meningkatkan kemampuan angkat beban maksimal.</a>
                                        <p>Fokus: Latihan dengan repetisi rendah (1-5) untuk deadlift, bench press, dan squat.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card">
                                    <img src="{{ asset('images/plans/plan8.jpg') }}" class="card-img-top" alt="Plan 8">
                                    <div class="card-body">
                                        <h6 class="card-title">Rehabilitation Plan</h6>
                                        <a>Tujuan: Pemulihan setelah cedera atau sakit.</a>
                                        <p>Fokus: Latihan ringan dengan pengawasan fisioterapis atau pelatih dengan pelatih.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card">
                                    <img src="{{ asset('images/plans/plan9.jpg') }}" class="card-img-top" alt="Plan 9">
                                    <div class="card-body">
                                        <h6 class="card-title">Beginner Plan</h6>
                                        <a>Tujuan: Membantu pemula memulai perjalanan fitness.</a>
                                        <p>Fokus: Latihan dasar, pengenalan alat gym, dan penyesuaian pola makan.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card">
                                    <img src="{{ asset('images/plans/plan10.jpg') }}" class="card-img-top" alt="Plan 10">
                                    <div class="card-body">
                                        <h6 class="card-title">Specialized Plan</h6>
                                        <a>Prenatal Fitness Plan: Untuk ibu hamil.</a>
                                        <p>Senior Fitness Plan: Untuk orang lanjut usia.</p>
                                        <p>Bodybuilding Plan: Untuk mempersiapkan kompetisi fisik.</p>
                                    </div>
                                </div>
                            </div>


                            <!-- Add more plans as needed -->
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>
@endsection
