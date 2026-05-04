@include('include.header')

<style>
    /*
     * Register layout: viewport @media removed here in favour of
     * — CSS container queries on .reg-card .card-body (name: regcard)
     * — clamp(), min(), flex-wrap, and CSS Grid auto behaviour
     */
    /* Scoped modern register styling — does not alter site-wide Bootstrap */
    .register-page {
        --reg-bg: #f4f6f9;
        --reg-card: #ffffff;
        /* Match site theme (color-2.css / theme-color-two) */
        --reg-accent: #035ab3;
        --reg-accent-soft: rgba(3, 90, 179, 0.14);
        --reg-border: #e2e8f0;
        --reg-text: #1e293b;
        --reg-muted: #64748b;
        --reg-danger: #dc2626;
        --reg-radius: 16px;
        --reg-shadow: 0 1px 2px rgba(3, 90, 179, 0.04), 0 14px 40px rgba(15, 23, 42, 0.08);
        --reg-touch-min: 2.75rem; /* ~44px: comfortable tap targets on phones */
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        -webkit-text-size-adjust: 100%;
        text-size-adjust: 100%;
        padding-top: calc(1.5rem + env(safe-area-inset-top, 0px));
        padding-bottom: calc(2.75rem + env(safe-area-inset-bottom, 0px));
        overflow-x: clip;
        background: linear-gradient(165deg, #edf2fa 0%, #f6f8fc 42%, #f0f3f9 100%);
        min-height: 65vh;
    }

    .register-page .wrapper-box {
        width: 100%;
        max-width: min(1380px, 100%);
        margin-left: auto;
        margin-right: auto;
    }

    /* Full-bleed card on narrow screens: strip Bootstrap row/col side gutters */
    .register-page .wrapper-box .row {
        margin-left: 0;
        margin-right: 0;
    }

    .register-page .wrapper-box .row > [class*="col-"] {
        padding-left: 0;
        padding-right: 0;
    }

    /* Tighter page gutters on phones; safe-area still wins when notched */
    .register-page > .auto-container {
        max-width: 1420px;
        padding-left: max(8px, env(safe-area-inset-left, 0px));
        padding-right: max(8px, env(safe-area-inset-right, 0px));
    }

    .register-page .reg-card {
        border: 1px solid var(--reg-border);
        border-radius: var(--reg-radius);
        box-shadow: var(--reg-shadow);
        overflow: hidden;
        background: var(--reg-card);
    }

    .register-page .reg-card .card-body {
        padding-block: clamp(1.15rem, 3.5vw, 2.35rem);
        padding-inline: clamp(0.65rem, 2.8vw, 1.85rem);
        /* Component queries: layout follows card width, not only viewport */
        container-type: inline-size;
        container-name: regcard;
    }

    .register-page .reg-card-head {
        background: linear-gradient(135deg, #023873 0%, #035ab3 50%, #1468c4 100%);
        border: none;
        padding-block: clamp(1.1rem, 3.2vw, 2rem);
        padding-inline: clamp(0.85rem, 3.2vw, 2rem);
        box-shadow: inset 0 -3px 0 rgba(255, 255, 255, 0.22);
    }

    .register-page .reg-card-head .card-title_apply {
        margin: 0;
        font-size: clamp(1.1rem, 2.5vw, 1.3rem);
        font-weight: 700;
        letter-spacing: -0.02em;
        line-height: 1.25;
        overflow-wrap: anywhere;
    }

    .register-page .reg-card-head .reg-head-subtitle {
        margin: 0.5rem 0 0;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1.45;
        opacity: 0.93;
        max-width: 36rem;
        overflow-wrap: anywhere;
    }

    .register-page .reg-required-note {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        padding: 0.5rem 0.85rem;
        border-radius: 999px;
        background: rgba(220, 38, 38, 0.08);
        color: var(--reg-text);
        font-size: 0.875rem;
        font-weight: 500;
    }

    .register-page .reg-required-note .dot {
        color: var(--reg-danger);
        font-weight: 700;
    }

    .register-page .reg-intro {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
    }

    .register-page .reg-lead {
        margin: 0;
        font-size: 0.9rem;
        color: var(--reg-muted);
        line-height: 1.55;
        max-width: 32rem;
    }

    .register-page .reg-fields-row .reg-pane {
        padding-bottom: 0;
        min-width: 0;
    }

    /* Fluid two-column form: splits when the *card* is wide enough */
    .register-page .reg-fields-row {
        display: grid;
        gap: 1rem;
        gap: clamp(0.85rem, 3cqi, 1.35rem);
        grid-template-columns: 1fr;
        align-items: stretch;
    }

    @container regcard (inline-size >= 40rem) {
        .register-page .reg-fields-row {
            grid-template-columns: 1fr 1fr;
            column-gap: 1.25rem;
            column-gap: clamp(1rem, 3.5cqi, 1.75rem);
        }

        .register-page .reg-fields-row > .reg-pane:last-child {
            border-inline-start: 1px solid #e8edf3;
            padding-inline-start: 1rem;
            padding-inline-start: clamp(0.65rem, 2cqi, 1.1rem);
        }

        .register-page.register-page--alt .reg-fields-row > .reg-pane:last-child {
            border-inline-start: 2px dashed #b8cade;
        }
    }

    /* Phone-width card: trim side padding so fields use almost full screen */
    @container regcard (inline-size < 26rem) {
        .register-page .reg-card .card-body {
            padding-inline: clamp(0.45rem, calc(0.2rem + 2.2cqi), 1rem);
            padding-block: clamp(1rem, calc(0.35rem + 2.8cqi), 1.35rem);
        }

        .register-page .reg-card-head {
            padding-inline: clamp(0.6rem, calc(0.35rem + 2.5cqi), 1.15rem);
            padding-block: clamp(1rem, 2.5cqi, 1.35rem);
        }

        .register-page.register-page--alt .reg-fields-list > .reg-stack {
            padding-left: clamp(0.65rem, 2.4cqi, 0.95rem);
            padding-right: clamp(0.65rem, 2.4cqi, 0.95rem);
        }

        .register-page.register-page--alt .reg-section-title {
            padding-inline: clamp(0.7rem, 2.6cqi, 1.05rem);
        }

        .register-page .reg-submit-strip {
            padding-inline: clamp(0.7rem, 2.5cqi, 1.15rem);
        }
    }

    .register-page .reg-panel {
        background: linear-gradient(180deg, #fbfcfe 0%, #f4f7fb 100%);
        border: 1px solid #e8eef3;
        border-radius: 14px;
        padding: 1.35rem 1.35rem 1.15rem;
        margin-bottom: 0;
        height: 100%;
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.85);
    }

    .register-page .reg-section-title {
        display: flex;
        align-items: center;
        gap: 0.35rem;
        font-size: 0.6875rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: var(--reg-muted);
        margin: 0 0 1.15rem;
        padding-bottom: 0.6rem;
        border-bottom: 1px solid #dde5ee;
        position: relative;
    }

    .register-page .reg-section-title::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -1px;
        width: 3rem;
        height: 2px;
        background: var(--reg-accent);
        border-radius: 2px;
    }

    .register-page .reg-stack {
        margin-bottom: 1.25rem;
    }

    .register-page .reg-stack:last-of-type {
        margin-bottom: 0;
    }

    .register-page .reg-label {
        display: block;
        margin-bottom: 0.45rem;
    }

    .register-page .req {
        color: var(--reg-danger);
        font-weight: 700;
        margin-left: 0.0625rem;
    }

    .register-page .reg-name-row {
        display: flex;
        flex-wrap: wrap;
        gap: 0.65rem;
        align-items: stretch;
    }

    .register-page .reg-name-prefix {
        flex: 0 0 5.75rem;
    }

    .register-page .reg-name-prefix .form-control {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }

    .register-page .reg-name-input {
        flex: 1 1 12rem;
        min-width: 0;
    }

    .register-page .reg-label-group {
        margin-bottom: 0.75rem;
    }

    .register-page .reg-label-group > .reg-label {
        margin-bottom: 0.3rem;
    }

    .register-page .reg-field-hint {
        margin: 0;
        font-size: 0.8125rem;
        color: var(--reg-muted);
        line-height: 1.45;
        font-weight: 400;
    }

    .register-page label.reg-sublabel,
    .register-page .reg-sublabel {
        display: block;
        font-size: 0.8125rem;
        font-weight: 600;
        color: var(--reg-text);
        margin-bottom: 0.35rem;
    }

    /* Name row: intrinsic flex — wraps instead of viewport breakpoints */
    .register-page .reg-name-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 0.85rem;
        gap: clamp(0.65rem, 2.5cqi, 1rem);
        align-items: flex-start;
    }

    .register-page .reg-name-cell--title {
        flex: 0 1 6.75rem;
        min-width: 5.5rem;
    }

    .register-page .reg-name-cell--first,
    .register-page .reg-name-cell--last {
        flex: 1 1 min(100%, 14rem);
        min-width: min(100%, 11rem);
    }

    .register-page .reg-stack--fullname .text-danger {
        margin-top: 0.25rem;
    }

    .register-page select.form-control {
        cursor: pointer;
    }

    .register-page .reg-radio-chip:has(input:checked) {
        border-color: var(--reg-accent);
        background: rgba(3, 90, 179, 0.08);
        box-shadow: 0 1px 0 rgba(255, 255, 255, 0.8);
    }

    .register-page .reg-submit-strip {
        background: linear-gradient(180deg, #fafbfd 0%, #f4f6f9 100%);
        border: 1px solid #e8edf3;
        border-radius: 14px;
        padding: 1.35rem 1.35rem 1.4rem;
        margin-top: 0.75rem;
    }

    .register-page .reg-label.font-weight-normal,
    .register-page .reg-label .font-weight-normal {
        font-weight: 400 !important;
        font-size: 0.8125rem;
    }

    .register-page .reg-divider {
        border: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--reg-border), transparent);
        margin: 1rem 0 1.5rem;
    }

    .register-page label {
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--reg-text);
        margin-bottom: 0.35rem;
    }

    .register-page .form-control {
        border-radius: 10px;
        border: 1px solid var(--reg-border);
        padding: 0.55rem 0.85rem;
        transition: border-color 0.15s ease, box-shadow 0.15s ease;
        /* 16px avoids iPhone Safari zooming inputs on focus */
        font-size: 16px;
    }

    .register-page select.form-control,
    .register-page input.form-control:not([type]),
    .register-page input[type="text"].form-control,
    .register-page input[type="email"].form-control,
    .register-page input[type="tel"].form-control,
    .register-page input[type="number"].form-control {
        min-height: var(--reg-touch-min);
        line-height: 1.35;
    }

    .register-page .form-control:focus {
        border-color: var(--reg-accent);
        box-shadow: 0 0 0 3px var(--reg-accent-soft);
        outline: none;
    }

    .register-page textarea.form-control {
        min-height: max(88px, 5.75rem);
        resize: vertical;
        line-height: 1.45;
    }

    .register-page .reg-field-group {
        margin-bottom: 0.35rem;
    }

    .register-page .reg-radio-row {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 0.45rem 0.55rem;
        align-items: stretch;
        margin-top: 0.35rem;
        width: 100%;
    }

    .register-page .reg-radio-chip {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.4rem;
        min-height: var(--reg-touch-min);
        width: 100%;
        min-width: 0;
        padding: 0.4rem 0.5rem;
        border: 1px solid var(--reg-border);
        border-radius: 999px;
        background: #f8fafc;
        cursor: pointer;
        font-weight: 500;
        font-size: 15px;
        color: var(--reg-text);
        margin: 0;
        transition: background 0.15s ease, border-color 0.15s ease;
        text-align: center;
        line-height: 1.25;
    }

    .register-page .reg-radio-chip:hover {
        border-color: #cbd5e1;
        background: #fff;
    }

    .register-page .reg-radio-chip input[type="radio"] {
        flex-shrink: 0;
        width: 1.05rem;
        height: 1.05rem;
        margin: 0;
        margin-top: 0.05rem; /* optical align with caption text across browsers */
        accent-color: var(--reg-accent);
    }

    .register-page .reg-radio-chip > span {
        min-width: 0;
        text-align: center;
        text-wrap: balance;
    }

    /* Two columns on tight cards — third option spans full row */
    @container regcard (inline-size < 24rem) {
        .register-page .reg-radio-row {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .register-page .reg-radio-chip:nth-child(3) {
            grid-column: 1 / -1;
        }
    }

    .register-page .reg-actions {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-end;
        align-items: center;
        gap: 0.75rem;
        padding-top: 0;
    }

    .register-page .reg-actions-hint {
        font-size: 0.8125rem;
        color: var(--reg-muted);
        margin: 0;
        margin-right: auto;
        padding-right: 0.75rem;
        flex: 1 1 min(100%, 18rem);
        min-width: min(100%, 12rem);
    }

    .register-page .btn-reg-submit {
        min-width: min(100%, 12rem);
        flex: 0 1 auto;
        min-height: var(--reg-touch-min);
        padding: 0.65rem 1.75rem;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        border: none;
        background: linear-gradient(135deg, #1468c4 0%, #035ab3 100%);
        box-shadow: 0 8px 20px rgba(3, 90, 179, 0.28);
        transition: transform 0.12s ease, box-shadow 0.12s ease;
    }

    @container regcard (inline-size < 26rem) {
        .register-page .reg-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .register-page .reg-actions-hint {
            width: 100%;
            padding-right: 0;
            margin-bottom: 0.25rem;
        }

        .register-page .btn-reg-submit {
            width: 100%;
        }
    }
    .register-page .btn-reg-submit:hover,
    .register-page .btn-reg-submit:focus {
        transform: translateY(-1px);
        box-shadow: 0 12px 28px rgba(3, 90, 179, 0.32);
        background: linear-gradient(135deg, #1f77d4 0%, #035ab3 100%);
        color: #fff;
    }

    .register-page .text-danger[id$="Error"] {
        font-size: 0.8125rem;
        display: block;
        margin-top: 0.25rem;
    }

    /* -------------------------------------------------------------------------
       Alternate presentation (register-page--alt): zebra rows, step badges,
       flat white panels, dashed separators. Theme color unchanged.
       ------------------------------------------------------------------------- */
    .register-page.register-page--alt {
        background: #f3f6fb;
        background-image:
            radial-gradient(ellipse 90% 55% at 12% -15%, rgba(3, 90, 179, 0.085), transparent 58%),
            radial-gradient(ellipse 70% 45% at 98% 105%, rgba(3, 90, 179, 0.055), transparent 48%);
    }

    .register-page.register-page--alt .reg-card {
        border-radius: 20px;
        box-shadow:
            0 4px 28px rgba(15, 23, 42, 0.065),
            0 0 0 1px rgba(3, 90, 179, 0.07);
        border-color: #d4dde8;
    }

    .register-page.register-page--alt .reg-panel {
        background: #fff;
        border: 1px solid #cdd8e6;
        border-radius: 18px;
        padding: 0;
        margin-bottom: 0;
        height: 100%;
        overflow: hidden;
        box-shadow: 0 4px 22px rgba(3, 90, 179, 0.045);
    }

    .register-page.register-page--alt .reg-section-title {
        margin: 0;
        padding: 0.95rem 1.2rem;
        background: linear-gradient(90deg, rgba(3, 90, 179, 0.1) 0%, rgba(3, 90, 179, 0.02) 100%);
        border-bottom: 1px solid #dfe8f2;
        font-size: 0.72rem;
        letter-spacing: 0.07em;
        display: flex;
        align-items: center;
        gap: 0.7rem;
        text-transform: uppercase;
    }

    .register-page.register-page--alt .reg-section-title::after {
        display: none;
    }

    .register-page.register-page--alt .reg-step-badge {
        flex-shrink: 0;
        width: 2rem;
        height: 2rem;
        border-radius: 50%;
        background: var(--reg-accent);
        color: #fff;
        font-size: 0.875rem;
        font-weight: 800;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        line-height: 1;
        box-shadow: 0 2px 8px rgba(3, 90, 179, 0.25);
    }

    .register-page.register-page--alt .reg-section-label {
        font-weight: 800;
        color: #334155;
    }

    .register-page.register-page--alt .reg-fields-list {
        padding: 0;
    }

    .register-page.register-page--alt .reg-fields-list > .reg-stack {
        margin: 0;
        padding: 0.95rem 1.15rem 1.05rem;
    }

    .register-page.register-page--alt .reg-fields-list > .reg-stack:nth-child(odd) {
        background: #fff;
    }

    .register-page.register-page--alt .reg-fields-list > .reg-stack:nth-child(even) {
        background: #eef3fa;
    }

    .register-page.register-page--alt .reg-fields-list > .reg-stack + .reg-stack {
        border-top: 1px solid #e2e9f2;
    }

    .register-page.register-page--alt .reg-radio-chip {
        background: rgba(255, 255, 255, 0.85);
        border-color: #bac8d8;
    }

    .register-page.register-page--alt .reg-fields-list > .reg-stack:nth-child(even) .reg-radio-chip {
        background: rgba(255, 255, 255, 0.7);
    }

    .register-page.register-page--alt .reg-submit-strip {
        background: linear-gradient(180deg, #fff 0%, #f6f9fd 100%);
        border: 2px dashed rgba(3, 90, 179, 0.45);
        border-radius: 18px;
        box-shadow: 0 10px 36px rgba(3, 90, 179, 0.07);
    }

    .register-page.register-page--alt .reg-head-subtitle {
        opacity: 0.9;
    }

    /* Success modal (#overlay / #success-popup) */
    .register-page #overlay.overlay {
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
        background: rgba(15, 23, 42, 0.55);
    }

    .register-page #success-popup.popup {
        border-radius: 16px;
        padding: 2rem 1.75rem;
        border: 1px solid var(--reg-border);
        box-shadow: 0 24px 48px rgba(15, 23, 42, 0.18), 0 0 0 1px rgba(255, 255, 255, 0.06) inset;
        max-width: 420px;
        width: calc(100% - 2rem);
    }

    .register-page #success-popup.popup h2 {
        font-size: 1.35rem;
        font-weight: 700;
        color: var(--reg-accent);
        margin-bottom: 0.65rem;
    }

    .register-page #success-popup.popup h6 {
        color: var(--reg-muted);
        font-weight: 500;
        line-height: 1.45;
    }

    .register-page #success-popup.popup .log_in.btn {
        display: inline-block;
        margin-top: 1.25rem;
        padding: 0.65rem 2rem;
        border-radius: 10px;
        font-weight: 600;
        background: linear-gradient(135deg, #1468c4 0%, #035ab3 100%);
        border: none;
        transition: opacity 0.15s ease, transform 0.12s ease;
    }

    .register-page #success-popup.popup .log_in.btn:hover {
        opacity: 0.94;
        transform: translateY(-1px);
        color: #fff;
    }

    /* Base overlay/popup positioning (scoped IDs keep behavior for success dialog) */
    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(15, 23, 42, 0.55);
        z-index: 999;
    }

    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #fff;
        text-align: center;
        z-index: 1000;
    }

    /* Legacy modal (kept if JS still toggles #successModal) */
    #successModal.modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(15, 23, 42, 0.55);
        backdrop-filter: blur(3px);
    }

    #successModal .modal-content {
        background-color: #fff;
        width: min(340px, 92vw);
        padding: 1.75rem;
        text-align: center;
        border-radius: 16px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        box-shadow: 0 24px 48px rgba(15, 23, 42, 0.2);
        border: 1px solid var(--reg-border, #e2e8f0);
    }

    #successModal.modal button {
        padding: 0.65rem 1.5rem;
        background: linear-gradient(135deg, #1468c4 0%, #035ab3 100%);
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 10px;
        margin-top: 1rem;
        font-weight: 600;
    }

    #successModal.modal button:hover {
        opacity: 0.92;
    }
