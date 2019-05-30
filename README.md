1.	Para realizar el diseño de nuestra página utilizamos la herramienta Visual Studio. Lo primero que realizamos es la parte principal de nuestra página, es la información de nuestra ferretería, quienes somos, la misión y visión.
Creamos el encabezado. Utilizamos la etiqueta <title> para poner un nombre a nuestra pagina web. 
Con la etiqueta <link> y con el atributo href especificamos la url de nuestro archivo donde se encuentra el estilo para la página.
Con la etiqueta <a> vamos agregar un logo en la cabecera de nuestra página. Utilizamos el “id” para centrar la imagen.      
  
1.1	En el cuerpo de nuestra página vamos a agregar mas elementos, vamos a utilizar la etiqueta <header> y dentro de esta etiqueta vamos a utilizar otra etiqueta <section> y procedemos hacer un menú con la etiqueta <nav>, igualmente utilizamos un id con el nombre del estilo que tengamos en el css. Creamos una lista con la etiqueta <ul> y utilizamos el id para dar el estilo a la lista. Dentro de la etiqueta vamos a crear el Inicio, Nosotros, Quienes somos, Visión y misión, contacto, información, servicio al cliente, usuarios, iniciar sesión, y registrarse. Cada uno tiene una diferente página html y php y esta nos dirige a otras paginas donde tenemos otra información de nuestra empresa.
Dentro del cuerpo utilizamos la etiqueta <section> y dentro de ella utilizamos otra etiqueta <div> con la clase del estilo y creamos nuestro slider de imágenes.
  
1.2	Creamos un pie de pagina con la etiqueta <footer> y dentro de ella creamos una sección y agregamos la información de nuestra empresa.   
 
Todas las paginas tienen un pie de pagina donde consta la información de la ferretería. 
2.	En la página login.html igualmente creamos el encabezado y llamamos al estilo creado. Tenemos la misma estructura del index.html.
Utilizamos la etiqueta <form> para ingresar a nuestro controlador interactivo donde esta conectado con nuestra base de datos que debemos tener creado en el phpAdmin. 
   
Como se muestra en la imagen el required es para hacer al campo obligatorio. 
2.1	Luego nos dirigimos a la carpeta y allí tenemos el archivo php crear usuario y para el login.  
Con el include vamos a conectarnos a la base de datos.
Guardamos en variables para luego ingresar en la tabla fer_usuario.  
  
2.2	En el login.php vamos a verificar si la persona es usuario o administrador. En saco de que el rol de la persona sea uno de los dos, el header nos llevara al index.php ya sea del usuario o el administrador.    
  
3.	Aquí tomamos los valores que el usuario ingrese en interfaz. Instanciamos al crearUsuario.php para mandar datos a la base de datos.     
 
4.	Utilizamos el Ajax para mostrar una imagen previa.  
5.	En la carpeta config tenemos la conexión a la base de datos. Nuestra base de datos se llama ferretería.
  
5.1	En la misma carpeta tenemos para cerrar la cesión si es usuario o administrador.
Cerrar cesión si es usuario y luego me regresa a la página de login.     
 
Cerrar cesión si es administrador y luego me regresa al login.
    
6.	En la carpeta vista tenemos el archivo crear_categoria.html. aquí tenemos la misma estructura del index, en la etiqueta label, agregamos la descripción.
 
6.1	En la carpeta de controladores creamos crear_categoria.php. Conectamos a la base de datos y luego vamos a ingresar datos en la tabla fer_categoria. 
 
7.	Ahora vamos a insertar un nuevo producto. Para crear un producto en la carpeta controladores debemos crear un archivo.php.
Vamos a tomar los datos que la persona ingrese.
Al momento que la persona seleccione una categoría conectamos con la base de datos y verificamos la categoría que tenemos en la base.    
   
Ahora en la carpeta controlador creamos el crear_producto.php, aquí vamos a insertar los productos a la base de datos.
Con el $_FILES vamos a mandar imágenes en la base y luego guardamos en una variable.  
    
8.	Es para realizar el pedido. Nos conectamos con la base de datos. Creamos una tabla para mostrar los detalles. Utilizamos la etiqueta <table> con un id para dar estilo a la tabla. Con le etiqueta <th> definimos los nombres de las celdas de la cabecera de una columna. 
 
 
9.	En este archivo.php vamos a conectar con el controlador donde allí vamos a controlar a los productos. Al momento que seleccionamos un producto, allí vamos a ingresar a la base de datos y vamos a poder seleccionar productos.
También al momento de seleccionar la sucursal conectamos con la base de datos, la cual me mostrara la dirección.     
 
10.	En la carpeta controladores tenemos el archivo.php para los productos. Igualmente nos conectamos con la base de datos. Aquí tenemos el stock, la sucursal y el producto. Luego se ingresa en la tabla fer_sucursal_producto los datos.   
 
11.	De esta manera vamos a crear la sucursal, igualmente se crea un archivo.php en controladores, la cual allí vamos a pasar los datos a la base.  
 
12.	Nos conectamos a la base con el include. Obtenemos los datos en las variables $direccion $telefono y luego ingresamos en la tabla fer_sucursal.    
 
13.	Para los usuarios vamos a realiza el CRUD. Tenemos un menú del usuario. Donde podemos hacer el CRUD. Ponemos la imagen del usuario en miniatura la cual nos muestra la foto, el nombre y el apellido del usuario.      
 
14.	Nos conectamos con la base de datos. Obtenemos el código y guardamos en la variable $codigo. Realizamos la sentencia donde todos los campos de la tabla fer_usuario, el código de ser igual al código de la base de datos.  
Mostramos todos los datos del usuario y tenemos un boto donde al momento que se realice alguna modificación aplastamos el botón y los datos mandan al modificarUsuario.php que se encuentra en el controlador. 
 
15.	Estamos en la carpeta controlador y aquí tenemos el modificarUsuario.php. Ingresamos a este archivo porque si es USER. Nos conectamos a la base de datos. Con el Update vamos a actualizar los campos de la tabla fer_ususario.     
 
 
16.	Para modificar la contraseña debemos hacer que el usuario ingrese la contraseña actual, y luego pedimos que ingrese la contraseña nueva. Al momento que presionamos el botón mandamos la nueva información al controlador donde allí se encuentra para realizar la modificación de la contraseña y agregar a la base de datos. 
 
17.	Guardamos los datos en las variables $contrasena1 y $contrasena2. Utilizamos el MD5 para que la contraseña se encripte. Luego utilizamos el Update en la tabla fer_usuario para realizar la modificación de la tabla.     
 
18.	 
