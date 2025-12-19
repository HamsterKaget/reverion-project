# Dragon Nest Private Server - Project Context

## Project Overview
Website untuk expose dan top up private game Dragon Nest. Website ini berfungsi sebagai landing page untuk memperkenalkan server dan memfasilitasi top up game.

## Design Theme
- **Color Scheme**: Dark mode dengan main color merah
- **Style**: Modern dengan feel RPG (tidak terlalu tua, bukan seperti company profile)
- **Approach**: Mobile first - semua elemen harus responsif
- **Language**: Semua konten dalam bahasa Inggris

## Tech Stack
- **Backend Framework**: Laravel
- **CSS Framework**: Tailwind CSS
- **UI Component Library**: Flowbite
- **Build Tool**: Vite

## Project Structure

### Frontend Views Structure
```
resources/views/frontend/
├── components/
│   ├── navbar.blade.php
│   └── footer.blade.php
├── layouts/
│   └── app.blade.php
└── pages/
    └── home/
        └── index.blade.php
```

### Layout Yield Sections
Base layout menggunakan yield sections berikut:
- `@yield('pre-css')` - CSS tambahan sebelum Vite CSS
- `@yield('seo')` - Meta tags, title, description
- `@yield('body')` - Konten utama halaman
- `@yield('pre-js')` - JavaScript tambahan sebelum Vite JS
- `@yield('post-js')` - JavaScript tambahan setelah Vite JS

## Home Page Sections
1. **Hero Section**: Logo, judul server, description, CTA, hiasan visual
2. **Counter Launch Section**: "Beta Launch Soon" dengan countdown ke 6 Desember 00:00
3. **Download Client Section**: Download button/link untuk client game
4. **Feature Server Section**: Grid/list fitur-fitur server
5. **Counter Stats Section**: Total Registered, Total Player Today, Total Player This Month
6. **FAQ Section**: Accordion dengan pertanyaan umum
7. **CTA Section**: Call to action untuk register/download

## Color Palette
- **Main Color (Red)**: `#DC2626` (red-600) atau `#EF4444` (red-500)
- **Dark Background**: Dark mode default
- **Accent**: Red untuk highlights dan CTAs

## Notes
- Semua konten harus dalam bahasa Inggris
- Mobile first approach untuk semua komponen
- Menggunakan Flowbite components untuk UI elements
- Countdown timer menggunakan JavaScript vanilla

