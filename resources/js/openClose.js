export const closeInit = () => {
    const close = document.querySelectorAll("._close");
    try {
        close.forEach((oneClose) => {
            oneClose.onclick = (e) => e.stopPropagation();
            if (oneClose.getAttribute("for")) {
                const el = document.getElementById(
                    oneClose.getAttribute("for")
                );
                if (el.classList.contains("_popup")) {
                    oneClose.onclick = () => el.click();
                } else {
                    oneClose.onclick = () => el.classList.add("hidden");
                }
            } else {
                oneClose.onclick = () =>
                    oneClose.parentElement.classList.add("hidden");
            }
        });
    } catch (error) {
        console.log("closeInit error");
    }
};
export const openInit = () => {
    const open = document.querySelectorAll("._open");
    try {
        open.forEach((oneOpen) => {
            if (oneOpen.getAttribute("for")) {
                const el = document.getElementById(oneOpen.getAttribute("for"));
                // console.log(el.classList.contains("_popup"));

                if (el.classList.contains("_popup")) {
                    oneOpen.onclick = (e) => {
                        if (!e.target.classList.contains("_close")) {
                            document.body.classList.add("overflow");
                            el.classList.remove("hidden");
                        }
                    };
                } else {
                    oneOpen.onclick = () => el.classList.remove("hidden");
                }
            }
        });
    } catch (error) {
        console.log("openInit error");
    }
};
