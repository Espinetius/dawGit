#EJERCICIO LEER FICHEROS
f = open("testFicheros.txt", "r")
print(f.read())
f.close()

#EJERCICIO LEER FICHEROS DA ERROR Y CONTROL DE ERRORES
try:
    fich = open("fich.txt", "r")
    # se abre el fichero y se dice que se le va a hacer al fichero, pero no se lee como tal
except FileNotFoundError:
    print("El fichero no existe, comrpueba el nombre")
else:
    print(fich.read())
    # aqui se lee el fichero
    fich.close()

try:
    numero=41/0
except ZeroDivisionError:
    print("Estas intentando dividir entre cero CATETO")
else:
    print(numero)

mesas={'mesa 1':1, 'mesa 2':2, 'mesa 3':3}
#No funciona:
try:
    mesas['ahmed']
except KeyError:
    print("No hay referencia con esa KEY")
else:
    print(mesas['ahmed'])
#Funciona:
try:
    mesas['mesa 1']
except KeyError:
    print('No hay referencia para la key')
else:
    print(mesas['mesa 1'])
