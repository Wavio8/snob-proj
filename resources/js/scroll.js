import smoothscroll from "smoothscroll-polyfill";
smoothscroll.polyfill();
const scrollBy = (scroll) => {
  window.scroll({ top: scroll, behavior: "smooth" });
};
export const scrollByInit = () => {
  const links = document.querySelectorAll("a");
  links.forEach((link) => {
    try {
      const href = link.href.split("#")[1];
      if (href)
        link.onclick = (e) => {
          const target = document.querySelector(`#${href}`);
          if (target) {
            e.preventDefault();
            scrollBy(target.offsetTop);
          }
        };
    } catch (error) {}
  });
};
export const toUpInit = () => {
  const btn = document.querySelector(".toup");
  const btnfade = () => {
    if (window.scrollY >= 200) {
      btn.classList.add("active");
    } else {
      btn.classList.remove("active");
    }
  };
  btnfade();
  window.addEventListener("scroll", btnfade);
};
