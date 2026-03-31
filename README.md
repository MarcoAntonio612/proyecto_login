# 🛒 Proyecto: Sistema de Login Seguro con Gestión de Productos

## 📌 Descripción

Este proyecto consiste en un sistema web desarrollado con Laravel que implementa autenticación de usuarios, gestión de roles (admin y cliente), recuperación de contraseñas y un módulo de productos con imágenes. El sistema está diseñado para garantizar la seguridad y control de acceso a las diferentes funcionalidades.


# 👤 Usuario administrador

Para acceder como administrador, puedes:

### Opción 1: Crear usuario desde registro

Registrarte normalmente y luego en la base de datos cambiar el campo:

Correo: 22614003
Contraseña: Tobi0701
Rol: admin

*(Asegúrate de que en la base de datos el rol esté configurado como "admin")*

### Opción 2: Usuario de prueba

Correo: marco612pesca@gmail.com
Contraseña: Tobi0701
role = cliente

# 🔑 Cómo probar recuperación de contraseña

1. Ir a la página de login:
http://127.0.0.1:8000/login


2. Dar clic en:

Forgot your password?


3. Ingresar el correo registrado

4. Revisar el correo en Mailtrap

5. Abrir el enlace recibido

6. Ingresar nueva contraseña

7. Iniciar sesión con la nueva contraseña

# 🔐 Funcionalidades principales

* Registro e inicio de sesión de usuarios
* Gestión de roles (admin / cliente)
* Recuperación de contraseñas mediante correo
* Protección de rutas con middleware
* CRUD de productos (solo admin)
* Visualización pública de productos
* Subida de imágenes

# 📌 Notas

* Solo el administrador puede crear, editar y eliminar productos.
* Los usuarios no autenticados pueden visualizar productos, pero deben iniciar sesión para interactuar con el sistema.
* El sistema implementa buenas prácticas de seguridad como encriptación de contraseñas y control de acceso.