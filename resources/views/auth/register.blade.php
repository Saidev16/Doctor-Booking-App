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
											<h3>S'inscrire</h3>
										</div>
										<form method="POST" action="{{ route('register') }}">
                                            @csrf
											<div class="form-group form-focus">
												<input type="text" class="form-control floating @error('name') is-invalid @enderror " name="name" value="{{ old('name') }}">
                                                @error('name')
                                                <span class="invalid-feedback mb-3" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
												<label class="focus-label">Nom</label>
                                                
											</div>
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

                                            <div class="form-group form-focus">
                                                <input type="password" class="form-control floating" name="password_confirmation" required autocomplete="new-password">
                                                <label class="focus-label">Confirmer mot de passe</label>
                                                
                                            </div>

                                            <div class="form-group form-focus">                    
                                                <div >
                                                    <select name="gender" class="form-control  @error('gender') is-invalid @enderror">
                                                        <option value="">Genre</option>
                                                        <option value="male">Homme</option>
                                                        <option value="female">Femme</option>
                                                    </select>
                                                </div>
                                                @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                 @enderror
                                            </div>
                    

        
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">S'inscrire</button>
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
