# Laravel Project

Это проект на Laravel, простая имплементация hh, использующий SQLite для хранения данных. В нем реализован базовый CRUD функционал для записей + аутентификация/авторизация.

## Стек технологий

-   PHP
-   Laravel
-   SQLite
-   Blade
-   Tailwind CSS

## Установка

### 1. Клонирование репозитория:

```
-   git clone https://github.com/ValeryLegkov/LG-project.git
-   cd introproject
```

### 2. Установка зависимостей

-   `composer install`

### 3. Настройка окружения / Создайте файл .env на основе .env.example:

-   cp .env.example .env

### 4. Настройте подключение к базе данных SQLite в .env:

```
-   DB_CONNECTION=sqlite
-   DB_DATABASE=/path_to_your_database/database.sqlite
```

### 5. Создайте файл базы данных, если его еще нет:

```
-   touch database/database.sqlite
```

### 6. Миграции и сиды

##### Для создания таблиц и начальных данных - запустите миграции и сиды:

```
-   php artisan migrate
```

### 7. Запуск сервера

```
-   php artisan serve
```

## Использование

### В проекте реализованы следующие функциональности:

-   **Логин и регистрация** — вход и регистрация пользователей.(НЕ используется Breeze/Jetstream/Sanctum)
-   **Добавление записи** — создание новых записей.
-   **Просмотр записей** — отображение списка записей из базы данных.
-   **Редактирование записи** — изменение существующих записей.
-   **Удаление записи** — удаление записей из базы данных.

> реализован подход Mobile First

### Структура проекта

-   app/ — логика приложения (контроллеры, модели и другие компоненты).
-   resources/views/ — шаблоны Blade для отображения данных.
-   database/migrations/ — миграции для создания таблиц базы данных.
-   database/seeders/ — сиды для начальных данных.

## Зависимости

```
  - Laravel Version - 11.40.0
  - PHP - 8.4.2
  - Composer - 2.8.4
```
