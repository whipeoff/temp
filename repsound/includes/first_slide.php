<div class="first-slide">
    <video class="video-background" autoplay muted loop poster="resources/videos/poster.jpg">
        <source src="resources/videos/background-vid-720.mp4" type="video/mp4">
        Ваш браузер не поддерживает видео.
    </video>
    <div class="content d-flex flex-column justify-content-center align-items-center">
        <div class="logo-container">
            <h1 class="logo-title">REPSOUND</h1>
        </div>
        <div class="subtext-container">
            <p class="logo-subtitle">ремонт музыкальных инструментов и микшеров в серпухове</p>
        </div>
        <div class="buttons-container d-flex justify-content-center mt-4">
            <a href="#for_clients" class="custom-button side-button me-3">Оформить заявку</a>
            <a href="#about_us" class="custom-button central-button mx-3">Почему REPSOUND?</a>
            <a href="#news" class="custom-button side-button ms-3">Последние новости</a>
        </div>
    </div>
</div>

<style>
    .first-slide {
        position: relative;
        width: 100vw;
        height: 100vh;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
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

    .logo-container {
        background-color: rgba(0, 0, 0, 0.4);
        border: 1px solid #ffffff;
        border-radius: 40px;
        padding: 2vw 4vw;
        margin-bottom: 2vh;
    }

    .subtext-container {
        background-color: rgba(0, 0, 0, 0.4);
        border: 1px solid #ffffff;
        border-radius: 10px;
        padding: 1vw 2vw;
        margin-bottom: 5vh;
    }

    .logo-title {
        font-family: 'Inter', sans-serif;
        font-weight: 300;
        font-size: clamp(32px, 10vw, 128px);
        color: #ffffff;
        margin: 0;
        text-align: center;
    }

    .logo-subtitle {
        font-family: 'Inter', sans-serif;
        font-weight: 400;
        font-size: clamp(12px, 2.2vw, 24px);
        color: #ffffff;
        margin: 0;
        text-align: center;
    }

    .buttons-container {
        margin-top: 5vh;
        display: flex;
        gap: 20px;
    }

    .custom-button {
        background-color: rgba(0, 0, 0, 0.4);
        border: 1px solid #ffffff;
        border-radius: 40px;
        color: #ffffff;
        text-decoration: none;
        font-family: 'Inter', sans-serif;
        font-weight: 700;
        font-style: italic;
        font-size: clamp(12px, 1.5vw, 24px);
        text-align: center;
        transition: background-color 0.3s ease, transform 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .central-button {
        width: calc(10.4vw);
        height: calc(18.5vh);
    }

    .side-button {
        width: calc(7.8vw);
        height: calc(13.9vh);
    }

    .custom-button:hover {
        background-color: rgba(255, 255, 255, 0.1);
        transform: scale(1.05);
    }

    .custom-button:active {
        transform: scale(0.95);
    }
</style>
