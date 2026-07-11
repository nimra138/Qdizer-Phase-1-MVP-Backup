<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'QDizer - Professional Quotation Management Software')</title>

    <meta name="description"
        content="@yield('meta_description','QDizer helps contractors and service businesses create professional quotations, generate PDF quotes, manage clients and send quotations via WhatsApp.')">

    <meta name="keywords"
        content="Quotation Management, Quotation Software, Contractor Software, PDF Quotations, WhatsApp Quotations, CRM">

    <meta name="author" content="Amberbyte">

    <meta name="theme-color" content="#0e222e">

    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- AOS -->

    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Fonts -->

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Sora:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.8.0/build/css/intlTelInput.css">
    <link rel="stylesheet" href="{{ asset('user/style.css') }}">

    @stack('styles')

</head>

<body>

<div class="site-wrapper">

    {{-- Header --}}
    @include('user.home.partials.header')

    {{-- Main Content --}}
    <main>

        @yield('content')

    </main>

    {{-- Footer --}}
    @include('user.home.partials.footer')

</div>

<!-- Back To Top -->

<button id="backToTop"
        class="btn btn-warning rounded-circle shadow position-fixed"
        style="right:25px;bottom:25px;width:50px;height:50px;display:none;z-index:999;">

    <i class="bi bi-arrow-up"></i>

</button>

<!-- Bootstrap -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- AOS -->

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>

AOS.init({
    duration:700,
    once:true
});

const topBtn=document.getElementById('backToTop');

window.addEventListener('scroll',function(){

    if(window.scrollY>300){

        topBtn.style.display='block';

    }else{

        topBtn.style.display='none';

    }

});

topBtn.addEventListener('click',function(){

    window.scrollTo({

        top:0,

        behavior:'smooth'

    });

});

</script>

@stack('scripts')

</body>

</html>