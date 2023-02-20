SET SERVEROUTPUT ON;
DECLARE
  TYPE NOMBRES IS VARRAY(5) OF VARCHAR2(10);
  NOM NOMBRES;
  TYPE EDADES IS VARRAY(5) OF INTEGER;
  EDAD EDADES;
  CONTADOR NUMBER;
  CONTADOR1 NUMBER;
BEGIN
  NOM:=NOMBRES('KEVIN','SANDRA','JORGE','DAVID','ALEX');
  EDAD:=EDADES(19,18,22,28,28);
  CONTADOR:=NOM.COUNT;
  FOR I IN 1..CONTADOR LOOP
    DBMS_OUTPUT.PUT_LINE(NOM(I)|| ' ' || EDAD(I));
  END LOOP;
END;

/* IMPRIMIR MAYORES DE 20*/
DECLARE
  TYPE NOMBRES IS VARRAY(5) OF VARCHAR2(10);
  NOM NOMBRES;
  TYPE EDADES IS VARRAY(5) OF INTEGER;
  EDAD EDADES;
  CONTADOR NUMBER;
  CONTADOR1 NUMBER;
BEGIN
  NOM:=NOMBRES('KEVIN','SANDRA','JORGE','DAVID','ALEX');
  EDAD:=EDADES(19,18,22,28,28);
  CONTADOR:=NOM.COUNT;
  FOR I IN 1..CONTADOR LOOP
    IF EDAD(I)>20 THEN
      DBMS_OUTPUT.PUT_LINE(NOM(I)|| ' ' || EDAD(I));
    END IF;
  END LOOP;
END;
/*APARTADO 1*/
DECLARE
  TYPE NOMBRES IS VARRAY(5) OF VARCHAR2(10);
  NOM NOMBRES;
  TYPE NOTAS IS VARRAY(5) OF INTEGER;
  NOTA NOTAS;
  CONTADOR NUMBER;
  CONTADOR1 NUMBER;
BEGIN
  NOM:=NOMBRES('KEVIN','SANDRA','JORGE','DAVID','ALEX');
  NOTA:=NOTAS(10,8,2,4,5);
  CONTADOR:=NOM.COUNT;
  FOR I IN 1..CONTADOR LOOP
    DBMS_OUTPUT.PUT_LINE(NOM(I)|| ' ' || NOTA(I));
  END LOOP;
END;
/*APARTADO 2*/
DECLARE
  TYPE NOMBRES IS VARRAY(5) OF VARCHAR2(10);
  NOM NOMBRES;
  TYPE NOTAS IS VARRAY(5) OF INTEGER;
  NOTA NOTAS;
  CONTADOR NUMBER;
  CONTADOR1 NUMBER;
BEGIN
  NOM:=NOMBRES('KEVIN','SANDRA','JORGE','DAVID','ALEX');
  NOTA:=NOTAS(10,8,2,4,5);
  CONTADOR:=NOM.COUNT;
  FOR I IN 1..CONTADOR LOOP
    IF MOD(I,2)!=0 THEN
      DBMS_OUTPUT.PUT_LINE(NOM(I)|| ', NOTA: ' ||NOTA(I));
    END IF;
  END LOOP;
END;
/*APARTADO 3*/
DECLARE
  TYPE NOTAS IS VARRAY(5) OF INTEGER;
  NOTA NOTAS;
  CONTADOR NUMBER;
BEGIN
  NOTA:=NOTAS(10,8,2,4,5);
  CONTADOR:=NOTA.COUNT;
  FOR I IN 1..CONTADOR LOOP
    DBMS_OUTPUT.PUT_LINE('NOTA'||I||': ' || NOTA(I));
  END LOOP;
END;
/*APARTADO 4*/
DECLARE
  TYPE NOTAS IS VARRAY(5) OF INTEGER;
  NOTA NOTAS;
  CONTADOR NUMBER;
BEGIN
  NOTA:=NOTAS(10,8,2,4,5);
  CONTADOR:=NOTA.COUNT;
  FOR I IN 1..CONTADOR LOOP
    IF NOTA(I)>=5 THEN
      DBMS_OUTPUT.PUT_LINE(NOTA(I));
    END IF;
  END LOOP;
END;
/*APARTADO 5*/
DECLARE
  TYPE NOMBRES IS VARRAY(5) OF VARCHAR2(10);
  NOM NOMBRES;
  TYPE NOTAS IS VARRAY(5) OF INTEGER;
  NOTA NOTAS;
  CONTADOR NUMBER;
  CONTADOR1 NUMBER;
