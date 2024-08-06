@section('title', 'Beranda | Yayasan Nurul Ula')
@include('template.header')
    <section title="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="text-success">Kegiatan</h3>
                    <div id="carouselExampleAutoplaying" class="carousel slide mt-2 mb-4" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="{{ asset('logo.png') }}" class="d-block" alt="..." style="height: 395px; width: 862px;">
                            </div>
                            <div class="carousel-item">
                            <img src="{{ asset('logo.png') }}" class="d-block" alt="..." style="height: 395px; width: 862px;">
                            </div>
                            <div class="carousel-item">
                            <img src="{{ asset('logo.png') }}" class="d-block" alt="..." style="height: 395px; width: 862px;">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <a href="" class="text-decoration-none">
                                <div class="card h-100 rounded-0 border-success">
                                    <img src="{{ asset('logo.jpg') }}" class="card-img-top rounded-0" alt="..." style="width: 273.33px; height: 150px;">
                                    <div class="card-body">
                                        <h5 class="card-title text-truncate">Card title</h5>
                                        <p class="card-text text-truncate" style="max-width: 550px;">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore doloremque accusamus laboriosam consequuntur molestias dolorum. Nobis velit, amet voluptatum animi optio delectus repellendus officia est ipsum. In assumenda molestiae ex?</p>
                                    </div>
                                    <div class="card-footer border-success">
                                        <small class="text-body-secondary">Last updated 3 mins ago</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="" class="text-decoration-none">
                                <div class="card h-100 rounded-0 border-success">
                                    <img src="{{ asset('logo.jpg') }}" class="card-img-top rounded-0" alt="..." style="width: 273.33px; height: 150px;">
                                    <div class="card-body">
                                        <h5 class="card-title text-truncate">Card title</h5>
                                        <p class="card-text text-truncate">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore doloremque accusamus laboriosam consequuntur molestias dolorum. Nobis velit, amet voluptatum animi optio delectus repellendus officia est ipsum. In assumenda molestiae ex?</p>
                                    </div>
                                    <div class="card-footer border-success">
                                        <small class="text-body-secondary">Last updated 3 mins ago</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="" class="text-decoration-none">
                                <div class="card h-100 rounded-0 border-success">
                                    <img src="{{ asset('logo.jpg') }}" class="card-img-top rounded-0" alt="..." style="width: 273.33px; height: 150px;">
                                    <div class="card-body">
                                        <h5 class="card-title text-truncate">Card title</h5>
                                        <p class="card-text text-truncate">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore doloremque accusamus laboriosam consequuntur molestias dolorum. Nobis velit, amet voluptatum animi optio delectus repellendus officia est ipsum. In assumenda molestiae ex?</p>
                                    </div>
                                    <div class="card-footer border-success">
                                        <small class="text-body-secondary">Last updated 3 mins ago</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @include('template.contact')
            </div>
        </div>
        <div id="adventage" class="bg-warning my-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <p class="fs-3">
                            50
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                        <p class="fs-3">
                            50
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                        <p class="fs-3">
                            50
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('template.footer')