</style>
<!-- <section class="page-title" style="background-image: url(assets/images/slider/slider3.jpg);">
    <div class="auto-container">
        <div class="content-box">
            <div class="content-wrapper">
                <div class="title">
                    <h1 class="text-uppercase">Register</h1>
                </div>
                <ul class="bread-crumb">
                    <li><a href="index.php">Home</a></li>
                    <li>Register </li>

                </ul>
            </div>
        </div>
    </div>
</section> -->

<!-- About section -->

<section class="register-form register-page register-page--alt">
    <div class="auto-container">
        <div class="wrapper-box">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card card-info reg-card" data-select2-id="14">
                        <div class="card-header reg-card-head">
                            <h4 class="card-title_apply text-white text-center text-lg-left">Applicant registration</h4>
                            <p class="reg-head-subtitle text-white text-center text-lg-left">Use the same names and contact details as on your identity documents wherever applicable.</p>
                        </div>
                        <div class="card-body">
                            <div class="reg-intro">
                                <p class="reg-lead d-none d-sm-block">Completing every required field avoids delays during verification.</p>
                                <span class="reg-required-note"><span class="dot" aria-hidden="true">*</span> Mandatory fields</span>
                            </div>
                            <hr class="reg-divider">
                            <!-- autocomplete="off" -->
                            <form id="registerform" autocomplete="off">
                                @csrf
                                <div class="reg-fields-row">
                                    <div class="reg-pane">
                                        <div class="reg-panel">
                                            <div class="reg-section-title"><span class="reg-step-badge" aria-hidden="true">1</span><span class="reg-section-label">Personal information</span></div>

                                            <div class="reg-fields-list">
                                            <div class="reg-stack reg-stack--fullname">
                                                <div class="reg-label-group">
                                                    <span class="reg-label d-block" id="reg-fullname-label">Your name <span class="req" aria-hidden="true">*</span></span>
                                                    <p class="reg-field-hint">Enter title, given name and surname exactly as they appear on your ID or passport.</p>
                                                </div>
                                                <div class="reg-name-grid" role="group" aria-labelledby="reg-fullname-label">
                                                    <div class="reg-name-cell reg-name-cell--title">
                                                        <label class="reg-sublabel" for="salutation">Title</label>
                                                        <select id="salutation" name="salutation" class="form-control">
                                                            <option value="Mr">Mr</option>
                                                            <option value="Ms">Ms</option>
                                                            <option value="Mrs">Mrs</option>
                                                        </select>
                                                        <span id="salutationError" class="text-danger"></span>
                                                    </div>
                                                    <div class="reg-name-cell reg-name-cell--first">
                                                        <label class="reg-sublabel" for="first_name">First name</label>
                                                        <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First name" autocomplete="given-name">
                                                        <span id="FirstNameError" class="text-danger"></span>
                                                    </div>
                                                    <div class="reg-name-cell reg-name-cell--last">
                                                        <label class="reg-sublabel" for="lastname">Last name</label>
                                                        <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Surname / Last name" autocomplete="family-name">
                                                        <span id="lastnameError" class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="reg-stack reg-stack--gender">
                                                <span class="reg-label" id="reg-gender-label">Gender <span class="req" aria-hidden="true">*</span></span>
                                                <div class="reg-radio-row" role="radiogroup" aria-labelledby="reg-gender-label">
                                                    <label class="reg-radio-chip"><input type="radio" name="gender" value="Male"><span>Male</span></label>
                                                    <label class="reg-radio-chip"><input type="radio" name="gender" value="Female"><span>Female</span></label>
                                                    <label class="reg-radio-chip"><input type="radio" name="gender" value="Transgender"><span>Transgender</span></label>
                                                </div>
                                                <span id="GenderError" class="text-danger"></span>
                                            </div>

                                            <div class="reg-stack">
                                                <label class="reg-label" for="PhoneNo">Mobile number <span class="req" aria-hidden="true">*</span></label>
                                                <input type="text" id="PhoneNo" name="PhoneNo" class="form-control" placeholder="10-digit number (used as login ID)" inputmode="numeric" autocomplete="off">
                                                <span id="PhoneNoError" class="text-danger"></span>
                                            </div>

                                            <div class="reg-stack">
                                                <label class="reg-label" for="EmailAddress">Email address</label>
                                                <input type="email" id="EmailAddress" name="EmailAddress" class="form-control" placeholder="Optional">
                                                <span id="EmailError" class="text-danger"></span>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="reg-pane">
                                        <div class="reg-panel">
                                            <div class="reg-section-title"><span class="reg-step-badge" aria-hidden="true">2</span><span class="reg-section-label">Address &amp; location</span></div>

                                            <div class="reg-fields-list">
                                            <div class="reg-stack">
                                                <label class="reg-label" for="Address">Address <span class="req" aria-hidden="true">*</span></label>
                                                <textarea rows="3" id="Address" name="Address" class="form-control" autocomplete="street-address" placeholder="Door / street, area, landmark"></textarea>
                                                <span id="AddressError" class="text-danger"></span>
                                            </div>

                                            <div class="reg-stack">
                                                <label class="reg-label" for="state">State / UT <span class="req" aria-hidden="true">*</span></label>
                                                <select id="state" name="state" class="form-control">
                                                    <option value="">--- Select State ---</option>
                                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                    <option value="Assam">Assam</option>
                                                    <option value="Bihar">Bihar</option>
                                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                                    <option value="Goa">Goa</option>
                                                    <option value="Gujarat">Gujarat</option>
                                                    <option value="Haryana">Haryana</option>
                                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                    <option value="Jharkhand">Jharkhand</option>
                                                    <option value="Karnataka">Karnataka</option>
                                                    <option value="Kerala">Kerala</option>
                                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                    <option value="Maharashtra">Maharashtra</option>
                                                    <option value="Manipur">Manipur</option>
                                                    <option value="Meghalaya">Meghalaya</option>
                                                    <option value="Mizoram">Mizoram</option>
                                                    <option value="Nagaland">Nagaland</option>
                                                    <option value="Odisha">Odisha</option>
                                                    <option value="Punjab">Punjab</option>
                                                    <option value="Rajasthan">Rajasthan</option>
                                                    <option value="Sikkim">Sikkim</option>
                                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                                    <option value="Telangana">Telangana</option>
                                                    <option value="Tripura">Tripura</option>
                                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                    <option value="Uttarakhand">Uttarakhand</option>
                                                    <option value="West Bengal">West Bengal</option>

                                                    <!-- Union Territories -->
                                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                    <option value="Chandigarh">Chandigarh</option>
                                                    <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
                                                    <option value="Lakshadweep">Lakshadweep</option>
                                                    <option value="Delhi">Delhi</option>
                                                    <option value="Puducherry">Puducherry</option>
                                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                    <option value="Ladakh">Ladakh</option>
                                                </select>
                                                <span id="StateError" class="text-danger"></span>
                                            </div>

                                            <div class="reg-stack" id="districtRow" style="display:none;">
                                                <label class="reg-label" for="district">District <span class="text-muted font-weight-normal">(Tamil Nadu)</span></label>
                                                <select id="district" name="district" class="form-control">
                                                    <option value="" data-select2-id="2">---Select District ---</option>

                                                    <option value="Ariyalur">Ariyalur</option>
                                                    <option value="Chengalpattu">Chengalpattu</option>
                                                    <option value="Chennai">Chennai</option>
                                                    <option value="Coimbatore">Coimbatore</option>
                                                    <option value="Cuddalore">Cuddalore</option>
                                                    <option value="Dharmapuri">Dharmapuri</option>
                                                    <option value="Dindigul">Dindigul</option>
                                                    <option value="Erode">Erode</option>
                                                    <option value="Kancheepuram">Kancheepuram</option>
                                                    <option value="Kanyakumari">Kanyakumari</option>
                                                    <option value="Karur">Karur</option>
                                                    <option value="Krishnagiri">Krishnagiri</option>
                                                    <option value="Madurai">Madurai</option>
                                                    <option value="Nagapattinam">Nagapattinam</option>
                                                    <option value="Namakkal">Namakkal</option>
                                                    <option value="Nilgiris">Nilgiris</option>
                                                    <option value="Perambalur">Perambalur</option>
                                                    <option value="Pudukkottai">Pudukkottai</option>
                                                    <option value="Ramanathapuram">Ramanathapuram</option>
                                                    <option value="Salem">Salem</option>
                                                    <option value="Sivagangai">Sivagangai</option>
                                                    <option value="Tenkasi">Tenkasi</option>
                                                    <option value="Thanjavur">Thanjavur</option>
                                                    <option value="The Nilgiris">The Nilgiris</option>
                                                    <option value="Theni">Theni</option>
                                                    <option value="Tirunelveli">Tirunelveli</option>
                                                    <option value="Tiruppur">Tiruppur</option>
                                                    <option value="Tiruvallur">Tiruvallur</option>
                                                    <option value="Tiruvannamalai">Tiruvannamalai</option>
                                                    <option value="Vellore">Vellore</option>
                                                    <option value="Viluppuram">Viluppuram</option>
                                                    <option value="Virudhunagar">Virudhunagar</option>
                                                </select>
                                                <span id="DistrictError" class="text-danger"></span>
                                            </div>

                                            <div class="reg-stack">
                                                <label class="reg-label" for="pincode">PIN code <span class="req" aria-hidden="true">*</span></label>
                                                <input type="text" id="pincode" name="pincode" maxlength="6" class="form-control" placeholder="6 digits" inputmode="numeric" autocomplete="postal-code">
                                                <span id="PincodeError" class="text-danger"></span>
                                            </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>





                                <div class="row">
                                    <div class="col-12">
                                        <div class="reg-submit-strip">
                                            <div class="reg-actions">
                                                <p class="reg-actions-hint">By submitting, you confirm the information entered is correct to the best of your knowledge.</p>
                                                <button type="submit" class="btn btn-primary btn-reg-submit">Submit registration</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div id="success-popup" class="popup">
                                <h2>Registration Successful!</h2>
                                <!-- <p>Your registration was completed successfully. You can now log in.</p> -->
                                <h6 class="mt-2">Your Login ID will be your Mobile Number</h6>
                                <a href="{{ route('login') }} " class="btn btn-primary log_in mt-2">OK</a>
                            </div>
                            <div id="overlay" class="overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<div class="card1 register" style="display: none;">
    <h2>Register</h2>
    <form method="post" action="https://html.tonatheme.com/2021/Governlia/inc/sendemail.php" id="contact-form">
        <div class="row">

            <div class="form-group col-md-12">
                <input type="text" name="name" value="" placeholder="Your Name">
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <input type="email" name="email" value="" placeholder="Enter Email">
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <input type="text" name="mobile" value="" placeholder="Enter Mobile Number">
            </div>

        </div>

        <div class="row">

            <div class="form-group col-md-12">


                <select id="district" name="district">
                    <option value="">Select District</option>
                    <option value="Ariyalur">Ariyalur</option>
                    <option value="Chengalpattu">Chengalpattu</option>
                    <option value="Chennai">Chennai</option>
                    <option value="Coimbatore">Coimbatore</option>
                    <option value="Cuddalore">Cuddalore</option>
                    <option value="Dharmapuri">Dharmapuri</option>
                    <option value="Dindigul">Dindigul</option>
                    <option value="Erode">Erode</option>
                    <option value="Kancheepuram">Kancheepuram</option>
                    <option value="Kanyakumari">Kanyakumari</option>
                    <option value="Karur">Karur</option>
                    <option value="Krishnagiri">Krishnagiri</option>
                    <option value="Madurai">Madurai</option>
                    <option value="Nagapattinam">Nagapattinam</option>
                    <option value="Namakkal">Namakkal</option>
                    <option value="Nilgiris">Nilgiris</option>
                    <option value="Perambalur">Perambalur</option>
                    <option value="Pudukkottai">Pudukkottai</option>
                    <option value="Ramanathapuram">Ramanathapuram</option>
                    <option value="Salem">Salem</option>
                    <option value="Sivagangai">Sivagangai</option>
                    <option value="Tenkasi">Tenkasi</option>
                    <option value="Thanjavur">Thanjavur</option>
                    <option value="The Nilgiris">The Nilgiris</option>
                    <option value="Theni">Theni</option>
                    <option value="Tirunelveli">Tirunelveli</option>
                    <option value="Tiruppur">Tiruppur</option>
                    <option value="Tiruvallur">Tiruvallur</option>
                    <option value="Tiruvannamalai">Tiruvannamalai</option>
                    <option value="Vellore">Vellore</option>
                    <option value="Viluppuram">Viluppuram</option>
                    <option value="Virudhunagar">Virudhunagar</option>
                </select>
            </div>

        </div>


        <button type="submit">Submit</button>
    </form>