BEGIN
  NOM:=NOMBRES('KEVIN','SANDRA','JORGE','DAVID','ALEX');
  NOTA:=NOTAS(10,8,2,4,5);
  CONTADOR:=NOM.COUNT;
  FOR I IN 1..CONTADOR LOOP
    DBMS_OUTPUT.PUT_LINE('ALUMNO: '||NOM(I)|| ', NOTA: ' || NOTA(I));
  END LOOP;
END;
/*APARTADO 6*/
DECLARE
  TYPE NOMBRES IS VARRAY(5) OF VARCHAR2(10);
  NOM NOMBRES;
  TYPE NOTAS IS VARRAY(5) OF INTEGER;
  NOTA NOTAS;
  CONTADOR NUMBER;
  CONTADOR1 NUMBER:=0;
BEGIN
  NOM:=NOMBRES('KEVIN','SANDRA','JORGE','DAVID','ALEX');
  NOTA:=NOTAS(10,8,2,4,5);
  CONTADOR:=NOM.COUNT;
  FOR I IN 1..CONTADOR LOOP
    IF NOTA(I)>=5 THEN 
      DBMS_OUTPUT.PUT_LINE('ALUMNO: '||NOM(I)|| ', NOTA: ' || NOTA(I));
      CONTADOR1:=CONTADOR1+1;
    END IF;
  END LOOP;
  DBMS_OUTPUT.PUT_LINE('HAN APROBADO: '|| CONTADOR1);
END;
/*APARTADO EXTRA*/
DECLARE
  TYPE NOMBRES IS VARRAY(5) OF VARCHAR2(10);
  NOM NOMBRES;
  TYPE NOTAS IS VARRAY(5) OF INTEGER;
  NOTA NOTAS;
  CONTADOR NUMBER;
  ALUMNO VARCHAR2(10);
  NOTAMAYOR INTEGER:=0;
BEGIN
  NOM:=NOMBRES('KEVIN','SANDRA','JORGE','DAVID','ALEX');
  NOTA:=NOTAS(9,8,1,4,5);
  CONTADOR:=NOM.COUNT;
  FOR I IN 1..CONTADOR LOOP
    IF NOTA(I)>=NOTAMAYOR THEN 
      NOTAMAYOR:=NOTA(I);
      ALUMNO:=NOM(I);
    END IF;
  END LOOP;
  DBMS_OUTPUT.PUT_LINE('LA MAYOR NOTA ES: '||NOTAMAYOR||' Y LA TIENE: '||ALUMNO);
END;

/*EJ 20*/
DECLARE
  TYPE NOMBRES IS VARRAY(5) OF VARCHAR2(10);
  NOM NOMBRES;
  TYPE CONTRASE�AS IS VARRAY(5) OF VARCHAR(25);
  PASS CONTRASE�AS;
  CONTADOR NUMBER;
BEGIN
  NOM:=NOMBRES('Luis','David','Juan','Jose','Carlos');
  PASS:=CONTRASE�AS('PLSQL','SQL','SQL','PROGRAMACION','ENTORNOS');
  CONTADOR:=NOM.COUNT;
  DBMS_OUTPUT.PUT_LINE('EL TOTAL DE USUARIOS ES DE '||NOM.COUNT);
  DBMS_OUTPUT.PUT_LINE('EL TOTAL DE CONTRASE�AS ES DE '||PASS.COUNT);
  DBMS_OUTPUT.PUT_LINE('LOS USUARIOS Y SUS CONTRASE�AS SON:');
  FOR I IN 1..CONTADOR LOOP
    DBMS_OUTPUT.PUT_LINE(NOM(I)||'--'||PASS(I));
  END LOOP;
  DBMS_OUTPUT.PUT_LINE('LOS USUARIOS CON CONTRASE�A SQL SON:');
  FOR I IN 1..CONTADOR LOOP
    IF PASS(I)='SQL' THEN
      DBMS_OUTPUT.PUT_LINE(NOM(I));
    END IF;
  END LOOP;
END;

DECLARE
  TYPE EDADES IS ARRAY(6) OF NUMBER(6);
  EDAD EDADES;
  MAYOR NUMBER:=0;
  CONTADOR NUMBER;
BEGIN
  EDAD:=EDADES(11,22,33,44,55,66);
  CONTADOR:=EDAD.COUNT;
  FOR I IN 1..CONTADOR LOOP
    DBMS_OUTPUT.PUT_LINE('EDAD '||I||': '||EDAD(I));
    IF EDAD(I)>=MAYOR THEN
      MAYOR:=EDAD(I);
    END IF;
  END LOOP;
  DBMS_OUTPUT.PUT_LINE('EL MAYOR ES '||MAYOR);
END;

