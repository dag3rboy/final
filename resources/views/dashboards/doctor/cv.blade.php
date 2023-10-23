@extends('dashboards.doctor.layouts.doctor_dashboard')
@section('title', 'Espace Docteur')
@section('content')

    <div class="row">

        {{-- Contact infos --}}
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">A propos et Contact</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('update-cv-infos') }}" method="post">

                        @csrf

                        <div class="results">
                            @if (Session::get('success-1'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <div class="alert-message">
                                        {{ Session::get('success-1') }}
                                    </div>
                                </div>
                            @endif
                            @if (Session::get('fail-1'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <div class="alert-message">
                                        {{ Session::get('fail-1') }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <input type="hidden" value="{{ $LoggedDoctorInfo->dr_id }}" name="dr_id">
                                <label class="form-label" for="inputFirstName">A propos</label>
                                <textarea class="form-control" data-bs-toggle="autosize" name="cv_about" placeholder="A propos de vous…"> {{ $contact_infos->cv_about }} </textarea>
                                <span class="text-danger">
                                    @error('cv_about')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputFirstName">Numéro telephone</label>
                                <input type="text" class="form-control" name="cv_phone"
                                    value="{{ $contact_infos->cv_phone }}" id="inputFirstName"
                                    placeholder="Votre nom d'utilisateur">
                                <span class="text-danger">
                                    @error('cv_phone')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputLastName">Email</label>
                                <input type="email" class="form-control" name="cv_email"
                                    value="{{ $contact_infos->cv_email }}" id="inputLastName"
                                    placeholder="Votre adresse email">
                                <span class="text-danger">
                                    @error('cv_email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputLastName">Site Web</label>
                                <input type="text" class="form-control" name="cv_website"
                                    value="{{ $contact_infos->cv_website }}" id="inputLastName"
                                    placeholder="Votre site web">
                                <span class="text-danger">
                                    @error('cv_website')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                        </div>
                        <button type="submit" class="btn bg-indigo text-white">Sauvegarder</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Diplomes et Formations --}}
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Diplômes et Formations</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('add-diplome') }}" method="post">

                        @csrf

                        <div class="results">
                            @if (Session::get('success-2'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <div class="alert-message">
                                        {{ Session::get('success-2') }}
                                    </div>
                                </div>
                            @endif
                            @if (Session::get('fail-2'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <div class="alert-message">
                                        {{ Session::get('fail-2') }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <input type="hidden" value="{{ $LoggedDoctorInfo->dr_id }}" name="dr_id">
                                <label class="form-label" for="inputFirstName"> Diplôme ou Formation</label>
                                <input type="text" class="form-control" name="cv_diplome" id="inputFirstName"
                                    placeholder="Diplome ou Formation...">
                                <button type="submit" class="btn bg-indigo text-white mt-3">Ajouter</button>
                                <span class="text-danger">
                                    @error('cv_diplome')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mb-3 col-md-6">
                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter card-table">
                                            <thead>
                                                <tr>
                                                    <th>Diplômes et Formations</th>
                                                    <th class="w-1"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($diplomes as $diplome)
                                                    <tr>
                                                        <td> {{ $diplome->cv_diplome }}</td>
                                                        <td>
                                                            <a class="btn bg-red-lt"
                                                                href="../delete-diplome/{{ $diplome->diplome_id }}"><i
                                                                    class='bx bx-trash'></i></a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <td>Aucun diplôme ou formation trouvé</td>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Experience --}}
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Experience</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('add-experience') }}" method="post">

                        @csrf

                        <div class="results">
                            @if (Session::get('success-3'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <div class="alert-message">
                                        {{ Session::get('success-3') }}
                                    </div>
                                </div>
                            @endif
                            @if (Session::get('fail-3'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <div class="alert-message">
                                        {{ Session::get('fail-3') }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <input type="hidden" value="{{ $LoggedDoctorInfo->dr_id }}" name="dr_id">
                                <label class="form-label" for="inputFirstName">Experience de travail</label>
                                <input type="text" class="form-control" name="cv_experience" id="inputFirstName"
                                    placeholder="Different experience de travail">
                                <button type="submit" class="btn bg-indigo text-white mt-3">Ajouter</button>
                                <span class="text-danger">
                                    @error('cv_experience')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mb-3 col-md-6">
                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter card-table">
                                            <thead>
                                                <tr>
                                                    <th>Experience</th>
                                                    <th class="w-1"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($experiences as $experience)
                                                    <tr>
                                                        <td> {{ $experience->cv_experience }}</td>
                                                        <td>
                                                            <a class="btn bg-red-lt"
                                                                href="../delete-experience/{{ $experience->experience_id }}"><i
                                                                    class='bx bx-trash'></i></a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <td>Aucun Experience trouvé</td>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Equipements médicaux --}}
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Equipements médicaux</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('add-equipement') }}" method="post">

                        @csrf

                        <div class="results">
                            @if (Session::get('success-4'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <div class="alert-message">
                                        {{ Session::get('success-4') }}
                                    </div>
                                </div>
                            @endif
                            @if (Session::get('fail-4'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <div class="alert-message">
                                        {{ Session::get('fail-4') }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <input type="hidden" value="{{ $LoggedDoctorInfo->dr_id }}" name="dr_id">
                                <label class="form-label" for="inputFirstName">Equipements médicaux</label>
                                <input type="text" class="form-control" name="cv_equipment" id="inputFirstName"
                                    placeholder="Ajouter équipement médical...">
                                <button type="submit" class="btn bg-indigo text-white mt-3">Ajouter</button>
                                <span class="text-danger">
                                    @error('cv_equipment')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mb-3 col-md-6">
                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter card-table">
                                            <thead>
                                                <tr>
                                                    <th>Equipements médicaux </th>
                                                    <th class="w-1"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($equipments as $equipment)
                                                    <tr>
                                                        <td> {{ $equipment->cv_equipment }}</td>
                                                        <td>
                                                            <a class="btn bg-red-lt"
                                                                href="../delete-equipement/{{ $equipment->equipment_id }}"><i
                                                                    class='bx bx-trash'></i></a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <td>Aucun Equipement trouvé</td>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Horaires --}}
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Horaires</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('add-working-day') }}" method="post">

                        @csrf

                        <div class="results">
                            @if (Session::get('success-5'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <div class="alert-message">
                                        {{ Session::get('success-5') }}
                                    </div>
                                </div>
                            @endif
                            @if (Session::get('fail-5'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <div class="alert-message">
                                        {{ Session::get('fail-5') }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <input type="hidden" value="{{ $LoggedDoctorInfo->dr_id }}" name="dr_id">
                                <label class="form-label" for="inputFirstName">Calendrier de semaine</label>
                                <input type="text" class="form-control" name="cv_working_day" id="inputFirstName"
                                    placeholder="Jour / Heure début / Heure de fermeture">
                                <button type="submit" class="btn bg-indigo text-white mt-3">Ajouter</button>
                                <span class="text-danger">
                                    @error('cv_working_day')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mb-3 col-md-6">
                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter card-table">
                                            <thead>
                                                <tr>
                                                    <th>Horaires </th>
                                                    <th class="w-1"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($working_days as $day)
                                                    <tr>
                                                        <td> {{ $day->cv_working_day }}</td>
                                                        <td>
                                                            <a class="btn bg-red-lt"
                                                                href="../delete-working-day/{{ $day->working_day_id }}"><i
                                                                    class='bx bx-trash'></i></a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <td>Aucun Horaire trouvé</td>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Tarifs --}}
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tarifs</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('add-tarif') }}" method="post">

                        @csrf

                        <div class="results">
                            @if (Session::get('success-6'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <div class="alert-message">
                                        {{ Session::get('success-6') }}
                                    </div>
                                </div>
                            @endif
                            @if (Session::get('fail-6'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <div class="alert-message">
                                        {{ Session::get('fail-6') }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <input type="hidden" value="{{ $LoggedDoctorInfo->dr_id }}" name="dr_id">
                                <label class="form-label" for="inputFirstName">Tarifs des différents services</label>
                                <input type="text" class="form-control" name="cv_tarif" id="inputFirstName"
                                    placeholder="Ajouter un tarif">
                                <button type="submit" class="btn bg-indigo text-white mt-3">Ajouter</button>
                                <span class="text-danger">
                                    @error('cv_tarif')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mb-3 col-md-6">
                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter card-table">
                                            <thead>
                                                <tr>
                                                    <th>Tarifs </th>
                                                    <th class="w-1"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($tarifs as $tarif)
                                                    <tr>
                                                        <td> {{ $tarif->cv_tarif }}</td>
                                                        <td>
                                                            <a class="btn bg-red-lt"
                                                                href="../delete-tarif/{{ $tarif->tarif_id }}"><i
                                                                    class='bx bx-trash'></i></a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <td>Aucun Tarif trouvé</td>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- MAP --}}
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Position dans la Cart</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('update-cv-map') }}" method="post">

                        @csrf

                        <div class="results">
                            @if (Session::get('success-7'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <div class="alert-message">
                                        {{ Session::get('success-7') }}
                                    </div>
                                </div>
                            @endif
                            @if (Session::get('fail-7'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <div class="alert-message">
                                        {{ Session::get('fail-7') }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-5">
                                <input type="hidden" value="{{ $LoggedDoctorInfo->dr_id }}" name="dr_id">
                                <label class="form-label" for="inputFirstName">Position dans la carte</label>
                                <p>pour obtenir la position de votre clinique dans la carte :
                                <ol>
                                    <li class="my-1">Allez sur : <a href="https://www.google.com/maps/">Google
                                            Maps. </a></li>
                                    <li class="my-1">Dans la zone de texte Rechercher dans Google Maps, saisissez
                                        l'adresse de
                                        l'emplacement que vous souhaitez afficher. </li>
                                    <li class="my-1">Lorsque la carte apparaît, cliquez sur l'icône Partager.
                                    </li>
                                    <li class="my-1">Copier le lien. </li>
                                </ol>
                                </p>
                                <input type="text" class="form-control" name="cv_map"
                                    value="{{ $contact_infos->cv_map }}" id="inputFirstName"
                                    placeholder="Exemple : https://goo.gl/maps/wkRykaBdo8CnVbcV9">
                                <span class="text-danger">
                                    @error('cv_map')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <button type="submit" class="btn bg-indigo text-white mt-3">Sauvegarder</button>
                            </div>
                            <div class="col-md-7">
                                <div class="mapouter">
                                    <div class="gmap_canvas">
                                        <iframe width="100%" height="400px" id="gmap_canvas"
                                            src="{{ $contact_infos->cv_map }}" frameborder="0" scrolling="no"
                                            {{-- src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" scrolling="no" --}}
                                            marginheight="0" marginwidth="0">
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>


    </div>

@endsection
