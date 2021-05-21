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

create table aeroporto(
	idAeroporto int unsigned auto_increment,
    pais varchar(20) not null,
    cidade varchar(30) not null,
    nome varchar(50) not null,
    constraint pk_aeroporto_id primary key (idAeroporto)
) engine=InnoDB;

create table aviao(
	idAviao int unsigned auto_increment,
    modelo varchar(20) not null,
    capacidade int unsigned not null,
    constraint pk_aviao_id primary key (idAviao)
) engine=InnoDB;

create table partida(
	idPartida int unsigned auto_increment,
    terminal varchar(2) not null,
    horarioPartida datetime not null,
    pista varchar(3) not null,
    idAeroporto int unsigned not null,
    constraint pk_partida_id primary key (idPartida),
    constraint fk_partida_aero foreign key (idAeroporto) references aeroporto(idAeroporto)
) engine=InnoDB;

create table chegada(
	idChegada int unsigned auto_increment,
    terminal varchar(2) not null,
    horarioChegada datetime not null,
    pista varchar(3) not null,
    idAeroporto int unsigned not null,
    constraint pk_chegada_id primary key (idChegada),
    constraint fk_chegada_aero foreign key (idAeroporto) references aeroporto(idAeroporto)
) engine=InnoDB;

create table voo(
	idVoo	int unsigned auto_increment,
    nVoo	varchar(6) not null,
    distancia double not null,
    comAerea  varchar(20) not null,
    idPartida int unsigned not null,
    idChegada int unsigned not null,
    idAviao	int unsigned not null,
    constraint pk_voo_id primary key (idVoo),
    constraint fk_voo_part foreign key (idPartida) references partida(idPartida),
    constraint fk_voo_cheg foreign key (idChegada) references chegada(idChegada),
	constraint fk_voo_avi foreign key (idAviao) references aviao(idAviao)
) engine=InnoDB;

create table escala(
	idEscala int unsigned auto_increment,
    horarioEmbarque datetime not null,
    lugar varchar(4) not null,
    portaEmbarque varchar(3) not null,
    idBilhete int unsigned not null,
    idVoo int unsigned not null,
    constraint pk_escala_id	primary key (idEscala),
    constraint fk_escala_bil foreign key (idBilhete) references bilhete(idBilhete),
	constraint fk_escala_voo foreign key (idVoo) references voo(idVoo)
) engine=InnoDB;
