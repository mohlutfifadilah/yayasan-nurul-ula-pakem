@section('title', 'Tentang | Yayasan Nurul Ula')
@include('template.header')
    <section title="content">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-8">
                    <h3 class="text-success mb-5">Tentang</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7466.069358477262!2d110.41341163260034!3d-7.659179781765308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5e713a2eeed5%3A0xeb99e198b72cb488!2sLPQ%20Bina%20Akhlaq%20Pakem!5e0!3m2!1sid!2sid!4v1723444475953!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                @include('template.contact')
            </div>
        </div>
    </section>
@include('template.footer')
