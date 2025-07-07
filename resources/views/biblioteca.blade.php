<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca 3i</title>
    <style>
         body {
             background-image: url('https://i.pinimg.com/736x/78/ea/62/78ea62143ce49309e4c703f1be0e0056.jpg'); 
             background-size: cover;
             background-repeat: no-repeat;      
             background-position: center;     
             margin: 0;
             height: 100vh;                    
         }
        body {
            font-family: Lora;
            background-color: #f5f5f5;
            text-align: center;
            padding: 50px;
        }
        h1 {
            font-size: 60px;
            color:#f5f5f5;
            margin-top: 100px;
        }

        p {
            font-size: 30px;
            font-family: inter;
            background-color:#8C5C2D;
            text-align: center;
            padding: 10px;
        }

        .menu {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 40px;
        }
        .menu a {
            font-family: times new roman;
            display: inline-block;
            padding: 20px 30px ;
            background-color:#8C5C2D;
            color: white;
            border-radius: 10px;
            text-decoration: none;
            font-size: 20px;
            transition: 0.3s;
            }
   
    </style>
</head>
<body>
    <h1>📚 Bienvenidos a Biblioteca 3i... Iniciativa, Interactiva, Inclusiva</h1>
    <p>Seleccioná una sección:</p>
    <div class="menu">
        <a href="/libros">📘 Libros</a>
        <a href="/prestamos">🔄 Préstamos</a>
        <a href="/categorias">📂 Categorías</a>
        <a href="/usuarios">👥 Usuarios</a>
        <a href="/perfil-dev">👩‍💻 Perfil del equipo</a>
        <a href="/">🏠 Volver al inicio</a>
    </div>
</body>
</html>