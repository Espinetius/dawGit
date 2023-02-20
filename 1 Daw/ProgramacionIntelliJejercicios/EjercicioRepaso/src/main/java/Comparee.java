
import java.util.Comparator;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Admin
 */
public class Comparee implements Comparator<CentroOcio>{

    @Override
    public int compare(CentroOcio arg0, CentroOcio arg1) {
        int aux = arg0.provincia.compareTo(arg1.provincia);
        if (aux==0) {
            aux = arg0.anyoConstruccion-arg1.anyoConstruccion;
        }
        return aux;
    }
        
    
    
    
}
