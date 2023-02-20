
import java.io.FileNotFoundException;
import java.io.IOException;
import java.util.Collections;
import java.util.Scanner;
import java.util.logging.Level;
import java.util.logging.Logger;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Admin
 */
public class Tester {
    public static void main(String Args[]){
        Empresa emp = new Empresa();
        boolean salida=false;
        Scanner lector = new Scanner(System.in);
        do {
        System.out.println("Bienvenido, indique que desea realizar:"
                + "\n1.- Listar Centros."
                + "\n2.- Añadir Centro de Ocio."
                + "\n3.- Consultar Centro de Ocio. Listar por Provincia y año de construccion"
                + "\n4.- Añadir Valoracion a Centro de Ocio"
                + "\n5.- Actualizar zoo (delfinario)"
                + "\n6.- Eliminar Centros de Ocio"
                + "\n7.- Ordenar Centros por Valoracion Media"
                + "\n8.- Coleccion de Parques ordenados por Provincia/precio de entrada"
                + "\n9.- Pasar a fichero texto"
                + "\n10.- Pasar a fichero Binario"
                + "\n11.- Cargar Fichero binario"
                + "\n12.- Cargar Fichero texto"
                + "\n13.- Cerrar programa");
        int opcion = lector.nextInt(); lector.nextLine();
        switch(opcion){
            case 1:
                System.out.println("Listado de centros:");
                for (int i = 0; i < emp.centros.size(); i++) {
                    System.out.println(emp.centros.get(i));                    
                }
                break;
            case 2:
                System.out.println("Que tipo de centro va a introducir: Parque de atracciones o Zoologico.");
                String respuesta = lector.nextLine();
                CentroOcio centro;
                if (respuesta.equalsIgnoreCase("Parque de atracciones")){
                    System.out.println("Introduzca los datos para añadir el parque. (Id, nombre, precio de entrada, provincia,"
                            + "año de construccion, valoracion, edad minima para entrar.)");
                    int id= lector.nextInt();lector.nextLine();
                    String nombre=lector.nextLine();
                    double precioEntrada= lector.nextDouble();lector.nextLine();
                    Comprobacion comp = new Comprobacion();
                    try {
                        comp.precioParque(precioEntrada);
                    } catch (ExcepcionPropia ex) {
                        Logger.getLogger(Tester.class.getName()).log(Level.SEVERE, null, ex);
                    }
                    String provincia=lector.nextLine();
                    int anyoConstruccion=lector.nextInt(); 
                    int valoracion = lector.nextInt();
                    int edadMin = lector.nextInt();
                    centro = new ParqueDeAtracciones(id, nombre, precioEntrada, provincia, anyoConstruccion,
                    valoracion, edadMin);
            try {
                emp.añadirCentro(centro);
            } catch (FileNotFoundException ex) {
                Logger.getLogger(Tester.class.getName()).log(Level.SEVERE, null, ex);
            }
                    System.out.println("Parque añadido...");
                }else if(respuesta.equalsIgnoreCase("Zoologico")) {
                    System.out.println("Introduzca los datos para añador el zoo. (Id, nombre, precio entrada, provincia,"
                            + "año construccion, valoracion, si tiene delfinario, si tiene pinguinos)");
                    int id= lector.nextInt();lector.nextLine();
                    String nombre=lector.nextLine();
                    double precioEntrada= lector.nextDouble();lector.nextLine();
                    Comprobacion comp = new Comprobacion();
                    try {
                        comp.precioZoo(precioEntrada);
                    } catch (ExcepcionPropia ex) {
                        Logger.getLogger(Tester.class.getName()).log(Level.SEVERE, null, ex);
                    }
                    String provincia=lector.nextLine();
                    int anyoConstruccion=lector.nextInt(); 
                    int valoracion = lector.nextInt();
                    String booleanos= lector.nextLine();
                    boolean delfinario, pinguinos;
                    if (booleanos.equalsIgnoreCase("si")) {
                        delfinario = true;
                    } else {
                        delfinario= false;
                    }
                    booleanos= lector.nextLine();
                    if (booleanos.equalsIgnoreCase("si")) {
                        pinguinos = true;
                    } else {
                        pinguinos= false;
                    }
                    centro = new Zoologico(id, nombre, precioEntrada, provincia, anyoConstruccion, valoracion, 
                    delfinario, pinguinos);
            try {
                emp.añadirCentro(centro);
            } catch (FileNotFoundException ex) {
                Logger.getLogger(Tester.class.getName()).log(Level.SEVERE, null, ex);
            }
                    System.out.println("Zoo añadido...");
                } else {
                    System.out.println("No ha seleccionado una opcion valida...");
                }
               
                break;
            case 3:
                Collections.sort(emp.centros, new Comparee());
                break;
            case 4:
                break;
            case 5:
                break;
            case 6:
                break;
            case 7:
                break;
            case 8:
                break;
            case 9:
            {
                try {
                    emp.escribirFicheroNuevo();
                    System.out.println("Fichero creado...");
                } catch (FileNotFoundException ex) {
                    Logger.getLogger(Tester.class.getName()).log(Level.SEVERE, null, ex);
                }
            }
                break;

            case 10:
            {
                try {
                    emp.EscribirFicheroBinarioNuevo();
                    System.out.println("Fichero binario creado...");
                } catch (IOException ex) {
                    Logger.getLogger(Tester.class.getName()).log(Level.SEVERE, null, ex);
                }
            }
                break;

            case 11:
            {
                try {
                    emp.EscribirFicheroBinario();
                    for (int i = 0; i < emp.centros.size(); i++) {
                        System.out.println(emp.centros.get(i));                        
                    }
                } catch (IOException ex) {
                    Logger.getLogger(Tester.class.getName()).log(Level.SEVERE, null, ex);
                } catch (ClassNotFoundException ex) {
                    Logger.getLogger(Tester.class.getName()).log(Level.SEVERE, null, ex);
                }
            }
                break;

            case 12:
            {
                try {
                    emp.EscribirFichero();
                } catch (IOException ex) {
                    Logger.getLogger(Tester.class.getName()).log(Level.SEVERE, null, ex);
                }
            }
                break;

            case 13:
                System.out.println("Gracias por usar el programa. Cerrando...");
                salida=true;
                break;
            default:
                System.out.println("Seleccione una opcion valida");
                
        }
        } while(!salida);
        
    }
}
