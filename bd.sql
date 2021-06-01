CREATE TABLE usuarios(
    Id_usuario 	INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL  ,
    Nombtr	VARCHAR (30) NOT NULL,
    Ap_paterno	VARCHAR(30) NOT NULL,
    Ap_materno	VARCHAR(30) NOT NULL,
    Email 	VARCHAR(20) UNIQUE NOT NULL,
    Password	VARCHAR(8) NOT NULL,
    Perfil	CHAR(1) NOT NULL
)

CREATE TABLE categorias (
    Id_categoria int(11) PRIMARY KEY AUTO_INCREMENT,
	Categoria varchar(30)	UNIQUE
)

CREATE TABLE productos(
    Id_pro 	int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	Nombre_pre 	varchar(255) UNIQUE  NOT NULL,
	descripcion	varchar(500)  NOT NULL,
	Img	varchar(255)  NOT NULL,
	Precio	decimal(19,2)  NOT NULL,
	Oferta	decimal(19,2),
	Stock	int(11)	 NOT NULL,
	Id_categoria int(11)  NOT NULL,
	Estado char (1)  NOT NULL,
    FOREIGN KEy(Id_categoria) REFERENCES categorias (Id_categoria)
)

CREATE TABLE compras(
	Id_compra int  PRIMARY KEY AUTO_INCREMENT,
    Estado VARCHAR (40)NOT NULL,
    Delegacion VARCHAR (40)NOT NULL,
    Calle VARCHAR (40)NOT NULL,
    No_exterior VARCHAR (10)NOT NULL,
    No_Interior VARCHAR (10),
    Código_postal VARCHAR (10)NOT NULL,
    Teléfono VARCHAR (10)NOT NULL
)
CREATE table carrito".$id." (
            Id_carrito int (11) PRIMARY key AUTO_INCREMENT,
            Id_pro int (11) NOT NULL,
            Cantidad int(11) NOT NULL,
            Costo	decimal(19,2) NOT NULL,
            Estado CHAR(1) NOT NULL,
            Id_carrito int,
            fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEy(Id_pro) REFERENCES productos (Id_pro)
            FOREIGN KEy(Id_carrito) REFERENCES compras (Id_carrito)
        )
        "