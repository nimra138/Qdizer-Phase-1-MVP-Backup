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

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Manrope:wght@500;600;700;800&family=Sora:wght@600;700;800&display=swap" rel="stylesheet">

    {{-- V25 Theme --}}
    <link rel="stylesheet" href="{{ asset('user/css/styles.css') }}">

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

{{-- Back To Top --}}
<button id="backToTop" class="back-to-top" aria-label="Back to top">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <polyline points="18 15 12 9 6 15"></polyline>
    </svg>
</button>

{{-- V25 Main JS --}}
<script src="{{ asset('user/js/main.js') }}"></script>

<script>
const backToTopBtn = document.getElementById('backToTop');

if (backToTopBtn) {
    window.addEventListener('scroll', function () {
        if (window.scrollY > 300) {
            backToTopBtn.classList.add('visible');
        } else {
            backToTopBtn.classList.remove('visible');
        }
    });

    backToTopBtn.addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}
</script>

@stack('scripts')

</body>

</html>