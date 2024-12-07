<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Слайд 1</title>
    <style>
        #slide-1 {
            height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-family: Arial, sans-serif;
            font-size: 2rem;
            text-align: center;
        }

        #slide-1 .content {
            width: 100%; 
            height: 100%; 
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .video-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .slide-1 {
            position: relative;
            height: 100vh;
            width: 100vw;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden; 
        }


        .first-slide .content {
            position: relative;
            z-index: 1;
            text-align: center;
            color: white;
            font-family: Arial, sans-serif;
            font-size: 2rem;
        }

        /* Стили для видео */
        .first-slide .video-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; 
            z-index: -1;
        }

        .content {
            z-index: 1;
        }
    </style>
</head>
<body>
    <div class="first-slide">
        <video class="video-background" autoplay muted loop poster="resources/videos/poster.jpg">
            <source src="resources/videos/background-vid-720.mp4" type="video/mp4">
            Ваш браузер не поддерживает видео. Пожалуйста, обновите браузер.
        </video>
        <div class="content">
            Слайд 1
        </div>
    </div>
</body>
</html>
