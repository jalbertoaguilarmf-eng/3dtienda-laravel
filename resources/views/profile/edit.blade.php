@extends('layouts.app')

@section('title', 'Editar perfil | 3Dtienda')

@section('content')
    <main class="relative min-h-screen overflow-hidden px-space-md py-space-lg sm:px-space-lg lg:px-space-xl">
        <div class="pointer-events-none absolute -right-24 -top-32 h-96 w-96 rounded-full bg-primary-container/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -left-20 top-1/3 h-80 w-80 rounded-full bg-secondary-container/15 blur-3xl"></div>
        <div class="pointer-events-none absolute inset-0 opacity-30" aria-hidden="true">
            <svg class="h-full w-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="profile-grid" width="48" height="48" patternUnits="userSpaceOnUse">
                        <path d="M 48 0 L 0 0 0 48" fill="none" stroke="currentColor" class="text-outline-variant/30" stroke-width="1"></path>
                        <circle cx="24" cy="24" r="1" fill="currentColor" class="text-primary"></circle>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#profile-grid)"></rect>
            </svg>
        </div>

        <div class="relative z-10 mx-auto flex w-full max-w-5xl flex-col gap-space-lg">
            <nav class="flex flex-wrap items-center justify-between gap-space-sm" aria-label="Migas de pan">
                <div class="flex flex-wrap items-center gap-1.5 font-mono text-label-caps uppercase tracking-wider text-outline">
                    <span>SYNTH3D // BÓVEDA</span>
                    <span class="text-primary">›</span>
                    <span>CONFIGURACIÓN</span>
                    <span class="text-primary">›</span>
                    <span class="text-on-surface-variant">EDITAR PERFIL</span>
                </div>
                <span class="inline-flex items-center gap-1.5 font-mono text-label-caps uppercase text-tertiary">
                    <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-tertiary"></span>
                    EN LÍNEA // HASH_OK
                </span>
            </nav>

            <header class="flex flex-col gap-space-sm">
                <a href="{{ route('dashboard') }}" class="inline-flex w-fit items-center gap-1.5 rounded-lg bg-surface-container/80 px-space-sm py-2 font-mono text-tech-data-sm text-primary ring-1 ring-outline-variant/40 transition-colors hover:bg-surface-container-high">
                    <span class="material-symbols-outlined text-base" aria-hidden="true">arrow_back</span>
                    Volver al Dashboard
                </a>
                <div class="mt-space-sm flex flex-col gap-space-xs">
                    <span class="font-mono text-label-caps uppercase tracking-[0.18em] text-primary">MATRÍCULA DE CREADOR // NODO: 0X8F92</span>
                    <h1 class="font-display text-[32px] font-bold leading-tight tracking-tight text-on-surface sm:text-[40px]">Editar Perfil</h1>
                    <p class="max-w-2xl font-body text-body-sm text-on-surface-variant sm:text-[14px] sm:leading-6">Gestione su identidad técnica, rol operativo dentro de la red aditiva y parámetros criptográficos de acceso.</p>
                </div>
            </header>

            @if (session('profile-status'))
                <div class="flex items-center gap-2 rounded-lg border border-tertiary/30 bg-tertiary/10 px-space-md py-space-sm font-mono text-tech-data-sm text-tertiary" role="status">
                    <span class="material-symbols-outlined text-base" aria-hidden="true">check_circle</span>
                    {{ session('profile-status') }}
                </div>
            @endif
            @if (session('password-status'))
                <div class="flex items-center gap-2 rounded-lg border border-tertiary/30 bg-tertiary/10 px-space-md py-space-sm font-mono text-tech-data-sm text-tertiary" role="status">
                    <span class="material-symbols-outlined text-base" aria-hidden="true">check_circle</span>
                    {{ session('password-status') }}
                </div>
            @endif

            <section class="rounded-2xl bg-surface-container-low/85 p-space-md shadow-2xl ring-1 ring-white/10 backdrop-blur-2xl sm:p-space-lg md:p-space-xl" aria-labelledby="profile-data-title">
                <div class="mb-space-lg flex items-start gap-space-sm border-b border-surface-variant/60 pb-space-md">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-primary-container/15 text-primary">
                        <span class="material-symbols-outlined" aria-hidden="true">badge</span>
                    </span>
                    <div>
                        <h2 id="profile-data-title" class="font-display text-headline-md font-semibold text-on-surface">Datos del perfil</h2>
                        <p class="font-mono text-tech-data-sm text-outline">IDENTIDAD DE USUARIO // SYS_PROFILE</p>
                    </div>
                </div>

                <form class="flex flex-col gap-space-md" method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PATCH')
                    <div class="grid grid-cols-1 gap-space-md md:grid-cols-2">
                        <div class="flex flex-col gap-1.5">
                            <label class="font-mono text-label-caps uppercase tracking-wider text-on-surface-variant" for="profile-name">Nombre completo</label>
                            <div class="relative flex items-center">
                                <span class="material-symbols-outlined absolute left-3 text-lg text-outline" aria-hidden="true">person</span>
                                <input class="h-11 w-full rounded-lg bg-surface-container-lowest pl-10 pr-3 font-body text-on-surface shadow-inner placeholder:text-outline/50 focus:outline-none focus:ring-1 focus:ring-primary" id="profile-name" name="name" type="text" value="{{ old('name', $user->name) }}" autocomplete="name" required>
                            </div>
                            @error('name')<p class="font-mono text-[10px] text-red-300" role="alert">{{ $message }}</p>@enderror
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label class="font-mono text-label-caps uppercase tracking-wider text-on-surface-variant" for="profile-username">Usuario único</label>
                            <div class="relative flex items-center">
                                <span class="absolute left-3 font-mono text-tech-data-md font-semibold text-primary">@</span>
                                <input class="h-11 w-full rounded-lg bg-surface-container-lowest pl-8 pr-3 font-mono text-tech-data-md text-primary shadow-inner placeholder:text-outline/50 focus:outline-none focus:ring-1 focus:ring-primary" id="profile-username" name="username" type="text" value="{{ old('username', $user->username) }}" autocomplete="username" required>
                            </div>
                            @error('username')<p class="font-mono text-[10px] text-red-300" role="alert">{{ $message }}</p>@enderror
                        </div>
                        <div class="flex flex-col gap-1.5 md:col-span-2">
                            <label class="font-mono text-label-caps uppercase tracking-wider text-on-surface-variant" for="profile-email">Correo electrónico profesional</label>
                            <div class="relative flex items-center">
                                <span class="material-symbols-outlined absolute left-3 text-lg text-outline" aria-hidden="true">mail</span>
                                <input class="h-11 w-full rounded-lg bg-surface-container-lowest pl-10 pr-3 font-mono text-tech-data-md text-on-surface shadow-inner placeholder:text-outline/50 focus:outline-none focus:ring-1 focus:ring-primary" id="profile-email" name="email" type="email" value="{{ old('email', $user->email) }}" autocomplete="email" required>
                            </div>
                            @error('email')<p class="font-mono text-[10px] text-red-300" role="alert">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <fieldset class="flex flex-col gap-2">
                        <legend class="mb-1 font-mono text-label-caps uppercase tracking-wider text-on-surface-variant">Perfil de ingeniería / selección de rol único</legend>
                        <div class="grid grid-cols-1 gap-space-sm sm:grid-cols-2">
                            <label class="group relative flex min-h-[114px] cursor-pointer flex-col justify-between rounded-lg bg-surface-container-lowest/80 p-space-sm shadow-sm ring-1 ring-outline-variant/40 transition-all hover:bg-surface-container has-[:checked]:bg-surface-container-high has-[:checked]:ring-secondary-container">
                                <input class="peer sr-only" type="radio" name="role" value="designer" @checked(old('role', $user->role) === 'designer') required>
                                <span class="flex items-start justify-between">
                                    <span class="flex items-center gap-2">
                                        <span class="flex h-8 w-8 items-center justify-center rounded bg-secondary-container/40 text-secondary"><span class="material-symbols-outlined text-lg" aria-hidden="true">view_in_ar</span></span>
                                        <span><span class="block font-display text-headline-sm leading-tight text-on-surface">Soy diseñador</span><span class="font-mono text-[9px] uppercase tracking-widest text-secondary">STL / 3MF CAD ASSETS</span></span>
                                    </span>
                                    <span class="flex h-4 w-4 items-center justify-center rounded-full bg-surface-variant text-[10px] text-outline transition-colors group-has-[:checked]:bg-secondary-container group-has-[:checked]:text-white">
                                        <span class="material-symbols-outlined text-[12px] opacity-0 group-has-[:checked]:opacity-100" aria-hidden="true">check</span>
                                    </span>
                                </span>
                                <span class="mt-2 font-body text-body-sm text-on-surface-variant">Modelado 3D, parametrización CAD, STL/3MF y licenciamiento de archivos paramétricos.</span>
                                <span class="mt-2 w-fit rounded-full bg-secondary-container/20 px-2 py-0.5 font-mono text-[9px] font-semibold uppercase text-secondary">Parametric Engine</span>
                            </label>
                            <label class="group relative flex min-h-[114px] cursor-pointer flex-col justify-between rounded-lg bg-surface-container-lowest/80 p-space-sm shadow-sm ring-1 ring-outline-variant/40 transition-all hover:bg-surface-container has-[:checked]:bg-surface-container-high has-[:checked]:ring-primary-container">
                                <input class="peer sr-only" type="radio" name="role" value="fabricator" @checked(old('role', $user->role) === 'fabricator') required>
                                <span class="flex items-start justify-between">
                                    <span class="flex items-center gap-2">
                                        <span class="flex h-8 w-8 items-center justify-center rounded bg-primary-container/20 text-primary"><span class="material-symbols-outlined text-lg" aria-hidden="true">precision_manufacturing</span></span>
                                        <span><span class="block font-display text-headline-sm leading-tight text-on-surface">Soy fabricante</span><span class="font-mono text-[9px] uppercase tracking-widest text-primary">FDM / SLA CLUSTER</span></span>
                                    </span>
                                    <span class="flex h-4 w-4 items-center justify-center rounded-full bg-surface-variant text-[10px] text-outline transition-colors group-has-[:checked]:bg-primary-container group-has-[:checked]:text-on-primary-fixed">
                                        <span class="material-symbols-outlined text-[12px] opacity-0 group-has-[:checked]:opacity-100" aria-hidden="true">check</span>
                                    </span>
                                </span>
                                <span class="mt-2 font-body text-body-sm text-on-surface-variant">Granjas FDM/SLA, validación física de mallas, envíos y hardware local.</span>
                                <span class="mt-2 w-fit rounded-full bg-primary-container/15 px-2 py-0.5 font-mono text-[9px] font-semibold uppercase text-primary">Hardware Node</span>
                            </label>
                        </div>
                        @error('role')<p class="font-mono text-[10px] text-red-300" role="alert">{{ $message }}</p>@enderror
                    </fieldset>

                    <div class="flex flex-wrap items-center justify-between gap-space-sm border-t border-surface-variant/60 pt-space-md">
                        <span class="font-mono text-tech-data-sm text-outline">TLS 1.3 ENCRYPTED // PROFILE_SYNC</span>
                        <button class="inline-flex h-11 items-center justify-center gap-2 rounded-lg bg-primary-container px-space-md font-display text-headline-sm font-semibold text-on-primary-fixed shadow-[0_0_20px_rgba(6,182,212,0.25)] transition-all hover:bg-primary hover:shadow-[0_0_28px_rgba(76,215,246,0.4)]" type="submit">
                            <span class="material-symbols-outlined text-lg" aria-hidden="true">save</span>
                            Guardar cambios
                        </button>
                    </div>
                </form>
            </section>

            <section class="rounded-2xl bg-surface-container-low/85 p-space-md shadow-2xl ring-1 ring-white/10 backdrop-blur-2xl sm:p-space-lg md:p-space-xl" aria-labelledby="security-title">
                <div class="mb-space-lg flex items-start gap-space-sm border-b border-surface-variant/60 pb-space-md">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-secondary-container/30 text-secondary">
                        <span class="material-symbols-outlined" aria-hidden="true">shield_lock</span>
                    </span>
                    <div>
                        <h2 id="security-title" class="font-display text-headline-md font-semibold text-on-surface">Seguridad</h2>
                        <p class="font-mono text-tech-data-sm text-outline">CLAVES CRIPTOGRÁFICAS // ROTACIÓN SEGURA</p>
                    </div>
                </div>

                <form class="flex flex-col gap-space-md" method="POST" action="{{ route('profile.password') }}">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-space-md md:grid-cols-3">
                        <div class="flex flex-col gap-1.5">
                            <label class="font-mono text-label-caps uppercase tracking-wider text-on-surface-variant" for="current-password">Clave actual</label>
                            <div class="relative flex items-center">
                                <span class="material-symbols-outlined absolute left-3 text-lg text-outline" aria-hidden="true">key</span>
                                <input class="h-11 w-full rounded-lg bg-surface-container-lowest pl-10 pr-3 font-mono text-tech-data-md text-on-surface focus:outline-none focus:ring-1 focus:ring-secondary" id="current-password" name="current_password" type="password" autocomplete="current-password" required>
                            </div>
                            @error('current_password')<p class="font-mono text-[10px] text-red-300" role="alert">{{ $message }}</p>@enderror
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label class="font-mono text-label-caps uppercase tracking-wider text-on-surface-variant" for="new-password">Nueva clave</label>
                            <div class="relative flex items-center">
                                <span class="material-symbols-outlined absolute left-3 text-lg text-outline" aria-hidden="true">lock</span>
                                <input class="h-11 w-full rounded-lg bg-surface-container-lowest pl-10 pr-3 font-mono text-tech-data-md text-on-surface focus:outline-none focus:ring-1 focus:ring-secondary" id="new-password" name="password" type="password" autocomplete="new-password" required>
                            </div>
                            @error('password')<p class="font-mono text-[10px] text-red-300" role="alert">{{ $message }}</p>@enderror
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label class="font-mono text-label-caps uppercase tracking-wider text-on-surface-variant" for="new-password-confirmation">Confirmar nueva clave</label>
                            <div class="relative flex items-center">
                                <span class="material-symbols-outlined absolute left-3 text-lg text-outline" aria-hidden="true">lock_reset</span>
                                <input class="h-11 w-full rounded-lg bg-surface-container-lowest pl-10 pr-3 font-mono text-tech-data-md text-on-surface focus:outline-none focus:ring-1 focus:ring-secondary" id="new-password-confirmation" name="password_confirmation" type="password" autocomplete="new-password" required>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center justify-between gap-space-sm border-t border-surface-variant/60 pt-space-md">
                        <span class="font-mono text-tech-data-sm text-outline">MIN. 12 CHARS // MAYÚSCULA // NÚMERO // SÍMBOLO</span>
                        <button class="inline-flex h-11 items-center justify-center gap-2 rounded-lg bg-secondary-container/30 px-space-md font-display text-headline-sm font-semibold text-secondary ring-1 ring-secondary/40 transition-all hover:bg-secondary-container/50" type="submit">
                            <span class="material-symbols-outlined text-lg" aria-hidden="true">security_update_good</span>
                            Actualizar clave
                        </button>
                    </div>
                </form>
            </section>

            <footer class="flex flex-wrap items-center justify-center gap-x-space-md gap-y-1 pb-space-md text-center font-mono text-label-caps uppercase tracking-wider text-outline">
                <span>SYNTH3D PRECISION OS</span>
                <span class="text-primary">TLS 1.3 ENCRYPTED</span>
                <span>ISO/ASTM 52900 STANDARD</span>
            </footer>
        </div>
    </main>
@endsection
