<footer class="footer" id="kontak">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Tentang Kami</h3>
                        </div>
                        <p> Yayasan Nurul Ula merupakan satuan yayasan pendidikan. Berkedudukan di Daerah Istimewa Yogyakarta yang terdari PAUD, RA dan MI.</p>
						<div class="footer-right">
							<ul class="footer-links-soi">
								<li class="mr-3 text-center">PAUD<a href="https://www.instagram.com/paud_binaakhlaq/" target="_blank" rel="noopener noreferer"><i class="fa fa-instagram"></i></a></li>
								<li class="mr-3 text-center">RA<a href="https://www.instagram.com/rabinaakhlaq/" target="_blank" rel="noopener noreferer"><i class="fa fa-instagram"></i></a></li>
								<li>MI<a href="https://www.instagram.com/mibinaakhlaq/" target="_blank" rel="noopener noreferer"><i class="fa fa-instagram"></i></a></li>
							</ul><!-- end links -->
						</div>
                    </div><!-- end clearfix -->
                </div><!-- end col -->

				<div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Informasi</h3>
                        </div>
                        <ul class="footer-links">
                            <li><a data-scroll href="#tentang">Tentang Kami</a></li>
                            <li><a data-scroll href="#kontak">Kontak</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->

                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Kontak</h3>
                        </div>

                        <ul class="footer-links">
                            {{-- <li><a href="mailto:#">info@yoursite.com</a></li>
                            <li><a href="#">www.yoursite.com</a></li> --}}
                            <li>Jl. Kaliurang KM.18, Paraksari, Pakembinangun, Kec. Pakem, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55582</li>
                            <li>085740322221 (PAUD)</li>
                            <li>081392197202 (RA)</li>
                            <li>085640026441 (MI)</li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->

            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-center">
                    <p class="footer-company-name">All Rights Reserved. &copy; 2018 <a href="#">SmartEDU</a> Design By : <a href="https://html.design/">html design</a></p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="{{ asset('assets/js/all.js') }}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
	<script src="{{ asset('assets/js/timeline.min.js') }}"></script>
	<script src="{{ asset('assets/js/owl.carousel.js') }}"></script>
	<script>
        var scroll = new SmoothScroll('a[href*="#"]', {
            speed: 1500,
	        speedAsDuration: true
        });

		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>
</body>
</html>
