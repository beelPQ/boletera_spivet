#### INSTRUCCIONES DE INSTALACION SPIVET BOLETERA ####
#
# **Requisitos de instalacion**
# Bases de datos : mysql, mariadb
# Version de php : 8.0, 8.1
# 
#
# 1.- Copiar el archivo de boletera_spivet.zip y pegarlo en la carpeta raiz de su servidor ya sea localmente o en linea 
#       Nota: Es importante que la carpeta del proyecto se encuentre en raiz o que el dominio apunte a la carpeta directamente
#
# 2.- Descomprimir dentro de la carpeta raiz, el resultado sera una capeta llamada boletera_spivet la cual contiene todos los archivos del proyecto
#       Nota: Si desea puede renombrar la carpeta con el nuevo nombre de su proyecto
#
# 3.- Localizar la carpeta de databases_instalation, el contenido de dicha carpeta son dos scripts de base de datos llamdados:
#       spivet_boletera_dash.sql => Base de datos de Dashboard
#       spivet_boletera_joom.sql => Base de datos de Joomla "Sitio web publicable"
#
#       3.1 Crear base de datos en tu administrador de bases datos llamado "nombre_de_proyecto_joom" y "nombre_de_proyecto_dash"
#           el nombre puede ser el de tu proyecto o empresa pero la terminacion debe de contener el prefijo de joom o dash para poder 
#           identificar que script insertar en cada base de datos
#       3.2 Despues de haber creado las bases de datos procedemos a ejecutar el primer script con terminacion _joom en la base de datos con terminacion _joom
#       3.4 Procedemos a ejecutar el segundo script con terminacion _dash en la base de datos de _dash
# 
# 4.- Dentro de la carpeta que contiene el proyecto, localizar el archivo llamado configuration.php y modificar las credenciales de conexion a las base de datos, las  #     cuales son:
#       **Crendeciales de la base de datos "nombre_de_proyecto_joom"**
#            public $host = 'localhost';
#            public $user = 'cambiar';
#            public $password = 'cambiar';
#            public $db = 'cambiar';
#        **Crendeciales de la base de datos "nombre_de_proyecto_dash"**
#            public $hostAdm = 'localhost';
#            public $userAdm = 'cambiar';
#            public $passAdm = 'cambiar';
#            public $datBAdm = 'cambiar';
#
# 5.- Abrir el proyecto en el navegador para poder visualizar su ejecucion 
#       Nota: Es importante mencionar que al ejecutar el proyecto en local tiene que ser con un host virtual, el servidor de laragon te ayuda a solventar ese inconveniente
#
### EN ESTE PUNTO LA INSTALACION DE JOOMLA ESTARA COMPLETA ###
# Para poder acceder al administrador de joomla se tiene que hacer de la siguiente manera: dominio_nombre_proyecto/administrator
# Los datos de acceso como soporte son los siquientes
#           Usuario: admin@spivet.com.mx
#           Password: admin.spivet224
# 
### EN ESTE PUNTO LA INSTALACION DE DASHBOARD ESTARA COMPLETA ###
# Para poder acceder al Dashboard del sition se tiene que hacer de la siguiente manera: dominio_nombre_proyecto/admin
# Los datos de acceso como administrador son los siguientes:
#           Usuario: admin@spivetboletera.com
#           Password: 801eTerA.58293
#
#
#
# ############ PARA CONTINUAR CON LA CONFIGURACION DE JOOMLA REVISAR EL ARCHIVO configuracion_inicial_joom.md ##############
# ############ PARA CONTINUAR CON LA CONFIGURACION DE DASHBOARD REVISAR EL ARCHIVO configuracion_inicial_dash.md ##############



