--
-- php_tiendita_carrito.sql
--
-- Tiendita - Manejo de carrito de compras
--

create database php_tiendita_carrito;
use php_tiendita_carrito;
create table carrito (nombre text, articulo text, cantidad int);
create table catalogo (articulo text, precio float, cantidad int, imagen text);
insert into catalogo values("coca",6.50, 10, "coca.jpg");
insert into catalogo values("pepsi",5.50, 10, "pepsi.jpg");



