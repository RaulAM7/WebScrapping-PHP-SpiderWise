
# **SpiderWise**

![alt text](<SpiderWise/assets/styles/DALL·E 2024-11-28 14.48.32 - A professional and slightly anthropomorphic spider mascot for 'SpiderWise,' inspired by Clippy from Microsoft Office but less 'kawaii.' The spider has.webp>)

SpiderWise es un proyecto de **web scraping** desarrollado con **PHP Symfony** y la biblioteca **HttpBrowser** para recopilar información estructurada desde sitios web. Este repositorio incluye una implementación para scrapear múltiples páginas de un sitio específico y almacenar o analizar los datos extraídos.

## **Características**
- Scraping de múltiples páginas con soporte para rangos dinámicos.
- Extracción de contenido HTML completo y datos específicos de cada elemento.
- Modularidad a través de servicios en Symfony para facilitar la reutilización.
- Escalabilidad para manejar scraping de grandes volúmenes de datos.

## **Requisitos**
Asegúrate de tener instalados los siguientes componentes antes de comenzar:

- **PHP 8.1 o superior**
- **Composer**
- **Symfony CLI** (opcional, pero recomendado)
- Extensión **cURL** habilitada en PHP
- Navegador compatible con Symfony para desarrollo

## **Instalación**

Sigue estos pasos para clonar y configurar el proyecto:

1. **Clonar el repositorio:**
   ```bash
   git clone https://github.com/RaulAM7/WebScrapping-SpiderWise.git
   cd WebScrapping-SpiderWise
   ```

2. **Instalar las dependencias:**
   ```bash
   composer install
   ```

3. **Configurar variables de entorno:**
   Crea un archivo `.env.local` y configura las variables necesarias (si aplica).

4. **Iniciar el servidor de desarrollo:**
   Si tienes instalado Symfony CLI:
   ```bash
   symfony server:start
   ```
   O usa el servidor PHP integrado:
   ```bash
   php -S localhost:8000 -t public
   ```

## **Uso**

### **1. Scraping de empresas**
Puedes iniciar el scraping de empresas ejecutando las siguientes rutas desde tu navegador o usando herramientas como `Postman` o `curl`:

- **Scrapear todas las páginas:**
  Visita:
  ```
  http://localhost:8000/scrape-companies
  ```

- **Scrapear un rango de páginas personalizado:**
  Edita los parámetros `start` y `end` en el método `scrapeMultiplePagesCompanies` del servicio `BlogScraper`.

### **2. Resultados**
Los datos extraídos se mostrarán directamente en la página o en la terminal con el uso de `dd()` para depuración. Cada entrada incluirá:
- Nombre de la empresa
- Enlace principal
- Categoría o descripción
- Contenido HTML completo del bloque `company-list`

### **3. Extensión del scraper**
Para adaptar el scraper a otros sitios web:
1. Crea un nuevo método en el servicio `BlogScraper` o un nuevo servicio basado en `BaseScraper`.
2. Modifica los selectores CSS y la lógica según la estructura HTML del sitio objetivo.

## **Estructura del Proyecto**
- `src/Controller/ScrapingController.php`: Controlador que maneja las rutas de scraping.
- `src/Service/Scrapers/BaseScraper.php`: Servicio base para inicializar el cliente HTTP.
- `src/Service/Scrapers/BlogScraper.php`: Lógica del scraping, incluyendo el manejo de múltiples páginas.
- `templates/`: Plantillas Twig para renderizar los datos (opcional).

## **Dependencias**
Este proyecto utiliza las siguientes dependencias principales:
- [Symfony](https://symfony.com/) como framework PHP
- [HttpBrowser](https://symfony.com/doc/current/components/browser_kit.html) para manejar solicitudes HTTP
- [HttpClient](https://symfony.com/doc/current/http_client.html) para realizar solicitudes GET/POST

Instaladas con:
```bash
composer require symfony/browser-kit symfony/http-client
```

## **Límites a tener en cuenta**
- **Tiempo de ejecución:** Si el scraping incluye muchas páginas, ajusta el tiempo de ejecución con `set_time_limit()` o usa un comando Symfony para correr en segundo plano.
- **Evitar bloqueos:** Agrega pausas (`sleep`) entre solicitudes para evitar saturar el servidor objetivo.

## **Próximas updates!**
- **Escalabilidad:** Implementar almacenamiento en base de datos (Doctrine) para manejar datos masivos.
- **Mutabilidad:** Implementar más tipos de scrapeo de múltiples de tipos de fuentes
- **Flexibilidad:** Implementar cronjob para que la ejecución de los scrappings pueda ser flexible y no se limite a una ejecución 

## **Contribución**
¡Las contribuciones son bienvenidas! Por favor, abre un `Issue` o un `Pull Request` para sugerir mejoras o reportar errores.

O si lo prefieres escribeme a raulartilesm@gmail.com

## **Licencia**
Este proyecto está licenciado bajo la licencia MIT. Consulta el archivo `LICENSE` para más detalles.
