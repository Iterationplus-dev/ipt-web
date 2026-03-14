<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IterationPlus — Building Digital Solutions That Scale</title>
    <meta name="description" content="Custom software, SaaS platforms, and enterprise systems — engineered for Nigerian businesses and built for global standards.">

    <link rel="icon" type="image/jpeg" href="https://res.cloudinary.com/dney6qnzd/image/upload/v1773487828/ipt-logo_wbxnpz.jpg">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body { margin: 0; font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif; color: #111; background: #fff; }

        /* ── NAV ── */
        .nav-link { font-size: 0.9rem; font-weight: 500; color: #111; text-decoration: none; transition: color .2s; }
        .nav-link:hover { color: #5BB741; }
        .nav-link.active { color: #5BB741; }

        /* ── HERO ── */
        #hero-canvas { position: absolute; inset: 0; width: 100%; height: 100%; }
        .hero-bg { background: #f4f4ef; }

        /* ── SECTION LABEL ── */
        .section-label { display: inline-block; width: 2.5rem; height: 3px; background: #5BB741; margin-bottom: 1rem; }

        /* ── TABS ── */
        .tab-btn { display: flex; align-items: center; gap: .5rem; padding: .5rem 0; font-size: .9rem; font-weight: 500; color: #666; border: none; background: none; cursor: pointer; border-bottom: 2px solid transparent; transition: all .2s; white-space: nowrap; }
        .tab-btn.active { color: #5BB741; border-bottom-color: #5BB741; }
        .tab-btn svg { flex-shrink: 0; }

        /* ── ACCORDION ── */
        .accordion-item { border-bottom: 1px solid #e5e5e5; }
        .accordion-btn { width: 100%; display: flex; align-items: center; gap: 1rem; padding: 1.25rem 0; background: none; border: none; cursor: pointer; text-align: left; }
        .accordion-num { font-size: .8rem; color: #999; width: 1.5rem; flex-shrink: 0; }
        .accordion-title { flex: 1; font-size: 1rem; font-weight: 600; color: #111; }
        .accordion-icon { flex-shrink: 0; color: #999; transition: transform .3s; }
        .accordion-icon.open { transform: rotate(45deg); color: #5BB741; }
        .accordion-body { overflow: hidden; transition: max-height .35s ease; }
        .accordion-body-inner { padding: 0 0 1.25rem 2.5rem; font-size: .9rem; color: #555; line-height: 1.7; }

        /* ── STAT CARD ── */
        .stat-num { font-size: 3rem; font-weight: 800; color: #5BB741; line-height: 1; }
        .stat-label { font-size: .8rem; color: #aaa; margin-top: .25rem; line-height: 1.4; }

        /* ── FEATURE CARD ── */
        .feature-card { display: flex; flex-direction: column; gap: .75rem; }
        .feature-icon { width: 2.5rem; height: 2.5rem; border-radius: 50%; background: #1a2a1a; display: flex; align-items: center; justify-content: center; }

        /* ── PORTFOLIO CARD ── */
        .portfolio-card { border-radius: 1rem; overflow: hidden; background: #f4f4ef; }
        .portfolio-browser { background: #1a1a1a; padding: .5rem .75rem; display: flex; align-items: center; gap: .4rem; }
        .browser-dot { width: .5rem; height: .5rem; border-radius: 50%; }
        .portfolio-screenshot { width: 100%; height: 220px; object-fit: cover; background: #2a3f5f; display: flex; align-items: center; justify-content: center; overflow: hidden; }

        /* ── BLOG CARD ── */
        .blog-tag { display: inline-block; font-size: .7rem; font-weight: 600; padding: .2rem .6rem; border-radius: 2rem; text-transform: uppercase; letter-spacing: .05em; }

        /* ── CTA BANNER ── */
        .cta-banner { background: #111; border-radius: 2rem; }

        /* ── FOOTER ── */
        footer { background: #0d0d0d; color: #888; }
        .footer-link { color: #888; text-decoration: none; font-size: .875rem; transition: color .2s; display: block; margin-bottom: .5rem; }
        .footer-link:hover { color: #5BB741; }
        .social-btn { width: 2rem; height: 2rem; border-radius: 50%; border: 1px solid #333; display: inline-flex; align-items: center; justify-content: center; color: #888; text-decoration: none; transition: all .2s; }
        .social-btn:hover { border-color: #5BB741; color: #5BB741; }

        /* ── MOBILE MENU ── */
        .mobile-menu { position: fixed; inset: 0; top: 0; background: #fff; z-index: 99; padding: 5rem 2rem 2rem; display: flex; flex-direction: column; gap: 1.5rem; transform: translateX(100%); transition: transform .3s ease; }
        .mobile-menu.open { transform: translateX(0); }

        /* ── UTILITIES ── */
        .container-xl { max-width: 1200px; margin: 0 auto; padding: 0 2rem; }
        @media (max-width: 768px) { .container-xl { padding: 0 1.25rem; } }

        .btn-primary { display: inline-flex; align-items: center; gap: .5rem; background: #5BB741; color: #fff; font-weight: 600; font-size: .9rem; padding: .75rem 1.5rem; border-radius: 2rem; border: none; cursor: pointer; text-decoration: none; transition: background .2s, transform .1s; }
        .btn-primary:hover { background: #4da336; transform: translateY(-1px); }
        .btn-outline { display: inline-flex; align-items: center; gap: .5rem; background: transparent; color: #111; font-weight: 600; font-size: .9rem; padding: .75rem 1.5rem; border-radius: 2rem; border: 2px solid #ccc; cursor: pointer; text-decoration: none; transition: all .2s; }
        .btn-outline:hover { border-color: #111; }

        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; }
        .grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; }
        .grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 2rem; }
        @media (max-width: 1024px) { .grid-4 { grid-template-columns: repeat(2, 1fr); } .grid-3 { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 640px) { .grid-2 { grid-template-columns: 1fr; } .grid-3 { grid-template-columns: 1fr; } .grid-4 { grid-template-columns: repeat(2, 1fr); } }

        /* scroll animations */
        .fade-up { opacity: 0; transform: translateY(30px); transition: opacity .6s ease, transform .6s ease; }
        .fade-up.visible { opacity: 1; transform: translateY(0); }
    </style>
</head>
<body x-data="{ mobileOpen: false }">

{{-- ══════════════════════════════════ NAVIGATION ══════════════════════════════════ --}}
<nav style="position: fixed; top: 0; left: 0; right: 0; z-index: 50; background: rgba(255,255,255,0.95); backdrop-filter: blur(12px); border-bottom: 1px solid rgba(0,0,0,0.06);">
    <div class="container-xl" style="display: flex; align-items: center; justify-content: space-between; height: 4.5rem;">

        {{-- Logo --}}
        <a href="/" style="text-decoration: none; display: flex; align-items: center; gap: .15rem;">
            <img src="https://res.cloudinary.com/dney6qnzd/image/upload/v1773487828/ipt-logo_wbxnpz.jpg" alt="IterationPlus Logo" width="38" height="38" style="border-radius: 6px; margin-right: .3rem; object-fit: cover;">
            <span style="font-weight: 800; font-size: 1.1rem; color: #111;">Iteration</span>
            <span style="font-weight: 800; font-size: 1.1rem; color: #5BB741;">Plus</span>
        </a>

        {{-- Desktop Nav --}}
        <div style="display: flex; align-items: center; gap: 2rem;" class="hidden-mobile">
            <a href="#" class="nav-link active">Home</a>
            <a href="#about" class="nav-link">About Us</a>
            <div style="position: relative;" x-data="{ open: false }" @mouseenter="open=true" @mouseleave="open=false">
                <a href="#services" class="nav-link" style="display: flex; align-items: center; gap: .25rem;">
                    Services
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                </a>
                <div x-show="open" x-transition style="display: none; position: absolute; top: 100%; left: 50%; transform: translateX(-50%); background: #fff; border-radius: .75rem; padding: .5rem; box-shadow: 0 10px 40px rgba(0,0,0,.12); border: 1px solid #f0f0f0; min-width: 200px; margin-top: .5rem;">
                    <a href="#" style="display: block; padding: .6rem 1rem; border-radius: .5rem; text-decoration: none; color: #111; font-size: .875rem; font-weight: 500; transition: background .15s;" onmouseover="this.style.background='#f4f4ef'" onmouseout="this.style.background=''">Software Development</a>
                    <a href="#" style="display: block; padding: .6rem 1rem; border-radius: .5rem; text-decoration: none; color: #111; font-size: .875rem; font-weight: 500; transition: background .15s;" onmouseover="this.style.background='#f4f4ef'" onmouseout="this.style.background=''">SaaS Platforms</a>
                    <a href="#" style="display: block; padding: .6rem 1rem; border-radius: .5rem; text-decoration: none; color: #111; font-size: .875rem; font-weight: 500; transition: background .15s;" onmouseover="this.style.background='#f4f4ef'" onmouseout="this.style.background=''">Mobile Apps</a>
                    <a href="#" style="display: block; padding: .6rem 1rem; border-radius: .5rem; text-decoration: none; color: #111; font-size: .875rem; font-weight: 500; transition: background .15s;" onmouseover="this.style.background='#f4f4ef'" onmouseout="this.style.background=''">Technical Consulting</a>
                </div>
            </div>
            <a href="#portfolio" class="nav-link">Portfolio</a>
            <a href="#blog" class="nav-link">Blog</a>
            <a href="#contact" class="nav-link">Contact</a>
        </div>

        {{-- CTA + Hamburger --}}
        <div style="display: flex; align-items: center; gap: 1rem;">
            <a href="#contact" class="btn-primary hidden-mobile" style="font-size: .85rem; padding: .6rem 1.25rem;">
                Let's Work Together
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <button @click="mobileOpen = !mobileOpen" style="background: none; border: none; cursor: pointer; padding: .25rem; display: none;" class="show-mobile" aria-label="Menu">
                <svg x-show="!mobileOpen" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#111" stroke-width="2"><path d="M3 12h18M3 6h18M3 18h18"/></svg>
                <svg x-show="mobileOpen" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#111" stroke-width="2"><path d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
        </div>
    </div>
</nav>

{{-- Mobile Menu --}}
<div class="mobile-menu" :class="{ 'open': mobileOpen }" @click.self="mobileOpen=false">
    <a href="#" class="nav-link" style="font-size: 1.1rem;" @click="mobileOpen=false">Home</a>
    <a href="#about" class="nav-link" style="font-size: 1.1rem;" @click="mobileOpen=false">About Us</a>
    <a href="#services" class="nav-link" style="font-size: 1.1rem;" @click="mobileOpen=false">Services</a>
    <a href="#portfolio" class="nav-link" style="font-size: 1.1rem;" @click="mobileOpen=false">Portfolio</a>
    <a href="#blog" class="nav-link" style="font-size: 1.1rem;" @click="mobileOpen=false">Blog</a>
    <a href="#contact" class="nav-link" style="font-size: 1.1rem;" @click="mobileOpen=false">Contact</a>
    <a href="#contact" class="btn-primary" @click="mobileOpen=false">Let's Work Together →</a>
</div>

<style>
    @media (max-width: 900px) { .hidden-mobile { display: none !important; } .show-mobile { display: flex !important; } }
</style>

{{-- ══════════════════════════════════ HERO ══════════════════════════════════ --}}
<section class="hero-bg" style="position: relative; min-height: 100vh; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 8rem 2rem 4rem; text-align: center; overflow: hidden;">
    <canvas id="hero-canvas"></canvas>

    <div style="position: relative; z-index: 2; max-width: 820px; margin: 0 auto;">
        <div class="fade-up" style="margin-bottom: .75rem;">
            <span style="display: inline-flex; align-items: center; gap: .5rem; background: rgba(91,183,65,.12); color: #4a9833; font-size: .8rem; font-weight: 600; padding: .35rem 1rem; border-radius: 2rem; border: 1px solid rgba(91,183,65,.25); text-transform: uppercase; letter-spacing: .08em;">
                <span style="width: .4rem; height: .4rem; border-radius: 50%; background: #5BB741; display: inline-block;"></span>
                Software & Technology Company
            </span>
        </div>

        <h1 class="fade-up" style="font-size: clamp(2.5rem, 6vw, 5rem); font-weight: 900; line-height: 1.05; margin: 0 0 1.25rem; letter-spacing: -.02em;">
            <span style="color: #111; display: block;">Building Digital</span>
            <span style="color: #5BB741; display: block;">Solutions That</span>
            <span style="color: #5BB741; display: block;">Scale.</span>
        </h1>

        <p class="fade-up" style="font-size: clamp(.95rem, 2vw, 1.15rem); color: #555; max-width: 560px; margin: 0 auto 2.5rem; line-height: 1.7;">
            Custom software, SaaS platforms, and enterprise systems — engineered for Nigerian businesses and built for global standards.
        </p>

        <div class="fade-up" style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="#portfolio" class="btn-outline" style="font-size: .95rem; padding: .8rem 1.75rem;">See Our Work</a>
            <a href="#contact" class="btn-primary" style="font-size: .95rem; padding: .8rem 1.75rem; background: #111; border: 2px solid #111;">
                Get In Touch
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div style="position: absolute; bottom: 2rem; left: 50%; transform: translateX(-50%); display: flex; flex-direction: column; align-items: center; gap: .5rem;">
        <span style="font-size: .75rem; color: #999; letter-spacing: .1em; text-transform: uppercase;">Scroll</span>
        <div style="width: 1px; height: 2.5rem; background: linear-gradient(to bottom, #999, transparent);"></div>
    </div>
</section>

{{-- ══════════════════════════════════ TRUSTED BY ══════════════════════════════════ --}}
<section style="padding: 2.5rem 0; border-top: 1px solid #f0f0f0; border-bottom: 1px solid #f0f0f0; background: #fafafa;">
    <div class="container-xl">
        <div style="display: flex; align-items: center; gap: 3rem; flex-wrap: wrap; justify-content: center;">
            <span style="font-size: .8rem; font-weight: 600; color: #999; text-transform: uppercase; letter-spacing: .1em; white-space: nowrap;">Trusted across Industries</span>
            @foreach(['HealthConnect', 'EduNigeria', 'AgriTech NG', 'FinEdge', 'LogiCore'] as $client)
            <div style="display: flex; align-items: center; gap: .5rem; opacity: .5; filter: grayscale(1); transition: opacity .2s;" onmouseover="this.style.opacity='.9';this.style.filter='none'" onmouseout="this.style.opacity='.5';this.style.filter='grayscale(1)'">
                <div style="width: 1.5rem; height: 1.5rem; background: #ddd; border-radius: 4px;"></div>
                <span style="font-size: .875rem; font-weight: 600; color: #555;">{{ $client }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════════ WHAT WE DO ══════════════════════════════════ --}}
<section id="services" style="padding: 6rem 0;" x-data="{
    activeTab: 'plan',
    tabs: [
        { id: 'plan', label: 'Plan', icon: 'plan' },
        { id: 'design', label: 'Design', icon: 'design' },
        { id: 'build', label: 'Build', icon: 'build' },
        { id: 'integrate', label: 'Integrate', icon: 'integrate' }
    ],
    items: {
        plan: [
            { title: 'Technical Consulting', body: 'Strategic technology advisory for your digital transformation journey. We help you make informed decisions about architecture, tooling, and team structure.' },
            { title: 'Requirement Analysis', body: 'Comprehensive analysis to define project scope and deliverables. We work closely with your team to capture every need and translate it into actionable specifications.' },
            { title: 'System Architecture', body: 'Designing scalable, secure system architectures for enterprise needs. From microservices to monoliths, we choose the right approach for your scale.' },
            { title: 'Discovery', body: 'Deep-dive workshops to uncover business goals, user needs, and technical constraints — setting a solid foundation before a single line of code is written.' }
        ],
        design: [
            { title: 'UI/UX Design', body: 'Beautiful, intuitive interfaces crafted around your users. Every pixel is intentional — from wireframes to high-fidelity prototypes.' },
            { title: 'Design Systems', body: 'Scalable component libraries that keep your product consistent as it grows. Built for developers and designers to collaborate effectively.' },
            { title: 'Brand Identity', body: 'Visual identities that communicate your values and stand out in the market. Logos, color systems, typography, and brand guidelines.' },
            { title: 'Prototyping', body: 'Interactive prototypes that let you test ideas before committing to development — saving time and money by validating early.' }
        ],
        build: [
            { title: 'Custom Software', body: 'End-to-end development of tailored software solutions using modern, battle-tested technologies. Built to last and easy to extend.' },
            { title: 'SaaS Platforms', body: 'Multi-tenant SaaS products with subscription management, analytics dashboards, and the infrastructure to support thousands of users.' },
            { title: 'Mobile Apps', body: 'Cross-platform iOS and Android applications built with React Native or Flutter — one codebase, native performance.' },
            { title: 'Web Applications', body: 'Fast, accessible web applications built with Laravel, React, and Vue. Optimized for performance and SEO from day one.' }
        ],
        integrate: [
            { title: 'API Integrations', body: 'Seamlessly connect your product to third-party services — payment gateways, CRMs, ERPs, and communication platforms.' },
            { title: 'Domain Hosting', body: 'Reliable, secure hosting and infrastructure management. We handle deployments, uptime monitoring, and scaling so you can focus on growth.' },
            { title: 'Technical Consulting', body: 'Ongoing advisory support to keep your technology stack modern, secure, and aligned with your business goals.' },
            { title: 'Data Migration', body: 'Safe, validated migration of data from legacy systems to modern platforms — with zero data loss and minimal downtime.' }
        ]
    },
    openItem: 0
}">
    <div class="container-xl">
        <div class="fade-up" style="margin-bottom: 3rem;">
            <div class="section-label"></div>
            <h2 style="font-size: clamp(1.75rem, 4vw, 2.75rem); font-weight: 800; letter-spacing: -.02em; margin: 0;">What We Do</h2>
        </div>

        {{-- Tabs --}}
        <div style="display: flex; gap: 2rem; border-bottom: 1px solid #e5e5e5; margin-bottom: 2.5rem; overflow-x: auto; -webkit-overflow-scrolling: touch;" class="fade-up">
            <template x-for="tab in tabs" :key="tab.id">
                <button
                    class="tab-btn"
                    :class="{ active: activeTab === tab.id }"
                    @click="activeTab = tab.id; openItem = 0"
                >
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <template x-if="tab.icon === 'plan'"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></template>
                        <template x-if="tab.icon === 'design'"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></template>
                        <template x-if="tab.icon === 'build'"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/></template>
                        <template x-if="tab.icon === 'integrate'"><path d="M4 4h6v6H4zM14 4h6v6h-6zM4 14h6v6H4zM14 17h6M17 14v6"/></template>
                    </svg>
                    <span x-text="tab.label"></span>
                </button>
            </template>
        </div>

        {{-- Accordion --}}
        <div class="fade-up" style="max-width: 780px;">
            <template x-for="(item, idx) in items[activeTab]" :key="activeTab + idx">
                <div class="accordion-item">
                    <button class="accordion-btn" @click="openItem = openItem === idx ? -1 : idx">
                        <span class="accordion-num" x-text="String(idx + 1).padStart(2, '0')"></span>
                        <span class="accordion-title" x-text="item.title"></span>
                        <svg class="accordion-icon" :class="{ open: openItem === idx }" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 5v14M5 12h14"/>
                        </svg>
                    </button>
                    <div class="accordion-body" :style="openItem === idx ? 'max-height: 200px' : 'max-height: 0'">
                        <div class="accordion-body-inner" x-text="item.body"></div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════ WHY ITERATIONPLUS ══════════════════════════════════ --}}
<section id="about" style="background: #111; padding: 6rem 0;">
    <div class="container-xl">
        <div class="fade-up" style="margin-bottom: 4rem;">
            <div style="display: inline-block; width: 2.5rem; height: 3px; background: #5BB741; margin-bottom: 1rem;"></div>
            <h2 style="font-size: clamp(1.75rem, 4vw, 2.75rem); font-weight: 800; color: #fff; letter-spacing: -.02em; margin: 0;">Why IterationPlus</h2>
        </div>

        {{-- Stats --}}
        <div class="grid-4 fade-up" style="margin-bottom: 5rem;">
            @foreach([
                ['10+', 'Years of Experience'],
                ['5+', 'Projects Delivered'],
                ['5+', 'Five Sectors Covered'],
                ['100%', 'Nigerian Owned'],
            ] as [$num, $label])
            <div style="text-align: center; padding: 1.5rem; border-left: 1px solid #222;">
                <div class="stat-num">{{ $num }}</div>
                <div class="stat-label">{{ $label }}</div>
            </div>
            @endforeach
        </div>

        {{-- Feature cards --}}
        <div class="grid-4 fade-up">
            @foreach([
                ['M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z', 'Security-First', 'Enterprise-grade security practices baked into every solution we build.'],
                ['M13 2L3 14h9l-1 8 10-12h-9l1-8z', 'Scalable by Design', 'Architectures that grow with your business, from startup to enterprise.'],
                ['M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75', 'Client-Centred', 'Every decision starts with understanding your users and your goals.'],
                ['M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.8 19.79 19.79 0 01.01 1.18 2 2 0 012 .01h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92v2z', 'Post-Delivery Support', 'Ongoing maintenance, monitoring, and technical consulting after launch.'],
            ] as [$icon, $title, $desc])
            <div class="feature-card">
                <div class="feature-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#5BB741" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="{{ $icon }}"/>
                    </svg>
                </div>
                <h3 style="font-size: 1rem; font-weight: 700; color: #fff; margin: 0;">{{ $title }}</h3>
                <p style="font-size: .875rem; color: #666; line-height: 1.6; margin: 0;">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════════ WORK THAT SPEAKS ══════════════════════════════════ --}}
<section id="portfolio" style="padding: 6rem 0;">
    <div class="container-xl">
        <div class="fade-up" style="display: flex; align-items: flex-end; justify-content: space-between; margin-bottom: 3rem; flex-wrap: wrap; gap: 1rem;">
            <div>
                <div class="section-label"></div>
                <h2 style="font-size: clamp(1.75rem, 4vw, 2.75rem); font-weight: 800; letter-spacing: -.02em; margin: 0;">Work That Speaks</h2>
            </div>
            <a href="#" style="font-size: .875rem; font-weight: 600; color: #5BB741; text-decoration: none; display: flex; align-items: center; gap: .3rem;">
                See All Projects
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid-2 fade-up">
            @foreach([
                [
                    'Global Institute of Planning and Development',
                    'Patient management and telemedicine for hospitals across Rivers State',
                    '#2563EB',
                    '#1e40af',
                    'Education / EdTech',
                ],
                [
                    'HealthConnect Platform',
                    'Patient management and telemedicine for hospitals across Rivers State',
                    '#059669',
                    '#065f46',
                    'Healthcare / HealthTech',
                ],
            ] as [$name, $desc, $bg1, $bg2, $tag])
            <div class="portfolio-card fade-up" style="box-shadow: 0 4px 30px rgba(0,0,0,.08); transition: transform .3s, box-shadow .3s;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 16px 48px rgba(0,0,0,.14)'" onmouseout="this.style.transform='';this.style.boxShadow='0 4px 30px rgba(0,0,0,.08)'">
                {{-- Browser chrome --}}
                <div class="portfolio-browser">
                    <div class="browser-dot" style="background: #ff5f57;"></div>
                    <div class="browser-dot" style="background: #febc2e;"></div>
                    <div class="browser-dot" style="background: #28c840;"></div>
                    <div style="flex: 1; background: #333; border-radius: 3px; height: 1.2rem; margin-left: .75rem; display: flex; align-items: center; padding: 0 .5rem;">
                        <span style="font-size: .65rem; color: #888; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">https://{{ strtolower(str_replace(' ', '', explode(' ', $name)[0])) }}.ng</span>
                    </div>
                </div>
                {{-- Mock screenshot --}}
                <div style="background: linear-gradient(135deg, {{ $bg1 }}, {{ $bg2 }}); height: 220px; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: .75rem; position: relative; overflow: hidden;">
                    {{-- Mock browser UI elements --}}
                    <div style="position: absolute; top: 1rem; left: 0; right: 0; padding: 0 1.5rem; display: flex; justify-content: space-between; align-items: center;">
                        <div style="display: flex; gap: 1.5rem;">
                            <div style="height: .5rem; width: 3rem; background: rgba(255,255,255,.4); border-radius: 2px;"></div>
                            <div style="height: .5rem; width: 3rem; background: rgba(255,255,255,.3); border-radius: 2px;"></div>
                            <div style="height: .5rem; width: 3rem; background: rgba(255,255,255,.3); border-radius: 2px;"></div>
                        </div>
                        <div style="height: 1.5rem; width: 5rem; background: rgba(255,255,255,.25); border-radius: 4px;"></div>
                    </div>
                    <div style="text-align: center; padding: 1rem;">
                        <div style="font-size: .65rem; color: rgba(255,255,255,.7); margin-bottom: .4rem; font-weight: 600; text-transform: uppercase; letter-spacing: .08em;">Empowering Minds</div>
                        <div style="font-size: 1.1rem; color: #fff; font-weight: 800; line-height: 1.2;">{{ explode(' ', $name)[0] }} Institute</div>
                        <div style="font-size: .65rem; color: rgba(255,255,255,.6); margin-top: .25rem;">Across Africa & Beyond</div>
                    </div>
                    <div style="background: rgba(255,255,255,.15); border-radius: .5rem; padding: .4rem .8rem; display: flex; align-items: center; gap: .4rem;">
                        <div style="width: .4rem; height: .4rem; border-radius: 50%; background: rgba(255,255,255,.8);"></div>
                        <span style="font-size: .65rem; color: rgba(255,255,255,.9); font-weight: 600;">Why Choose Our Institute?</span>
                    </div>
                </div>
                {{-- Card footer --}}
                <div style="padding: 1.5rem;">
                    <div style="margin-bottom: .5rem;">
                        <span style="font-size: .7rem; font-weight: 600; color: #5BB741; background: rgba(91,183,65,.1); padding: .2rem .6rem; border-radius: 2rem;">{{ $tag }}</span>
                    </div>
                    <h3 style="font-size: 1.05rem; font-weight: 700; margin: .5rem 0 .4rem; color: #111;">{{ $name }}</h3>
                    <p style="font-size: .875rem; color: #666; margin: 0; line-height: 1.6;">{{ $desc }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════════ INSIGHTS & RESOURCES ══════════════════════════════════ --}}
<section id="blog" style="padding: 6rem 0; background: #fafafa;">
    <div class="container-xl">
        <div class="fade-up" style="display: flex; align-items: flex-end; justify-content: space-between; margin-bottom: 3rem; flex-wrap: wrap; gap: 1rem;">
            <div>
                <div class="section-label"></div>
                <h2 style="font-size: clamp(1.75rem, 4vw, 2.75rem); font-weight: 800; letter-spacing: -.02em; margin: 0;">Insights & Resources</h2>
            </div>
            <a href="#" style="font-size: .875rem; font-weight: 600; color: #5BB741; text-decoration: none; display: flex; align-items: center; gap: .3rem;">
                View All Articles
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid-3 fade-up">
            @foreach([
                [
                    'Engineering',
                    '#3B82F6',
                    '#EFF6FF',
                    'Why Nigerian Businesses Need Custom Software Over Off-the-Shelf Solutions',
                    'IterationPlus Team',
                    '7 min read',
                ],
                [
                    'Industry',
                    '#F59E0B',
                    '#FFFBEB',
                    'Digital Transformation in Nigerian Healthcare: Challenges and Opportunities',
                    'IterationPlus Team',
                    '5 min read',
                ],
                [
                    'Technology',
                    '#8B5CF6',
                    '#F5F3FF',
                    'Building Scalable SaaS Platforms: Lessons From the Nigerian Market',
                    'IterationPlus Team',
                    '6 min read',
                ],
            ] as [$tag, $tagColor, $tagBg, $title, $author, $readTime])
            <div style="background: #fff; border-radius: 1rem; overflow: hidden; box-shadow: 0 2px 16px rgba(0,0,0,.06); transition: transform .3s, box-shadow .3s;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 40px rgba(0,0,0,.12)'" onmouseout="this.style.transform='';this.style.boxShadow='0 2px 16px rgba(0,0,0,.06)'">
                <div style="height: 160px; background: linear-gradient(135deg, #1e293b, #334155); display: flex; align-items: center; justify-content: center;">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,.15)" stroke-width="1"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8zM14 2v6h6M16 13H8M16 17H8M10 9H8"/></svg>
                </div>
                <div style="padding: 1.5rem;">
                    <span class="blog-tag" style="background: {{ $tagBg }}; color: {{ $tagColor }};">{{ $tag }}</span>
                    <h3 style="font-size: 1rem; font-weight: 700; line-height: 1.4; margin: .75rem 0 1rem; color: #111;">{{ $title }}</h3>
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <span style="font-size: .8rem; color: #999; font-weight: 500;">{{ $author }}</span>
                        <span style="font-size: .75rem; color: #bbb;">{{ $readTime }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════════ CTA BANNER ══════════════════════════════════ --}}
<section id="contact" style="padding: 5rem 0;">
    <div class="container-xl">
        <div class="cta-banner fade-up" style="padding: 4rem 3rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 2rem;">
            <h2 style="font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 900; color: #fff; margin: 0; letter-spacing: -.03em; line-height: 1.05; max-width: 520px;">Let's Work Together</h2>
            <a href="mailto:hello@iterationplus.ng" style="flex-shrink: 0; width: 4rem; height: 4rem; border-radius: 50%; background: #fff; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: transform .2s, background .2s;" onmouseover="this.style.transform='scale(1.1)';this.style.background='#5BB741'" onmouseout="this.style.transform='';this.style.background='#fff'">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#111" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════ FOOTER ══════════════════════════════════ --}}
<footer style="padding: 5rem 0 2rem;">
    <div class="container-xl">
        <div class="grid-4" style="margin-bottom: 4rem; grid-template-columns: 2fr 1fr 1fr 1fr;">
            {{-- Brand column --}}
            <div>
                <a href="/" style="text-decoration: none; display: inline-flex; align-items: center; gap: .25rem; margin-bottom: 1rem;">
                    <img src="https://res.cloudinary.com/dney6qnzd/image/upload/v1773487828/ipt-logo_wbxnpz.jpg" alt="IterationPlus Logo" width="34" height="34" style="border-radius: 6px; margin-right: .25rem; object-fit: cover;">
                    <span style="font-weight: 800; font-size: 1rem; color: #eee;">Iteration</span>
                    <span style="font-weight: 800; font-size: 1rem; color: #5BB741;">Plus</span>
                </a>
                <p style="font-size: .85rem; line-height: 1.7; color: #666; max-width: 280px; margin: 0 0 1.5rem;">Technology that works as hard as you do. Delivering enterprise-grade solutions across Nigeria.</p>
                {{-- Socials --}}
                <div style="display: flex; gap: .75rem;">
                    @foreach([
                        ['M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2zM4 6a2 2 0 100-4 2 2 0 000 4z', 'LinkedIn'],
                        ['23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z', 'Twitter'],
                        ['M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 00-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0020 4.77 5.07 5.07 0 0019.91 1S18.73.65 16 2.48a13.38 13.38 0 00-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 005 4.77a5.44 5.44 0 00-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 009 18.13V22', 'GitHub'],
                        ['M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z', 'Facebook'],
                    ] as [$icon, $label])
                    <a href="#" class="social-btn" aria-label="{{ $label }}">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="{{ $icon }}"/></svg>
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Services column --}}
            <div>
                <h4 style="font-size: .8rem; font-weight: 700; color: #fff; text-transform: uppercase; letter-spacing: .1em; margin: 0 0 1.25rem;">Services</h4>
                @foreach(['Software Development', 'SaaS Platforms', 'Mobile Apps', 'Web Applications', 'Domain Hosting', 'Technical Consulting'] as $item)
                <a href="#" class="footer-link">{{ $item }}</a>
                @endforeach
            </div>

            {{-- Company column --}}
            <div>
                <h4 style="font-size: .8rem; font-weight: 700; color: #fff; text-transform: uppercase; letter-spacing: .1em; margin: 0 0 1.25rem;">Company</h4>
                @foreach(['About Us', 'Portfolio', 'Blog', 'Careers', 'Contact'] as $item)
                <a href="#" class="footer-link">{{ $item }}</a>
                @endforeach
            </div>

            {{-- Contact column --}}
            <div>
                <h4 style="font-size: .8rem; font-weight: 700; color: #fff; text-transform: uppercase; letter-spacing: .1em; margin: 0 0 1.25rem;">Contact</h4>
                <p style="font-size: .875rem; color: #666; line-height: 1.6; margin: 0 0 1rem;">
                    102 Ozuoba Crescent, Rumuola, Port Harcourt, Rivers State
                </p>
                <a href="tel:+2348109871460" class="footer-link">+234 810 987 1460</a>
                <a href="mailto:hello@iterationplus.ng" class="footer-link" style="color: #5BB741;">hello@iterationplus.ng</a>
            </div>
        </div>

        {{-- Bottom bar --}}
        <div style="border-top: 1px solid #1a1a1a; padding-top: 2rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
            <p style="font-size: .8rem; color: #444; margin: 0;">© {{ date('Y') }} IterationPlus Limited. All rights reserved.</p>
            <div style="display: flex; gap: 1.5rem;">
                <a href="#" style="font-size: .8rem; color: #444; text-decoration: none; transition: color .2s;" onmouseover="this.style.color='#5BB741'" onmouseout="this.style.color='#444'">Privacy Policy</a>
                <a href="#" style="font-size: .8rem; color: #444; text-decoration: none; transition: color .2s;" onmouseover="this.style.color='#5BB741'" onmouseout="this.style.color='#444'">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>

{{-- ══════════════════════════════════ SCRIPTS ══════════════════════════════════ --}}
<script>
// Hero canvas network animation
(function () {
    const canvas = document.getElementById('hero-canvas');
    const ctx = canvas.getContext('2d');
    let W, H, bgNodes = [], time = 0;

    // Background random network nodes
    const BG_COUNT = 35, BG_CONNECT = 160, BG_SPEED = 0.35;

    // Orbital rings config: rx/ry as fraction of W/H, tiltDeg, speed (rad/ms), nodeCount, color
    const ORBITS = [
        { rx: 0.58, ry: 0.22, tilt: -32, speed:  0.00022, count: 3, color: [91, 183, 65]  },
        { rx: 0.65, ry: 0.30, tilt:  28, speed: -0.00016, count: 4, color: [91, 183, 65]  },
        { rx: 0.50, ry: 0.38, tilt:  82, speed:  0.00013, count: 3, color: [80, 150, 210] },
        { rx: 0.72, ry: 0.18, tilt: -68, speed: -0.00020, count: 3, color: [80, 150, 210] },
    ];

    function resize() {
        W = canvas.width  = canvas.offsetWidth;
        H = canvas.height = canvas.offsetHeight;
    }

    function makeBgNode() {
        return {
            x:  Math.random() * W,
            y:  Math.random() * H,
            vx: (Math.random() - .5) * BG_SPEED,
            vy: (Math.random() - .5) * BG_SPEED,
            r:  Math.random() * 2 + 1,
        };
    }

    function init() {
        resize();
        bgNodes = Array.from({ length: BG_COUNT }, makeBgNode);
    }

    // Return {x,y} of an orbital node given its orbit and phase offset
    function orbitalPoint(orbit, phaseOffset, t) {
        const cx   = W * 0.5;
        const cy   = H * 0.5;
        const rad  = orbit.tilt * Math.PI / 180;
        const phi  = t * orbit.speed + phaseOffset;
        const lx   = Math.cos(phi) * orbit.rx * W;
        const ly   = Math.sin(phi) * orbit.ry * H;
        return {
            x: cx + lx * Math.cos(rad) - ly * Math.sin(rad),
            y: cy + lx * Math.sin(rad) + ly * Math.cos(rad),
            color: orbit.color,
        };
    }

    function drawEllipse(orbit) {
        const cx  = W * 0.5;
        const cy  = H * 0.5;
        const rad = orbit.tilt * Math.PI / 180;
        const [r, g, b] = orbit.color;
        ctx.save();
        ctx.translate(cx, cy);
        ctx.rotate(rad);
        ctx.beginPath();
        ctx.ellipse(0, 0, orbit.rx * W, orbit.ry * H, 0, 0, Math.PI * 2);
        ctx.strokeStyle = `rgba(${r},${g},${b},0.20)`;
        ctx.lineWidth = 1.2;
        ctx.stroke();
        ctx.restore();
    }

    function drawLine(ax, ay, bx, by, r, g, b, alpha) {
        ctx.beginPath();
        ctx.strokeStyle = `rgba(${r},${g},${b},${alpha})`;
        ctx.lineWidth = 1;
        ctx.moveTo(ax, ay);
        ctx.lineTo(bx, by);
        ctx.stroke();
    }

    function drawNode(x, y, radius, r, g, b, alpha) {
        // glow halo
        ctx.beginPath();
        ctx.arc(x, y, radius + 4, 0, Math.PI * 2);
        ctx.fillStyle = `rgba(${r},${g},${b},0.12)`;
        ctx.fill();
        // core dot
        ctx.beginPath();
        ctx.arc(x, y, radius, 0, Math.PI * 2);
        ctx.fillStyle = `rgba(${r},${g},${b},${alpha})`;
        ctx.fill();
    }

    function loop(ts) {
        time = ts;
        ctx.clearRect(0, 0, W, H);

        // ── Orbital ellipses ──────────────────────────────────────
        ORBITS.forEach(o => drawEllipse(o));

        // ── Collect orbital node positions ────────────────────────
        const orbNodes = [];
        ORBITS.forEach(o => {
            for (let i = 0; i < o.count; i++) {
                orbNodes.push(orbitalPoint(o, (i / o.count) * Math.PI * 2, ts));
            }
        });

        // ── Connect all orbital nodes to each other ───────────────
        const ORBN_CONNECT = W * 1.5; // large enough to always connect
        for (let i = 0; i < orbNodes.length; i++) {
            for (let j = i + 1; j < orbNodes.length; j++) {
                const dx   = orbNodes[i].x - orbNodes[j].x;
                const dy   = orbNodes[i].y - orbNodes[j].y;
                const dist = Math.sqrt(dx * dx + dy * dy);
                const maxDist = W * 0.85;
                if (dist < maxDist) {
                    const alpha = (1 - dist / maxDist) * 0.35;
                    const [r, g, b] = orbNodes[i].color;
                    drawLine(orbNodes[i].x, orbNodes[i].y, orbNodes[j].x, orbNodes[j].y, r, g, b, alpha);
                }
            }
        }

        // ── Background network ────────────────────────────────────
        bgNodes.forEach(n => {
            n.x += n.vx; n.y += n.vy;
            if (n.x < -20) n.x = W + 20;
            if (n.x > W + 20) n.x = -20;
            if (n.y < -20) n.y = H + 20;
            if (n.y > H + 20) n.y = -20;
        });

        for (let i = 0; i < bgNodes.length; i++) {
            for (let j = i + 1; j < bgNodes.length; j++) {
                const dx   = bgNodes[i].x - bgNodes[j].x;
                const dy   = bgNodes[i].y - bgNodes[j].y;
                const dist = Math.sqrt(dx * dx + dy * dy);
                if (dist < BG_CONNECT) {
                    const alpha = (1 - dist / BG_CONNECT) * 0.14;
                    drawLine(bgNodes[i].x, bgNodes[i].y, bgNodes[j].x, bgNodes[j].y, 91, 183, 65, alpha);
                }
            }
        }

        // Also connect bg nodes that wander close to orbital nodes
        bgNodes.forEach(n => {
            orbNodes.forEach(o => {
                const dx   = n.x - o.x;
                const dy   = n.y - o.y;
                const dist = Math.sqrt(dx * dx + dy * dy);
                if (dist < 200) {
                    const [r, g, b] = o.color;
                    drawLine(n.x, n.y, o.x, o.y, r, g, b, (1 - dist / 200) * 0.18);
                }
            });
        });

        // ── Draw bg nodes ─────────────────────────────────────────
        bgNodes.forEach(n => drawNode(n.x, n.y, n.r, 91, 183, 65, 0.4));

        // ── Draw orbital nodes ────────────────────────────────────
        orbNodes.forEach(o => {
            const [r, g, b] = o.color;
            drawNode(o.x, o.y, 5, r, g, b, 0.75);
        });

        requestAnimationFrame(loop);
    }

    init();
    requestAnimationFrame(loop);
    window.addEventListener('resize', init);
})();

// Scroll-triggered fade-up animations
(function () {
    const els = document.querySelectorAll('.fade-up');
    const obs = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                obs.unobserve(e.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
    els.forEach(el => obs.observe(el));
})();

// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', function (e) {
        const id = this.getAttribute('href').slice(1);
        if (!id) { return; }
        const el = document.getElementById(id);
        if (el) {
            e.preventDefault();
            el.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
});
</script>
</body>
</html>
