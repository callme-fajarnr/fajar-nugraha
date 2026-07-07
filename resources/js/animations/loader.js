import { gsap } from "./engine";

export function initLoader() {

    const wrapper = document.getElementById("loader-wrapper");
    const loader = document.getElementById("loader");

    if (!wrapper || !loader) return;

    // sementara matikan sessionStorage
    // supaya selalu muncul saat refresh

    const tl = gsap.timeline({
        onComplete: () => {
            wrapper.remove();
        }
    });

    tl.fromTo(".loader-name",
        {
            opacity: 0,
            y: 40
        },
        {
            opacity: 1,
            y: 0,
            duration: 1
        }
    );

    tl.fromTo(".loader-text",
        {
            opacity: 0,
            y: 20
        },
        {
            opacity: 1,
            y: 0,
            duration: 0.8
        },
        "-=0.5"
    );

    tl.to(loader, {
        opacity: 0,
        duration: 1,
        delay: 2
    });

}