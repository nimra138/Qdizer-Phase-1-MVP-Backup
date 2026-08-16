@extends('user.home.partials..app')

@section('title', 'QDizer | Professional Quotation Management Software')

@section('content')




    <main id="top">
        <section class="hero">
            <div class="hero-noise"></div>
            <div class="wrap hero-grid">
                <div class="hero-copy">
                    <div class="eyebrow">For service & contracting businesses</div>
                    <h1><em>Win more jobs.</em><br>by replying first.</h1>
                    <p class="hero-lead">Turn any customer inquiry into a professional quotation in under <br><strong>60
                            seconds</strong> — then share it instantly through WhatsApp.</p>

                    <div class="benefit-row">
                        <span>✓ Reply faster</span>
                        <span>✓ Look professional</span>
                        <span>✓ Works with calls too</span>
                    </div>

                    <div class="hero-ctas">
                        <a class="btn btn-gold" href="{{ route('register') }}">Start 14-Day Free Trial <span>→</span></a>
                        <button class="btn btn-outline" data-demo-open>
                            <span class="play">▶</span>
                            <span><b>See it in action</b><small>Real quote in 60 seconds</small></span>
                        </button>
                    </div>

                    <div class="micro-proof">
                        <span>◉ No Credit Card</span>
                        <span>◉ Cancel Anytime</span>
                        <span>◉ Setup in 60 Seconds</span>
                        <span>◉ 14-Day Money-Back</span>
                    </div>
                </div>

                <div class="hero-stage" data-hero-animation aria-label="QDizer quotation flow demo">
                    <div class="gold-glow"></div>
                    <img class="technician" src="{{ asset('user/assets/technician.png') }}"
                        alt="Service technician using QDizer on a phone">

                    <div class="phone" data-hero-step="phone" aria-hidden="true">
                        <div class="phone-top"><span class="speaker"></span></div>
                        <div class="phone-screen">
                            <div class="wa-head">
                                <div class="avatar">C</div>
                                <div><b>Customer</b><small>online</small></div>
                                <span>⋮</span>
                            </div>
                            <div class="wa-message">
                                Hi, I need AC maintenance for my villa. Please send me a quotation.
                                <small>10:30 AM ✓✓</small>
                            </div>
                            <div class="qdizer-card">
                                <div class="mini-logo"><img src="assets/qdizer-logo.png" alt=""></div>
                                <p>Creating your quotation…</p>
                                <div class="timer"><span id="quoteTimer">00:07</span></div>
                                <div class="progress"><i></i></div>
                                <p class="quote-number">Quotation #Q-3004-125</p>
                                <strong>AED 1,850.00</strong>
                                <div class="pdf-preview">
                                    <span>PDF</span><small>Professional quotation</small>
                                </div>
                                <button>Send via WhatsApp</button>
                                <div class="sent">✓ Sent in 00:58</div>
                            </div>
                        </div>
                    </div>

                    <div class="flow-timeline" data-hero-step="timeline">
                        <h3>The entire process<br><strong>under 60 seconds</strong></h3>
                        <ol>
                            <li><b>Inquiry Received</b><span>00:00</span></li>
                            <li><b>Create Quote</b><span>00:07</span></li>
                            <li><b>PDF Generated</b><span>00:18</span></li>
                            <li><b>Sent on WhatsApp</b><span>00:27</span></li>
                            <li><b>Viewed</b><span>00:45</span></li>
                            <li><b>Accepted</b><span>00:58</span></li>
                        </ol>
                    </div>

                    <div class="quote-card" data-hero-step="quote">
                        <div class="quote-card-head">
                            <img src="assets/qdizer-logo.png" alt="">
                            <span>QUOTATION</span>
                        </div>
                        <div class="quote-meta"><b>Mr. Omar Abdullah</b><small>+971 50 304 125</small></div>
                        <table>
                            <tr>
                                <td>AC Maintenance</td>
                                <td>AED 450</td>
                            </tr>
                            <tr>
                                <td>Gas Top Up</td>
                                <td>AED 300</td>
                            </tr>
                            <tr>
                                <td>Filter Replacement</td>
                                <td>AED 250</td>
                            </tr>
                        </table>
                        <div class="quote-total"><span>Total</span><strong>AED 1,850</strong></div>
                        <div class="accepted" data-hero-step="accepted">ACCEPTED</div>
                    </div>

                    <div class="trust-chip" data-hero-step="trust">🛡 Trusted by HVAC, electrical, plumbing & maintenance
                        companies across the UAE</div>
                </div>
            </div>
        </section>

        <section class="logo-strip">
            <div class="wrap">
                <p>BUILT FOR THE BUSINESSES THAT KEEP THE UAE RUNNING</p>
                <div class="industry-grid">
                    <div><i>❄</i><span><b>HVAC</b><small>AC & Cooling</small></span></div>
                    <div><i>ϟ</i><span><b>Electrical</b><small>Repairs & Installation</small></span></div>
                    <div><i>◉</i><span><b>Plumbing</b><small>Service & Maintenance</small></span></div>
                    <div><i>✦</i><span><b>Cleaning</b><small>Residential & Commercial</small></span></div>
                    <div><i>⌂</i><span><b>Maintenance</b><small>Property Services</small></span></div>
                    <div><i>◇</i><span><b>Security</b><small>Systems & Support</small></span></div>
                </div>
            </div>
        </section>

        <section class="section problem" id="product">
            <div class="wrap">
                <div class="section-label">WHY CONTRACTORS LOSE JOBS</div>
                <h2>Every hour you wait,<br><em>someone else gets the job.</em></h2>
                <p class="section-intro">It usually isn’t your price. It’s how fast you reply.</p>

                <div class="story-grid">
                    <article class="story-card green">
                        <div class="story-top"><span class="step">1</span><span class="icon wa-icon"><svg class="wa-svg"
                                    viewBox="0 0 32 32" aria-hidden="true">
                                    <path fill="currentColor"
                                        d="M16.04 3C9.41 3 4.02 8.27 4.02 14.75c0 2.3.69 4.54 1.99 6.45L4 28.5l7.55-1.96a12.2 12.2 0 0 0 4.48.85h.01c6.62 0 12.01-5.27 12.01-11.75C28.05 9.27 22.66 3 16.04 3Zm0 21.98h-.01c-1.4 0-2.77-.37-3.97-1.07l-.28-.16-4.48 1.16 1.2-4.27-.18-.28a9.54 9.54 0 0 1-1.47-5.1c0-5.24 4.32-9.5 9.63-9.5s9.63 4.26 9.63 9.5-4.32 9.72-10.07 9.72Zm5.29-7.24c-.29-.14-1.71-.83-1.98-.92-.26-.09-.46-.14-.65.14-.19.28-.75.92-.92 1.11-.17.19-.34.21-.63.07-.29-.14-1.22-.44-2.32-1.4-.86-.75-1.44-1.68-1.61-1.96-.17-.28-.02-.43.13-.57.13-.13.29-.33.43-.5.14-.17.19-.28.29-.47.1-.19.05-.35-.02-.5-.07-.14-.65-1.55-.89-2.12-.23-.56-.47-.48-.65-.49h-.55c-.19 0-.5.07-.77.35-.26.28-1.01.97-1.01 2.36s1.03 2.74 1.17 2.93c.14.19 2.02 3.03 4.9 4.25.68.29 1.22.47 1.64.6.69.22 1.32.19 1.81.12.55-.08 1.71-.69 1.95-1.36.24-.67.24-1.24.17-1.36-.07-.11-.26-.18-.55-.32Z" />
                                </svg></span>
                            <h3>Customer sends WhatsApp</h3>
                        </div>
                        <div class="message green-msg">Hi,<br>Can you send me a quotation?<small>09:02 AM ✓✓</small></div>
                    </article>
                    <article class="story-card gold">
                        <div class="story-top"><span class="step">2</span><span class="icon">◷</span>
                            <h3>You reply… later</h3>
                        </div>
                        <div class="message gold-msg">I’ll send it tonight.<small>09:05 AM ✓✓</small></div>
                        <div class="time-passes">◷ Time passes…</div>
                    </article>
                    <article class="story-card red">
                        <div class="story-top"><span class="step">3</span><span class="icon">➤</span>
                            <h3>Another company replies first</h3>
                        </div>
                        <div class="message">Quotation attached.<div class="accepted-line">Accepted ✓</div><small>09:12 AM
                                ✓✓</small></div>
                    </article>
                    <article class="story-card dark">
                        <div class="story-top"><span class="step">4</span><span class="icon">☹</span>
                            <h3>You lose the opportunity</h3>
                        </div>
                        <div class="message">Thanks.<br>We already hired someone.<small>09:15 AM ✓✓</small></div>
                    </article>
                </div>

                <div class="loss-banner">
                    <span class="bag">💰</span>
                    <p>You didn’t lose because of price.<br>You lost because you replied <em>too late.</em></p>
                </div>
            </div>
        </section>

        <section class="section how how-conversation-v5" id="how-it-works">
            <div class="wrap">
                <div class="section-label">HOW QDIZER WORKS</div>
                <h2>From customer inquiry to<br><em>accepted quote in under 60 seconds.</em></h2>
                <p class="section-intro">You stay in the conversation. QDizer prepares, tracks and updates the quotation
                    quietly behind the scenes.</p>

                <div class="conversation-v5" data-qdizer-conversation>
                    <div class="conversation-v5-copy">
                        <span class="perspective-label">YOU ARE THE SERVICE BUSINESS</span>
                        <h3>Your customer messages you.<br><em>QDizer handles the quotation workflow.</em></h3>
                        <p>This example shows <strong>your company’s WhatsApp</strong>. White messages come from the
                            customer; green messages are sent by your business.</p>

                        <div class="role-legend" aria-label="Conversation roles">
                            <span><i class="legend-bubble customer"></i> Customer</span>
                            <span><i class="legend-bubble business"></i> Your company</span>
                        </div>

                        <div class="qdizer-behind-scenes" aria-live="polite">
                            <div class="backend-head">
                                <img src="{{ asset('user/assets/qdizer-logo.png') }}" alt="QDizer">
                                <span>BEHIND THE SCENES</span>
                            </div>
                            <div class="backend-state" data-backend-state>
                                <div class="backend-icon">✓</div>
                                <div>
                                    <strong>Inquiry received</strong>
                                    <small>Ready to create a quotation</small>
                                </div>
                            </div>
                            <div class="backend-progress"><i data-backend-progress></i></div>
                        </div>

                        <div class="demo-timeline-v5" aria-label="Quotation timeline">
                            <button class="timeline-step-v5 active" data-v5-step="0"><span>00
                                    sec</span><b>Inquiry</b></button>
                            <button class="timeline-step-v5" data-v5-step="1"><span>12 sec</span><b>Create</b></button>
                            <button class="timeline-step-v5" data-v5-step="2"><span>24 sec</span><b>Send</b></button>
                            <button class="timeline-step-v5" data-v5-step="3"><span>37 sec</span><b>Viewed</b></button>
                            <button class="timeline-step-v5" data-v5-step="4"><span>58 sec</span><b>Accepted</b></button>
                        </div>

                        <div class="demo-controls-v5">
                            <button class="demo-replay-v5" type="button" data-v5-replay>↻ Replay conversation</button>
                            <span>Click any stage to inspect it</span>
                        </div>
                    </div>

                    <div class="phone-perspective-wrap">
                        <span class="phone-perspective">YOUR BUSINESS’S WHATSAPP</span>
                        <div class="whatsapp-phone-v5" aria-label="Your business WhatsApp conversation with a customer">
                            <div class="wa-statusbar-v5"><span>9:41</span><span>◔ 5G ▮</span></div>
                            <div class="wa-chat-header-v5">
                                <button aria-label="Back">‹</button>
                                <div class="customer-avatar-v5">NC</div>
                                <div><b>New Customer</b><small data-header-status>online</small></div>
                                <span class="wa-header-icons-v5">◌ ☎</span>
                            </div>
                            <div class="wa-wallpaper-v5">
                                <div class="wa-day-v5">Today</div>

                                <div class="wa-bubble-v5 incoming-v5 v5-message visible" data-v5-message="0">
                                    Hi, I need AC maintenance for my villa. how much does it cost?
                                    <small>10:24 AM</small>
                                </div>

                                <div class="wa-bubble-v5 outgoing-v5 v5-message" data-v5-message="1">
                                    Sure — I’m preparing your quotation now.
                                    <small>10:24 AM <span class="ticks">✓✓</span></small>
                                </div>

                                <div class="wa-bubble-v5 outgoing-v5 pdf-v5 v5-message" data-v5-message="2">
                                    <div class="pdf-icon-v5">PDF</div>
                                    <div class="pdf-copy-v5"><b>Quotation_1024.pdf</b><span>AED 2,850 · 110 KB</span></div>
                                    <small>10:25 AM <span class="ticks" data-pdf-ticks>✓✓</span></small>
                                </div>

                                <div class="wa-bubble-v5 incoming-v5 v5-message" data-v5-message="3">
                                    Looks good. Let’s proceed.
                                    <small>10:27 AM</small>
                                </div>
                            </div>
                            <div class="wa-compose-v5"><span>＋</span>
                                <div>Message</div><span>◉ ◌</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="how-benefits-v5">
                    <div><b>PDF</b><span><strong>Professional PDF</strong><small>Branded and ready</small></span></div>
                    <div><b>◔</b><span><strong>Real-time tracking</strong><small>Know when it is opened</small></span></div>
                    <div><b class="rail-wa"><svg class="wa-svg" viewBox="0 0 32 32" aria-hidden="true">
                                <path fill="currentColor"
                                    d="M16.04 3C9.41 3 4.02 8.27 4.02 14.75c0 2.3.69 4.54 1.99 6.45L4 28.5l7.55-1.96a12.2 12.2 0 0 0 4.48.85h.01c6.62 0 12.01-5.27 12.01-11.75C28.05 9.27 22.66 3 16.04 3Zm0 21.98h-.01c-1.4 0-2.77-.37-3.97-1.07l-.28-.16-4.48 1.16 1.2-4.27-.18-.28a9.54 9.54 0 0 1-1.47-5.1c0-5.24 4.32-9.5 9.63-9.5s9.63 4.26 9.63 9.5-4.32 9.72-10.07 9.72Zm5.29-7.24c-.29-.14-1.71-.83-1.98-.92-.26-.09-.46-.14-.65.14-.19.28-.75.92-.92 1.11-.17.19-.34.21-.63.07-.29-.14-1.22-.44-2.32-1.4-.86-.75-1.44-1.68-1.61-1.96-.17-.28-.02-.43.13-.57.13-.13.29-.33.43-.5.14-.17.19-.28.29-.47.1-.19.05-.35-.02-.5-.07-.14-.65-1.55-.89-2.12-.23-.56-.47-.48-.65-.49h-.55c-.19 0-.5.07-.77.35-.26.28-1.01.97-1.01 2.36s1.03 2.74 1.17 2.93c.14.19 2.02 3.03 4.9 4.25.68.29 1.22.47 1.64.6.69.22 1.32.19 1.81.12.55-.08 1.71-.69 1.95-1.36.24-.67.24-1.24.17-1.36-.07-.11-.26-.18-.55-.32Z" />
                            </svg></b><span><strong>WhatsApp sharing</strong><small>Sent from your business</small></span>
                    </div>
                    <div><b>▯</b><span><strong>Works on your phone</strong><small>From site or on the go</small></span>
                    </div>
                    <div><b>#</b><span><strong>Auto-numbering</strong><small>No manual work</small></span></div>
                </div>
            </div>
        </section>

        <section class="section platform-section" id="platform">
            <div class="wrap">
                <div class="platform-heading">
                    <div class="section-label">WORK FROM ANYWHERE</div>
                    <h2>In the office. On site.<br><em>One connected workflow.</em></h2>
                    <p class="section-intro">Create quotations from your desktop, send them from your phone, and track
                        every update from one web platform.</p>
                </div>

                <div class="platform-stage" data-platform-demo>
                    <div class="platform-copy">
                        <div class="platform-point active" data-platform-point="0">
                            <span class="platform-point-icon">1</span>
                            <div>
                                <strong>Create from the office</strong>
                                <small>Use the full dashboard to manage clients, services, quotations and templates.</small>
                            </div>
                        </div>

                        <div class="platform-point" data-platform-point="1">
                            <span class="platform-point-icon">2</span>
                            <div>
                                <strong>Send while you are on site</strong>
                                <small>Open QDizer from your phone and share the professional quotation through
                                    WhatsApp.</small>
                            </div>
                        </div>

                        <div class="platform-point" data-platform-point="2">
                            <span class="platform-point-icon">3</span>
                            <div>
                                <strong>Track everything in one place</strong>
                                <small>See when quotations are sent, viewed and accepted from the same cloud
                                    dashboard.</small>
                            </div>
                        </div>

                        <div class="platform-badges">
                            <span>Desktop & laptop</span>
                            <span>Mobile browser</span>
                            <span>Cloud based</span>
                        </div>
                    </div>

                    <div class="platform-visual"
                        aria-label="QDizer desktop dashboard connected to a mobile quotation workflow">
                        <div class="desktop-shell screenshot-slot" data-screenshot-slot="desktop">
                            <div class="desktop-topbar">
                                <div class="desktop-dots"><i></i><i></i><i></i></div>
                                <div class="desktop-address">app.qdizer.com/dashboard</div>
                            </div>

                            <div class="desktop-screen">
                                <aside class="mini-sidebar">
                                    <div class="mini-brand">
                                        <img src="assets/qdizer-logo.png" alt="">
                                    </div>
                                    <span class="selected">Dashboard</span>
                                    <span>Quotations</span>
                                    <span>Clients</span>
                                    <span>Services</span>
                                    <span>Templates</span>
                                </aside>

                                <div class="mini-dashboard">
                                    <div class="mini-dashboard-head">
                                        <div>
                                            <small>GOOD MORNING</small>
                                            <h3>Your quotation activity</h3>
                                        </div>
                                        <button>+ New quotation</button>
                                    </div>

                                    <div class="mini-stats">
                                        <article><small>Total quotations</small><strong>128</strong><em>+12 this month</em>
                                        </article>
                                        <article><small>Viewed</small><strong>84</strong><em>Real-time tracking</em>
                                        </article>
                                        <article><small>Accepted</small><strong>46</strong><em>Opportunities won</em>
                                        </article>
                                    </div>

                                    <div class="mini-content-grid">
                                        <article class="mini-chart-card">
                                            <div class="mini-card-title"><span>Quotation overview</span><small>This
                                                    month</small></div>
                                            <div class="mini-chart">
                                                <i style="height:28%"></i>
                                                <i style="height:42%"></i>
                                                <i style="height:36%"></i>
                                                <i style="height:58%"></i>
                                                <i style="height:50%"></i>
                                                <i style="height:72%"></i>
                                                <i style="height:86%"></i>
                                            </div>
                                        </article>

                                        <article class="mini-activity-card">
                                            <div class="mini-card-title"><span>Recent activity</span><small>Live</small>
                                            </div>
                                            <ul>
                                                <li><b>Viewed</b><span>AC maintenance quote</span></li>
                                                <li><b>Accepted</b><span>Electrical repair quote</span></li>
                                                <li><b>Sent</b><span>Cleaning service quote</span></li>
                                            </ul>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="platform-link">
                            <span class="link-pulse"></span>
                            <span class="link-line"></span>
                            <span class="link-arrow">→</span>
                        </div>

                        <div class="mobile-shell screenshot-slot" data-screenshot-slot="mobile">
                            <div class="mobile-notch"></div>
                            <div class="mobile-status">9:41 <span>●●●</span></div>
                            <div class="mobile-app-head">
                                <span class="mobile-back">‹</span>
                                <div class="mobile-avatar">C</div>
                                <div><strong>New Customer</strong><small>online</small></div>
                            </div>
                            <div class="mobile-chat">
                                <div class="chat-bubble incoming">Hi, I need AC maintenance. Can you send me a
                                    quotation?<small>10:30 AM</small></div>
                                <div class="chat-bubble outgoing">Sure — I’ll send it now.<small>10:31 AM ✓✓</small></div>
                                <div class="mobile-quote-card">
                                    <div class="mobile-quote-head">
                                        <span>Professional quotation</span>
                                        <b>AED 1,850</b>
                                    </div>
                                    <div class="mobile-quote-lines"><i></i><i></i><i></i></div>
                                    <button>Send via WhatsApp</button>
                                </div>
                                <div class="mobile-success">✓ Quotation sent</div>
                            </div>
                        </div>

                        <div class="screenshot-replace-note">Replace these HTML mockups with real QDizer screenshots after
                            the dashboard is finalized.</div>
                        <div class="platform-caption">
                            <strong>QDizer is a web platform.</strong>
                            <span>WhatsApp is the sharing channel — not the product itself.</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <script>
            window.pdfAssetsPath = "{{ asset('user/assets/pdfs') }}";
        </script>

        {{-- <script src="{{ asset('user/js/main.js') }}"></script> --}}

        <section class="section template-showcase" id="templates">
            <div class="wrap">
                <div class="template-heading-grid">
                    <div>
                        <div class="section-label align-left">FULLY CUSTOMIZABLE TEMPLATES</div>
                        <h2>Professional quotations that<br><em>look like your business.</em></h2>
                        <p class="template-brand-line">Your branding. Your colours. Your company.</p>
                        <p class="template-intro">Choose a ready-made quotation design, then personalise it with your own
                            company identity. Every template can be saved and reused as your default style.</p>
                    </div>

                    <div class="customize-list" aria-label="Template customization options">
                        <div><b>✓</b><span><strong>Add your logo</strong><small>Make every quotation instantly
                                    recognisable.</small></span></div>
                        <div><b>✓</b><span><strong>Use your brand colours</strong><small>Match the document to your visual
                                    identity.</small></span></div>
                        <div><b>✓</b><span><strong>Choose your font style</strong><small>Control the tone from clean to
                                    premium.</small></span></div>
                        <div><b>✓</b><span><strong>Edit terms and company details</strong><small>Save your standard
                                    information once.</small></span></div>
                        <div><b>✓</b><span><strong>Set your default template</strong><small>Create future quotations even
                                    faster.</small></span></div>
                    </div>
                </div>

                <div class="template-grid" data-template-gallery>
                    <article class="template-card active" data-template-card="Classic">
                        <div class="classic-ribbon classic-ribbon-template"><span>MOST POPULAR</span></div>
                        <button class="template-click-area" type="button" data-template-open="Classic"
                            aria-label="Open Classic template preview">
                            <div class="template-preview classic-template">
                                <header><span>QUOTATION</span><i></i></header>
                                <div class="template-brand">NORTHLINE SERVICES</div>
                                <div class="template-lines"><span></span><span></span><span></span></div>
                                <div class="template-table"><i></i><i></i><i></i><i></i></div>
                                <div class="template-total"></div>
                                <div class="template-hover"><span>View full PDF</span></div>
                            </div>
                        </button>
                        <div class="template-meta">
                            <div><strong>Classic</strong><small>Clean and professional</small></div>
                            <button type="button" data-template-open="Classic">View full PDF</button>
                        </div>
                    </article>

                    <article class="template-card" data-template-card="Modern Gold">
                        <button class="template-click-area" type="button" data-template-open="Modern Gold"
                            aria-label="Open Modern Gold template preview">
                            <div class="template-preview modern-template">
                                <header><span>QUOTATION</span><i></i></header>
                                <div class="template-brand">NORTHLINE SERVICES</div>
                                <div class="template-lines"><span></span><span></span><span></span></div>
                                <div class="template-table"><i></i><i></i><i></i><i></i></div>
                                <div class="template-total"></div>
                                <div class="template-hover"><span>Live preview</span></div>
                            </div>
                        </button>
                        <div class="template-meta">
                            <div><strong>Modern Gold</strong><small>Warm and distinctive</small></div>
                            <button type="button" data-template-open="Modern Gold">Live preview</button>
                        </div>
                    </article>

                    <article class="template-card" data-template-card="Minimal">
                        <button class="template-click-area" type="button" data-template-open="Minimal"
                            aria-label="Open Minimal template preview">
                            <div class="template-preview minimal-template">
                                <header><span>QUOTATION</span><i></i></header>
                                <div class="template-brand">NORTHLINE SERVICES</div>
                                <div class="template-lines"><span></span><span></span><span></span></div>
                                <div class="template-table"><i></i><i></i><i></i><i></i></div>
                                <div class="template-total"></div>
                                <div class="template-hover"><span>Live preview</span></div>
                            </div>
                        </button>
                        <div class="template-meta">
                            <div><strong>Minimal</strong><small>Simple and spacious</small></div>
                            <button type="button" data-template-open="Minimal">Live preview</button>
                        </div>
                    </article>

                    <article class="template-card" data-template-card="Executive">
                        <button class="template-click-area" type="button" data-template-open="Executive"
                            aria-label="Open Executive template preview">
                            <div class="template-preview executive-template">
                                <header><span>QUOTATION</span><i></i></header>
                                <div class="template-brand">NORTHLINE SERVICES</div>
                                <div class="template-lines"><span></span><span></span><span></span></div>
                                <div class="template-table"><i></i><i></i><i></i><i></i></div>
                                <div class="template-total"></div>
                                <div class="template-hover"><span>Live preview</span></div>
                            </div>
                        </button>
                        <div class="template-meta">
                            <div><strong>Executive</strong><small>Bold and premium</small></div>
                            <button type="button" data-template-open="Executive">Live preview</button>
                        </div>
                    </article>
                </div>

                <div class="template-footer-note">
                    <span>Logo</span><span>Colours</span><span>Fonts</span><span>Terms</span><span>Layout</span>
                    <a href="#templates">Fully customizable <b>→</b></a>
                </div>

                <p class="template-demo-note">Demo previews are shown for design review. They will be replaced with real
                    QDizer-generated quotation PDFs once the production templates are complete.</p>
            </div>

            <div class="template-modal" data-template-modal aria-hidden="true">
                <div class="template-modal-backdrop" data-template-close></div>
                <div class="template-modal-dialog" role="dialog" aria-modal="true"
                    aria-labelledby="templateModalTitle">
                    <button class="template-modal-close" type="button" data-template-close
                        aria-label="Close preview">×</button>
                    <div class="template-modal-top">
                        <div>
                            <span class="section-label align-left">FULL PDF PREVIEW</span>
                            <h3 id="templateModalTitle">Classic template</h3>
                        </div>
                        <div class="template-modal-actions">
                            <button type="button" data-template-prev>← Previous</button>
                            <button type="button" data-template-next>Next →</button>
                        </div>
                    </div>
                    <div class="template-modal-canvas template-pdf-canvas">
                        <div class="pdf-loading" data-pdf-loading>Loading PDF preview…</div>
                        <iframe class="template-pdf-frame" data-template-pdf title="Quotation PDF preview"></iframe>
                    </div>
                    <div class="template-pdf-footer">
                        <span>Real browser PDF preview</span>
                        <a data-template-pdf-open href="{{ asset('user/assets/pdfs/classic.pdf') }}" target="_blank"
                            rel="noopener">Open full PDF ↗</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section compare" id="customers">
            <div class="wrap">
                <div class="section-label">SAME INQUIRY. DIFFERENT OUTCOME.</div>
                <h2>One replies late.<br><em>One wins the job.</em></h2>
                <p class="section-intro">The difference is not where you are working. It is how quickly you can respond
                    professionally.</p>

                <div class="story-compare-grid">
                    <article class="outcome-panel outcome-lost">
                        <div class="outcome-image">
                            <img src="{{ asset('user/assets/without-qdizer.jpg') }}"
                                alt="Technician delayed by manual paperwork while working on site">
                            <div class="outcome-overlay"></div>
                            <span class="outcome-badge negative">WITHOUT QDIZER</span>
                            <div class="chat-stack lost-chat">
                                <div class="chat customer">CUSTOMER: Hi, I need AC maintenance for my villa.</div>
                                <div class="chat owner">I’ll send the quotation in 2 hours.</div>
                                <div class="delay-pill">10 minutes later</div>
                                <div class="chat customer final">CUSTOMER: Thanks. We already hired another company.</div>
                            </div>
                        </div>
                        <div class="outcome-copy">
                            <h3>Still creating quotations after work?</h3>
                            <ul>
                                <li>Manual notes and paperwork</li>
                                <li>Reply hours later</li>
                                <li>No professional quotation ready</li>
                                <li>The customer moves to a competitor</li>
                            </ul>
                        </div>
                    </article>

                    <div class="versus">VS</div>

                    <article class="outcome-panel outcome-won">
                        <div class="outcome-image">
                            <img src="{{ asset('user/assets/with-qdizer.jpg') }}"
                                alt="Technician creating and sending a quotation from the work site">
                            <div class="outcome-overlay"></div>
                            <span class="outcome-badge positive">WITH QDIZER</span>
                            <div class="chat-stack won-chat">
                                <div class="chat customer">CUSTOMER: Hi, I need AC maintenance for my villa.</div>
                                <div class="chat system">Creating quotation…</div>
                                <div class="chat system">Quotation sent ✓</div>
                                <div class="chat customer final">CUSTOMER: Looks good. Let’s proceed.</div>
                                <div class="accepted-pill">✓ QUOTE ACCEPTED</div>
                            </div>
                        </div>
                        <div class="outcome-copy">
                            <h3>Create and send quotations on-site.</h3>
                            <ul>
                                <li>Professional quotation from your phone</li>
                                <li>Sent in under 60 seconds</li>
                                <li>Customer views it immediately</li>
                                <li>Quote accepted — opportunity won</li>
                            </ul>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="roi-section" id="roi-calculator">
            <div class="wrap roi-layout">
                <div class="roi-copy-block">
                    <div class="section-label align-left">SEE THE VALUE</div>
                    <h2>One extra accepted job<br>can cover months of QDizer.</h2>
                    <p>Adjust the three inputs to estimate the potential value of replying faster and following up at the
                        right time.</p>
                </div>

                <div class="roi-calculator-card">
                    <div class="roi-controls">
                        <label>
                            <span>Average job value</span>
                            <output id="jobValueOutput">AED 2,500</output>
                            <input id="jobValue" type="range" min="250" max="20000" step="250"
                                value="2500">
                        </label>

                        <label>
                            <span>Quotations sent each month</span>
                            <output id="quotesOutput">40</output>
                            <input id="quotesCount" type="range" min="5" max="200" step="5"
                                value="40">
                        </label>

                        <label>
                            <span>Expected increase in acceptance rate</span>
                            <output id="acceptanceIncreaseOutput">5%</output>
                            <input id="acceptanceIncrease" type="range" min="1" max="20" step="1"
                                value="5">
                        </label>
                    </div>

                    <div class="roi-results">
                        <div><span>Estimated extra jobs per month</span><strong id="extraJobsCalculated">2.0</strong></div>
                        <div><span>Estimated extra monthly revenue</span><strong id="monthlyRevenue">AED 5,000</strong>
                        </div>
                        <div><span>Estimated extra annual revenue</span><strong id="annualRevenue">AED 60,000</strong>
                        </div>
                        <div><span>QDizer annual plan</span><strong>AED 790</strong></div>
                        <div class="roi-highlight"><span>Potential return</span><strong id="roiMultiple">76x</strong>
                        </div>
                    </div>

                    <p class="roi-disclaimer">Estimated potential return based on your inputs. Actual results may vary.</p>
                </div>
            </div>
        </section>

        <section class="section pricing" id="pricing">
            <div class="wrap">
                <div class="section-label">SIMPLE PRICING</div>
                <h2>Choose how you prefer to pay.<br><em>Monthly flexibility or annual savings.</em></h2>
                <p class="section-intro">The same QDizer Pro features in both options.</p>
                <div class="billing-toggle" role="group" aria-label="Billing frequency"><button class="billing-option"
                        data-billing="monthly">Monthly</button><button class="billing-option active"
                        data-billing="annual">Annual <span>Save 17%</span></button></div>
                <div class="pricing-layout pricing-layout-two">
                    <div class="price-card">
                        <div class="classic-ribbon classic-ribbon-pricing"><span id="bestValue">BEST VALUE</span></div>
                        <small>QDizer Pro</small>
                        <div class="price"><b id="displayPrice">65.83</b><span>AED<br><small
                                    id="pricePeriod">/month</small></span></div>
                        <p class="billing-copy" id="billingCopy">Billed annually at AED 790 — save AED 158</p>
                        <ul>
                            <li>Unlimited quotations</li>
                            <li>Unlimited clients</li>
                            <li>WhatsApp sharing</li>
                            <li>Professional PDF export</li>
                            <li>Real-time quote tracking</li>
                            <li>Priority support</li>
                        </ul><a href="{{ route('register') }}" class="btn btn-gold" id="pricingCta">Start 14-Day Free Trial →</a>
                        <p>No credit card · Cancel anytime</p>
                    </div>
                    <div class="risk-card" id="security">
                        <div class="section-label align-left">RISK-FREE</div>
                        <h3>Try it without pressure.</h3>
                        <ul>
                            <li>14-day money-back guarantee</li>
                            <li>Monthly or annual billing</li>
                            <li>Cancel anytime</li>
                            <li>Secure & encrypted</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="section faq" id="faq">
            <div class="wrap faq-wrap">
                <div class="faq-intro">
                    <div class="section-label align-left">FREQUENTLY ASKED QUESTIONS</div>
                    <h2>Practical questions,<br><em>clear answers.</em></h2>
                    <p>QDizer is WhatsApp-first, but it is not limited to WhatsApp-only enquiries.</p>
                </div>
                <div class="faq-list">
                    <article class="faq-item open"><button class="faq-question" aria-expanded="true"><span>What if my
                                customer calls instead of sending a WhatsApp message?</span><b>−</b></button>
                        <div class="faq-answer">
                            <p>No problem. Create the customer and quotation while you are on the call, then share it
                                through WhatsApp, a secure link, PDF, or email. The customer does not need to start the
                                conversation on WhatsApp.</p>
                        </div>
                    </article>
                    <article class="faq-item"><button class="faq-question" aria-expanded="false"><span>Does my customer
                                need a WhatsApp account?</span><b>+</b></button>
                        <div class="faq-answer">
                            <p>No. WhatsApp is the fastest sharing option, but QDizer can also provide a shareable link,
                                downloadable PDF, or email delivery when available.</p>
                        </div>
                    </article>
                    <article class="faq-item"><button class="faq-question" aria-expanded="false"><span>Can I pay monthly
                                instead of annually?</span><b>+</b></button>
                        <div class="faq-answer">
                            <p>Yes. Choose AED 79 billed monthly, or AED 790 billed annually, which is equivalent to AED
                                65.83 per month and saves AED 158 per year.</p>
                        </div>
                    </article>
                    <article class="faq-item"><button class="faq-question" aria-expanded="false"><span>Can I add my logo,
                                colours and default terms?</span><b>+</b></button>
                        <div class="faq-answer">
                            <p>Yes. QDizer is designed to let each company create branded, reusable quotation templates that
                                match its identity.</p>
                        </div>
                    </article>
                    <article class="faq-item"><button class="faq-question" aria-expanded="false"><span>Will QDizer tell
                                me when a quotation is opened?</span><b>+</b></button>
                        <div class="faq-answer">
                            <p>Yes. Quote tracking helps you know when a customer views the quotation so you can follow up
                                at the right time.</p>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <section class="final-cta" id="contact">
            <div class="wrap final-cta-inner">
                <div>
                    <h2>Don’t lose another opportunity.</h2>
                    <p>Create, send and track professional quotations — wherever the inquiry comes from.</p>
                </div>
                <a class="btn btn-gold" href="{{ route('register') }}">Start 14-Day Free Trial →</a>
            </div>
        </section>
    </main>



@endsection
