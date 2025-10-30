<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../libs/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/pages/female.css">
    <title>Имя для девочки</title>
</head>

<body>
    <div class="header">
        <div class="name">
            <h1>
                <a href="./">Baby name</a>
            </h1>
        </div>

        <div class="header__text">
            <a href="./" class="header__text_button">
                <img src="/assets/arrow.svg" alt="Arrow">
            </a>
            <h3>Имена для девочки</h3>
        </div>
    </div>

    <section class="banner-section">
        <div class="banner">
            <div class="baby">
                <img src="/assets/babyGirl-PIMPED1.png" alt="baby boy">
            </div>
        </div>

        <div class="random-name">
            <div class="random-name__name-box">
                <h2 class="random-name__name"></h2>
            </div>
            <div class="random-name__buttons">
                <button class="random-name__button">Все имена</button>
                <button id="anotherFemaleName" class="random-name__button">Другое имя</button>
            </div>
        </div>
    </section>

    <section class="origin-section">
        <div class="origin-name">
            <p>Происхождение имени</p>
            <div class="origin-name__chevron">
                <img src="../assets/chevron.png" alt="Chevron">
            </div>
        </div>

        <div class="origin-tale">
            <p class="origin-tale__text"></p>
        </div>
    </section>


    <script type="module" src="../src/js/femaleNames.js"></script>
</body>

</html>