DECLARE
  TYPE NOTAS IS VARRAY(6) OF NUMBER(6);
  NOTA NOTAS;
  TYPE APELLIDOS IS VARRAY(6) OF VARCHAR2(25);
  APELLIDO APELLIDOS;
  ALUMNO VARCHAR2(25);
  NOTAMAYOR NUMBER:=0;
  CONTADOR NUMBER;
  POSICION NUMBER;
BEGIN
  NOTA:=NOTAS(3,4,15,6,7,8);
  APELLIDO:=APELLIDOS('FERNANDEZ','OSBORNE','GARCIA','LEON','CHAPARRO','SOLSONA');
  CONTADOR:=APELLIDO.COUNT;
  DBMS_OUTPUT.PUT_LINE('LOS ALUMNOS Y SUS NOTAS SON:');
  FOR I IN 1..CONTADOR LOOP
    DBMS_OUTPUT.PUT_LINE(APELLIDO(I)||' Y SU NOTA ES '||NOTA(I));
    IF NOTA(I)>=NOTAMAYOR THEN
      NOTAMAYOR:=NOTA(I);
      ALUMNO:=APELLIDO(I);
      POSICION:=I;
    END IF;
  END LOOP;
  DBMS_OUTPUT.PUT_LINE('EL ALUMNO CON MAYOR NOTA ES '||ALUMNO||' Y SU NOTA ES '||NOTAMAYOR||'. SU POSICION EN LA LISTA ES '||POSICION);
END;

DECLARE
    TYPE NOTAS IS VARRAY(5) OF NUMBER(5);
    NOTA NOTAS;
    TYPE APROVADOS IS VARRAY(5) OF NUMBER(5);
    APROVADO APROVADOS;
    TYPE SUSPENSOS IS VARRAY(5) OF NUMBER(5);
    SUSPENSO SUSPENSOS;
    CONTADOR NUMBER;
BEGIN
    NOTA:=NOTAS(10,8,2,3,7);
    APROVADO:=APROVADOS(0,0,0,0,0);
    SUSPENSO:=SUSPENSOS(0,0,0,0,0);
    CONTADOR:=NOTA.COUNT;
    DBMS_OUTPUT.PUT_LINE('LAS NOTAS SON:');
    FOR I IN 1..CONTADOR LOOP
      DBMS_OUTPUT.PUT_LINE(NOTA(I));
    END LOOP;
    DBMS_OUTPUT.PUT_LINE('LOS APROVADOS SON:');
    FOR I IN 1..CONTADOR LOOP
      IF NOTA(I)>=5 THEN
        APROVADO(I):=NOTA(I);
        IF APROVADO(I) > 0 THEN
          DBMS_OUTPUT.PUT_LINE(APROVADO(I));
        END IF;
      END IF;
    END LOOP;
    DBMS_OUTPUT.PUT_LINE('LOS SUSPENSOS SON:');
    FOR I IN 1..CONTADOR LOOP
      IF NOTA(I)<=5 THEN
        SUSPENSO(I):=NOTA(I);
        IF SUSPENSO(I) > 0 THEN
          DBMS_OUTPUT.PUT_LINE(SUSPENSO(I));
        END IF;
      END IF;
    END LOOP;
END;

DECLARE
  TYPE NOTAS IS VARRAY(5) OF NUMBER(5);
  NOTA NOTAS;
  TYPE NOTASORDENADAS IS VARRAY(5) OF NUMBER(5);
  NOTAORDENADA NOTASORDENADAS;
  CONTADOR NUMBER;
  AUX NUMBER:=10;
BEGIN
  NOTA:=NOTAS(10,8,2,3,7);
  NOTAORDENADA:=NOTASORDENADAS(0,0,0,0,0);
  CONTADOR:=NOTA.COUNT;
  DBMS_OUTPUT.PUT_LINE('LA LISTA DE NOTAS ES LA SIGUIENTE:');
  FOR I IN 1..CONTADOR LOOP
    DBMS_OUTPUT.PUT_LINE(NOTA(I));
  END LOOP;
  DBMS_OUTPUT.PUT_LINE('LA NOTA MAS BAJA ES:');
  FOR I IN 1..CONTADOR LOOP
    IF AUX>NOTA(I) THEN
      AUX:=NOTA(I);
    END IF;
  END LOOP;
  DBMS_OUTPUT.PUT_LINE(AUX);
  DBMS_OUTPUT.PUT_LINE('LA LISTA DE NOTAS ORDENADAS ES:');
  FOR J IN 1..CONTADOR LOOP
      IF NOTAORDENADA(J)>NOTAORENADA(J-1) THEN
        AUX:=NOTAORDENADA(J);
        NOTAORDENADA(J):=NOTA(J);
        NOTA(J):=AUX;
      END IF;
    DBMS_OUTPUT.PUT_LINE(NOTAORDENADA(J));
  END LOOP;
END;