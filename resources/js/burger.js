const burgerOn = () => {
    const popup = document.querySelector(".burger");
    try {
        popup.querySelector(".burger-cont").onclick = (e) => {
            e.stopPropagation();
        };
        popup.onclick = () => {
            console.log("aaaa");
            // popup.classList.add("hidden");
            // document.body.classList.remove("overflow");
            popup.classList.remove("show-burger");
            document.querySelector(".body1").classList.remove("show-burger__body");
            document.querySelector(".burger-block__header").classList.remove("burger__animation");
        };

    } catch (error) {
        console.log("popupInit error");
    }
    const burgerA = document.querySelectorAll(".burger-on");
    const burgerBlock = document.querySelectorAll(".burger");
    try {
        burgerA.forEach(function (section) {
            var fn = function fn() {
                burgerBlock.forEach(function (el) {
                    var hrItems = el.querySelectorAll(".hr1");
                    hrItems.forEach(function () {
                    })
                    if (el.id == 'burg') {
                        if (el.classList.contains('show-burger')) {
                            document.getElementById(el.id).classList.remove("show-burger");
                            document.querySelector(".body1").classList.remove("show-burger__body");
                            document.querySelector(".burger-block__header").classList.remove("burger__animation");
                        } else {
                            document.querySelector(".burger-block__header").classList.add("burger__animation");
                            document.getElementById(el.id).classList.add("show-burger");
                            document.querySelector(".body1").classList.add("show-burger__body");


                        }
                    }
                })
            };
            section.addEventListener("click", function () {
                return fn();
            })
        });
        burgerBlock.forEach(function (el) {
            var hrItems = el.querySelectorAll(".hr1");
            hrItems.forEach(function (el2) {
                var fn2 = function fn2() {
                    document.getElementById(el.id).classList.remove("show-burger");
                    document.querySelector(".body1").classList.remove("show-burger__body");
                    document.querySelector(".burger-block__header").classList.remove("burger__animation");

                }
                el2.addEventListener("click", function () {
                    return fn2();
                })
            })
        });
    } catch (error) {
        console.log("selectorInit error");
    }
};
export default burgerOn;
