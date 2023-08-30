@extends('layouts.admin')

@section('content')
<div class="container-fluid my-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Modifica i tuoi dati utente</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <form action="{{ route('admin.users.update', $user ) }}" method="post" class="needs-validation" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <!-- NAME -->
            <div class="col-12 form__group field">
                <input id="name" name="name" type="text" class="form__field form-control rounded-0 @error('name') is-invalid @enderror" value="{{ old("name")  ?? $user->name}}" placeholder="Name" required autofocus>
                <label for="name" class="form__label">{{ __('Name') }}</label>

                @error("name")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            {{-- SURNAME --}}
            <div class="col-12 form__group field">
                <input type="text" class="form__field form-control rounded-0 @error('surname') is-invalid @enderror" id="surname" name="surname" value="{{ old("surname")  ?? $user->surname}}" placeholder="Surname" required autofocus>
                <label for="Surname" class="form__label">{{ __('Surname') }}</label>
                @error("surname")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <!--DATA DI NASCITA CON PICKER-->
            <div class="col-12 form__group field">
                <input type="date" id="date_of_birth" name="date_of_birth" class="form__field form-control rounded-0 @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{ old("date_of_birth") ?? $user->date_of_birth}}" placeholder="Date of birth" required autofocus>
                <label for="date_of_birth" class="form__label">{{ __('Date of birth') }}</label>
                @error("date_of_birth")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <!--INDIRIZZO-->
            <div class="col-12 form__group field">
                <input type="text" id="address" name="address" class="form__field form-control rounded-0 @error('address') is-invalid @enderror" value="{{ old("address") ?? $user->address}}" placeholder="Address" required autofocus>
                <label for="address" class="form__label">{{ __('Address') }}</label>
                @error("address")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <!--IMG PROFILE-->
            <div class="col-12 form__group field">
                <input type="file" name="img_path" id="img_path" class="form__field form-control rounded-0 @error('img_path') is-invalid @enderror" placeholder="Profile image" autofocus>
                <label for="img_path" class="form__label">{{ __('Profile image') }}</label>
                @error("img_path")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            {{-- IMG BACKGROUND --}}
            <div class="col-12 form__group field">
                <input id="bg_dev" name="bg_dev" type="file" class="form__field form-control rounded-0 @error('bg_dev') is-invalid @enderror" placeholder="Background image" autofocus>
                <label for="bg_dev" class="form__label">{{ __('Background image') }}</label>
                @error("bg_dev")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            {{-- LINK GITHUB --}}
            <div class="col-12 form__group field">
                <input type="text" id="github_link" name="github_link" class="form__field form-control rounded-0 @error('github_link') is-invalid @enderror" value="{{ old("github_link")  ?? $user->github_link}}" placeholder="Link Github" autofocus>
                <label for="github_link" class="form__label">{{ __('Github') }}</label>
                @error("github_link")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            {{-- LINK LINKEDIN --}}
            <div class="col-12 form__group field">
                <input type="text" id="linkedin_link" name="linkedin_link"  class="form__field form-control rounded-0 @error('linkedin_link') is-invalid @enderror" value="{{ old("linkedin_link")  ?? $user->linkedin_link}}" placeholder="Link Linkedin" autofocus>
                <label for="linkedin_link" class="form__label">{{ __('Linkedin') }}</label>
                @error("linkedin_link")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <!--BIO-->
            <div class="col-12 form__group field">
                <textarea type="text" id="bio" name="bio" class="form__field form-control rounded-0 @error('bio') is-invalid @enderror" cols="30" rows="5"  placeholder="Bio" autofocus>{{ old("bio")  ?? $user->bio}}</textarea>
                <label for="bio" class="form__label">{{ __('Bio') }}</label>
                @error("bio")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <!-- VAT NUMBER -->
            <div class="col-12 form__group field">
                <input type="text" id="vat_number" name="vat_number" class="form__field rounded-0 form-control @error('vat_number') is-invalid @enderror" value="{{ old("vat_number")  ?? $user->vat_number}}" placeholder="Vat Number" required autofocus>
                <label for="vat_number" class="form__label">{{ __('Vat number (partita Iva)') }}</label>
                @error("vat_number")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            {{-- CV --}}
            <div class="col-12 form__group field">
                <input type="file" id="cv" name="cv" class="form__field form-control rounded-0 @error('cv') is-invalid @enderror" placeholder="Curriculum" autofocus>
                <label for="curriculum" class="form__label">{{ __('Curriculum') }}*</label>
                @error("cv")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            {{-- TEL NUMBER --}}
            <div class="col-12 form__group field">
                <input type="number" id="phone_number" name="phone_number" class="form__field form-control rounded-0 @error('phone_number') is-invalid @enderror" value="{{ old("phone_number")  ?? $user->phone_number}}" placeholder="Tel Number" required autofocus>
                <label for="phone_number" class="form__label">{{ __('Phone_number') }}*</label>
                @error("phone_number")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <!-- SOFT SKILLS -->
            <div class="col-12 form__group field">
                <textarea type="text" id="soft_skill" name="soft_skill" class="form__field form-control rounded-0 @error('soft_skill') is-invalid @enderror" cols="30" rows="5" placeholder="Soft Skills" autofocus>{{ old("soft_skill") ?? $user->soft_skill}}</textarea>
                <label for="soft_skill" class="form__label">{{ __('Soft skill') }}</label>
                @error("soft_skill")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <!--LINGUAGGI DI PROGRAMMAZIONE-->
            <div class="row p-3">
                @foreach ($languages as $i => $language)
                    <div class="form-check col-2">
                        <input type="checkbox" value="{{old(" $language->id") ??  $language->id}}" name="code_languages[]" id="code_languages{{$i}}" class="form-check-input"  @if( $user_languages->contains($language->id) ) checked @endif>
                        <label for="code_languages{{$i}}" class="form-check-label">{{$language->technology}}</label>
                    </div>
                @endforeach
            </div>
            <input class="form-control mt-4 btn btn-secondary" type="submit" value="Invia">
        </form>
    </div>
</div>
@endsection
