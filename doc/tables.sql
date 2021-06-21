create database projeto;

use projeto;

create table peoples(
	people_id int unsigned auto_increment,
    nome	varchar(60) not null,
    sexo	enum('M','F') not null,
    dtaNascimento varchar(50) not null,
    nif		varchar(9)	not null,
    morada	varchar(60)	not null,
    contacto varchar(9) not null,
    username varchar(20) not null unique,
    palavrapasse varchar(256) not null,
    tipo 	enum('A','G','O','P') not null,
    constraint pk_peoples_id	primary key (people_id))
    engine=innodb;
    
create table tickets(
	ticket_id int unsigned auto_increment,
    horaCompra datetime	not null default current_timestamp,
    checkin	 enum('S','N') not null,
    idaEVolta enum('I', 'V') not null,
    valor double	not null,
    people_id int unsigned not null,
    constraint pk_ticket_id primary key (ticket_id),
    constraint fk_ticket_id foreign key (people_id) references peoples(people_id)) 
engine= InnoDB;

create table airports(
	airport_id int unsigned auto_increment,
    pais varchar(20) not null,
    cidade varchar(30) not null,
    nome varchar(50) not null,
    constraint pk_airport_id primary key (airport_id)
) engine=InnoDB;

create table airplanes(
	airplane_id int unsigned auto_increment,
    marca varchar(20) not null,
    modelo varchar(20) not null,
    capacidade int unsigned not null,
    constraint pk_airplane_id primary key (airplane_id)
) engine=InnoDB;

create table departures(
	departure_id int unsigned auto_increment,
    terminal varchar(2) not null,
    horarioPartida datetime not null,
    pista varchar(3) not null,
    airport_id int unsigned not null,
    constraint pk_departure_id primary key (departure_id),
    constraint fk_departure_aero foreign key (airport_id) references airports(airport_id)
) engine=InnoDB;

create table arrivals(
	arrival_id int unsigned auto_increment,
    terminal varchar(2) not null,
    horarioChegada datetime not null,
    pista varchar(3) not null,
    airport_id int unsigned not null,
    constraint pk_arrival_id primary key (arrival_id),
    constraint fk_arrival_aero foreign key (airport_id) references airports(airport_id)
) engine=InnoDB;

create table flights(
	flight_id	int unsigned auto_increment,
    nVoo	varchar(6) not null,
    distancia double not null,
    comAerea  varchar(20) not null,
    departure_id int unsigned not null,
    arrival_id int unsigned not null,
    airplane_id	int unsigned not null,
    constraint pk_flight_id primary key (flight_id),
    constraint fk_flight_part foreign key (departure_id) references departures(departure_id),
    constraint fk_flight_cheg foreign key (arrival_id) references arrivals(arrival_id),
	constraint fk_flight_avi foreign key (airplane_id) references airplanes(airplane_id)
) engine=InnoDB;

create table ticketsflights(
	ticketflight_id int unsigned auto_increment,
    horarioEmbarque datetime not null,
    lugar varchar(4) not null,
    portaEmbarque varchar(3) not null,
    ticket_id int unsigned not null,
    flight_id int unsigned not null,
    constraint pk_ticket_flight_id	primary key (ticketflight_id),
    constraint fk_ticket_flight_bil foreign key (ticket_id) references tickets(ticket_id),
	constraint fk_ticket_flight_voo foreign key (flight_id) references flights(flight_id)
) engine=InnoDB;
