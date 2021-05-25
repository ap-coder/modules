											<nav class="collapse" aria-label="Navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
												<ul class="nav nav-pills" id="mainNav">
													{{-- <li class="dropdown" itemprop="name">
														<a class="dropdown-item dropdown-toggle text-2 {{ Nav::isRoute('home') }}" href="{{ url('/') }}" itemprop="url">
															<i class="fas fa-home"></i>
														</a>
													</li> --}}




													<li class="dropdown">
														<a href="{{ route('products.index') }}" class="dropdown-item dropdown-toggle text-2 {{ Nav::isResource('products') }}" itemprop="url">
															Products
														</a>
														<ul class="dropdown-menu">
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('products.hardware') }}" itemprop="url">Hardware</a>
															</li>
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('products.software') }}" itemprop="url">Software</a>
															</li>
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('products.accessories') }}" itemprop="url">Accessories</a>
															</li>
															<li class="dropdown-submenu" itemprop="name">
																 <a class="dropdown-item text-2" href="{{ route('products.services') }}" itemprop="url">Services</a>
															</li>
															<li class="dropdown-submenu" itemprop="name">
																 <a class="dropdown-item text-2" href="{{ route('products.whycode') }}" itemprop="url">Why Code</a>
															</li>
														</ul>
													</li>

													<li class="dropdown">
														<a class="dropdown-item dropdown-toggle text-2 {{ Nav::isResource('solutions') }}" href="#">
															Solutions
														</a>
														<ul class="dropdown-menu">
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('solutions.developers') }}" itemprop="url">Software Developers</a>
															</li>
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('solutions.healthcare') }}" itemprop="url">Healthcare / Medical</a>
															</li>
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('solutions.ehr-overview') }}" itemprop="url">EHR Integrations</a>
															</li>
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('solutions.industrial') }}" itemprop="url">Industrial / MFG</a>
															</li>

															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('solutions.retail') }}" itemprop="url">Retail / Commercial</a>
															</li>
															{{-- <li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="#" itemprop="url">Public Sector / Gov</a>
															</li> --}}
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('solutions.fips') }}" itemprop="url">FIPS</a>
															</li>
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('solutions.oem') }}" itemprop="url">OEM</a>
															</li>

														</ul>
													</li>
													<li class="dropdown">
														<a class="dropdown-item dropdown-toggle text-2 {{ Nav::isResource('partners') }}" href="#">
															Partners
														</a>
														<ul class="dropdown-menu">
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('promos.index') }}" itemprop="url">Promos</a>
															</li>
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('partners.code-alliance') }}" itemprop="url">CodeAlliance</a>
															</li>
															{{-- <li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('partners.code-partners') }}" itemprop="url">ISVs</a>
															</li> --}}
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('solutions.oem') }}" itemprop="url">OEMs</a>
															</li>
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('partners.deal-registration') }}" itemprop="url">Deal Registration</a>
															</li>
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('partners.partner-portal-login') }}" itemprop="url">Partner Portal</a>
															</li>
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="https://developer.tachyoniq.com/" itemprop="url">Developer Portal</a>
															</li>

														</ul>
													</li>

													<li class="dropdown">
														<a class="dropdown-item dropdown-toggle text-2 {{ Nav::isResource('about') }}" href="#">
															About
														</a>
														<ul class="dropdown-menu">
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('about') }}" itemprop="url">About Us</a>
															</li>
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('careers') }}" itemprop="url">Careers</a>
															</li>
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('sales-team.index') }}">Sales Team</a>
															</li>
															{{-- <li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('blog.index') }}" itemprop="url">Blog</a>
															</li> --}}
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('combined-media') }}" itemprop="url">News, Content & Media</a>
															</li>
															{{-- <li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('white-papers.index') }}" itemprop="url">White Papers</a>
															</li> --}}
															{{-- @if(App\Models\Infographic::count() > 0)
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{  route('infographics.index') }}" itemprop="url">Infographics</a>
															</li>
															@endif --}}
															{{-- @if(App\Models\CaseStudy::count() > 0)
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('case-studies.index') }}" itemprop="url">Case Studies</a>
															</li>
															@endif --}}

														</ul>

													</li>


													<li class="dropdown">
														<a class="dropdown-item dropdown-toggle text-2" href="#">
															Support
														</a>
														<ul class="dropdown-menu">

															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route(('support.rma-request')) }}" itemprop="url">RMA / Support</a>
															</li>
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route(('support.config-guides')) }}" itemprop="url">Config Catalog</a>
															</li>
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" target="_blank" href="https://licensing.codecorp.com/goto.php" itemprop="url">License Generation</a>
															</li>
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route(('about.patent-marking')) }}" itemprop="url">Patent Marking</a>
															</li>




															{{-- <li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('coming-soon') }}" itemprop="url">Firmware &amp; Software</a>
															</li> --}}


															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('support.privacy') }}" itemprop="url">Privacy Policy</a>
															</li>
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('support.eula') }}" itemprop="url">EULA Statement</a>
															</li>
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('support.warranty') }}" itemprop="url">Limited Warranty</a>
															</li>
															<li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('support.warranty-coverage-terms') }}" itemprop="url">Warranty Terms</a>
															</li>
															{{-- <li class="dropdown-submenu" itemprop="name">
																<a class="dropdown-item text-2" href="{{ route('faqs.index') }}" itemprop="url">FAQs</a>
															</li> --}}

														</ul>
													</li>
													<li class="dropdown">
														<a class="dropdown-item dropdown-toggle text-2" href="{{ route('contact') }}">
															Contact
														</a>
													</li>
													 {{-- @auth <li> {{ Auth::user()->name }}! </li> @endauth --}}
													  @auth <li><a href="{{ url('admin/dashboard') }}">ADMIN</a></li> @endauth
												   </ul>
												 
											</nav>
