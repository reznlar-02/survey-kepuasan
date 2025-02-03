<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #054b96; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 0.5rem 1rem;">
    <div class="container-fluid d-flex justify-content-center">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/images/Group 1.png') }}" alt="" width="60" height="60">
            E-Questioner DISDIKAL
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
            <div class="navbar-nav text-center">
                <a class="nav-link fw-bold menu-item" href="{{ route('questioner.form') }}">Questioner</a>
                <a class="nav-link fw-bold menu-item" href="/">Home</a>
            </div>
            <div> 
                <div style="position: absolute; top: 20px; right: 20px;">
                <a href="{{ route('admin.login') }}" class="btn btn-primary">Login</a>
            </div>
        </div>
    </div>
</nav>
<style>
    /* Navbar Styles */
    .navbar {
        background-color: #054b96;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
        color: white;
        font-size: 1.5rem;
        font-weight: bold;
        display: flex;
        align-items: center;
    }

    .menu-item {
        color: white;
        text-transform: uppercase;
        padding: 10px 20px;
        margin: 5px;
        border: 2px solid transparent;
        border-radius: 10px;
        transition: all 0.3s ease;
        background-color: rgba(255, 255, 255, 0.1);
    }

    .menu-item:hover {
        background-color: white;
        color: #054b96;
        border-color: #054b96;
        text-decoration: none;
    }

    .menu-item.active {
        background-color: white;
        color: #054b96;
        border-color: #054b96;
    }

    .navbar-toggler {
        background-color: white;
        border-radius: 5px;
    }

    .navbar-toggler-icon {
        filter: invert(1);
    }

    body {
        padding-top: 70px; /* Adjust this value based on the height of your navbar */
    }

    /* Styling for the image */
    .image-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 60px; /* Add space between navbar and image */
    }

    .image-wrapper img {
        width: 80%; /* Medium size image */
        height: auto;
        border: 5px solid #03070a; /* Add border outline around the image */
        border-radius: 10px; /* Rounded corners for the border */
        padding: 10px; /* Padding inside the border */
    }
</style>

<section>
    <!-- Image container for centered image -->
    <div class="image-wrapper">
        <img src="assets/images/so.jpg" alt="Struktur Organisasi">
    </div>
</section>
</body>
</html>