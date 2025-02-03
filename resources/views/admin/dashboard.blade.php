@extends('layout.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<style>
    body {
        font-size: .875rem;
      }
      
      .feather {
        width: 16px;
        height: 16px;
        vertical-align: text-bottom;
      }
      
      /*
       * Sidebar
       */
      
      .sidebar {
        position: fixed;
        top: 0;
        /* rtl:raw:
        right: 0;
        */
        bottom: 0;
        /* rtl:remove */
        left: 0;
        z-index: 100; /* Behind the navbar */
        padding: 48px 0 0; /* Height of navbar */
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
      }
      
      @media (max-width: 767.98px) {
        .sidebar {
          top: 5rem;
        }
      }
      
      .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
      }
      
      .sidebar .nav-link {
        font-weight: 500;
        color: #333;
      }
      
      .sidebar .nav-link .feather {
        margin-right: 4px;
        color: #727272;
      }
      
      .sidebar .nav-link.active {
        color: #2470dc;
      }
      
      .sidebar .nav-link:hover .feather,
      .sidebar .nav-link.active .feather {
        color: inherit;
      }
      
      .sidebar-heading {
        font-size: .75rem;
        text-transform: uppercase;
      }
      
      /*
       * Navbar
       */
      
      .navbar-brand {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: 1rem;
        background-color: rgba(0, 0, 0, .25);
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
      }
      
      .navbar .navbar-toggler {
        top: .25rem;
        right: 1rem;
      }
      
      .navbar .form-control {
        padding: .75rem 1rem;
        border-width: 0;
        border-radius: 0;
      }
      
      .form-control-dark {
        color: #fff;
        background-color: rgba(255, 255, 255, .1);
        border-color: rgba(255, 255, 255, .1);
      }
      
      .form-control-dark:focus {
        border-color: transparent;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
      }
      </style>
<body>
    <div class="container mt-5">
        <h1>Selamat Datang di Dashboard Admin</h1>
        <p>Gunakan panel ini untuk mengelola pertanyaan, pengguna, dan hasil survei.</p>

        <div class="mt-4">
            <a href="{{ route('admin.manage_question') }}" class="btn btn-primary">Kelola Pertanyaan</a>
            <a href="{{ route('admin.manage_users') }}"class="btn btn-secondary">Kelola Pengguna</a>
            <a href="{{ route('admin.view_results') }}" class="btn btn-success">Lihat Hasil Survei</a>
            <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>