@extends('layouts.templates.main')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
<!-- About 2 - Travel Blog Component -->
<section class="py-3 py-md-5">
    <div class="container">
        <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
            <div class="col-12 col-lg-6">
                <img class="img-fluid rounded" loading="lazy"
                    src="https://img.freepik.com/free-photo/full-shot-travel-concept-with-landmarks_23-2149153258.jpg?semt=ais_hybrid"
                    alt="Eric's Travel Adventures">
            </div>
            <div class="col-12 col-lg-6">
                <div class="row justify-content-xl-center">
                    <div class="col-12 col-xl-10">
                        <h2 class="mb-3">Why Travel with Eric?</h2>
                        <p class="lead fs-4 mb-3 mb-xl-5">With years of exploring the globe, I bring you stories, tips,
                            and guides to make your travel experiences unforgettable. Join me as we uncover the world’s
                            hidden gems together.</p>
                        <div class="d-flex align-items-center mb-3">
                            <div class="me-3 text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </svg>
                            </div>
                            <div>
                                <p class="fs-5 m-0">Discover unique destinations with insider tips.</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="me-3 text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </svg>
                            </div>
                            <div>
                                <p class="fs-5 m-0">Practical advice for smooth and stress-free travel.</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4 mb-xl-5">
                            <div class="me-3 text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </svg>
                            </div>
                            <div>
                                <p class="fs-5 m-0">Follow my journey and let’s inspire each other to explore.</p>
                            </div>
                        </div>
                        <a href="{{ route('contact-us') }}" class="btn bsb-btn-xl btn-outline-primary rounded-pill">Join
                            the Adventure</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
