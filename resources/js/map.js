

const mapInit = () => {
    ymaps.ready(function () {
        const map = document.getElementById("contact-map");
        if (!map) return;
        // const coords = map.getAttribute("data-coordinates");
        // let tags;
        // try {
        //     tags = JSON.parse(coords);
        //     tags = tags.map((tag) => tag.split(","));
        // } catch (error) {
        //     tags = [[59.93211, 30.308272]];
        // }
        var myMap = new ymaps.Map(
                "contact-map",
                {
                    center: [59.93635557234915,30.31765784398402],
                    zoom: 14
                },
                // {
                //     searchControlProvider: "yandex#search"
                // }
            );
        // myMap.controls.remove('geolocationControl'); // удаляем геолокацию
        myMap.controls.remove('searchControl'); // удаляем поиск
        myMap.controls.remove('trafficControl'); // удаляем контроль трафика
        myMap.controls.remove('typeSelector'); // удаляем тип
        myMap.controls.remove('fullscreenControl'); // удаляем кнопку перехода в полноэкранный режим
        // myMap.controls.remove('zoomControl'); // удаляем контрол зуммирования
        myMap.controls.remove('rulerControl'); // удаляем контрол правил

            // // Создаём макет содержимого.
            // MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
            //     '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
            // );

        let myPlacemarkWithContent = new ymaps.Placemark([59.937130834238324,30.31199301854456], {}, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: '/images/icon_map.svg',
            // Размеры метки.
            iconImageSize: [80, 91],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.
            // iconContentOffset: [15, 15],
            // // Макет содержимого.
            // iconContentLayout: MyIconContentLayout
        });
        myMap.geoObjects.add(myPlacemarkWithContent);

        // tags.forEach((tag) => {
        //     const myPlacemark = new ymaps.Placemark(
        //         tag,
        //         {
        //             // hintContent: 'Собственный значок метки',
        //             // balloonContent: 'Это красивая метка'
        //         },
        //         {
        //             // Опции.
        //             // Необходимо указать данный тип макета.
        //             iconLayout: "default#image",
        //             // iconImageHref: "/images/utility/test.png",
        //             // Своё изображение иконки метки.
        //             iconImageHref: "/images/utility/maptag.svg",
        //             // Размеры метки.
        //             iconImageSize: [140, 140],
        //             // Смещение левого верхнего угла иконки относительно
        //             // её "ножки" (точки привязки).
        //             // iconImageOffset: [-5, -38]
        //             iconImageOffset: [-50, -100]
        //         }
        //     );
        //     myMap.geoObjects.add(myPlacemark);
        // });
        // myMap.setZoom(myMap.getZoom() - 0.4);
        // .add(myPlacemarkWithContent);
    });
};

export default mapInit;
