const selectorInit = () => {
  const selectors = document.querySelectorAll("._selector");
  try {
    selectors.forEach((selector) => {
      const selectorItems = selector.querySelectorAll("._selector__item");

      const fn = (item) => {
        if (item.classList.contains("active")) {
          selectorItems.forEach((el) => el.classList.remove("active"));
        } else {
          selectorItems.forEach((el) => el.classList.remove("active"));
          item.classList.add("active");
        }
      };

      selectorItems.forEach((item) => {
        item.addEventListener("click", () => fn(item));
      });
    });
  } catch (error) {
    console.log("selectorInit error");
  }
};
export default selectorInit;
