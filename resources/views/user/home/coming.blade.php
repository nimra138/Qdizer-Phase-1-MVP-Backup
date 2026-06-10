<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>QDizer - Coming Soon</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@600;700&display=swap" rel="stylesheet">

<link href="{{ asset('user/style.css') }}" rel="stylesheet">

<style>
.coming-soon-section{
    min-height:80vh;
    display:flex;
    align-items:center;
    justify-content:center;
    background:var(--background);
    position:relative;
    overflow:hidden;
    padding:80px 0;
}

.coming-soon-section::before{
    content:'';
    position:absolute;
    width:500px;
    height:500px;
    background:rgba(255,138,0,.08);
    border-radius:50%;
    top:-200px;
    right:-150px;
    filter:blur(60px);
}

.coming-soon-section::after{
    content:'';
    position:absolute;
    width:400px;
    height:400px;
    background:rgba(14,34,46,.06);
    border-radius:50%;
    bottom:-150px;
    left:-100px;
    filter:blur(60px);
}

.coming-card{
    background:#fff;
    border-radius:24px;
    padding:70px 50px;
    box-shadow:var(--shadow);
    text-align:center;
    position:relative;
    z-index:2;
    max-width:850px;
    margin:auto;
}

.coming-badge{
    display:inline-block;
    background:rgba(255,138,0,.12);
    color:var(--accent);
    padding:10px 18px;
    border-radius:50px;
    font-size:14px;
    font-weight:600;
    margin-bottom:20px;
}

.coming-title{
    font-family:'Sora',sans-serif;
    font-size:60px;
    color:var(--primary);
    margin-bottom:20px;
}

.coming-title span{
    color:var(--accent);
}

.coming-desc{
    color:var(--text-muted);
    font-size:18px;
    line-height:1.8;
    max-width:650px;
    margin:0 auto 40px;
}

.countdown{
    display:flex;
    justify-content:center;
    gap:20px;
    margin-bottom:40px;
    flex-wrap:wrap;
}

.time-box{
    width:110px;
    background:var(--background);
    border:1px solid var(--border);
    border-radius:16px;
    padding:20px;
}

.time-box h2{
    color:var(--primary);
    font-weight:700;
    margin-bottom:5px;
}

.time-box span{
    color:var(--text-muted);
    font-size:14px;
}

.btn-launch{
    background:var(--accent);
    color:#fff;
    border:none;
    padding:14px 32px;
    border-radius:12px;
    font-weight:600;
    transition:.3s;
}

.btn-launch:hover{
    background:var(--accent-hover);
    color:#fff;
}

@media(max-width:768px){

    .coming-card{
        padding:40px 25px;
    }

    .coming-title{
        font-size:42px;
    }

    .time-box{
        width:90px;
    }
}
</style>

</head>

<body>

@include('user.home.partials.header')

<section class="coming-soon-section">

    <div class="container">

        <div class="coming-card">

            <div class="coming-badge">
                🚀 QDizer Is Launching Soon
            </div>

            <h1 class="coming-title">
                Smart <span>Quotation SaaS</span>
            </h1>

            <p class="coming-desc">
                QDizer helps businesses create, manage, track and automate
                quotations professionally. We're working hard to deliver
                a faster and smarter quotation management experience.
            </p>

            {{-- <div class="countdown">

                <div class="time-box">
                    <h2 id="days">00</h2>
                    <span>Days</span>
                </div>

                <div class="time-box">
                    <h2 id="hours">00</h2>
                    <span>Hours</span>
                </div>

                <div class="time-box">
                    <h2 id="minutes">00</h2>
                    <span>Minutes</span>
                </div>

                <div class="time-box">
                    <h2 id="seconds">00</h2>
                    <span>Seconds</span>
                </div>

            </div> --}}

            <a href="{{ route('contact.page') }}" class="btn btn-launch">
                Contact Us
            </a>

        </div>

    </div>

</section>

@include('user.home.partials.footer')

<script>
const launchDate = new Date("December 31, 2026 23:59:59").getTime();

setInterval(() => {

    const now = new Date().getTime();
    const distance = launchDate - now;

    document.getElementById('days').innerHTML =
        Math.floor(distance / (1000 * 60 * 60 * 24));

    document.getElementById('hours').innerHTML =
        Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

    document.getElementById('minutes').innerHTML =
        Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

    document.getElementById('seconds').innerHTML =
        Math.floor((distance % (1000 * 60)) / 1000);

}, 1000);
</script>

</body>
</html>