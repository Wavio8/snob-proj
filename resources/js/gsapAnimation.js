import { gsap } from "gsap";
const gsapAnimation = () => {
    let mm = gsap.matchMedia();
document.querySelectorAll(".solution-card").forEach((link) => {
    const cardBg = link.querySelector(".solution-card__bg");
    const arrBg = link.querySelector(".open__arr");
    const openArrGrey = link.querySelector(".open__arrGrey");
    gsap.to(cardBg, {
        yPercent: 130,
    });
    gsap.to(arrBg, {
        scaleX: 0,
        scaleY: 0,
    });
    gsap.to(openArrGrey, {
        scaleX: 1,
        scaleY: 1,
    });
    link.addEventListener("mouseenter", function () {
        mm.add("(min-width: 1px)", () => {
            gsap.to(link, {
                height: '400px',
                duration: 1,
                ease: "power2.out"
            })
        });

        mm.add("(min-width: 1025px)", () => {
            gsap.to(link, {
                height: '479px',
                duration: 1,
                ease: "power2.out"
            })
        });
        gsap.to(arrBg, {
            scaleX: 1,
            scaleY: 1,
            duration: 1,
            ease: "power2.out"
        });
        gsap.to(openArrGrey, {
            scaleX: 0,
            scaleY: 0,
            duration: 1,
            ease: "power2.out"
        });

        gsap.to(cardBg, {
            yPercent: 0,
            duration: 1,
            ease: "power2.out"
        });
    });
    link.addEventListener("mouseleave", function () {
        mm.add("(min-width: 1px)", () => {
            gsap.to(link, {
                height: '270px',
                duration: 1,
                ease: "power2.out"
            })
        });
        mm.add("(min-width: 1025px)", () => {
            gsap.to(link, {
                height: '350px',
                duration: 1,
                ease: "power2.out"
            })
        });
        gsap.to(arrBg, {
            scaleX: 0,
            scaleY: 0,
            duration: 1,
            ease: "power2.out"
        });
        gsap.to(openArrGrey, {
            scaleX: 1,
            scaleY: 1,
            duration: 1,
            ease: "power2.out"
        });

        gsap.to(cardBg, {
            yPercent: 130,
            duration: 1.5,
            ease: "power2.out"
        });
    });
})
};
export default gsapAnimation;