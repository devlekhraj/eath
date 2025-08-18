<div class="modal-body p-4">
    <div class="card border-0 rounded-4 h-100">
        <div class="card-body d-flex flex-column justify-content-center align-items-center text-center p-5">
            <div class="success-icon mb-3">
                <i class="fa-solid fa-circle-check fa-4x text-success"></i>
            </div>
            <h4 class="fw-bold text-dark mb-2">Inquiry Submitted!</h4>
            <p class="text-muted mb-4">
                Thank you for reaching out to us. Our team will get back to you as soon as possible.
            </p>
            <button type="button" class="btn btn-success px-4 fw-semibold" data-bs-dismiss="modal">
                Close
            </button>
        </div>
    </div>
</div>

<style>
    /* Smooth icon animation */
    .success-icon i {
        animation: popScale 0.5s ease-out;
    }

    @keyframes popScale {
        0% {
            transform: scale(0.5);
            opacity: 0;
        }

        70% {
            transform: scale(1.2);
            opacity: 1;
        }

        100% {
            transform: scale(1);
        }
    }

    .modal-body .card {
        background: linear-gradient(135deg, #f8fff9, #ffffff);
    }
</style>
