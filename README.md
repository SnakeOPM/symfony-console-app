# Тестовое задание
Консольное приложение с использованием symfony, которое находит все файлы с именем count, достаёт из них все цифры из них складывает их и выводит в консоль 
Приложение можно запустить несколькими способами: 
1. Командой ```php console.php``` count (Прежде всего подтянув зависимости с помощью ```composer install```)
2. Командой ```./console.php``` count из bash (Прежде всего подтянув зависимости с помощью ```composer install```)
3. Из контейнера собрав образ: ```docker build -f Dockerfile -t my-php-app:v1.0 .``` и запустив его ```docker run my-php-app:v1.0```