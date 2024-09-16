// import slidersInit from "./splide";
// import clickInit from "./click";

// import burgerMenuItit from "./menu";
// import { scrollByInit, toUpInit } from "./scroll";
// import { closeInit, openInit } from "./openClose";
// import popupInit from "./popup";
// import selectorInit from "./selector";
// import filterInit from "./filter";
import "../scss/app.scss";
import componentsInit from "./components";
import {SlideNumber} from "./splideNum";
import sliders2Init from "./splide2";
import mapInit from "./map";
import burgerOn from "./burger";
import popupInit from "./popup";
import slidersInit from "./sliders";
import scrollGsap from "./scrollGsap";
import gsapAnimation from "./gsapAnimation";

const start = () => {

  burgerOn();
  slidersInit();
  scrollGsap();
  gsapAnimation();

  // slidersInit();
  // popupInit();
  // openInit();
  // closeInit();
  // selectorInit();
  // filterInit();
  //   clickInit();
  // scrollByInit();
  // toUpInit();
  // const menu = burgerMenuItit();
  // menu.open();
  sliders2Init();
  mapInit();


  componentsInit();

  console.log("loaded");
};

document.addEventListener("DOMContentLoaded", start);
