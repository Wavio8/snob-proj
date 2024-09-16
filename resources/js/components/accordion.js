const accordionInit = () => {
  const accordions = document.querySelectorAll("._accordion");
  accordions.forEach((accordion) => {
    const head = accordion.querySelector("._accordion__head");
    const body = accordion.querySelector("._accordion__body");

    head.addEventListener("click", function () {
      accordion.classList.toggle("active");
      if (body.style.maxHeight) {
        body.style.maxHeight = null;
      } else {
        body.style.maxHeight = body.scrollHeight + "px";
      }
    });
  });
};

export default accordionInit;
