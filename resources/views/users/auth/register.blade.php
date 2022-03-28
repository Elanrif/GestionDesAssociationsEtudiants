

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> 
                <div class="card-header text-primary fs-5" >{{ __('Veuillez remplir le formulaire d\'inscription ') }}</div>

                <div class="card-body">
                    <form method="POST" action="#">
                        @csrf

                        <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-form-label fs-3 text-md-end">{{ __('Nom') }}</label>

                            <div class="col-md-6 ">
                                <input id="nom" type="text" class="fs-4 form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus placeholder="saisir votre nom">

                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="prenom" class="col-md-4 col-form-label fs-3 text-md-end">{{ __('Prenom') }}</label>

                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control fs-4 @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus placeholder="saisir votre prenom">

                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                          <div class="row mb-3">
                            <label for="code_apogée" class="col-md-4 fs-3 col-form-label text-md-end">{{ __('Code apogée') }}</label>

                            <div class="col-md-6">
                                <input id="code_apogée" type="number" class="form-control fs-4 @error('code_apogée') is-invalid @enderror" name="code_apogée" value="{{ old('code_apogée') }}" required autocomplete="code_apogée" autofocus placeholder="saisr votre code etudiant">

                                @error('code_apogée')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                          <div class="row mb-3">
                            <label for="num_tel" class="col-md-4 fs-3 col-form-label text-md-end">{{ __('Num Tel') }}</label>

                            <div class="col-md-6">
                                <input id="num_tel" type="number" class="form-control fs-4 @error('num_tel') is-invalid @enderror" name="num_tel" value="{{ old('num_tel') }}" required autocomplete="num_tel" autofocus placeholder="saisir votre numero">

                                @error('num_tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="filiere" class="col-md-4 fs-3 col-form-label text-md-end">{{ __('filiere') }}</label>

                            <div class="col-md-6">
                                <select id="filiere" type="filiere" class="form-select fs-4 @error('filiere') is-invalid @enderror" name="filiere" value="{{ old('filiere') }}" required autocomplete="filiere">
                               <option selected></option>
                               <option value="SMAI">SMAI</option>
                               <option value="SVT">SVT</option>
                               <option value="SMPC">SMPC</option>   
                               <option value="SMA">SMA</option>   
                               <option value="SMI">SMI</option>   
                               <option value="SVI">SVI</option>   
                               <option value="STU">STU</option>   
                               <option value="SMP">SMP</option>   
                               <option value="SMC">SMC</option>   
                            </select>
                                @error('filiere')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                         </div>
                     
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 fs-3 col-form-label text-md-end">{{ __('Addresse email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control fs-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="saisir une adresse email valide">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 fs-3 col-form-label text-md-end">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control fs-4 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="saisir un mot de passe">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 fs-3 col-form-label text-md-end">{{ __('Confirmation') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="fs-4 form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmer votre mot passe">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4 ">
                                <button type="submit" class="btn fs-5" style="background-color:var(--bleu--);color:var(--blanc--)">
                                    {{ __('S\'inscrire') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
