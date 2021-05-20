create database projeto;

use projeto;

create table pessoa(
	idPessoa int unsigned auto_increment,
    nome	varchar(60) not null,
    sexo	enum('M','F') not null,
    dtaNascimento date	not	null,
    nif		varchar(9)	not null,
    morada	varchar(60)	not null,
    contacto varchar(9) not null,
    username varchar(20) not null,
    palavrapasse varchar(256) not null,
    tipo 	enum('A','G','O','P') not null,
    constraint pk_pessoa_id	primary key (idPessoa))
    engine=innodb;
    
create table bilhete(
	idBilhete int unsigned auto_increment,
    horaCompra datetime	not null default current_timestamp,
    checkin	 enum('S','N') not null,
    idaEVolta enum('I', 'V') not null,
    idPessoa int unsigned not null,
    constraint pk_bilhete_id primary key (idBilhete),
    constraint fk_bilhete_id foreign key (idPessoa) references pessoa(idPessoa)) 
engine= InnoDB;
