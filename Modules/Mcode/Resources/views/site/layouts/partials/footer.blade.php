		<footer id="footer">
		    <div class="container text-white">
		        <div class="footer-ribbon">
		            <span>Get in Touch</span>
		        </div>
		        <div class="row py-5 my-4">
		            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
		                <h5 class="text-3 mb-3">NEWSLETTER</h5>
		                <p class="pr-1">Keep up on our always evolving product features and technology. Enter your email address and subscribe to our newsletter.</p>
		                <div class="alert alert-success d-none" id="newsletterSuccess">
		                    <strong>Success!</strong> You've been added to our email list.
		                </div>
		                <div class="alert alert-danger d-none" id="newsletterError"></div>
		                <form action="https://www.getdrip.com/forms/229401838/submissions" method="POST" class="mr-4 mb-3 mb-md-0" data-drip-embedded-form="229401838" id="drip-ef-229401838">
		                    <div class="input-group input-group-rounded">

		                        <input class="form-control form-control-sm bg-light" placeholder="Email Address" id="drip-email" name="fields[email]" type="text">
		                          <div style="display: none;" aria-hidden="true">
								    <label for="website">Website</label><br>
								    <input type="text" id="website" name="website" tabindex="-1" autocomplete="false" value="">
								  </div>
		                        <span class="input-group-append">
		                            <button class="btn btn-light text-color-dark" type="submit" data-drip-attribute="sign-up-button"><strong>GO!</strong></button>
		                        </span>
		                    </div>
		                </form>

		            </div>
		            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
		                <h5 class="text-3 mb-3">News</h5>
		                <div id="" class="text-color-light">
		                {{-- 	@if(module_path('mcode'))
		                    <p>
		                    	<a class="text-color-light" href="{{ route('blog.index') }}">Our Blog</a><br>
		                       	<a class="text-color-light" href="{{ route('press.index') }}">Press Releases</a><br>
		                    </p>
		                    @else
		                    <p>
		                    	<a class="text-color-light" href="{{ url('about/blog') }}">Our Blog</a><br>
		                       	<a class="text-color-light" href="{{ url('about/press') }}">Press Releases</a><br>
		                    </p>
		                    @endif --}}
		                </div>
 
		            {{--     @if(!module_path('mcode'))      
			                <a href="{{ route('about') }}">
			                    <h5 class="text-3 mb-3">About Us</h5>
			                </a>
			                <a href="{{ route('careers') }}">
			                    <h5 class="text-3 mb-3">Careers</h5>
			                </a>
			            @else
			            	<a href="{{ url('about') }}">
			                    <h5 class="text-3 mb-3">About Us</h5>
			                </a>
			                <a href="{{ url('careers') }}">
			                    <h5 class="text-3 mb-3">Careers</h5>
			                </a>
			            @endif --}}
		            </div>
		            <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
		                <div class="contact-details">
		                    <a href="{{ url('contact') }}"><h5 class="text-3 mb-3">CONTACT US</h5></a>
		                    <ul class="list list-icons list-icons-lg">
		                        <li class="mb-1"><i class="fas fa-location-arrow"></i><a class=" text-color-light" href="https://g.page/codecorp?share" target="_blank">434 West Ascension Way, Ste. 300<br>Murray UT 84123</a></li>
		                        <li class="mb-1"><i class="fas fa-phone"></i><p class="m-0"><a class=" text-color-light" href="tel:8014952200">+01 801-495-2200</a></p></li>
		                        <li class="mb-1"><i class="fas fa-fax"></i><p class="m-0"><a class=" text-color-light" href="tel:8014952202"> +01 801-495-2202</a></p></li>
		                        <li class="mb-1"><i class="far fa-envelope"></i><p class="m-0"><a class=" text-color-light" href="mailto:info@codecorp.com">info@codecorp.com</a></p></li>
		                    </ul>
		                </div>
		            </div>
		            <div class="col-md-6 col-lg-2">
		                <h5 class="text-3 mb-3">FOLLOW US</h5>
		                <ul class="social-icons">
		                    <li class="social-icons-facebook"><a href="https://www.facebook.com/code411" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
		                    <li class="social-icons-twitter"><a href="https://twitter.com/codecorp" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
		                    <li class="social-icons-linkedin"><a href="https://www.linkedin.com/company/code-corporation" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
		                </ul>
		            </div>
		        </div>
		    </div>
		    <div class="footer-copyright">
		        <div class="container py-2">
		            <div class="row py-4" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
		            	<meta itemprop="name" content="Code Corporation">
		                <div class="col-lg-1 d-flex align-items-center justify-content-center justify-content-lg-start mb-2 mb-lg-0" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
		                	<meta itemprop="url" content="{{ url('site/img/logo.png') }}">
		                	            <meta itemprop="width" content="320">
            							<meta itemprop="height" content="60">

		                    <a href="{{ url('/') }}" class="logo pr-0 pr-lg-3">
		                        <img alt="Code Logo" src="{{ asset('site/img/code-logo-white.png') }}" class="opacity-5" height="20">
		                    </a>
		                </div>
		                <div class="col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-start mb-4 mb-lg-0">
		                    <p>    © Copyright 2020. All Rights Reserved.</p>

		                </div>

		                <div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end text-color-light text-white">
		                    <nav id="sub-menu">
		                        <ul>
	{{-- 								@if(!module_path('mcode'))   
			                        	<li><i class="fas fa-angle-right"></i><a href="{{ route('support.privacy') }}"  class="ml-1 text-decoration-none text-color-light">Privacy Policy</a></li>
			                            <li><i class="fas fa-angle-right"></i><a href="{{ route('support.eula') }}" class="ml-1 text-decoration-none text-color-light">EULA</a></li>
			                            <li><i class="fas fa-angle-right"></i><a href="{{ route('contact') }}" class="ml-1 text-decoration-none text-color-light"> Contact Us</a></li>
		                            @else
			                        	<li><i class="fas fa-angle-right"></i><a href="{{ url('support/privacy') }}"  class="ml-1 text-decoration-none text-color-light">Privacy Policy</a></li>
			                            <li><i class="fas fa-angle-right"></i><a href="{{ url('support/eula') }}" class="ml-1 text-decoration-none text-color-light">EULA</a></li>
			                            <li><i class="fas fa-angle-right"></i><a href="{{ url('contact') }}" class="ml-1 text-decoration-none text-color-light"> Contact Us</a></li>
		                            @endif --}}
		                        </ul>
		                    </nav>
		                </div>
		            </div>
		        </div>
		    </div>

		</footer>