<div class="card">
    <div class="card-body main-content">

        <div class="row">

            <div class="col-md-4">

                <h2 class="mt-2 mb-3">Ajouter jour de travail</h2>

                <form wire:submit.prevent="save" class="addSchedule row g-2">
                    <input type="hidden" wire:model="dr_id">
                    <div class="col-md-12">
                        <label for="sc_date" class="form-label">Jour</label>
                        <input type="date" class="form-control" id="day" placeholder="Sélectionner une date"
                            wire:model="sc_date">
                        <span class="text-danger">
                            @error('sc_date')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="sc_start_hour" class="form-label">Heure de début</label>
                        <input type="time" class="form-control" id="sc_start_hour" placeholder="08:00 PM"
                            wire:model="sc_start_hour">
                        <span class="text-danger">
                            @error('sc_start_hour')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="sc_end_hour" class="form-label">Heure de fermeture</label>
                        <input type="time" class="form-control" id="sc_end_hour" placeholder="16:00 AM"
                            wire:model="sc_end_hour">
                        <span class="text-danger">
                            @error('sc_end_hour')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <label for="sc_max_patients" class="form-label">Nombre de place maximum </label>
                        <input type="text" class="form-control" id="sc_max_patients" placeholder="30"
                            wire:model="sc_max_patients">
                        <span class="text-danger">
                            @error('sc_max_patients')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <button class="btn btn-primary w-100 mt-3">Ajouter</button>
                    </div>

                </form>
            </div>

            <div class="col-md-8">
                {{-- <div id='calendar'></div> --}}

                <div class="card">
                    {{-- <div class="card-header">
                        <h3 class="card-title">jours de travail</h3>
                    </div> --}}

                    <div class="card-body border-bottom">
                        <div class="d-flex">
                            <div class="text-muted">
                                <h3 class="card-title">Jours de travail</h3>
                            </div>
                            <div class="ms-auto text-muted">

                                <div class="row">

                                    <div class="col-md-6 mb-2 mb-md-0">
                                        {{-- <input class="form-control" type="date" class="month-datepicker"
                                            wire:model="sc_month"> --}}
                                        <select class="form-select" wire:model="sc_month">
                                            <option selected disabled>Sélectionner le mois</option>
                                            <option value="01">Janvier</option>
                                            <option value="02">Février</option>
                                            <option value="03">Mars</option>
                                            <option value="04">Avril</option>
                                            <option value="05">Mai</option>
                                            <option value="06">Juin</option>
                                            <option value="07">Juillet</option>
                                            <option value="08">Août</option>
                                            <option value="09">Septembre</option>
                                            <option value="10">Octobre</option>
                                            <option value="11">Novembre</option>
                                            <option value="12">Décembre</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-2 mb-md-0">
                                        {{-- <input class="form-control" type="date" class="year-datepicker"
                                            wire:model="sc_year"> --}}
                                        <select class="form-select" wire:model="sc_month">
                                            <option selected disabled>Sélectionner l'année</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                            <option value="2031">2031</option>
                                            <option value="2032">2032</option>
                                            <option value="2033">2033</option>
                                            <option value="2034">2034</option>
                                            <option value="2035">2035</option>
                                            <option value="2036">2036</option>
                                            <option value="2037">2037</option>
                                            <option value="2038">2038</option>
                                            <option value="2039">2039</option>
                                            <option value="2040">2040</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <tbody>

                                <div class="row m-2">
                                    @forelse ($schedules as $schedule)
                                        <div class="col-md-4 p-1">
                                            <div class="card">
                                                <div class="card-status-start bg-success"></div>
                                                <div class="card-body p-2">

                                                    <div class="row">
                                                        <div class="col-9">
                                                            <div class="d-none">
                                                                <span>{{ $schedule->sc_id }}</span>
                                                            </div>
                                                            <div class="d-flex align-items-center mb-1">
                                                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon" width="22" height="22"
                                                                        viewBox="0 0 24 24" stroke-width="2"
                                                                        stroke="currentColor" fill="none"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <rect x="4" y="5" width="16" height="16"
                                                                            rx="2" />
                                                                        <line x1="16" y1="3" x2="16" y2="7" />
                                                                        <line x1="8" y1="3" x2="8" y2="7" />
                                                                        <line x1="4" y1="11" x2="20" y2="11" />
                                                                        <line x1="11" y1="15" x2="12" y2="15" />
                                                                        <line x1="12" y1="15" x2="12" y2="18" />
                                                                    </svg>
                                                                </span>
                                                                <span>{{ $schedule->sc_date }}</span>
                                                            </div>
                                                            <div class="d-flex align-items-center mb-1">
                                                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon" width="22" height="22"
                                                                        viewBox="0 0 24 24" stroke-width="2"
                                                                        stroke="currentColor" fill="none"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <circle cx="12" cy="12" r="9" />
                                                                        <polyline points="12 7 12 12 15 15" />
                                                                    </svg>
                                                                </span>
                                                                <span>{{ $schedule->sc_start_hour }} /
                                                                    {{ $schedule->sc_end_hour }}</span>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon" width="22" height="22"
                                                                        viewBox="0 0 24 24" stroke-width="2"
                                                                        stroke="currentColor" fill="none"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <circle cx="9" cy="7" r="4" />
                                                                        <path
                                                                            d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                                                    </svg>
                                                                </span>
                                                                <span>{{ $schedule->sc_reserved_places }} /
                                                                    {{ $schedule->sc_max_patients }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <button class="btn bg-indigo-lt text-white p-2 mb-1"
                                                                wire:click="openUpdatedScheduleModal({{ $schedule->sc_id }})">
                                                                <i class='bx bx-edit'></i></button>
                                                            <button class="btn bg-red-lt text-white p-2"
                                                                wire:click="deleteScheduleConfirm({{ $schedule->sc_id }})"><i
                                                                    class='bx bx-trash'></i></button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="empty-img text-center m-0"><img src="../assets/img/calendar1.png" height="128"
                                                alt="">
                                        </div>
                                        <p class="empty-title text-center mb-3">Aucun journé trouvé</p>
                                    @endforelse
                                </div>

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>


    @include('modals.edit_schedule_as')

</div>
