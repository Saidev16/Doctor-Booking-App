@extends('layouts.app')

@section('content')


			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
                    @if( Session::has('message') )
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
    
					
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
											<h4>Envoyer nous une demande pour rejoindre notre réseau du docteurs</h4>
										</div>
										<form method="POST" action="{{ route('request.store') }}">
                                            @csrf
											<div class="form-group form-focus">
												<input type="text" class="form-control floating @error('name') is-invalid @enderror " name="name" value="{{ old('name') }}">
                                                @error('name')
                                                <span class="invalid-feedback mb-3" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
												<label class="focus-label mb-1">Nom</label>
                                                
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
                                                <select name="city" class="form-control" id="">
                                                    <option value="">Ville</option>
                                                    <option value="agadir">agadir</option>
                                                    <option value="casablanca">casablanca</option>
                                                    <option value="Rabat">Rabat</option>
                                                    <option value="Marrakech">Marrakech</option>
                                                    <option value="El jadida">El jadida</option>
                                                    <option value="Errachidia">Errachidia</option>
                                                    <option value="Fes">Fes</option>
                                                    <option value="Kenitra">Kenitra</option>
                                                    <option value="Khenifra">Khenifra</option>
                                                    <option value="Khouribga">Khouribga</option>
                                                    <option value="Meknes">Meknes</option>
                                                    <option value="Nador">Nador</option>
                                                    <option value="Ouarzazat">Ouarzazat</option>
                                                    <option value="Oujda">Oujda</option>
                                                    <option value="Safi">Safi</option>
                                                    <option value="Settat">Settat</option>
                                                    <option value="Sale">Sale</option>
                                                    <option value="Tanger">Tanger</option>
                                                    <option value="Taza">Taza</option>
                                                    <option value="Tetouan">Tetouan</option>
                                                </select>
                                                @error('city')
                                                <span class="invalid-feedback mb-3" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
												{{-- <label class="focus-label">Nom</label> --}}
                                                
											</div>
											<div class="form-group form-focus">
												<input type="text" class="form-control floating @error('address') is-invalid @enderror " name="address" value="{{ old('address') }}">
                                                @error('address')
                                                <span class="invalid-feedback mb-3" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
												<label class="focus-label">Adresse</label>
                                                
											</div>
											<div class="form-group form-focus">
												<input type="text" class="form-control floating @error('phone_number') is-invalid @enderror " name="phone_number" value="{{ old('phone_number') }}">
                                                @error('phone_number')
                                                <span class="invalid-feedback mb-3" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
												<label class="focus-label">Teléphone</label>
                                                
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

                                            <div class="form-group">
                                                <select name="department" class="form-control">
                                                    <option value="">Spécialité</option>
                                                    @foreach (App\Department::all() as $d)
                                                        <option value="{{$d->department}}">{{$d->department}}</option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            <div class="form-group form-focus">
												<input type="text" class="form-control floating @error('education') is-invalid @enderror " name="education" value="{{ old('education') }}">
                                                @error('education')
                                                <span class="invalid-feedback mb-3" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
												<label class="focus-label">éducation</label>
                                                
											</div>
                                            <div class="form-group form-focus">
												<input type="textarea" class="form-control floating @error('description') is-invalid @enderror " name="description" value="{{ old('description') }}">
                                                @error('description')
                                                <span class="invalid-feedback mb-3" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
												<label class="focus-label">Description</label>
                                                
											</div>

            



                    

        
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Envoyé</button>
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
