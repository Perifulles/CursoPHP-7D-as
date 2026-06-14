# 📚 Curso Final de PHP — Plan de Recuperación

**Autor:** Miguel Pérez Sánchez  
**Metodología:** Vicent (Florida Universitaria, floridaoberta.com)  
**Requisitos:** Docker Desktop instalado. Nada más.

---

## 🚀 Puesta en marcha paso a paso

### 1. Requisitos previos

- [Docker Desktop](https://www.docker.com/products/docker-desktop/) instalado y en marcha.
- Un editor de código (VS Code recomendado).
- No necesitas PHP, ni MySQL, ni nada más instalado localmente. Todo corre en Docker.

---

### 2. Descomprimir el ZIP

Descomprime `CursoFinal_Hector.zip` donde quieras. Obtendrás una carpeta `CursoFinal_Hector/`.

```
CursoFinal_Hector/
├── docker-compose.yml
├── Dockerfile
├── config.json
├── index.php
├── sql/
│   ├── dia3_init.sql
│   └── simulacros_init.sql
├── Dia1/ … Dia7/
├── assets/
└── images/
```

---

### 3. Levantar los contenedores Docker

Abre una terminal **dentro de la carpeta** `CursoFinal_Hector/` y ejecuta:

```bash
docker compose up -d --build
```

Esto arranca tres servicios:
| Contenedor | Puerto | Para qué |
|---|---|---|
| `repaso_final_php` | [localhost:8080](http://localhost:8080) | Servidor PHP/Apache con el curso |
| `repaso_final_mysql` | 3306 | Base de datos MySQL |
| `repaso_final_phpmyadmin` | [localhost:8081](http://localhost:8081) | Interfaz web de la BD |

La primera vez puede tardar 1–2 minutos mientras se descarga la imagen de PHP.

---

### 4. Cargar las bases de datos (IMPRESCINDIBLE)

Los ejercicios de los Días 3, 5, 6 y 7 usan MySQL. Tienes que cargar los SQL **una sola vez**:

#### 4a. Base de datos del Día 3 (tabla `productos`)

```bash
docker exec -i repaso_final_mysql mysql -uroot -proot < sql/dia3_init.sql
```

#### 4b. Base de datos de los Simulacros (tablas `actividades`, `cursos`, `productosCafe`)

```bash
docker exec -i repaso_final_mysql mysql -uroot -proot < sql/simulacros_init.sql
```

> **¿Cómo sé que ha funcionado?**  
> Ve a [localhost:8081](http://localhost:8081), entra con usuario `root` / contraseña `root`, y comprueba que existen las bases de datos `dia3_ejercicios` y sus tablas.

---

### 5. Abrir el curso

Abre el navegador y ve a:

**[http://localhost:8080](http://localhost:8080)**

Verás la página principal con los 7 días. Haz clic en el día que quieras empezar.

---

## 🗂️ Estructura del curso

| Carpeta | Contenido |
|---|---|
| `Dia1/` | POO básica, Singleton, Composición vs Herencia |
| `Dia2/` | Polimorfismo, JSON, Arrays asociativos |
| `Dia3/` | PDO, CRUD, Instanciación condicional, Teoría MVC |
| `Dia4/` | Sesiones, Cookies, Recordar usuario |
| `Dia5/` | Simulacro 1 — Gimnasio FitFlorida (con pistas) |
| `Dia6/` | Simulacro 2 — Academia CursosFlorida (cronometrado) |
| `Dia7/` | Repaso de errores + Simulacro 3 final — Cafetería CafeCode |
| `sql/` | Scripts SQL para inicializar las bases de datos |
| `assets/` | CSS y JS del sistema de pistas y soluciones |
| `images/` | Imágenes de la página "Sobre mí" |

---

## ⚙️ Cómo funcionan los ejercicios

Cada bloque (`Bloque*.php`, `Simulacro*.php`) tiene esta estructura:

1. **Zona PHP superior** — aquí escribes tu código. Usa `echo` para mostrar resultados.
2. **Zona de teoría / enunciados** — explica qué tienes que hacer y cómo.
3. **Zona de salida** (fondo oscuro) — muestra el resultado de tu código al recargar la página.
4. **Botón 💡 de pistas** — si te atascas más de 15 minutos, úsalas. Sin vergüenza.
5. **Botón 📖 Ver solución** — solo cuando hayas intentado el ejercicio de verdad.

---

## 🔑 Datos de conexión MySQL

Estos ya están configurados en `config.json`. No tienes que cambiar nada:

```json
{
    "host": "mysql",
    "userName": "root",
    "password": "root",
    "db": "dia3_ejercicios"
}
```

> **Importante:** el `host` es `mysql` (nombre del contenedor en la red Docker), **no** `localhost`. Si ves un error de conexión PDO, asegúrate de que los contenedores están en marcha con `docker ps`.

---

## 🛑 Parar los contenedores

Cuando termines de estudiar:

```bash
docker compose down
```

Los datos de MySQL se guardan en un volumen (`mysql_data`) y se conservan para la próxima vez.

Para borrar también los datos de la BD (reinicio completo):

```bash
docker compose down -v
```

---

## ❓ Problemas frecuentes

### "No puedo conectar a localhost:8080"
- Comprueba que Docker Desktop está en marcha.
- Ejecuta `docker ps` y verifica que aparecen los tres contenedores.
- Si hay un conflicto de puerto, cambia `8080:80` en `docker-compose.yml` por otro puerto (ej. `8090:80`).

### "Fatal error: Call to a member function ... on null"
- El objeto que buscas en la BD no existe o la tabla está vacía.
- Recarga los SQL (paso 4) y comprueba en phpMyAdmin que hay datos.

### "SQLSTATE[HY000] [2002] Connection refused"
- MySQL aún está arrancando. Espera 10 segundos y recarga.

### Las pistas / soluciones no aparecen
- Asegúrate de que el archivo `assets/aula-profesor.js` existe.
- Abre la consola del navegador (F12) y mira si hay errores de JavaScript.

---

## 📬 Contacto

Creado por **Miguel Pérez** — [@migueel_perezz](https://www.instagram.com/migueel_perezz) en Instagram.  
Si algo no funciona o tienes dudas, escríbeme por IG.
