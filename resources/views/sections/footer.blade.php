{{-- Footer Hover Styles --}}
<style>
    .woe-footer a { transition: color 0.3s ease; }
    .woe-footer .woe-link:hover { color: #94A3B8 !important; }
    .woe-footer .woe-ig:hover { border-color: #334155 !important; }
    .woe-footer .woe-ig:hover .woe-ig-text { color: #FFFFFF !important; }
    .woe-footer .woe-ig:hover .woe-ig-icon { color: #FFFFFF !important; }
    .woe-footer .woe-ig:hover .woe-ig-box { border-color: #334155 !important; }
    .woe-footer .woe-contact:hover { color: #94A3B8 !important; }
    .woe-footer .woe-contact-icon { transition: color 0.3s ease; }
    .woe-footer .woe-contact:hover .woe-contact-icon { color: #94A3B8 !important; }

    /* Responsive Grid */
    .woe-footer-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 24px 32px;
    }
    .woe-footer-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 40px;
        align-items: start;
    }
    
    @media (min-width: 768px) {
        .woe-footer-container {
            padding: 48px 32px 40px;
        }
        .woe-footer-grid {
            grid-template-columns: 250px 1fr 1fr 1fr;
            gap: 48px;
        }
    }
</style>
{{-- Footer --}}
<footer class="woe-footer" style="background-color: #0B0F19; border-top: 1px solid #1C2434;">
    <div class="woe-footer-container">
        <div class="woe-footer-grid">

            {{-- Column 1: Brand --}}
            <div>
                {{-- Logo + Text --}}
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
                    <img src="{{ asset('images/logo.png') }}" alt="Worn-Out Enthusiast"
                         style="height: 50px; width: auto;">
                    <div style="line-height: 1.1;">
                        <span style="display: block; font-weight: 800; font-size: 16px; color: #FFFFFF; letter-spacing: -0.3px;">WORN-OUT</span>
                        <span style="display: block; font-weight: 800; font-size: 16px; color: #FFFFFF; letter-spacing: -0.3px;">ENTHUSIAST</span>
                    </div>
                </div>

                {{-- Description --}}
                <p style="color: #64748B; font-size: 12px; line-height: 1.7; margin: 0 0 24px 0; max-width: 230px;">
                    Worn-Out Enthusiast adalah komunitas yang dibentuk oleh para denimheads Indonesia menjadi organisasi dalam langkah memperkenalkan dan mengangkat brand lokal melalui kompetisi, edukasi dan aktivitas komunitas.
                </p>

                {{-- Instagram --}}
                <a href="https://www.instagram.com/wornoutenthusiast?igsh=MWk2amJiOGt6b3RseQ==" target="_blank"
                   class="woe-ig"
                   style="display: inline-flex; align-items: center; gap: 10px; padding: 6px 14px 6px 6px; border-radius: 10px; background: #111827; border: 1px solid #1E293B; text-decoration: none; transition: border-color 0.3s ease;">
                    <div class="woe-ig-box" style="width: 32px; height: 32px; border-radius: 8px; background: #0B0F19; border: 1px solid #1E293B; display: flex; align-items: center; justify-content: center; transition: border-color 0.3s ease;">
                        <svg class="woe-ig-icon" style="width: 16px; height: 16px; color: #64748B; transition: color 0.3s ease;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5" stroke-width="2"></rect>
                            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z" stroke-width="2"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" stroke-width="2" stroke-linecap="round"></line>
                        </svg>
                    </div>
                    <span class="woe-ig-text" style="font-size: 12px; font-weight: 500; color: #64748B; transition: color 0.3s ease;">@wornoutenthusiast</span>
                </a>
            </div>

            {{-- Column 2: LINK CEPAT --}}
            <div>
                <h4 style="font-weight: 700; color: #FFFFFF; font-size: 13px; letter-spacing: 2px; margin: 0 0 24px 0; text-transform: uppercase;">LINK CEPAT</h4>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 14px;"><a href="{{ route('home') }}#about" class="woe-link" style="color: #64748B; font-size: 13px; text-decoration: none;">Tentang</a></li>
                    <li style="margin-bottom: 14px;"><a href="{{ route('home') }}#categories" class="woe-link" style="color: #64748B; font-size: 13px; text-decoration: none;">Kategori</a></li>
                    <li style="margin-bottom: 14px;"><a href="{{ route('home') }}#timeline" class="woe-link" style="color: #64748B; font-size: 13px; text-decoration: none;">Timeline</a></li>
                    <li style="margin-bottom: 14px;"><a href="{{ route('home') }}#prizes" class="woe-link" style="color: #64748B; font-size: 13px; text-decoration: none;">Hadiah</a></li>
                    <li><a href="{{ route('home') }}#gallery" class="woe-link" style="color: #64748B; font-size: 13px; text-decoration: none;">Galeri</a></li>
                </ul>
            </div>

            {{-- Column 3: INFORMASI --}}
            <div>
                <h4 style="font-weight: 700; color: #FFFFFF; font-size: 13px; letter-spacing: 2px; margin: 0 0 24px 0; text-transform: uppercase;">INFORMASI</h4>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 14px;"><a href="{{ route('home') }}#rules" class="woe-link" style="color: #64748B; font-size: 13px; text-decoration: none;">Aturan & Panduan</a></li>
                    <li style="margin-bottom: 14px;"><a href="{{ route('home') }}#judges" class="woe-link" style="color: #64748B; font-size: 13px; text-decoration: none;">Juri</a></li>
                    <li style="margin-bottom: 14px;"><a href="{{ route('home') }}#faq" class="woe-link" style="color: #64748B; font-size: 13px; text-decoration: none;">FAQ</a></li>
                    <li style="margin-bottom: 14px;"><a href="{{ route('home') }}#sponsors" class="woe-link" style="color: #64748B; font-size: 13px; text-decoration: none;">Sponsor</a></li>
                    <li><a href="{{ route('register') }}" class="woe-link" style="color: #64748B; font-size: 13px; text-decoration: none;">Daftar</a></li>
                </ul>
            </div>

            {{-- Column 4: HUBUNGI KAMI --}}
            <div>
                <h4 style="font-weight: 700; color: #FFFFFF; font-size: 13px; letter-spacing: 2px; margin: 0 0 24px 0; text-transform: uppercase;">HUBUNGI KAMI</h4>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 14px;">
                        <a href="https://wa.me/6282126601027" target="_blank" class="woe-contact" style="display: flex; align-items: center; gap: 10px; color: #64748B; font-size: 13px; text-decoration: none;">
                            <svg class="woe-contact-icon" style="width: 16px; height: 16px; color: #64748B; flex-shrink: 0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>+62 821 2660 1027</span>
                        </a>
                    </li>
                    <li>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <svg style="width: 16px; height: 16px; color: #64748B; flex-shrink: 0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span style="color: #64748B; font-size: 13px;">Bogor, Indonesia</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Copyright --}}
    <div style="text-align: center; padding: 24px 0; border-top: 1px solid #111827;">
        <p style="color: #334155; font-size: 11px; font-weight: 500; letter-spacing: 0.5px; margin: 0;">
            &copy; {{ date('Y') }} WORN-OUT ENTHUSIAST. All rights reserved.
        </p>
    </div>
</footer>