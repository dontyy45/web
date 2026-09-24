document.addEventListener("DOMContentLoaded", function () {

    /* =========================
       NAVBAR SAAT SCROLL
    ========================= */

    const navbar = document.querySelector(".navbar");

    function cekNavbar() {

        if (!navbar) return;

        if (window.scrollY > 30) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    }

    window.addEventListener("scroll", cekNavbar);

    cekNavbar();


    /* =========================
       ANIMASI SAAT SCROLL
    ========================= */

    const animatedElements = document.querySelectorAll(
        ".card, .feature-box, .schedule-item, .step, .stat, .stat-box"
    );

    const observer = new IntersectionObserver(
        function (entries) {

            entries.forEach(function (entry) {

                if (entry.isIntersecting) {

                    entry.target.classList.add("show");

                }

            });

        },
        {
            threshold: 0.15
        }
    );


    animatedElements.forEach(function (element) {

        observer.observe(element);

    });


    /* =========================
       TOMBOL KE ATAS
    ========================= */

    const scrollTopButton =
        document.createElement("button");

    scrollTopButton.className = "scroll-top";

    scrollTopButton.innerHTML = "↑";

    scrollTopButton.setAttribute(
        "aria-label",
        "Kembali ke atas"
    );

    document.body.appendChild(
        scrollTopButton
    );


    window.addEventListener("scroll", function () {

        if (window.scrollY > 400) {

            scrollTopButton.classList.add(
                "show"
            );

        } else {

            scrollTopButton.classList.remove(
                "show"
            );

        }

    });


    scrollTopButton.addEventListener(
        "click",
        function () {

            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });

        }
    );


    /* =========================
       SPONSOR PAUSE SAAT MOUSE
    ========================= */

    const sponsorTrack =
        document.querySelector(".sponsor-track");

    if (sponsorTrack) {

        sponsorTrack.addEventListener(
            "mouseenter",
            function () {

                sponsorTrack.style.animationPlayState =
                    "paused";

            }
        );

        sponsorTrack.addEventListener(
            "mouseleave",
            function () {

                sponsorTrack.style.animationPlayState =
                    "running";

            }
        );

    }


    /* =========================
       EFEK TOMBOL
    ========================= */

    const buttons =
        document.querySelectorAll(
            ".btn-primary, .hero-btn-primary, .nav-btn"
        );

    buttons.forEach(function (button) {

        button.addEventListener(
            "mouseenter",
            function () {

                button.style.transition =
                    "transform .2s ease";

            }
        );

    });

});