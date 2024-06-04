
# boletera_spivet

Repositorio privado para actualización y/o despliegue de herramienta boletera SPIVET - Derechos Reservados



## Instalación

### Requisitos de instalacion
Bases de datos : **mysql, mariadb**

Version de php : **8.0, 8.1**


### Clonación del proyecto (Opción 1)

Clonar el repositorio en la carpeta raiz de su servidor ya sea localmente o en linea
```bash
  git clone <link_del_repositorio>
```
_**Nota:** Es importante que la carpeta del proyecto se encuentre en raiz o que el dominio apunte a la carpeta directamente_
### Descargando el archivo .zip (Opción 2)

**1.-** Copiar el archivo de boletera_spivet.zip y pegarlo en la carpeta raiz de su servidor ya sea localmente o en linea
**2.-** Descomprimir dentro de la carpeta raiz, el resultado seré una capeta llamada boletera_spivet la cual contiene todos los archivos del proyecto

_**Nota**: Si desea puede renombrar la carpeta con el nuevo nombre de su proyecto_

#### Comenzando la configuración del proyecto

**1.-**  Localizar la carpeta de *databases_instalation*, el contenido de dicha carpeta son dos scripts de base de datos llamdados:
```bash
    spivet_boletera_dash.sql => Base de datos de Dashboard
    spivet_boletera_joom.sql => Base de datos de Joomla "Sitio web publicable"
```   

- 1.1 Crear las bases de datos en tu administrador de bases datos llamado **nombre_de_proyecto_joom** y **nombre_de_proyecto_dash**, el nombre puede ser el de tu proyecto o empresa, como sugerencia la terminacion debe de contener el prefijo de *_joom* o *_dash* para poder identificar que script insertar en cada base de datos
- 1.2 Después de haber creado las bases de datos procedemos a ejecutar el primer script con terminacion *_joom* en la base de datos con terminacion *_joom*
- 1.4 Procedemos a ejecutar el segundo script con terminacion *_dash* en la base de datos de *_dash*
**2.-** Posterior a la creación de las bases de datos para el joomla y para el dashboard; modificar los valores de conexión del archivo `configuration.php` localizada en la raíz del proyecto
```bash
    <?php
        class JConfig {
            ...
            public $dbtype = 'mysqli'; // Tipo de BD a utilizar
	        public $host = 'localhost'; // Local o del servidor en producción
	        public $user = 'usuario_bd_joomla';
	        public $password = 'pass_bd_joomla';
	        public $db = 'nombre_bd_joomla';
	        public $dbprefix = 'prefijo_bd_joomla'; // Verificar el prefijo con el que se creo la BD de joomla o de la BD que se reutilizará
            ...
            public $hostAdm = 'localhost'; // Local o del servidor en producción
	        public $userAdm = 'usuario_bd_dashboard';
	        public $passAdm = 'pass_bd_dashboard';
	        public $datBAdm = 'nombre_bd_dashboard';
        }
```
**3.-** Abrir el proyecto en el navegador para poder visualizar su ejecución

_**Nota**: Como recomendación; si ejecuta el proyecto en local, utilice un host virtual, puede utilizar el servidor de laragon te ayuda a solventar ese inconveniente_

En este punto, la instalación de jommla estará completa.

### Acceder al administrador de Joomla
- En su navegador ingrese **dominio_nombre_proyecto/administrator**. Ejemplo:
```bash
    http://boletera_spivet.test/administrator
```
- Los datos de acceso como soporte son los siguientes:
    - Usuario: admin@spivet.com.mx
    - Password: admin.spivet224

### Acceder al administrador del Dashboard
- En su navegador ingrese **dominio_nombre_proyecto/admin**. Ejemplo:
```bash
    http://boletera_spivet.test/admin
```
- Los datos de acceso como soporte son los siguientes:
    - Usuario: admin@spivetboletera.com
    - Password: 801eTerA.58293


#### Listo!. Continua con la configuración frontal de tu proyecto desde el administrator de Joomla


## Deployment

Ejecutar el servidor local o remoto

Utilizando Nginx:
```bash
  sudo systemctl restart nginx
```
Utilizando LAMP:
```bash
  sudo systemctl reload apache2
```
