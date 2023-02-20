
import java.io.Serializable;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Admin
 */
public class ParqueDeAtracciones extends CentroOcio implements Serializable, Comparable<ParqueDeAtracciones>{
    protected int edadMinima;
    public ParqueDeAtracciones(){
        super();
        edadMinima=10;
    }
    public ParqueDeAtracciones(int identificador, String nombre, double precioEntrada, String provincia, int anyoConstruccion, int valoracionesUsuarios, int edadMinima) {
        super();
        this.edadMinima=edadMinima;
    }

    public int getEdadMinima() {
        return edadMinima;
    }

    public void setEdadMinima(int edadMinima) {
        this.edadMinima = edadMinima;
    }
    public double calcularEntrada(int edad, boolean festivo){
        double entradaParque= super.precioEntrada;
        if (edad>65){
            entradaParque=0;
        } else{
            if (festivo) {
                entradaParque=entradaParque+entradaParque*0.40;
            }
        }
        return entradaParque;
    }

    @Override
    public String toString() {
        return super.toString() + "-, edadMinima -" + edadMinima + '}';
    }

    @Override
    public int compareTo(ParqueDeAtracciones arg0) {
        return this.identificador-arg0.identificador;
    }
}
