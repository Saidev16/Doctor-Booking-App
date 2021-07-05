@extends('layouts.app')

@section('content')


			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
							
							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Login">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header text-center">
											<h3>Se Connecter </h3>
										</div>
										<form method="POST" action="{{ route('login') }}">
                                            @csrf
											<div class="form-group form-focus">
												<input type="email" class="form-control floating @error('email') is-invalid @enderror " name="email" value="{{ old('email') }}">
                                                @error('email')
                                                <span class="invalid-feedback mb-3" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
												<label class="focus-label">Email</label>
                                                
											</div>
                                            
                                           
											<div class="form-group form-focus">
												<input type="password" class="form-control floating @error('password') is-invalid @enderror " name="password" required autocomplete="current-password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <label class="focus-label">Mot de passe</label>
                                                
											</div>

        
											<div class="text-right">
												<a class="forgot-link" href="{{ route('password.request') }}" >Mot de passe oublié ?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Se connecter</button>
											<div class="login-or">
												<span class="or-line"></span>
												<span class="span-or">or</span>
											</div>
											<div class="text-center dont-have">Inscrivez-Vous <a href="/register">S'inscrire</a></div>
										</form>
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->

@endsection
