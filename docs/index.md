## Установка

1. Склонируйте репозиторий и перейдите в папку проекта.

    ```bash
    git clone git@github.com:ruvents/ruwork-project.git ruwork-project
    cd ruwork-project
    ```

1. `composer install`.

1. В файле `.env` скорректируйте `DATABASE_URL`.

    ```dotenv
    DATABASE_URL="pgsql://user@password:5432/dbname?charset=utf8&serverVersion=9.6"
    ```

1. Если вы указали несуществующую базу, вы можете создать ее при помощи команды.

    ```bash
    bin/console doctrine:database:create
    ```

1. `composer sync`.

## Запуск локального сервера PHP

```bash
bin/console server:run
```

## Синхронизация изменений с репозиторием

1. Обновите локальный репозиторий.

    - В PhpStorm кнопка с синей стрелкой в правом верхнем углу окна

    - или `git pull --rebase`.

1. `composer sync`.
