<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Sora:wght@600;700&display=swap" rel="stylesheet">

    <style>
        body{
            background: #f4f7fb;
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .verify-card{
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 35px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        .verify-header{
            background: linear-gradient(135deg, #2563eb, #4f46e5);
            color: white;
            padding: 22px;
            font-family: 'Sora', sans-serif;
            font-size: 22px;
            font-weight: 600;
        }

        .verify-body{
            padding: 40px;
        }

        .verify-text{
            color: #6b7280;
            line-height: 1.7;
            font-size: 15px;
        }

        .btn-resend{
            border: none;
            background: transparent;
            color: #2563eb;
            font-weight: 600;
            padding: 0;
            transition: 0.3s;
        }

        .btn-resend:hover{
            color: #1d4ed8;
            text-decoration: underline;
        }

        .alert-success{
            border-radius: 12px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">

            <div class="card verify-card">

                <div class="verify-header">
                    Verify Your Email Address
                </div>

                <div class="verify-body">

                    <!-- Success Alert -->
                    <div class="alert alert-success" role="alert">
                        A fresh verification link has been sent to your email address.
                    </div>

                    <p class="verify-text mb-3">
                        Before proceeding, please check your email for a verification link.
                    </p>

                    <p class="verify-text">
                        If you did not receive the email,
                        <button class="btn-resend">
                            click here to request another
                        </button>
                    </p>

                </div>

            </div>

        </div>
    </div>
</div>

</body>
</html>