# Тестовое задание
Консольное приложение с использованием symfony, которое находит все файлы с именем count, достаёт из них все цифры из них складывает их и выводит в консоль \n
Приложение можно запустить несколькими способами: \n
1. Командой ```php console.php``` count \n
2. Командой ```./console.php``` count из bash \n
3. Из контейнера собрав образ: ```docker build -f Dockerfile -t my-php-app:v1.0 .``` и запустив его ```docker run my-php-app:v1.0```