</div>

<div id="successModal" class="modal">
    <div class="modal-content">
        <h2>Registration Successful!</h2>
        <p>You have been successfully registered.</p>
        <button id="loginBtn">Login</button>
    </div>
</div>


<footer class="main-footer">
    @include('include.footer')

    <script>
        $("#contact-form").submit(function(e) {


                e.preventDefault(); // avoid to execute the actual submit of the form.


                var phone = $('input[name="phone"]').val();
                


                intRegex = /[0-9 -()+]+$/;

                if ((phone.length < 10) || (!intRegex.test(phone))) {
                    alert('Please enter a valid phone number.');
                    return false;
                }


                if (phone.length !== 0) {
                    $('#otp_card').removeAttr("style");


                }
                console.log(phone);
                return false;


        });

        document.addEventListener("DOMContentLoaded", function() {
            let phoneInput = document.getElementById("PhoneNo");
            let phoneError = document.getElementById("PhoneNoError");

            phoneInput.addEventListener("input", function() {
                // Remove non-digits
                this.value = this.value.replace(/[^0-9]/g, '');

                // Limit to 10 digits
                if (this.value.length > 10) {
                    this.value = this.value.slice(0, 10);
                }

                // Live validation
                if (this.value.length === 10) {
                    if (!/^[6-9]\d{9}$/.test(this.value)) {
                        phoneError.textContent = "Enter a valid 10-digit mobile number starting with 6-9.";
                    } else {
                        phoneError.textContent = "";
                    }
                } else {
                    phoneError.textContent = "";
                }
            });
        });
            

       

