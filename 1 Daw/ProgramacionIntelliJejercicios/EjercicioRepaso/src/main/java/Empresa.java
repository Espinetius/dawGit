
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.FileWriter;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.io.OutputStream;
import java.io.PrintWriter;
import java.io.Serializable;
import java.util.ArrayList;
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
public class Empresa implements Serializable{
    protected ArrayList<CentroOcio> centros;
    protected final String nombreFichero= "Fichero_centros.txt";
    protected final String nombreFicheroB="Fichero_centros_binario.txt";
    public Empresa() {
        centros=new ArrayList<>();
        centros.add(new ParqueDeAtracciones());
        centros.add(new Zoologico());    
        comprobarFichero();
    }
    public void comprobarFichero(){
        File fich = new File(nombreFichero);
        if(!fich.exists()) {
            try {
                fich.createNewFile();
                escribirFicheroNuevo();
                System.out.println("Fichero creado...");
            } catch (IOException ex) {
                Logger.getLogger(Empresa.class.getName()).log(Level.SEVERE, null, ex);
            }
            
        }
    }
    public void escribirFicheroNuevo() throws FileNotFoundException{
        PrintWriter pw = new PrintWriter(new File(nombreFichero));
        for (int i = 0; i < centros.size(); i++) {
            pw.println(centros.get(i));
        }
        pw.close();
    }
    public void EscribirFichero() throws IOException{
       Scanner lector=new Scanner(new File(nombreFichero));
       PrintWriter pw=new PrintWriter(new FileWriter(nombreFichero, true));
       while(lector.hasNextLine()) {
           System.out.println(lector.nextLine());
       }
    }
    public void EscribirFicheroBinarioNuevo() throws FileNotFoundException, IOException {
        FileOutputStream fot=new FileOutputStream(new File(nombreFicheroB));
        ObjectOutputStream os = new ObjectOutputStream(fot);
        for (int i = 0; i < centros.size(); i++) {
            os.writeObject(centros.get(i));
        }
        os.close();
    }
    public void EscribirFicheroBinario() throws FileNotFoundException, IOException, ClassNotFoundException{
        FileInputStream fis = new FileInputStream(new File(nombreFicheroB));
        ObjectInputStream ois= new ObjectInputStream(fis);
        while(fis.available()>0) {
            centros.add((CentroOcio)ois.readObject());
        }
    }
    public void añadirCentro(CentroOcio centro) throws FileNotFoundException{
        centros.add(centro);
        escribirFicheroNuevo();
    }
    public void eliminarCentro(CentroOcio centro){
        centros.remove(centro);
    }
}
