

								{{-- 	@guest
									<div class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
										<div class="header-nav-feature header-nav-features-user d-inline-flex mx-2 pr-2 signin" id="headerAccount">
											<a href="#" class="header-nav-features-toggle" title="Sign In">
												<i class="far fa-user"></i>
											</a>
											<div class="header-nav-features-dropdown header-nav-features-dropdown-mobile-fixed header-nav-features-dropdown-force-right" id="headerTopUserDropdown">
												<div class="signin-form">
													<h5 class="text-uppercase mb-4 font-weight-bold text-3">Sign In</h5>


													<form action="{{ route('login') }}" method="POST">
                									 			@csrf

														<div class="form-group">
															<label class="mb-1 text-2 opacity-8">Email address* </label>
															<input type="email" class="form-control form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" name="email" value="{{ old('email', null) }}">
														</div>
														<div class="form-group">
															<label class="mb-1 text-2 opacity-8">Password *</label>
															<input type="password" class="form-control form-control-lg {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ trans('global.login_password') }}">
														</div>




														<div class="form-row pb-2">
															<div class="form-group form-check col-lg-6 pl-1">
																<div class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" id="rememberMeCheck">
																	<label class="custom-control-label text-2" for="rememberMeCheck">
																		{{ trans('global.remember_me') }}
																	</label>
																</div>
															</div>

														</div>
														<div class="actions">
															<div class="form-row">
																<div class="col d-flex justify-content-end">
																	<button type="submit" class="btn btn-primary btn-block btn-flat">
																		{{ trans('global.login') }}
																	</button>
																</div>
															</div>
														</div>
														<div class="extra-actions">
															<p>Don't have an account yet? <a href="#" id="headerSignUp" class="text-uppercase text-1 font-weight-bold text-color-dark">Sign Up</a></p>
														</div>
													</form>
												</div>


												<div class="signup-form">
													<h5 class="text-uppercase mb-4 font-weight-bold text-3">Sign Up</h5>

													<form method="POST" action="{{ route('register') }}">
										            			@csrf
														<div class="form-group">
															<label class="mb-1 text-2 opacity-8">Name* </label>
															<input type="text" name="name" class="form-control form-control-lg {{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.user_name') }}" value="{{ old('name', null) }}">
														</div>

														<div class="form-group">
															<label class="mb-1 text-2 opacity-8">Email address* </label>
															<input type="email" name="email" class="form-control form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
														</div>
														<div class="form-group">
															<label class="mb-1 text-2 opacity-8">Password *</label>
															<input type="password" name="password" class="form-control form-control-lg {{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
														</div>
														<div class="form-group">
															<label class="mb-1 text-2 opacity-8">Re-enter Password *</label>
															<input type="password" name="password_confirmation" class="form-control form-control-lg" required placeholder="{{ trans('global.login_password_confirmation') }}">
														</div>
														<div class="actions">
															<div class="form-row">
																<div class="col d-flex justify-content-end">
											                        <button type="submit" class="btn btn-primary btn-block btn-flat">
											                            {{ trans('global.register') }}
											                        </button>
																</div>
															</div>
														</div>
														<div class="extra-actions">
															<p>Already have an account? <a href="#" id="headerSignIn" class="text-uppercase text-1 font-weight-bold text-color-dark">Log In</a></p>
														</div>
													</form>

												</div>

												<div class="recover-form">
													<h5 class="text-uppercase mb-2 pb-1 font-weight-bold text-3">Reset My Password</h5>
													<p class="text-2 mb-4">Complete the form below to receive an email with the authorization code needed to reset your password.</p>

													<form>
														<div class="form-group">
															<label class="mb-1 text-2 opacity-8">Email address* </label>
															<input type="email" class="form-control form-control-lg">
														</div>
														<div class="actions">
															<div class="form-row">
																<div class="col d-flex justify-content-end">
																	<a class="btn btn-primary" href="#">Reset</a>
																</div>
															</div>
														</div>
														<div class="extra-actions">
															<p>Already have an account? <a href="#" id="headerRecoverCancel" class="text-uppercase text-1 font-weight-bold text-color-dark">Log In</a></p>
														</div>
													</form>
												</div>

											</div>
										</div>
									</div>
									@endguest --}}

									@auth
										@can('product_management_access')
										<div class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
											<div class="header-nav-feature header-nav-features-user d-inline-flex mx-2 pr-2 signin" id="headerAccount">
												<a href="{{ url('/admin/dashboard') }}" class=" text-2" title="Admin">
													<i class="far fa-user"></i> Admin
												</a>
											</div>
										</div>
										@endcan
									@else
								            {{-- <a href="{{ url('/login/okta') }}"><i class="far fa-user"></i> Log in with Okta</a> --}}


										{{-- @can('private_area_access')
										<div class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
											<div class="header-nav-feature header-nav-features-user d-inline-flex mx-2 pr-2 signin" id="headerAccount">
												<a href="{{ url('/private/home/') }}" class=" text-2" title="Account">
													<i class="far fa-user-circle"></i>
												</a>
											</div>
										</div>
										@endcan --}}
									@endauth