/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Admin
 */
public class Comprobacion {
    public boolean precioBienParque(double precio) {
        boolean preciomal=true;
        if(precio>15 && precio<25){
            preciomal=false;
        }
        return preciomal;
    }
    public boolean precioBienZoo(double precio){
        boolean preciomal = true;
        if(precio>10 && precio<20){
            preciomal=false;
        }
        return preciomal;
    }
    public void precioParque(double precio) throws ExcepcionPropia{ 
        if(precioBienParque(precio)) {
            throw new ExcepcionPropia();
        }
    }
    public void precioZoo(double precio)throws ExcepcionPropia{
        if(precioBienZoo(precio)){
            throw new ExcepcionPropia();
        }
    }
}
