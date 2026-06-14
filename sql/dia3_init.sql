-- ═══════════════════════════════════════════════════
--  DÍA 3 — Base de datos para los ejercicios
--  Ejecutar al arrancar el contenedor MySQL
-- ═══════════════════════════════════════════════════

CREATE DATABASE IF NOT EXISTS dia3_ejercicios;
USE dia3_ejercicios;

-- ──────────────────────────────────────────────────
--  BLOQUE 1: Tabla productos (Repaso PDO)
-- ──────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL
);

INSERT INTO productos (nombre, precio) VALUES
    ('Teclado', 29.99),
    ('Ratón', 15.50),
    ('Monitor', 249.00),
    ('Auriculares', 45.00),
    ('Webcam', 62.30);

-- ──────────────────────────────────────────────────
--  BLOQUE 2: Tabla flotaVehiculos (Instanciación condicional)
--  Réplica de la tabla del examen del 3er trimestre
-- ──────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS flotaVehiculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipoVehiculo ENUM('Coche', 'Motocicleta') NOT NULL,
    marca VARCHAR(100) NOT NULL,
    modelo VARCHAR(100) NOT NULL,
    matricula VARCHAR(20) NOT NULL,
    precioDia DECIMAL(10,2) NOT NULL,
    numeroPuertas INT DEFAULT NULL,
    tipoCombustible VARCHAR(50) DEFAULT NULL,
    cilindrada INT DEFAULT NULL,
    incluyeCasco TINYINT(1) DEFAULT NULL
);

INSERT INTO flotaVehiculos (tipoVehiculo, marca, modelo, matricula, precioDia, numeroPuertas, tipoCombustible, cilindrada, incluyeCasco) VALUES
    ('Coche', 'Seat', 'León', '1234ABC', 40.00, 5, 'Diésel', NULL, NULL),
    ('Motocicleta', 'Honda', 'CBR', '5678DEF', 25.00, NULL, NULL, 600, 1),
    ('Coche', 'Ford', 'Focus', '9012GHI', 35.00, 5, 'Gasolina', NULL, NULL),
    ('Motocicleta', 'Yamaha', 'MT-07', '3456JKL', 20.00, NULL, NULL, 689, 0),
    ('Coche', 'Toyota', 'Corolla', '7890MNO', 38.00, 5, 'Diésel', NULL, NULL);

-- ──────────────────────────────────────────────────
--  BLOQUE 4: Tabla animales (Integrador veterinaria)
-- ──────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS animales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo ENUM('Perro', 'Gato') NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    edad INT NOT NULL,
    raza VARCHAR(100) DEFAULT NULL,
    interior TINYINT(1) DEFAULT NULL
);

INSERT INTO animales (tipo, nombre, edad, raza, interior) VALUES
    ('Perro', 'Rex', 5, 'Pastor Alemán', NULL),
    ('Gato', 'Misi', 3, NULL, 1),
    ('Perro', 'Luna', 2, 'Labrador', NULL),
    ('Gato', 'Garfield', 7, NULL, 0),
    ('Perro', 'Rocky', 4, 'Bulldog', NULL);
