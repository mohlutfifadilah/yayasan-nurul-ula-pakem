@section('title', 'Artikel -' . $profil->nama . ' | Yayasan Nurul Ula')
@include('template.header')
@php
    use Carbon\Carbon;

    // Mengatur locale Carbon ke bahasa Indonesia
    Carbon::setLocale('id');
@endphp
<section title="content">
        <div class="container">
            <h3 class="text-success mb-4 mt-3">Berita  - {{ $profil->nama }}</h3>
            <div class="row mt-4">
                <div class="col-lg-9 blog-post-single mb-4">
                    <div class="blog-item">
						<div class="image-blog">
							<img src="{{ asset('storage/thumbnail-artikel/' . $profil->nama . '/' . $artikel->thumbnail) }}" alt="" class="img-fluid">
						</div>
						<div class="post-content">
							{{-- <div class="post-date">
								<span class="day">{{ Carbon::parse($artikel->created_at)->format('d'); }}</span>
								<span class="month">{{ Carbon::parse($artikel->created_at)->format('M'); }}</span>
							</div> --}}
							<div class="meta-info-blog">
								<span><i class="fa fa-calendar"></i> <a href="#">{{ Carbon::parse($artikel->created_at)->diffForHumans() }}</a> </span>
								{{-- <span><i class="fa fa-tag"></i>  <a href="#">Kegiatan</a> </span>
								<span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span> --}}
							</div>
							<div class="blog-title">
								<h2><a href="#" title="">{{ $artikel->judul }}</a></h2>
							</div>
							<div class="blog-desc">
								<p class="text-justify">{!! $artikel->isi !!}</p>
							</div>
						</div>
					</div>
                </div><!-- end col -->
            </div>
        </div>
    </section>
@include('template.footer')
