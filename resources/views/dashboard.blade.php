@extends('layouts.app')

@section('title', 'Dashboard de Creador | 3Dtienda')

@section('content')
    <div class="min-h-screen bg-surface font-body text-[14px] leading-[22px] text-on-surface">
        <aside class="fixed inset-y-0 left-0 z-40 hidden w-64 flex-col justify-between border-r border-outline-variant/30 bg-surface-container-lowest/90 py-4 backdrop-blur-xl lg:flex">
            <div class="flex flex-col gap-space-lg">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-space-sm px-space-md" aria-label="SYNTH3D Vault OS, Dashboard">
                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary-container/15 text-primary">
                        <span class="material-symbols-outlined">deployed_code</span>
                    </span>
                    <span class="flex flex-col">
                        <span class="font-display text-headline-sm font-bold leading-none tracking-tight">SYNTH3D</span>
                        <span class="font-mono text-label-caps tracking-widest text-primary">VAULT // OS</span>
                    </span>
                </a>

                <nav class="flex flex-col gap-0.5 px-space-sm" aria-label="Navegación principal">
                    <span class="px-space-sm py-1 font-mono text-label-caps uppercase text-outline">Workspace</span>
                    <a aria-current="page" href="{{ route('dashboard') }}" class="flex items-center gap-space-sm rounded-lg bg-primary-container px-space-sm py-2 font-semibold text-[#00424f] shadow-[0_0_16px_rgba(6,182,212,0.3)]">
                        <span class="material-symbols-outlined text-primary">account_circle</span>
                        Dashboard Creador
                    </a>
                    <a href="#disenos" class="flex items-center gap-space-sm rounded-lg px-space-sm py-2 text-body-sm text-on-surface-variant transition-all hover:bg-surface-container-high hover:text-on-surface">
                        <span class="material-symbols-outlined">view_in_ar</span>Explorar Modelos
                    </a>
                    <a href="#actividad" class="flex items-center gap-space-sm rounded-lg px-space-sm py-2 text-body-sm text-on-surface-variant transition-all hover:bg-surface-container-high hover:text-on-surface">
                        <span class="material-symbols-outlined">folder_zip</span>Bóveda Digital
                    </a>
                    <a href="#actividad" class="flex items-center gap-space-sm rounded-lg px-space-sm py-2 text-body-sm text-on-surface-variant transition-all hover:bg-surface-container-high hover:text-on-surface">
                        <span class="material-symbols-outlined">precision_manufacturing</span>Cola de Impresión
                    </a>
                    <span class="px-space-sm pb-1 pt-space-sm font-mono text-label-caps uppercase text-outline">Gobernanza</span>
                    <a href="#actividad" class="flex items-center gap-space-sm rounded-lg px-space-sm py-2 text-body-sm text-on-surface-variant transition-all hover:bg-surface-container-high hover:text-on-surface">
                        <span class="material-symbols-outlined">verified</span>Licencias &amp; SLA
                    </a>
                    <a href="#actividad" class="flex items-center gap-space-sm rounded-lg px-space-sm py-2 text-body-sm text-on-surface-variant transition-all hover:bg-surface-container-high hover:text-on-surface">
                        <span class="material-symbols-outlined">terminal</span>Documentación
                    </a>
                </nav>
            </div>

            <div class="mx-space-md rounded-lg bg-surface-container-low p-space-sm">
                <div class="mb-1 flex items-center justify-between font-mono text-label-caps uppercase text-outline">
                    <span>Red aditiva</span><span class="text-tertiary">1.4 GB/s</span>
                </div>
                <div class="h-1.5 overflow-hidden rounded-full bg-surface-variant">
                    <div class="h-full w-3/4 rounded-full bg-primary-container"></div>
                </div>
                <div class="mt-2 flex items-center justify-between font-mono text-tech-data-sm text-outline">
                    <span>Tráfico mensual: 428 GB</span><span class="text-tertiary">Top 3% Red Global</span>
                </div>
            </div>
        </aside>

        <div class="min-h-screen lg:pl-64">
            <nav class="sticky top-0 z-30 flex items-center justify-between border-b border-outline-variant/20 bg-surface-container-lowest/95 px-space-md py-space-sm backdrop-blur-xl lg:hidden" aria-label="Navegación móvil">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-space-xs font-display font-bold tracking-tight">
                    <span class="material-symbols-outlined text-primary">deployed_code</span>SYNTH3D
                </a>
                <div class="flex items-center gap-space-xs">
                    <a href="#disenos" class="rounded-lg p-2 text-on-surface-variant hover:bg-surface-container-high" aria-label="Diseños"><span class="material-symbols-outlined">view_in_ar</span></a>
                    <a href="#actividad" class="rounded-lg p-2 text-on-surface-variant hover:bg-surface-container-high" aria-label="Actividad"><span class="material-symbols-outlined">history</span></a>
                    <span class="rounded-lg bg-surface-container-high p-2 text-primary" aria-label="Perfil"><span class="material-symbols-outlined">account_circle</span></span>
                </div>
            </nav>

            <main class="relative min-h-screen overflow-hidden px-space-md pb-36 pt-space-lg sm:px-space-lg lg:px-space-xl">
                <div class="pointer-events-none absolute -right-24 -top-32 h-96 w-96 rounded-full bg-primary-container/10 blur-3xl"></div>
                <div class="pointer-events-none absolute -left-20 top-1/2 h-80 w-80 rounded-full bg-secondary-container/15 blur-3xl"></div>

                <div class="relative mx-auto flex max-w-[1600px] flex-col gap-space-lg">
                    <header class="relative z-10 flex flex-col justify-between gap-space-md pb-space-sm xl:flex-row xl:items-end">
                        <div class="flex max-w-2xl flex-col gap-space-xs">
                            <div class="flex items-center gap-space-xs">
                                <span class="h-2 w-2 animate-pulse rounded-full bg-primary"></span>
                                <span class="font-mono text-label-caps uppercase tracking-widest text-primary">Nodo de Identidad: 0x8F92 • Creador Master</span>
                            </div>
                            <h1 class="font-display text-[28px] font-bold leading-tight tracking-tight text-on-surface sm:text-headline-lg">Hola, {{ auth()->user()->name }}</h1>
                            <p class="text-body-lg text-on-surface-variant">Monitor técnico de fabricación aditiva y rendimiento de bóveda digital.</p>
                        </div>
                        <div class="flex w-fit flex-wrap items-center gap-space-md rounded-lg bg-surface-container/70 px-space-md py-space-sm shadow-sm backdrop-blur-md">
                            <div class="flex flex-col">
                                <span class="font-mono text-label-caps uppercase text-outline">Nodo de Enlace</span>
                                <span class="font-mono text-tech-data-sm text-on-surface">SYNTH-CLUSTER-EU-09</span>
                            </div>
                            <div class="h-6 w-px bg-surface-variant"></div>
                            <div class="flex flex-col">
                                <span class="font-mono text-label-caps uppercase text-outline">Firma Digital</span>
                                <span class="font-mono text-tech-data-sm text-tertiary">ECDSA_SECP256K1_OK</span>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="flex h-9 items-center gap-1.5 rounded-lg bg-surface-container-high px-space-sm font-body text-body-sm font-semibold text-on-surface transition-all hover:bg-surface-variant" type="submit">
                                    <span class="material-symbols-outlined text-tech-data-md text-outline">logout</span>
                                    <span>Cerrar sesión</span>
                                </button>
                            </form>
                            <a class="flex h-9 items-center gap-1.5 rounded-lg bg-surface-container-high px-space-sm font-body text-body-sm font-semibold text-primary transition-all hover:bg-surface-variant" href="{{ route('profile.edit') }}">
                                <span class="material-symbols-outlined text-tech-data-md">manage_accounts</span>
                                <span>Editar perfil</span>
                            </a>
                        </div>
                    </header>

                    <section class="relative z-10 grid grid-cols-1 gap-space-md md:grid-cols-3" aria-label="Estadísticas de cuenta">
                        <article class="group relative flex flex-col justify-between overflow-hidden rounded-xl bg-surface-container/80 p-space-lg shadow-md backdrop-blur-md transition-all hover:bg-surface-container">
                            <div class="absolute left-0 right-0 top-0 h-0.5 bg-gradient-to-r from-transparent via-primary-container/40 to-transparent"></div>
                            <div class="flex items-center justify-between gap-2 pb-space-sm">
                                <span class="font-mono text-label-caps uppercase tracking-wider text-outline">Diseños Subidos</span>
                                <span class="inline-flex items-center gap-1 rounded-full bg-tertiary/10 px-2 py-0.5 font-mono text-label-caps text-tertiary">
                                    <span class="material-symbols-outlined text-tech-data-sm">trending_up</span>+4 este mes
                                </span>
                            </div>
                            <div class="pt-space-xs">
                                <div class="flex items-baseline gap-space-xs">
                                    <span class="font-display text-[40px] font-bold leading-tight text-on-surface">48</span>
                                    <span class="font-mono text-tech-data-md uppercase text-on-surface-variant">Modelos</span>
                                </div>
                                <div class="mt-space-md flex flex-wrap items-center justify-between gap-2 border-t border-surface-variant/50 pt-space-xs font-mono text-tech-data-sm text-outline">
                                    <span>Malla activa: 3.2M polígonos</span><span class="font-mono text-label-caps text-primary">100% SLA Validado</span>
                                </div>
                            </div>
                        </article>

                        <article class="group relative flex flex-col justify-between overflow-hidden rounded-xl bg-surface-container/80 p-space-lg shadow-md backdrop-blur-md transition-all hover:bg-surface-container">
                            <div class="absolute left-0 right-0 top-0 h-0.5 bg-gradient-to-r from-transparent via-secondary/40 to-transparent"></div>
                            <div class="flex items-center justify-between gap-2 pb-space-sm">
                                <span class="font-mono text-label-caps uppercase tracking-wider text-outline">Descargas Totales</span>
                                <span class="rounded-full bg-secondary-container/30 px-2 py-0.5 font-mono text-label-caps text-secondary">STL RATE: 94.2%</span>
                            </div>
                            <div class="pt-space-xs">
                                <div class="flex items-baseline gap-space-xs">
                                    <span class="font-display text-[40px] font-bold leading-tight text-on-surface">12,840</span>
                                    <span class="font-mono text-tech-data-md uppercase text-on-surface-variant">Descargas</span>
                                </div>
                                <div class="mt-space-md flex flex-wrap items-center justify-between gap-2 border-t border-surface-variant/50 pt-space-xs font-mono text-tech-data-sm text-outline">
                                    <span>Tráfico mensual: 428 GB</span><span class="font-mono text-label-caps text-tertiary">Top 3% Red Global</span>
                                </div>
                            </div>
                        </article>

                        <article class="group relative flex flex-col justify-between overflow-hidden rounded-xl bg-surface-container/80 p-space-lg shadow-md backdrop-blur-md transition-all hover:bg-surface-container">
                            <div class="absolute left-0 right-0 top-0 h-0.5 bg-gradient-to-r from-transparent via-tertiary/40 to-transparent"></div>
                            <div class="flex items-center justify-between gap-2 pb-space-sm">
                                <span class="font-mono text-label-caps uppercase tracking-wider text-outline">Saldo de Cuenta</span>
                                <button class="flex h-6 items-center gap-1 rounded-full bg-surface-container-high px-2.5 font-mono text-label-caps uppercase text-primary shadow-sm transition-all hover:bg-surface-variant" type="button">
                                    <span class="material-symbols-outlined text-tech-data-sm">payments</span>Retirar fondos
                                </button>
                            </div>
                            <div class="pt-space-xs">
                                <div class="flex flex-wrap items-baseline gap-space-xs">
                                    <span class="font-display text-[32px] font-bold leading-tight text-on-surface sm:text-[40px]">8,450.00</span>
                                    <span class="font-mono text-tech-data-sm font-bold text-primary">USDT</span>
                                    <span class="ml-1 font-mono text-tech-data-md text-outline">/ 3,420 CR</span>
                                </div>
                                <div class="mt-space-md flex flex-wrap items-center justify-between gap-2 border-t border-surface-variant/50 pt-space-xs font-mono text-tech-data-sm text-outline">
                                    <span>Liquidación auto: Cada 15 días</span><span class="text-on-surface-variant">Escrow OK</span>
                                </div>
                            </div>
                        </article>
                    </section>

                    <section id="disenos" class="relative z-10 flex scroll-mt-20 flex-col gap-space-md">
                        <div class="flex flex-wrap items-center justify-between gap-2">
                            <div class="flex items-center gap-space-sm">
                                <span class="material-symbols-outlined text-headline-sm text-primary">diamond</span>
                                <h2 class="font-display text-headline-md font-bold tracking-tight text-on-surface">Mis Diseños Destacados</h2>
                            </div>
                            <a class="flex items-center gap-1 font-mono text-label-caps uppercase text-primary transition-colors hover:text-secondary" href="#actividad">
                                Ver Catálogo Completo (48)<span class="material-symbols-outlined text-tech-data-sm">arrow_forward</span>
                            </a>
                        </div>

                        <div class="grid grid-cols-1 gap-space-lg md:grid-cols-2 xl:grid-cols-3">
                            <article class="group flex flex-col gap-space-md rounded-xl bg-surface-container/70 p-space-md shadow-md backdrop-blur-md transition-all hover:bg-surface-container hover:shadow-xl">
                                <div class="relative flex aspect-square w-full items-center justify-center overflow-hidden rounded-lg bg-surface-container-lowest">
                                    <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBAsplzVy94QuRkTXz1s6Ofc3glTzEIn0uchhzrkEWauLcAIjSWBeJfsGmJ0PfMC3--kzoe1z2tC_9jOyHYQGqvNnzaRpwDNcfoCrAmyl4sMfWpbo5OzxIvj3UWLbGUk2N6tno899ri_QQXMaTonlGAPQD7Q-vqRZkqFXkE0l7_YuDXAhNl5pAOppnyok5OgwQHm78Tx6ee7ZbTEZYht_CYqhbxfGRDz26W9LMA_EbEMcasBUMWL6VtyA" alt="Representación CAD del Giroscopio Cuántico Core-X">
                                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-surface-container-lowest/90 via-transparent to-transparent"></div>
                                    <span class="absolute left-3 top-3 flex items-center gap-1.5 rounded-full bg-secondary-container/80 px-2.5 py-1 font-mono text-label-caps font-bold tracking-wider text-secondary">
                                        <span class="h-1.5 w-1.5 rounded-full bg-secondary"></span>STL
                                    </span>
                                    <span class="absolute right-3 top-3 rounded bg-surface-container-lowest/80 px-2 py-0.5 font-mono text-tech-data-sm text-outline">v2.4</span>
                                </div>
                                <div class="flex flex-col gap-space-xs">
                                    <div class="flex items-start justify-between gap-2">
                                        <h3 class="font-display text-headline-sm font-semibold text-on-surface transition-colors group-hover:text-primary">Giroscopio Cuántico Core-X</h3>
                                        <span class="whitespace-nowrap font-mono text-tech-data-lg font-bold text-primary">$24.00 <span class="text-tech-data-sm text-outline">USD</span></span>
                                    </div>
                                    <p class="flex flex-wrap items-center gap-space-xs pt-1 font-mono text-tech-data-sm text-on-surface-variant">
                                        <span>142k tris</span><span class="text-surface-variant">•</span><span>OBJ</span><span class="text-surface-variant">•</span><span class="text-secondary">Licencia Comercial</span>
                                    </p>
                                </div>
                                <div class="mt-auto flex items-center justify-between rounded-lg bg-surface-container-lowest/50 p-space-xs pt-space-xs">
                                    <div class="flex items-center gap-1 font-mono text-tech-data-sm text-outline"><span class="material-symbols-outlined text-tech-data-sm text-tertiary">check_circle</span>SLA Ready</div>
                                    <div class="flex items-center gap-1">
                                        <button aria-label="Previsualizar Giroscopio 3D" class="flex h-7 w-7 items-center justify-center rounded bg-surface-container-high text-on-surface transition-colors hover:bg-surface-variant" type="button"><span class="material-symbols-outlined text-tech-data-md">visibility</span></button>
                                        <button aria-label="Descargar Giroscopio" class="flex h-7 w-7 items-center justify-center rounded bg-primary-container text-[#00424f] transition-opacity hover:opacity-90" type="button"><span class="material-symbols-outlined text-tech-data-md">download</span></button>
                                    </div>
                                </div>
                            </article>

                            <article class="group flex flex-col gap-space-md rounded-xl bg-surface-container/70 p-space-md shadow-md backdrop-blur-md transition-all hover:bg-surface-container hover:shadow-xl">
                                <div class="relative flex aspect-square w-full items-center justify-center overflow-hidden rounded-lg bg-surface-container-lowest">
                                    <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCeDtM1mKv7TBIl1wmFQo9GoTXXg6hRdRqPNpFv4RyEvoisA4A_BJRSe64fjW98Ku2Tigfg71-8uKN_6Afm4sD-vPgBSK4mPbM22rk3hyVGPLwlHUvgTZYxZOYudDcbK6mcBxia2kCuolsc6rSZbF7zzpmostpZLYDCs1rMtCzqp1vcBLHFBpdhjFEU0STy7xZ3Np8n_0H-4X9AdyN0ZyJszfb6u6wkuh2aWeZGVDo2nDdsbUZrMBjNWg" alt="Carcasa de sensor óptico impresa en resina SLA">
                                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-surface-container-lowest/90 via-transparent to-transparent"></div>
                                    <span class="absolute left-3 top-3 flex items-center gap-1.5 rounded-full bg-primary-container/20 px-2.5 py-1 font-mono text-label-caps font-bold tracking-wider text-primary">
                                        <span class="h-1.5 w-1.5 rounded-full bg-primary"></span>Resina
                                    </span>
                                    <span class="absolute right-3 top-3 rounded bg-surface-container-lowest/80 px-2 py-0.5 font-mono text-tech-data-sm text-outline">CALIBRATED</span>
                                </div>
                                <div class="flex flex-col gap-space-xs">
                                    <div class="flex items-start justify-between gap-2">
                                        <h3 class="font-display text-headline-sm font-semibold text-on-surface transition-colors group-hover:text-primary">Carcasa Sensor Óptico SLA</h3>
                                        <div class="flex flex-col items-end">
                                            <span class="whitespace-nowrap font-mono text-tech-data-lg font-bold text-primary">$68.50 <span class="text-tech-data-sm text-outline">USD</span></span>
                                            <span class="font-mono text-label-caps uppercase text-tertiary">(Impreso)</span>
                                        </div>
                                    </div>
                                    <p class="flex flex-wrap items-center gap-space-xs pt-1 font-mono text-tech-data-sm text-on-surface-variant">
                                        <span>0.05mm</span><span class="text-surface-variant">•</span><span>45ml</span><span class="text-surface-variant">•</span><span class="text-primary">Tolerancia ±0.02mm</span>
                                    </p>
                                </div>
                                <div class="mt-auto flex items-center justify-between rounded-lg bg-surface-container-lowest/50 p-space-xs pt-space-xs">
                                    <div class="flex items-center gap-1 font-mono text-tech-data-sm text-outline"><span class="material-symbols-outlined text-tech-data-sm text-primary">verified_user</span>Formlabs Form 4L</div>
                                    <div class="flex items-center gap-1">
                                        <button aria-label="Previsualizar carcasa 3D" class="flex h-7 w-7 items-center justify-center rounded bg-surface-container-high text-on-surface transition-colors hover:bg-surface-variant" type="button"><span class="material-symbols-outlined text-tech-data-md">visibility</span></button>
                                        <button aria-label="Encargar carcasa" class="flex h-7 w-7 items-center justify-center rounded bg-primary-container text-[#00424f] transition-opacity hover:opacity-90" type="button"><span class="material-symbols-outlined text-tech-data-md">shopping_cart</span></button>
                                    </div>
                                </div>
                            </article>

                            <article class="group flex flex-col gap-space-md rounded-xl bg-surface-container/70 p-space-md shadow-md backdrop-blur-md transition-all hover:bg-surface-container hover:shadow-xl md:col-span-2 xl:col-span-1">
                                <div class="relative flex aspect-square w-full items-center justify-center overflow-hidden rounded-lg bg-surface-container-lowest">
                                    <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCFNA7Q1RoLxyOfOFrtCVIWDWxNFli2vjj2n78VqEVZ4DRgMeEHcbdJSB8N0-v1FXVIB9B4Eqyc-bV9_WmuGcVFcboy7RgfFFJaj5sofAwhUq_tvRUeWcyevBn8w4s6c10s5DCv9_KDmUrcS6id1MvzefYJ0hibUCo5DFPiFXbrAg4iOK7XE1URXPzsdEmFihS1wYc3HdhRKRy0g-g8OuNPHZ82MK_kCbPiZcVXz8Miv0mtZj3SPoX2vQ" alt="Eslabón actuador robótico reforzado con fibra de carbono">
                                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-surface-container-lowest/90 via-transparent to-transparent"></div>
                                    <span class="absolute left-3 top-3 flex items-center gap-1.5 rounded-full bg-surface-container-high/90 px-2.5 py-1 font-mono text-label-caps font-bold tracking-wider text-red-300">
                                        <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>PLA
                                    </span>
                                    <span class="absolute right-3 top-3 rounded bg-surface-container-lowest/80 px-2 py-0.5 font-mono text-tech-data-sm text-outline">CARBON-CF</span>
                                </div>
                                <div class="flex flex-col gap-space-xs">
                                    <div class="flex items-start justify-between gap-2">
                                        <h3 class="font-display text-headline-sm font-semibold text-on-surface transition-colors group-hover:text-primary">Eslabón Actuador Robótico MK-IV</h3>
                                        <span class="whitespace-nowrap font-mono text-tech-data-lg font-bold text-primary">$35.00 <span class="text-tech-data-sm text-outline">USD</span></span>
                                    </div>
                                    <p class="flex flex-wrap items-center gap-space-xs pt-1 font-mono text-tech-data-sm text-on-surface-variant">
                                        <span>0.2mm</span><span class="text-surface-variant">•</span><span>Infill 15%</span><span class="text-surface-variant">•</span><span class="text-secondary">Resistencia 45MPa</span>
                                    </p>
                                </div>
                                <div class="mt-auto flex items-center justify-between rounded-lg bg-surface-container-lowest/50 p-space-xs pt-space-xs">
                                    <div class="flex items-center gap-1 font-mono text-tech-data-sm text-outline"><span class="material-symbols-outlined text-tech-data-sm text-tertiary">tune</span>G-code Bambu X1C</div>
                                    <div class="flex items-center gap-1">
                                        <button aria-label="Previsualizar eslabón 3D" class="flex h-7 w-7 items-center justify-center rounded bg-surface-container-high text-on-surface transition-colors hover:bg-surface-variant" type="button"><span class="material-symbols-outlined text-tech-data-md">visibility</span></button>
                                        <button aria-label="Descargar eslabón" class="flex h-7 w-7 items-center justify-center rounded bg-primary-container text-[#00424f] transition-opacity hover:opacity-90" type="button"><span class="material-symbols-outlined text-tech-data-md">download</span></button>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </section>

                    <section id="actividad" class="relative z-10 mb-20 flex scroll-mt-20 flex-col gap-space-md">
                        <div class="flex flex-wrap items-center justify-between gap-2">
                            <div class="flex items-center gap-space-sm">
                                <span class="material-symbols-outlined text-headline-sm text-primary">history_toggle_off</span>
                                <h2 class="font-display text-headline-md font-bold tracking-tight text-on-surface">Actividad Reciente</h2>
                            </div>
                            <div class="flex items-center gap-space-xs">
                                <span class="hidden font-mono text-label-caps uppercase text-outline sm:inline">Ledger SHA-256 Sincronizado</span>
                                <span class="h-2 w-2 rounded-full bg-tertiary"></span>
                            </div>
                        </div>

                        <div class="w-full overflow-hidden rounded-xl bg-surface-container/70 shadow-md backdrop-blur-md">
                            <div class="overflow-x-auto">
                                <table class="w-full min-w-[780px] border-collapse text-left">
                                    <thead>
                                        <tr class="bg-surface-container-low font-mono text-label-caps uppercase tracking-wider text-outline">
                                            <th scope="col" class="px-space-lg py-space-md">ID Diseño</th>
                                            <th scope="col" class="px-space-md py-space-md">Tipo de Archivo</th>
                                            <th scope="col" class="px-space-md py-space-md">Estado</th>
                                            <th scope="col" class="px-space-md py-space-md">Fecha</th>
                                            <th scope="col" class="px-space-lg py-space-md text-right">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody class="font-mono text-tech-data-md">
                                        <tr class="transition-colors hover:bg-surface-container-high/50">
                                            <td class="px-space-lg py-space-md"><div class="flex items-center gap-2"><span class="material-symbols-outlined text-tech-data-md text-primary">tag</span><span class="font-bold text-on-surface">#MOD-9021</span></div></td>
                                            <td class="px-space-md py-space-md font-mono text-tech-data-sm text-on-surface-variant">STL / 3MF</td>
                                            <td class="px-space-md py-space-md"><span class="inline-flex items-center gap-1.5 rounded-full bg-tertiary/10 px-2.5 py-1 font-mono text-label-caps text-tertiary"><span class="h-1.5 w-1.5 rounded-full bg-tertiary"></span>Listo para descarga</span></td>
                                            <td class="px-space-md py-space-md font-mono text-tech-data-sm text-outline">18 May 2025 - 14:32</td>
                                            <td class="px-space-lg py-space-md text-right"><button class="inline-flex items-center gap-1 rounded-lg bg-surface-container-high px-3 py-1.5 font-mono text-label-caps uppercase text-on-surface shadow-sm transition-colors hover:bg-surface-variant" type="button"><span class="material-symbols-outlined text-tech-data-md text-primary">verified</span>Hash SHA-256</button></td>
                                        </tr>
                                        <tr class="bg-surface-container-low/40 transition-colors hover:bg-surface-container-high/50">
                                            <td class="px-space-lg py-space-md"><div class="flex items-center gap-2"><span class="material-symbols-outlined text-tech-data-md text-primary">tag</span><span class="font-bold text-on-surface">#MOD-8843</span></div></td>
                                            <td class="px-space-md py-space-md font-mono text-tech-data-sm text-on-surface-variant">Resina SLA 4K</td>
                                            <td class="px-space-md py-space-md"><div class="flex flex-col gap-1"><span class="inline-flex w-fit items-center gap-1.5 rounded-full bg-surface-variant px-2.5 py-1 font-mono text-label-caps text-secondary"><span class="h-1.5 w-1.5 animate-ping rounded-full bg-primary"></span>En producción</span><span class="font-mono text-tech-data-sm text-outline">Granja #03 • Capa 1420 / 2800 (50.7%)</span></div></td>
                                            <td class="px-space-md py-space-md font-mono text-tech-data-sm text-outline">18 May 2025 - 12:10</td>
                                            <td class="px-space-lg py-space-md text-right"><button class="inline-flex items-center gap-1 rounded-lg bg-surface-container-high px-3 py-1.5 font-mono text-label-caps uppercase text-on-surface shadow-sm transition-colors hover:bg-surface-variant" type="button"><span class="material-symbols-outlined text-tech-data-md text-tertiary">videocam</span>Cámara en Vivo</button></td>
                                        </tr>
                                        <tr class="transition-colors hover:bg-surface-container-high/50">
                                            <td class="px-space-lg py-space-md"><div class="flex items-center gap-2"><span class="material-symbols-outlined text-tech-data-md text-primary">tag</span><span class="font-bold text-on-surface">#MOD-8712</span></div></td>
                                            <td class="px-space-md py-space-md font-mono text-tech-data-sm text-on-surface-variant">PLA Industrial</td>
                                            <td class="px-space-md py-space-md"><span class="inline-flex items-center gap-1.5 rounded-full bg-tertiary/10 px-2.5 py-1 font-mono text-label-caps text-tertiary"><span class="h-1.5 w-1.5 rounded-full bg-tertiary"></span>Listo para descarga</span></td>
                                            <td class="px-space-md py-space-md font-mono text-tech-data-sm text-outline">17 May 2025 - 19:45</td>
                                            <td class="px-space-lg py-space-md text-right"><button class="inline-flex items-center gap-1 rounded-lg bg-surface-container-high px-3 py-1.5 font-mono text-label-caps uppercase text-on-surface shadow-sm transition-colors hover:bg-surface-variant" type="button"><span class="material-symbols-outlined text-tech-data-md text-primary">terminal</span>G-Code Verificado</button></td>
                                        </tr>
                                        <tr class="bg-surface-container-low/40 transition-colors hover:bg-surface-container-high/50">
                                            <td class="px-space-lg py-space-md"><div class="flex items-center gap-2"><span class="material-symbols-outlined text-tech-data-md text-primary">tag</span><span class="font-bold text-on-surface">#MOD-8605</span></div></td>
                                            <td class="px-space-md py-space-md font-mono text-tech-data-sm text-on-surface-variant">STEP / CAD Paramétrico</td>
                                            <td class="px-space-md py-space-md"><span class="inline-flex items-center gap-1.5 rounded-full bg-secondary-container/40 px-2.5 py-1 font-mono text-label-caps text-secondary"><span class="h-1.5 w-1.5 rounded-full bg-secondary"></span>Licencia Digital Validada</span></td>
                                            <td class="px-space-md py-space-md font-mono text-tech-data-sm text-outline">16 May 2025 - 09:15</td>
                                            <td class="px-space-lg py-space-md text-right"><button class="inline-flex items-center gap-1 rounded-lg bg-surface-container-high px-3 py-1.5 font-mono text-label-caps uppercase text-on-surface shadow-sm transition-colors hover:bg-surface-variant" type="button"><span class="material-symbols-outlined text-tech-data-md text-secondary">contract</span>Ver Smart Contract</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="fixed bottom-3 left-1/2 z-40 w-[calc(100%-1.5rem)] max-w-4xl -translate-x-1/2 sm:bottom-6 sm:w-11/12">
                    <div class="flex flex-col items-center justify-between gap-space-md rounded-xl bg-surface-container/95 px-space-md py-space-sm shadow-[0_12px_40px_rgba(0,0,0,0.7)] backdrop-blur-xl sm:flex-row sm:px-space-lg">
                        <div class="flex w-full items-center gap-space-sm text-left sm:w-auto">
                            <span class="relative flex h-2.5 w-2.5 shrink-0">
                                <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-tertiary opacity-75"></span>
                                <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-tertiary"></span>
                            </span>
                            <div class="flex min-w-0 flex-col">
                                <span class="font-mono text-label-caps font-semibold uppercase tracking-wide text-on-surface">Red Aditiva: 14 Nodos En Línea</span>
                                <span class="truncate font-mono text-tech-data-sm text-outline">Cola de Impresión: 3 trabajos asignados • Latencia 14ms</span>
                            </div>
                        </div>
                        <div class="flex w-full items-center justify-end gap-space-sm sm:w-auto">
                            <button class="flex h-10 items-center gap-space-xs rounded-lg bg-surface-container-high px-space-md font-body text-body-sm font-semibold transition-all hover:bg-surface-variant" type="button">
                                <span class="material-symbols-outlined text-outline">settings</span><span>Configurar Impresora</span>
                            </button>
                            <button class="flex h-10 items-center gap-space-xs rounded-lg bg-primary-container px-space-md font-body text-body-sm font-bold text-[#00424f] shadow-[0_0_20px_rgba(6,182,212,0.4)] transition-all hover:opacity-90" type="button">
                                <span class="material-symbols-outlined">add_circle</span><span>Subir Nuevo Diseño</span>
                            </button>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="flex items-center justify-between gap-3 border-t border-outline-variant/20 bg-surface-container-lowest px-space-md py-space-xs font-mono text-[9px] uppercase tracking-wide text-outline sm:px-space-lg sm:text-label-caps">
                <span>SYNTH3D PRECISION OS // 14ms LATENCY // STEP, STL, OBJ, 3MF VALIDATED</span>
                <span class="shrink-0">ISO/ASTM 52900 STANDARD</span>
            </footer>
        </div>
    </div>
@endsection