$(document).ready(function () {
    const form = $("#registerform");

    // Clear all error messages
    function clearErrors() {
        $("[id$='Error']").text("");
    }

    // Show backend validation errors
    function showErrors(errors) {
        $.each(errors, function (field, messages) {
            switch (field) {
                case "salutation": $("#salutationError").text(messages[0]); break;
                case "first_name": $("#FirstNameError").text(messages[0]); break;
                case "last_name": $("#lastnameError").text(messages[0]); break;
                case "gender": $("#GenderError").text(messages[0]); break;
                case "mobile": $("#PhoneNoError").text(messages[0]); break;
                case "EmailAddress": $("#EmailError").text(messages[0]); break;
                case "address": $("#AddressError").text(messages[0]); break;
                case "state": $("#StateError").text(messages[0]); break;
                // case "district": $("#DistrictError").text(messages[0]); break;
                case "pincode": $("#PincodeError").text(messages[0]); break;
            }
        });
    }

    // ✅ Live validation on keyup + change
    form.find("input, select, textarea").on("keyup change", function () {
        let field = $(this).attr("id");
        let value = $(this).val().trim();

        console.log(value.length);
        return false;
        

        switch (field) {
            case "PhoneNo":
            if (value.length == 0) {
                $("#PhoneNoError").text(""); // don’t show error if empty (user still typing)
            } else if (value.length < 10) {
                $("#PhoneNoError").text("Mobile number must be 10 digits.");
            } else if (!/^[6-9]\d{9}$/.test(value)) {
                $("#PhoneNoError").text("Enter a valid 10-digit mobile number starting with 6–9.");
            } else {
                $("#PhoneNoError").text("");
            }
            break;

            case "EmailAddress":
                if (value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
                    $("#EmailError").text("Enter a valid email address.");
                } else {
                    $("#EmailError").text("");
                }
                break;

            case "first_name":
                if (value && !/^[A-Za-z\s]+$/.test(value)) {
                    $("#FirstNameError").text("Only alphabets and spaces are allowed.");
                } else {
                    $("#FirstNameError").text("");
                }
                break;

            case "lastname":
                if (value && !/^[A-Za-z\s]+$/.test(value)) {
                    $("#lastnameError").text("Only alphabets and spaces are allowed.");
                } else {
                    $("#lastnameError").text("");
                }
                break;

             case "Address":
                if (!value) {
                    $("#AddressError").text("Address is required.");
                } else {
                    $("#AddressError").text("");
                }
                break;

             case "state":
                if (!value) {
                    $("#StateError").text("Please select a state.");
                } else {
                    $("#StateError").text("");
                }
                break;

            case "district":
                if (!value) {
                    $("#DistrictError").text("Please select a district.");
                } else {
                    $("#DistrictError").text("");
                }
                break;

            case "pincode":
                if (!/^\d{6}$/.test(value)) {
                    $("#PincodeError").text("Enter a valid 6-digit pincode.");
                } else {
                    $("#PincodeError").text("");
                }
                break;

        }
    });

    // ✅ Submit handler
    form.submit(function (event) {
        event.preventDefault();
        clearErrors();

        let formData = {
            _token: "{{ csrf_token() }}",
            salutation: $("#salutation").val().trim(),
            first_name: $("#first_name").val().trim(),
            last_name: $("#lastname").val().trim(),
            gender: $("input[name='gender']:checked").val(),
            mobile: $("#PhoneNo").val().trim(),
            EmailAddress: $("#EmailAddress").val().trim(),
            Address: $("#Address").val().trim(),
            state: $("#state").val(),
            district: $("#district").val(),
            pincode: $("#pincode").val().trim(),
        };

        $.ajax({
            type: "POST",
            url: "{{ route('register.store') }}",
            data: formData,
            success: function (response) {
                if (response.success) {
                    $("#login-id-display").text(response.login_id);
                    $("#success-popup, #overlay").fadeIn();
                }
            },
            error: function (xhr) {
                if (xhr.responseJSON?.errors) {
                    showErrors(xhr.responseJSON.errors);
                }
            },
        });
    });
});



