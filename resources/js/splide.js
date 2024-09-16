// import "@splidejs/splide/css";
import "@splidejs/splide/css/core";
import Splide from "@splidejs/splide";

const slidersInit = () => {
  const sliders = document.getElementsByClassName("splide");
  const params = {
    // pagination: false,
    // perPage: 3,
    // breakpoints: {
    //   1600: {
    //     perPage: 3,
    //   },
    //   900: {
    //     perPage: 2,
    //   },
    //   700: {
    //     perPage: 1,
    //   },
    // },
    // direction: "ttb",
    // arrows: false,
    // pagination: false,
    // wheel: true,
    // releaseWheel: true,
    // focus: 0,
    // omitEnd: true,
    // type: "loop",
    // perPage: "auto",
    // height: "500px",
    // width: "100%",
    // fixedWidth: 320,
    // gap: "0px",
    // perPage: 1,
    // gap: "40px",
    // type: "loop",
    // pagination: true,
    // autoplay: true,
    // interval: 10000,
    // speed: 2000,
    // pauseOnFocus: false,
    // pauseOnHover: false,
  };
  try {
    for (let i = 0; i < sliders.length; i += 1) {
      const splide = new Splide(sliders[i]);
      if (sliders[i].classList.contains("_ms-cp")) {
        //   // const customPagination = document.querySelector(".paginationdata");
        //   // const customList = customPagination.querySelectorAll("li");
        //   splide.on("pagination:mounted", function (data) {
        //     // You can add your class to the UL element
        //     // data.list.classList.add("splide__pagination--custom");
        //     // // `items` contains all dot items
        //     // data.items.forEach(function (item, index) {
        //     //   console.log(index);
        //     //   console.log(customList);
        //     //   item.button.innerHTML = customList[index].innerHTML;
        //     // });
        //   });
      }
      // if (sliders[i].classList.contains("_ms-as")) {
      //   params.AutoScroll = AutoScroll;
      // }
      splide.mount(params);
    }
  } catch (error) {
    console.log("slidersInit error");
    console.log(error);
  }
};
export default slidersInit;
