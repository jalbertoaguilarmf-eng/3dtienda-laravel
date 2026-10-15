@extends('layouts.app')

@section('title', 'Inicio de sesión | 3Dtienda')

@section('content')
    <main class="flex min-h-screen w-full flex-col items-center justify-center p-space-md sm:p-space-lg">
        <div class="relative flex w-full flex-col items-center justify-center overflow-hidden py-space-xl">
            <div class="pointer-events-none absolute inset-0 flex items-center justify-center" aria-hidden="true">
                <div class="absolute h-[620px] w-[620px] -translate-y-6 rounded-full bg-primary/10 blur-[120px]"></div>
                <div class="absolute h-[480px] w-[480px] translate-x-32 translate-y-24 rounded-full bg-secondary-container/20 blur-[140px]"></div>
                <svg class="absolute inset-0 h-full w-full text-primary opacity-[0.035]" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="cad-grid" width="48" height="48" patternUnits="userSpaceOnUse">
                            <path d="M 48 0 L 0 0 0 48" fill="none" stroke="currentColor" stroke-width="1"></path>
                            <circle cx="24" cy="24" r="1" fill="currentColor"></circle>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#cad-grid)"></rect>
                </svg>
            </div>

            <section class="relative z-10 flex w-full max-w-[490px] flex-col gap-space-lg rounded-2xl bg-surface-container/75 p-space-md shadow-2xl backdrop-blur-2xl sm:p-space-xl" aria-labelledby="login-title">
                <div class="flex items-center justify-between gap-2">
                    <div class="inline-flex items-center gap-space-xs rounded-full bg-surface-container-lowest/80 px-space-sm py-1">
                        <span class="h-2 w-2 animate-pulse rounded-full bg-primary shadow-[0_0_8px_#4cd7f6]"></span>
                        <span class="font-mono text-[9px] font-semibold uppercase tracking-wider text-on-surface-variant sm:text-label-caps">SYNTH3D SECURITY LAYER // 256-BIT</span>
                    </div>
                    <div class="flex shrink-0 items-center gap-1 font-mono text-[9px] text-outline sm:text-label-caps">
                        <span class="material-symbols-outlined text-[14px] text-tertiary" aria-hidden="true">verified_user</span>
                        <span>NODE: VTL-09</span>
                    </div>
                </div>

                <div class="-mt-space-xs flex flex-col items-center text-center">
                    <div class="relative mb-space-sm flex h-16 w-16 items-center justify-center">
                        <div class="absolute inset-0 rounded-2xl bg-primary/15 blur-md"></div>
                        <div class="relative flex h-16 w-16 items-center justify-center rounded-2xl bg-surface-container-high p-2.5 shadow-lg">
                            <svg class="h-full w-full text-primary drop-shadow-[0_0_10px_rgba(76,215,246,0.5)]" fill="none" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path class="opacity-80" d="M32 6L54 18.5V45.5L32 58L10 45.5V18.5L32 6Z" stroke="currentColor" stroke-linejoin="round" stroke-width="3"></path>
                                <path d="M32 6V32M54 18.5L32 32M10 18.5L32 32" stroke="currentColor" stroke-linejoin="round" stroke-width="3"></path>
                                <circle cx="32" cy="32" r="5" fill="#0f131c" stroke="currentColor" stroke-width="2.5"></circle>
                                <circle cx="32" cy="32" r="2" fill="currentColor"></circle>
                            </svg>
                        </div>
                    </div>
                    <span class="mb-1 font-mono text-label-caps uppercase tracking-[0.2em] text-primary">SYNTH3D PRECISION CORE</span>
                    <h1 id="login-title" class="font-display text-headline-md font-semibold tracking-tight text-on-surface">Acceso de Alta Precisión</h1>
                    <p class="mt-1 max-w-xs font-body text-body-sm text-outline">Autentíquese para acceder a su bóveda de gemelos digitales y modelos paramétricos</p>
                </div>

                <form class="flex flex-col gap-space-md" method="POST" action="{{ route('login.store') }}" autocomplete="on">
                    @csrf
                    <div class="flex flex-col gap-1.5">
                        <div class="flex items-center justify-between gap-2">
                            <label for="cad-email" class="font-mono text-label-caps font-medium tracking-wider text-on-surface-variant">CORREO ELECTRÓNICO PROFESIONAL</label>
                            <span class="shrink-0 font-mono text-tech-data-sm text-outline">SYS_ID // 01</span>
                        </div>
                        <div class="group relative flex items-center">
                            <span class="material-symbols-outlined absolute left-3 text-[18px] text-outline transition-colors group-focus-within:text-primary" aria-hidden="true">alternate_email</span>
                            <input id="cad-email" name="email" type="email" value="{{ old('email') }}" autocomplete="username" placeholder="usuario@dominio-industrial.io" class="h-10 w-full rounded-lg bg-surface-container-lowest pl-10 pr-3 font-mono text-tech-data-md text-on-surface transition-all placeholder:text-outline-variant focus:outline-none focus:ring-1 focus:ring-primary focus:shadow-[0_0_16px_rgba(76,215,246,0.25)]">
                        </div>
                        @error('email')
                            <p class="font-mono text-[10px] text-red-300" role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <div class="flex items-center justify-between gap-2">
                            <label for="cad-pass" class="font-mono text-label-caps font-medium tracking-wider text-on-surface-variant">CLAVE DE ACCESO CRIPTOGRÁFICA</label>
                            <span class="font-body text-body-sm text-primary" title="Próximamente">¿Olvidó su clave?</span>
                        </div>
                        <div class="group relative flex items-center">
                            <span class="material-symbols-outlined absolute left-3 text-[18px] text-outline transition-colors group-focus-within:text-primary" aria-hidden="true">lock</span>
                            <input id="cad-pass" name="password" type="password" autocomplete="current-password" placeholder="••••••••••••••••" class="h-10 w-full rounded-lg bg-surface-container-lowest pl-10 pr-10 font-mono text-tech-data-md tracking-wider text-on-surface transition-all placeholder:text-outline-variant focus:outline-none focus:ring-1 focus:ring-primary focus:shadow-[0_0_16px_rgba(76,215,246,0.25)]">
                            <button class="absolute right-2.5 flex items-center justify-center rounded p-1 text-outline transition-colors hover:bg-surface-container-high hover:text-on-surface" id="toggle-pass-visibility" title="Alternar visibilidad de la clave" aria-label="Mostrar clave" type="button">
                                <span class="material-symbols-outlined text-[18px]" id="pass-icon" aria-hidden="true">visibility</span>
                            </button>
                        </div>
                        @error('password')
                            <p class="font-mono text-[10px] text-red-300" role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between gap-2 pt-1">
                        <label class="flex cursor-pointer select-none items-center gap-space-xs">
                            <input id="token-auth" name="remember" type="checkbox" value="1" @checked(old('remember', true)) class="peer sr-only">
                            <span class="flex h-4 w-4 items-center justify-center rounded bg-surface-container-lowest shadow-sm transition-colors peer-checked:bg-primary">
                                <span class="material-symbols-outlined text-[14px] font-bold text-surface-container-lowest opacity-0 transition-opacity peer-checked:opacity-100" aria-hidden="true">check</span>
                            </span>
                            <span class="font-body text-body-sm text-on-surface-variant peer-checked:text-on-surface">Recordar estación de trabajo autorizada</span>
                        </label>
                        <span class="hidden shrink-0 font-mono text-tech-data-sm text-outline sm:inline-block">HW_TOKEN: PASS</span>
                    </div>

                    <button class="mt-2 flex h-11 w-full items-center justify-center gap-2 rounded-lg bg-primary-container font-display text-headline-sm font-semibold text-on-primary-fixed shadow-[0_0_20px_rgba(6,182,212,0.35)] transition-all hover:bg-primary hover:shadow-[0_0_28px_rgba(6,182,212,0.6)] active:scale-[0.99]" type="submit">
                        <span class="material-symbols-outlined text-[20px]" aria-hidden="true">login</span>
                        <span>Iniciar Sesión en Bóveda</span>
                    </button>
                </form>

                <div class="relative my-1 flex items-center justify-center">
                    <div class="h-px w-full bg-surface-variant"></div>
                    <span class="absolute max-w-[92%] bg-surface-container px-3 text-center font-mono text-[8px] uppercase leading-3 tracking-wider text-outline sm:whitespace-nowrap sm:text-label-caps">
                        O AUTENTICACIÓN FEDERADA (CAD CLOUD / SSO ENTERPRISE)
                    </span>
                </div>

                <div class="grid grid-cols-2 gap-space-sm">
                    <button class="group flex h-10 items-center justify-center gap-2 rounded-lg bg-surface-container-lowest px-2 text-on-surface transition-colors hover:bg-surface-container-high" type="button" disabled title="Próximamente" aria-label="Autodesk SSO, próximamente">
                        <span class="material-symbols-outlined text-[18px] text-primary transition-transform group-hover:scale-110" aria-hidden="true">deployed_code</span>
                        <span class="font-mono text-[10px] font-medium sm:text-tech-data-sm">Autodesk SSO</span>
                    </button>
                    <button class="group flex h-10 items-center justify-center gap-2 rounded-lg bg-surface-container-lowest px-2 text-on-surface transition-colors hover:bg-surface-container-high" type="button" disabled title="Próximamente" aria-label="Siemens NX ID, próximamente">
                        <span class="material-symbols-outlined text-[18px] text-secondary transition-transform group-hover:scale-110" aria-hidden="true">precision_manufacturing</span>
                        <span class="font-mono text-[10px] font-medium sm:text-tech-data-sm">Siemens NX ID</span>
                    </button>
                </div>

                <div class="pt-2 text-center">
                    <p class="font-body text-body-sm text-outline">
                        ¿No dispone de credenciales autorizadas?
                        <a href="{{ route('register') }}" class="ml-1 inline-flex items-center gap-0.5 font-semibold text-primary">Regístrese aquí
                            <span class="material-symbols-outlined text-[14px]" aria-hidden="true">arrow_forward</span>
                        </a>
                    </p>
                </div>

                <div class="-mx-space-md -mb-space-md mt-space-xs flex items-center justify-between gap-2 rounded-b-2xl bg-surface-container-lowest/60 px-space-md pb-space-md pt-space-sm sm:-mx-space-xl sm:-mb-space-xl sm:px-space-xl">
                    <div class="flex items-center gap-1.5 font-mono text-[9px] text-outline sm:text-tech-data-sm">
                        <span class="h-1.5 w-1.5 rounded-full bg-tertiary"></span>
                        <span>TLS 1.3 ENCRYPTED</span>
                    </div>
                    <div class="text-right font-mono text-[9px] tracking-wider text-outline sm:text-tech-data-sm">CERT. FDM/SLA ISO 9001</div>
                </div>
            </section>

            <div class="mt-6 flex w-full max-w-4xl items-center justify-between gap-4 px-2 font-mono text-[9px] text-outline opacity-50 sm:px-4 sm:text-tech-data-sm" aria-hidden="true">
                <div>BUILD_MATRIX // [320 × 320 × 400 mm]</div>
                <div class="text-right">LATENCY: 12ms // STATUS: SYNCHRONIZED</div>
            </div>
        </div>
    </main>
@endsection
