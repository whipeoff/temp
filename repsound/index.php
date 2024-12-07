<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lazyload parasha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&display=swap" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            scroll-behavior: smooth;
            visibility: hidden;
        }

        .snap-container {
            height: 100vh; 
            overflow-y: scroll; 
            scroll-snap-type: y mandatory;
            scrollbar-width: none; /
        }

        .snap-container::-webkit-scrollbar {
            display: none; 
        }

        section {
            height: 100vh; 
            width: 100vw; 
            display: flex;
            align-items: center;
            justify-content: center;
            scroll-snap-align: start;
            position: relative;
            overflow: hidden; 
        }

        .loading {
            text-align: center;
            font-size: 2rem;
            color: gray;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.body.style.visibility = 'visible';
        });

        document.addEventListener("DOMContentLoaded", () => {
            const sections = document.querySelectorAll('section[data-include]');
            sections.forEach(section => {
                const observer = new IntersectionObserver(entries => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const url = section.getAttribute('data-include');
                            fetch(url)
                                .then(response => response.text())
                                .then(data => {
                                    section.innerHTML = data;
                                })
                                .catch(error => {
                                    section.innerHTML = `<p class="text-danger">Ошибка загрузки контента: ${error}</p>`;
                                });
                            observer.unobserve(entry.target);
                        }
                    });
                });
                observer.observe(section);
            });
        });
    </script>
</head>
<body>
    <div class="snap-container">
        <section class="slide-1" data-include="includes/first_slide.php"></section>
        <section id="about_us" class="slide-2" data-include="includes/about_us.php"></section>
        <section id="news" class="slide-3" data-include="includes/news.php"></section>
        <section class="slide-4" data-include="includes/history.php"></section>
        <section id="for_clients" class="slide-5" data-include="includes/for_clients.php"></section>
    </div>
</body>
</html>
