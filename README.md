# Waveform Generator API

The program read .txt files and return JSON data.

## Build technologies

- **PHP** language 7.3|8.0 version
- **Laravel** framework v8.54

## Setup

### Manual steps

1. Clone or download project from https://github.com/KrasimiraGeorgieva/waveform-generator.git
2. Copy **.env.example** file and rename it as **.env**
3. Open the console/terminal into the root directory of the project
4. Run `composer install` command
5. Run `php artisan key:generate` command
6. Make sure you’ve started your local server
- Configuring your local Laravel development environment(Homstead, Valet)
- To start Laravel Development server run `php artisan serve` command
7. Open Postman app
8. Add request with method GET and enter URL http://<local_domain>/api/v1/generator
9. Done!


### Postman

The **Waveform Generator API** can be used by Postman app


```
-----------------------------------------------------------------
|Method		| Route			|
-----------------------------------------------------------------
|GET		| /api/v1/generator	| Retrieves result data
|		|			|
-----------------------------------------------------------------
```