const firstName = document.getElementById("first_name");
const error = document.getElementById("FirstNameError");

firstName.addEventListener("input", function () {
    if (/^[A-Za-z\s]*$/.test(this.value)) {
        error.textContent = "";
    } else {
        // error.textContent = "Only letters are allowed";
        this.value = this.value.replace(/[^A-Za-z\s]/g, "");
    }
});

// ---------lastname---------------

const lastname = document.getElementById("lastname");
const lastnameError = document.getElementById("lastnameError");

lastname.addEventListener("input", function () {
    if (/^[A-Za-z\s]*$/.test(this.value)) {
        lastnameError.textContent = "";
    } 
    
    else {
        // lastnameError.textContent = "Only letters are allowed";
        this.value = this.value.replace(/[^A-Za-z\s]/g, "");
    }
});


// -----------pincode----------

const pincode = document.getElementById("pincode");
const pincodeError = document.getElementById("PincodeError");

pincode.addEventListener("input", function () {
    this.value = this.value.replace(/[^0-9]/g, "");

    if (this.value.length === 6) {
        pincodeError.textContent = "";
    } else {
        // pincodeError.textContent = "Pincode must be exactly 6 digits";
    }
});


$(document).ready(function () {

    $('#state').on('change', function () {
        let state = $(this).val();

        if (state === 'Tamil Nadu') {
            $('#districtRow').slideDown();
        } else {
            $('#districtRow').slideUp();
            $('#district').val(''); // reset district
        }
    });

});
</script>