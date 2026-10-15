@extends('layouts.app')

@section('title', 'Crear cuenta | 3Dtienda')

@section('content')
    <main class="relative flex min-h-screen w-full flex-col items-center justify-center overflow-hidden p-space-md sm:p-space-lg">
        <div class="pointer-events-none absolute inset-0 opacity-40" aria-hidden="true">
            <svg class="h-full w-full" height="100%" width="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="synth-iso-grid" width="48" height="27.712" patternUnits="userSpaceOnUse">
                        <path d="M 0 0 L 24 13.856 L 48 0 M 24 13.856 L 24 27.712 M 0 27.712 L 24 13.856 L 48 27.712" fill="none" stroke="currentColor" class="text-outline-variant/30" stroke-dasharray="2 3" stroke-width="0.75"></path>
                    </pattern>
                    <radialGradient id="cyan-bloom" cx="50%" cy="15%" r="60%">
                        <stop offset="0%" stop-color="#06b6d4" stop-opacity="0.14"></stop>
                        <stop offset="50%" stop-color="#3131c0" stop-opacity="0.06"></stop>
                        <stop offset="100%" stop-color="#0f131c" stop-opacity="0"></stop>
                    </radialGradient>
                </defs>
                <rect width="100%" height="100%" fill="url(#synth-iso-grid)"></rect>
                <rect width="100%" height="100%" fill="url(#cyan-bloom)"></rect>
            </svg>
        </div>

        <div class="pointer-events-none absolute left-6 top-8 hidden select-none flex-col gap-1 font-mono text-label-caps text-outline opacity-40 lg:flex xl:left-12">
            <span class="flex items-center gap-1.5"><span class="h-1.5 w-1.5 animate-pulse rounded-full bg-primary-container"></span>LATENCY: 12ms // BUFFER: OPTIMAL</span>
            <span>SYS_NODE: CORE-EU-PRECISION-04</span>
            <span>GRID_METRIC: ISO_POLY_0.025mm</span>
        </div>
        <div class="pointer-events-none absolute bottom-8 right-6 hidden select-none flex-col items-end gap-1 font-mono text-label-caps text-outline opacity-40 lg:flex xl:right-12">
            <span>ENCRYPT: ED25519-MESH</span>
            <span>SYNTH3D PROTOCOL V4.19</span>
            <span class="text-tertiary">STANDBY_FOR_PROVISIONING</span>
        </div>

        <section class="relative z-10 flex w-full max-w-[620px] flex-col gap-space-lg rounded-xl bg-surface-container-low/85 p-space-md shadow-2xl backdrop-blur-2xl sm:p-space-lg md:p-space-xl" aria-labelledby="register-title">
            <div class="flex items-center justify-between gap-2 pb-space-xs">
                <div class="inline-flex min-w-0 items-center gap-2 rounded-full bg-surface-container-high/90 px-3 py-1 font-mono text-[9px] tracking-wider text-primary">
                    <span class="h-1.5 w-1.5 shrink-0 rounded-full bg-primary-container shadow-[0_0_8px_#06b6d4]"></span>
                    <span>NUEVA MATRÍCULA DE CREADOR TÉCNICO // RED ADITIVA GLOBAL</span>
                </div>
                <span class="hidden shrink-0 font-mono text-label-caps uppercase tracking-widest text-outline sm:inline-block">REG_02 // SYNC</span>
            </div>

            <div class="flex flex-col gap-space-xs">
                <div class="flex items-center gap-3">
                    <h1 id="register-title" class="font-display text-[26px] font-bold leading-tight tracking-tight text-on-surface sm:text-headline-lg">Crear Cuenta de Creador</h1>
                    <span class="inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-lg bg-surface-variant text-primary" title="Certificado Criptográfico SHA-256">
                        <span class="material-symbols-outlined text-sm" aria-hidden="true">verified_user</span>
                    </span>
                </div>
                <p class="max-w-lg font-body text-on-surface-variant">Configure sus credenciales criptográficas y espacio de trabajo de manufactura aditiva y computacional.</p>
            </div>

            <form class="flex flex-col gap-space-md" method="POST" action="{{ route('register.store') }}" autocomplete="on">
                @csrf
                <div class="grid grid-cols-1 gap-space-md sm:grid-cols-2">
                    <div class="flex flex-col gap-1.5">
                        <label class="flex items-center justify-between font-mono text-label-caps uppercase text-on-surface-variant" for="full_name">
                            <span>Nombre Completo</span>
                            <span class="text-[9px] text-outline">DOC-ID</span>
                        </label>
                        <div class="relative flex items-center">
                            <span class="material-symbols-outlined pointer-events-none absolute left-3 text-lg text-outline" aria-hidden="true">badge</span>
                            <input class="h-10 w-full rounded bg-surface-container-lowest pl-10 pr-3 font-body text-on-surface shadow-inner transition-all placeholder:text-outline/40 focus:outline-none focus:ring-1 focus:ring-primary-container" id="full_name" name="name" value="{{ old('name') }}" placeholder="p. ej. Dra. Sarah Jenkins" type="text" autocomplete="name">
                        </div>
                        @error('name')
                            <p class="font-mono text-[10px] text-red-300" role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="flex items-center justify-between font-mono text-label-caps uppercase text-on-surface-variant" for="username">
                            <span>Usuario Único</span>
                            <span class="text-[9px] text-tertiary">ID DE USUARIO</span>
                        </label>
                        <div class="relative flex items-center">
                            <span class="absolute left-3 select-none font-mono text-tech-data-md font-semibold text-primary">@</span>
                            <input class="h-10 w-full rounded bg-surface-container-lowest pl-8 pr-3 font-mono text-tech-data-md text-primary focus:outline-none focus:ring-1 focus:ring-primary-container focus:shadow-inner" id="username" name="username" value="{{ old('username') }}" placeholder="su_usuario" type="text" autocomplete="username">
                        </div>
                        @error('username')
                            <p class="font-mono text-[10px] text-red-300" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="flex items-center justify-between font-mono text-label-caps uppercase text-on-surface-variant" for="email">
                        <span>Email Corporativo / FabLab</span>
                        <span class="text-[9px] text-outline">ENTERPRISE DOMAIN</span>
                    </label>
                    <div class="relative flex items-center">
                        <span class="material-symbols-outlined pointer-events-none absolute left-3 text-lg text-outline" aria-hidden="true">alternate_email</span>
                        <input class="h-10 w-full rounded bg-surface-container-lowest pl-10 pr-3 font-mono text-tech-data-md text-on-surface shadow-inner transition-all placeholder:text-outline/40 focus:outline-none focus:ring-1 focus:ring-primary-container" id="email" name="email" value="{{ old('email') }}" placeholder="operaciones@su-fablab.org" type="email" autocomplete="email">
                    </div>
                    @error('email')
                        <p class="font-mono text-[10px] text-red-300" role="alert">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 gap-space-md sm:grid-cols-2">
                    <div class="flex flex-col gap-1.5">
                        <label class="font-mono text-label-caps uppercase text-on-surface-variant" for="password">Clave Criptográfica</label>
                        <div class="relative flex items-center">
                            <span class="material-symbols-outlined pointer-events-none absolute left-3 text-lg text-outline" aria-hidden="true">lock</span>
                            <input class="h-10 w-full rounded bg-surface-container-lowest pl-10 pr-3 font-mono text-tech-data-md tracking-widest text-on-surface shadow-inner transition-all focus:outline-none focus:ring-1 focus:ring-primary-container" id="password" name="password" type="password" autocomplete="new-password">
                        </div>
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="font-mono text-label-caps uppercase text-on-surface-variant" for="password_confirmation">Confirmar Clave</label>
                        <div class="relative flex items-center">
                            <span class="material-symbols-outlined pointer-events-none absolute left-3 text-lg text-outline" aria-hidden="true">lock_clock</span>
                            <input class="h-10 w-full rounded bg-surface-container-lowest pl-10 pr-3 font-mono text-tech-data-md tracking-widest text-on-surface shadow-inner transition-all focus:outline-none focus:ring-1 focus:ring-primary-container" id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password">
                        </div>
                    </div>
                </div>
                @error('password')
                    <p class="font-mono text-[10px] text-red-300" role="alert">{{ $message }}</p>
                @enderror

                <div class="flex flex-col gap-2 rounded-lg bg-surface-container-lowest/60 p-space-sm">
                    <div class="flex items-center justify-between gap-2">
                        <div class="flex items-center gap-1.5">
                            <span class="h-2 w-2 shrink-0 rounded-full bg-outline animate-pulse"></span>
                            <span class="font-mono text-label-caps tracking-wide text-on-surface-variant">REQUISITOS DE CLAVE</span>
                        </div>
                        <span class="shrink-0 font-mono text-tech-data-sm text-outline">PENDIENTE</span>
                    </div>
                    <div class="grid h-1.5 w-full grid-cols-4 gap-1.5" aria-hidden="true">
                        <div class="rounded-full bg-surface-variant"></div>
                        <div class="rounded-full bg-surface-variant"></div>
                        <div class="rounded-full bg-surface-variant"></div>
                        <div class="rounded-full bg-surface-variant"></div>
                    </div>
                    <div class="grid grid-cols-2 gap-x-2 gap-y-1 pt-1 sm:grid-cols-3">
                        <div class="flex items-center gap-1 font-mono text-tech-data-sm text-on-surface-variant"><span class="material-symbols-outlined text-[13px] text-outline" aria-hidden="true">radio_button_unchecked</span><span>≥ 12 Caracteres</span></div>
                        <div class="flex items-center gap-1 font-mono text-tech-data-sm text-on-surface-variant"><span class="material-symbols-outlined text-[13px] text-outline" aria-hidden="true">radio_button_unchecked</span><span>Mayús. &amp; Números</span></div>
                        <div class="col-span-2 flex items-center gap-1 font-mono text-tech-data-sm text-on-surface-variant sm:col-span-1"><span class="material-symbols-outlined text-[13px] text-outline" aria-hidden="true">radio_button_unchecked</span><span>Símbolo Criptográfico</span></div>
                    </div>
                </div>

                <fieldset class="flex flex-col gap-2 pt-1">
                    <legend class="flex w-full items-center justify-between gap-2 font-mono text-label-caps uppercase text-on-surface-variant">
                        <span>Perfil de Ingeniería / Matrícula</span>
                        <span class="text-right text-[9px] text-outline">SELECCIÓN DE ROL ÚNICO</span>
                    </legend>
                    <div class="grid grid-cols-1 gap-space-sm sm:grid-cols-2">
                        <label class="group relative flex min-h-[114px] cursor-pointer flex-col justify-between rounded-lg bg-surface-container-lowest/80 p-space-sm shadow-sm ring-1 ring-outline-variant/40 transition-all hover:bg-surface-container has-[:checked]:bg-surface-container-high has-[:checked]:ring-secondary-container">
                            <input class="peer sr-only" type="radio" name="role" value="designer" @checked(old('role', 'designer') === 'designer')>
                            <span class="flex items-start justify-between">
                                <span class="flex items-center gap-2">
                                    <span class="flex h-8 w-8 items-center justify-center rounded bg-secondary-container/40 text-secondary">
                                        <span class="material-symbols-outlined text-lg" aria-hidden="true">view_in_ar</span>
                                    </span>
                                    <span>
                                        <span class="block font-display text-headline-sm leading-tight text-on-surface">Soy diseñador</span>
                                        <span class="font-mono text-[9px] uppercase tracking-widest text-secondary">STL / 3MF CAD ASSETS</span>
                                    </span>
                                </span>
                                <span class="flex h-4 w-4 items-center justify-center rounded-full bg-surface-variant text-[10px] text-outline transition-colors group-has-[:checked]:bg-secondary-container group-has-[:checked]:text-white">
                                    <span class="material-symbols-outlined text-[12px] opacity-0 group-has-[:checked]:opacity-100" aria-hidden="true">check</span>
                                </span>
                            </span>
                            <span class="mt-2 line-clamp-2 font-body text-body-sm text-on-surface-variant">Modelado 3D, parametrización CAD, STL/3MF y licenciamiento de archivos digitales.</span>
                            <span class="mt-2 flex items-center gap-1.5">
                                <span class="rounded-full bg-secondary-container/20 px-2 py-0.5 font-mono text-[9px] font-semibold uppercase text-secondary">Parametric Engine</span>
                            </span>
                        </label>

                        <label class="group relative flex min-h-[114px] cursor-pointer flex-col justify-between rounded-lg bg-surface-container-lowest/80 p-space-sm shadow-sm ring-1 ring-outline-variant/40 transition-all hover:bg-surface-container has-[:checked]:bg-surface-container-high has-[:checked]:ring-primary-container">
                            <input class="peer sr-only" type="radio" name="role" value="fabricator" @checked(old('role') === 'fabricator')>
                            <span class="flex items-start justify-between">
                                <span class="flex items-center gap-2">
                                    <span class="flex h-8 w-8 items-center justify-center rounded bg-primary-container/20 text-primary">
                                        <span class="material-symbols-outlined text-lg" aria-hidden="true">precision_manufacturing</span>
                                    </span>
                                    <span>
                                        <span class="block font-display text-headline-sm leading-tight text-on-surface">Soy fabricante</span>
                                        <span class="font-mono text-[9px] uppercase tracking-widest text-primary">FDM / SLA CLUSTER</span>
                                    </span>
                                </span>
                                <span class="flex h-4 w-4 items-center justify-center rounded-full bg-surface-variant text-[10px] text-outline transition-colors group-has-[:checked]:bg-primary-container group-has-[:checked]:text-on-primary-fixed">
                                    <span class="material-symbols-outlined text-[12px] opacity-0 group-has-[:checked]:opacity-100" aria-hidden="true">check</span>
                                </span>
                            </span>
                            <span class="mt-2 line-clamp-2 font-body text-body-sm text-on-surface-variant">Granjas de impresión FDM/Resina SLA, validación física de mallas, envíos y posprocesado.</span>
                            <span class="mt-2 flex items-center gap-1.5">
                                <span class="rounded-full bg-primary-container/15 px-2 py-0.5 font-mono text-[9px] font-semibold uppercase text-primary">Hardware Node</span>
                                <span class="rounded-full bg-surface-variant px-2 py-0.5 font-mono text-[9px] uppercase text-outline">B2B Print</span>
                            </span>
                        </label>
                    </div>
                </fieldset>
                @error('role')
                    <p class="font-mono text-[10px] text-red-300" role="alert">{{ $message }}</p>
                @enderror

                <div class="flex items-start gap-3 pt-2">
                    <label class="group relative mt-0.5 flex cursor-pointer items-center">
                        <input class="peer sr-only" id="terms_agree" name="terms_agree" type="checkbox" value="1" @checked(old('terms_agree'))>
                        <span class="flex h-4 w-4 items-center justify-center rounded bg-surface-container-lowest text-on-primary-fixed shadow-sm transition-colors peer-checked:bg-primary-container">
                            <span class="material-symbols-outlined text-xs font-bold opacity-0 group-has-[:checked]:opacity-100" aria-hidden="true">check</span>
                        </span>
                    </label>
                    <label class="cursor-pointer select-none font-body text-body-sm text-on-surface-variant" for="terms_agree">
                        Acepto las <a class="font-medium text-primary hover:underline" href="#licenses">licencias de fabricación aditiva</a> y el acuerdo estricto de <a class="font-medium text-primary hover:underline" href="#dmca">no redistribución ni reverse engineering</a> de mallas poligonales.
                    </label>
                </div>
                @error('terms_agree')
                    <p class="font-mono text-[10px] text-red-300" role="alert">{{ $message }}</p>
                @enderror

                <button class="mt-1 flex h-11 w-full items-center justify-center gap-2 rounded bg-primary-container font-display text-headline-sm font-semibold tracking-wide text-on-primary-fixed shadow-[0_0_20px_rgba(6,182,212,0.35)] transition-all hover:bg-primary hover:shadow-[0_0_28px_rgba(6,182,212,0.6)] active:scale-[0.99]" type="submit">
                    <span class="material-symbols-outlined text-xl" aria-hidden="true">token</span>
                    <span>Registrarse y Validar Credenciales</span>
                </button>
            </form>

            <div class="flex items-center justify-between gap-3 rounded-lg bg-surface-container-lowest/90 p-space-sm shadow-inner">
                <div class="flex min-w-0 items-center gap-2.5">
                    <span class="material-symbols-outlined shrink-0 text-base text-primary" aria-hidden="true">sync</span>
                    <div class="flex min-w-0 flex-col">
                        <span class="font-mono text-label-caps uppercase tracking-wider text-primary">STATUS CONSOLE</span>
                        @if ($errors->any())
                            <span class="font-mono text-tech-data-sm text-red-300">Registro no completado:</span>
                            <ul class="max-h-24 space-y-0.5 overflow-y-auto font-mono text-tech-data-sm text-red-300" role="alert">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @else
                            <span class="truncate font-mono text-tech-data-sm text-on-surface-variant">Sistema listo para validar su registro.</span>
                        @endif
                    </div>
                </div>
                <div class="hidden shrink-0 items-center gap-1 rounded bg-surface-container px-2 py-0.5 font-mono text-tech-data-sm text-outline sm:flex">
                    <span class="h-1.5 w-1.5 rounded-full {{ $errors->any() ? 'bg-red-300' : 'bg-tertiary' }}"></span>
                    <span>{{ $errors->any() ? 'ERROR' : 'READY' }}</span>
                </div>
            </div>

            <div class="flex flex-wrap items-center justify-center gap-x-1.5 gap-y-1 pt-1 text-center font-body text-body-sm text-on-surface-variant">
                <span>¿Ya tiene una clave de acceso o cuenta registrada?</span>
                <a class="font-semibold text-primary underline decoration-primary/40 underline-offset-4 transition-colors hover:text-primary hover:decoration-primary" href="{{ route('login') }}">Iniciar Sesión</a>
            </div>
        </section>
    </main>
@endsection
