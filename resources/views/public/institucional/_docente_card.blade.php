<div class="docente-card-new">
    <div class="docente-photo-wrapper">
        @if($docente->foto)
            <img src="{{ asset('storage/' . $docente->foto) }}" alt="{{ $docente->nombre }}">
        @else
            <div class="docente-placeholder">
                <svg viewBox="0 0 24 24" width="40" height="40" fill="currentColor">
                    <path
                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                </svg>
            </div>
        @endif
    </div>
    <div class="docente-info">
        <div class="docente-name-row">
            <svg class="docente-icon" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                <path
                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
            </svg>
            <h4 class="docente-name">{{ $docente->nombre }}</h4>
        </div>

        @if($docente->email)
            <div class="docente-email-row">
                <svg class="email-icon" viewBox="0 0 24 24" width="14" height="14" fill="currentColor">
                    <path
                        d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                </svg>
                <span class="docente-email">{{ $docente->email }}</span>
            </div>
        @endif

        @if($docente->cv_pdf)
            <a href="{{ asset('storage/' . $docente->cv_pdf) }}" target="_blank" class="btn-cv">
                <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                    <path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z" />
                </svg>
                <span>Hoja de vida</span>
            </a>
        @else
            <div class="btn-cv-disabled">
                <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                    <path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z" />
                </svg>
                <span>Hoja de vida</span>
            </div>
        @endif
    </div>
</div>