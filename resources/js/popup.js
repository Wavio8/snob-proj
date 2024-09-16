const popupInit = () => {
    const popups = document.querySelectorAll("._popup");
    try {
        popups.forEach((popup) => {
            popup.querySelector("._popup__content").onclick = (e) => {
                e.stopPropagation();
            };
            popup.onclick = () => {
                popup.classList.add("hidden");
                document.body.classList.remove("overflow");
            };
        });
    } catch (error) {
        console.log("popupInit error");
    }
};
export default popupInit;
