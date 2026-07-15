@extends('layouts.mainbaru')

@section('container')
    <div class="main-layout">
        <div class="left-panel">
            <a href="https://www.instagram.com/fajarnr_/" target="_blank" rel="noopener">instagram<i class="bi bi-arrow-up-right"></i></a>
            <a href="https://github.com/callme-fajarnr" target="_blank" rel="noopener">github<i class="bi bi-arrow-up-right"></i></a>
        </div>

        <div class="container-split">
            <div class="top-section">
                {{-- <p>Ini adalah konten di bagian atas kontainer.</p> --}}
            </div>
            <div class="bottom-section">
                <p>Have a project in mind? Or you want to say hello, get in touch with me.</p>
            </div>
        </div>
    </div>
@endsection
