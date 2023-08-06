# Verivox Task

Task for Verivox

## Installation

Just clone the repository.

Go to the root of the folder and run the following

```docker
docker-compose up -d
```

Docker will complete the installation of required environment configurations. Once done, head on to:

```sh
http://127.0.0.1/
```

and verify if default laravel page is being shown. If it is then it's running perfectly.

Now the task can be accessed.

Route created for tariff comparison:

```web
http://127.0.0.1/api/electricity-prices/{consumption}
```

Replace consumption with required value and the result will be return in JSON format.

If there is any issue in setting up, please let me know.
