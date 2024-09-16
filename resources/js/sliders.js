import "@splidejs/splide/css/core";
import Splide from "@splidejs/splide";
import { gsap } from "gsap";
const slidersInit = () => {
    var splide = new Splide('#image-carousel', {
        perPage: 3,
        type: 'loop',
        rewind: true,
        cloneStatus: false,
        // rewind:true,
        focus: 'center',
        speed: 0,
        drag: false,
        updateOnMove: true,
        // waitForTransition:true,
        perMove: 1,
        gap: 5,
        pagination: false,
        breakpoints: {
            769: {
                perPage: 1,
                drag: true,
                updateOnMove: false,
                cloneStatus: true,
                gap: 0,
                speed: 400,
            },
        }
        // wheel:true,
        // autoWidth:true,
        // padding:10,
        // gap: -50,
        // wheel: true,
        // padding: { left: '33.3%', right: "33.3%" },

    }).mount();
    let mm = gsap.matchMedia();

    splide.on('moved', function () {
        mm.add("(min-width: 770px)", () => {
            const card = document.querySelector("#image-carousel .splide__slide.is-prev");
            // const cardActive= document.querySelector("#image-carousel .splide__slide.is-active");
            const cardNext = document.querySelector("#image-carousel .splide__slide.is-next");

            gsap.from(card, {
                x: 40,

            });
            gsap.from(cardNext, {
                x: -40,
                // xPercent: -10,
                //
                // duration: 1,

            });
        });

    });
    new Splide('#slider3', {
        perPage: 7,
        type: 'loop',
        gap: 18,
        padding: {left: "0.9%", right: "8.1%"},
        pagination: false,
        arrows: false,
        wheel: true,
        perMove: 1,
        breakpoints: {
            1024: {
                perPage: 6,
            },
            900: {
                perPage: 5,
                gap: 13,
            },
            600: {
                perPage: 4,
                gap: 8,
            },
            500: {
                perPage: 3,
                gap: 5,
            },
        }
    }).mount();
    new Splide('#slider4', {
        perPage: 7,
        type: 'loop',
        gap: 18,
        padding: {left: '7.8%', right: "1.5%"},
        pagination: false,
        arrows: false,
        wheel: true,
        perMove: 1,
        breakpoints: {
            1024: {
                perPage: 6,
            },
            900: {
                perPage: 5,
                gap: 13,
            },
            600: {
                perPage: 4,
                gap: 8,
            },
            500: {
                perPage: 3,
                gap: 5,
            },
        }
    }).mount();

};
export default slidersInit;