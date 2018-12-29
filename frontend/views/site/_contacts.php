<section class="location">
    <div id="google-map" class="location__map"></div>
    <div class="container">
        <div class="location__feedback">
            <h3>Связаться с нами</h3>
            <div class="location__com-data">
                <p>ООО "Минимакс Электро"</p>
                <p>УНП 1000000000 от 00.00.2000 г.</p>
                <p>р/с BY27 BELB 1000 0000 0001 1000 в ОАО "НеБанк" г. Минск, ул. Такая-то, д.0</p>
            </div>
            <ul class="location__feedback-list">
                <li class="location__feedback-list-item pointer">
                    <p>г. Минск, ул. Семенова 35 - 31</p>
                </li>
                <li class="location__feedback-list-item mail">
                    <p>mav@minimax.by (отдел продаж)</p>
                    <p>info@minimax.by (для коммерческих предложений)</p>
                </li>
                <li class="location__feedback-list-item phone">
                    <p>+375 29 000 00 00 (отдел продаж)</p>
                    <p>+375 44 000 00 00 (отдел покупок)</p>
                </li>
            </ul>
        </div>
    </div>

    <script src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>
    <script type="text/javascript">
        ymaps.ready(init);

        function init() {
            let myMap = new ymaps.Map("google-map", {
                center: [53.872045, 27.57],
                zoom: 16
            }, {
                searchControlProvider: 'yandex#search'
            });

            myMap.geoObjects
                .add(new ymaps.Placemark([53.871355, 27.577058]));
        }
    </script>
</section>