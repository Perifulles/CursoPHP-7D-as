-- ═══════════════════════════════════════════════════
--  SIMULACROS (Días 5, 6 y 7) — Tablas adicionales
--  Se añaden a la misma BD dia3_ejercicios
--
--  EJECUTAR MANUALMENTE (el volumen ya existe):
--  docker exec -i repaso_final_mysql mysql -uroot -proot < sql/simulacros_init.sql
-- ═══════════════════════════════════════════════════

USE dia3_ejercicios;

-- ──────────────────────────────────────────
--  SIMULACRO 1 (Día 5): Gimnasio FitFlorida
-- ──────────────────────────────────────────
CREATE TABLE IF NOT EXISTS actividades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipoActividad ENUM('Colectiva', 'Personal') NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    precioMes DECIMAL(10,2) NOT NULL,
    aforoMax INT DEFAULT NULL,
    entrenador VARCHAR(100) DEFAULT NULL
);

INSERT INTO actividades (tipoActividad, nombre, precioMes, aforoMax, entrenador) VALUES
    ('Colectiva', 'Spinning', 35.00, 25, NULL),
    ('Personal', 'Entreno Fuerza', 80.00, NULL, 'Carlos Gómez'),
    ('Colectiva', 'Yoga', 30.00, 18, NULL),
    ('Personal', 'Readaptación', 95.00, NULL, 'Laura Pons'),
    ('Colectiva', 'CrossTraining', 40.00, 22, NULL);

-- ──────────────────────────────────────────
--  SIMULACRO 2 (Día 6): Academia CursosFlorida
-- ──────────────────────────────────────────
CREATE TABLE IF NOT EXISTS cursos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipoCurso ENUM('Online', 'Presencial') NOT NULL,
    titulo VARCHAR(150) NOT NULL,
    precioBase DECIMAL(10,2) NOT NULL,
    plataforma VARCHAR(50) DEFAULT NULL,
    aula VARCHAR(20) DEFAULT NULL
);

INSERT INTO cursos (tipoCurso, titulo, precioBase, plataforma, aula) VALUES
    ('Online', 'PHP desde cero', 120.00, 'Premium', NULL),
    ('Presencial', 'Bases de Datos MySQL', 200.00, NULL, 'A-12'),
    ('Online', 'JavaScript Moderno', 90.00, 'Standard', NULL),
    ('Presencial', 'Redes y Sistemas', 250.00, NULL, 'B-03'),
    ('Online', 'Laravel Avanzado', 150.00, 'Premium', NULL);

-- ──────────────────────────────────────────
--  SIMULACRO 3 (Día 7): Cafetería CafeCode
-- ──────────────────────────────────────────
CREATE TABLE IF NOT EXISTS productosCafe (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipoProducto ENUM('Bebida', 'Comida') NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    tamanyo VARCHAR(20) DEFAULT NULL,
    vegano TINYINT(1) DEFAULT NULL
);

INSERT INTO productosCafe (tipoProducto, nombre, precio, tamanyo, vegano) VALUES
    ('Bebida', 'Café Latte', 2.50, 'grande', NULL),
    ('Comida', 'Sandwich Vegetal', 4.80, NULL, 1),
    ('Bebida', 'Té Matcha', 3.20, 'mediano', NULL),
    ('Comida', 'Croissant Jamón', 3.90, NULL, 0),
    ('Bebida', 'Cappuccino', 2.80, 'grande', NULL),
    ('Comida', 'Bowl Quinoa', 6.50, NULL, 1);
