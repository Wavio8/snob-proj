import { gsap } from "gsap";
const scrollGsap = () => {
let container = document.querySelector(".section-solutions");
gsap.registerPlugin(ScrollTrigger);
let sections = gsap.utils.toArray(".solution-card");
let mm = gsap.matchMedia();
mm.add("(min-width: 769px)", () => {
    gsap.to(sections, {
        x: () => -(container.scrollWidth - document.documentElement.clientWidth + 350) + "px",
        ease: "none",
        duration: 5,
        scrollTrigger: {
            trigger: container,
            scrub: 1,
            snap: 1 / (container.length - 1),
            pin: true,
            start: "top left",
            end: "+=100%",
        }
    });
});
};
export default scrollGsap;