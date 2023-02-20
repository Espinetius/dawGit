CREATE TABLE COCHERAS(
     IDCOCHERA NUMBER(3) PRIMARY KEY,
     CODCOCHERA NUMBER(3),
	 NOMCOCHERA VARCHAR2(20)
);

INSERT INTO COCHERAS VALUES (1,001,'COCHERA 1');
INSERT INTO COCHERAS VALUES (2,002,'COCHERA 2');
INSERT INTO COCHERAS VALUES (3,003,'COCHERA 3');
INSERT INTO COCHERAS VALUES (4,004,'COCHERA 4');
INSERT INTO COCHERAS VALUES (5,005,'COCHERA 5');
INSERT INTO COCHERAS VALUES (6,006,'COCHERA 6');
INSERT INTO COCHERAS VALUES (7,007,'COCHERA 7');
INSERT INTO COCHERAS VALUES (8,008,'COCHERA 8');
INSERT INTO COCHERAS VALUES (9,009,'COCHERA 9');

CREATE TABLE LINEAS (
	 IDLINEA NUMBER(3) PRIMARY KEY,
     CODLINEA NUMBER(3),
	 NOMLINEA VARCHAR2(20)
);

INSERT INTO LINEAS VALUES (1,001,'AZUL CLARO');
INSERT INTO LINEAS VALUES (2,002,'ROJA');
INSERT INTO LINEAS VALUES (3,003,'AMARILLA');
INSERT INTO LINEAS VALUES (4,004,'MARRON');
INSERT INTO LINEAS VALUES (5,005,'VERDE');
INSERT INTO LINEAS VALUES (6,006,'GRIS');
INSERT INTO LINEAS VALUES (7,007,'NARANJA');
INSERT INTO LINEAS VALUES (8,008,'ROSA');
INSERT INTO LINEAS VALUES (9,009,'MORADA�');
INSERT INTO LINEAS VALUES (10,010,'AZUL OSCURA');

CREATE TABLE TRENES (
     IDTREN NUMBER(3) PRIMARY KEY,
     CODTREN NUMBER(3),
	 NOMTREN VARCHAR2(20),
	 CODLINEA NUMBER(3),
	 NUMTRENES NUMBER(2)
);

INSERT INTO TRENES VALUES (1,001,'TREN 1',3,1);
INSERT INTO TRENES VALUES (1,001,'TREN 2',4,6);
INSERT INTO TRENES VALUES (3,002,'TREN 3',5,2);
INSERT INTO TRENES VALUES (4,002,'TREN 4',6,3);
INSERT INTO TRENES VALUES (5,003,'TREN 5',7,4);
INSERT INTO TRENES VALUES (6,004,'TREN 6',8,5);
INSERT INTO TRENES VALUES (7,005,'TREN 7',9,6);
INSERT INTO TRENES VALUES (8,006,'TREN 8',10,7);
INSERT INTO TRENES VALUES (9,007,'TREN 9',11,8);
INSERT INTO TRENES VALUES (10,008,'TREN 10',12,9);

1.
SELECT LINEAS.CODLINEA, NOMLINEA, NOMTREN FROM LINEAS, TRENES WHERE TRENES.NOMTREN= 'TREN 1' AND LINEAS.CODLINEA = TRENES.CODLINEA;
2.
SELECT CODLINEA, NOMLINEA FROM LINEAS WHERE CODLINEA=9;
3.
SELECT CODLINEA, NOMLINEA FROM LINEAS ORDER BY NOMLINEA;
4.
SELECT CODLINEA, NOMLINEA FROM LINEAS ORDER BY CODLINEA;
5.
SELECT CODLINEA, NOMLINEA FROM LINEAS WHERE CODLINEA<=5 ORDER BY CODLINEA;
6.
SELECT CODLINEA, NOMLINEA FROM LINEAS WHERE CODLINEA>5 ORDER BY CODLINEA;
7.
SELECT CODLINEA, NOMLINEA FROM LINEAS WHERE NOMLINEA LIKE'A%';
8.
SELECT CODLINEA, NOMLINEA FROM LINEAS WHERE NOMLINEA LIKE'A%' OR NOMLINEA LIKE'M%';
9.
SELECT CODLINEA, NOMLINEA FROM LINEAS WHERE NOMLINEA LIKE'%O%';