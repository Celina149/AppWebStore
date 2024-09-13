DROP DATABASE webstoredb;

CREATE DATABASE webstoreDB;

USE webstoreDB;

CREATE TABLE IF NOT EXISTS empleados(
idEmpleado int  UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre varchar(75) NOT NULL,
apellido varchar(75) NOT NULL
);

CREATE TABLE IF NOT EXISTS proveedores(
idProveedor int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nomProveedor varchar(100) NOT NULL,
tipo enum('Local', 'Nacional', 'Internacional') NOT NULL DEFAULT 'Local',
nombreContacto varchar(150) NOT NULL
);

CREATE TABLE IF NOT EXISTS categorias(
idCategoria int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
categoria varchar(75) NOT NULL,
descripcion varchar(255) NULL
);

CREATE TABLE IF NOT EXISTS unidades(
idUnidad int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
unidad varchar(25) NOT NULL,
sigla varchar(5) NOT NULL
);

CREATE TABLE IF NOT EXISTS productos(
idProducto int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
codProducto varchar(15) NOT NULL,
descripcion varchar(75) NOT NULL,
idCategoria int UNSIGNED NULL,
idProveedor int UNSIGNED NULL,
idUnidad int UNSIGNED NULL,
stockMin int NULL DEFAULT 0,
stockMax int NULL DEFAULT 0,
stock int NOT NULL DEFAULT 0,
fechaRegistro timestamp DEFAULT CURRENT_TIMESTAMP(),
estado enum('Sin Existencias', 'En Stock Mínimo', 'Buen Stock', 'Sobrepasa Stock Máximo.') NOT NULL DEFAULT 'Sin Existencias',
precioCompra double NOT NULL DEFAULT 0.0,
margenUtilidad double NOT NULL DEFAULT 0.0,
precioVenta double NOT NULL DEFAULT 0.0,

CONSTRAINT FK_categorias_productos FOREIGN KEY(idCategoria)
    REFERENCES categorias(idCategoria) 
    ON UPDATE CASCADE ON DELETE set NULL,

CONSTRAINT FK_proveedores_productos FOREIGN KEY(idProveedor)
    REFERENCES proveedores(idProveedor) 
    ON UPDATE CASCADE ON DELETE set NULL,

CONSTRAINT FK_unidades_productos FOREIGN KEY(idUnidad)
    REFERENCES unidades(idUnidad) 
    ON UPDATE CASCADE ON DELETE SET NULL
);

SELECT CURRENT_TIMESTAMP()
#INTRODUCIR LOS DATOS DE SQL DE LAS DEMAS TABLAS