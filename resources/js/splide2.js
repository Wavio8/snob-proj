import {SlideNumber} from "./splideNum";
import "@splidejs/splide/css/core";
import Splide from "@splidejs/splide";

const sliders2Init = () => {
    new Splide( '#slider2',{
        type   : 'loop',
        padding: '12.5%',
        gap: 60,
        speed:600,
        pagination:false,
        breakpoints: {
            1450: {
                padding: '10%',
                gap: 20,
            },
            1150: {
                padding: '6%',
                gap: 18,
            },
            1024: {
                padding: '2%',
                gap: 10,
            },
            900: {
                padding: '10%',
                gap: 20,
            },
            768: {
                padding: '6%',
                gap: 18,
            },
            700: {
                padding: '2%',
                gap: 10,
            },
            500: {
                perPage:1,
                padding: false,
                gap: 5,
            },
        }

    }).mount({SlideNumber});
};
export default sliders2Init;
