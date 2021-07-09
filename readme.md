# Sección Amarilla

Sección amarilla es un proyecto universitario que sirve como directorio de empresas el cual simula la funcionalidad de [seccionamarilla.com.mx](https://www.seccionamarilla.com.mx/)

## Contenido
Durante el desarrollo de este proyecto en la Universidad Interamericana para el Desarrollo [UNID](https://www.unid.edu.mx/) solamante se pedía que fuera un sitio web en el cual se pudiera registrar empresas y poderlas visualizar por categorías, yo fui mas allá con las especificaciones y agregué lo siguiente:

## Carateristicas
* PWA: 
    * Instalación en dispositivos móviles.
    * Guardar la información sí se encuentra offline y subirla posteriormente cuando se recupere la señal automaticamente.
    * Tomar fotos sobre la empresa que se desea publicar.
* Autorización por admin sobre empresas que otros usuarios han agregado anonimamente.
* Poder visualizar en un iframe la ubicación de la empresa.

## TODO's
* Usar la API de google maps para usar coordenadas.
* Rediseñar la navegación por categorías, (actualmente solo se puede navergar por 3 categorías).
* Multiidioma.
* Crear un script para automatizar la instalación del proyecto.

## Demo
Si le interesa ver este proyecto en live puede visitar [seccion-amarilla.chrisamaya.com.mx](https://seccion-amarilla.chrisamaya.com.mx)
Para entrar al panel de administración `/login`

```
User: admin
Pass: 12345
```

## Instalación

### Requerimientos
* PHP > 5
* Apache2


Clonar el repositorio con:
```powershell
git clone https://github.com/chris-amaya/pwa-seccion-amarilla.git
```

crear el siguiente archivo `/etc/apache2/sites-available/seccion_amarilla.localhost.conf`
con el siguiente contenido

```apache
<VirtualHost *:80>
        ServerAdmin webmaster@localhost
        DocumentRoot /var/www/html/pwa-seccion-amarilla

        ServerName seccion.localhost
        ServerAlias seccion.localhost
	
	<Directory /var/www/html/pwa-seccion-amarilla>
	        AllowOverride all
		Require all granted
	</Directory>

        ErrorLog ${APACHE_LOG_DIR}/error.log
	CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

```
a2ensite seccion_amarilla.localhost.conf
systemctl reload apache2
```

ir a la siguiente ruta en el navegador [seccion.localhost](http://seccion.localhost)

## Notas
* Para poder agregar la ubicación de una empresa 
    * Ir a [Google Maps](https://maps.google.com).
    * Seleccionar la ubicación.
    * Seleccionar el panel izquierdo.
    * Seleccionar la opción `Compartir o incorporar mapa`
    * Incorporar Mapa
    * Copiar el `src` de la etiqueta `<iframe>`.
    * Pegar el contenido en el campo coordenadas.
* Las empresas no se visualizaran al menos que hayan sido confirmadas/autorizadas por el admin