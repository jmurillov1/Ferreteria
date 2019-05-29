# Ferreteria

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
    
